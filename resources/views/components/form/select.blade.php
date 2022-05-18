<div>
    <div class="form-group">
        <label class="form-select-label" for="{{ $name }}">{{ $label }}</label>
        <select class="form-select" name="{{ $name }}" id="{{ $name }}">
            @foreach ($options as $item)
                <option value="{{ $item }}">{{ $item }}</option>
            @endforeach
        </select>
    </div>
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
            $("#a_pendidikan").select2({
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


{{-- conttoh penggunaan di depan --}}
{{-- <x-form.select name="select" :options="['Kawin', 'Belum kawin']" /> --}}
