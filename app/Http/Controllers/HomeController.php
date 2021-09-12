<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cars = Car::select()->orderBy('created_at','DESC')->where('user_id',auth()->id())->get();
        
        return view('home')->with(['cars' =>  $cars]);
      
    }
}
