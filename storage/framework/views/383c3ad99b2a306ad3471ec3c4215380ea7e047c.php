<div class="bg-gray-200 px-4 py-5 my-5 flex gap-10 items-center">
    <div class="w-2/12">
        <img
            class="rounded-full"
            src="<?php echo e($user->imagen ?
                    asset('perfiles') . '/' . $user->imagen :
                    asset('img/usuario.svg')); ?>"
            alt="<?php echo e($user->username); ?>"
        />
    </div> 

    <div class="w-10/12">
        <a href="<?php echo e(route('posts.index', $user->username)); ?>" class="flex inline-flex">
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
                            class="bg-red-600 text-white uppercase rounded-lg px-3 py-1 text-sm font-bold cursor-pointer"
                            value="Dejar de seguir"
                        />
                    </form>
                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>
    </div>

</div>
<?php /**PATH /home/blairi/development/Laravel/devstagram/resources/views/livewire/show-user.blade.php ENDPATH**/ ?>