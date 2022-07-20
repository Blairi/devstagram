<?php $__env->startSection('titulo'); ?>
    Seguidores de <?php echo e($user->username); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
    <div class="mx-auto w-11/12 md:w-1/3">

        <?php if( $user->followers->count() ): ?>
            <?php $__currentLoopData = $user->followers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('show-user', ['user' => $user])->html();
} elseif ($_instance->childHasBeenRendered('qQ3Zo0X')) {
    $componentId = $_instance->getRenderedChildComponentId('qQ3Zo0X');
    $componentTag = $_instance->getRenderedChildComponentTagName('qQ3Zo0X');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('qQ3Zo0X');
} else {
    $response = \Livewire\Livewire::mount('show-user', ['user' => $user]);
    $html = $response->html();
    $_instance->logRenderedChild('qQ3Zo0X', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <p class="text-center">No hay usuarios</p>
        <?php endif; ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/blairi/development/Laravel/devstagram/resources/views/followers.blade.php ENDPATH**/ ?>