<?php
/**
 * The template for displaying a "No posts found" message.
 *
 * @since 1.0.6
 */

?>
<div class="container">
	<div class="row">
		<div id="primary" class="col-md-8">
			<?php if ( ! is_single() ) { ?>
				<article id="post-0">

					<h1 style="font-size:500%; text-align:center"><?php _e( 'Ничего не найдено', 'matheson' ); ?></h1>

				</article>
				<!-- #post-0 -->
		   	<?php } ?>
		</div>
		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>