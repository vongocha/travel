		<footer>
			<div class="fv-footer" style="background:#0c797a;">
				<div class="container">
					<div class="logo-footer"><a href="<?php bloginfo( 'url' ); ?>"><img src="<?php the_field( "logo", 82 ); ?>" alt="<?php bloginfo( 'name' ); ?>"></a></div>
					<div class="row footer-post">
						<div class="col-xs-12 col-sm-4 col-md-4 footer-post-item">
							<h3 class="block-title">Liên hệ với chúng tôi</h3>
							<div class="content-footer">
								<p class="text">Địa chỉ: <?php the_field( "address", 82 ); ?></p>
								<p class="text">Email: <?php the_field( "email", 82 ); ?></p>
								<p class="text">Số điện thoại: <?php the_field( "phone", 82 ); ?></p>
								<p class="text">Website: <?php bloginfo( 'name' ); ?></p>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4 footer-post-item">
							<h3 class="block-title">Liên kết mạng xã hội</h3>
							<div class="content-socail">
								<a target="_blank" href="<?php the_field( "li", 82 ); ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
								<a target="_blank" href="<?php the_field( "tw", 82 ); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
								<a target="_blank" href="<?php the_field( "fb", 82 ); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
								<a target="_blank" href="<?php the_field( "yo", 82 ); ?>"><i class="fa fa-youtube" aria-hidden="true"></i></a>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4 footer-post-item">
							<h3 class="block-title">Fanpage</h3>
							<div class="list-cate-footer">
								<div class="fb-page" data-href="https://www.facebook.com/thietkeweb43/" data-tabs="timeline" data-height="120" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="fv-footer-copyr">
				<div class="container">
					<div class="pull-left">
						<p><?php the_field( "copyright", 82 ); ?></p>
					</div>
				</div>
			</div>
		</footer>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/libs/bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/libs/owlcarousel/owl.carousel.min.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/main.js"></script>
		<?php wp_footer(); ?>
		<div id="fb-root"></div>
		<script>
		(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.10";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
		</script>
	</body>
</html>