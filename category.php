<?php get_header(); ?>

<section class="container-right-full hero-wrap" >
    <div class="hero container-right-full--inner">
        <div class="hero__content" data-aos="fade-in">
         <h1>Blog</h1>
         <p>Things move quickly at i4SEE. Keep up with the latest news, insights on the industry, agile practices and the successes of our customers.</p>
        </div>
        <div class="hero__img" data-aos="fade-in">
                <img data-skip-lazy="" src="https://i4seetestwebsite-develop.azurewebsites.net/wp-content/uploads/2021/10/glowing-turbines-graphic.png">
        </div>
    </div>
</section>

<section class="news container categories">
    <?php 
        $cat_args = array(
            // 'exclude' => array(1),
            // 'option_all' => 'All'
        );
    ?>
    <?php $categories = get_categories($cat_args); ?>
    <div class="news-header-center">
        <div class="news-header">
            <div class="news-tabs">
                <span class="tab tab--border tab--active"><a href="#">All</a></span>
                <?php foreach($categories as $post_category) { ?>
                  
                    <span class="tab tab--border js-filter-item"><a href="<?php echo get_term_link($post_category);?>"><?php echo $post_category->name; ?></a></span>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="">
        <div id="posts" class="news-grid">
            <?php 
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 6,
                'cat' => $cat_id,
                'paged' => $paged,
                'post_status' => 'publish',
                'order' => 'DESC'
            );

            $the_query = new WP_Query($args);
            if($the_query->have_posts()) :
                while($the_query->have_posts()) : $the_query->the_post();
        
                    get_template_part( 'template-parts/news', 'block' );
        
                endwhile;
                ?>
             <?php
               
               $big = 999999999; // need an unlikely integer
               
               echo paginate_links( array(
                  'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                  'format'  => '?paged=%#%',
                  'current' => max( 1, get_query_var('paged') ),
                  'total'   => $the_query->max_num_pages
               ) );
               ?>
                <?php
            endif;
            wp_reset_postdata();
            ?>
         </div>
        <!-- <div class="loader"></div> -->
    </div>
</section>

<?php get_footer(); ?>