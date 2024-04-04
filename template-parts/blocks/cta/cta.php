<?php 
if( !empty( $block['data']['__is_preview'] )) { ?>
    <img src="<?php echo get_template_directory_uri() ?>/img/cta.png" alt="cta">
    <?php return;
 }
?>
<section class="container section-header-center title-uppercase section-large-mb" data-aos="fade-in">
    <div class="section-header-center__content text-center ">
        <?php the_field( 'cta_content' ); ?>
        <?php $button = get_field( 'button' ); ?>
        <?php if ( $button ) { ?>
            <div class="cta-center">
                <a href="<?php echo $button['url']; ?>" class="btn btn--medium-mt" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
            </div>
        <?php } ?>
    </div>
</section>
