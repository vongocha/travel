<style>
	.text-white a{
		color: #fff;
	}
</style>
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('home_top') ) : ?><?php endif; ?>
<div class="feature-news">
	<div class="fn-post-large">
		<div class="news-post-item">
			<div class="new-post-item-inner">
				<?php $getposts = new WP_query(); $getposts->query('post_status=publish&showposts=1&cat=7'); ?>
				<?php global $wp_query; $wp_query->in_the_loop = true; ?>
				<?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
					<a href="<?php the_permalink(); ?>">
						<div class="post-avatar">
							<img src="<?php echo hk_get_thumb(get_the_id(), 568, 465); ?>"  alt="<?php the_title(); ?>">
						</div>
						<div class="post-content">
							<h3 class="text-white"><?php the_title(); ?></h3>
							<p class="text-white"> <?php the_category(' - '); ?> | <?php echo get_the_date('d - m - Y'); ?></p>
						</div>
					</a>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>
		</div>
	</div>
	<div class="fn-post-medium">
		<div class="news-post-item">
			<div class="new-post-item-inner">
				<?php $getposts = new WP_query(); $getposts->query('post_status=publish&showposts=1&cat=7&offset=1'); ?>
				<?php global $wp_query; $wp_query->in_the_loop = true; ?>
				<?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
					<a href="<?php the_permalink(); ?>">
						<div class="post-avatar">
							<img src="<?php echo hk_get_thumb(get_the_id(), 568, 262); ?>"  alt="<?php the_title(); ?>">
						</div>
						<div class="post-content">
							<h3 class="text-white"><?php the_title(); ?></h3>
							<p class="text-white"> <?php the_category(' - '); ?> | <?php echo get_the_date('d - m - Y'); ?></p>
						</div>
					</a>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>
		</div>
		<div class="news-post-item">
			<div class="new-post-item-inner">
				<?php $getposts = new WP_query(); $getposts->query('post_status=publish&showposts=1&cat=7&offset=2'); ?>
				<?php global $wp_query; $wp_query->in_the_loop = true; ?>
				<?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
					<a href="<?php the_permalink(); ?>">
						<div class="post-avatar">
							<img src="<?php echo hk_get_thumb(get_the_id(), 282, 198); ?>"  alt="<?php the_title(); ?>">
						</div>
						<div class="post-content">
							<h3 class="text-white"><?php the_title(); ?></h3>
							<p class="text-white"> <?php the_category(' - '); ?> | <?php echo get_the_date('d - m - Y'); ?></p>
						</div>
					</a>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>
		</div>
		<div class="news-post-item">
			<div class="new-post-item-inner">
				<?php $getposts = new WP_query(); $getposts->query('post_status=publish&showposts=1&cat=7&offset=3'); ?>
				<?php global $wp_query; $wp_query->in_the_loop = true; ?>
				<?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
					<a href="<?php the_permalink(); ?>">
						<div class="post-avatar">
							<img src="<?php echo hk_get_thumb(get_the_id(), 282, 198); ?>"  alt="<?php the_title(); ?>">
						</div>
						<div class="post-content">
							<h3 class="text-white"><?php the_title(); ?></h3>
							<p class="text-white"> <?php the_category(' - '); ?> | <?php echo get_the_date('d - m - Y'); ?></p>
						</div>
					</a>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>
		</div>
	</div>
</div>
<div class="clearfix"></div>