<div>
    <li class="nav-item">
        <a class="nav-link {{ $active }}" href="{{ $href }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md text-center me-2 d-flex align-items-center justify-content-center"
                style="background-color: @if ($active) #c01fcc @else white @endif">
                <i class="{{ $icon }}"
                    style="color:@if ($active) white @else black @endif"></i>
            </div>
            <span class="nav-link-text ms-1">{{ $text }}</span>
        </a>
    </li>
</div>
