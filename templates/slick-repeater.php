777<?php


//Image Slider


//slider_image = field
//portfolio_slider = subfield
$sliders = get_field('slides', 'option');

  if($sliders):
    echo '<div class="slider-for">';
    echo "row";
    // loop through the rows of data
    while ($sliders) :
      // display a sub field value
      //vars
      $image = get_sub_field('image');
      ?>
      <div><img src="<?php echo $image['url']; ?>"/></div>
      <?php
    endwhile;
    echo '</div>
      <div class="slider-nav">';
    // loop through the rows of data
    while ($sliders)  :
      // display a sub field value
      //vars
      $image = get_sub_field('image');
      ?>
      <div><img src="<?php echo $image['url']; ?>"/></div>
      <?php
    endwhile;
    echo '</div>';

  else :

    // no rows found
echo "no row";
  endif;

?>