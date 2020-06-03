<?php
/**
 * The template for displaying article headers
 *
 * @since 1.0.6
 */
$bavotasan_theme_options = bavotasan_theme_options();
?>

	<?php 
	if ( is_single() || is_singular( 'mo' ) ) : 
		the_title( '<h1 class="entry-title">', '</h1>' );
	else : 
		the_title( sprintf( '<h2 class="entry-title taggedlink"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
	endif; 
	?>
	
	<div class="entry-meta">
		<?php
		/*$display_author = $bavotasan_theme_options['display_author'];
		if ( $display_author )
			printf( __( 'by %s', 'matheson' ),
				'<span class="vcard author"><span class="fn"><a href="' . get_author_posts_url( get_the_author_meta( 'ID' ) ) . '" title="' . esc_attr( sprintf( __( 'Posts by %s', 'matheson' ), get_the_author() ) ) . '" rel="author">' . get_the_author() . '</a></span></span>'
			);*/

		$display_date = $bavotasan_theme_options['display_date'];
		if( $display_date ) {
			/*if( $display_author )*/
				echo '&nbsp;' . __( 'on', 'matheson' ) . '&nbsp;';

		    echo '<a href="' . get_permalink() . '" class="time"><time class="date published updated" datetime="' . get_the_date( 'Y-n-d' ) . '">' . get_the_date('d M Y') . '</time></a>';
	    }

		$display_categories = $bavotasan_theme_options['display_categories'];
		if( $display_categories ) {
			if( $display_date )
				echo '&nbsp;' . __( 'in', 'matheson' ) . '&nbsp;';

		    the_category( ', ' );
	    }

		/*$display_comments = $bavotasan_theme_options['display_comment_count'];
		if( $display_comments && comments_open() ) {
			if ( $display_author || $display_date )
				echo '&nbsp;&bull;&nbsp;';

			comments_popup_link( __( '0 Comments', 'matheson' ), __( '1 Comment', 'matheson' ), __( '% Comments', 'matheson' ) );
		}*/
		?>
	</div>