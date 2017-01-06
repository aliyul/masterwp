<div class="homepage-outer" id="homepage-area-middle">
  <div class="wrap container" role="document">
    <div class="content row">
      <main class="main">

        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="row">
            <?php
            $area_middle_left_image = get_field('area_middle_left_image', 'option');
            if(strlen($area_middle_left_image['url']) > 0):
              ?>
              <img class="homepage-area-middle-left-image" src="<?php echo $area_middle_left_image['url'] ?>" alt="<?php echo $area_middle_left_image['title'] ?>"/>
            <?php endif ?>
            <div class="homepage-area-middle-left-content">
              <?php echo get_field('area_middle_left_content', 'option'); ?>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="row">
            <?php
            $area_middle_right_image = get_field('area_middle_right_image', 'option');
            if(strlen($area_middle_right_image['url']) > 0):
              ?>
              <img class="homepage-area-middle-right-image" src="<?php echo $area_middle_right_image['url'] ?>" alt="<?php echo $area_middle_right_image['title'] ?>"/>
            <?php endif ?>
          </div>
        </div>

        <div class="clearfix"></div>

      </main><!-- /.main -->
    </div><!-- /.content -->
  </div><!-- /.wrap -->
</div>


<?php
$background = get_field('area_bottom_background', 'option');
if(strlen($background['url']) > 0)
{
  $result_background = 'background-image: url(\''.$background['url'].'\');';
}
else
{
  $result_background = '';
}

$color = get_field('area_bottom_color', 'option');
if(strlen($color) > 0)
{
  $result_color = 'color: '.$color.';';
}
else
{
  $result_color = '';
}
?>
<div class="homepage-outer" id="homepage-area-bottom" style="<?php echo $result_background.$result_color ?>">
  <div class="wrap container" role="document">
    <div class="content row">
      <main class="main">
        <div class="home-bottom-content">
          <h2 class="header-bottom">
            <?php echo get_field('area_bottom_header', 'option'); ?>
          </h2>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="row" id="content-left">
              <?php echo get_field('area_bottom_content_left', 'option'); ?>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="row" id="content-right">
              <?php echo get_field('area_bottom_content_right', 'option'); ?>
            </div>
          </div>

          <div class="clearfix"></div>

        </div>
      </main><!-- /.main -->
    </div><!-- /.content -->
  </div><!-- /.wrap -->
</div>