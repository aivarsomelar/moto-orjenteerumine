@extends('app')

@section('content')
    <div class="welcome-content">
        <div class="welcome-title">Moto orienteerumine 2015</div>
        <div class="welcome-quote">{{ Inspiring::quote() }}</div>
    </div>
@endsection