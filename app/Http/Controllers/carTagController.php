<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Car;

class carTagController extends Controller
{
    public function getFilteredCars($tag_id){
        $tag = new Tag();
        $cars = $tag::findOrFail($tag_id)->filteredCars()->paginate(10);
        $filter = $tag::find($tag_id);

        return view('car.index',[
            'cars' => $cars,
            'filter' => $filter
        ]);
    }

    public function attachTag($car_id, $tag_id){
        $car = Car::find($car_id);
        $tag = Tag::find($tag_id);
        $car->tags()->attach($tag_id);

        return back()->with([
            'message_success' => "The tag <b>" . $tag->name . "</b> was added."
        ]);
    }

    public function detachTag($car_id, $tag_id){
        $car = Car::find($car_id);
        $tag = Tag::find($tag_id);
        $car->tags()->detach($tag_id);

        return back()->with([
            'message_success' => "The tag <b>" . $tag->name . "</b> was removed."
        ]);
    }
}
