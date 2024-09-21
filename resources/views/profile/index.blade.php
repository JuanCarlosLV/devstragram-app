@extends('layouts.app')

@section('title')
    Edit profile: {{ Auth::user()->username }}
@endsection

@section('content')
    <div class="md:flex md:justify-center">

        <div class="md:w-1/2 bg-white shadow p-6">
            <form action="{{route('profile.store')}}" method="POST" class="mt-10 md:mt-0" enctype="multipart/form-data">
                @csrf
                <div class="mb-5 ">
                    <label id="username" for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                        Username
                    </label>
                    <input aria-invalid="username" name="username" type="text" placeholder="Ingresa tu nuevo username"
                        class="border p-3 w-full rounded-lg @error('username') border-red-500  @enderror"
                        value="{{ Auth::user()->username }}">

                    @error('username')
                        <p class="my-2 px-4 py-2 bg-red-500 text-white rounded w-max ">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5 ">
                    <label id="email" for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                        Email
                    </label>
                    <input aria-invalid="email" name="email" type="email" placeholder="Ingresa el nuevo correo"
                        class="border p-3 w-full rounded-lg @error('email') border-red-500  @enderror"
                        value="{{ Auth::user()->email }}">

                    @error('email')
                        <p class="my-2 px-4 py-2 bg-red-500 text-white rounded w-max ">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5 ">
                    <label id="image" for="image" class="mb-2 block uppercase text-gray-500 font-bold">
                        Profile photo
                    </label>
                    <input aria-invalid="image" name="image" type="file" accept=".jpg, .jpeg, .png"
                        class="border p-3 w-full rounded-lg " />
                </div>

                <input type="submit" value='Save changes'
                    class="bg-sky-600 hover:bg-sky-800 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>


            <form action="">

                <section class="flex flex-col mt-4 bg-red-400 px-3 py-3 rounded">
                    <p class="font-bold text-center text-red-900 text-xl">Dangerous Zone</p>

                    <section class="flex gap-4 items-center justify-between">

                        <div class="flex flex-col gap-2 w-[75%] ">
                            <p class="text-white font-bold text-lg">Delete you account</p>
                            <p class="text-white font-normal text-base text-pretty  ">
                                If you don't wanna have your account, be certain, once you delete your account there is no going back.
                            </p>
                        </div>
                        

                        <button class="rounded px-4 py-2 text-center text-red-600 bg-red-100 hover:bg-red-600 hover:text-white cursor-pointer w-max">
                            <p class="font-medium">Delete Profile</p>
                        </button>
                    </section>
                </section>
            </form>

        </div>

    </div>
@endsection
