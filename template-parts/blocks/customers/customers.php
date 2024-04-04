<?php 
if( !empty( $block['data']['__is_preview'] )) { ?>
    <img src="<?php echo get_template_directory_uri() ?>/img/partners.png" alt="partners">
    <?php return;
 }
?>
<?php $customers_images = get_field( 'customers' ); ?>
<?php if ( $customers_images ) :  ?>
    <section class="slick-scroll section-large-mb" data-aos="fade-in">
        <?php foreach ( $customers_images as $customers_image ): ?>
            <div>
                <div class="partner">
                    <img data-skip-lazy="" src="<?php echo $customers_image['sizes']['medium']; ?>" alt="<?php echo $customers_image['alt']; ?>" width="235" height="55"/>
                </div>
            </div>     
        <?php endforeach; ?>
    </section>
<?php endif; ?>