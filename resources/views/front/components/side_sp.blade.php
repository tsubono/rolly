<div class="spnone">
    <div class="sidenav">
        <h3><img src="/img/lineup/side_plan.png" alt="プランから探す"></h3>
        <ul>
            @foreach(\App\Models\Plan::all() as $plan)
                <li><a href="">{{ $plan->name }}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="sidenav">
        <h3><img src="/img/lineup/side_brand.png" alt="ブランドから探す"></h3>
        <ul>
            @foreach(\App\Models\Brand::all() as $brand)
                <li><a href="">{{ $brand->name }}</a></li>
            @endforeach
        </ul>
    </div>
</div>