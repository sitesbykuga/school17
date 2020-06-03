<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <main>
 * and the left sidebar conditional
 *
 * @since 1.0.0
 */
?><!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" <?php language_attributes(); ?>><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
<head>
	<meta name="sputnik-verification" content="bVNfNyjAuL25EG2Y"/>
	<meta name="yandex-verification" content="ea14e72cb5c6927b" />	
	<script src="https://use.fontawesome.com/ac4efab8f2.js"></script>
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/manifest.json">
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#b53224">
	<meta name="theme-color" content="#ffffff">
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link href="/wp-content/themes/matheson/hide_check.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Philosopher" rel="stylesheet">
	<link rel="stylesheet" href="/wp-content/themes/matheson/library/css/font-awesome.min.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700' rel='stylesheet' type='text/css'>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
	<script src="/wp-content/themes/matheson/library/js/jquery-3.1.1.js" type="text/javascript"></script>
<script type="text/javascript">// <![CDATA[
$(document).ready(function(){
	$(".hider").click(function(){
		$("#hidden").slideToggle("slow");
		return false;
	});
});
// ]]></script>
<script type="text/javascript">// <![CDATA[
$(document).ready(function(){
	$(".hider1").click(function(){
		$("#hidden1").slideToggle("slow");
		return false;
	});
});
// ]]></script>
<!--[if IE]><script src="<?php echo BAVOTASAN_THEME_URL; ?>/library/js/html5.js"></script><![endif]-->
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="page">
		<div style="display: inline-block; width: 100%; background: #14947b; color: #fff; font-family: 'Philosopher', sans-serif; border-left: 15px solid #b53224; line-height: 1.1;">
			<div style="display: table-cell; padding: 5px; float: left;"><a href="http://school17-tmn.ru"><img src="http://school17-tmn.ru/wp-content/uploads/2018/01/Emblema.png" style="width: 120px" /></a></div>
			<div style="display: table-cell; width: 60%; padding: 5px; font-size: 22px;vertical-align: middle"><center><a href="http://school17-tmn.ru" style="color: #fff; text-decoration:none;">Муниципальное автономное общеобразовательное учреждение<br/><br/>
			средняя общеобразовательная школа №17 города Тюмени</a></center></div>
			<div style="display: table-cell; width: 30%; padding: 5px; border-left: 1px dotted #fff;"><i class="fa fa-home fa-fw"></i> 625035, г.Тюмень, проезд Геологоразведчиков, д.39<br/>
				<i class="fa fa-phone fa-fw"></i> <a style="color: #fff;" href="tel:+73452359378">+7(3452)359378</a><br/>
				<i class="fa fa-envelope fa-fw"></i> <a style="color: #fff;" href="mailto:school17-tmn@yandex.ru">school17-tmn@yandex.ru</a><br/>
				<i class="fa fa-globe fa-fw"></i> <a style="color: #fff;" href="http://school17-tmn.ru">school17-tmn.ru</a><br/>
				<i class="fa fa-map-marker fa-fw"></i> <a style="color: #fff;" href="https://2gis.ru/tyumen/search/%D1%88%D0%BA%D0%BE%D0%BB%D0%B0%2017/firm/1830115629597559?queryState=center%2F65.579603%2C57.128964%2Fzoom%2F17" target="_blank" rel="noopener">Схема проезда</a>
				<br/>
				<i class="fa fa-clock-o" style="margin:4px"></i> <a style="color: #fff;" href="http://school17-tmn.ru/?p=8576" target="_blank" rel="noopener">Режим работы</a></div>
			</div>


			<header id="header">
				<div class="container header-meta">
					<nav id="site-navigation2" class="navbar22" role="navigation">
						<h3 class="sr-only"><?php _e( 'Main menu', 'matheson' ); ?></h3>
						<a class="sr-only" href="#primary" title="<?php esc_attr_e( 'Skip to content', 'matheson' ); ?>"><?php _e( 'Skip to content', 'matheson' ); ?></a>

						<?php wp_nav_menu( array( 'menu' => '222', 'theme_location' => 'primary', 'container_class' => 'collapse navbar-collapse','menu_class' => 'bNavigation2', 'fallback_cb' => 'bavotasan_default_menu', 'depth' => 0 ) ); ?>
					</nav>
				</div>
				<div class="container header-meta">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<i class="fa fa-bars"></i>
					</button>

					<nav id="site-navigation" class="navbar" role="navigation">
						<h3 class="sr-only"><?php _e( 'Main menu', 'matheson' ); ?></h3>
						<a class="sr-only" href="#primary" title="<?php esc_attr_e( 'Skip to content', 'matheson' ); ?>"><?php _e( 'Skip to content', 'matheson' ); ?></a>

						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => 'collapse navbar-collapse','menu_class' => 'bNavigation', 'fallback_cb' => 'bavotasan_default_menu', 'depth' => 0 ) ); ?>
					</nav><!-- #site-navigation -->
				</div>
			</header>

		<div class="container">
				<div class="row">
					<div>
						<img src="http://school17-tmn.ru/wp-content/uploads/2020/04/9may_field6.jpg" alt="">
						
					</div>
				</div>
			</div><!--
			<div class="container">
				<div class="row">
					<div id="attention">
						<img  id="img-attention" src="http://school17-tmn.ru/wp-content/uploads/2020/03/download.jpg" alt="">
						<a class="btn-attention" href="http://school17-tmn.ru/?page_id=9794">Дистанционное<br>обучение</a>
					</div>
				</div>
			</div>-->
			<main>