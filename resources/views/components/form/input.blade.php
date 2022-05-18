<div>
    <div class="form-group">
        <label for="{{ $name }}" class="form-control-label ucfirst">{{ $label ?: $name }}</label>
        <input type="{{ $type ?? 'text' }}" name="{{ $name }}" id="{{ $name }}" class="form-control"
            value="{{ $value }}" placeholder="{{ $placeholder ?: $label }}">
        @if ($errors->has($name))
            <div class="invalid-feedback">
                {{ $errors->first($name) }}
            </div>
        @endif
    </div>
</div>


{{-- Contoh penggunaan di depan --}}
{{-- <x-form.input name="coba" type="text" value="{{ old('coba') }}" /> --}}
