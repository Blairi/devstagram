<div>
    <ul class="flex flex-row overflow-x-scroll lg:overflow-x-auto lg:flex-col gap-2">
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="min-w-[110px]">
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('user-profile', ['user' => $user])->html();
} elseif ($_instance->childHasBeenRendered('l2219636444-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l2219636444-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l2219636444-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l2219636444-0');
} else {
    $response = \Livewire\Livewire::mount('user-profile', ['user' => $user]);
    $html = $response->html();
    $_instance->logRenderedChild('l2219636444-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>

<?php /**PATH /home/blairi/development/Laravel/devstagram/resources/views/livewire/list-users.blade.php ENDPATH**/ ?>