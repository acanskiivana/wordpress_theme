<?php 
if( !empty( $block['data']['__is_preview'] )) { ?>
    <img src="<?php echo get_template_directory_uri() ?>/img/card-icons.png" alt="card icons">
    <?php return;
 }
?>
<?php $section_header = get_field( 'section_header' ); ?>
<!-- Card icons  -->
<section class="container card-icon-section section-large-mb">
    <?php if($section_header): ?>
        <div class="section-header section-header--large-mb" data-aos="fade-in">
            <div class="section-header__content title-uppercase">
                <?php echo $section_header; ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if ( have_rows( 'cards_icon' ) ) : ?>
        <div class="card-icon-wrap slick-mobile card-icon-section"  data-aos="fade-in">
            <?php while ( have_rows( 'cards_icon' ) ) : the_row(); ?>
            <div>
                <div class="card-icon">
                    <?php $card_image = get_sub_field( 'card_image' ); ?>
                    <?php if ( $card_image ) { ?>
                        <div class="card-icon__img">
                            <img src="<?php echo $card_image['sizes']['medium']; ?>" alt="<?php echo $card_image['alt']; ?>" width="300" height="280"/>
                        </div>
                    <?php } ?>

                    <div class="card-icon__content">
                        <?php the_sub_field( 'card_short_description' ); ?>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
</section>