<?php $__env->startSection('titulo'); ?>
    <?php echo e($post->titulo); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
    <div class="container mx-auto md:flex">

        <div class="md:w-1/2">
            <img src="<?php echo e(asset('uploads') . '/' . $post->imagen); ?>" alt="Imagen del post <?php echo e($post->titulo); ?>">
            <div class="p-3 flex items-center gap-4">
                <?php if(auth()->guard()->check()): ?>

                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('like-post', ['post' => $post])->html();
} elseif ($_instance->childHasBeenRendered('k9ka9z5')) {
    $componentId = $_instance->getRenderedChildComponentId('k9ka9z5');
    $componentTag = $_instance->getRenderedChildComponentTagName('k9ka9z5');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('k9ka9z5');
} else {
    $response = \Livewire\Livewire::mount('like-post', ['post' => $post]);
    $html = $response->html();
    $_instance->logRenderedChild('k9ka9z5', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
            <div class="shadow bg-white p-5 mb-5">
                <?php if(auth()->guard()->check()): ?>
                    <p class="text-xl font-bold text-center mb-4">Agrega un nuevo comentario.</p>

                    <?php if(session('mensaje')): ?>
                        <div class="bg-green-500 p-2 rounded-lg mb-6 text-white uppercase font-bold">
                            <?php echo e(session('mensaje')); ?>

                        </div>
                    <?php endif; ?>

                    <form action="<?php echo e(route('comentarios.store', ['post' => $post, 'user' => $user ])); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="mb-5">
                            <label for="comentario" class="mb-2 block uppercase text-gray-500 font-bold">
                                Añade un Comentario
                            </label>
                            <textarea
                                id="comentario"
                                name="comentario"
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

                        <input
                            type="submit"
                            value="Comentar"
                            class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                        />
                    </form>
                <?php endif; ?>
            </div>

            <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll">
                <?php if($post->comentarios->count()): ?>
                    <?php $__currentLoopData = $post->comentarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comentario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex items-center border-gray-300 border-b">
                            <div class="p-2 w-2/12 md:w-3/12 lg:w-1/12 flex items-center">
                                <a href="<?php echo e(route('posts.index', $comentario->user)); ?>">
                                    <img
                                        class="rounded-full"
                                        src="<?php echo e($comentario->user->imagen ?
                                            asset('perfiles') . '/' . $comentario->user->imagen :
                                            asset('img/usuario.svg')); ?>"
                                        alt="<?php echo e($comentario->user->username); ?>"
                                    />
                                </a>
                            </div>
                            <div class="p-2 w-10/12 md:w-9/12 lg:w-11/12">
                                <a href="<?php echo e(route('posts.index', $comentario->user)); ?>" class="font-bold">
                                    <?php echo e($comentario->user->username); ?>

                                </a>
                                <p><?php echo e($comentario->comentario); ?></p>
                                <p class="text-sm text-gray-500"><?php echo e($comentario->created_at->diffForHumans()); ?></p>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <p class="p-10 text-center">No hay comentario aún.</p>
                <?php endif; ?>
            </div>

        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/blairi/development/Laravel/devstagram/resources/views/posts/show.blade.php ENDPATH**/ ?>