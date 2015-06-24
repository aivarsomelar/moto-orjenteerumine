@extends('app')

@section('content')

<div class="row pic-margin">
    <div class="col-sm-offset-10">
        <a href="{{url('/picture/moments/form')}}">
            <button class="btn btn-margin btn-success">Lae ülesse uus pilt</button>
        </a>
    </div>
</div>

<div class="row pic-margin">
    @if($pictures)
        @foreach($pictures as $picture)
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="{{$path. $picture->file_name}}" alt="{{$picture->file_name}}">
                </div>
            </div>
        @endforeach
    @endif
</div>
@endsection