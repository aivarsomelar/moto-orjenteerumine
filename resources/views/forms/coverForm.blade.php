@extends('app')

@section('content')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Lae ülesse "cover" pilt</div>

				<div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/picture/cover/save') }}" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="cover">Lae ülesse "cover" pilt</label>
                            <div class="col-md-6">
                                <input id="cover" class="form-control" name="cover" type="file">
                                <p class="text-muted">NB: Kõik "cover" pildid on ühiskasutuses. "cover" pildid vahetuvad automaatselt dashboard'i jaluses</p>
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
