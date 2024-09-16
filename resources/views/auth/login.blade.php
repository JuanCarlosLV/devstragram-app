@extends('Layouts.app')

@section('title')
    Iniciar sesión en Devstagram
@endsection

@section('content')
    <main class="md:flex md:justify-center md:gap-16 md:items-center ">
        <div class="md:w-5/12 p-5">
            <img src="{{ asset('images/login.jpg') }}" alt="imagen de login de usuarios">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-lg">
            <form method="POST" action="{{ route('login') }}" novalidate>
                @csrf

                @if (session('mensaje'))
                    <p class=" px-4 py-2 bg-red-500 text-white rounded w-max my-2">{{ session('mensaje') }}</p>
                @endif

                <div class="mb-5">
                    <label for="email" id="labelForm" class="mb-2 block uppercase text-gray-500 font-bold">
                        Email
                    </label>
                    <input id="email" name="email" type="email" placeholder="Correo"
                        class="border p-3 w-full rounded-lg @error('email') border-red-500  @enderror"
                        value="{{ old('email') }}">
                    @error('email')
                        <p class=" px-4 py-2 bg-red-500 text-white rounded w-max my-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5 ">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                        Password
                    </label>
                    <input id="password" name="password" type="password" placeholder="Tu contraseña"
                        class="border p-3 w-full rounded-lg @error('password') border-red-500  @enderror">
                    @error('password')
                        <p class=" px-4 py-2 bg-red-500 text-white rounded w-max my-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-5 flex gap-2 items-center">
                    <input type="checkbox" name="remember" id="remember" placeholder="Recuerdame">
                    <label class="text-sm text-gray-500 font-medium">Recuerdame</label>
                </div>
                <input type="submit" value='Iniciar sesión'
                    class="bg-sky-600 hover:bg-sky-800 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>

        </div>
    </main>
@endsection
