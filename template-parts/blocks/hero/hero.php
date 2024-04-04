<?php 
if( !empty( $block['data']['__is_preview'] )) { ?>
<img src="<?php echo get_template_directory_uri() ?>/img/hero.png" alt="hero">
<?php return;
 }

 $className = '';
 $className .= !empty($block['className']) ? ' '.$block['className'] : '';
 $className .= !empty($block['align']) ? ' '.$block['align'] : ''; 

?>
<section class="container-right-full hero-wrap <?php echo $className; ?>">
    <div class="hero container-right-full--inner">
        <div class="hero__content" data-aos="fade-in">
            <?php the_field( 'hero_content' ); ?>
            <?php 
            $link = get_field('hero_button');
            if( $link ): 
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
            <a class="hero__button btn" href="<?php echo esc_url( $link_url ); ?>"
                target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
            <?php endif; ?>
        </div>
        <div class="hero__img" data-aos="fade-in">
            <?php $hero_image = get_field( 'hero_image' ); ?>
            <?php if ( $hero_image ) { ?>
            <img data-skip-lazy="" src="<?php echo $hero_image['sizes']['large']; ?>"
                alt="<?php echo $hero_image['alt']; ?>" sizes="(min-width: 800px) 50vw, 100vw" srcset="<?php echo $hero_image['sizes']['medium_large']; ?> 500w,
                <?php echo $hero_image['sizes']['large']; ?> 900w,
                <?php echo $hero_image['sizes']['1536x1536']; ?> 1400w">
            <?php } ?>
        </div>
    </div>
</section>