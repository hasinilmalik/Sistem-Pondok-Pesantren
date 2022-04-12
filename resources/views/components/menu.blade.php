<div>
    <li class="nav-item">
        <a class="nav-link {{ $active }} @if ($active == true) bg-light bg-gradient @else white @endif border-radius-md"
            href="{{ $href }}">

            <div class="icon icon-shape icon-sm shadow border-radius-md text-center me-2 d-flex align-items-center justify-content-center"
                style="background-color: @if ($active == true) #75d20c @else white @endif">
                <i class="{{ $icon }}" style="color:black"></i>
            </div>

            <span class="nav-link-text ms-1">{{ $text }}</span>
        </a>
    </li>
</div>
