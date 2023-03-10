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
								<span class="post-meta-date"><?php the_date(); ?></span>
								<div class="post-meta-views">
									<i class="fa fa-eye" aria-hidden="true"></i>
									<?php echo getpostviews(get_the_id()); ?>
								</div>
    						</div>
    					</header>
    					<div class="post-content">
    						<div class="pdl-10 pdr-10">
								<?php the_content() ?>
							</div>
	                		<div class="f-post-share-bottom">
	                			<span>Chia sẻ</span>
	                			<a href="https://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" onclick="window.open(this.href, 'mywin','left=50,top=50,width=600,height=350,toolbar=0'); return false;" class="fps-btn fps-facebook btn">
	                                <i class="fa fa-facebook" aria-hidden="true"></i>
	                            </a>
	                            <a href="https://twitter.com/intent/tweet?text=<?php echo teaser(50); ?>&amp;url=<?php the_permalink(); ?>&amp;via=<?php the_title(); ?>" onclick="window.open(this.href, 'mywin','left=50,top=50,width=600,height=350,toolbar=0'); return false;" class="fps-btn fps-twitter btn">
	                                <i class="fa fa-twitter" aria-hidden="true"></i>
	                            </a>
	                            <a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="window.open(this.href, 'mywin','left=50,top=50,width=600,height=350,toolbar=0'); return false;" class="fps-btn fps-google btn">
	                                <i class="fa fa-google" aria-hidden="true"></i>
	                            </a>
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