<?php get_header(); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<?php setpostview(get_the_id()); ?>
<div class="fv-content">
    <div class="container">
    	<div class="fv-content-main">
    		<div class="row">
    			<div class="col-md-8 col-sm-8 col-xs-12 fvcm-left">
    				<article class="fv-post-content">
    					<header class="post-content-title">
    						<h1><?php the_title(); ?></h1>
    						<div class="post-meta-info">
    							<b class="post-meta-cate"><?php the_category(' - '); ?></b>
    						</div>
    					</header>
    					<div class="post-content">
    						<div class="pdl-10 pdr-10">
								<?php the_content() ?>
							</div>
							<div class="cmt">
								<div class="fb-comments" data-width="100%" data-href="<?php the_permalink(); ?>" data-numposts="3"></div>
							</div>
							<hr>
                            <div class="f-post-tags">
	                            <?php the_tags('Từ khóa: '); ?>
	                		</div>
	                		<span class="like">
								<div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
								<script src="https://apis.google.com/js/platform.js" async defer></script>
							  	<g:plusone size="medium"></g:plusone>
							</span>
	                		<hr>
	                		<div class="f-post-share-bottom">
	                			<span>Chia sẻ</span>
	                			<a href="https://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" onclick="window.open(this.href, 'mywin','left=50,top=50,width=600,height=350,toolbar=0'); return false;" class="fps-btn fps-facebook btn">
	                                <i class="fa fa-facebook" aria-hidden="true"></i>
	                            </a>
	                            <a href="https://twitter.com/intent/tweet?text=<?php echo teaser(50); ?>&amp;url=<?php the_permalink(); ?>&amp;via=<?php the_title(); ?>" onclick="window.open(this.href, 'mywin','left=50,top=50,width=600,height=350,toolbar=0'); return false;" class="fps-btn fps-twitter btn">
	                                <i class="fa fa-twitter" aria-hidden="true"></i>
	                            </a>
	                            <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&summary=<?php echo teaser(50); ?>&source=LinkedIn" onclick="window.open(this.href, 'mywin','left=50,top=50,width=600,height=350,toolbar=0'); return false;" class="fps-btn fps-twitter btn" style="background: #2676b5;">
	                                <i class="fa fa-linkedin" aria-hidden="true"></i>
	                            </a>
	                            <a href="https://www.pinterest.com/pin/find/?url=<?php the_permalink(); ?>" onclick="window.open(this.href, 'mywin','left=50,top=50,width=600,height=350,toolbar=0'); return false;" class="fps-btn fps-twitter btn" style="background: #e00;">
	                                <i class="fa fa-pinterest" aria-hidden="true"></i>
	                            </a>
	                		</div>
    					</div>
    					<div class="post_related">
    						<h3 class="pr-title"><span>Bài viết liên quan</span></h3>
    						<div class="row">
    							<?php
								    $categories = get_the_category($post->ID); if ($categories) 
								    { $category_ids = array(); foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
								        $args=array(
								        	'category__in' => $category_ids,
								        	'post__not_in' => array($post->ID),
								        	'showposts'=>6, 
								        	'caller_get_posts'=>1
								        );
								        $my_query = new wp_query($args);
								        if( $my_query->have_posts() ) { while ($my_query->have_posts()) { $my_query->the_post(); ?>
								                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
													<div class="pr-item">
														<div class="pr-item-item-inner">
															<a href="<?php the_permalink(); ?>">
																<div class="pr-item-avatar">
																	<img src="<?php echo hk_get_thumb(get_the_id(), 237, 156); ?>"  alt="<?php the_title(); ?>">
																</div>
																<div class="pr-item-content">
																	<h3><?php the_title(); ?></h3>
																</div>
															</a>
														</div>
													</div>
												</div>
								        <?php } }
								    }
								?>
							</div>
    					</div>
    				</article>
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
<?php endwhile; ?>
<?php endif; ?>
<?php get_footer() ?>