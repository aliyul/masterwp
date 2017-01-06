<div class="nav-sidebar-container">
    <?php
    if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav-sidebar']);
    endif;
    ?>
    <div class="clearfix"></div>
    <?php //dynamic_sidebar('sidebar-primary'); ?>

    <?php

    if((is_home() && !is_front_page()) || is_category() || is_single() ):
    $categories = get_categories();
    if($categories):
        $class = ' current-menu-item';
    ?>
    <div class="blog-container">
        <ul id="menu-blog" class="nav-sidebar">
            <li class="current-menu-item"><a href="javascript:;">CATEGORIES</a>
                <ul class="sub-menu">
                    <?php foreach($categories as $list): ?>
                        <?php
                        if(is_category() && is_category($list->cat_ID))
                            $class = ' current-menu-item';
                        else
                            $class = '';
                        ?>
                        <li class="menu-item<?php echo $class ?>"><a href="<?php echo get_category_link( $list->cat_ID ); ?>"><?php echo $list->name ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </li>
        </ul>
    </div>
    <?php wp_reset_query() ?>
    <?php endif ?>
    <?php endif ?>

</div>
