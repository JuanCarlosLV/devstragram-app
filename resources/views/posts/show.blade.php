@extends('layouts.app')

@section('title')
    {{ $post->title }}
@endsection

@section('content')
    <section class="flex container md:flex mx-auto">
        <div class="md:w-1/2">
            <img src="{{ asset('uploads' . '/' . $post->image) }}" alt="Imagen del post {{ $post->title }}">

            <div class="p-3 flex items-center gap-4">
                @auth

                    @if ($post->checkLike(Auth::user()))
                        <form action="{{ route('post.likes.destroy', $post) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <div class="my-4">
                                <button type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="red" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                    </svg>

                                </button>
                            </div>
                        </form>
                    @else
                        <form action="{{ route('post.likes.store', $post) }}" method="POST">
                            @csrf
                            <div class="my-4">
                                <button type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                    </svg>

                                </button>
                            </div>
                        </form>
                    @endif

                @endauth
                        <p class="font-medium text-lg"> {{ $post->likes->count()}} Likes</p>
                    </div>

                    <div>
                        <p class="font-bold">{{ $post->user->username }}</p>
                        <p class="text-sm text-gray-400">
                            {{ $post->created_at->diffForHumans() }}
                        </p>
                        <p class="mt-5">{{ $post->description }}</p>
                    </div>

                    @auth
                        @if ($post->user_id === Auth::user()->id)
                            <form method="POST" action="{{ route('posts.destroy', $post) }}">
                                @method('DELETE')
                                @csrf

                                <input type="submit" value="Delete post"
                                    class="bg-red-500 hover:bg-red-700 rounded text-white font-bold mt-4 p-2 cursor-pointer">
                            </form>
                        @endif
                    @endauth
                </div>

                <div class="md:w-1/2 p-5">
                    <div class="shadow bg-white p-5 mb-5">
                        @auth
                            <p class="text-xl font-bold text-center mb-4">
                                Add a comment
                            </p>

                            @if (session('mensaje'))
                                <div class="bg-green-800 text-white p-3 mb-5 rounded font-medium uppercase">
                                    {{ session('mensaje') }}
                                </div>
                            @endif

                            <form action="{{ route('comments.store', ['post' => $post, 'user' => $user]) }}" method="POST">
                                @csrf
                                <div class="mb-5 ">
                                    <label id="comment" for="description" class="mb-2 block uppercase text-gray-500 font-bold">
                                        Comentario
                                    </label>
                                    <textarea aria-invalid="comment" id="comment" name="comment" laceholder="Agrega un comentario"
                                        class="border p-3  w-full rounded-lg @error('comment') border-red-500  @enderror">
                            </textarea>

                                    @error('comment')
                                        <p class="my-2 px-4 py-2 bg-red-500 text-white rounded w-max ">{{ $message }}</p>
                                    @enderror
                                </div>
                                <input type="submit" value='Enviar comentario'
                                    class="bg-sky-600 hover:bg-sky-800 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
                            </form>

                        @endauth

                        <section class="bg-white shadow max-h-max overflow-y-scroll my-5">
                            @if ($post->comments->count())
                                @foreach ($post->comments as $comment)
                                    <section class="p-5 border-blue-500 border-b mb-3">
                                        <a href="{{ route('posts.index', $comment->user) }}" class="font-medium text-blue-800">
                                            {{ $comment->user->username }}
                                        </a>
                                        <p>{{ $comment->comment }}</p>
                                        <p class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>

                                    </section>
                                @endforeach
                            @else
                                <p class="text-sm font-medium text-orange-300 text-center p-10">No comments available</p>
                            @endif


                        </section>

                    </div>
                </div>

            </section>
        @endsection
