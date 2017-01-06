<footer class="content-info">
  <!--
  <div class="container">
    <?php dynamic_sidebar('sidebar-footer'); ?>
  </div>
  -->
  <div class="container">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <?php
      $footer_logo = get_field('footer_logo', 'option');
      if(strlen($footer_logo['url']) > 0):
        ?>
        <div class="footer-logo-container">
          <img class="footer-logo" src="<?php echo $footer_logo['url'] ?>" alt="<?php echo $footer_logo['title'] ?>"/>
        </div>
      <?php endif ?>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="footer-widget footer-left">
        <?php echo get_field('widget_1', 'option') ?>
      </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="footer-widget footer-middle">
        <?php echo get_field('widget_2', 'option') ?>
      </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="footer-widget footer-right">
        <?php echo get_field('widget_3', 'option') ?>
      </div>
    </div>
  </div>
</footer>
