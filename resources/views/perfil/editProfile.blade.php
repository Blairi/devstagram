@extends('layouts.app')

@section('titulo')
    Editar Credenciales
@endsection

@section('contenido')
    <div class="mx-auto container sm:w-2/3 md:w-1/3 px-3 md:px-0">
        <form method="post" action="{{ route('credentials.index') }}">
            @csrf
            <div class="mb-5">
                <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                    Email
                </label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    placeholder="Tu Email"
                    value="{{ auth()->user()->email }}"
                    class="border p-3 w-full rounded-lg
                        @error('email')
                            border-red-500
                        @enderror
                        "
                />
                @error('email')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                    Nuevo Password
                </label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    placeholder="Nuevo Password"
                    class="border p-3 w-full rounded-lg
                        @error('password')
                            border-red-500
                        @enderror
                        "
                />
                @error('password')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">
                    Repetir Nuevo Password
                </label>
                <input
                    id="password_confirmation"
                    type="password"
                    name="password_confirmation"
                    placeholder="Repite tu Nuevo Password"
                    class="border p-3 w-full rounded-lg"
                />
            </div>

            <div class="flex gap-2 bg-blue-400 text-white p-2 rounded-lg mb-5 inline-flex">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <p>Para editar tus credenciales de acceso es necesario escribir tu contraseña actual.</p>
            </div>

            <div class="mb-5">
                <label for="actualPassword" class="mb-2 block uppercase text-gray-500 font-bold">
                    Password Actual
                </label>
                <input
                    id="actualPassword"
                    type="password"
                    name="actualPassword"
                    placeholder="Password Actual"
                    class="border p-3 w-full rounded-lg
                        @error('actualPassword')
                            border-red-500
                        @enderror
                        "
                />
                @error('actualPassword')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                    {{ $message }}
                </p>
                @enderror
            </div>

            @if(session('message'))
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                    {{ session('message') }}
                </p>
            @endif

            <input
                type="submit"
                value="Guardar cambios"
                class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
            />

        </form>
    </div>
@endsection
