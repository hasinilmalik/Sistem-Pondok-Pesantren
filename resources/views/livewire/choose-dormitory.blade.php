<div>
    <x-ui.loading />

    <div class="form-group mb-3">
        <label for="jenis_kelamin" class="form-control-label ucfirst">Jenis kelamin</label>
        <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" wire:model='selectedJk'>
            <option value="">--Jenis kelamin--</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
    </div>
    @if (!is_null($dormitories))
        <div class="form-group mb-3">
            <label for="dormitory_id" class="form-control-label ucfirst">Daerah</label>
            <select name="dormitory_id" id="dormitory_id" class="form-select" wire:model='selectedDaerah'>
                <option value="">--Pilih Daerah--</option>
                @foreach ($dormitories as $daerah)
                    <option value="{{ $daerah->id }}">{{ $daerah->name }}</option>
                @endforeach
            </select>
        </div>
    @endif
    @if (!is_null($asrama))
        <div class="form-group mb-3">
            <label for="asrama_id" class="form-control-label ucfirst">Asrama</label>
            <select name="rooms" id="asrama_id" class="form-select">
                <option value="">--Pilih Asrama--</option>
                @for ($i = 1; $i <= $asrama; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>"
                @endfor
            </select>
        </div>
    @endif
</div>
