<!-- Get options subscribe form  -->
<?php $subscribe_title = get_field( 'subscribe_title', 'option' ); ?>
<?php $subscribe_form = get_field( 'subscribe_form', 'option' ); ?>

<div class="subscribe" data-aos="fade-in">
    <?php if($subscribe_title) { ?>
      <h2 class="subscribe__title"><?php echo $subscribe_title; ?></h2>      
    <?php } ?>
    <?php if($subscribe_form) { ?>
      <div class="subscribe__form">
        <?php echo do_shortcode('' . $subscribe_form  . ''); ?>
      </div>
   <?php } ?>
</div>