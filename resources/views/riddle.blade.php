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
            <a href="{{url('/picture/upload/form')}}">
                <button class="btn btn-margin btn-success">Lae uus pilt ülesse</button>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="page-header h4">Kirjeldused</div>
            @if(isset($riddle))
                <div class="well">
                    <p>{{$riddle->riddle}}</p>
                    <p class="text-muted text-right">{{$riddle->author}}</p>
                </div>
            @endif
        </div>
    </div>
@endsection
