<?php
/*
Template Name: Рабочие программы
Template post type: post
*/
$bavotasan_theme_options = bavotasan_theme_options();
$format = get_post_format();
$featured_image = ( has_post_thumbnail() && 'excerpt' == $bavotasan_theme_options['excerpt_content'] ) ? 'featured-image' : 'no-featured-image';
get_header();
?>

  <div class="container">
    <div class="row">
      <div id="primary" <?php bavotasan_primary_attr(); ?>>
        <?php
        while ( have_posts() ) : the_post();
          ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class( $featured_image ); ?>>
		<?php get_template_part( 'template-parts/content', 'header' ); ?>
		    <div class="entry-content">
				<?php 
				global $wpdb;
				$mane = $wpdb->get_results("select l.LEVEL_NAME, l.LEVEL_ORDER, s.SUBJECT_NAME, s.SUBJECT_ORDER, p.PROGRAM, p.ORDER_PROG, p.LINK FROM u_program p join u_prog_level_edu l on p.level_edu = l.ID join u_prog_subject s on p.subject = s.ID where p.actual=1 order by l.LEVEL_ORDER, s.SUBJECT_ORDER, p.order_prog");
				$level = $wpdb->get_results("select distinct LEVEL_NAME FROM u_program p join u_prog_level_edu l on p.level_edu = l.ID join u_prog_subject s on p.subject = s.ID  where p.actual=1 order by l.LEVEL_ORDER");
				$subject = $wpdb->get_results("select distinct l.LEVEL_NAME, s.SUBJECT_NAME FROM u_program p join u_prog_level_edu l on p.level_edu = l.ID join u_prog_subject s on p.subject = s.ID  where p.actual=1 order by l.LEVEL_ORDER, s.SUBJECT_ORDER");

				?>
				<ul>							
					<?php 
					foreach($level as $v_level) : ?>
						<li> <?php echo $v_level->LEVEL_NAME; ?> 
							<ul>
							<?php 
							foreach($subject as $v_sub) :
								if ($v_sub->LEVEL_NAME == $v_level->LEVEL_NAME) :?>
									<li> <?php echo $v_sub->SUBJECT_NAME; ?> 
										<ul>
											<?php 
											foreach($mane as $v_mane) :
												if ($v_mane->LEVEL_NAME == $v_level->LEVEL_NAME && $v_sub->SUBJECT_NAME == $v_mane->SUBJECT_NAME) : ?>
													<li><a href="<?php echo $v_mane->LINK ?>" target="_blank"><?php echo $v_mane->PROGRAM; ?></a></li>
												<?php 
												endif;
											endforeach; 
											?>
										</ul>
									</li>
								<?php 
								endif; 
							endforeach;
							?>
							</ul>
						</li>
					<?php 
					endforeach;	
					

					?>
				</ul>
			</div>
		<?php get_template_part( 'template-parts/content', 'footer' ); ?>
	</article><!-- #post-<?php the_ID(); ?> -->
  <?php
        endwhile;
        ?>
      </div>
      <?php get_sidebar(); ?>
    </div>
  </div>

<?php get_footer(); ?>