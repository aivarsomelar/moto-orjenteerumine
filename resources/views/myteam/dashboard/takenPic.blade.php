<div class="col-md-6 col-xs-12 dashboard-item">
    <div class="dashboard-section">
        <h3>Hetked</h3>
        <a href="{{url('/picture/moments/team/all')}}">
            @if(isset($randomMomentPicture))
                <div class="thumbnail">
                    <img src="{{$randomMomentPicture}}">
                </div>
            @endif
        </a>
    </div>
</div>
