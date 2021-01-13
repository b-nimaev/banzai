<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package banzai
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col'); ?>>
	<div class="card">
		<?php domino_digital_post_thumbnail(); ?>
		<div class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="section-heading">', '</h1>' );
			else :
				the_title( '<h4 class="section-heading"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
			endif;

			if ( 'post' === get_post_type() ) :
				?>
				<div class="entry-meta">
					<?php
					domino_digital_posted_on();
					domino_digital_posted_by();
					?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</div><!-- .entry-header -->

		<div class="entry-content">
			<?php
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'domino_digital' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'domino_digital' ),
					'after'  => '</div>',
				)
			);
			?>
		</div><!-- .entry-content -->

		<div class="entry-footer">
			<?php domino_digital_entry_footer(); ?>
		</div><!-- .entry-footer -->
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
