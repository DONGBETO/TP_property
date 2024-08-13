@php
  $type = $type ?? 'text';
  $name = $name ?? '';
  $value = $value ?? '';
  $label = $label ?? ucfirst($name);
  $class = $class ?? null;  
@endphp

<div @class(['form-group', $class])>
    <label for="{{ $name }}">{{ $label }}</label>
    @if ($type == 'textarea')
        <textarea class="form-control  @error( $name ) is-invalid @enderror" name="{{ $name }}" type="{{ $type }}">{{ old($name, $value) }}</textarea>
    @else
        <input class="form-control  @error( $name ) is-invalid @enderror" type="{{ $type }}" name="{{ $name }}" value="{{old($name, $value)}}">
    @endif
    @error( $name )
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>