<div>
    <ul class="flex flex-row overflow-x-scroll lg:overflow-x-auto lg:flex-col gap-2">
        @foreach($users as $user)
            <li class="min-w-[110px]">
                <livewire:user-profile :user="$user"/>
            </li>
        @endforeach
    </ul>
</div>

