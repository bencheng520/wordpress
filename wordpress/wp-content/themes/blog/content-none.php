<?php
/**
 * @package mwsmall
 */
?>

<section class="no-results not-found">

	<header class="page-header">
		<h2 class="page-title"><?php _e( 'Nothing Found', 'mw-small' ); ?></h2>
	</header><!-- .page-header -->
	
	<div class="entry-content clearfix">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p class="sub-info"><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'mw-small' ), admin_url( 'post-new.php' ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p class="sub-info"><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'mw-small' ); ?></p>
			<?php get_search_form(); ?>

		<?php else : ?>

			<p class="sub-info"><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'mw-small' ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>
	</div><!-- .entry-content -->	
	
</section><!-- .no-results -->