<div>
    <div class="form-group mb-3">
        <label for="provinsi_id" class="form-control-label ucfirst">Provinsi</label>
        <select name="provinsi" id="provinsi_id" class="form-select" wire:model='selectedProvinsi'>
            @foreach ($prov as $pro)
                <option value="{{ $pro->id }}">{{ $pro->name }}</option>
            @endforeach
        </select>
    </div>
    <span wire:loading class="text-danger">Loading...</span>
    @if (!is_null($kota))
        <div class="form-group mb-3">
            <label for="kota_id" class="form-control-label ucfirst">Kota</label>
            <select name="kota" id="kota_id" class="form-select">
                @foreach ($kota as $kota)
                    <option value="{{ $kota->id }}">{{ $kota->name }}</option>
                @endforeach
            </select>
        </div>
    @endif
    {{-- @if (!is_null($kecamatan))
        <div class="form-group mb-3">
            <label for="kecamatan_id" class="form-control-label ucfirst">Kecamatan</label>
            <select name="kecamatan" id="kecamatan_id" class="form-select" wire:model="selectedKecamatan">
                @foreach ($kecamatan as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
    @endif --}}
</div>

@push('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
        integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@push('foot')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $("#provinsi").select2({
                placeholder: "Please Select"
            });
        });
        $(document).ready(function() {
            $("#a_pekerjaan").select2({
                placeholder: "Please Select"
            });
        });
        $(document).ready(function() {
            $("#a_penghasilan").select2({
                placeholder: "Please Select"
            });
        });
        $(document).ready(function() {
            $("#i_pendidikan").select2({
                placeholder: "Please Select"
            });
        });
        $(document).ready(function() {
            $("#i_pekerjaan").select2({
                placeholder: "Please Select"
            });
        });
        $(document).ready(function() {
            $("#i_penghasilan").select2({
                placeholder: "Please Select"
            });
        });
        $(document).ready(function() {
            $("#w_pekerjaan").select2({
                placeholder: "Please Select"
            });
        });
        $(document).ready(function() {
            $("#w_penghasilan").select2({
                placeholder: "Please Select"
            });
        });
        $(document).ready(function() {
            $("#kebutuhan_khusus").select2({
                placeholder: "Please Select"
            });
        });
    </script>
@endpush
