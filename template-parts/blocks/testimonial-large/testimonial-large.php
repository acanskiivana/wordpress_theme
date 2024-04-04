<?php 
if( !empty( $block['data']['__is_preview'] )) { ?>
    <img src="<?php echo get_template_directory_uri() ?>/img/testimonial-large.png" alt="testimonial large">
    <?php return;
 }
?>
<?php $testimonial_large_background_image = get_field( 'testimonial_large_-_background_image' ); ?>
<?php if ( $testimonial_large_background_image ) { 
	$testimonial_background =  $testimonial_large_background_image['url']; 
}else {
    $testimonial_background = "";
} ?>
<section class="testimonial--section-large" data-aos="fade-in" style="background-image: url(<?php echo $testimonial_background; ?>)" >
    <div class="container" data-aos='fade-in'>
        <div class="testimonial testimonial--large">
            <blockquote><?php the_field( 'testimonial_content' ); ?></blockquote>
            <div class="testimonial__footer">
                <div class="testimonial__author">
                    <h6><?php the_field( 'testimonial_author' ); ?></h6>
                    <p><?php the_field( 'testimonial_short_description' ); ?></p>
                </div>
                <?php $company_logo = get_field( 'company_logo' ); ?>
                <?php if ( $company_logo ) { ?>
                    <div class="testimonial__logo">
                        <img src="<?php echo $company_logo['url']; ?>" alt="<?php echo $company_logo['alt']; ?>" />
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>