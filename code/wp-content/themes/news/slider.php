<?php if(!wp_is_mobile()){ ?>
<div class="slider-home">
	<div id="carousel-id" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<?php $getposts = new WP_query(); $getposts->query('post_status=publish&showposts=1&post_type=slider'); ?>
			<?php global $wp_query; $wp_query->in_the_loop = true; ?>
			<?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
				<div class="item active">
					<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id(get_the_id()) );?>" alt="<?php the_title(); ?>">
				</div>
			<?php endwhile; wp_reset_postdata(); ?>
			<?php $getposts = new WP_query(); $getposts->query('post_status=publish&showposts=10&post_type=slider&offset=1'); ?>
			<?php global $wp_query; $wp_query->in_the_loop = true; ?>
			<?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
				<div class="item">
					<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id(get_the_id()) );?>" alt="<?php the_title(); ?>">
				</div>
			<?php endwhile; wp_reset_postdata(); ?>
		</div>
		<a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
		<a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
	</div>
	<div class="search-box">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-7"></div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-5">
					<div class="content-search">
						<h2>Tìm kiếm thông tin du lịch</h2>
						<form action="<?php bloginfo( 'url' ); ?>/" method="GET" role="form">
							<input type="text" class="form-control input-search" name="s" placeholder="Nhập từ khóa...">
							<button type="submit" class="button-search"><i class="fa fa-search"></i></button>
						</form>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi itaque, error, facilis omnis quis ut quidem nobis ipsa doloribus recusandae perferendis esse nam voluptatem ratione voluptatum optio necessitatibus vel iure.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } else { ?>
	<div class="slider-mobile">
		<?php $getposts = new WP_query(); $getposts->query('post_status=publish&showposts=1&post_type=slider'); ?>
		<?php global $wp_query; $wp_query->in_the_loop = true; ?>
		<?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
			<div class="img-banner">
				<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id(get_the_id()) );?>" alt="<?php the_title(); ?>">
				<div class="inffo-searhc">
					<h2>Kinh nghiệm du lịch phược</h2>
					<p class="texxt-big">Đông nam á</p>
					<form action="<?php bloginfo( 'url' ); ?>/" method="GET" role="form">
						<input type="text" class="form-control input-search" name="s" placeholder="Nhập từ khóa...">
						<button type="submit" class="button-search"><i class="fa fa-search"></i></button>
					</form>
				</div>

			</div>
		<?php endwhile; wp_reset_postdata(); ?>
	</div>
<?php } ?>