<?php
/*
  Template Name: Методические объединения
  Template Post Type: mo
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
    <?php if ( ! is_single() ) { ?>
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
    <?php } ?>
      <?php
      if( ! is_single() && 'excerpt' == $bavotasan_theme_options['excerpt_content'] && has_post_thumbnail() ) {
      ?>
        <a href="<?php the_permalink(); ?>" class="image-anchor">
          <?php the_post_thumbnail( 'teaser', array( 'class' => 'alignleft' ) ); ?>
        </a>
      <?php
      }

      get_template_part( 'template-parts/content', 'header' ); ?>

      <div class="entry-content">
        <?php 
        $lenPost = strlen( get_the_content() );
        if ( ('excerpt' == $bavotasan_theme_options['excerpt_content'] && empty( $format ) && ( ! is_single() || is_search() || is_archive() ) ) && ($lenPost>500)) {
            the_excerpt();
            the_content( __( 'Read more', 'matheson') );
        } 
        else {
          global $wpdb;
          $id_mo = get_field('id_mo');
          $director = $wpdb->get_results("SELECT n.* from (SELECT u_main.id id, 
            second_name, 
            u_main.name name, 
            honor, Сourse,
            gen_experience, 
            ped_experience, 
            u_cat.name cat, 
            u_level_of_edu.name edu,
            case 
            when mpp.order is null then 99
            else mpp.order
            end as o,
            mpp.name post,
            case 
            when u_main.mammy <> 1 then 0
            else u_main.mammy
            end mammy
            FROM u_main
            left JOIN u_cat 
            ON u_cat.id = u_main.cat_u
            JOIN u_level_of_edu 
            ON u_level_of_edu.id = u_main.level_of_edu
            left join (select mp.id_main, p.id, p.order, p.name 
            from u_main_post mp
            join u_post p
            on mp.id_post = p.id
            where p.id in (6,7,8,10,11,12,13)
            ) mpp
            on u_main.id=mpp.id_main
            WHERE u_main.mo=$id_mo) n
            order by o, mammy, second_name","OBJECT");
          foreach($director as $d){
            echo "<h2>".$d->second_name." ".$d->name." </h2>";
            /*if ($d->mammy == 1) echo "<em>В отпуске по уходу за ребенком</em><br>";*/
            if ($d->o != 99){
              echo "<em>".$d->post."</em>";
            }
            $array_post=$wpdb->get_results("select id_post from u_main_post where u_main_post.id_main=".$d->id,"OBJECT");
            foreach($array_post as $post){
              if ($post->id_post=="1") {
                echo "<br><b>Учитель</b>";
                $subject = $wpdb->get_results("select u_subject.name2 from u_subject join u_main_subject on u_subject.id = u_main_subject.id_subject where u_main_subject.id_main=".$d->id,"OBJECT");
                foreach ($subject as $sub)
                  echo "<b> ".$sub->name2.";</b>";
              }
            }
            if ($d->cat) 
              echo "<br><b>Категория:</b> ".$d->cat;
            $obr = $wpdb->get_results("select t.* from u_mo_obr t where t.mo = " . $d->id);
            echo "<br><b>Образование:</b> ".$d->edu."<br>";
            foreach ($obr as $o) {
              echo "<b>Специальность:</b> " . $o->spec . "; <b>Квалификация: </b> " . $o->kval . ";<br>";
            }
            echo "<b>Общий стаж:</b> ".$d->gen_experience."<br><b>Педагогический стаж:</b> ".$d->ped_experience;
            /*if ($d->honor) echo "<br><b>Награды:</b> ".$d->honor;*/
            if ($d->Сourse) 
              echo "<br><b>Курсы:</b> ".$d->Сourse;
          }
        }
        ?>
      </div><!-- .entry-content -->
    
    <?php get_template_part( 'template-parts/content', 'footer' ); ?>

    <?php 
      if ( ! is_single() ) { ?>
      </div>
    </div>
  </div>
  <?php } ?>
  </article><!-- #post-<?php the_ID(); ?> -->

  <?php
        endwhile;
        ?>
      </div>
      <?php get_sidebar(); ?>
    </div>
  </div>

<?php get_footer(); ?>