<div
    class="flex flex-col justify-center lg:flex-row px-4 py-5 gap-1 items-center lg:justify-start h-[110px] h-full overflow-hidden"
>

    <div class="w-[52px] lg:w-[70px]">
        <img
            class="rounded-full w-full object-cover object-center"
            src="{{ $user->imagen ?
                    asset('perfiles') . '/' . $user->imagen :
                    asset('img/usuario.svg')}}"
            alt="{{ $user->username }}"
        />
    </div> {{--Profile image--}}

    <div class="flex flex-col justify-center">
        <a href="{{ route('posts.index', $user->username) }}" class="block text-center lg:text-left">
            <p class="my-1">{{$user->username}}</p>
        </a>
        @auth
            @if($user->id !== auth()->user()->id)
                @if( !$user->siguiendo( auth()->user() ) )
                    <form method="post" action="{{ route('users.follow', $user) }}">
                        @csrf
                        <input
                            type="submit"
                            class="bg-blue-600 text-white uppercase rounded-lg px-3 py-1 text-sm font-bold cursor-pointer"
                            value="Seguir"
                        />
                    </form>
                @else
                    <form method="post" action="{{ route('users.unfollow', $user) }}">
                        @csrf
                        @method('DELETE')
                        <input
                            type="submit"
                            class="bg-gray-400 text-white uppercase rounded-lg px-3 py-1 text-sm font-bold cursor-pointer"
                            value="Siguiendo"
                        />
                    </form>
                @endif
            @endif
        @endauth
    </div>{{--Profile info--}}

</div>

