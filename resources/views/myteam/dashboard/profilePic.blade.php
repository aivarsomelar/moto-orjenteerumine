<div class="col-md-6 col-xs-12 dashboard-item">
    <div class="dashboard-section">
        <h3>Team'i profiili pilt</h3>
        @if(isset($profilePicture))
            <a href="#">
                <div class="thumbnail">
                    <img class="pic-round" src="{{$profilePicture}}">
                </div>
            </a>
        @endif
    </div>
</div>
