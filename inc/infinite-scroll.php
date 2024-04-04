<?php 
// Infinite scroll - wp
function theme_enqueue_scripts() {
    /**
     * frontend ajax requests.
     */
    wp_enqueue_script( 'frontend-ajax', get_template_directory_uri() . '/js/frontend-ajax.js', array('jquery'), null, true );
    wp_localize_script( 'frontend-ajax', 'frontend_ajax_object',
        array( 
            'ajaxurl' => admin_url( 'admin-ajax.php' ),
        )
    );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts' );

/**
 * Load template part and return as string
 * @param string $templateName
 * @param string $partName
 */
function load_template_part(string $templateName, string $partName = '')
{
    ob_start();
    get_template_part($templateName, $partName);
    $response = ob_get_contents();
    ob_end_clean();

    return $response;
}

/**
 * Load posts by paramethers and return them as JSON data
 */
function filter_ajax()
{
	// Get data from the post request 
	$category = array_key_exists('category', $_POST) && !empty($_POST['category']) ? $_POST['category'] : false;
	$posts_per_page = array_key_exists('posts_per_page', $_POST) && !empty($_POST['posts_per_page']) ? (int) $_POST['posts_per_page'] : 6;
	$page = array_key_exists('page', $_POST) && !empty($_POST['page']) ? (int) $_POST['page'] : 1;

	
	// Set rules which will be used for fetching posts from the databse
	$args = [
		'post_type' => 'post',
        'posts_per_page' => $posts_per_page,
		'paged' => $page,
		'post_status' => 'publish',
        'order' => 'DESC'
	];

	// Check if there is category sent in the request
	if ($category) {
		$args['category__in'] = [$category];
	}

	// Load posts by the set aguments
	$query = new WP_Query($args);
	$response = [];
	
	if ($query->have_posts()):
		while ($query->have_posts()) : $query->the_post();
			
			$response[] = load_template_part('template-parts/news', 'block');
		endwhile;
	endif;

	wp_reset_postdata();

	header('Content-Type: application/json');

	echo json_encode([
		'data' => $response
	]);
	exit;
}
add_action('wp_ajax_filter', 'filter_ajax');
add_action('wp_ajax_nopriv_filter', 'filter_ajax');