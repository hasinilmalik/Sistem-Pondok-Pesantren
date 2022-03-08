<form method="post" action="{{ route('students.import') }}" enctype="multipart/form-data">
    @csrf
    <div class="modal-content">
        <div class="modal-body">
            <label>Pilih file excel</label>
            <div class="form-group">
                <input type="file" name="file" required="required">
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Import</button>
        </div>
    </div>
</form>
