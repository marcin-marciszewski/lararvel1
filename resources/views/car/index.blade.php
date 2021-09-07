@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">{{ __("List of cars") }}</div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($cars as $car)
                        <li class="list-group-item" class="flex-align">
                            <a alt="show details" href="/car/{{$car->id}}">
                                <h4>{{$car->name}}</h4>
                            </a>
                            <span>Owner: {{$car->user->name}} who owns {{$car->user->cars->count()}} cars</span>
                            <div class="flex-align">
                                @auth
                                <a class="btn btn-sm btn-success" alt="edit car" href="/car/{{$car->id}}/edit">
                                    Edit car
                                </a>
                                <form action="/car/{{$car->id}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input class="btn btn-sm btn-danger" type="submit" value="Delete Car" />
                                </form>
                                @endauth
                                <span>{{ $car->created_at->diffForHumans() }}</span>
                            </div>
                            <br>
                            @foreach($car->tags as $tag)
                            <a href=""><span class="badge badge-{{$tag->style}}">{{$tag->name}}</span></a>
                            @endforeach
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="mt-3">
                {{ $cars->links()}}
            </div>
            @auth
            <div class="mt-2">
                <a href="{{ url('/car/create') }}" class="btn btn-success btn-sm"><i class="fas fa-plus-circle"> Add new
                        car</i></a>
            </div>
            @endauth
        </div>
    </div>
</div>
@endsection