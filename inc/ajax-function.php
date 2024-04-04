<?php
// get category id by category name
function get_category_id($cat_name){
	$term = get_term_by('name', $cat_name, 'category');
	return $term->term_id;
}

/**
 *  Ajax filter function
 * 
 */
add_action('wp_ajax_myfilter', 'filter_ajax');
add_action('wp_ajax_nopriv_myfilter', 'filter_ajax');

function filter_ajax(){

	header("Content-Type: application/json"); 
	

	// create tax_query array for taxonomy fields
    $tax_query = array('relation' => 'AND'); 

	// category filter
	// ********************************************
	if(!empty($_POST['category'])){
        $category = sanitize_text_field( $_POST['category'] );
		$picked_cat_id=get_category_id($category); 
        $tax_query[] = array(			
			
            array(
                'taxonomy' => 'category',
				'terms' => 	$picked_cat_id,
				'include_children' => false
            )
        );		
    }
   
	

	// default args for filter
	// *************************************
	$args = array(
        'post_type' => 'post',
		'post_status' => 'publish' ,
		'orderby' => 'date',
		'order'   => 'DESC',
        'tax_query' => $tax_query,   
		'paged' => 1             
    );

	

	if(!empty($_POST['keyword'])){
        $keyword = $_POST['keyword'];
		$args['search_post_title'] = $keyword;		
    }

	// set the default current page
	// *************************************
    $current_page = 1;

	// page
	// *************************************
    if(!empty($_POST['page'])){   
     	$current_page = $_POST['page'];
	    $args['paged'] = $current_page;  
    } 

	if ($category == "All" && $current_page == 1) {
		$args['post__not_in'] = get_option('sticky_posts');
		$args['posts_per_page'] = 8;   
    }

	if ($category == "All") {
		$args['post__not_in'] = get_option('sticky_posts');
    }

	if ($category == "Company News" && $current_page == 1) {
		$args['post__not_in'] = get_option('sticky_posts');
		$args['posts_per_page'] = 8;   
    }

	if ($category == "Company News") {
		$args['post__not_in'] = get_option('sticky_posts');
    }

	add_filter( 'posts_where', 'title_filter', 10, 2 );
	$query = new WP_Query( $args );
	remove_filter( 'posts_where', 'title_filter', 10, 2 );


	// max number of pages, for pagination
	$max_pages = $query->max_num_pages; 

	// Sticky post 
	$sticky = array();
	if( is_sticky()) {
		
	}
		$stickyargs = array(
				'post_type' => 'post',
				'post_status' => 'publish',
				'posts_per_page' => 1, // Adjust the number of posts displayed per page
				'paged' => 1,
				'post__in'=> get_option('sticky_posts')
			);
		
			$wp_query = new WP_Query($stickyargs);
		
			if ($wp_query->have_posts()) :
				while ($wp_query->have_posts()) : $wp_query->the_post();
				$sticky[]= load_template_part
				('template-parts/news', 'block');
				endwhile;
			endif;
			wp_reset_postdata();
	
  
	// created an empty array where we put all filterd posts
	$posts=array(); 

	if( $query->have_posts() ) :
	
		while( $query->have_posts() ): $query->the_post();
	
		     $posts[] = load_template_part('template-parts/news', 'block');

		endwhile; 

		wp_reset_postdata();
		
	endif;

	$results = [ 'posts' => $posts, 'sticky' => $sticky, 'current_page' => intval($current_page) , 'pages' => $max_pages ];  

    echo json_encode( $results ); 
	
	die();
}


// output template buffering (very bad solution and error sensitive)
function load_template_part($template_name, $part_name=null) {

    ob_start();
    get_template_part($template_name, $part_name);
    $var = ob_get_contents();
    ob_end_clean();
    return $var;

}

// msql post title filter, we use for search by title in wp_query
function title_filter( $where, &$wp_query ){
    global $wpdb;
    if ( $search_term = $wp_query->get( 'search_post_title' ) ) {
        // $where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'%' . esc_sql( like_escape( $search_term ) ) . '%\'';
		$where .= ' AND ((' . $wpdb->posts . '.post_title LIKE \''.esc_sql( like_escape( $search_term ) ).'%\') OR ('. $wpdb->posts. '.post_title LIKE \'% '.esc_sql( like_escape( $search_term ) ).'%\'))';
		
    }
    return $where;
}