@extends('layouts.app')

@section('title')
    Crea una nueva publicación
@endsection

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('content')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            <form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data" id='dropzone'
                class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                @csrf
            </form>
        </div>
        <div class="md:w-1/2 p-8 mt-10 md:mt-0 bg-white rounded-lg shadow-lg">
            <form action="{{ route('register') }}" method="POST" novalidate>
                @csrf
                <div class="mb-5 ">
                    <label id="title" for="title" class="mb-2 block uppercase text-gray-500 font-bold">
                        Titulo
                    </label>
                    <input aria-invalid="title" id="title" name="title" type="text"
                        placeholder="Titulo de la publicación"
                        class="border p-3 w-full rounded-lg @error('name') border-red-500  @enderror"
                        value="{{ old('name') }}">

                    @error('name')
                        <p class="my-2 px-4 py-2 bg-red-500 text-white rounded w-max ">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5 ">
                    <label id="description" for="description" class="mb-2 block uppercase text-gray-500 font-bold">
                        Descripción
                    </label>
                    <textarea aria-invalid="description" id="description" name="description" laceholder="Descripción de la publicación"
                        class="border p-3 w-full rounded-lg @error('name') border-red-500  @enderror">
                        "{{ old('name') }}</textarea>

                    @error('name')
                        <p class="my-2 px-4 py-2 bg-red-500 text-white rounded w-max ">{{ $message }}</p>
                    @enderror
                </div>




                <input type="submit" value='Crear cuenta'
                    class="bg-sky-600 hover:bg-sky-800 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection
