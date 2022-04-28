<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.2
 */
     
$templates = array( 'archive-' . $post->post_type . '.twig', 'archive.twig', 'index.twig' );

$context = Timber::get_context();

$postType = get_queried_object();
$thisPostType = $postType->labels->name;
$currentPostType = get_post_type();

if ($currentPostType == 'post') {
	$thisPostTypeLink = '/nieuws';
} else {
	$thisPostTypeLink = get_post_type_archive_link($currentPostType);
}

$context['posttype'] = $thisPostType;
$context['posttype_link'] = $thisPostTypeLink;
$context['posttype_current'] = $currentPostType;

// Get posts

// Get taxonomies

$quoteterms = \Timber::get_terms(array('taxonomy' => 'quote-categorie', 'hide_empty' => true)); 
$context['quoteterms'] = $quoteterms;

/* Load categories */

$terms = \Timber::get_terms(array('taxonomy' => 'category', 'hide_empty' => true)); 
$context['categories'] = $terms;

$postcatid = get_queried_object()->term_id;
$context['current_category'] = $postcatid;

/* Load posts */


$args = array(
  'post_type'			  => 'post',
	'posts_per_page'  => -1,
);

$context['posts'] = Timber::get_posts($args);

Timber::render( $templates, $context );