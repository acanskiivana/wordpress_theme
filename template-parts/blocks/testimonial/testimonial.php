<?php 
if( !empty( $block['data']['__is_preview'] )) { ?>
    <img src="<?php echo get_template_directory_uri() ?>/img/testimonials.png" alt="testimonial">
    <?php return;
 }
?>
<?php $section_header = get_field( 'section_header' ); ?>
<?php if($section_header): ?>
    <section class="testimonial-section-title container section-header-center title-uppercase section-small-mb"  data-aos="fade-in">
        <div class="section-header-center__content section-header--align-center-title section-header--align-center-text">
            <?php echo $section_header; ?>
        </div>
    </section>
<?php endif; ?>
<?php if ( have_rows( 'testimonial_slider' ) ) : ?>
    <section class="section-large-mb testimonial-section" data-aos="fade-in">
        <div class="slick-slider-center">
            <?php while ( have_rows( 'testimonial_slider' ) ) : the_row(); ?>
                <div>
                    <div class="testimonial">
                        <blockquote><?php the_sub_field( 'testimonial_content' ); ?></blockquote>
                        <div class="testimonial__footer">
                            <div class="testimonial__author">
                                <?php if(get_sub_field( 'testimonail_author' )): ?>
                                    <h6><?php the_sub_field( 'testimonail_author' ); ?></h6>
                                <?php endif; ?>
                                <?php if(get_sub_field( 'testimonial_author_job_position' )): ?>
                                    <p><?php the_sub_field( 'testimonial_author_job_position' ); ?></p>
                                <?php endif; ?>
                            </div>
                            <?php $company_logo = get_sub_field( 'company_logo' ); ?>
                            <?php if ( $company_logo ) { ?>
                                <div class="testimonial__logo">
                                    <img data-skip-lazy="" src="<?php echo $company_logo['url']; ?>" alt="<?php echo $company_logo['alt']; ?>" width="160" height="60"/>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </section>
<?php endif; ?>