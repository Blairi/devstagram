<?php $__env->startSection('titulo'); ?>
    Perfil: <?php echo e($user->username); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>

    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
            <div class="w-8/12 lg:w-6/12 px-5">
                <img
                    src=" <?php echo e($user->imagen ?
                                asset('perfiles') . '/' . $user->imagen :
                                asset('img/usuario.svg')); ?> "
                    alt="Imagen usuario"
                />
            </div>
            <div
                class="md:w-8/12 lg:w-6/12 px-5 flex items-center flex-col md:justify-center md:items-start py-10 md:py-10">
                <div class="flex items-center gap-2">
                    <p class="text-gray-700 text-2xl"><?php echo e($user->username); ?></p>

                    <?php if(auth()->guard()->check()): ?>
                        <?php if( $user->id === auth()->user()->id): ?>
                            <a href="<?php echo e(route('perfil.index')); ?>"
                               class="text-gray-500 hover:text-gray-600 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                </svg>
                            </a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>

                <a href="<?php echo e(route('show.followers', $user->username)); ?>">
                    <p class="text-gray800 text-sm mb-3 font-bold">
                        <?php echo e($user->followers->count()); ?>

                        <span class="font-normal"><?php echo app('translator')->choice('Seguidor|Seguidores', $user->followers->count()); ?></span>
                    </p>
                </a>

                <a href="<?php echo e(route('show.following', $user->username)); ?>">
                    <p class="text-gray-800 text-sm mb-3 font-bold">
                        <?php echo e($user->following->count()); ?>

                        <span class="font-normal">Siguiendo</span>
                    </p>
                </a>

                <p class="text-gray-800 text-sm mb-3 font-bold">
                    <?php echo e($user->posts->count()); ?>

                    <span class="font-normal">Posts</span>
                </p>
                <?php if(auth()->guard()->check()): ?>
                    <?php if($user->id !== auth()->user()->id): ?>
                        <?php if( !$user->siguiendo( auth()->user() ) ): ?>
                            <form method="post" action="<?php echo e(route('users.follow', $user)); ?>">
                                <?php echo csrf_field(); ?>
                                <input
                                    type="submit"
                                    class="bg-blue-600 text-white uppercase rounded-lg px-3 py-1 text-sm font-bold cursor-pointer"
                                    value="Seguir"
                                />
                            </form>
                        <?php else: ?>
                            <form method="post" action="<?php echo e(route('users.unfollow', $user)); ?>">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <input
                                    type="submit"
                                    class="bg-red-600 text-white uppercase rounded-lg px-3 py-1 text-sm font-bold cursor-pointer"
                                    value="Dejar de seguir"
                                />
                            </form>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <section class="container mx-auto mt-10">
        <h2 class="text-4xl text-center font-black my-10">Publicaciones</h2>

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

    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/blairi/development/Laravel/devstagram/resources/views/dashboard.blade.php ENDPATH**/ ?>