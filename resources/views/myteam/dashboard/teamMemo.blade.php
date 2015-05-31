<div class="col-md-12 col-xs-12 dashboard-item">
    <div class="dashboard-section">
        <h3>Memo</h3>
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/riddle/save') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <div class="col-md-12 col-xs-12">
                    <textarea placeholder="Kirjuta siia oma märkus" id="memo" class="form-control" name="memo"></textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-1 col-xs-12">
                    <button class="btn btn-success">Submit</button>
                </div>
            </div>

        </form>
        <div class="well">
            <p>
                Prepared is me marianne pleasure likewise debating. Wonder an unable except better stairs do ye admire.
                His and eat secure sex called esteem praise. So moreover as speedily differed branched ignorant. Tall
                are her knew poor now does then. Procured to contempt oh he raptures amounted occasion. One boy assure
                income spirit lovers set.
            </p>
        </div>
    </div>
</div>
