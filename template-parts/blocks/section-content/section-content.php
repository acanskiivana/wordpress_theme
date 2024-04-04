<?php 
if( !empty( $block['data']['__is_preview'] )) { ?>
    <img src="<?php echo get_template_directory_uri() ?>/img/center-section.png" alt="section">
    <?php return;
 }

 $className = '';
 $className .= !empty($block['className']) ? ' '.$block['className'] : '';
 $className .= !empty($block['align']) ? ' '.$block['align'] : ''; 

?>
<?php $section_header = get_field( 'section' ); ?>
<?php if($section_header): ?>
    <section class="container section-header-center title-uppercase section-large-mb <?php echo $className; ?>"  data-aos="fade-in">
        <div class="section-header-center__content section-header--align-center-title">
            <?php echo $section_header; ?>
        </div>
    </section>
<?php endif; ?>