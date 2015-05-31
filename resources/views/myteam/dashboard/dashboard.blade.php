@extends('app')

@section('content')
<div class="max-page-height">
    <div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-xs-12">
                    @include('myteam.dashboard.teamTasks')
                    @include('myteam.dashboard.teamMemo')
                    @include('myteam.dashboard.profilePic')
                    @include('myteam.dashboard.takenPic')

                </div>
                <div class="col-md-3 col-xs-12">
                    @include('.myteam.dashboard.teamMembers')
                    @include('.myteam.dashboard.teamSettings')
                </div>
            </div>
        </div>
    </div>


    <div class="row row-cover">
        <img src="/pic/covers/car-rims.jpg">
    </div>
</div>
@endsection