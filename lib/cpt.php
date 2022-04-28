<?php 
  function create_posttype() {
       	  	
	  	register_post_type( 'youtube',
	  	// CPT Options
	  		array(
	  			'labels' => array(
	  				'name'                  => __( 'YouTube' ),
	  				'singular_name'         => __( 'YouTube' ),
	      		'all_items'             => __( 'Alle YouTube' ),
	      		'add_new_item'          => __( 'Nieuwe YouTube toevoegen' ),
	      		'new_item'              => __( 'Nieuwe YouTube' ),
	          'add_new'               => __( 'Nieuwe YouTube' ),
	      		'edit_item'             => __( 'Bewerk YouTube' ),
	      		'update_item'           => __( 'Update YouTube' ),
	      		'view_item'             => __( 'Bekijk YouTube' ),
	      		'search_items'          => __( 'Zoek YouTube' ),
	  			),
	  			'menu_icon'               => 'dashicons-video-alt3',
	  			'public'                  => true,
	  			'has_archive'             => false,
	  			'rewrite'                 => array('slug' => 'youtube'),
	  			'supports'                => array( 'title', 'editor', 'thumbnail' ),
	  		)
	  	);
    		
  }

  // Hooking up our function to theme setup
  add_action( 'init', 'create_posttype' ); 
  
	function add_custom_rewrite_rule() {
	
	    // First, try to load up the rewrite rules. We do this just in case
	    // the default permalink structure is being used.
	    if( ($current_rules = get_option('rewrite_rules')) ) {
	
	        // Next, iterate through each custom rule adding a new rule
	        // that replaces 'movies' with 'films' and give it a higher
	        // priority than the existing rule.
	        foreach($current_rules as $key => $val) {
	            if(strpos($key, 'posts') !== false) {
	                add_rewrite_rule(str_ireplace('posts', 'nieuws', $key), $val, 'top');   
	            } // end if
	        } // end foreach
	
	    } // end if/else
	
	    // ...and we flush the rules
	    flush_rewrite_rules();
	
	} // end add_custom_rewrite_rule
	add_action('init', 'add_custom_rewrite_rule');
?>