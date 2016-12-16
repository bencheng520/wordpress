<div class="clear"></div>
<?php wp_footer(); ?>

<!--[if IE 6]>
<script type="text/javascript" src="http://wp.cdn.gongzi.org/gztro/file/js/zh_CN.js"></script>
<![endif]-->


<div id="footer">
<div id="footer-body">
<div id="footer-content">
<a href="/sitemap_baidu.xml">Baidu SiteMap</a> | <a href="/sitemap.xml">Google SiteMap</a> | <a href="http://www.alexa.com/data/details/main?url=http://gongzi.org" target="_blank">Alexa</a>
<br><a href="<?php echo get_settings('home'); ?>"><?php bloginfo('name'); ?></a> | 基于 <a href="http://www.wordpress.org" target="_blank">WordPress</a> 构建 | Theme <a href="http://www.gongzi.org/gztro.html" target="_blank" >Gztro</a> by <a href="http://www.gongzi.org" target="_blank" title="Designed by gongzi">公子</a> - [<a href="http://www.moke8.com/wordpress/" target="_blank">wordpress模板</a>]
<?php if (get_option('gz_tongji_code')!="") {?>
<?php echo stripslashes(get_option('gz_tongji_code')); ?>
<?php }?>

</div>
<script type="text/javascript" src="http://wp.cdn.gongzi.org/gztro/file/js/jquery.min.1.4.0.js"></script>
<script type="text/javascript" src="http://wp.cdn.gongzi.org/gztro/file/js/Gztro.js"></script>

<?php if ( is_singular() ){ ?>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/comments-ajax.js"></script>
<?php } ?>
<div style="display:none;"><li><a href="<?php bloginfo('url'); ?>/sitemap_baidu.xml" title="sitemap_baidu">sitemap_baidu</a></li><div>
<li style="display:none"></li>

<script type="text/javascript">
$(function(){
$(".widget ul li:last").css("border","none");
$(".widget .tab_post_links li:last").css("border","none");
})
</script>
</body>
</html>