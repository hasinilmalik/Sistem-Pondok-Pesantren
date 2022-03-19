@extends('layouts/app')
@section('judul', 'Upload Foto')
@section('prefix', 'Santri Baru')

@section('content')
    <form action="{{ route('guest.store_foto') }}" enctype="multipart/form-data" method="POST">
        @method('POST')
        @csrf
        <div class="card mb-3" id="extab5">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="fosan" class="form-label">Foto Santri</label>
                                <input class="form-control" type="file" id="fosan" name="foto">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="fowa" class="form-label">Foto Ayah/Wali</label>
                            <input class="form-control" type="file" id="fowa" name="foto_wali">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
@endsection
