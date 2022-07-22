@extends('layouts.app')

@section('titulo')
    {{ $user->username }} siguiendo
@endsection

@section('contenido')
    <div class="mx-auto w-11/12 md:w-1/3">

        @if( $user->following->count() )
            @foreach($user->following as $user)
                <livewire:user-profile :user="$user"/>
            @endforeach
        @else
            <p class="text-center">No hay usuarios</p>
        @endif
    </div>
@endsection
