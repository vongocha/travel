<style>
	.text-center img {
		width: 100%;
	}
</style>
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar') ) : ?><?php endif; ?>
<div class="sidebar-item mgb-20">
	<div class="fv-title">
		<h3>
			<span>Tin mới</span>
		</h3>
	</div>
	<div class="category-post-item category-module-large">
		<div class="category-post-item-inner">
			<?php $getposts = new WP_query(); $getposts->query('post_status=publish&showposts=1'); ?>
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
	<?php $getposts = new WP_query(); $getposts->query('post_status=publish&showposts=3&offset=1'); ?>
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
<div class="sidebar-item mgb-20">
	<div class="fv-title">
		<h3>
			<span>Xem nhiều</span>
		</h3>
	</div>
	<?php $getposts = new WP_query(); $getposts->query('post_status=publish&showposts=7&post_type=post&meta_key=views&orderby=meta_value_num'); ?>
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
			</div>
		</div>
	<?php endwhile; wp_reset_postdata(); ?>
</div>
<div class="sidebar-item mgb-20">
	<?php the_field('qc_sidebar', 82); ?>
</div>