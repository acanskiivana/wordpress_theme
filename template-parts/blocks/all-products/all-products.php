<?php 
 $className = '';
 $className .= !empty($block['className']) ? ' '.$block['className'] : '';
 $className .= !empty($block['align']) ? ' '.$block['align'] : ''; 
 $title = get_field( 'title' );
?>

<div class="container all-products section-large-mb <?php echo $className; ?>" id="all-products" data-aos="fade-in">

    <?php if($title): ?>
    <h2 class="all-products__title text-uppercase" data-aos="fade-in"> <?php echo $title; ?></h2>
    <?php endif; ?>

    <?php if ( have_rows( 'i4see_datacheck' ) ) : ?>
    <?php while ( have_rows( 'i4see_datacheck' ) ) : the_row(); ?>
    <div class="app-result" data-aos="fade-in">
        <div class="app-result__grid">
            <div class="app-result__grid-left">
            <div class="app-result__icon app-result__icon-datacheck"></div>
            <div class="app-result__text">
                <h3><?php the_sub_field( 'name' ); ?></h3>
                <div><?php the_sub_field( 'description' ); ?></div>
            </div>
            </div>
            <div class="app-result__price">
                <h5 class="app-result__price-title">Price</h5>
                <div class="app-result__price-wrap">
                <?php if ( get_sub_field( 'price' ) ) : ?>
                <h3 class="app-result__price-number"><?php the_sub_field( 'price' ); ?></h3>
                <?php endif; ?>
                <p class="app-result__price-desc"><?php the_sub_field( 'price_description' ); ?></p>
                 </div>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>

    <?php if ( have_rows( 'i4see_performance' ) ) : ?>
    <?php while ( have_rows( 'i4see_performance' ) ) : the_row(); ?>
    <div class="app-result" data-aos="fade-in">
        <div class="app-result__grid">
        <div class="app-result__grid-left">
            <div class="app-result__icon app-result__icon-performance"></div>
            <div class="app-result__text">
                <h3><?php the_sub_field( 'name' ); ?></h3>
                <div><?php the_sub_field( 'description' ); ?></div>
            </div>
            </div>
            <div class="app-result__price">
                <h5 class="app-result__price-title">Price</h5>
                <div class="app-result__price-wrap">
                <?php if ( get_sub_field( 'price' ) ) : ?>
                <h3 class="app-result__price-number"><?php the_sub_field( 'price' ); ?></h3>
                <?php endif; ?>
                <p class="app-result__price-desc"><?php the_sub_field( 'price_description' ); ?></p>
                 </div>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>

    <?php if ( have_rows( 'i4see_delta' ) ) : ?>
    <?php while ( have_rows( 'i4see_delta' ) ) : the_row(); ?>
    <div class="app-result" data-aos="fade-in">
        <div class="app-result__grid">
        <div class="app-result__grid-left">
            <div class="app-result__icon app-result__icon-delta"></div>
            <div class="app-result__text">
                <h3><?php the_sub_field( 'name' ); ?></h3>
                <div><?php the_sub_field( 'description' ); ?></div>
            </div>
            </div>
            <div class="app-result__price">
                <h5 class="app-result__price-title">Price</h5>
                <div class="app-result__price-wrap">
                <?php if ( get_sub_field( 'price' ) ) : ?>
                <h3 class="app-result__price-number"><?php the_sub_field( 'price' ); ?></h3>
                <?php endif; ?>
                <p class="app-result__price-desc"><?php the_sub_field( 'price_description' ); ?></p>
                 </div>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>

    <?php if ( have_rows( 'i4see_heat' ) ) : ?>
    <?php while ( have_rows( 'i4see_heat' ) ) : the_row(); ?>
    <div class="app-result" data-aos="fade-in">
        <div class="app-result__grid">
        <div class="app-result__grid-left">
            <div class="app-result__icon app-result__icon-heat"></div>
            <div class="app-result__text">
                <h3><?php the_sub_field( 'name' ); ?></h3>
                <div><?php the_sub_field( 'description' ); ?></div>
            </div>
            </div>
            <div class="app-result__price">
                <h5 class="app-result__price-title">Price</h5>
                <div class="app-result__price-wrap">
                <?php if ( get_sub_field( 'price' ) ) : ?>
                <h3 class="app-result__price-number"><?php the_sub_field( 'price' ); ?></h3>
                <?php endif; ?>
                <p class="app-result__price-desc"><?php the_sub_field( 'price_description' ); ?></p>
                 </div>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>

    <?php if ( have_rows( 'i4see_geardrive' ) ) : ?>
    <?php while ( have_rows( 'i4see_geardrive' ) ) : the_row(); ?>
    <div class="app-result" data-aos="fade-in">
        <div class="app-result__grid">
        <div class="app-result__grid-left">
            <div class="app-result__icon app-result__icon-geardrive"></div>
            <div class="app-result__text">
                <h3><?php the_sub_field( 'name' ); ?></h3>
                <div><?php the_sub_field( 'description' ); ?></div>
            </div>
            </div>
            <div class="app-result__price">
                <h5 class="app-result__price-title">Price</h5>
                <div class="app-result__price-wrap">
                <?php if ( get_sub_field( 'price' ) ) : ?>
                <h3 class="app-result__price-number"><?php the_sub_field( 'price' ); ?></h3>
                <?php endif; ?>
                <p class="app-result__price-desc"><?php the_sub_field( 'price_description' ); ?></p>
                 </div>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>

    <?php if ( have_rows( 'i4see_life' ) ) : ?>
    <?php while ( have_rows( 'i4see_life' ) ) : the_row(); ?>
    <div class="app-result" data-aos="fade-in">
        <div class="app-result__grid">
        <div class="app-result__grid-left">
            <div class="app-result__icon app-result__icon-life"></div>
            <div class="app-result__text">
                <h3><?php the_sub_field( 'name' ); ?></h3>
                <div><?php the_sub_field( 'description' ); ?></div>
            </div>
            </div>
            <div class="app-result__price">
                <h5 class="app-result__price-title">Price</h5>
                <div class="app-result__price-wrap">
                <?php if ( get_sub_field( 'price' ) ) : ?>
                <h3 class="app-result__price-number"><?php the_sub_field( 'price' ); ?></h3>
                <?php endif; ?>
                <p class="app-result__price-desc"><?php the_sub_field( 'price_description' ); ?></p>
                 </div>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>

    <?php if ( have_rows( 'i4see_damage' ) ) : ?>
    <?php while ( have_rows( 'i4see_damage' ) ) : the_row(); ?>
    <div class="app-result" data-aos="fade-in">
        <div class="app-result__grid">
        <div class="app-result__grid-left">
            <div class="app-result__icon app-result__icon-damage"></div>
            <div class="app-result__text">
                <h3><?php the_sub_field( 'name' ); ?></h3>
                <div><?php the_sub_field( 'description' ); ?></div>
            </div>
            </div>
            <div class="app-result__price">
                <h5 class="app-result__price-title">Price</h5>
                <div class="app-result__price-wrap">
                <?php if ( get_sub_field( 'price' ) ) : ?>
                <h3 class="app-result__price-number"><?php the_sub_field( 'price' ); ?></h3>
                <?php endif; ?>
                <p class="app-result__price-desc"><?php the_sub_field( 'price_description' ); ?></p>
                 </div>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>
</div>