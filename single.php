<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package starter-theme
 */
get_header(); ?>
<?php 
if(have_posts()):
	while(have_posts()) : the_post(); ?>

<section class="single-hero">
    <div class="container single-container">
        <h1 class="single-hero__title"><?php the_title(); ?></h1>
        <?php $subtitle = get_field( 'news_subtitle' ); ?>
        <?php if($subtitle) { ?>
        <div class="single-hero__subtitle">
            <p><?php echo $subtitle; ?></p>
        </div>
        <?php } ?>
    </div>
</section>

<section class="container single-container">

    <div class="single-content editor">
        <?php the_content(); ?>
    </div>

    <!-- Get options subscribe form  -->
    <?php get_template_part('template-parts/subscribe', 'form'); ?>

</section>

<!-- Related posts  -->
<section class="container related-posts">
    <?php 
	    $do_not_duplicate = $post->ID; 
        
        // set the category ID of category 'All'
        // you want to ignore in the following array
        $cats_to_ignore = array( 1 );
        $categories = wp_get_post_categories( get_the_ID() );
        $category_in = array_diff( $categories, $cats_to_ignore );
        // ignore only if we have any category left after ignoring
        if( count( $category_in ) == 0 ) {
            $category_in = $categories;
        }
    ?>
    <?php $args2 = array(
         'post_type' => 'post',
         'post_status' => 'publish',
         'orderby' => 'date',
          'order' => 'DESC',
         'post__not_in' => array($do_not_duplicate),
         'posts_per_page' => 3,
         'category__in'   => $category_in
          ); 
    ?>
    <?php $related_post = new WP_Query($args2); ?>
    <?php if( $related_post->have_posts()): ?>
    <div class="news-grid" data-aos="fade-in">
        <?php while( $related_post->have_posts()) : $related_post->the_post(); ?>
        <?php get_template_part( 'template-parts/news', 'block' ); ?>
        <?php endwhile; ?>
    </div>

    <?php wp_reset_postdata(); ?>
    <?php endif; ?>

</section>

<?php endwhile;
endif; ?>
<?php
get_footer();