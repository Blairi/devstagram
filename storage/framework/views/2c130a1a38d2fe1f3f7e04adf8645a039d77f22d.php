<div
    class="flex flex-col justify-center lg:flex-row px-4 py-5 gap-1 items-center lg:justify-start h-[110px] h-full overflow-hidden"
>

    <div class="w-[52px] lg:w-[70px]">
        <img
            class="rounded-full w-full object-cover object-center"
            src="<?php echo e($user->imagen ?
                    asset('perfiles') . '/' . $user->imagen :
                    asset('img/usuario.svg')); ?>"
            alt="<?php echo e($user->username); ?>"
        />
    </div> 

    <div class="flex flex-col justify-center">
        <a href="<?php echo e(route('posts.index', $user->username)); ?>" class="block text-center lg:text-left">
            <p class="my-1"><?php echo e($user->username); ?></p>
        </a>
        <?php if(auth()->guard()->check()): ?>
            <?php if($user->id !== auth()->user()->id): ?>
                <?php if( !$user->siguiendo( auth()->user() ) ): ?>
                    <form method="post" action="<?php echo e(route('users.follow', $user)); ?>">
                        <?php echo csrf_field(); ?>
                        <input
                            type="submit"
                            class="bg-blue-600 text-white uppercase rounded-lg px-3 py-1 text-sm font-bold cursor-pointer"
                            value="Seguir"
                        />
                    </form>
                <?php else: ?>
                    <form method="post" action="<?php echo e(route('users.unfollow', $user)); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <input
                            type="submit"
                            class="bg-gray-400 text-white uppercase rounded-lg px-3 py-1 text-sm font-bold cursor-pointer"
                            value="Siguiendo"
                        />
                    </form>
                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>
    </div>

</div>

<?php /**PATH /home/blairi/development/Laravel/devstagram/resources/views/livewire/user-profile.blade.php ENDPATH**/ ?>