<?php 
if( !empty( $block['data']['__is_preview'] )) { ?>
    <img src="<?php echo get_template_directory_uri() ?>/img/contact-form.png" alt="contact form">
    <?php return;
 }

    $className = '';
    $className .= !empty($block['className']) ? ' '.$block['className'] : '';
    $className .= !empty($block['align']) ? ' '.$block['align'] : '';

?>
<?php $form_title = get_field( 'form_title' ); ?>
<section class="container contact-page section-large-mb <?php echo ( ( get_field( 'add_border_bottom' ) == 1 ) )? "contact-page--border-bottom" : ""; ?> <?php echo $className; ?>" <?php echo ( get_field( 'remove_fadein_animation') == 1 )? '' : 'data-aos="fade-in"'; ?> >
    <div class="contact-page__col <?php echo ( ( get_field( 'center_the_section' ) == 1 ) )? "contact-page--center" : ""?> <?php echo ( ( get_field( 'make_it_wide' ) == 1 ) )? "contact-page--wide" : ""?>">
        
        <div class="contact-page__header">
            <?php if( $form_title ): ?>
                <?php echo $form_title; ?>
            <?php endif; ?>
        </div>
        <?php echo do_shortcode('' . the_field( 'form_shortcode' ) . '')?>
    </div>
</section>