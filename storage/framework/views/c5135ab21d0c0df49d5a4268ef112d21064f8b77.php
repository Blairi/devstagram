<?php $__env->startSection('contenido'); ?>

    <div class="flex flex-col flex-col-reverse lg:flex-row gap-5">
        <div class="lg:w-9/12 xl:w-10/12">
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
        </div>

        <div class="lg:w-3/12 xl:w-2/12 lg:fixed lg:right-0 ">
            <h3 class="text-center lg:text-left my-1">Nuevos usuarios:</h3>
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('list-users', ['users' => $users])->html();
} elseif ($_instance->childHasBeenRendered('VbKNvi0')) {
    $componentId = $_instance->getRenderedChildComponentId('VbKNvi0');
    $componentTag = $_instance->getRenderedChildComponentTagName('VbKNvi0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('VbKNvi0');
} else {
    $response = \Livewire\Livewire::mount('list-users', ['users' => $users]);
    $html = $response->html();
    $_instance->logRenderedChild('VbKNvi0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/blairi/development/Laravel/devstagram/resources/views/home.blade.php ENDPATH**/ ?>