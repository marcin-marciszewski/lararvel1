@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">{{ __("Car details") }}</div>
                <div class="card-body">
                    <b>{{$car->name}}</b>
                    <p>{{$car->description}}</p>
                    <div>
                        @foreach($car->tags as $tag)
                        <a href=""><span class="badge badge-{{$tag->style}}">{{$tag->name}}</span></a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="mt-2">
                <a href="{{ URL::previous() }}" class="btn btn-primary btn-sm"><i class="fas fa-plus-circle"> </i> Back
                    to
                    the list</a>
            </div>
        </div>
    </div>
</div>
@endsection