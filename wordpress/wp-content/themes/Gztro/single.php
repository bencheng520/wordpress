<?php get_header(); ?>
<div id="content">
 <script type="text/javascript">
function copy_code(text) {
  if (window.clipboardData) {
    window.clipboardData.setData("Text", text)
	alert("已经成功将原文链接复制到剪贴板！");
  } else {
	var x=prompt('<?php bloginfo("name"); ?>温馨提示:\n\n你当前浏览器可能不支持直接复制请手动复制以下内容：\n',text);
  }
}
</script> 

	<div id="postlist">
	<?php if(have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="post-single">

			<div class="post-title-single"><h2><?php if (is_sticky()) {echo "<font style='color:#D54E21;'>[推荐]</font>";} ?><?php the_title(); ?><em><?php $t1=$post->post_date; $t2=date("Y-m-d H:i:s"); $diff=(strtotime($t2)-strtotime($t1))/3600; if($diff<24){echo "<font style='color:red;font-size:10px;'> New</font>";} ?></em></h2></div>
			
			
			<div class="post-single-info">
				<span class="info-category-icon">分类：<?php the_category(', ') ?></span>
				<span class="info-tags-icon">标签: <?php the_tags('', ',', ' '); ?></span>
				<?php    
					$furl = get_post_meta($post->ID, 'FromURL', true);
					$fname = get_post_meta($post->ID, 'FromName', true);
					if ($furl||$fname) {            
					echo "<span class='info-url-icon'><a href='$furl' rel='nofollow' target='_blank'>$fname</a></span>";         
					 }
				?>
				&nbsp;<?php edit_post_link('Edit', '', ''); ?>

			</div>
			<div class="post-content">
			

			<?php the_content(__('阅读全文')); ?>
		
			<?php wp_link_pages(array('before' => '<div class="pnext-st">', 'after' => '', 'next_or_number' => 'next', 'previouspagelink' => '上一页', 'nextpagelink' => "")); ?>   <?php wp_link_pages(array('before' => '', 'after' => '', 'next_or_number' => 'number', 'link_before' =>'<span>', 'link_after'=>'</span>')); ?>   <?php wp_link_pages(array('before' => '', 'after' => '</div>', 'next_or_number' => 'next', 'previouspagelink' => '', 'nextpagelink' => "下一页")); ?>
		
		<?php if (get_option('gz_ctn_btm_ad') == 'Hide') { ?>
		<?php { echo ''; } ?>
		<?php } else { include(TEMPLATEPATH . '/includes/ad_ctn_btm.php'); } 
		?>
		<div class="crinfo">

			更新日期: <?php the_time('Y-m-d H:i:s'); ?>
			<br/>文章标签: <?php the_tags('', ',', ' '); ?>
			<br/>文章链接: <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_permalink() ?></a> &nbsp;[<a href="#" title="点击复制本文链接,分享给好友哦!" onclick="copy_code('<?php the_title(); ?>: <?php the_permalink() ?>'); return false;">复制链接</a>]
			<br/>站方声明: 除特别标注, 本站所有文章均为原创, 互联分享, 尊重版权, 转载请注明.<br />
			<br/>
		</div>

<br/>
</div>


<div class="frontback"><div class="next"><?php  if (get_next_post()) {next_post_link('上一篇：%link'); } else { echo "上一篇：已经是第一篇了"; }; ?></div><br/><div class="pre"><?php  if (get_previous_post()) {previous_post_link('下一篇：%link'); } else { echo "下一篇：已经是最后一篇了"; }; ?></div></div>


<div id="comments"><?php comments_template('', true); ?></div>
	</div>
	<?php endwhile; endif; ?>
	
	</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>