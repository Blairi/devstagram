<?php $__env->startSection('titulo'); ?>
    Página Principal
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>

    <?php if (isset($component)) { $__componentOriginaldd88934e5f03a7cd5138c2e599754f366e7726c6 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\ListarPost::class, ['posts' => $posts] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('listar-post'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\ListarPost::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldd88934e5f03a7cd5138c2e599754f366e7726c6)): ?>
<?php $component = $__componentOriginaldd88934e5f03a7cd5138c2e599754f366e7726c6; ?>
<?php unset($__componentOriginaldd88934e5f03a7cd5138c2e599754f366e7726c6); ?>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/blairi/Documents/Laravel/devstagram/resources/views/home.blade.php ENDPATH**/ ?>