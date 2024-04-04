<?php
// Create acf option page 
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Footer information',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Team member',
		'menu_title'	=> 'Team member',
		'parent_slug'	=> 'theme-general-settings',
	));
	
}

// Register gutenberg block category
add_filter( 'block_categories_all', function( $categories, $post ) {
	return array_merge(
		 $categories,
		 array(
			  array(
					'slug'  => 'sections',
					'title' => 'Sections',
		  		)
		 )
	);
}, 10, 2 );

// Gutenberg editor 
// Register gutenberg blocks 
function register_acf_block_types() {
    acf_register_block_type(array(
        'name'              => 'Hero section',
        'title'             => __('Hero section'),
        'description'       => __('Hero section with text and image'),
        'render_template'   => 'template-parts/blocks/hero/hero.php',
        'category'          => 'sections',
        'mode'              => 'edit',
        'icon'              => 'list-view',
        'keywords'          => array( 'column, icon', 'list' ),
        'example'           => array (
            'attributes' => array(
            'mode'       => 'preview',
            'data'       => array(
            '__is_preview' => true
            ),
            )
        )
    ));
    acf_register_block_type(array(
            'name'              => 'Card icons',
            'title'             => __('Card icons'),
            'description'       => __('Section header content. Three card icons with short description'),
            'render_template'   => 'template-parts/blocks/card-icons/card-icons.php',
            'category'          => 'sections',
            'mode'              => 'edit',
            'icon'              => 'list-view',
            'keywords'          => array( 'column, icon', 'list' ),
            'example'           => array (
                'attributes' => array(
                'mode'       => 'preview',
                'data'       => array(
                '__is_preview' => true
                ),
                )
            )
    ));

    acf_register_block_type(array(
        'name'              => 'Section with map',
        'title'             => __('Section with map'),
        'description'       => __('Section header content width pin map. Add only map with pins.'),
        'render_template'   => 'template-parts/blocks/map-pin/map-pin.php',
        'category'          => 'sections',
        'mode'              => 'edit',
        'icon'              => 'list-view',
        'keywords'          => array( 'column, icon', 'list' ),
        'example'           => array (
                            'attributes' => array(
                            'mode'       => 'preview',
                            'data'       => array(
                            '__is_preview' => true
                            ),
            )
        )
    ));
    acf_register_block_type(array(
            'name'              => 'Counter',
            'title'             => __('Counter'),
            'description'       => __('Counter'),
            'render_template'   => 'template-parts/blocks/counter/counter.php',
            'category'          => 'sections',
            'mode'              => 'edit',
            'icon'              => 'list-view',
            'keywords'          => array( 'column, icon', 'list' ),
            'example'           => array (
                'attributes' => array(
                'mode'       => 'preview',
                'data'       => array(
                '__is_preview' => true
                ),
                )
            )
    ));
    acf_register_block_type(array(
            'name'              => 'Two column',
            'title'             => __('Two column'),
            'description'       => __('Section with image and content'),
            'render_template'   => 'template-parts/blocks/two-column/two-column.php',
            'category'          => 'sections',
            'mode'              => 'edit',
            'icon'              => 'list-view',
            'keywords'          => array( 'column, icon', 'list' ),
            'example'           => array (
                'attributes' => array(
                'mode'       => 'preview',
                'data'       => array(
                '__is_preview' => true
                ),
                )
            )
    ));
    acf_register_block_type(array(
        'name'              => 'Team section',
        'title'             => __('Team'),
        'description'       => __('Section header content with list of team'),
        'render_template'   => 'template-parts/blocks/team/team.php',
        'category'          => 'sections',
        'mode'              => 'edit',
        'icon'              => 'list-view',
        'keywords'          => array( 'column, icon', 'list' ),
        'example'           => array (
                            'attributes' => array(
                            'mode'       => 'preview',
                            'data'       => array(
                            '__is_preview' => true
                            ),
            )
        )
    ));
    acf_register_block_type(array(
        'name'              => 'Cta',
        'title'             => __('Cta'),
        'description'       => __('Cta with content and button'),
        'render_template'   => 'template-parts/blocks/cta/cta.php',
        'category'          => 'sections',
        'mode'              => 'edit',
        'icon'              => 'list-view',
        'keywords'          => array( 'column, icon', 'list' ),
        'example'           => array (
                            'attributes' => array(
                            'mode'       => 'preview',
                            'data'       => array(
                            '__is_preview' => true
                            ),
            )
        )
    ));
    acf_register_block_type(array(
        'name'              => 'Testimonial slider',
        'title'             => __('Testimonial slider'),
        'description'       => __('Testimonial slider'),
        'render_template'   => 'template-parts/blocks/testimonial/testimonial.php',
        'category'          => 'sections',
        'mode'              => 'edit',
        'icon'              => 'list-view',
        'keywords'          => array( 'column, icon', 'list' ),
        'example'           => array (
            'attributes' => array(
            'mode'       => 'preview',
            'data'       => array(
            '__is_preview' => true
            ),
            )
        )
    ));
    acf_register_block_type(array(
        'name'              => 'Testimonial large',
        'title'             => __('Testimonial large'),
        'description'       => __('Testimonial large'),
        'render_template'   => 'template-parts/blocks/testimonial-large/testimonial-large.php',
        'category'          => 'sections',
        'mode'              => 'edit',
        'icon'              => 'list-view',
        'keywords'          => array( 'column, icon', 'list' ),
        'example'           => array (
                            'attributes' => array(
                            'mode'       => 'preview',
                            'data'       => array(
                            '__is_preview' => true
                            ),
            )
        )
    ));
    acf_register_block_type(array(
        'name'              => 'Flow icon',
        'title'             => __('Flow icon'),
        'description'       => __('Section with header content and flow icons.'),
        'render_template'   => 'template-parts/blocks/flow-icon/flow-icon.php',
        'category'          => 'sections',
        'mode'              => 'edit',
        'icon'              => 'list-view',
        'keywords'          => array( 'column, icon', 'list' ),
        'example'           => array (
            'attributes' => array(
            'mode'       => 'preview',
            'data'       => array(
            '__is_preview' => true
            ),
            )
        )
    ));

    acf_register_block_type(array(
        'name'              => 'Flow circle icon with text ',
        'title'             => __('Flow circle icon with text '),
        'description'       => __('Section with header content and flow circle icon with text .'),
        'render_template'   => 'template-parts/blocks/flow-icon-text/flow-icon-text.php',
        'category'          => 'sections',
        'mode'              => 'edit',
        'icon'              => 'list-view',
        'keywords'          => array( 'column, icon', 'list' ),
        'example'           => array (
                            'attributes' => array(
                            'mode'       => 'preview',
                            'data'       => array(
                            '__is_preview' => true
                            ),
            )
        )
    ));
    
    acf_register_block_type(array(
        'name'              => 'Customers loop slider',
        'title'             => __('Customers loop slider'),
        'description'       => __('Customers logoes slider.'),
        'render_template'   => 'template-parts/blocks/customers/customers.php',
        'category'          => 'sections',
        'mode'              => 'edit',
        'icon'              => 'list-view',
        'keywords'          => array( 'column, icon', 'list' ),
        'example'           => array (
                                'attributes' => array(
                                'mode'       => 'preview',
                                'data'       => array(
                                '__is_preview' => true
                                ),
            )
        )
    ));
    acf_register_block_type(array(
        'name'              => 'Card counter',
        'title'             => __('Card counter'),
        'description'       => __('Section with header content and card counter'),
        'render_template'   => 'template-parts/blocks/card-counter/card-counter.php',
        'category'          => 'sections',
        'mode'              => 'edit',
        'icon'              => 'list-view',
        'keywords'          => array( 'column, icon', 'list' ),
        'example'           => array (
            'attributes' => array(
            'mode'       => 'preview',
            'data'       => array(
            '__is_preview' => true
            ),
            )
        )
    ));
    acf_register_block_type(array(
        'name'              => 'Section content',
        'title'             => __('Section content'),
        'description'       => __('Section with editor'),
        'render_template'   => 'template-parts/blocks/section-content/section-content.php',
        'category'          => 'sections',
        'mode'              => 'edit',
        'icon'              => 'list-view',
        'keywords'          => array( 'column, icon', 'list' ),
        'example'           => array (
                            'attributes' => array(
                            'mode'       => 'preview',
                            'data'       => array(
                            '__is_preview' => true
                            ),
            )
        )
    ));
    acf_register_block_type(array(
        'name'              => 'Contact form section',
        'title'             => __('Contact form section'),
        'description'       => __('Contact form section'),
        'render_template'   => 'template-parts/blocks/contact-form/contact-form.php',
        'category'          => 'sections',
        'mode'              => 'edit',
        'icon'              => 'list-view',
        'keywords'          => array( 'column, icon', 'list' ),
        'example'           => array (
            'attributes' => array(
            'mode'       => 'preview',
            'data'       => array(
            '__is_preview' => true
            ),
            )
        )
    ));
    acf_register_block_type(array(
        'name'              => 'Subscribe form section',
        'title'             => __('Subscribe form section'),
        'description'       => __('Subscribe form section'),
        'render_template'   => 'template-parts/blocks/subscribe-form/subscribe-form.php',
        'category'          => 'sections',
        'mode'              => 'edit',
        'icon'              => 'list-view',
        'keywords'          => array( 'column, icon', 'list' ),
        'example'           => array (
            'attributes' => array(
            'mode'       => 'preview',
            'data'       => array(
            '__is_preview' => true
            ),
            )
        )
    ));
    acf_register_block_type(array(
        'name'              => 'Video section',
        'title'             => __('Video section'),
        'description'       => __('Video section'),
        'render_template'   => 'template-parts/blocks/video/video.php',
        'category'          => 'sections',
        'mode'              => 'edit',
        'icon'              => 'list-view',
        'keywords'          => array( 'video', 'section' ),
        'example'           => array (
            'attributes' => array(
            'mode'       => 'preview',
            'data'       => array(
            '__is_preview' => true
            ),
            )
        )
    ));
    acf_register_block_type(array(
        'name'              => 'All products section',
        'title'             => __('All products section'),
        'description'       => __('All products section'),
        'render_template'   => 'template-parts/blocks/all-products/all-products.php',
        'category'          => 'sections',
        'mode'              => 'edit',
        'icon'              => 'list-view',
        'keywords'          => array( 'product', 'section' ),
        'example'           => array (
            'attributes' => array(
            'mode'       => 'preview',
            'data'       => array(
            '__is_preview' => true
            ),
            )
        )
    ));
}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
   add_action('acf/init', 'register_acf_block_types');
}