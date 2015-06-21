@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="page-header h4">Kirjeldused</div>
            @if($riddles)
                @foreach($riddles as $riddle)
                    <a class="no-a-effects" href="{{url('/riddle/show/'.$riddle->id)}}">
                        <div class="well">
                            <p>{{$riddle->riddle}}</p>

                            <p class="text-muted text-right">{{$riddle->author}}</p>
                        </div>
                    </a>
                @endforeach
            @endif
        </div>
    </div>
@endsection
