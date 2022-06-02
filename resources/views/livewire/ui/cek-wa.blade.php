<div>
    <button wire:click='cekWa' class="btn btn-primary btn-sm">Cek Whatsapp</button> <br>
    <br> wa admin (445) <span wire:loading>Loading ...</span>
    @if ($wa1 == 'true')
        <span class="badge badge-pill bg-gradient-success"></span>
    @else
        <span class="badge badge-pill bg-gradient-secondary"></span>
    @endif
    <br> wa Developer (007) <span wire:loading>Loading ...</span>
    @if ($wa2 == 'true')
        <span class="badge badge-pill bg-gradient-success"></span>
    @else
        <span class="badge badge-pill bg-gradient-secondary"></span>
    @endif

</div>
