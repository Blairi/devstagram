<div>

    <?php if(auth()->guard()->check()): ?>
        <form class="shadow bg-white p-5 mb-5" wire:submit.prevent='comment()'>

            <div class="mb-5">

                <label for="comentario" class="mb-2 block uppercase text-gray-500 font-bold">
                    Añade un Comentario
                </label>

                <textarea
                    id="comentario"
                    wire:model.lazy="comentario"
                    placeholder="Comentario de la publicación"
                    class="border p-3 w-full rounded-lg
                            <?php $__errorArgs = ['comentario'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                border-red-500
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            "
                ></textarea>
                <?php $__errorArgs = ['comentario'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                    <?php echo e($message); ?>

                </p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            </div>

            <button
                type="submit"
                class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
            >Comentar
            </button>

        </form>
    <?php endif; ?> 

    <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll">

        <?php if( $comments->count() ): ?>
            <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commentary): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('commentary', ['commentary' => $commentary])->html();
} elseif ($_instance->childHasBeenRendered($commentary->id)) {
    $componentId = $_instance->getRenderedChildComponentId($commentary->id);
    $componentTag = $_instance->getRenderedChildComponentTagName($commentary->id);
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild($commentary->id);
} else {
    $response = \Livewire\Livewire::mount('commentary', ['commentary' => $commentary]);
    $html = $response->html();
    $_instance->logRenderedChild($commentary->id, $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <p class="p-10 text-center">No hay comentarios aún.</p>
        <?php endif; ?>
    </div> 
</div>
<?php /**PATH /home/blairi/development/Laravel/devstagram/resources/views/livewire/comment.blade.php ENDPATH**/ ?>