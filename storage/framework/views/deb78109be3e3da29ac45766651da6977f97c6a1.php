<?php $__env->startSection('titulo'); ?>
    <?php echo e($user->username); ?> siguiendo
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
    <div class="mx-auto w-11/12 md:w-1/3">

        <?php if( $user->following->count() ): ?>
            <?php $__currentLoopData = $user->following; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('show-user', ['user' => $user])->html();
} elseif ($_instance->childHasBeenRendered('f9cN48p')) {
    $componentId = $_instance->getRenderedChildComponentId('f9cN48p');
    $componentTag = $_instance->getRenderedChildComponentTagName('f9cN48p');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('f9cN48p');
} else {
    $response = \Livewire\Livewire::mount('show-user', ['user' => $user]);
    $html = $response->html();
    $_instance->logRenderedChild('f9cN48p', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <p class="text-center">No hay usuarios</p>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/blairi/development/Laravel/devstagram/resources/views/following.blade.php ENDPATH**/ ?>