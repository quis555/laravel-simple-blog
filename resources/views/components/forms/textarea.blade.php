<div class="form-floating mt-2">
    <textarea class="form-control @error($name) is-invalid @enderror" id="{{ $name }}"
              placeholder="{{ $placeholder }}"
              name="{{ $name }}"
              style="height: {{ $height }}px;">{{ old($name, $value) }}</textarea>
    <label for="{{ $name }}">{{ $label }}</label>
    @error($name)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
