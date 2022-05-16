<div>
    <button wire:click='cekWa' class="btn btn-primary btn-sm">Cek Whatsapp</button> <br>
    <br> 6285233002598
    @if ($wa2 == 1)
        <span class="badge badge-pill bg-gradient-success"></span>
    @elseif($wa2 == 0)
        <span class="badge badge-pill bg-gradient-danger"></span>
    @else
        <span class="badge badge-pill bg-gradient-secondary"></span>
    @endif
    <br> 6285333920007
    @if ($wa1 == 1)
        <span class="badge badge-pill bg-gradient-success"></span>
    @elseif($wa1 == 0)
        <span class="badge badge-pill bg-gradient-danger"> </span>
    @else
        <span class="badge badge-pill bg-gradient-secondary"></span>
    @endif

</div>
