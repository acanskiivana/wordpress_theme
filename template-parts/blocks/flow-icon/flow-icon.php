<?php 
if( !empty( $block['data']['__is_preview'] )) { ?>
<img src="<?php echo get_template_directory_uri() ?>/img/circle-flow.png" alt="circle flow">
<?php return;
 }
?>
<section class="container-right-full" data-aos="fade-in">
    <?php $section_header = get_field( 'section_header' ); ?>
    <?php if ( $section_header ): ?>
    <div class="section-header container-right-full--inner">
        <div class="section-header__content title-uppercase">
            <?php echo $section_header; ?>
        </div>
        <?php $hero_image = get_field( 'section_header_image' ); ?>
        <?php if ( $hero_image ) { ?>
        <div class="section-header__img" data-skip-lazy
            style="background-image:url(<?php echo $hero_image['sizes']['large']; ?>)">
        </div>
        <?php } ?>
    </div>
    <?php endif; ?>
</section>

<section class="container circle-flow__wrap section-large-mb" data-aos="fade-in">
    <div class="circle-flow__scroll">
        <?php if( have_rows('flow_box1') ): ?>
        <?php while( have_rows('flow_box1') ): the_row(); 
        // Get sub field values.
        $icon1 = get_sub_field('flow_icon1');
        $text1 = get_sub_field('flow_text1');
        ?>
        <div class="circle-flow" data-aos="fade-in" data-aos-delay="200">
            <div class="circle-flow__icon">
                <img src="<?php echo $icon1['url']; ?>" alt="<?php echo $icon1['alt']; ?>" width="165" height="120" />
            </div>
            <div class="circle-flow__text"><?php echo $text1; ?></div>
        </div>
        <div class="circle-flow__arrow" data-aos="fade-in" data-aos-delay="300">
            <img src="<?php echo get_template_directory_uri(); ?>/img/arrow.svg" alt="arrow">
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
        <?php if( have_rows('flow_box2') ): ?>
        <?php while( have_rows('flow_box2') ): the_row(); 
        // Get sub field values.
        $icon2 = get_sub_field('flow_icon2');
        $text2 = get_sub_field('flow_text2');
        ?>
        <div class="circle-flow" data-aos="fade-in" data-aos-delay="400">
            <div class="circle-flow__icon">
                <img src="<?php echo $icon2['url']; ?>" alt="<?php echo $icon2['alt']; ?>" width="165"
                    height="120" />
            </div>
            <div class="circle-flow__text"><?php echo $text2; ?></div>
        </div>
        <div class="circle-flow__arrow" data-aos="fade-in" data-aos-delay="500">
            <img src="<?php echo get_template_directory_uri(); ?>/img/arrow.svg" alt="arrow">
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
        <?php if( have_rows('flow_box3') ): ?>
        <?php while( have_rows('flow_box3') ): the_row(); 
        // Get sub field values.
        $icon3 = get_sub_field('flow_icon3');
        $text3 = get_sub_field('flow_text3');
        ?>
        <div class="circle-flow" data-aos="fade-in" data-aos-delay="600">
            <div class="circle-flow__icon">
                <img src="<?php echo $icon3['url']; ?>" alt="<?php echo $icon3['alt']; ?>" width="165"
                    height="120" />
            </div>
            <div class="circle-flow__text"><?php echo $text3; ?></div>
        </div>
        <div class="circle-flow__arrow" data-aos="fade-in" data-aos-delay="500">
            <img src="<?php echo get_template_directory_uri(); ?>/img/arrow.svg" alt="arrow">
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
        <?php if( have_rows('flow_box4') ): ?>
        <?php while( have_rows('flow_box4') ): the_row(); 
        // Get sub field values.
        $icon4 = get_sub_field('flow_icon4');
        $text4 = get_sub_field('flow_text4');
        ?>
        <div class="circle-flow" data-aos="fade-in" data-aos-delay="600">
            <div class="circle-flow__icon">
                <img src="<?php echo $icon4['url']; ?>" alt="<?php echo $icon4['alt']; ?>" width="165"
                    height="120" />
            </div>
            <div class="circle-flow__text"><?php echo $text4; ?></div>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>