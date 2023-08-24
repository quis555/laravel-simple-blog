<div class="form-floating mt-2">
    <select name="{{ $name }}" class="form-select @error($name) is-invalid @enderror" id="{{ $name }}">
        @foreach($options as $option => $optionLabel)
            <option
                value="{{ $option }}" {{ old($name, $value) === $option ? 'selected' : '' }}>{{ $optionLabel }}</option>
        @endforeach
    </select>
    <label for="{{ $name }}">{{ $label }}</label>
    @error($name)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
