<div>

    @auth
        <form class="shadow bg-white p-5 mb-5" wire:submit.prevent='comment()'>

            <div class="mb-5">

                <label for="comentario" class="mb-2 block uppercase text-gray-500 font-bold">
                    Añade un Comentario
                </label>

                <textarea
                    id="comentario"
                    wire:model.lazy="comentario"
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

            <button
                type="submit"
                class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
            >Comentar
            </button>

        </form>
    @endauth {{--  Input  --}}

    <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll">

        @if( $comments->count() )
            @foreach( $comments as $commentary )
                <livewire:commentary :commentary="$commentary" :wire:key="$commentary->id"/>
            @endforeach
        @else
            <p class="p-10 text-center">No hay comentarios aún.</p>
        @endif
    </div> {{-- Comments --}}
</div>
