<?php
/**
 * Buffet Framework: Default Template Functions
 * 
 * This file contains the template functions that add functionality to the 
 * default features of the theme.
 * 
 * @package Buffet
 * @subpackage API
 */

/**
 * bf_get_page_no() - Get Page Number Function
 * 
 * Retrieves the page number and prints out as a document title.
 * 
 * @since	0.5.2
 * @see		bf_document_title()
 */
function bf_get_page_no() {
	if ( get_query_var('paged') ) return ' | Page ' . get_query_var('paged');
}

/**
 * bf_document_title() - Document Title Function
 * 
 * Prints out SEO optimized document title based on the page the user is in.
 * 
 * @hook	filter	bf_document_title
 * @uses	bf_get_page_no()
 * @since	0.5.2
 */
function bf_document_title() {
	global $s;
	
	$output = '';
	if ( function_exists('seo_title_tag') ) {
		seo_title_tag();
		return null;
	} else if ( class_exists('All_in_One_SEO_Pack') || class_exists('HeadSpace2_Admin') ) {
		if(is_front_page() || is_home()) {
			echo get_bloginfo('name') . ': ' . get_bloginfo('description');
			$output = get_bloginfo('name') . ': ' . get_bloginfo('description');
		} else {
			$output = wp_title('', false);
		}
	} else {
		if ( is_attachment() ) {
			$output = get_bloginfo('name') . ' | ' . single_post_title('', false);
		} else if ( is_single() ) {
			$output = single_post_title('', false);
		} else if ( is_home() ) {
			$output = get_bloginfo('name') . ' | ' . get_bloginfo('description') . bf_get_page_no();	
		} else if ( is_page() ) {
			$output = single_post_title('', false);	
		} else if ( is_search() ) {
			$output = get_bloginfo('name') . ' | ' . sprintf( __('Search results for %s', 'arras'), wp_specialchars($s) ) . bf_get_page_no();
		} else if ( is_404() ) {
			$output = get_bloginfo('name') . ' | ' . __('Not Found', 'arras');	
		} else {
			$output = get_bloginfo('name') . wp_title('|', false) . bf_get_page_no();	
		}
	}
	echo apply_filters('bf_document_title', $output);
}

/**
 * bf_canonical_url() - Canonical URL Function
 * 
 * Adds a canonical URL link to the <head> tag if the page viewed is a single post.
 * 
 * @since	0.5.2
 */
function bf_canonical_url() {
	if ( is_singular() ) echo '<link rel="canonical" href="' . get_permalink() . '" />';
}

/**
 * bf_body_class() - Semantic Body Class Function
 * 
 * Checks for body_class() function (WordPress 2.8) before running its own.
 * Prints out body semantic class for easy customization using CSS. Based on Sandbox theme.
 * 
 * You can override this using the <b>body_class</b> filter.
 * 
 * @hook	filter	bf_body_class
 * @since	0.5.2
 * @uses	bf_date_classes()
 */
function bf_body_class() {
	if ( function_exists('body_class') )
		return body_class();
	
	global $wp_query, $current_user;
	
	// It's surely a WordPress blog, right?
	$c = array('wordpress');
	
	// Applies the time- and date-based classes (below) to BODY element
	bf_date_classes( time(), $c );

	// Generic semantic classes for what type of content is displayed
	is_front_page()  ? $c[] = 'home'       : null; // For the front page, if set
	is_home()        ? $c[] = 'blog'       : null; // For the blog posts page, if set
	is_archive()     ? $c[] = 'archive'    : null;
	is_date()        ? $c[] = 'date'       : null;
	is_search()      ? $c[] = 'search'     : null;
	is_paged()       ? $c[] = 'paged'      : null;
	is_attachment()  ? $c[] = 'attachment' : null;
	is_404()         ? $c[] = 'four04'     : null; // CSS does not allow a digit as first character

	// Special classes for BODY element when a single post
	if ( is_single() ) {
		$postID = $wp_query->post->ID;
		the_post();

		// Adds 'single' class and class with the post ID
		$c[] = 'single postid-' . $postID;

		// Adds classes for the month, day, and hour when the post was published
		if ( isset( $wp_query->post->post_date ) )
			bf_date_classes( mysql2date( 'U', $wp_query->post->post_date ), $c, 's-' );

		// Adds category classes for each category on single posts
		if ( $cats = get_the_category() )
			foreach ( $cats as $cat )
				$c[] = 's-category-' . $cat->slug;

		// Adds tag classes for each tags on single posts
		if ( $tags = get_the_tags() )
			foreach ( $tags as $tag )
				$c[] = 's-tag-' . $tag->slug;

		// Adds MIME-specific classes for attachments
		if ( is_attachment() ) {
			$mime_type = get_post_mime_type();
			$mime_prefix = array( 'application/', 'image/', 'text/', 'audio/', 'video/', 'music/' );
				$c[] = 'attachmentid-' . $postID . ' attachment-' . str_replace( $mime_prefix, "", "$mime_type" );
		}

		// Adds author class for the post author
		$c[] = 's-author-' . sanitize_title_with_dashes(strtolower(get_the_author_login()));
		rewind_posts();
	}

	// Author name classes for BODY on author archives
	elseif ( is_author() ) {
		$author = $wp_query->get_queried_object();
		$c[] = 'author';
		$c[] = 'author-' . $author->user_nicename;
	}

	// Category name classes for BODY on category archvies
	elseif ( is_category() ) {
		$cat = $wp_query->get_queried_object();
		$c[] = 'category';
		$c[] = 'category-' . $cat->slug;
	}

	// Tag name classes for BODY on tag archives
	elseif ( is_tag() ) {
		$tags = $wp_query->get_queried_object();
		$c[] = 'tag';
		$c[] = 'tag-' . $tags->slug;
	}

	// Page author for BODY on 'pages'
	elseif ( is_page() ) {
		$pageID = $wp_query->post->ID;
		$page_children = wp_list_pages("child_of=$pageID&echo=0");
		the_post();
		$c[] = 'page pageid-' . $pageID;
		$c[] = 'page-author-' . sanitize_title_with_dashes(strtolower(get_the_author('login')));
		// Checks to see if the page has children and/or is a child page; props to Adam
		if ( $page_children )
			$c[] = 'page-parent';
		if ( $wp_query->post->post_parent )
			$c[] = 'page-child parent-pageid-' . $wp_query->post->post_parent;
		if ( is_page_template() ) // Hat tip to Ian, themeshaper.com
			$c[] = 'page-template page-template-' . str_replace( '.php', '-php', get_post_meta( $pageID, '_wp_page_template', true ) );
		rewind_posts();
	}

	// Search classes for results or no results
	elseif ( is_search() ) {
		the_post();
		if ( have_posts() ) {
			$c[] = 'search-results';
		} else {
			$c[] = 'search-no-results';
		}
		rewind_posts();
	}

	// For when a visitor is logged in while browsing
	if ( $current_user->ID )
		$c[] = 'loggedin';

	// Paged classes; for 'page X' classes of index, single, etc.
	if ( ( ( $page = $wp_query->get('paged') ) || ( $page = $wp_query->get('page') ) ) && $page > 1 ) {
		$c[] = 'paged-' . $page;
		if ( is_single() ) {
			$c[] = 'single-paged-' . $page;
		} elseif ( is_page() ) {
			$c[] = 'page-paged-' . $page;
		} elseif ( is_category() ) {
			$c[] = 'category-paged-' . $page;
		} elseif ( is_tag() ) {
			$c[] = 'tag-paged-' . $page;
		} elseif ( is_date() ) {
			$c[] = 'date-paged-' . $page;
		} elseif ( is_author() ) {
			$c[] = 'author-paged-' . $page;
		} elseif ( is_search() ) {
			$c[] = 'search-paged-' . $page;
		}
	}

	// Separates classes with a single space, collates classes for BODY
	$c = join( ' ', apply_filters( 'bf_body_class',  $c ) ); // Available filter: bf_body_class

	// And tada!
	print($c);
}

/**
 * bf_date_classes() - Date Class Function
 * 
 * {@internal Missing Long Description }}
 * 
 * @since	0.5.2
 */
function bf_date_classes($t, &$c, $p = '') {
	$t = $t + ( get_option('gmt_offset') * 3600 );
	$c[] = $p . 'y' . gmdate( 'Y', $t ); // Year
	$c[] = $p . 'm' . gmdate( 'm', $t ); // Month
	$c[] = $p . 'd' . gmdate( 'd', $t ); // Day
	$c[] = $p . 'h' . gmdate( 'H', $t ); // Hour
}

/**
 * bf_post_class() - Post Class Function
 * 
 * Checks for post_class() functionality in WordPress (available since 2.7).
 * 
 * @since	0.5.2
 * @return	string	HTML code containing semantic post class
 */
function bf_post_class() {
	global $post;
	
	if ( function_exists('post_class') ) {
		$custom_classes = array('clearfix', 'article');	
		return post_class( $custom_classes );
	} else {
		return 'class="article clearfix"';
	}
}

/**
 * bf_list_comments() - List Comments Function
 * 
 * Custom callback function displaying the comments in the post.
 * 
 * @since	0.5.2
 */
function bf_list_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		<div class="comment-node" id="comment-<?php comment_ID(); ?>">
			<?php bf_commentheader() ?>
			<div class="comment-content"><?php comment_text() ?></div>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
			<?php bf_commentfooter() ?>
		</div>
<?php
}

/**
 * bf_list_trackbacks() - List Trackbacks Function
 * 
 * Custom callback function displaying the trackbacks in the post.
 * 
 * @since	0.5.2
 */
function bf_list_trackbacks($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;	
?>
	<li <?php comment_class(); ?> id="li-trackback-<?php comment_ID() ?>">
		<div id="trackback-<?php comment_ID(); ?>">
			<?php bf_trackback() ?>
		</div>
<?php
}

/**
 * bf_rss_url() - RSS Feed URL Function
 * 
 * Returns the link to the blog's RSS feed (from theme options or default).
 * You can override this using the <b>bf_rss_url</b> filter.
 * 
 * @hook	filter	bf_rss_url
 * @since	0.5.3
 */
function bf_rss_url() {
	if ( bf_get_option('feed_url') != '' ) $output = bf_get_option('feed_url');
	else $output = get_bloginfo('rss2_url');
	
	echo apply_filters('bf_rss_url', $output);
}

/**
 * bf_comments_rss_url() - RSS Comments Feed URL Function
 * 
 * Returns the link to the blog's RSS comments feed (from theme options or default).
 * You can override this using the <b>bf_comments_rss_url</b> filter.
 * 
 * @hook	filter	bf_comments_rss_url
 * @since	0.5.3
 */
function bf_comments_rss_url() {
	if ( bf_get_option('comments_feed_url') != '' ) $output = bf_get_option('comments_feed_url');
	else $output = get_bloginfo('comments_rss2_url');	
	
	echo apply_filters('bf_comments_rss_url', $output);
}

/**
 * {@internal Missing Short Description }}
 * 
 * {@internal Missing Long Description }}
 * 
 * @ignore
 * @since	0.5.2
 */
function bf_add_breadcrumbs_js() {
	if ( !is_admin() )
		wp_enqueue_script( 'jbreadcrumb', get_template_directory_uri() . '/includes/js/jquery.jbreadcrumb.min.js', array('jquery-ui-core') );
}

/**
 * {@internal Missing Short Description }}
 * 
 * {@internal Missing Long Description }}
 * 
 * @ignore
 * @since	0.5.2
 */
function bf_add_breadcrumbs_jquery() {
	echo "$('#breadcrumbs').jBreadCrumb();";	
}

/**
 * {@internal Missing Short Description }}
 * 
 * {@internal Missing Long Description }}
 * 
 * @ignore
 * @since	0.5.2
 */
function bf_add_superfish_js() {
	if ( !is_admin() )
		wp_enqueue_script( 'superfish', get_template_directory_uri() . '/includes/js/superfish/superfish.js', 'jquery' );		
}

/**
 * {@internal Missing Short Description }}
 * 
 * {@internal Missing Long Description }}
 * 
 * @ignore
 * @since	0.5.2
 */
function bf_add_superfish_jquery() {
	echo "$('#nav').superfish({ autoArrows: false, speed: 'fast' });";
}

/**
 * {@internal Missing Short Description }}
 * 
 * {@internal Missing Long Description }}
 * 
 * @ignore
 * @since	0.5.2
 */
function bf_author_information() {
	if ( bf_get_option('display_author') ) {
		echo '<div class="author-desc vcard">';
		echo '<h5>Author Information</h5>';
		echo '<div class="fn description">';
		the_author_description();
		echo '</div></div>';
	}	
}

/**
 * {@internal Missing Short Description }}
 * 
 * {@internal Missing Long Description }}
 * 
 * @hook	filter	bf_breadcrumb_prefix
 * @since	0.5.2
 */
function bf_add_breadcrumbs() {
	/*
	 * Taken from Yoast Breadcrumb (http://yoast.com/wordpress/breadcrumbs/).
	 * Edited it to display the breadcrumb in a unordered list for certain jQuery plugins to work.
	 */
	global $wp_query;
	$output = '';
	
	$on_front = get_option('show_on_front');
	$output .= '<ul class="breadcrumbs clearfix" id="breadcrumbs">';
	
	// comment this to hide prefix notice
	$prefix = apply_filters( 'bf_breadcrumb_prefix', __('You are Here:', 'buffet') );
	if ( $prefix != '' ) $output .= '<li class="notice">' . $prefix . '</li>';
	
	function bf_get_category_parents($id, $link = false, $separator = '', $nicename = false) {
		$chain = '';
		$parent = &get_category($id);
		
		if ( is_wp_error( $parent ) )
		   return $parent;

		if ( $nicename )
		   $name = $parent->slug;
		else
		   $name = $parent->cat_name;

		if ( $parent->parent && ($parent->parent != $parent->term_id) )
		   $chain .= '<li>' . get_category_parents($parent->parent, true, $separator, $nicename) . '</li>';
		
		if ( is_single() )
			return $chain . '<li><a href="' . get_category_link($id) . '">' . $name . '</a></li>';
		else
			return $chain . '<li><strong>' . $name . '</strong></li>';
	}

	
	if ($on_front == "page") {
		$homelink = '<li><a href="' . get_permalink( get_option('page_on_front') ) . '">' . bf_get_option('home_link') . '</a></li>';
		$bloglink = $homelink . '<li><a href="'.get_permalink( get_option('page_for_posts') ).'">' . bf_get_option('blog_link') . '</a></li>';
	} else {
		$homelink = '<li><a href="' . get_bloginfo('url').'">' . bf_get_option('home_link') . '</a></li>';
		$bloglink = $homelink;
	}
	
	if ( ($on_front == "page" && is_front_page()) || ($on_front == "posts" && is_home()) ) {
		$output .= '<li><strong>' . bf_get_option('home_link') . '</strong></li>';
	} elseif ( $on_front == "page" && is_home() ) {
		$output .= $homelink . '<li><strong>' . bf_get_option('blog_link') . '</strong></li>';
	} elseif ( !is_page() ) {
		$output .= $homelink;
		if ( ( is_single() || is_category() || is_tag() || is_date() || is_author() ) && bf_get_option('single_parent') != false) {
			$output .= '<li><a href="'. get_permalink( bf_get_option('single_parent') ) .'">' . get_the_title( bf_get_option('single_parent') ) . '</a></li>';
		}
		if ( is_single() ) {
			$cats = get_the_category();
			$cat = $cats[0];
			if ($cat->parent != 0) {
				$output .= bf_get_category_parents($cat->term_id, true, "");
			} else {
				$output .= '<li><a href="'.get_category_link($cat->term_id).'">'.$cat->name.'</a></li>'; 
			}
		}
		if ( is_category() ) {
			$cat = intval( get_query_var('cat') );
			$output .= bf_get_category_parents($cat, false, "");
		} elseif ( is_tag() ) {
			$output .= '<li><strong>' . single_cat_title(' ', false) . '</strong></li>';
		} elseif (is_date()) { 
			$output .= '<li><strong>' . single_month_title(' ', false) . '</strong></li>';
		} elseif (is_author()) { 
			$user = get_userdatabylogin($wp_query->query_vars['author_name']);
			$output .= '<li><strong>' . $user->display_name . '</strong></li>';
		} elseif (is_search()) {
			$output .= '<li><strong>' . get_search_query() . '</strong></li>';
		} else {
			$output .= '<li><strong>' . get_the_title() . '</strong></li>';
		}
	} else {
		$post = $wp_query->get_queried_object();

		// If this is a top level Page, it's simple to output the breadcrumb
		if ( 0 == $post->post_parent ) {
			$output .= $homelink . '<li><strong>' . get_the_title() . '</strong></li>';
		} else {
			if (isset($post->ancestors)) {
				if (is_array($post->ancestors))
					$ancestors = array_values($post->ancestors);
				else 
					$ancestors = array($post->ancestors);				
			} else {
				$ancestors = array($post->post_parent);
			}

			// Reverse the order so it's oldest to newest
			$ancestors = array_reverse($ancestors);

			// Add the current Page to the ancestors list (as we need it's title too)
			$ancestors[] = $post->ID;

			$links = array();			
			foreach ( $ancestors as $ancestor ) {
				$tmp  = array();
				$tmp['title'] 	= strip_tags( get_the_title( $ancestor ) );
				$tmp['url'] 	= get_permalink($ancestor);
				$tmp['cur'] = false;
				if ($ancestor == $post->ID) {
					$tmp['cur'] = true;
				}
				$links[] = $tmp;
			}

			$output .= $homelink;
			foreach ( $links as $link ) {
				if (!$link['cur']) {
					$output .= '<li><a href="'.$link['url'].'">'.$link['title'].'</a></li>';
				} else {
					$output .= '<li><strong>' . $link['title'] . '</strong></li>';
				}
			}
		}
	}
	
	$output .= '</ul>';
	
	echo $output; // return output
}

/**
 * {@internal Missing Short Description }}
 * 
 * {@internal Missing Long Description }}
 * 
 * @since	0.5.2
 */
function bf_add_pagenav() {
?>
	<?php if ( function_exists('wp_pagenavi') ) wp_pagenavi(); else { ?>
	<div class="navigation">
		<div class="floatLeft"><?php next_posts_link( __('&laquo; Older Entries', 'buffet') ) ?></div>
		<div class="floatRight"><?php previous_posts_link( __('Newer Entries &raquo;', 'buffet') ) ?></div>
	</div>
	<?php }
}

/* End of file template.php */
/* Location: ./includes/template.php */
