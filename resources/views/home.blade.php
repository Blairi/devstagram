@extends('layouts.app')

{{--@section('titulo')--}}
{{--    Nuevas publicaciones--}}
{{--@endsection--}}

@section('contenido')

    <div class="flex flex-col flex-col-reverse lg:flex-row gap-5">
        <div class="lg:w-9/12 xl:w-10/12">
            <x-listar-post :posts="$posts" />
        </div>

        <div class="lg:w-3/12 xl:w-2/12 lg:fixed lg:right-0 ">
            <h3 class="text-center lg:text-left my-1">Nuevos usuarios:</h3>
            <livewire:list-users :users="$users" />
        </div>
    </div>

@endsection
