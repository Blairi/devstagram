<!DOCTYPE html>
<html lang="<?php echo e(str_replace ('_', '-', app()->getLocale ())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo $__env->yieldPushContent('styles'); ?>
    <title>DevStagram - <?php echo $__env->yieldContent('titulo'); ?></title>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
    <?php echo \Livewire\Livewire::styles(); ?>

</head>
<body class="bg-gray-100">

    <header class="p-5 border-b bg-white shadow">

        <div class="container mx-auto flex justify-between items-center">

            <a href="<?php echo e(route('home')); ?>" class="text-3xl font-black">
                Devstagram
            </a>

            <?php if(auth()->guard()->check()): ?>

                <nav class="flex gap-2 items-center">
                    <a class="flex items-center gap-2 bg-white border p-2 text-gray-600 rounded uppercase
                        font-bold cursor-pointer" href="<?php echo e(route('posts.create')); ?>"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Crear
                    </a>

                    <a class="font-bold text-gray-600 text-sm"
                       href="<?php echo e(route('posts.index', auth()->user()->username)); ?>"
                    >
                        Hola: <span class="font-normal">
                                <?php echo e(auth()->user()->username); ?>

                        </span>
                    </a>

                    <form method="post" action="<?php echo e(route('logout')); ?>">
                        <?php echo csrf_field(); ?>
                        <button class="font-bold uppercase text-gray-600 text-sm" type="submit">
                            Cerrar Sesión
                        </button>
                    </form>

                </nav>
            <?php endif; ?>
            <?php if(auth()->guard()->guest()): ?>
                <nav class="flex gap-2 items-center">
                    <a class="font-bold uppercase text-gray-600 text-sm" href="<?php echo e(route('login')); ?>">Login</a>
                    <a class="font-bold uppercase text-gray-600 text-sm" href="<?php echo e(route('register')); ?>">
                        Crear cuenta
                    </a>
                </nav>
            <?php endif; ?>

        </div>

    </header>

    <main class="container mx-auto mt-10">

        <h2 class="font-black text-center text-3xl mb-10">
            <?php echo $__env->yieldContent('titulo'); ?>
        </h2>

        <?php echo $__env->yieldContent('contenido'); ?>

    </main>

    <footer class="mt-10 text-center p-5 text-gray-500 font-bold uppercase">
        Devstagram - Todos los derechos reservados
        <?php echo e(now()->year); ?>

    </footer>
    <?php echo \Livewire\Livewire::scripts(); ?>

</body>
</html>
<?php /**PATH /home/blairi/Documents/Laravel/devstagram/resources/views/layouts/app.blade.php ENDPATH**/ ?>