<form method="post" action="{{ route('students.import') }}" enctype="multipart/form-data">
    @csrf
    <div class="modal-content">
        <div class="modal-body">
            <label>Pilih file excel</label>
            <div class="form-group">
                <input type="file" name="file" required="required">
            </div>
        </div>
        <div class="modal-body">
            <label>mulai baris ke</label>
            <div class="form-group">
                <input type="number" name="start" required="required">
            </div>
        </div>
        <div class="modal-body">
            <label>Limit</label>
            <div class="form-group">
                <input type="number" name="limit" required="required">
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Import</button>
        </div>
        <p>Terakhir : {{ $terbaru->nama }}</p>

    </div>
</form>
