@extends('app')

@section('content')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Sisesta orjenteerumise punkti kirjeldus</div>

				<div class="panel-body">
                    @if($errors->first())
                        <div class="alert alert-danger" role="alert">
                            {{$errors->first()}}
                        </div>
                    @endif
                    @if(\Illuminate\Support\Facades\Session::get('message'))
                        <div class="alert alert-success" role="alert">{{\Illuminate\Support\Facades\Session::get('message')}}</div>
                        {{\Illuminate\Support\Facades\Session::forget('message')}}
                    @endif
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/riddle/save') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="riddle">Koha kirjeldus + ülesanne</label>
                            <div class="col-md-6">
                                <textarea placeholder="Koha kirjeldu + ülesanne" id="riddle" class="form-control" name="riddle"></textarea>
                                <p class="text-muted">Kirjeldus või mõistatus koha kohta mida soovid et võistlejad läbiksid + ülesanne</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="author">Autor</label>
                            <div class="col-md-6">
                                <input id="author"  type="text" class="form-control" name="author" placeholder="John">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-4">
                                <button class="btn btn-success btn-margin">Submit</button>
                            </div>
                        </div>

                    </form>
				</div>
			</div>
		</div>
	</div>
@endsection
