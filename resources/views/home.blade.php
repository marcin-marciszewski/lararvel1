@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    <h2>Hello {{ auth()->user()->name}}</h2>
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="card-body">
                        @if(empty($cars))
                        You have no cars yet.
                        @else
                        <ul class="list-group">
                            @foreach($cars as $car)
                            <li class="list-group-item" class="flex-align">
                                <a alt="show details" href="/car/{{$car->id}}">
                                    <h4>{{$car->name}}</h4>
                                </a>
                                <span>Owner: <a href="/user/{{$car->user->id}}">{{$car->user->name}}</a> who owns
                                    {{$car->user->cars->count()}} cars</span>
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
                                <a href="/car/tag/{{$tag->id}}"><span
                                        class="badge badge-{{$tag->style}}">{{$tag->name}}</span></a>
                                @endforeach
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                    <a href="/car/create" class="btn btn-primary">Add new car</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection