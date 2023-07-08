<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo e($title); ?></title>
</head>
<body>
<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
<form action="<?php echo e(route('authenticate')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    Email
    <br>
    <input type="text" name="email">
    Password
    <br>
    <input type="password" name="password">
    <button type="submit">Login</button>
</form>
</body>
</html>
<?php /**PATH J:\workspace\laragon\www\laravel_elysium\resources\views/auth/login.blade.php ENDPATH**/ ?>