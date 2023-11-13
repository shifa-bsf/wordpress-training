<?php

// Action hook
add_action( 'testing_action_hook' , 'func_testing_action_hook', 10 , 2 );
function func_testing_action_hook( $gill_has_keys, $gill_has_car ) {
  if ( $gill_has_keys && $gill_has_car ) {
    echo "This is a testing message. Thank you!<br/>";
  }
}
// Same action hook but different function with high priority
// So it execute first
add_action( 'testing_action_hook' , 'func_testing_action_hook_two', 9 , 2 );
function func_testing_action_hook_two( $gill_has_keys, $gill_has_car ) {
  if ( $gill_has_keys && $gill_has_car ) {
    echo "This is a testing message 2. Thank you!<br/>";
  }
}

// Calling action hook
do_action( 'testing_action_hook' , true, true );


function my_custom_function() {
    echo 'shifa';
}
add_action('wp_footer', 'my_custom_function');

// Later, if we want to remove the action
remove_action('wp_footer', 'my_custom_function');


/******FILTER HOOK******/
function my_filter_hook($content) {
    // Modify the content
    $modified_content = $content . ' - All credits to shifa';
    return $modified_content;
}

// Add filter hook
add_filter('the_content', 'my_filter_hook');

function my_custom_filter_function($content) {
    // Modify the content
    return $content . ' My custom content';
}
add_filter('my_custom_filter', 'my_custom_filter_function');

// detect if a filter is currently being executed
if (doing_filter('my_custom_filter')) {
    echo 'Filter processing';
} else {
    echo 'Not inside any filter';
}

//checks if a filter has been registered for a particular hook
if (has_filter('my_custom_filter')) {
    echo 'The "my_custom_filter" hook has registered filters.';
} else {
    echo 'No filters have been registered for "my_custom_filter".';
}

// remove filter
remove_filter('my_custom_filter', 'my_custom_filter_function');


//wp_enqueue_scripts usage
function wpb_adding_scripts() {
  wp_register_script('my_script', get_template_directory_uri() . '/js/myjs.js', '1.1', true);
  wp_enqueue_script('my_script');
}
   
add_action( 'wp_enqueue_scripts', 'wpb_adding_scripts' );