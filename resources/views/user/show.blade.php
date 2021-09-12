@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">{{ __("User details") }}</div>
                @if(!empty($user->cars))
                <div class="card-body">
                    <div>
                        <h4>{{$user->name}}'s cars:</h4>
                        <ul>
                            @foreach($user->cars as $car)
                            <li>
                                <a href="/car/{{$car->id}}"><span>{{$car->name}}</span></a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif
            </div>
            <div class="mt-2">
                <a href="/car" class="btn btn-primary btn-sm"><i class="fas fa-plus-circle"> </i> Back
                    to
                    the list</a>
            </div>
        </div>
    </div>
</div>
@endsection