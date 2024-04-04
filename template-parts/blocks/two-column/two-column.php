<?php 
if( !empty( $block['data']['__is_preview'] )) { ?>
    <img src="<?php echo get_template_directory_uri() ?>/img/two-col.png" alt="two col">
    <?php return;
 }
?>
<?php $section_title = get_field( 'section_header' ); ?>
<section class="container section-header-center section-large-mb">
    <?php if($section_title): ?>
        <div class="section-header--align-center-title section-header--align-center-text section-header-center__content section-medium-mb text-uppercase" data-aos="fade-in">
            <?php echo $section_title; ?>
        </div>
    <?php endif; ?>
    <?php if ( have_rows( 'two_columns' ) ) : ?>
        <?php while ( have_rows( 'two_columns' ) ) : the_row(); ?>
            <div class="col-img-text section-medium-mb <?php echo (get_sub_field( 'reverse_columns' ) == 1 ) ?'col-img-text--reverse': ''; ?>" data-aos="fade-in">
                <div class="col-img-text__content">
                    <?php the_sub_field( 'column_content' ); ?>
                </div>
                <?php $column_image = get_sub_field( 'column_image' ); ?>
                <?php if ( $column_image ) { ?>
                    <div class="col-img-text__image">
                        <div class="col-img-text__image-wrap">
                            <img src="<?php echo $column_image['sizes']['medium_large']; ?>" alt="<?php echo $column_image['alt']; ?>" />
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
</section>