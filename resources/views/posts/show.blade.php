@extends('layouts.app')

@section('titulo')
    {{ $post->titulo }}
@endsection

@section('contenido')
    <div class="container mx-auto md:flex">

        <div class="md:w-1/2">
            <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen del post {{ $post->titulo }}">
            <div class="p-3 flex items-center gap-4">
                @auth

                    <livewire:like-post :post="$post"/>

                @endauth

            </div>
            <div>
                <p class="font-bold">{{ $post->user->username }}</p>
                <p class="text-sm text-gray-500">
                    {{ $post->created_at->diffForHumans() }}
                </p>
                <p class="mt-5">
                    {{ $post->descripcion }}
                </p>
            </div>

            @auth
                @if( $post->user_id == auth()->user()->id )
                    <form method="post" action="{{ route('posts.destroy', $post) }}">
                        @method('DELETE')
                        @csrf
                        <input
                            type="submit"
                            value="Eliminar publicación"
                            class="bg-red-500 hover:bg-red-600 p-2 rounded text-white font-bold mt-4 cursor-pointer"
                        />
                    </form>
                @endif
            @endauth

        </div>

        <div class="md:w-1/2 p-5 pt-0">
            <div class="shadow bg-white p-5 mb-5">
                @auth
                    <p class="text-xl font-bold text-center mb-4">Agrega un nuevo comentario.</p>

                    @if(session('mensaje'))
                        <div class="bg-green-500 p-2 rounded-lg mb-6 text-white uppercase font-bold">
                            {{ session('mensaje') }}
                        </div>
                    @endif

                    <form action="{{ route('comentarios.store', ['post' => $post, 'user' => $user ]) }}" method="post">
                        @csrf
                        <div class="mb-5">
                            <label for="comentario" class="mb-2 block uppercase text-gray-500 font-bold">
                                Añade un Comentario
                            </label>
                            <textarea
                                id="comentario"
                                name="comentario"
                                placeholder="Comentario de la publicación"
                                class="border p-3 w-full rounded-lg
                            @error('comentario')
                                border-red-500
                            @enderror
                            "
                            ></textarea>
                            @error('comentario')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <input
                            type="submit"
                            value="Comentar"
                            class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                        />
                    </form>
                @endauth
            </div>

            <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll">
                @if($post->comentarios->count())
                    @foreach( $post->comentarios as $comentario )
                        <div class="flex items-center border-gray-300 border-b">
                            <div class="p-2 w-2/12 md:w-3/12 lg:w-1/12 flex items-center">
                                <a href="{{ route('posts.index', $comentario->user) }}">
                                    <img
                                        class="rounded-full"
                                        src="{{ $comentario->user->imagen ?
                                            asset('perfiles') . '/' . $comentario->user->imagen :
                                            asset('img/usuario.svg')}}"
                                        alt="{{ $comentario->user->username }}"
                                    />
                                </a>
                            </div>
                            <div class="p-2 w-10/12 md:w-9/12 lg:w-11/12">
                                <a href="{{ route('posts.index', $comentario->user) }}" class="font-bold">
                                    {{ $comentario->user->username }}
                                </a>
                                <p>{{$comentario->comentario}}</p>
                                <p class="text-sm text-gray-500">{{$comentario->created_at->diffForHumans()}}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="p-10 text-center">No hay comentario aún.</p>
                @endif
            </div>

        </div>

    </div>
@endsection
