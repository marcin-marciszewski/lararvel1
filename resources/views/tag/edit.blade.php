@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Tag</div>
                <div class="card-body">
                    <form method="post" action="/tag/{{$tag->id}}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control {{$errors->has('name') ? 'border-danger': ''}}"
                                id="name" name="name" value="{{ $tag->name ?? old('name') }}" />
                            @if($errors->has('name'))
                            <small class="form-text text-danger">{!! $errors->first('name') !!}</small>
                            @endif
                        </div>
                        <input class="btn btn-primary mt-4" type="submit" value="Update tag" />
                    </form>
                    <a class="btn btn-primary float-right" href="{{ url('/tag') }}"><i
                            class="fas fa-arrow-circle-up"></i> Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection