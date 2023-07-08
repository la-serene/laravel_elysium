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
<form action="<?php echo e(route('store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    username
    <br>
    <input type="text" name="username" value="ky">
    <br>
    first name
    <input type="text" name="first_name" value="ky">
    <br>
    <br>
    last name
    <input type="text" name="last_name" value="ky">
    <br>
    <br>
    tel
    <input type="text" name="phone_number" value="0325454125">
    <br>
    <br>
    address
    <input type="text" name="address" value="dasfghsdfg">
    <br>
    <br>
    email
    <input type="text" name="email" value="caoky2003xx@gmail.com">
    <br>
    date of birth
    <input type="date" name="date_of_birth" value="01-10-2003">
    <br>
    password
    <input type="password" name="password" value="1234">
    <br>
    password confirmation
    <input type="password" name="password_confirmation" value="1234">
    <br>
    <button type="submit">Register</button>
</form>
</body>
</html>
<?php /**PATH J:\workspace\laragon\www\laravel_elysium\resources\views/auth/register.blade.php ENDPATH**/ ?>