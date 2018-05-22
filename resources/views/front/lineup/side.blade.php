<div class="side">
    <div class="sidenav">
        <h3><img src="{{ asset('img/lineup/side_plan.png') }}" alt="プランから探す"></h3>
        <ul>
            @foreach($plans as $plan)
                <li><a href="{{ url('lineup') }}?p={{ $plan->id }}">{{ $plan->name }}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="sidenav">
        <h3><img src="/img/lineup/side_brand.png" alt="ブランドから探す"></h3>
        <ul>
            @foreach($brands as $brand)
                <li><a href="{{ url('lineup') }}?b={{ $brand->id }}">{{ $brand->name }}</a></li>
            @endforeach
        </ul>
    </div>
</div>