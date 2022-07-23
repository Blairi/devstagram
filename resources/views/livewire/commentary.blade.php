<div
    class="flex items-center border-gray-300 border-b {{
        $commentary->created_at->diffInSeconds() < 5 ? 'animate-[newCommentary_0.6s_ease-in-out]' : ''
    }}"
>

    <div class="p-2 w-2/12 md:w-3/12 lg:w-1/12 flex items-center">
        <a href="{{ route('posts.index', $commentary->user) }}">
            <img
                class="rounded-full"
                src="{{ $commentary->user->imagen ?
                                            asset('perfiles') . '/' . $commentary->user->imagen :
                                            asset('img/usuario.svg')}}"
                alt="{{ $commentary->user->username }}"
            />
        </a>
    </div>

    <div class="p-2 flex justify-between items-center w-10/12 md:w-9/12 lg:w-11/12">

        <div>
            <a href="{{ route('posts.index', $commentary->user) }}" class="font-bold">
                {{ $commentary->user->username }}
            </a>
            <p>{{$commentary->comentario}}</p>
            <p class="text-sm text-gray-500">{{$commentary->created_at->diffForHumans()}}</p>
        </div>

        <div class="mr-5">
            @auth
                <livewire:like-commentary :commentary="$commentary"/>
            @endauth

            @guest
                <div class="flex flex-col items-center">
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                             fill="white"
                             viewBox="0 0 24 24"
                             stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </button>

                    <p class="font-bold">
                        {{ $commentary->likes()->count() }}
                    </p>

                </div>
            @endguest
        </div>

    </div>

</div>
