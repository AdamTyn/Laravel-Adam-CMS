<header class="m-hd">
    <section data-am-sticky class="am-show-md-up">
    <div class="am-container">
        <a href="<?php echo e(url('/')); ?>" rel="nofollow" class="m-logo"><i class="am-icon-spinner"></i>鼎力合众</a>
        <nav>
          <ul class="m-nav am-nav am-nav-pills am-fr">
<?php $__currentLoopData = $navs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><a href="<?php echo e(url($key)); ?>" rel="nofollow"><?php echo e($value); ?></a></li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
        </nav>
    </section>
    </div>
    <nav data-am-widget="header" class="am-header am-show-sm-only">
      <div class="am-header-left am-header-nav">
        <a href="<?php echo e(url('/')); ?>" rel="nofollow">
          <i class="am-header-icon am-icon-home"></i>&nbsp;首页
        </a>
      </div>
      <h1 class="am-header-title">
        <a href="<?php echo e(url('/')); ?>" rel="nofollow">鼎力合众</a>
      </h1>
      <div class="am-header-right am-header-nav">
        <a href="#right-link" class="" data-am-offcanvas="{target: '#r-nav'}">
          <i class="am-header-icon am-icon-bars"></i>&nbsp;菜单
        </a>
      </div>
    </nav>
    <!-- MiniMenu -->
    <div id="r-nav" class="am-offcanvas">
      <div class="am-offcanvas-bar am-offcanvas-bar-flip">
        <nav class="am-offcanvas-content">
            <a href="#" rel="nofollow"><span class="logo"></span></a>
<?php $__currentLoopData = $navs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php switch($key):
    case ('/'): ?>
        <p><i class="am-icon-home"></i><a href="<?php echo e(url($key)); ?>" rel="nofollow">&nbsp;<?php echo e($value); ?></a></p>
        <?php break; ?>
    <?php case ('service'): ?>
        <p><i class="am-icon-suitcase"></i><a href="<?php echo e(url($key)); ?>" rel="nofollow">&nbsp;<?php echo e($value); ?></a></p>
        <?php break; ?>
    <?php case ('contact'): ?>
        <p><i class="am-icon-bullhorn"></i><a href="<?php echo e(url($key)); ?>" rel="nofollow">&nbsp;<?php echo e($value); ?></a></p>
        <?php break; ?>
    <?php case ('work'): ?>
        <p><i class="am-icon-credit-card"></i><a href="<?php echo e(url($key)); ?>" rel="nofollow">&nbsp;<?php echo e($value); ?></a></p>
        <?php break; ?>
    <?php case ('employee'): ?>
        <p><i class="am-icon-group"></i><a href="<?php echo e(url($key)); ?>" rel="nofollow">&nbsp;<?php echo e($value); ?></a></p>
        <?php break; ?>
    <?php case ('about'): ?>
        <p><i class="am-icon-envelope"></i><a href="<?php echo e(url($key)); ?>" rel="nofollow">&nbsp;<?php echo e($value); ?></a></p>
        <?php break; ?>
    <?php default: ?>
        <p><i class="am-icon-map"></i><a href="<?php echo e(url($key)); ?>" rel="nofollow">&nbsp;<?php echo e($value); ?></a></p>
        <?php break; ?>
<?php endswitch; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </nav>
      </div>
    </div>
</header>