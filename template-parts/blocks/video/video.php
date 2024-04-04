<?php 
if( !empty( $block['data']['__is_preview'] )) { ?>
<img src="<?php echo get_template_directory_uri() ?>/img/video-section.png" alt="section">
<?php return;
 }
?>
<?php 
$section_text = get_field( 'text' ); 
$section_poster = get_field( 'thumbnail' ); 
$section_video = get_field( 'video' ); 

$className = '';
$className .= !empty($block['className']) ? ' '.$block['className'] : '';
$className .= !empty($block['align']) ? ' '.$block['align'] : '';
?>
<section class="video-section container section-header-center title-uppercase section-large-mb <?php echo $className; ?>" data-aos="fade-in">
    <div class="video-section__wrap">
        <div class="video-section__overlay"
            style="background-image:linear-gradient(0deg, rgba(11, 11, 11, 0.5), rgba(11, 11, 11, 0.5)), url(<?php echo $section_poster['url']; ?>)">

            <?php if($section_text): ?>
            <div class="video-section__text">
                <?php echo $section_text; ?>
            </div>
            <?php endif; ?>

            <div class="video-section__icon">
                <img src="<?php echo get_template_directory_uri(); ?>/img/play-icon.svg" alt="play-icon" width="156"
                    height="156">
            </div>
        </div>
        <?php if($section_video): ?>
        <video class="video-section__video" controls controlslist="nodownload">
            <source src="<?php echo $section_video['url']; ?>" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <?php endif; ?>
    </div>

    <?php if($section_text): ?>
    <div class="video-section__text-mob">
        <?php echo $section_text; ?>
    </div>
    <?php endif; ?>
</section>