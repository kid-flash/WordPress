<?php
class ATT_Services_Post_Type {

	function __construct() {

		// Adds the services post type and taxonomies
		add_action( 'init', array( &$this, 'services_init' ), 0 );

		// Thumbnail support for services posts
		add_theme_support( 'post-thumbnails', array( 'services' ) );

		// Adds columns in the admin view for thumbnail and taxonomies
		add_filter( 'manage_edit-services_columns', array( &$this, 'services_edit_columns' ) );
		add_action( 'manage_posts_custom_column', array( &$this, 'services_column_display' ), 10, 2 );

		// Allows filtering of posts by taxonomy in the admin view
		add_action( 'restrict_manage_posts', array( &$this, 'services_add_taxonomy_filters' ) );

		// Show services post counts in the dashboard
		add_action( 'right_now_content_table_end', array( &$this, 'add_services_counts' ) );

		// Give the services menu item a unique icon
		add_action( 'admin_head', array( &$this, 'services_icon' ) );
	}
	

	function services_init() {

		/**
		 * Enable the Services custom post type
		 * http://codex.wordpress.org/Function_Reference/register_post_type
		 */

		$labels = array(
			'name' => __( 'Services', 'att' ),
			'singular_name' => __( 'Services Item', 'att' ),
			'add_new' => __( 'Add New Service', 'att' ),
			'add_new_item' => __( 'Add New Services Item', 'att' ),
			'edit_item' => __( 'Edit Services Item', 'att' ),
			'new_item' => __( 'Add New Services Item', 'att' ),
			'view_item' => __( 'View Item', 'att' ),
			'search_items' => __( 'Search Services', 'att' ),
			'not_found' => __( 'No services items found', 'att' ),
			'not_found_in_trash' => __( 'No services items found in trash', 'att' )
		);
		
		$args = array(
	    	'labels' => $labels,
	    	'public' => true,
			'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments', 'custom-fields', 'revisions', 'page-attributes' ),
			'capability_type' => 'post',
			'rewrite' => array("slug" => "services"), // Permalinks format
			'has_archive' => true
		); 
		
		$args = apply_filters( 'att_services_args', $args);
		
		register_post_type( 'services', $args );

		/**
		 * Register a taxonomy for Services Tags
		 * http://codex.wordpress.org/Function_Reference/register_taxonomy
		 */

		$taxonomy_services_tag_labels = array(
			'name' => __( 'Services Tags', 'att' ),
			'singular_name' => __( 'Services Tag', 'att' ),
			'search_items' => __( 'Search Services Tags', 'att' ),
			'popular_items' => __( 'Popular Services Tags', 'att' ),
			'all_items' => __( 'All Services Tags', 'att' ),
			'parent_item' => __( 'Parent Services Tag', 'att' ),
			'parent_item_colon' => __( 'Parent Services Tag:', 'att' ),
			'edit_item' => __( 'Edit Services Tag', 'att' ),
			'update_item' => __( 'Update Services Tag', 'att' ),
			'add_new_item' => __( 'Add New Services Tag', 'att' ),
			'new_item_name' => __( 'New Services Tag Name', 'att' ),
			'separate_items_with_commas' => __( 'Separate services tags with commas', 'att' ),
			'add_or_remove_items' => __( 'Add or remove services tags', 'att' ),
			'choose_from_most_used' => __( 'Choose from the most used services tags', 'att' ),
			'menu_name' => __( 'Services Tags', 'att' )
		);

		$taxonomy_services_tag_args = array(
			'labels' => $taxonomy_services_tag_labels,
			'public' => true,
			'show_in_nav_menus' => true,
			'show_ui' => true,
			'show_tagcloud' => true,
			'hierarchical' => false,
			'rewrite' => array( 'slug' => 'services-tag' ),
			'query_var' => true
		);

		$taxonomy_services_tag_args = apply_filters( 'att_taxonomy_services_tag_args', $taxonomy_services_tag_args);
		
		register_taxonomy( 'services_tag', array( 'services' ), $taxonomy_services_tag_args );

		/**
		 * Register a taxonomy for Services Categories
		 * http://codex.wordpress.org/Function_Reference/register_taxonomy
		 */

	    $taxonomy_services_category_labels = array(
			'name' => __( 'Services Categories', 'att' ),
			'singular_name' => __( 'Services Category', 'att' ),
			'search_items' => __( 'Search Services Categories', 'att' ),
			'popular_items' => __( 'Popular Services Categories', 'att' ),
			'all_items' => __( 'All Services Categories', 'att' ),
			'parent_item' => __( 'Parent Services Category', 'att' ),
			'parent_item_colon' => __( 'Parent Services Category:', 'att' ),
			'edit_item' => __( 'Edit Services Category', 'att' ),
			'update_item' => __( 'Update Services Category', 'att' ),
			'add_new_item' => __( 'Add New Services Category', 'att' ),
			'new_item_name' => __( 'New Services Category Name', 'att' ),
			'separate_items_with_commas' => __( 'Separate services categories with commas', 'att' ),
			'add_or_remove_items' => __( 'Add or remove services categories', 'att' ),
			'choose_from_most_used' => __( 'Choose from the most used services categories', 'att' ),
			'menu_name' => __( 'Services Categories', 'att' ),
	    );

	    $taxonomy_services_category_args = array(
			'labels' => $taxonomy_services_category_labels,
			'public' => true,
			'show_in_nav_menus' => true,
			'show_ui' => true,
			'show_tagcloud' => true,
			'hierarchical' => true,
			'rewrite' => array( 'slug' => 'services-category' ),
			'query_var' => true
	    );

		$taxonomy_services_category_args = apply_filters( 'att_taxonomy_services_category_args', $taxonomy_services_category_args);
		
	    register_taxonomy( 'services_category', array( 'services' ), $taxonomy_services_category_args );

	}

	/**
	 * Add Columns to Services Edit Screen
	 * http://wptheming.com/2010/07/column-edit-pages/
	 */

	function services_edit_columns( $services_columns ) {
		$services_columns = array(
			"cb" => "<input type=\"checkbox\" />",
			"title" => __( 'Title', 'column name'),
			"services_thumbnail" => __( 'Thumbnail', 'att' ),
			"services_category" => __( 'Category', 'att' ),
			"services_tag" => __( 'Tags', 'att' ),
			"menu_order" => __( 'Order', 'att' ),
                        "date" => __( 'Date', 'att' ),
		);
		$services_columns['comments'] = '<div class="vers"><img alt="Comments" src="' . esc_url( admin_url( 'images/comment-grey-bubble.png' ) ) . '" /></div>';
		return $services_columns;
	}

	function services_column_display( $services_columns, $post_id ) {

		// Code from: http://wpengineer.com/display-post-thumbnail-post-page-overview

		switch ( $services_columns ) {

			// Display the thumbnail in the column view
			case "services_thumbnail":
				$width = (int) 80;
				$height = (int) 80;
				$thumbnail_id = get_post_meta( $post_id, '_thumbnail_id', true );

				// Display the featured image in the column view if possible
				if ( $thumbnail_id ) {
					$thumb = wp_get_attachment_image( $thumbnail_id, array($width, $height), true );
				}
				if ( isset( $thumb ) ) {
					echo $thumb;
				} else {
					echo __( 'None', 'att' );
				}
				break;	

			// Display the services tags in the column view
			case "services_category":

			if ( $category_list = get_the_term_list( $post_id, 'services_category', '', ', ', '' ) ) {
				echo $category_list;
			} else {
				echo __( 'None', 'att' );
			}
			break;	

			// Display the services tags in the column view
			case "services_tag":

			if ( $tag_list = get_the_term_list( $post_id, 'services_tag', '', ', ', '' ) ) {
				echo $tag_list;
			} else {
				echo __( 'None', 'att' );
			}
			break;
                        
                       }
	}

	/**
	 * Adds taxonomy filters to the services admin page
	 * Code artfully lifed from http://pippinsplugins.com
	 */

	function services_add_taxonomy_filters() {
		global $typenow;

		// An array of all the taxonomyies you want to display. Use the taxonomy name or slug
		$taxonomies = array( 'services_category', 'services_tag' );

		// must set this to the post type you want the filter(s) displayed on
		if ( $typenow == 'services' ) {

			foreach ( $taxonomies as $tax_slug ) {
				$current_tax_slug = isset( $_GET[$tax_slug] ) ? $_GET[$tax_slug] : false;
				$tax_obj = get_taxonomy( $tax_slug );
				$tax_name = $tax_obj->labels->name;
				$terms = get_terms($tax_slug);
				if ( count( $terms ) > 0) {
					echo "<select name='$tax_slug' id='$tax_slug' class='postform'>";
					echo "<option value=''>$tax_name</option>";
					foreach ( $terms as $term ) {
						echo '<option value=' . $term->slug, $current_tax_slug == $term->slug ? ' selected="selected"' : '','>' . $term->name .' ( ' . $term->count .')</option>';
					}
					echo "</select>";
				}
			}
		}
	}

	/**
	 * Add Services count to "Right Now" Dashboard Widget
	 */

	function add_services_counts() {
	        if ( ! post_type_exists( 'services' ) ) {
	             return;
	        }

	        $num_posts = wp_count_posts( 'services' );
	        $num = number_format_i18n( $num_posts->publish );
	        $text = _n( 'Services Item', 'Services Items', intval($num_posts->publish) );
	        if ( current_user_can( 'edit_posts' ) ) {
	            $num = "<a href='edit.php?post_type=services'>$num</a>";
	            $text = "<a href='edit.php?post_type=services'>$text</a>";
	        }
	        echo '<td class="first b b-services">' . $num . '</td>';
	        echo '<td class="t services">' . $text . '</td>';
	        echo '</tr>';

	        if ($num_posts->pending > 0) {
	            $num = number_format_i18n( $num_posts->pending );
	            $text = _n( 'Services Item Pending', 'Services Items Pending', intval($num_posts->pending) );
	            if ( current_user_can( 'edit_posts' ) ) {
	                $num = "<a href='edit.php?post_status=pending&post_type=services'>$num</a>";
	                $text = "<a href='edit.php?post_status=pending&post_type=services'>$text</a>";
	            }
	            echo '<td class="first b b-services">' . $num . '</td>';
	            echo '<td class="t services">' . $text . '</td>';

	            echo '</tr>';
	        }
	}

	/**
	 * Displays the custom post type icon in the dashboard
	 */

	function services_icon() { ?>
	    <style type="text/css" media="screen">
	        #menu-posts-services .wp-menu-image {
	            background: url(<?php echo get_template_directory_uri(). '/images/post-types/services-icon.png'; ?>) no-repeat 6px 6px !important;
	        }
			#menu-posts-services:hover .wp-menu-image, #menu-posts-services.wp-has-current-submenu .wp-menu-image {
	            background-position: 6px -26px !important;
	        }
	    </style>
	<?php }

}

new ATT_Services_Post_Type;

