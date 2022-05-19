@hasrole('guest')
    <div class="w-100 text-center">
        {{-- <a class="github-button" href="https://github.com/creativetimofficial/soft-ui-dashboard"
                            data-icon="octicon-star" data-size="large" data-show-count="true"
                            aria-label="Star creativetimofficial/soft-ui-dashboard on GitHub">Star</a> --}}
        <h6 class="mt-3">Bagikan yuk</h6>
        <a href="whatsapp://send?text=Yuk! Daftar sekarang di Pondok Pesantren Miftahul Ulum Banyuputih Kidul Lumajang ~ https://www.santribaru.com"
            class="btn btn-success mb-0 me-2" target="_blank">
            <i class="fab fa-whatsapp me-1" aria-hidden="true"></i> Whatsapp
        </a>
        <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.santribaru.com" class="btn btn-info mb-0 me-2"
            target="_blank">
            <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Facebook
        </a>
    </div>
@endhasrole
@hasrole('admin|super admin')
    @livewire('ui.cek-wa')
@endhasrole
