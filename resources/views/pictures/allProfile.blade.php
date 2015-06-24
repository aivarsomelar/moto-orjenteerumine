@extends('app')

@section('content')

<div class="row pic-margin">
    <div class="col-sm-offset-10">
        <a href="{{url('/picture/profile/form')}}">
            <button class="btn btn-margin btn-success">Lae ülesse uus profiili pilt</button>
        </a>
    </div>
</div>

<div class="row pic-margin">
    @foreach($pictures as $picture)
        <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="{{$path. $picture->file_name}}" alt="{{$picture->file_name}}">
                    <div class="caption">
                        <a href="{{url('/picture/profile/set/'.$picture->id)}}">
                            <button class="btn-margin btn btn-success" name="setPicture">Sea profiili pildiks</button>
                        </a>
                    </div>
                </div>
        </div>
    @endforeach
</div>
@endsection