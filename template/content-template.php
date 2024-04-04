<?php get_header(); //Template Name: Content template  ?>
<div class="container">
    <div class="content-page">
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>
    </div>
</div>
<?php get_footer(); ?>