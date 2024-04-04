<?php 
if( !empty( $block['data']['__is_preview'] )) { ?>
    <img src="<?php echo get_template_directory_uri() ?>/img/mind-the-gap.png" alt="mind-the-gap">
    <?php return;
 }
?>
<?php $section_title = get_field( 'section_title_for_flow_icon_with_text' ); ?>
<?php if($section_title): ?>
    <section class="container section-header-center title-uppercase" data-aos="fade-in">
    <div class="section-header-center__content section-header--align-center-title section-header--align-center-text">
        <?php echo $section_title; ?>
    </div>
</section>
<?php endif; ?>
<?php if ( have_rows( 'flow_icon_with_text' ) ) : ?>
	<?php while ( have_rows( 'flow_icon_with_text' ) ) : the_row(); ?>
        <section class="container circle-flow-text__wrap section-large-mb" >
            <div class="circle-flow-text circle-flow-text--first circle-flow-text--big" data-aos="fade-in">
                <div class="circle-flow-text--inner">
                    <h6><?php the_sub_field( 'circle_text1' ); ?></h6>
                </div>
            </div>
            <div class="circle-flow-text__arrow" data-aos="fade-in"><img src="<?php echo get_template_directory_uri(); ?>/img/shape-arrow.png" alt="arrow"></div>
            <div class="circle-flow-text circle-flow-text--big" data-aos="fade-in">
                <div class="circle-flow-text--inner">
                    <h6><?php the_sub_field( 'circle_text2' ); ?></h6>
                </div>
            </div>
            <div class="circle-flow-text circle-flow-text__small" data-aos="fade-in">
                <div class="circle-flow-text__small--inner">
                <div class="mind-the-gap">
                    <span>Mind the gap</span>
                </div>
                </div>
            </div>
            <div class="circle-flow-text circle-flow-text--big" data-aos="fade-in">
                <div class="circle-flow-text--inner">
                    <h6><?php the_sub_field( 'circle_text3' ); ?></h6>
                </div>
            </div>
        </section>
	<?php endwhile; ?>
<?php endif; ?>