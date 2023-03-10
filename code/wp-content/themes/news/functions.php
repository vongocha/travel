<?php 
require get_template_directory() . '/core/types.php';
require get_template_directory() . '/resize.php';
require get_template_directory() . '/widget/widget.php';
add_filter('show_admin_bar', '__return_false');
function fudo_setup(){
	add_theme_support( 'post-thumbnails' );
	if (function_exists('register_sidebar')){
		register_sidebar(array(
			'name'=> 'Trang chủ',
			'id' => 'home',
			'before_widget' => '<div class="category-news"><div class="category-news-wrap">',
			'after_widget'  => "</div></div>\n",
		));
		register_sidebar(array(
			'name'=> 'Cột bên',
			'id' => 'sidebar',
			'before_widget' => '<div class="sidebar-item mgb-20">',
			'after_widget'  => "</div>\n",
			'before_title'  => '<div class="fv-title"><h3><span>',
			'after_title'   => "</span></h3></div>\n",
		));
		register_sidebar(array(
			'name'=> 'Home top',
			'id' => 'home_top',
			'before_widget' => '<div class="sidebar-item mgb-20">',
			'after_widget'  => "</div>\n",
			'before_title'  => '<div class="fv-title"><h3><span>',
			'after_title'   => "</span></h3></div>\n",
		));
	}
	function teaser($limit) {
		$excerpt = explode(' ', get_the_excerpt(), $limit);
		if (count($excerpt)>=$limit) {
			array_pop($excerpt);
			$excerpt = implode(" ",$excerpt).'[...]';
		} else {
			$excerpt = implode(" ",$excerpt);
		}
		$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
		return $excerpt.'...';
	}
	function setpostview($postID){
	    $count_key ='views';
	    $count = get_post_meta($postID, $count_key, true);
	    if($count == ''){
	        $count = 0;
	        delete_post_meta($postID, $count_key);
	        add_post_meta($postID, $count_key, '0');
	    } else {
	        $count++;
	        update_post_meta($postID, $count_key, $count);
	    }
	}
	function getpostviews($postID){
	    $count_key ='views';
	    $count = get_post_meta($postID, $count_key, true);
	    if($count == ''){
	        delete_post_meta($postID, $count_key);
	        add_post_meta($postID, $count_key, '0');
	        return "0";
	    }
	    return $count;
	}
	function cutvideo($linkvideo) {
		$num = strlen($linkvideo);
		$vt = ($mun-11);
		$kq = substr($linkvideo, $vt, 11);
		return $kq;
	}
}
add_action('init', 'fudo_setup' );
function register_my_menus(){
		register_nav_menus(
			array(
				'top_nav' => 'Menu top',
				'main_nav' => 'Menu chính',
				'cat_nav' => 'Chuyên mục',
			)
		);
	}
add_action('init', 'register_my_menus' );
function wpc_unset_imagesizes($sizes){  
    unset( $sizes['thumbnail']);  
    unset( $sizes['medium']);  
    unset( $sizes['medium_large']);  
    unset( $sizes['large']);  
}  
add_filter('intermediate_image_sizes_advanced', 'wpc_unset_imagesizes' );
function hk_get_thumb($id, $w, $h){
	if(get_post_thumbnail_id($id)){
		$url = wp_get_attachment_url( get_post_thumbnail_id($id));
	} else {
		$url = get_bloginfo('template_directory').'/images/no-thumb.jpg';
	}                                                        
	$image = huykira_image_resize($url, $w, $h, true, false);
	return $image['url'];	
}
function hk_get_image($url, $w, $h){                                                        
	$image = huykira_image_resize($url, $w, $h, true, false);
	return $image['url'];	
}
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );
function remove_width_attribute( $html ) {
$html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
	return $html;
}
add_filter( 'max_srcset_image_width', create_function( '', 'return 1;' ) );

class Child_Wrap extends Walker_Nav_Menu
{
    function start_lvl(&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<i class=\"show-child-menu fa fa-angle-right\" aria-hidden=\"true\"></i><ul class=\"sub-menu\">\n";
    }
    function end_lvl(&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }
}
function page_info($field, $single = true){
	return get_post_meta(82, 'wpcf-'.$field, $single);
}

add_action('pre_get_posts','wpse67626_exclude_posts_from_search');
function wpse67626_exclude_posts_from_search( $query ){
    if( $query->is_main_query() && is_search() ){
         $post_ids = array(82);
         $query->set('post__not_in', $post_ids);
    }
}
function tao_custom_post_type(){
    $label = array(
        'name' => 'Ảnh slider',
        'singular_name' => 'slider',
    );
    $args = array(
        'labels' => $label, //Gọi các label trong biến $label ở trên
        'description' => 'Post type đăng slider', //Mô tả của post type
        'supports' => array(
            'title',
            'thumbnail',
        ),
        'hierarchical' => false, //Cho phép phân cấp, nếu là false thì post type này giống như Post, true thì giống như Page
        'public' => true, //Kích hoạt post type
        'show_ui' => true, //Hiển thị khung quản trị như Post/Page
        'show_in_menu' => true, //Hiển thị trên Admin Menu (tay trái)
        'show_in_nav_menus' => true, //Hiển thị trong Appearance -> Menus
        'show_in_admin_bar' => true, //Hiển thị trên thanh Admin bar màu đen.
        'menu_position' => 5, //Thứ tự vị trí hiển thị trong menu (tay trái)
        'menu_icon' => 'dashicons-format-gallery', //Đường dẫn tới icon sẽ hiển thị
        'can_export' => true, //Có thể export nội dung bằng Tools -> Export
        'has_archive' => true, //Cho phép lưu trữ (month, date, year)
        'exclude_from_search' => false, //Loại bỏ khỏi kết quả tìm kiếm
        'publicly_queryable' => true, //Hiển thị các tham số trong query, phải đặt true
        'capability_type' => 'post' //
    );
    register_post_type('slider', $args);
 
}
add_action('init', 'tao_custom_post_type');

function create_shortcode_slider($args){
	if(isset($args['num'])){ ?>
		<style>
			div#carousel-id {margin-bottom: 20px;}
			div#carousel-id img{width: 100%}
			.carousel-control {background: none!important;}
		</style>
		<div id="carousel-id" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<?php
					$i = 1;
					$getposts = new WP_query(); $getposts->query('post_status=publish&showposts='.$args['num'].'&post_type=slider'); 
					global $wp_query; $wp_query->in_the_loop = true;
					while ($getposts->have_posts()) : $getposts->the_post();
					if($i == 1){ ?>
						<div class="item active">
							<?php echo get_the_post_thumbnail(get_the_id(), 'full', array( 'class' =>'thumnail') ); ?>
						</div>
					<?php } else { ?>
						<div class="item">
							<?php echo get_the_post_thumbnail(get_the_id(), 'full', array( 'class' =>'thumnail') ); ?>
						</div>
					<?php } $i++;
					endwhile; wp_reset_postdata();
				?>
			</div>
			<a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
			<a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
		</div>
	<?php }
}
add_shortcode('show_slider', 'create_shortcode_slider');
//do_shortcode('[show_slider num="2"]'); -> Đoạn code hiển thị slider ra ngoài! 