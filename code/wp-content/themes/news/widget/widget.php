<?php
class Post_Category_widget extends WP_Widget {
  	function Post_Category_widget() {
	    $widget_ops = array( 'classname' => 'post_category_widget', 'description' => 'Hiển thị bài viết theo danh mục Home và Sidebar' );
	    $control_ops = array( 'id_base' => 'post_category_widget' ); 
	    $this->WP_Widget( 'Post_Category_widget', '+HK - Category Post (ST1)', $widget_ops, $control_ops );
  	}
    function widget($args, $instance) {
      	extract( $args );
      	$title      = $instance['title'];
      	$num        = $instance['num'];
      	$cat_id     = $instance['cat_id'];
		if ( !defined('ABSPATH') )
  		die('-1');
  		echo $before_widget; ?>
		<div class="fv-title"><h3><span><?php echo $title; ?></span><a href="<?php echo esc_url( get_category_link($cat_id)); ?>" class="pull-right view-all">Xem tất cả</a></h3></div>
		<div class="category-content category-module">
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-12 title-news">
					<div class="category-post-item category-module-large">
						<div class="category-post-item-inner">
							<?php $getposts = new WP_query(); $getposts->query('post_status=publish&showposts=1&cat='.$cat_id); ?>
							<?php global $wp_query; $wp_query->in_the_loop = true; ?>
							<?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
								<div class="category-post-avatar">
									<a href="<?php the_permalink(); ?>">
										<img src="<?php echo hk_get_thumb(get_the_id(), 360, 230); ?>"  alt="<?php the_title(); ?>">
									</a>
								</div>
								<div class="category-post-content">
									<a href="<?php the_permalink(); ?>">
										<h3 class="category-post-title"><?php the_title(); ?></h3>
									</a>
									<p class="category-post-info"><b><?php the_category(' - '); ?></b> -  <?php echo get_the_date('d - m - Y'); ?></p>
									<p class="category-post-desc"><?php echo teaser(30); ?></p>
								</div>
							<?php endwhile; wp_reset_postdata(); ?>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12 title-news">
					<?php $getposts = new WP_query(); $getposts->query('post_status=publish&showposts='.($num-1).'&cat='.$cat_id); ?>
					<?php global $wp_query; $wp_query->in_the_loop = true; ?>
					<?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
						<div class="category-post-item category-module-small">
							<div class="category-post-item-inner">
								<div class="category-post-avatar">
									<a href="<?php the_permalink(); ?>">
										<img src="<?php echo hk_get_thumb(get_the_id(), 100, 75); ?>"  alt="<?php the_title(); ?>">
									</a>
								</div>
								<div class="category-post-content">
									<a href="<?php the_permalink(); ?>">
										<h3 class="category-post-title"><?php the_title(); ?></h3>
									</a>
									<p class="category-post-info"><?php echo get_the_date('d - m - Y'); ?></p>
								</div>
							</div>
						</div>
					<?php endwhile; wp_reset_postdata(); ?>
				</div>
			</div>
		</div>
  	<?php echo $after_widget;} 
    function update($new_instance, $old_instance) {
      	$instance['title'] 	= strip_tags($new_instance['title']);
      	$instance['num']   	= $new_instance['num'];
      	$instance['cat_id']	= $new_instance['cat_id'];
      	return $instance;
    }
  	function form($instance) {
  		$defaults = array(
		    'title' => 'Tiêu đề',
		    'num' => 5,
		    'cat_id' => 1,
		);
  		$instance = wp_parse_args((array) $instance, $defaults ); ?>
	    <p>
	      	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Nhập tiêu đề: '); ?></label>
	      	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>"  />
	    </p>
	    <p>
	      	<label for="<?php echo $this->get_field_id('num'); ?>"><?php _e('Nhập số lượng bài viết : '); ?></label>
	      	<input class="widefat" id="<?php echo $this->get_field_id('num'); ?>" name="<?php echo $this->get_field_name('num'); ?>" type="number" value="<?php echo $instance['num']; ?>" />
	    </p>
	    <p class="cate-kira">
	      	<label for="<?php echo $this->get_field_id('cat_id'); ?>"><?php _e('Chọn chuyên mục: '); ?></label>
		    <?php
		        wp_dropdown_categories( array(
		          	'orderby'   	=> 'count',
		          	'hide_empty' 	=> false,
		          	'hierarchical' 	=> 1,
		          	'name'       	=> $this->get_field_name( 'cat_id' ),
		          	'id'         	=> 'recent_posts_category',
		          	'class'      	=> 'widefat',
		          	'selected'   	=> $instance['cat_id']
		        ));
		    ?>
	    </p>
    <?php }
}
add_action('widgets_init', create_function('', 'return register_widget("Post_Category_widget");'));
// Lấy bài viết theo chuyên mục style 2
class Category_post extends WP_Widget {
  	function Category_post() {
	    $widget_ops = array( 'classname' => 'category_post', 'description' => 'Hiển thị bài viết theo danh mục Home và Sidebar' );
	    $control_ops = array( 'id_base' => 'category_post' ); 
	    $this->WP_Widget( 'Category_post', '+HK - Category Post (ST2)', $widget_ops, $control_ops );
  	}
    function widget($args, $instance) {
      	extract( $args );
      	$title      = $instance['title'];
      	$cat_id     = $instance['cat_id'];
		if ( !defined('ABSPATH') )
  		die('-1');
  		echo $before_widget; ?>
		<div class="fv-title"><h3><span><?php echo $title; ?></span><a href="<?php echo esc_url( get_category_link($cat_id)); ?>" class="pull-right view-all">Xem tất cả</a></h3></div>
		<div class="category-content category-module">
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-12 title-news">
					<div class="category-post-item category-module-large">
						<div class="category-post-item-inner">
							<?php $getposts = new WP_query(); $getposts->query('post_status=publish&showposts=1&cat='.$cat_id); ?>
							<?php global $wp_query; $wp_query->in_the_loop = true; ?>
							<?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
							<div class="category-post-avatar">
								<a href="<?php the_permalink(); ?>">
									<img src="<?php echo hk_get_thumb(get_the_id(), 360, 230); ?>"  alt="<?php the_title(); ?>">
								</a>
							</div>
							<div class="category-post-content">
								<a href="<?php the_permalink(); ?>">
									<h3 class="category-post-title"><?php the_title(); ?></h3>
								</a>
								<p class="category-post-info"><b><?php the_category(' - ') ?></b> -  <?php echo get_the_date(); ?></p>
								<p class="category-post-desc"><?php echo teaser(20); ?></p>
							</div>
							<?php endwhile; wp_reset_postdata(); ?>
						</div>
					</div>
					<?php $getposts = new WP_query(); $getposts->query('post_status=publish&showposts=2&cat='.$cat_id.'&offset=1'); ?>
					<?php global $wp_query; $wp_query->in_the_loop = true; ?>
					<?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
					<div class="category-post-item category-module-small">
						<div class="category-post-item-inner">
							<div class="category-post-avatar">
								<a href="<?php the_permalink(); ?>">
									<img src="<?php echo hk_get_thumb(get_the_id(), 100, 75); ?>"  alt="<?php the_title(); ?>">
								</a>
							</div>
							<div class="category-post-content">
								<a href="<?php the_permalink(); ?>">
									<h3 class="category-post-title"><?php the_title(); ?></h3>
								</a>
								<p class="category-post-info"><?php echo get_the_date(); ?></p>
							</div>
							</a>
						</div>
					</div>
					<?php endwhile; wp_reset_postdata(); ?>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12 title-news">
					<div class="category-post-item category-module-large">
						<div class="category-post-item-inner">
							<?php $getposts = new WP_query(); $getposts->query('post_status=publish&showposts=1&cat='.$cat_id.'&offset=3'); ?>
							<?php global $wp_query; $wp_query->in_the_loop = true; ?>
							<?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
							<div class="category-post-avatar">
								<a href="<?php the_permalink(); ?>">
									<img src="<?php echo hk_get_thumb(get_the_id(), 360, 230); ?>"  alt="<?php the_title(); ?>">
								</a>
							</div>
							<div class="category-post-content">
								<a href="<?php the_permalink(); ?>">
									<h3 class="category-post-title"><?php the_title(); ?></h3>
								</a>
								<p class="category-post-info"><b><?php the_category(' - ') ?></b> -  <?php echo get_the_date(); ?></p>
								<p class="category-post-desc"><?php echo teaser(20); ?></p>
							</div>
							<?php endwhile; wp_reset_postdata(); ?>
						</div>
					</div>
					<?php $getposts = new WP_query(); $getposts->query('post_status=publish&showposts=2&cat='.$cat_id.'&offset=4'); ?>
					<?php global $wp_query; $wp_query->in_the_loop = true; ?>
					<?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
					<div class="category-post-item category-module-small">
						<div class="category-post-item-inner">
							<div class="category-post-avatar">
								<a href="<?php the_permalink(); ?>">
									<img src="<?php echo hk_get_thumb(get_the_id(), 100, 75); ?>"  alt="<?php the_title(); ?>">
								</a>
							</div>
							<div class="category-post-content">
								<a href="<?php the_permalink(); ?>">
									<h3 class="category-post-title"><?php the_title(); ?></h3>
								</a>
								<p class="category-post-info"><?php echo get_the_date(); ?></p>
							</div>
							</a>
						</div>
					</div>
					<?php endwhile; wp_reset_postdata(); ?>
				</div>
			</div>
		</div>
  	<?php echo $after_widget;} 
    function update($new_instance, $old_instance) {
      	$instance['title'] 	= strip_tags($new_instance['title']);
      	$instance['cat_id']	= $new_instance['cat_id'];
      	return $instance;
    }
  	function form($instance) {
  		$defaults = array(
		    'title' => 'Tiêu đề',
		    'cat_id' => 1,
		);
  		$instance = wp_parse_args((array) $instance, $defaults ); ?>
	    <p>
	      <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Nhập tiêu đề: '); ?></label>
	      <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>"  />
	    </p>
	    <p class="cate-kira">
	      	<label for="<?php echo $this->get_field_id('cat_id'); ?>"><?php _e('Chọn chuyên mục: '); ?></label>
		    <?php
		        wp_dropdown_categories( array(
		          	'orderby'   	=> 'count',
		          	'hide_empty' 	=> false,
		          	'hierarchical' 	=> 1,
		          	'name'       	=> $this->get_field_name( 'cat_id' ),
		          	'id'         	=> 'recent_posts_category',
		          	'class'      	=> 'widefat',
		          	'selected'   	=> $instance['cat_id']
		        ));
		    ?>
	    </p>
    <?php }
}
add_action('widgets_init', create_function('', 'return register_widget("Category_post");'));
// Lấy bài viết theo chuyên mục style 3
class News_postst3 extends WP_Widget {
  	function News_postst3() {
	    $widget_ops = array( 'classname' => 'news_postst3', 'description' => 'Hiển thị bài viết theo chuyên mục style 3' );
	    $control_ops = array( 'id_base' => 'news_postst3' ); 
	    $this->WP_Widget( 'News_postst3', '+HK - Category Post (ST3)', $widget_ops, $control_ops );
  	}
    function widget($args, $instance) {
      	extract( $args );
      	$title 	= $instance['title'];
      	$num    = $instance['num'];
      	$cat_id = $instance['cat_id'];
		if ( !defined('ABSPATH') )
  		die('-1');
  		echo $before_widget; ?>
		<div class="fv-title"><h3><span><?php echo $title; ?></span><a href="<?php echo esc_url( get_category_link($cat_id)); ?>" class="pull-right view-all">Xem tất cả</a></h3></div>
		<div class="category-content category-module">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<?php $getposts = new WP_query(); $getposts->query('post_status=publish&showposts='.$num.'&cat='.$cat_id); ?>
					<?php global $wp_query; $wp_query->in_the_loop = true; ?>
					<?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
						<div class="category-post-item category-module-full">
							<div class="category-post-item-inner">
								<div class="category-post-avatar">
									<a href="<?php the_permalink(); ?>">
										<img src="<?php echo hk_get_thumb(get_the_id(), 250, 160); ?>"  alt="<?php the_title(); ?>">
									</a>
								</div>
								<div class="category-post-content">
									<a href="<?php the_permalink(); ?>">
										<h3 class="category-post-title"><?php the_title(); ?></h3>
									</a>
									<p class="category-post-info color"><b><?php the_category(' - '); ?></b> -  <?php echo get_the_date(); ?></p>
									<p class="category-post-desc"><?php echo teaser(40); ?></p>
								</div>
								</a>
							</div>
						</div>
					<?php endwhile; wp_reset_postdata(); ?>
				</div>
			</div>
		</div>
  	<?php echo $after_widget;} 
    function update($new_instance, $old_instance) {
      	$instance['title'] 	= strip_tags($new_instance['title']);
      	$instance['num']	= $new_instance['num'];
      	$instance['cat_id']	= $new_instance['cat_id'];
      	return $instance;
    }
  	function form($instance) {
  		$defaults = array(
		    'title' 	=> 'Tiêu đề',
		    'num' 		=> 6,
		    'cat_id' 	=> 1,
		);
  		$instance = wp_parse_args((array) $instance, $defaults ); ?>
	    <p>
	      	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Nhập tiêu đề: '); ?></label>
	      	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>"  />
	    </p>
	    <p>
	      	<label for="<?php echo $this->get_field_id('num'); ?>"><?php _e('Nhập số lượng bài viết : '); ?></label>
	      	<input class="widefat" id="<?php echo $this->get_field_id('num'); ?>" name="<?php echo $this->get_field_name('num'); ?>" type="number" value="<?php echo $instance['num']; ?>" />
	    </p>
	    <p class="cate-kira">
	      	<label for="<?php echo $this->get_field_id('cat_id'); ?>"><?php _e('Chọn chuyên mục: '); ?></label>
		    <?php
		        wp_dropdown_categories( array(
		          	'orderby'   	=> 'count',
		          	'hide_empty' 	=> false,
		          	'hierarchical' 	=> 1,
		          	'name'       	=> $this->get_field_name( 'cat_id' ),
		          	'id'         	=> 'recent_posts_category',
		          	'class'      	=> 'widefat',
		          	'selected'   	=> $instance['cat_id']
		        ));
		    ?>
	    </p>
    <?php }
}
add_action('widgets_init', create_function('', 'return register_widget("News_postst3");'));
// Lấy bài viết mới nhất
class News_posthk extends WP_Widget {
  	function News_posthk() {
	    $widget_ops = array( 'classname' => 'news_posthk', 'description' => 'Hiển thị bài viết mới nhất' );
	    $control_ops = array( 'id_base' => 'news_posthk' ); 
	    $this->WP_Widget( 'News_posthk', '+HK - New Post', $widget_ops, $control_ops );
  	}
    function widget($args, $instance) {
      	extract( $args );
      	$title 	= $instance['title'];
      	$num    = $instance['num'];
		if ( !defined('ABSPATH') )
  		die('-1');
  		echo $before_widget; ?>
		<div class="fv-title"><h3><span><?php echo $title; ?></span></h3></div>
		<div class="category-content category-module">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<?php $getposts = new WP_query(); $getposts->query('post_status=publish&showposts='.$num); ?>
					<?php global $wp_query; $wp_query->in_the_loop = true; ?>
					<?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
						<div class="category-post-item category-module-full">
							<div class="category-post-item-inner">
								<div class="category-post-avatar">
									<a href="<?php the_permalink(); ?>">
										<img src="<?php echo hk_get_thumb(get_the_id(), 250, 160); ?>"  alt="<?php the_title(); ?>">
									</a>
								</div>
								<div class="category-post-content">
									<a href="<?php the_permalink(); ?>">
										<h3 class="category-post-title"><?php the_title(); ?></h3>
									</a>
									<p class="category-post-info color"><b><?php the_category(' - '); ?></b> -  <?php echo get_the_date(); ?></p>
									<p class="category-post-desc"><?php echo teaser(40); ?></p>
								</div>
								</a>
							</div>
						</div>
					<?php endwhile; wp_reset_postdata(); ?>
				</div>
			</div>
		</div>
  	<?php echo $after_widget;} 
    function update($new_instance, $old_instance) {
      	$instance['title'] 	= strip_tags($new_instance['title']);
      	$instance['num']	= $new_instance['num'];
      	return $instance;
    }
  	function form($instance) {
  		$defaults = array(
		    'title' => 'Tiêu đề',
		    'num' => 6,
		);
  		$instance = wp_parse_args((array) $instance, $defaults ); ?>
	    <p>
	      	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Nhập tiêu đề: '); ?></label>
	      	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>"  />
	    </p>
	    <p>
	      	<label for="<?php echo $this->get_field_id('num'); ?>"><?php _e('Nhập số lượng bài viết : '); ?></label>
	      	<input class="widefat" id="<?php echo $this->get_field_id('num'); ?>" name="<?php echo $this->get_field_name('num'); ?>" type="number" value="<?php echo $instance['num']; ?>" />
	    </p>
    <?php }
}
add_action('widgets_init', create_function('', 'return register_widget("News_posthk");'));