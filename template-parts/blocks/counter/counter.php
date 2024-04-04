<?php 
if( !empty( $block['data']['__is_preview'] )) { ?>
    <img src="<?php echo get_template_directory_uri() ?>/img/counter.png" alt="counter">
    <?php return;
 }
?>
<!-- Counter  -->
<section id="counter" class="container counter-section section-large-mb">
    <div class="counter">
        <?php if ( have_rows( 'emphasize_counter' ) ) : ?>
            <?php while ( have_rows( 'emphasize_counter' ) ) : the_row(); ?>
                <div class="counter-card-large" data-aos="fade-in">
                    <?php if ( get_sub_field( 'add+emphasize_+' ) == 1 ) { 
                        $plus = "+"; 
                    } else { 
                        $plus = ""; 
                    } ?>
                    <span class="counter-card-large__number"><span class="counter-value"
                            data-count="<?php the_sub_field( 'emphasize_counter_number' ); ?>">10</span><?php echo $plus; ?></span>
                    <p><?php the_sub_field( 'emphasize_counter_short_description' ); ?></p>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
        <?php if ( have_rows( 'counter_cards' ) ) : ?>
            <div class="counter-card-wrap">
                <?php while ( have_rows( 'counter_cards' ) ) : the_row(); ?>
                    <?php if ( get_sub_field( 'add_+_after_number' ) == 1 ) { 
                        $plus = "+"; 
                    } else { 
                        $plus = "";  
                    } ?>
                    <div class="counter-card" data-aos="fade-in">
                        <span class="counter-card__number"><span class="counter-value"
                                data-count="<?php the_sub_field( 'counter_number' ); ?>"></span><?php echo $plus; ?></span>
                        <p><?php the_sub_field( 'counter_short_description' ); ?></p>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>