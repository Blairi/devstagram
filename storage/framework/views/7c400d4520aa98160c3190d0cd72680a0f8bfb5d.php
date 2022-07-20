<div>
    <?php if( $posts->count() ): ?>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div>
                    <a href="<?php echo e(route('posts.show', ['post' => $post, 'user' => $post->user ])); ?>">
                        <img src="<?php echo e(asset('uploads') . '/' . $post->imagen); ?>"
                             alt="Imagen del post <?php echo e($post->titulo); ?>">
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="my-10">
            <?php echo e($posts->links('pagination::tailwind')); ?>

        </div>
    <?php else: ?>
        <p class="text-center">No hay posts</p>
    <?php endif; ?>
</div>
<?php /**PATH /home/blairi/Documents/Laravel/devstagram/resources/views/components/listar-post.blade.php ENDPATH**/ ?>