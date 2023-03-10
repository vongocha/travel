<?php get_header(); ?>
<?php get_template_part( 'slider'); ?>
<div class="fv-content">
    <div class="container">
        <div class="content-location">
            <div class="title-home">
                <h2>Điểm đến nổi bật</h2>
            </div>
            <div class="row">
                <?php $args = array( 
                    'hide_empty' => 0,
                    'taxonomy' => 'dia-diem',
                    'orderby' => 'id',
                    'parent' => 0
                    ); 
                    $cates = get_categories( $args ); 
                    foreach ( $cates as $cate ) {  ?>
                        <?php $img_id = get_term_meta($cate->term_id, 'img_cat', true); ?>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
                            <a href="<?php echo get_term_link($cate->slug, 'dia-diem'); ?>">
                                <div class="img-cat">
                                    <img src="<?php echo wp_get_attachment_url($img_id); ?>" alt="<?php echo $cate->name; ?>">
                                    <h4><?php echo $cate->name; ?></h4>
                                </div>
                            </a>
                        </div>
                            
                <?php } ?>
            </div>
        </div>
        <div class="block-cat">
            <div class="title-home">
                <h2>Cẩm nang du lịch</h2>
            </div>
            <div class="conte-block-cat">
                <?php $getposts = new WP_query(); $getposts->query('post_status=publish&showposts=3&post_type=post&cat=1'); ?>
                <?php global $wp_query; $wp_query->in_the_loop = true; ?>
                <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                    <div class="block-cat-item">
                        <a href="<?php the_permalink(); ?>">
                            <img src="<?php echo hk_get_thumb(get_the_id(), 600, 400); ?>"  alt="<?php the_title(); ?>">
                            <div class="info-post">
                                <h4><?php the_title(); ?></h4>
                               <p><?php echo get_the_date('d - m - Y'); ?></p> 
                            </div>
                        </a>
                    </div>
                <?php endwhile; wp_reset_postdata(); ?>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="block-cat">
            <div class="title-home">
                <h2>Tin tức du lịch</h2>
            </div>
            <div class="conte-block-cat">
                <?php $getposts = new WP_query(); $getposts->query('post_status=publish&showposts=3&post_type=post&cat=4'); ?>
                <?php global $wp_query; $wp_query->in_the_loop = true; ?>
                <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                    <div class="block-cat-item">
                        <a href="<?php the_permalink(); ?>">
                            <img src="<?php echo hk_get_thumb(get_the_id(), 600, 400); ?>"  alt="<?php the_title(); ?>">
                            <div class="info-post">
                                <h4><?php the_title(); ?></h4>
                               <p><?php echo get_the_date('d - m - Y'); ?></p> 
                            </div>
                        </a>
                    </div>
                <?php endwhile; wp_reset_postdata(); ?>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="block-cat">
            <div class="title-home">
                <h2>Ẩm thực bốn phương</h2>
            </div>
            <div class="conte-block-cat">
                <?php $getposts = new WP_query(); $getposts->query('post_status=publish&showposts=3&post_type=post&cat=7'); ?>
                <?php global $wp_query; $wp_query->in_the_loop = true; ?>
                <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                    <div class="block-cat-item">
                        <a href="<?php the_permalink(); ?>">
                            <img src="<?php echo hk_get_thumb(get_the_id(), 600, 400); ?>"  alt="<?php the_title(); ?>">
                            <div class="info-post">
                                <h4><?php the_title(); ?></h4>
                               <p><?php echo get_the_date('d - m - Y'); ?></p> 
                            </div>
                        </a>
                    </div>
                <?php endwhile; wp_reset_postdata(); ?>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>