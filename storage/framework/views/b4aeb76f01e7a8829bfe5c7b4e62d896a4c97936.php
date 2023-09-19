<?php $__env->startSection('content'); ?>
<section id="wrapper" class="login-register">
    <div class="login-box">
        <div class="white-box">
            <form class="form-horizontal form-material row" id="loginform" method="post" action="<?php echo e(route('login')); ?>">
                <?php echo e(csrf_field()); ?>

                <div class="col-md-12">
                <h3 class="box-title ">Sign In</h3>
                </div>
                <div class="form-group col-md-12">

                        <input id="email" placeholder="Email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required autofocus>
                        <?php if($errors->has('email')): ?>
                            <span class="invalid-feedback">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                        <?php endif; ?>

                </div>
                <div class="form-group col-md-12">

                        <input id="password"  type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required placeholder="Password">
                        <div class="input_icon">
                                <a href="javascript:void(0);" class="password_btn2"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                            </div>
                        <?php if($errors->has('password')): ?>
                            <span class="invalid-feedback">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                            </span>
                        <?php endif; ?>

                </div>
                <div class="form-group col-md-12">

                        <div class="checkbox checkbox-primary pull-left p-t-0">
                            <input type="checkbox" id="checkbox-signup" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                            <label for="checkbox-signup"> Remember me </label>
                        </div>
                        <a href="<?php echo e(route('password.request')); ?>" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a>
                </div>
                <div class="form-group col-md-12 ">

                        <button class="btn btn_black btn_block text-uppercase waves-effect waves-light" type="submit"> Log In
                        </button>

                </div>
                
                
                
                        

                

            </form>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script>
         $(function(){
            $('.password_btn2').click(function(){
                if($('.password_btn2 i').hasClass('fa-eye-slash')){
                    $('.password_btn2 i').removeClass('fa-eye-slash');
                    $('.password_btn2 i').addClass('fa-eye');
                    $('#password').attr('type','text');
                }else{
                    $('.password_btn2 i').removeClass('fa-eye');
                    $('.password_btn2 i').addClass('fa-eye-slash');
                    $('#password').attr('type','password');
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/backendpro/public_html/usman/lcm/resources/views/auth/login.blade.php ENDPATH**/ ?>