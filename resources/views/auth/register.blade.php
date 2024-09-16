@extends('Layouts.app')

@section('title')
    Registrate en Devstagram
@endsection

@section('content')
    <main class="md:flex md:justify-center md:gap-16 md:items-center ">
        <div class="md:w-5/12 p-5">
            <img src="{{ asset('images/registrar.jpg') }}" alt="imagen de registro de usuarios">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-lg">
            <form action="{{route('register')}}" method="POST" novalidate>
                @csrf
                <div class="mb-5 ">
                    <label id="name" for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                        Nombre
                    </label>
                    <input aria-invalid="name" name="name" type="text" placeholder="Ingresa tu nombre"
                    class="border p-3 w-full rounded-lg @error('name') border-red-500  @enderror"
                    value="{{ old('name') }}"
                    >

                    @error('name')
                        <p class="my-2 px-4 py-2 bg-red-500 text-white rounded w-max ">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5 ">
                    <label id="username" for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                        Username
                    </label>
                    <input id="username" name="username" type="text" placeholder="Ingresa tu nombre de usuario"
                        class="border p-3 w-full rounded-lg @error('username') border-red-500  @enderror"
                        value="{{ old('username') }}"
                        >
                    @error('username')
                        <p class="my-2  px-4 py-2 bg-red-500 text-white rounded w-max ">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="email" id="labelForm" class="mb-2 block uppercase text-gray-500 font-bold">
                        Email
                    </label>
                    <input id="email" name="email" type="email" placeholder="Correo"
                        class="border p-3 w-full rounded-lg @error('email') border-red-500  @enderror"
                        value="{{ old('email') }}"
                        >
                    @error('email')
                        <p class=" px-4 py-2 bg-red-500 text-white rounded w-max my-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5 ">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                        Password
                    </label>
                    <input id="password" name="password" type="password" placeholder="Tu contraseña"
                        class="border p-3 w-full rounded-lg @error('password') border-red-500  @enderror" >
                    @error('password')
                        <p class=" px-4 py-2 bg-red-500 text-white rounded w-max my-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5 ">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">
                        Confirma tu password
                    </label>
                    <input id="password_confirmation" name="password_confirmation" type="password"
                        placeholder="Repite tu password" class="border p-3 w-full rounded-lg ">
                    
                </div>

                <input type="submit" value='Crear cuenta'
                    class="bg-sky-600 hover:bg-sky-800 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>

        </div>
    </main>
@endsection
