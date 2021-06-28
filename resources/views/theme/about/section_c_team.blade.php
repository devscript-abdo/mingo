<div class="ps-our-team">
    <div class="container">
        <div class="ps-section__header">
            <h3>Meet Our Leaders</h3>
        </div>
        <div class="ps-section__content">
            @foreach($teams as $team)
                <figure>
                    <div class="ps-block--ourteam">
                        <img src="{{$team->image}}" alt="">
                        <div class="ps-block__content">
                            <h4>{{$team->name}}</h4>
                            <p>{{$team->title}}</p>
                            <ul>
                                <li><a href="{{$team->twitter ?? '#'}}"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="{{$team->facebook ?? '#'}}"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="{{$team->linkedin ?? '#'}}"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </figure>
            @endforeach
  
            <figure data-mh="our-team">
                <div class="ps-block--ourteam blank">
                    <a href="#">Become <br> member in <br> team</a>
                </div>
            </figure>
        </div>
    </div>
</div>