@extends('layouts.app')


@section('title')
    Perfil: {{ $user->username }}
@endsection

@section('content')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">

            <div class="w-4/12 lg:w-6/12 px-5 ">
                <img src="{{ asset('images/usuario.svg') }}" alt="icono del perfil del usuario">
            </div>
            <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center md:items-start md:my-10 my-10">
                <p class="text-gray-500 text-2xl">{{ $user->username }}</p>

                <p class="text-gray-800 text-sm mb-3 mt-5 font-bold ">
                    0
                    <span class="font-normal">Seguidores</span>

                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    0
                    <span class="font-normal">Siguienod</span>

                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    0
                    <span class="font-normal">Posts</span>

                </p>
            </div>

        </div>

    </div>
@endsection
