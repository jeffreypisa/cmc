<?php
/**
 * The Template for displaying all single posts
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context = Timber::get_context();
$post = Timber::query_post();

$currentPostType = get_post_type();

$context['posttype'] = $currentPostType;

$context['post'] = $post;

$postobject = get_queried_object();
$postType = get_post_type_object(get_post_type($postobject));

$thisPostType = $postType->labels->name;
$currentPostType = get_post_type();

if ($currentPostType == 'post') {
	$thisPostTypeLink = '/blog';
} else {
	$thisPostTypeLink = get_post_type_archive_link($currentPostType);
}

$args = array(
  'post_type'			  => 'post',
	'posts_per_page'  => 2,
);

$context['blog'] = Timber::get_posts($args);

$kleurstelling = get_field( 'kleurstelling', 'options' );

if ($thisPostType == 'Diensten') {
	if ($kleurstelling == 'expertisecentrum' ) {
		$thisPostType = 'diensten';		
	} else {
		$thisPostType = 'begeleidingsvormen';		
	}
} 

$context['posttype'] = $thisPostType;
$context['posttype_link'] = $thisPostTypeLink;
$context['posttype_current'] = $thisPostType;

include 'getdata.php';

// Get taxonomies

$quoteterms = \Timber::get_terms(array('taxonomy' => 'quote-categorie', 'hide_empty' => true)); 
$context['quoteterms'] = $quoteterms;


if ( post_password_required( $post->ID ) ) {
	Timber::render( 'single-password.twig', $context );
} else {
	Timber::render( array( 'single-' . $post->ID . '.twig', 'single-' . $post->post_type . '.twig', 'single.twig' ), $context );
}