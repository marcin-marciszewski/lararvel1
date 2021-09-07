<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['index','show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $cars = Car::all();
        $cars = Car::orderBy('created_at','DESC')->paginate(10);
        
        return view('car.index')->with(['cars' =>  $cars]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('car.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:5',
        ]);
        $new_car = new Car([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => auth()->id()
        ]);

        $new_car->save();

        return redirect()->route('car.index')->with( ['message_success' => "The car <b>" . $new_car->name . "</b> was created."] );
 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        return view('car.show')->with([
            'car' => $car
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        return view('car.edit')->with(['car' =>  $car]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        $request->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:5',
        ]);
        $car->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return redirect()->route('car.index')->with( ['message_success' => "The tag <b>" . $car->name . "</b> was updated."] );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $old_name = $car->name;
        $car->delete();

        return redirect()->route('car.index')->with( ['message_success' => "<b>" . $old_name . "</b> was deleted."] );
    }
}
