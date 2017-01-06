

<?php
use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <body class="collapsing_header">
    <!--[if IE]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->
    <!--->

     <!-->
    <?php

     do_action('get_header');
    if(is_front_page())
    {
      get_template_part('templates/header', 'front');

    }
    else
    {

      //get_template_part('templates/header');
      get_template_part('templates/header', 'front');


    }
    ?>
    <?php if(is_front_page()): ?>

    <?php
    $background = get_field('area_top_background', 'option');
    if(strlen(isset($background['url'])) > 0)
    {
      $result_background = 'background-image: url(\''.$background['url'].'\');';
      //$output_logo = '<img class="homepage-area_top_background" src="'.$background['url'].'" alt="'$background['title'].'"/>';
    }
    else
    {
      $result_background = '';
    }

    $color = get_field('area_top_color', 'option');
    if(strlen($color) > 0)
    {
      $result_color = 'color: '.$color.';';

    }
    else
    {
      $result_color = '';

    }
    ?>

    <div class="homepage-outer" id="homepage-area-top" style="<?php echo $result_background.$result_color ?>">
      <?php endif ?>

      <div class="wrap container" role="document">
        <div class="content row">
          <main class="main">
            <?php include Wrapper\template_path(); ?>
          </main><!-- /.main -->
          <?php if (Setup\display_sidebar()) : ?>
            <aside class="sidebar">
              <?php include Wrapper\sidebar_path(); ?>
            </aside><!-- /.sidebar -->
          <?php endif; ?>
        </div><!-- /.content -->
      </div><!-- /.wrap -->


      <?php if(is_front_page()): ?>
    </div>


    <?php get_template_part('templates/additional', 'front-page'); ?>
    <?php endif ?>


    <?php
      do_action('get_footer');
      get_template_part('templates/footer');
      wp_footer();
    ?>

  </body>
</html>
