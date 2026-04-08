    @php
        $uri = request()->path();
        $tar_menu = '';
        $mbb_menu = '';
        $tpc_menu = '';

        switch ($uri) {
            case "top-agency-recognition":
                $tar_menu = ' active';
                break;
            case "multibillion-builders":
                $mbb_menu = ' active';
                break;
            case "the-presidents-club":
                $tpc_menu = ' active';
                break;
            default:
                $tar_menu = ' active';
        }
    @endphp

<div class="d-flex justify-content-center align-items-center mb-30">
    <div class="dropdown">
        <button class="btn btn-outline-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
            <span style="font-family: 'FSAlbertPro';">Please Select Achievement</span>&nbsp;&nbsp;
            <i class="fa fa-caret-down"></i>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="font-family: 'FSAlbertPro';">
            <li><a class="dropdown-item" href="{{ route('top-agency-recognition') }}">Top Agency Recognition </a></li>
            <li><a class="dropdown-item" href="{{ route('multibillion-builders') }}">Multibillion Builders</a></li>
            <li><a class="dropdown-item" href="{{ route('the-presidents-club') }}">The President's Club </a></li>
            <li><a class="dropdown-item" href="{{ route('million-dollar-round-table') }}">Million Dollar Round Table  </a></li>
            <li><a class="dropdown-item" href="{{ route('presidents-cabinets-club') }}">President's Cabinet's Club  </a></li>
            <li><a class="dropdown-item" href="{{ route('double-star-club') }}">Double Star Club  </a></li>
            <li><a class="dropdown-item" href="{{ route('star-club') }}">Star Club  </a></li>
            <li><a class="dropdown-item" href="{{ route('top-regional') }}">Top Region </a></li>
            <li><a class="dropdown-item" href="{{ route('promotion') }}">Promotion </a></li>
        </ul>
    </div> 
</div>