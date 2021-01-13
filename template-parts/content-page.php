<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package banzai
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-header">
		<?php the_title( '<h1 class="section-heading">', '</h1>' ); ?>
	</div><!-- .entry-header -->

	<?php domino_digital_post_thumbnail(); ?>

	<div class="row">
		<div class="col-md-3">
			<div class="topsing">
				<h4>Ингредиенты</h4>
			</div>

		</div>
		<div class="col content">
			<div class="topsing">
				<div class="block">
					<span>Показывать:</span>
					<ul>
						<li><a href="javascript:void(0)">12</a></li>
						<li><a href="javascript:void(0)">24</a></li>
						<li><a href="javascript:void(0)">Все</a></li>
					</ul>
				</div>

				<div class="block">
					<span>Сортировать:</span>
					<div class="filter">
						<a class="actived-filter" href="javascript:void(0)">По возрастанию цены</a>
						<ul class="filter-list">
							<li><a href="javascript:void(0)">По возрастанию цены</a></li>
							<li><a href="javascript:void(0)">По убыванию цены</a></li>
							<li><a href="javascript:void(0)">По алфавиту от А до Я</a></li>
							<li><a href="javascript:void(0)">По алфавиту от Я до А</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="entry-content">
				<?php
				the_content();

				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'domino_digital' ),
						'after'  => '</div>',
					)
				);
				?>
			</div><!-- .entry-content -->
		</div>
	</div>

	<?php if ( get_edit_post_link() ) : ?>
		<div class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'domino_digital' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</div><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
