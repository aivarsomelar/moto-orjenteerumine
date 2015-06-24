@extends('app')

@section('content')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Lae ülesse profiili pilt</div>

				<div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/picture/profile/save') }}" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="name">Team'i liikme nimi</label>
                            <div class="col-md-6">
                                <input id="name" class="form-control" name="name" type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="profile">Lae ülesse team'i profiili pilt pilt</label>
                            <div class="col-md-6">
                                <input id="profile" class="form-control" name="profile" type="file">
                            </div>
                        </div>

                        <div class="checkbox">
                            <label class="col-md-offset-4 control-label" for="reusable">
                                <input id="reusable" name="reusable" type="checkbox">Kas oled nõus andma seda pilti ühiskasutusse
                            </label>
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
