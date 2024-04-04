<?php 
if( !empty( $block['data']['__is_preview'] )) { ?>
    <img src="<?php echo get_template_directory_uri() ?>/img/card-counter.png" alt="card counter">
    <?php return;
 }
?>
<?php $section_header = get_field( 'section_header' ); ?>
<?php if( $section_header ): ?>
    <section class="container section-header-center section-header-center-content title-uppercase section-small-mb"  data-aos="fade-in">
        <div class="section-header-center__content section-header--align-center-title section-header--align-center-text">
            <?php echo $section_header; ?>
        </div>
    </section>
<?php endif; ?>
<?php if ( have_rows( 'card_counter' ) ) : ?>
    <section class="card-counter-wrap container section-large-mb"> 
        <?php while ( have_rows( 'card_counter' ) ) : the_row(); ?>
            <div class="card-counter" data-aos="fade-in">
               
                <span class="card-counter__number"></span>
                <div class="card-counter__content">
                    <?php the_sub_field( 'card_short_description' ); ?>
                </div>
            </div>
        <?php endwhile; ?>
    </section>
<?php endif; ?>