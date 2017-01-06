<div class="homepage-outer">
    <?php
    $sliders = get_field('slides', 'option');
    ?>
    <div id="homeCarousel" class="carousel slide" data-ride="carousel" data-interval="4000">
        <!-- Indicators -->
        <div class="container-carousel-indicators">
            <ol class="carousel-indicators">

                <?php if($sliders): ?>
                    <?php $i=0; foreach ($sliders as $list): ?>

                        <li data-target="#homeCarousel" data-slide-to="<?php echo $i ?>" class="<?php echo $i++ == 0 ? 'active' : null ?>"></li>

                    <?php endforeach ?>
                <?php endif ?>

            </ol>
        </div>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">

            <?php if($sliders): ?>
                <?php $i=0; foreach ($sliders as $list): ?>

                    <?php
                    $image = $list['image'];
                    $text_slider = $list['text_slider'];
                    $url_text = $list['url_text'];
                    $url_link = $list['url_link'];
                    ?>
                    <div class="carousel-item item<?php echo $i++ == 0 ? ' active' : null ?>">
                        <img class="image-slider" src="<?php echo isset($image['url']) ? $image['url'] : null ?>" alt="<?php echo isset($image['title']) ? $image['title'] : null ?>">
                        <div class="carousel-item-container">
                            <div class="container">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="carousel-item-container-title">
                                            <?php echo $text_slider ?>
                                        </div>
                                        <?php if(strlen($url_link) > 0): ?>
                                            <div class="carousel-item-container-link">
                                                <a href="<?php echo $url_link ?>"><?php echo $url_text ?></a>
                                            </div>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endforeach ?>
            <?php endif ?>

        </div>

        <!-- Left and right controls -->
        <!--
        <a class="left carousel-control" href="#homeCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#homeCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        -->
    </div>
</div>