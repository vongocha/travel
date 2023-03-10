<?php get_header(); ?>
<div class="fv-content">
    <div class="container">
    	<div class="fv-content-main">
    		<div class="row">
    			<div class="col-md-8 col-sm-8 col-xs-12 fvcm-left">
    				<div class="category-news">
    					<div class="category-news-wrap">
							<h1 class="single-title"><span><?php the_archive_title(); ?></span></h1>
    						<div class="category-content category-module">
    							<div class="row">
    								<div class="col-md-12 col-sm-12 col-xs-12">
    									<?php if (have_posts()) : ?>
    									<?php while (have_posts()) : the_post(); ?>
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
    									<?php endwhile; else : ?>
    									<p>Không có</p>
    									<?php endif; ?>
    								</div>
    								<?php if(paginate_links()!='') {?>
    								<div class="quatrang">
    									<?php
    									global $wp_query;
    									$big = 999999999;
    									echo paginate_links( array(
    										'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
    										'format' => '?paged=%#%',
    										'prev_text'    => __('<i class="fa fa-angle-double-left"></i>'),
    										'next_text'    => __('<i class="fa fa-angle-double-right"></i>'),
    										'current' => max( 1, get_query_var('paged') ),
    										'total' => $wp_query->max_num_pages
    										) );
    								    ?>
    								</div>
    								<?php } ?>
    							</div>
    						</div>
    					</div>
    				</div>
    				<!-- !category news -->

    			</div>
    			<div class="col-md-4 col-sm-4 col-xs-12 fvcm-right">
    				<div class="fv-sidebar">
    					<?php get_sidebar(); ?>
    				</div>
    			</div>
    		</div>
    	</div>
    	<!-- !content-main -->
    </div>
</div>
<?php get_footer(); ?>