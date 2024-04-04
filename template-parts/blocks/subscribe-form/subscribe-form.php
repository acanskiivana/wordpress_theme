<?php 
if( !empty( $block['data']['__is_preview'] )) { ?>
    <img src="<?php echo get_template_directory_uri() ?>/img/subscribe-form.png" alt="section">
    <?php return;
 }

 $className = '';
 $className .= !empty($block['className']) ? ' '.$block['className'] : '';
 $className .= !empty($block['align']) ? ' '.$block['align'] : ''; 
?>
<?php $subscribe_title = get_field( 'subscribe_title' ); ?>
<?php $subscribe_form = get_field( 'subscribe_form' ); ?>

<div class="container subscribe section-large-mb <?php echo $className; ?>" data-aos="fade-in">
    <?php if($subscribe_title) { ?>
      <h2 class="subscribe__title"><?php echo $subscribe_title; ?></h2>      
    <?php } ?>
    <?php if($subscribe_form) { ?>
      <div class="subscribe__form">
        <?php echo do_shortcode('' . the_field( 'subscribe_form' ) . ''); ?>
      </div>
   <?php } ?>
</div>
