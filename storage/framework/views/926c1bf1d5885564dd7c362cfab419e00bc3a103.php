<div>
    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('user-profile', ['user' => $user])->html();
} elseif ($_instance->childHasBeenRendered('l829999087-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l829999087-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l829999087-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l829999087-0');
} else {
    $response = \Livewire\Livewire::mount('user-profile', ['user' => $user]);
    $html = $response->html();
    $_instance->logRenderedChild('l829999087-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<?php /**PATH /home/blairi/development/Laravel/devstagram/resources/views/livewire/list-users.blade.php ENDPATH**/ ?>
