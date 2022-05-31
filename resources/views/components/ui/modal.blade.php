<div class="modal fade" id="{{ $id }}">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            @if ($modalHeader == true)
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ $title ?? '' }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="modal-body">
                {{ $body ?? '' }}
            </div>
            <div class="modal-footer justify-content-between">
                {{ $footer ?? '' }}
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
