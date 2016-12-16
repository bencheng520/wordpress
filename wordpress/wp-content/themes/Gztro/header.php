<!DOCTYPE HTML>
<html dir="ltr" lang="zh-CN">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php if ( is_home() ) { ?><?php bloginfo('name'); ?> - <?php bloginfo('description');?><?php } ?>
<?php if ( is_tag() ) { ?><?php single_tag_title(); ?><? $paged = get_query_var('paged'); if ( $paged > 1 ) printf('– 第 %s 页 ',$paged); ?> - <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_category() ) { ?><?php single_cat_title(); ?><? $paged = get_query_var('paged'); if ( $paged > 1 ) printf('– 第 %s 页 ',$paged); ?> - <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_page() ) { ?><?php single_post_title(''); ?> - <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_single() ) { ?><?php echo trim(wp_title('',0)); ?><?php if (get_query_var('page')) { echo ' - 第'; echo get_query_var('page'); echo '页';}?> - <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_search() ) { ?>"<?php echo $s; ?>"的搜索结果 - <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_404() ) { ?>404页面 - <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_author() ) { ?>文章列表 - <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_month() || is_day() ) { ?><?php the_time('Y - F'); ?> - <?php bloginfo('name'); ?><?php } ?>
</title>
<?php if (is_home())
	{
	$description = get_option('gz_description');
	$keywords = get_option('gz_keywords');
	}
	elseif (is_category())
	{
	$description = category_description();
	$keywords = single_cat_title('', false);
	}
	elseif (is_tag())
	{
	$description = tag_description();
    $keywords = single_tag_title('', false);
	}
	elseif (is_single())
	{
     if ($post->post_excerpt) {$description = $post->post_excerpt;} 
	 else {$description = substr(strip_tags($post->post_content),0,240);}
    $keywords = "";
    $tags = wp_get_post_tags($post->ID);
    foreach ($tags as $tag ) {$keywords = $keywords . $tag->name . ", ";}
	}
	?>
	<meta name="keywords" content="<?php echo $keywords ?>" />
	<meta name="description" content="<?php echo $description?>" />
<link rel="Shortcut Icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" type="image/x-icon"/>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>"/>

<?php wp_head(); ?>


</head>
<body>

<div id="container">

<div id="header">
<div id="inner-header">

	<div id="logo">
	<a href="<?php echo get_settings('home'); ?>" title="<?php bloginfo('name'); ?>" style="margin-top: 3px;"><img src="<?php bloginfo('template_directory'); ?>/images/logo.gif" style="float: left;" alt="<?php bloginfo('name'); ?> - <?php bloginfo('description');?>" width="183" height="64"></a>
	</div>

<div class="mynav">
	<?php
		if(function_exists('wp_nav_menu')) {
			wp_nav_menu(array('theme_location'=>'primary','menu_id'=>'nav','container'=>'ul'));
		}
	?>
</div>
</div>

</div>

