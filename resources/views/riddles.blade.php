@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="page-header h4">Kirjeldused</div>
                @if($riddles)
                    @foreach($riddles as $riddle)
                        <div class="well">
                            <p>{{$riddle->riddle}}</p>

                            <p class="text-muted text-right">{{$riddle->author}}</p>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
