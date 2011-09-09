<?php

add_action('admin_menu', 'addPage');
add_action('profile_update','UpdateDate');
add_action('admin_head', 'stylesheet');
add_action('wp_head', 'stylesheet');
add_action('wp','CheckPassword');
add_action('admin_menu', 'hide_profile_info');

?>
