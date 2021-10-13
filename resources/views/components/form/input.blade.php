<div>
    @if ($label)        
        <label for="{{$name}}">
            {{$label}}
        </label>
    @endif
    <input type="{{ $type }}" class="form-control @error($name) is-invalid @enderror" name="{{$name}}" value="{{ old($name) }}">
    @error($name)
    <div class="invalid-feedback">
        {{$message}}
    </div>
    @enderror
</div>