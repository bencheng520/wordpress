<?php get_header(); ?>
<div id="wrapper">
<div id="content">
	<div id="postlist">
	<?php if(have_posts()) : while (have_posts()) : the_post(); ?>
<div class="article">
		
	<div class="tagleft">
		<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="详细阅读 <?php the_title_attribute(); ?>">
		
		<?php if (is_sticky()) { ?>
			<?php { echo "<font style='color:#D54E21;'>[置顶]</font>"; } ?>
			<?php  } ?>
		<?php the_title(); ?><em><?php $t1=$post->post_date; $t2=date("Y-m-d H:i:s"); $diff=(strtotime($t2)-strtotime($t1))/3600; if($diff<24){echo "<font style='color:red;font-size:8px;'> New</font>";} ?></em></a></h2>
	</div>
	<div class="infotop">
		<span class="info-date-icon"><?php the_time('m') ?>-<?php the_time('d') ?></span>
		<span class="info-category-icon"><?php the_category(', ') ?></span>
		<span class="info-comment-icon"><?php comments_popup_link ('沙发还在','还有板凳','%条评论'); ?> &nbsp; <?php edit_post_link('Edit', '', ''); ?></span>
	</div>
	<div class="thumbnail_box">
		<div class="thumbnail">
		 <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" target="_blank">
			<?php if ( get_post_meta($post->ID, 'show', true) ) : ?>
				<?php $image = get_post_meta($post->ID, 'show', true); ?>
				<img src="<?php echo $image; ?>"width="140" height="100" alt="<?php the_title(); ?>"/>
				<?php else: ?>
				<?php if (has_post_thumbnail()) { the_post_thumbnail('home-thumb' ,array( 'alt' => trim(strip_tags( $post->post_title )), 'title' => trim(strip_tags( $post->post_title )),'class' => 'home-thumb')); }
				else { ?>
					 <img src="<?php echo post_thumbnail() ?>" alt="<?php the_title(); ?>" width="140" height="100" />
				<?php } ?>
				<?php endif; ?>
				</a>

		</div>
	</div>
	<div class="entry_post">


<span><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 220,"..."); ?></span>
<div class="clear"></div>

</div></li></ul>
	
</div>
		<?php endwhile; endif; ?>
		<div class="pagenavi"><?php pagenavi(); ?></div>
	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
