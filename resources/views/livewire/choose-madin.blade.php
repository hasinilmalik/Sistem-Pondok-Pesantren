<div>
    <div class="form-group">
        <label for="formal" class="form-control-label ucfirst">Pendidikan Formal</label>
        <p><small style="color: gray; font-style:italic"> (Lembaga formal yang akan ditempuh di
                pesantren) </small></p>
        <select name="formal_institution_id" id="formal" class="form-select">
            <option value="">Tidak ada</option>
            @foreach ($formal as $frm)
                <option value="{{ $frm->id }}">{{ $frm->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="madin" class="form-control-label ucfirst">Madin</label>
        <p><small style="color: gray; font-style:italic"> (Madrasah diniyah yang akan ditempuh di
                pesantren) </small>
        </p>
        <select name="madin_institution_id" id="madin" class="form-select">
            @foreach ($madin as $mdn)
                <option value="{{ $mdn->id }}">{{ $mdn->name }}</option>
            @endforeach
        </select>
    </div>
</div>
