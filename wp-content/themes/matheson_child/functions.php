<?php
function child_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style'), '1.09' );
	wp_enqueue_style( 'buttons-style',  get_stylesheet_directory_uri() . '/library/css/button.css', array(), '1.01' );
	wp_enqueue_style( 'other-style',  get_stylesheet_directory_uri() . '/library/css/other.css', array(), '1.10' );
}
add_action( 'wp_enqueue_scripts', 'child_styles', 100 );

add_action( 'after_setup_theme', 'matheson_child_setup' );
function matheson_child_setup(){
	load_child_theme_textdomain( 'matheson', get_stylesheet_directory() . '/languages' );
}

function improved_trim_excerpt($text) {
	global $post;
	if ( '' == $text ) {
		$text = get_the_content('');
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]>', $text);
		$text = preg_replace('@<script[^>]*?>.*?</script>@si', '', $text);
		$text = strip_tags($text, '<p>,<h2>,<h1>,<em>,<b>,<a>,<strong>, <span>, <img>');
		$excerpt_length = 30;
		$words = explode(' ', $text, $excerpt_length + 1);
		if (count($words)> $excerpt_length) {
			array_pop($words);
			array_push($words, ' ');
			$text = implode(' ', $words);
		}
	}
	return $text;
}

remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'improved_trim_excerpt');

function true_custom_fields() {
	add_post_type_support( 'info-security', 'custom-fields'); // в качестве первого параметра укажите название типа поста
}

add_action('init', 'true_custom_fields');

function my_deregister_javascript(){
	$pages = array(
		is_single(7661)
	);
	if( ! in_array(true, $pages) ){
		wp_deregister_script( 'script' ); // отключаем скрипты плагина
		wp_deregister_style( 'accordion' ); // отключаем стили плагина
	}
}
add_action('wp_print_styles', 'my_deregister_javascript', 100 );

add_filter('pre_get_posts', 'query_post_type');
function query_post_type($query) {
	if( is_category() ) {
		$post_type = get_query_var('post_type');
		if($post_type)
			$post_type = $post_type;
		else
			$post_type = array('nav_menu_item', 'post', 'mo');
		$query->set('post_type',$post_type);
		return $query;
	}
}