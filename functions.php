<?php

//remove admin menu pages
function pwp_admin_menu_page_remove() {
    remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'pwp_admin_menu_page_remove' );

