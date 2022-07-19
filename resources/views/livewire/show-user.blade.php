<div class="bg-gray-200 px-4 py-5 my-5 flex gap-10 items-center">
    <div class="w-2/12">
        <img
            class="rounded-full"
            src="{{ $user->imagen ?
                    asset('perfiles') . '/' . $user->imagen :
                    asset('img/usuario.svg')}}"
            alt="{{ $user->username }}"
        />
    </div> {{--Profile image--}}

    <div class="w-10/12">
        <a href="{{ route('posts.index', $user->username) }}" class="flex inline-flex">
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
                            class="bg-red-600 text-white uppercase rounded-lg px-3 py-1 text-sm font-bold cursor-pointer"
                            value="Dejar de seguir"
                        />
                    </form>
                @endif
            @endif
        @endauth
    </div>{{--Profile info--}}

</div>
