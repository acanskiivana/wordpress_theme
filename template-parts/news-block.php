<a href="<?php the_permalink(); ?>" class="news-card" id="post_<?php the_id(); ?>">
    <div class="news-card__img">
        <?php 
            if ( has_post_thumbnail() ) {
                the_post_thumbnail('blog_block');
            } 
        ?>
    </div>
    <div class="news-card__content">
        <h2><?php the_title(); ?></h2>
        <div class="news-card__data"><?php echo get_the_date(); ?>
        <?php 
        $post_categories = wp_get_post_categories($post->ID , array( 'fields' => 'names',  'exclude' => array(1),
        'option_all' => 'All' )); 
      
        if( $post_categories ){ // Always Check before loop!
            foreach($post_categories as $name){
                echo '<span class="dot"></span>';
                echo $name;
            }
        }
        ?>
    </div>
    </div>
</a>