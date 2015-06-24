@extends('app')

@section('content')
    @if($teams)
        <div class="row pic-margin">
            @foreach($teams as $team)
                <div class="col-sm-6 col-md-4">
                    <a href="#">
                        <div class="thumbnail">
                            <img src="{{$teamHandler->getTeamProfilePictureWithPath($team->id)}}">
                            <div class="caption">
                                <h4>{{$team->name}}</h4>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    @endif
@endsection