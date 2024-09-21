@extends('layouts.app')


@section('title')
    Perfil: {{ $user->username }}
@endsection

@section('content')
    <div class="flex justify-center ">
        <div class="w-full md:w-9/12 lg:w-7/12 flex flex-col items-center justify-center md:flex-row ">


            <div class="md:size-60 size-40">
                <img src="{{ $user->image ? asset('profiles') . '/' . $user->image : asset('images/usuario.svg') }}"
                    alt="icono del perfil del usuario" class="rounded-full size-full md:object-cover object-fill">
            </div>

            <div
                class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center md:items-start md:my-10 my-10 ">
                <div class="flex gap-2 items-center">
                    <p class="text-gray-500 text-2xl">{{ $user->username }}</p>

                    @auth
                        @if ($user->id === Auth::user()->id)
                            <a class="rounded px-4 py-2 text-center bg-gray-200 border border-black text-black
                            hover:bg-gray-100 
                            "
                                href="{{ route('profile.index') }}">
                                <p>Edit Profile</p>
                            </a>
                        @endif

                    @endauth

                </div>

                <section class="flex gap-3 items-center my-3">
                    <p class="text-gray-800 text-sm  font-bold ">
                        {{ $user->followers->count() }}
                        <span class="font-normal ">
                            @choice('Follower|Followers', $user->followers->count())
                
                        </span>
                    </p>
                    <p class="text-gray-800 text-sm  font-bold">
                        {{ $user->followings->count()}}
                        <span class="font-normal ">
                            Following
                        </span>

                    </p>
                    <p class="text-gray-800 text-sm font-bold">
                        {{ $user->posts->count() }}
                        <span class="font-normal">Posts</span>

                    </p>
                </section>
                @auth
                    @if ($user->id !== Auth::user()->id)
                        @if (!$user->isFollowing(Auth::user()))
                            <form action="{{ route('users.follow', $user) }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-black text-white font-medium rounded px-3 py-2">Follow</button>
                            </form>
                        @else
                            <form action="{{ route('users.unfollow', $user) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit"
                                    class="bg-black text-white font-medium rounded px-3 py-2">Unfollow</button>
                            </form>
                        @endif
                    @endif
                @endauth

            </div>

        </div>

    </div>

    <section class="w-4/5 mx-auto mt-10 ">
        <h2 class="text-4xl text-center font-black my-10">Posts</h2>

        @if ($posts->count())
            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach ($posts as $post)
                    <div>

                        <a href="{{ route('posts.show', ['post' => $post, 'user' => $user]) }}">
                            <img src="{{ asset('uploads') . '/' . $post->image }}"
                                alt="imagen del post {{ $post->title }}">
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="my-10">
                {{ $posts->links('pagination::tailwind') }}
            </div>
        @else
            <p class="text-gray-600 font-medium
            
             uppercase text-sm text-center">No posts available
            </p>
        @endif


    </section>
@endsection
