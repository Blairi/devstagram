@extends('layouts.app')

@section('titulo')
    {{ $post->titulo }}
@endsection

@section('contenido')
    <div class="container mx-auto md:flex" xmlns:livewire="http://www.w3.org/1999/html">

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

            <livewire:comment :post="$post"/>

        </div>

    </div>
@endsection
