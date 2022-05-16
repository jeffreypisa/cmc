<?php

add_action('after_setup_theme', 'emonks_register_nav_menus');

function emonks_register_nav_menus() {
	register_nav_menu('menu', __('Hoofdmenu'));
	register_nav_menu('footermenu_marketing', __('Footer Menu Marketing'));
	register_nav_menu('footermenu_media', __('Footer Menu Media'));
}