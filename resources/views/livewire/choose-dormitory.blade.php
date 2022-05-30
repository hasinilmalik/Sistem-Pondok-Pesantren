<div>
    <div class="form-group mb-3">
        <label for="daerah_id" class="form-control-label ucfirst">Daerah</label>
        <select name="daerah" id="daerah_id" class="form-select" wire:model='selectedDaerah'>
            <option value="">--Pilih Daerah--</option>
            @foreach ($dormitories as $daerah)
                <option value="{{ $daerah->id }}">{{ $daerah->name }} ( {{ $daerah->gender }} )</option>
            @endforeach
        </select>
    </div>
    @if (!is_null($asrama))
        @php
            // dd($asrama);
        @endphp
        <div class="form-group mb-3">
            <label for="asrama_id" class="form-control-label ucfirst">Asrama</label>
            <select name="asrama" id="asrama_id" class="form-select">
                <option value="">--Pilih Asrama--</option>
                @for ($i = 0; $i < $asrama; $i++)
                    <option value="">{{ $i }}</option>"
                @endfor
            </select>
        </div>
    @endif
</div>
