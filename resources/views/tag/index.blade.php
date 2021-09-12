@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">{{ __("List of tags") }}</div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($tags as $tag)
                        <li class="list-group-item" class="flex-align">
                            <h4 class="btn btn-{{$tag->style}}">{{$tag->name}}</h4>
                            <div class="flex-align">
                                <a class="btn btn-sm btn-success" alt="edit tag" href="/tag/{{$tag->id}}/edit">
                                    Edit tag
                                </a>
                                <form action="/tag/{{$tag->id}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input class="btn btn-sm btn-danger" type="submit" value="Delete tag" />
                                </form>
                                <a href="/car/tag/{{$tag->id}}" class="float-right">Used {{$tag->cars->count()}}
                                    times</a>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="mt-2">
                <a href="{{ url('/tag/create') }}" class="btn btn-success btn-sm"><i class="fas fa-plus-circle"> Add new
                        tag</i></a>
            </div>
        </div>
    </div>
</div>
@endsection