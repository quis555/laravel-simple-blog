<div class="@if($type !== 'file') form-floating @endif mt-2">
    @if($type === 'file')
        <label for="{{ $name }}">{{ $label }}</label>
    @endif
    <input type="{{ $type }}" class="form-control @error($name) is-invalid @enderror" id="{{ $name }}"
           placeholder="{{ $placeholder }}" name="{{ $name }}" value="{{ old($name, $value) }}">
    @if($type !== 'file')
        <label for="{{ $name }}">{{ $label }}</label>
    @endif
    @if(strlen($info))
        <p class="text-muted">{{ $info }}</p>
    @endif
    @error($name)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
