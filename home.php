<?php get_header(); // Template Name: Blog page ?>

<!-- Blog hero -->
<section class="container-right-full hero-wrap">
    <div class="hero container-right-full--inner">
        <div class="hero__content" data-aos="fade-in">
            <?php the_field( 'hero_content', 'option' ); ?>
        </div>
        <div class="hero__img" data-aos="fade-in">
            <?php $hero_image = get_field( 'hero_image', 'option' ); ?>
            <?php if ( $hero_image ) { ?>
            <img data-skip-lazy="" src="<?php echo $hero_image['sizes']['large']; ?>"
                alt="<?php echo $hero_image['alt']; ?>" sizes="(min-width: 800px) 50vw, 100vw" srcset="<?php echo $hero_image['sizes']['medium_large']; ?> 500w,
                <?php echo $hero_image['sizes']['large']; ?> 900w,
                <?php echo $hero_image['sizes']['1536x1536']; ?> 1400w">
            <?php } ?>
        </div>
    </div>
</section>


<!-- Custom news filter -->
<section class="container" data-aos="fade-in">

    <div class="news__filter">

        <form action="" method="post" id="filter">

            <div class="search-wrap">
                <input type="text" class="search-field" id="keyword" name="s" placeholder="Search articles" value="">
                <span class="clear-btn"></span>
            </div>

            <div class="select-wrap">
                <select class="filter-item select-filter" name="category" id="category">

                    <?php $categories = get_categories($cat_args); ?>

                    <?php foreach($categories as $post_category) { ?>
                    <option value="<?php echo esc_html( $post_category->name ); ?>">
                        <?php echo esc_html($post_category->name); ?></option>
                    <?php } ?>

                </select>
            </div>

            <div class="btn-wrap">
                <button class="btn filter-submit">Apply</button>
            </div>
        </form>

    </div>


    <div class="response-wrap">
        <!-- loader for filter -->
        <div class="load">
            <i class="load__icon"></i>
        </div>

        <!-- here we will insert our filter results -->
        <div id="response">
        <div class="news-grid">
        <?php
           
            // Display sticky post 
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            if ($paged === 1) {
                
                // On the first page, include sticky posts and show only one sticky post
                $sticky_args = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => 1,
                    'post__in' => get_option('sticky_posts'),
                    'ignore_sticky_posts' => 0, // Include sticky posts
                    'paged' => 1
                );
        
                $sticky_query = new WP_Query($sticky_args);
        
                if ($sticky_query->have_posts()) :
                    while ($sticky_query->have_posts()) :
                        $sticky_query->the_post();
                        get_template_part('template-parts/news', 'block');
                    endwhile;
                endif;
                wp_reset_postdata();
        
                $args = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => 8, // Adjust the number of non-sticky posts per page
                    'post__not_in' => get_option('sticky_posts'),
                    'paged' => $paged - 1 // Adjust the page number for non-sticky posts
                );

            } else {
                // On subsequent pages, exclude sticky posts
                $args = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => 9, // Adjust the number of non-sticky posts per page
                    'post__not_in' => get_option('sticky_posts'),
                    'paged' => $paged
                );
            }

            $wp_query = new WP_Query( $args );

            if ( $wp_query->have_posts() ) : ?>

                <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

                <?php get_template_part('template-parts/news', 'block'); ?>

                <?php endwhile; ?>

            <?php  wp_reset_postdata();?>

            <?php else : ?>

            <h4>
                <?php esc_html_e( 'No posts.', 'gulp_wordpress' ); ?>
            </h4>

            <?php endif; ?>

            </div>
        </div>

        <!-- here we will insert our updated pagination -->
        <div id="pagination-ajax">

            <?php $number_pages = $wp_query->max_num_pages; ?>
                    
            <?php if($number_pages > 1){ ?>

            <ul class="pagination">

                <?php
                    $n=1; while ($n <= $number_pages)  { ?>

                <li class="pagination-ajax__item num <?php if($n==1){ echo 'current'; }  ?>"
                    data-number="<?php echo $n; ?>">
                    <a href="#"><span><?php echo $n; ?></span></a>
                </li>

                <?php $n++; } ?>
                <?php if ($number_pages > 1) { ?>
                <li class="pagination-ajax__item num next" data-next="next"><span><a href="#">next</a></span>
                </li>
                <?php }?>

            </ul>
            <?php }?>

        </div>
    </div>
</section>

<!-- Get options subscribe form  -->
<div class="container">
    <?php get_template_part('template-parts/subscribe', 'form'); ?>
</div>
<?php get_footer(); ?>