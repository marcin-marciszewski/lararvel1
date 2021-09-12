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
                        @if($car->tags->count() > 0)
                        <p> <b>Used tags:</b> Click to remove</p>
                        @foreach($car->tags as $tag)
                        <a href="/car/{{$car->id}}/tag/{{$tag->id}}/detach"><span
                                class="badge badge-{{$tag->style}}">{{$tag->name}}</span></a>
                        @endforeach
                        @endif
                        @if($availableTags->count() > 0)
                        <p> <b>Availabe tags:</b> Click to add</p>
                        @foreach($availableTags as $tag)
                        <a href="/car/{{$car->id}}/tag/{{$tag->id}}/attach"><span
                                class="badge badge-{{$tag->style}}">{{$tag->name}}</span></a>
                        @endforeach
                        @endif
                    </div>
                </div>
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