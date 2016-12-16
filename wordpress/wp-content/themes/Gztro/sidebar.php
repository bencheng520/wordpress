
<div id="sidebar">
<?php if (get_option('gz_sid_adcode1') == 'Hide') { ?>
		<?php { echo ''; } ?>
		<?php } else { include(TEMPLATEPATH . '/includes/ad_sid_ad_code1.php'); } 
?>

<li class="widget tab_box" id="tab_box_posts">
<ul class="tab_menu">
<li class="current">热门围观</li>
</ul>
<div class="tab_content">
<div class>
<ul class="tab_post_links">
<?php simple_get_most_viewed(); ?>
</ul>
</div>
</li>
<ul>
<?php if ( is_single()  ) { ?>
<?php if (get_option('gz_sid_adcode2') == 'Hide') { ?>
		<?php { echo ''; } ?>
		<?php } else { include(TEMPLATEPATH . '/includes/ad_sid_ad_code2.php'); } 
?>
<?php } ?>
</ul>
<li class="widget tab_box" id="tab_box_posts">

<ul class="tab_menu">
<li class="current">最新评论</li>
</ul>
<div class="tab_content">
<div class="r_comment">
<ul>
		<?php
			global $wpdb;
			$sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID, comment_post_ID, comment_author, comment_date_gmt, comment_approved, comment_type,comment_author_url,comment_author_email, SUBSTRING(comment_content,1,20) AS com_excerpt FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID = $wpdb->posts.ID) WHERE comment_approved = '1' AND comment_type = '' AND post_password = '' AND user_id='0' ORDER BY comment_date_gmt DESC LIMIT 6";
			$comments = $wpdb->get_results($sql);
			$output = $pre_HTML;
			foreach ($comments as $comment) {$output .= "\n<li>".get_avatar(get_comment_author_email(), 32).strip_tags($comment->comment_author).":<br />" . " <a href=\"" . get_permalink($comment->ID) ."#comment-" . $comment->comment_ID . "\" title=\"查看 " .$comment->post_title . "\">" . strip_tags($comment->com_excerpt)."</a></li>";}
			$output .= $post_HTML;
			$output = convert_smilies($output);
			echo $output;
		?> 
</ul></div>
</li>

</div>
</div>
</div>