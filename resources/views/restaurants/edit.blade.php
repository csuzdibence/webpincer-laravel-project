@extends('layouts.base')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.css" integrity="sha512-7uSoC3grlnRktCWoO4LjHMjotq8gf9XDFQerPuaph+cqR7JC9XKGdvN+UwZMC14aAaBDItdRj3DcSDs4kMWUgg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush



@section('content')
<form action="{{ route('restaurant.edit', $restaurant) }}" method="POST">
    @csrf
    <div class="d-flex mb-5">
        <h4 class="display-4">{{ __('Editing') }}: {{ $restaurant->name }}</h4>
        <button class="ms-auto btn btn-primary btn-lg">{{ __('Update') }}</button>
    </div>
    <div class="row flex-md-row-reverse">
        <div class="col-md-4">            
            <div class="card mb-4">
                <div class="card-body">
                    @if ($restaurant->has_image)
                        <img class="img-fluid" src="{{ $restaurant->cover_image }}" alt="" />
                    @else
                    <div id="image-upload" class="dropzone"></div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <x-form.input name="name" type="text" label="{{ __('Restaurant name') }}" value="{{$restaurant->name}}" />
                    </div>
                    <div class="mb-3">
                        <x-form.input name="ownerName" type="text" label="{{ __('Owner name') }}" value="{{$restaurant->ownerName}}" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'),{})
        .then(editor => { console.log(editor) })
        .catch(error => { console.error(error) })

    Dropzone.autoDiscover = false
    const myDropzone = new Dropzone('#image-upload', {
        headers: {
            'x-csrf-token': '{{ csrf_token() }}'
        },
        paramName: 'image',
        url: '{{ route("restaurant.image", $restaurant) }}',
    })
</script>
@endpush