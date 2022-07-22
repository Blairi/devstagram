<?php $__env->startSection('titulo'); ?>
    <?php echo e($post->titulo); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
    <div class="container mx-auto md:flex" xmlns:livewire="http://www.w3.org/1999/html">

        <div class="md:w-1/2">
            <img src="<?php echo e(asset('uploads') . '/' . $post->imagen); ?>" alt="Imagen del post <?php echo e($post->titulo); ?>">
            <div class="p-3 flex items-center gap-4">
                <?php if(auth()->guard()->check()): ?>

                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('like-post', ['post' => $post])->html();
} elseif ($_instance->childHasBeenRendered('Kj81SUq')) {
    $componentId = $_instance->getRenderedChildComponentId('Kj81SUq');
    $componentTag = $_instance->getRenderedChildComponentTagName('Kj81SUq');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Kj81SUq');
} else {
    $response = \Livewire\Livewire::mount('like-post', ['post' => $post]);
    $html = $response->html();
    $_instance->logRenderedChild('Kj81SUq', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

                <?php endif; ?>

            </div>
            <div>
                <p class="font-bold"><?php echo e($post->user->username); ?></p>
                <p class="text-sm text-gray-500">
                    <?php echo e($post->created_at->diffForHumans()); ?>

                </p>
                <p class="mt-5">
                    <?php echo e($post->descripcion); ?>

                </p>
            </div>

            <?php if(auth()->guard()->check()): ?>
                <?php if( $post->user_id == auth()->user()->id ): ?>
                    <form method="post" action="<?php echo e(route('posts.destroy', $post)); ?>">
                        <?php echo method_field('DELETE'); ?>
                        <?php echo csrf_field(); ?>
                        <input
                            type="submit"
                            value="Eliminar publicación"
                            class="bg-red-500 hover:bg-red-600 p-2 rounded text-white font-bold mt-4 cursor-pointer"
                        />
                    </form>
                <?php endif; ?>
            <?php endif; ?>

        </div>

        <div class="md:w-1/2 p-5 pt-0">

            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('comment', ['post' => $post])->html();
} elseif ($_instance->childHasBeenRendered('h8KbGrj')) {
    $componentId = $_instance->getRenderedChildComponentId('h8KbGrj');
    $componentTag = $_instance->getRenderedChildComponentTagName('h8KbGrj');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('h8KbGrj');
} else {
    $response = \Livewire\Livewire::mount('comment', ['post' => $post]);
    $html = $response->html();
    $_instance->logRenderedChild('h8KbGrj', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/blairi/development/Laravel/devstagram/resources/views/posts/show.blade.php ENDPATH**/ ?>