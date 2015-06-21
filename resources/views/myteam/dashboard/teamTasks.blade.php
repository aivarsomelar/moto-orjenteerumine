<div class="col-md-12 col-xs-12 dashboard-item">
    <div class="dashboard-section">
        <h3>Ülesanded</h3>

        <div class="page-header h4">Kirjeldus</div>
        @if($randomRiddle)
            <a class="no-a-effects" href="{{'/riddle/show/all'}}">
                <div class="well">
                    <p>{{$randomRiddle->riddle}}</p>

                    <p class="text-muted text-right">{{$randomRiddle->author}}</p>
                </div>
            </a>
        @endif
    </div>
</div>
