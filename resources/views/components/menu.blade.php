<div>
    <li class="nav-item">
        <a class="nav-link @if ($judul == $text) active @endif" href="{{ route($url) }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md text-center me-2 d-flex align-items-center justify-content-center"
                style="background-color: @if ($judul == $text) #c01fcc @else white @endif">
                <i class="fas fa-{{ $icon }}"
                    style="color:@if ($judul == $text) white @else black @endif"></i>
            </div>
            <span class="nav-link-text ms-1">{{ $text }}</span>
        </a>
    </li>
</div>
