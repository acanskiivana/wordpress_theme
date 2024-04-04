<?php get_header(); //Template Name: Landing template  ?>

<section class="newsletter-hero" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/i4see-bannerx2.png')">

<div class="newsletter-hero__text">
    <?php the_field( 'hero_text' ); ?>
</div>

</section>

<div class="container subscribe section-large-mb subscribe-with-checkbox">
    <?php if(get_field( 'subscribe_shortcode' )) { ?>
      <div class="subscribe__form">
        <?php echo do_shortcode('' . get_field( 'subscribe_shortcode' ) . ''); ?>
      </div>
   <?php } ?>
</div>

<?php get_footer(); ?>