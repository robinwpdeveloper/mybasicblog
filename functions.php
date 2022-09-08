<?php
/**
 * Basic Theme functions and definitions
 *
 * Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @link https://developer.wordpress.org/themes/advanced-topics/child-themes/
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, @link https://developer.wordpress.org/plugins/
 *
 */

/*
 * Set up the content width value based on the theme's design.
 *
 * @see mybasicblog_content_width() for template-specific adjustments.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 604;
}

/**
 * Add support for a custom header image.
 */
// require get_template_directory() . '/inc/custom-header.php';

/**
 * Basic Theme only works in WordPress 3.6 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '3.6-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

/**
 * Block Patterns.
 *
 * @since Basic Theme 3.4
 */
// require get_template_directory() . '/inc/block-patterns.php';

/**
 * Basic Theme setup.
 *
 * Sets up theme defaults and registers the various WordPress features that
 * Basic Theme supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add Visual Editor stylesheets.
 * @uses add_theme_support() To add support for automatic feed links, post
 * formats, and post thumbnails.
 * @uses register_nav_menu() To add support for a navigation menu.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Basic Theme 1.0
 */
function mybasicblog_setup() {
	/*
	 * Makes Basic Theme available for translation.
	 *
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/mybasicblog
	 * If you're building a theme based on Basic Theme, use a find and
	 * replace to change 'mybasicblog' to the name of your theme in all
	 * template files.
	 */
	load_theme_textdomain( 'mybasicblog' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css' ) );

	// Load regular editor styles into the new block-based editor.
	add_theme_support( 'editor-styles' );

	// Load default block styles.
	add_theme_support( 'wp-block-styles' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	// Add support for responsive embeds.
	add_theme_support( 'responsive-embeds' );

	// Add support for custom color scheme.
	add_theme_support(
		'editor-color-palette',
		array(
			array(
				'name'  => __( 'Dark Gray', 'mybasicblog' ),
				'slug'  => 'dark-gray',
				'color' => '#141412',
			),
			array(
				'name'  => __( 'Red', 'mybasicblog' ),
				'slug'  => 'red',
				'color' => '#bc360a',
			),
			array(
				'name'  => __( 'Medium Orange', 'mybasicblog' ),
				'slug'  => 'medium-orange',
				'color' => '#db572f',
			),
			array(
				'name'  => __( 'Light Orange', 'mybasicblog' ),
				'slug'  => 'light-orange',
				'color' => '#ea9629',
			),
			array(
				'name'  => __( 'Yellow', 'mybasicblog' ),
				'slug'  => 'yellow',
				'color' => '#fbca3c',
			),
			array(
				'name'  => __( 'White', 'mybasicblog' ),
				'slug'  => 'white',
				'color' => '#fff',
			),
			array(
				'name'  => __( 'Dark Brown', 'mybasicblog' ),
				'slug'  => 'dark-brown',
				'color' => '#220e10',
			),
			array(
				'name'  => __( 'Medium Brown', 'mybasicblog' ),
				'slug'  => 'medium-brown',
				'color' => '#722d19',
			),
			array(
				'name'  => __( 'Light Brown', 'mybasicblog' ),
				'slug'  => 'light-brown',
				'color' => '#eadaa6',
			),
			array(
				'name'  => __( 'Beige', 'mybasicblog' ),
				'slug'  => 'beige',
				'color' => '#e8e5ce',
			),
			array(
				'name'  => __( 'Off-white', 'mybasicblog' ),
				'slug'  => 'off-white',
				'color' => '#f7f5e7',
			),
		)
	);

	// Add support for block gradient colors.
	add_theme_support(
		'editor-gradient-presets',
		array(
			array(
				'name'     => __( 'Autumn Brown', 'mybasicblog' ),
				'gradient' => 'linear-gradient(135deg, rgba(226,45,15,1) 0%, rgba(158,25,13,1) 100%)',
				'slug'     => 'autumn-brown',
			),
			array(
				'name'     => __( 'Sunset Yellow', 'mybasicblog' ),
				'gradient' => 'linear-gradient(135deg, rgba(233,139,41,1) 0%, rgba(238,179,95,1) 100%)',
				'slug'     => 'sunset-yellow',
			),
			array(
				'name'     => __( 'Light Sky', 'mybasicblog' ),
				'gradient' => 'linear-gradient(135deg,rgba(228,228,228,1.0) 0%,rgba(208,225,252,1.0) 100%)',
				'slug'     => 'light-sky',
			),
			array(
				'name'     => __( 'Dark Sky', 'mybasicblog' ),
				'gradient' => 'linear-gradient(135deg,rgba(0,0,0,1.0) 0%,rgba(56,61,69,1.0) 100%)',
				'slug'     => 'dark-sky',
			),
		)
	);

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Switches default core markup for search form, comment form,
	 * and comments to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
			'navigation-widgets',
		)
	);

	/*
	 * This theme supports all available post formats by default.
	 * See https://wordpress.org/support/article/post-formats/
	 */
	add_theme_support(
		'post-formats',
		array(
			'aside',
			'audio',
			'chat',
			'gallery',
			'image',
			'link',
			'quote',
			'status',
			'video',
		)
	);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Navigation Menu', 'mybasicblog' ) );

	/*
	 * This theme uses a custom image size for featured images, displayed on
	 * "standard" posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 604, 270, true );

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );

	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
add_action( 'after_setup_theme', 'mybasicblog_setup' );

/**
 * Return the Google font stylesheet URL, if available.
 *
 * The use of Source Sans Pro and Bitter by default is localized. For languages
 * that use characters not supported by the font, the font can be disabled.
 *
 * @since Basic Theme 1.0
 *
 * @return string Font stylesheet or empty string if disabled.
 */
// function mybasicblog_fonts_url() {
// 	$fonts_url = '';

// 	/*
// 	 * translators: If there are characters in your language that are not supported
// 	 * by Source Sans Pro, translate this to 'off'. Do not translate into your own language.
// 	 */
// 	$source_sans_pro = _x( 'on', 'Source Sans Pro font: on or off', 'mybasicblog' );

// 	/*
// 	 * translators: If there are characters in your language that are not supported
// 	 * by Bitter, translate this to 'off'. Do not translate into your own language.
// 	 */
// 	$bitter = _x( 'on', 'Bitter font: on or off', 'mybasicblog' );

// 	if ( 'off' !== $source_sans_pro || 'off' !== $bitter ) {
// 		$font_families = array();

// 		if ( 'off' !== $source_sans_pro ) {
// 			$font_families[] = 'Source Sans Pro:300,400,700,300italic,400italic,700italic';
// 		}

// 		if ( 'off' !== $bitter ) {
// 			$font_families[] = 'Bitter:400,700';
// 		}

// 		$query_args = array(
// 			'family'  => urlencode( implode( '|', $font_families ) ),
// 			'subset'  => urlencode( 'latin,latin-ext' ),
// 			'display' => urlencode( 'fallback' ),
// 		);
// 		$fonts_url  = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
// 	}

// 	return $fonts_url;
// }

/**
 * Enqueue scripts and styles for the front end.
 *
 * @since Basic Theme 1.0
 */
function mybasicblog_scripts_styles() {
	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Adds Masonry to handle vertical alignment of footer widgets.
	if ( is_active_sidebar( 'sidebar-1' ) ) {
		wp_enqueue_script( 'jquery-masonry' );
	}

	// Loads JavaScript file with functionality specific to Basic Theme.
	// wp_enqueue_script( 'mybasicblog-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20171218', true );

	// Add Source Sans Pro and Bitter fonts, used in the main stylesheet.
	// wp_enqueue_style( 'mybasicblog-fonts', mybasicblog_fonts_url(), array(), null );

	add_action( 'wp_enqueue_scripts', function() {
		wp_enqueue_webfont(
			// The handle
			'mybasicblog-fonts',
			// URL to the webfont CSS - can use any public API.
			'https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500;600&display=swap', 
		);
	} );

	// Add Genericons font, used in the main stylesheet.
	// wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.0.3' );

	// Loads our main stylesheet.
	wp_enqueue_style( 'mybasicblog-style', get_stylesheet_uri(), array(), '20220524' );

	// Theme block stylesheet.
	// wp_enqueue_style( 'mybasicblog-block-style', get_template_directory_uri() . '/css/blocks.css', array( 'mybasicblog-style' ), '20190102' );

	// Loads the Internet Explorer specific stylesheet.
	// wp_enqueue_style( 'mybasicblog-ie', get_template_directory_uri() . '/css/ie.css', array( 'mybasicblog-style' ), '20150214' );
	// wp_style_add_data( 'mybasicblog-ie', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'mybasicblog_scripts_styles' );

/**
 * Add preconnect for Google Fonts.
 *
 * @since Basic Theme 2.1
 *
 * @param array   $urls          URLs to print for resource hints.
 * @param string  $relation_type The relation type the URLs are printed.
 * @return array URLs to print for resource hints.
 */
function mybasicblog_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'mybasicblog-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '>=' ) ) {
			$urls[] = array(
				'href' => 'https://fonts.gstatic.com',
				'crossorigin',
			);
		} else {
			$urls[] = 'https://fonts.gstatic.com';
		}
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'mybasicblog_resource_hints', 10, 2 );

/**
 * Enqueue styles for the block-based editor.
 *
 * @since Basic Theme 2.5
 */
function mybasicblog_block_editor_styles() {
	// Block styles.
	wp_enqueue_style( 'mybasicblog-block-editor-style', get_template_directory_uri() . '/css/editor-blocks.css', array(), '20201208' );
	// Add custom fonts.
	// wp_enqueue_style( 'mybasicblog-fonts', mybasicblog_fonts_url(), array(), null );
}
add_action( 'enqueue_block_editor_assets', 'mybasicblog_block_editor_styles' );

/**
 * Filter the page title.
 *
 * Creates a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @since Basic Theme 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep   Optional separator.
 * @return string The filtered title.
 */
function mybasicblog_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		/* translators: %s: Page number. */
		$title = "$title $sep " . sprintf( __( 'Page %s', 'mybasicblog' ), max( $paged, $page ) );
	}

	return $title;
}
// add_filter( 'wp_title', 'mybasicblog_wp_title', 10, 2 );

/**
 * Register two widget areas.
 *
 * @since Basic Theme 1.0
 */
function mybasicblog_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Main Widget Area', 'mybasicblog' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Appears in the footer section of the site.', 'mybasicblog' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Secondary Widget Area', 'mybasicblog' ),
			'id'            => 'sidebar-2',
			'description'   => __( 'Appears on posts and pages in the sidebar.', 'mybasicblog' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'mybasicblog_widgets_init' );

if ( ! function_exists( 'wp_get_list_item_separator' ) ) :
	/**
	 * Retrieves the list item separator based on the locale.
	 *
	 * Added for backward compatibility to support pre-6.0.0 WordPress versions.
	 *
	 * @since 6.0.0
	 */
	function wp_get_list_item_separator() {
		/* translators: Used between list items, there is a space after the comma. */
		return __( ', ', 'mybasicblog' );
	}
endif;

if ( ! function_exists( 'mybasicblog_paging_nav' ) ) :
	/**
	 * Display navigation to next/previous set of posts when applicable.
	 *
	 * @since Basic Theme 1.0
	 */
	function mybasicblog_paging_nav() {
		global $wp_query;

		// Don't print empty markup if there's only one page.
		if ( $wp_query->max_num_pages < 2 ) {
			return;
		}
		?>
		<nav class="navigation paging-navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'mybasicblog' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'mybasicblog' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'mybasicblog' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
		<?php
	}
endif;

if ( ! function_exists( 'mybasicblog_post_nav' ) ) :
	/**
	 * Display navigation to next/previous post when applicable.
	 *
	 * @since Basic Theme 1.0
	 */
	function mybasicblog_post_nav() {
		global $post;

		// Don't print empty markup if there's nowhere to navigate.
		$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
		$next     = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous ) {
			return;
		}
		?>
		<nav class="navigation post-navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'mybasicblog' ); ?></h1>
		<div class="nav-links">

			<?php previous_post_link( '%link', _x( '<span class="meta-nav">&larr;</span> %title', 'Previous post link', 'mybasicblog' ) ); ?>
			<?php next_post_link( '%link', _x( '%title <span class="meta-nav">&rarr;</span>', 'Next post link', 'mybasicblog' ) ); ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
		<?php
	}
endif;

if ( ! function_exists( 'mybasicblog_entry_meta' ) ) :
	/**
	 * Print HTML with meta information for current post: categories, tags, permalink, author, and date.
	 *
	 * Create your own mybasicblog_entry_meta() to override in a child theme.
	 *
	 * @since Basic Theme 1.0
	 */
	function mybasicblog_entry_meta() {
		if ( is_sticky() && is_home() && ! is_paged() ) {
			echo '<span class="featured-post">' . esc_html__( 'Sticky', 'mybasicblog' ) . '</span>';
		}

		if ( ! has_post_format( 'link' ) && 'post' === get_post_type() ) {
			mybasicblog_entry_date();
		}

		$categories_list = get_the_category_list( wp_get_list_item_separator() );
		if ( $categories_list ) {
			echo '<span class="categories-links">' . $categories_list . '</span>';
		}

		$tags_list = get_the_tag_list( '', wp_get_list_item_separator() );
		if ( $tags_list && ! is_wp_error( $tags_list ) ) {
			echo '<span class="tags-links">' . $tags_list . '</span>';
		}

		// Post author.
		if ( 'post' === get_post_type() ) {
			printf(
				'<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				/* translators: %s: Author display name. */
				esc_attr( sprintf( __( 'View all posts by %s', 'mybasicblog' ), get_the_author() ) ),
				get_the_author()
			);
		}
	}
endif;

if ( ! function_exists( 'mybasicblog_entry_date' ) ) :
	/**
	 * Print HTML with date information for current post.
	 *
	 * Create your own mybasicblog_entry_date() to override in a child theme.
	 *
	 * @since Basic Theme 1.0
	 *
	 * @param bool $display (optional) Whether to display the date. Default true.
	 * @return string The HTML-formatted post date.
	 */
	function mybasicblog_entry_date( $display = true ) {
		if ( has_post_format( array( 'chat', 'status' ) ) ) {
			/* translators: 1: Post format name, 2: Date. */
			$format_prefix = _x( '%1$s on %2$s', '1: post format name. 2: date', 'mybasicblog' );
		} else {
			$format_prefix = '%2$s';
		}

		$date = sprintf(
			'<span class="date"><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a></span>',
			esc_url( get_permalink() ),
			/* translators: %s: Post title. */
			esc_attr( sprintf( __( 'Permalink to %s', 'mybasicblog' ), the_title_attribute( 'echo=0' ) ) ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ), get_the_date() ) )
		);

		if ( $display ) {
			echo $date;
		}

		return $date;
	}
endif;

if ( ! function_exists( 'mybasicblog_the_attached_image' ) ) :
	/**
	 * Print the attached image with a link to the next attached image.
	 *
	 * @since Basic Theme 1.0
	 */
	function mybasicblog_the_attached_image() {
		/**
		 * Filters the image attachment size to use.
		 *
		 * @since Basic Theme 1.0
		 *
		 * @param array $size {
		 *     @type int The attachment height in pixels.
		 *     @type int The attachment width in pixels.
		 * }
		 */
		$attachment_size     = apply_filters( 'mybasicblog_attachment_size', array( 724, 724 ) );
		$next_attachment_url = wp_get_attachment_url();
		$post                = get_post();

		/*
		 * Grab the IDs of all the image attachments in a gallery so we can get the URL
		 * of the next adjacent image in a gallery, or the first image (if we're
		 * looking at the last image in a gallery), or, in a gallery of one, just the
		 * link to that image file.
		 */
		$attachment_ids = get_posts(
			array(
				'post_parent'    => $post->post_parent,
				'fields'         => 'ids',
				'numberposts'    => -1,
				'post_status'    => 'inherit',
				'post_type'      => 'attachment',
				'post_mime_type' => 'image',
				'order'          => 'ASC',
				'orderby'        => 'menu_order ID',
			)
		);

		// If there is more than 1 attachment in a gallery...
		if ( count( $attachment_ids ) > 1 ) {
			foreach ( $attachment_ids as $idx => $attachment_id ) {
				if ( $attachment_id == $post->ID ) {
					$next_id = $attachment_ids[ ( $idx + 1 ) % count( $attachment_ids ) ];
					break;
				}
			}

			if ( $next_id ) {
				// ...get the URL of the next image attachment.
				$next_attachment_url = get_attachment_link( $next_id );
			} else {
				// ...or get the URL of the first image attachment.
				$next_attachment_url = get_attachment_link( reset( $attachment_ids ) );
			}
		}

		printf(
			'<a href="%1$s" title="%2$s" rel="attachment">%3$s</a>',
			esc_url( $next_attachment_url ),
			the_title_attribute( array( 'echo' => false ) ),
			wp_get_attachment_image( $post->ID, $attachment_size )
		);
	}
endif;

/**
 * Return the post URL.
 *
 * @uses get_url_in_content() to get the URL in the post meta (if it exists) or
 * the first link found in the post content.
 *
 * Falls back to the post permalink if no URL is found in the post.
 *
 * @since Basic Theme 1.0
 *
 * @return string The Link format URL.
 */
function mybasicblog_get_link_url() {
	$content = get_the_content();
	$has_url = get_url_in_content( $content );

	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}

if ( ! function_exists( 'mybasicblog_excerpt_more' ) && ! is_admin() ) :
	/**
	 * Replaces "[...]" (appended to automatically generated excerpts) with ...
	 * and a Continue reading link.
	 *
	 * @since Basic Theme 1.4
	 *
	 * @param string $more Default Read More excerpt link.
	 * @return string Filtered Read More excerpt link.
	 */
	function mybasicblog_excerpt_more( $more ) {
		$link = sprintf(
			'<a href="%1$s" class="more-link">%2$s</a>',
			esc_url( get_permalink( get_the_ID() ) ),
			/* translators: %s: Post title. Only visible to screen readers. */
			sprintf( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'mybasicblog' ), '<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>' )
		);
		return ' &hellip; ' . $link;
	}
	add_filter( 'excerpt_more', 'mybasicblog_excerpt_more' );
endif;

/**
 * Extend the default WordPress body classes.
 *
 * Adds body classes to denote:
 * 1. Single or multiple authors.
 * 2. Active widgets in the sidebar to change the layout and spacing.
 * 3. When avatars are disabled in discussion settings.
 *
 * @since Basic Theme 1.0
 *
 * @param array $classes A list of existing body class values.
 * @return array The filtered body class list.
 */
function mybasicblog_body_class( $classes ) {
	if ( ! is_multi_author() ) {
		$classes[] = 'single-author';
	}

	if ( is_active_sidebar( 'sidebar-2' ) && ! is_attachment() && ! is_404() ) {
		$classes[] = 'sidebar';
	}

	if ( ! get_option( 'show_avatars' ) ) {
		$classes[] = 'no-avatars';
	}

	return $classes;
}
add_filter( 'body_class', 'mybasicblog_body_class' );

/**
 * Adjust content_width value for video post formats and attachment templates.
 *
 * @since Basic Theme 1.0
 */
function mybasicblog_content_width() {
	global $content_width;

	if ( is_attachment() ) {
		$content_width = 724;
	} elseif ( has_post_format( 'audio' ) ) {
		$content_width = 484;
	}
}
add_action( 'template_redirect', 'mybasicblog_content_width' );

/**
 * Add postMessage support for site title and description for the Customizer.
 *
 * @since Basic Theme 1.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function mybasicblog_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'            => '.site-title',
				'container_inclusive' => false,
				'render_callback'     => 'mybasicblog_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'            => '.site-description',
				'container_inclusive' => false,
				'render_callback'     => 'mybasicblog_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'mybasicblog_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Basic Theme 1.9
 *
 * @see mybasicblog_customize_register()
 *
 * @return void
 */
function mybasicblog_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Basic Theme 1.9
 *
 * @see mybasicblog_customize_register()
 *
 * @return void
 */
function mybasicblog_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Enqueue JavaScript postMessage handlers for the Customizer.
 *
 * Binds JavaScript handlers to make the Customizer preview
 * reload changes asynchronously.
 *
 * @since Basic Theme 1.0
 */
function mybasicblog_customize_preview_js() {
	wp_enqueue_script( 'mybasicblog-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20141120', true );
}
add_action( 'customize_preview_init', 'mybasicblog_customize_preview_js' );

/**
 * Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 *
 * @since Basic Theme 2.3
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array The filtered arguments for tag cloud widget.
 */
function mybasicblog_widget_tag_cloud_args( $args ) {
	$args['largest']  = 22;
	$args['smallest'] = 8;
	$args['unit']     = 'pt';
	$args['format']   = 'list';

	return $args;
}
add_filter( 'widget_tag_cloud_args', 'mybasicblog_widget_tag_cloud_args' );

/**
 * Prevents `author-bio.php` partial template from interfering with rendering
 * an author archive of a user with the `bio` username.
 *
 * @since Basic Theme 3.0
 *
 * @param string $template Template file.
 * @return string Replacement template file.
 */
function mybasicblog_author_bio_template( $template ) {
	if ( is_author() ) {
		$author = get_queried_object();
		if ( $author instanceof WP_User && 'bio' === $author->user_nicename ) {
			// Use author templates if exist, fall back to template hierarchy otherwise.
			return locate_template( array( "author-{$author->ID}.php", 'author.php' ) );
		}
	}

	return $template;
}
add_filter( 'author_template', 'mybasicblog_author_bio_template' );

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Fire the wp_body_open action.
	 *
	 * Added for backward compatibility to support pre-5.2.0 WordPress versions.
	 *
	 * @since Basic Theme 2.8
	 */
	function wp_body_open() {
		/**
		 * Triggered after the opening <body> tag.
		 *
		 * @since Basic Theme 2.8
		 */
		do_action( 'wp_body_open' );
	}
endif;

/**
 * Register Custom Block Styles
 *
 * @since Basic Theme 3.4
 */
if ( function_exists( 'register_block_style' ) ) {
	function mybasicblog_register_block_styles() {

		/**
		 * Register block style
		 */
		register_block_style(
			'core/button',
			array(
				'name'         => 'no-shadow',
				'label'        => __( 'No Shadow', 'mybasicblog' ),
				'style_handle' => 'no-shadow',
			)
		);
	}
	add_action( 'init', 'mybasicblog_register_block_styles' );
}


$args = [];	
add_theme_support( "title-tag", $args );

add_theme_support( "html5", ['comment-form'] );

add_theme_support( "custom-logo", $args );

add_theme_support( "custom-header", $args );

add_theme_support( "custom-background", $args );



/**
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {

	// Call to Action.
	register_block_pattern(
		'mybasicblog/call-to-action-btn',
		array(
			'title'         => esc_html__( 'Call to Action Button', 'mybasicblog' ),
			'categories'    => array( 'mybasicblog' ),
			'viewportWidth' => 1400,
			'content'       => implode(
				'',
				array(
					'<!-- mybasicblog:group {"align":"wide","style":{"color":{"background":"#ffffff"}}} -->',
					'<div class="wp-block-group alignwide has-background" style="background-color:#ffffff"><div class="wp-block-group__inner-container"><!-- mybasicblog:group -->',
					'<div class="wp-block-group"><div class="wp-block-group__inner-container"><!-- mybasicblog:heading {"align":"center"} -->',
					'<h2 class="has-text-align-center">' . esc_html__( 'Support the Museum and Get Exclusive Offers', 'mybasicblog' ) . '</h2>',
					'<!-- /mybasicblog:heading -->',
					'<!-- mybasicblog:paragraph {"align":"center"} -->',
					'<p class="has-text-align-center">' . esc_html__( 'Members get access to exclusive exhibits and sales. Our memberships cost $99.99 and are billed annually.', 'mybasicblog' ) . '</p>',
					'<!-- /mybasicblog:paragraph -->',
					'<!-- mybasicblog:button {"align":"center","className":"is-style-outline"} -->',
					'<div class="wp-block-button aligncenter is-style-outline"><a class="wp-block-button__link" href="#">' . esc_html__( 'Become a Member', 'mybasicblog' ) . '</a></div>',
					'<!-- /mybasicblog:button --></div></div>',
					'<!-- /mybasicblog:group --></div></div>',
					'<!-- /mybasicblog:group -->',
				)
			),
		)
	);
}