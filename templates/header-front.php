<?php
$get_logo = get_field('logo', 'option');
if(strlen($get_logo['url']) > 0)
{
  $output_logo = '<img class="image-logo" src="'.$get_logo['url'].'" alt="'.get_bloginfo('name').'"/>';
}
else
{
  $output_logo = get_bloginfo('name');
}
?>

<!--
<header style="top: 0px;" class="">
 --->
<header>
  <div class="container">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
      <a class="brand" href="<?php echo esc_url(home_url('/')); ?>"><?php echo $output_logo ?></a>
    </div>
    <!--
    <nav class="nav-primary">
      <?php
    if (has_nav_menu('primary_navigation')) :
      wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
    endif;
    ?>
    </nav>
    -->
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
      <div class="row">
        <div class="header-right">
          <div class="social-media">
            <?php
            $facebook = get_field('facebook', 'option');
            if(strlen($facebook) > 0):
              ?>
              <a href="<?php echo esc_url($facebook) ?>" target="_blank" class="social-media-btn"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <?php endif ?>

            <?php
            $twitter = get_field('twitter', 'option');
            if(strlen($twitter) > 0):
              ?>
              <a href="<?php echo esc_url($twitter) ?>" target="_blank" class="social-media-btn"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            <?php endif ?>

            <?php
            $instagram = get_field('instagram', 'option');
            if(strlen($instagram) > 0):
              ?>
              <a href="<?php echo esc_url($instagram) ?>" target="_blank" class="social-media-btn"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <?php endif ?>

          </div>
          <div class="header-btn">

            <?php
            $button_1_text = get_field('button_1_text', 'option');
            $button_1_link = get_field('button_1_link', 'option');
            if(strlen($button_1_link) > 0):
              ?>
              <a href="<?php echo esc_url($button_1_link) ?>" class="header-btn-1"><?php echo $button_1_text ?></a>
            <?php endif ?>

            <?php
            $button_2_text = get_field('button_2_text', 'option');
            $button_2_link = get_field('button_2_link', 'option');
            if(strlen($button_2_link) > 0):
              ?>
              <a href="<?php echo esc_url($button_2_link) ?>" class="header-btn-2"><?php echo $button_2_text ?></a>
            <?php endif ?>
          </div>
        </div>
      </div>
    </div>
  <div class="clearfix"></div>
  </div>

        <div id="header-bottom">
            <!---
            <div class="logo-desktop hidden-xs">

            </div>
            --->
            <!---
            //berikut adalah Aturan Menu Navigasi dari Bosstrap :
            ----->
            <nav class="nav-primary">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand hidden-lg hidden-md hidden-sm" href="<?php echo esc_url(home_url('/')); ?>"><?php echo $print_logo; ?></a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-collapse-1">
                      <?php
                      // Register Custom Navigation Walker
                      require_once(get_template_directory().'/lib/wp_bootstrap_navwalker.php');
                      if (has_nav_menu('primary_navigation')) :
                        //wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav']);

                          wp_nav_menu( array(
                                  'menu'              => 'primary',
                                  'theme_location'    => 'primary_navigation',
                                  'depth'             => 2,
                                  'container'         => 'div',
                                  'container_class'   => 'collapse navbar-collapse',
                                  'container_id'      => 'bs-example-navbar-collapse-1',
                                  'menu_class'        => 'nav navbar-nav',
                                  'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                                  'walker'            => new wp_bootstrap_navwalker())
                          );




                      endif;
                      ?>
                    <div class="clearfix"></div>
                </div>
            </nav>
        </div>
  <div class="clearfix"></div>
</header>
