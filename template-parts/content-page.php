<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package RRAPS
 */

?>

<article class="page-content" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div id="w-node-_04262738-11c5-e4a5-5498-872146d9619f-7d0ee0ad" class="w-layout-layout wf-layout-layout">
        <div class="w-layout-cell">
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title big">', '</h1>' ); ?>
			<?php rraps_post_thumbnail(); ?>
	</header><!-- .entry-header -->
        </div>
        <div class="w-layout-cell">

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'rraps' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->
        </div>
      </div>

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'rraps' ),
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
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
