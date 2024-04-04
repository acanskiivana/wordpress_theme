<?php get_header(); ?>
<?php global $wp_query;?>
<?php 
if(have_posts()):
    while(have_posts()) : the_post();
        the_content();
    endwhile;
    wp_reset_postdata();
endif; ?>
<section class="news container categories">
    <?php 
        $cat_args = array(
            'exclude' => array(1),
            'option_all' => 'All'
        );
    ?>
    <?php $categories = get_categories($cat_args); ?>
    <div class="news-header-center">
        <div class="news-header">
            <div class="news-tabs">
                <span class="tab tab--border tab--active js-filter-item"><a href="#">All</a></span>
                <?php foreach($categories as $post_category) { ?>
                    <span class="tab tab--border js-filter-item"><a data-category="<?php echo $post_category->term_id; ?>"><?php echo $post_category->name; ?></a></span>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="js-filter">
        <div id="posts" class="news-grid">
            <?php 
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 6,
                'paged' => 1,
                'post_status' => 'publish',
                'order' => 'DESC'
            );

            $query = new WP_Query($args);
            if($query->have_posts()) :
                while($query->have_posts()) : $query->the_post();
        
                    get_template_part( 'template-parts/news', 'block' );
        
                endwhile;
            endif;
            ?>
         </div>
        <div class="loader"></div>
    </div>
</section>
<?php get_footer(); ?>