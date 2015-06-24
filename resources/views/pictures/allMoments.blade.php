@extends('app')

@section('content')

<div class="row pic-margin">
    @if($errors->first())
        <div class="alert alert-danger" role="alert">
            {{$errors->first()}}
        </div>
    @endif
    @if(\Illuminate\Support\Facades\Session::get('message'))
        <div class="alert alert-success" role="alert">{{\Illuminate\Support\Facades\Session::get('message')}}</div>
        {{\Illuminate\Support\Facades\Session::forget('message')}}
    @endif

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