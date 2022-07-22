@extends('layouts.app')

@section('titulo')
    Seguidores de {{ $user->username }}
@endsection

@section('contenido')
    <div class="mx-auto w-11/12 md:w-1/3">

        @if( $user->followers->count() )
            @foreach($user->followers as $user)
                <livewire:user-profile :user="$user"/>
            @endforeach
        @else
            <p class="text-center">No hay usuarios</p>
        @endif
{{--        <livewire:show-user :user="$user"/>--}}
    </div>
@endsection
