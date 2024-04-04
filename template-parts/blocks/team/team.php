<?php 
if( !empty( $block['data']['__is_preview'] )) { ?>
<img src="<?php echo get_template_directory_uri() ?>/img/team.png" alt="team">
<?php return;
 }
?>

<?php $display_team = get_field( 'team_member_list' ); ?>
<?php $section_header = get_field( 'section_header' ); ?>


<?php if( $section_header ): ?>
<section class="container" data-aos="fade-in">
    <div class="section-header">
        <div class="section-header__content title-uppercase">
            <?php echo $section_header; ?>
        </div>
    </div>
</section>
<?php endif; ?>


<?php //if ( !($display_team == 'first_four') ): ?>

<?php if ( have_rows( 'team_member', 'option' ) ): ?>
<section class="container section-large-mb <?php echo ($display_team == 'first_four') ? "team-home-section" : "team-section"; ?>">

    <div class="team-wrap" data-aos="fade-in">

        <?php $i = 0;?>
        <?php while ( have_rows( 'team_member', 'option' ) ) : the_row(); ?>
        <?php $i++; ?>

        <?php if($display_team == 'first_four'): ?>
        <?php if( $i > 5 ) { break; } ?>
        <?php endif;?>

        <?php if ( get_row_layout() == 'add_member' ) : ?>
        <div class="team">
            <div class="team__img">

                <?php $image = get_sub_field( 'image' ); ?>
                <?php if ( $image ) { ?>
                <div class="team__img--border">
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" width="200" height="200"/>
                </div>
                <?php } ?>

                <?php $quote = get_sub_field( 'short_description' ); ?>

                <?php if( $quote ): ?>
                <div class="team__quote-wrap">
                    <div class="team__quote">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/quote.svg" alt="quote" width="22" height="13">
                    </div>
                    <div class="team__quote-text">
                        <?php echo $quote; ?>
                    </div>
                </div>
                <?php endif; ?>

            </div>
            <div class="team__content">
                <h5><strong><?php the_sub_field( 'name' ); ?></strong> <?php the_sub_field( 'surname' ); ?></h5>
                <h6><?php the_sub_field( 'job_position' ); ?></h6>
            </div>
        </div>
        <?php endif; ?>
        <?php endwhile; ?>

    </div>

    <!-- <?php //if($display_team == 'first_four'): ?> -->
    <!-- <div class="team__btn text-center" data-aos="fade-in"> -->
        <!-- <a href="/about-us/" class="btn btn--medium-mt">Who we are</a> -->
    <!-- </div> -->
    <!-- <?php //else: ?> -->
    <!-- <div class="team__btn text-center">
        <button class="btn btn--medium-mt load-more">Show more</button>
    </div> -->
    <!-- <?php //endif;?> -->

</section>
<?php endif; ?>

<?php //endif; ?>