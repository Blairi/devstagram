<div
    class="flex items-center border-gray-300 border-b <?php echo e($commentary->created_at->diffInSeconds() < 5 ? 'animate-[newCommentary_0.6s_ease-in-out]' : ''); ?>"
>

    <div class="p-2 w-2/12 md:w-3/12 lg:w-1/12 flex items-center">
        <a href="<?php echo e(route('posts.index', $commentary->user)); ?>">
            <img
                class="rounded-full"
                src="<?php echo e($commentary->user->imagen ?
                                            asset('perfiles') . '/' . $commentary->user->imagen :
                                            asset('img/usuario.svg')); ?>"
                alt="<?php echo e($commentary->user->username); ?>"
            />
        </a>
    </div>

    <div class="p-2 w-10/12 md:w-9/12 lg:w-11/12">
        <a href="<?php echo e(route('posts.index', $commentary->user)); ?>" class="font-bold">
            <?php echo e($commentary->user->username); ?>

        </a>
        <p><?php echo e($commentary->comentario); ?></p>
        <p class="text-sm text-gray-500"><?php echo e($commentary->created_at->diffForHumans()); ?></p>
    </div>

</div>
<?php /**PATH /home/blairi/development/Laravel/devstagram/resources/views/livewire/commentary.blade.php ENDPATH**/ ?>