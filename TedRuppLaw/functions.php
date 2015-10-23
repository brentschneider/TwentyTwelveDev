<?php
/**
 * persia functions and definitions.
 *
 * @subpackage persia
 * @since persia 0.1.0
 
 *@licstart  The following is the entire license notice for the 
        JavaScript code in this page.

        Copyright (C) 2014  ITstar

        The JavaScript code in this page is free software: you can
        redistribute it and/or modify it under the terms of the GNU
        General Public License (GNU GPL) as published by the Free Software
        Foundation, either version 3 of the License, or (at your option)
        any later version.  The code is distributed WITHOUT ANY WARRANTY;
        without even the implied warranty of MERCHANTABILITY or FITNESS
        FOR A PARTICULAR PURPOSE.  See the GNU GPL for more details.

        As additional permission under GNU GPL version 3 section 7, you
        may distribute non-source (e.g., minimized or compacted) forms of
        that code without the copy of the GNU GPL normally required by
        section 4, provided you include this license notice and a URL
        through which recipients can access the Corresponding Source.   


        @licend  The above is the entire license notice
        for the JavaScript code in this page. 
 */

// Content Width
if ( ! isset( $content_width ) )
	$content_width = 640;

	
/*-- Setup persia Features --*/
//textDomain, automatic-feed-link, editor-style, html5, post-formats, nav-menu, post-thumbnails

function persia_setup(){
	
	load_theme_textdomain( 'persia', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );
	add_theme_support( 'post-formats', array(
		'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'
	) );
	add_editor_style('css/editor-style.css');
	register_nav_menu( 'header_menu', __( 'Header Menu', 'persia' ) );
	register_nav_menu( 'responsive_menu', __( 'Responsive Menu', 'persia' ) );
	add_theme_support( 'post-thumbnails', array('post'));
	set_post_thumbnail_size( 150,150 , true );
	add_filter( 'use_default_gallery_style', '__return_false' );
	
	
}
add_action( 'after_setup_theme', 'persia_setup',11 );

//-------------- wp title -----------------------------------------
function persia_wp_title( $title, $sep ){
	global $paged, $page;

	if ( is_feed() )
		return $title;

	$title .= get_bloginfo( 'name' );

	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'persia' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'persia_wp_title', 10, 2 );

/**
 * Registers five widget areas.
 *	1.Sidebar widget area
 *	2.Sticky Widget Area
 *  3.Full Width Footer Widget Area
 *  4.Half Width Footer Widget Area
 *  5.OneThird Width Footer Widget Area
 */
function persia_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Sidebar Widget Area', 'persia' ),
		'id'            => 'sidebar',
		'description'   =>__('Widgets Area on Right Hand','persia'),
		'before_widget' => '<aside id="%1$s" class="side-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title" >',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Full Width Footer Widget Area', 'persia' ),
		'id'            => 'footer-fullwidth',
		'description'   => __( 'Shows Widgets in Full Footer Area', 'persia' ),
		'before_widget' => '<aside id="%1$s" class="footer-widget full-width %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="footer-widget-title" >',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Half Width Footer Widget Area', 'persia' ),
		'id'            => 'footer-halfwidth',
		'description'   => __( 'Shows Widgets in Half Footer Area', 'persia' ),
		'before_widget' => '<aside id="%1$s" class="footer-widget half-width %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="footer-widget-title" >',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'OneThird Width Footer Widget Area', 'persia' ),
		'id'            => 'footer-onethirdwidth',
		'description'   => __( 'Shows Widgets in OneThird Footer Area', 'persia' ),
		'before_widget' => '<li><aside id="%1$s" class="footer-widget onethird-width %2$s">',
		'after_widget'  => '</aside></li>',
		'before_title'  => '<h3 class="footer-widget-title" >',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'persia_widgets_init' );



/* Enqueue scripts and styles */

function persia_functions_js(){
 
	wp_enqueue_style('font-awesome', get_template_directory_uri().'/fonts/font-awesome/css/font-awesome.css');
	wp_enqueue_style('persia-style', get_stylesheet_uri(), array(), '20140322' );
	if ( is_rtl() ) {
		wp_enqueue_style( 'ResponsiveMultiLevelMenucss', get_template_directory_uri() .'/js/ResponsiveMultiLevelMenu/css/component-rtl.css');
	   } else {
		wp_enqueue_style( 'ResponsiveMultiLevelMenucss', get_template_directory_uri() .'/js/ResponsiveMultiLevelMenu/css/component.css');
	}
 
	wp_enqueue_style( 'persia-ie', get_template_directory_uri() . '/css/ie.css', array( 'persia-style' ), '20140322' );
	wp_style_add_data( 'persia-ie', 'conditional', 'lt IE 9' );
	
	wp_enqueue_script('persia-modernizr',get_template_directory_uri().'/js/ResponsiveMultiLevelMenu/js/modernizr.custom.js',array());
	
	if ( is_single() && comments_open() && ( 1 == get_option('thread_comments') )) {
		wp_enqueue_script( 'comment-reply' );
	}
 
	wp_enqueue_script('jquery-fitvids',get_template_directory_uri().'/js/FitVids/jquery.fitvids.min.js',array('jquery'),null,true);
	wp_enqueue_script('ResponsiveMultiLevelMenu',get_template_directory_uri().'/js/ResponsiveMultiLevelMenu/js/jquery.dlmenu.min.js',array('jquery'),null,true);
	wp_enqueue_script('persia-functions',get_template_directory_uri().'/js/functions.min.js',array('jquery'),null,true);
}
 
add_action('wp_enqueue_scripts','persia_functions_js');
//-------------- body class -------------------------------------------
 
add_filter('body_class','persia_sidebar_class');
 
function persia_sidebar_class($classes){
	if (is_active_sidebar('sidebar') && !is_page()) :
		$classes[] = 'withsidebar';
	endif;
	return $classes;
}

/*--------------Post Format---------------------------------------------*/
function persia_post_format(){

global $post, $wp_query ;
$post_id = get_the_ID();
	
			$current_post_format = get_post_format($post_id);
			$current_post_icon='';
			$current_format_name='';
			
			switch ($current_post_format) {
			
				case 'audio' :
					$current_post_icon = 'fa fa-music';
					$current_format_name=__('Audio','persia');
					break;
				case 'gallery' :
					$current_post_icon = 'fa fa-th-large';
					$current_format_name=__('Gallery','persia');
					break;
				case 'video' :
					$current_post_icon = 'fa fa-play';
					$current_format_name=__('Video','persia');
					break;
				case 'image' :
					$current_post_icon = 'fa fa-picture-o';
					$current_format_name=__('Image','persia');
					break;
				case 'status' :
					$current_post_icon = 'fa fa-tasks';
					$current_format_name=__('Status','persia');
					break;
				case 'link' :
					$current_post_icon = 'fa fa-chain';
					$current_format_name=__('Link','persia');
					break;
				case 'quote' :
					$current_post_icon = 'fa fa-quote-left';
					$current_format_name=__('Quote','persia');
					break;
				case 'chat' :
					$current_post_icon = 'fa fa-comments-o';
					$current_format_name=__('Chat','persia');
					break;
				case 'aside' :
				$current_post_icon = 'fa fa-pencil';
				$current_format_name=__('Aside','persia');
					break;
				default:
					$current_post_icon = '';
					$current_format_name='';
					break;
			} 
				
			$post_format_link = '<ul class="article-marks"><li><i class="'.$current_post_icon.'"></i></li></ul>';
				
				echo $post_format_link;
}

//-------------- excerpt more -------------------------------------------
function persia_excerpt_more( $more ) {
	       global $post;
		   $more_text=__('... Read the full article','persia');
	return '<a class="more-link" href="'. get_permalink($post->ID) . '">'.$more_text.'</a>';
}
add_filter('excerpt_more', 'persia_excerpt_more');
//------ post thumbnail -------------------
function persia_post_thumbnail(){
global $post,$wp_query;
if ( has_post_thumbnail() && ! post_password_required()){
	if(!is_single() || (is_single() && esc_attr(get_theme_mod('persia_f_img_show_single')) == 'yes')){ ?>
				<div class="post-thumbnail">
					<?php the_post_thumbnail('post-thumbnail'); ?>
				</div>
	<?php }
	}
}


//-------------- paginatioin -------------------------------------------
function persia_pagination(){
	global $wp_query;

			$big = 999999999; 
			echo paginate_links( array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'current' => max( 1, get_query_var('paged') ),
				'total' => $wp_query->max_num_pages,
				'prev_text'    => __('<i class="fa fa-chevron-left"></i>','persia'),
				'next_text'    => __('<i class="fa fa-chevron-right"></i>','persia')
			) );
}
//-----------------------------------------
function persia_tag_cloud_sizes($args) {
$args['smallest'] =8;
$args['largest'] = 14;
return $args; }
add_filter('widget_tag_cloud_args','persia_tag_cloud_sizes');

//-----------------------------------------
function persia_get_link_url() {
	$content = get_the_content();
	$has_url = get_url_in_content( $content );

	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}

//persia custom header
function persia_custom_header_setup() {
		$args = array(
		'default-text-color'     => 'D84237',
		'default-image'          => '',
		'random-default'         => false,
		'height'                 => 240,
		'width'                  => 1600,
		'flex-height'            => true,
	    'flex-width'             => true,
		'header-text'            => true,
		'uploads'                => true,
		'wp-head-callback'       => 'persia_custom_header',
		'admin-head-callback'    => 'persia_admin_header_style',
		'admin-preview-callback' => ''
		);
	
	add_theme_support( 'custom-header', $args );
	
}
add_action( 'after_setup_theme', 'persia_custom_header_setup' );

function persia_custom_header() {
	$header_image = get_header_image();
	$text_color   = get_header_textcolor();
	$output_style='<style type="text/css" id="persia-header-css">';
if ( ! empty( $header_image ) ) {
		$output_style .='
		.banner{
			background: url('.get_header_image().') no-repeat scroll top;
			background-size: 1600px auto;
		}';
}
if ( ! display_header_text() ) {
	$output_style .='
		.site-title-container{
			display:none;
		}';
		}
if ( $text_color != get_theme_support( 'custom-header', 'default-text-color' ) ) {
		$output_style .='
		#site-title{
			color: #'.esc_attr( $text_color ).';
		}';
}
$output_style .= '</style>';
echo $output_style;
}

function persia_admin_header_style() {
?>
	<style type="text/css" id="twentytwelve-admin-header-css">
	.appearance_page_custom-header #headimg {
		border: none;
		font-family: "Open Sans", Helvetica, Arial, sans-serif;
		margin : auto;
	}
	#headimg h1,
	#headimg h2 {
		line-height: 1.84615;
		margin: 0;
		padding: 0;
	}
	#headimg h1 {
		font-size : 40px;
		font-weight : 600;
		text-decoration : none;
	}
	#headimg h1 a {
		color: #515151;
		text-decoration: none;
	}
	#headimg h1 a:hover {
		color: #21759b !important; /* Has to override custom inline style. */
	}
	#headimg h2 {
		color: #757575;
		font-size : smaller;
		margin-bottom: 24px;
	}
	#headimg img {
		max-width: <?php echo get_theme_support( 'custom-header', 'max-width' ); ?>px;
	}
	</style>
<?php
}
/* persia custom background */
function persia_custom_background_setup(){
	global $wp_version;
	$args = array(
			'default-color'          => '',
			'default-image'          => '',
			'wp-head-callback'       => 'persia_custom_background',
			'admin-head-callback'    => '',
			'admin-preview-callback' => ''
			);
	
	add_theme_support( 'custom-background',$args ); 

}
add_action( 'after_setup_theme', 'persia_custom_background_setup' );

function persia_custom_background(){

			$background = set_url_scheme( get_background_image() );
	        $color = esc_attr(get_theme_mod( 'background_color' ));
	
	        if ( ! $background && ! $color )
	                return;
	
	        $style = $color ? "background-color: #$color;" : '';
	
	        if ( $background ) {
	                $image = " background-image: url('$background');";
	
	                $repeat = esc_attr(get_theme_mod( 'background_repeat', 'repeat' ));
	                if ( ! in_array( $repeat, array( 'no-repeat', 'repeat-x', 'repeat-y', 'repeat' ) ) )
	                        $repeat = 'repeat';
	                $repeat = " background-repeat: $repeat;";
	                $position = esc_attr(get_theme_mod( 'background_position_x', 'left' ));
	                if ( ! in_array( $position, array( 'center', 'right', 'left' ) ) )
	                        $position = 'left';
	                $position = " background-position: top $position;";
	
	                $attachment = esc_attr(get_theme_mod( 'background_attachment', 'scroll' ));
	                if ( ! in_array( $attachment, array( 'fixed', 'scroll' ) ) )
	                        $attachment = 'scroll';
	                $attachment = " background-attachment: $attachment;";
	
	                $style .= $image . $repeat . $position . $attachment;
	        }	
	
	echo '<style type="text/css" id="persia-background-css">
	div.content{'.trim( $style ).'}
	</style>';
	
}
//end

//-----------------------------------------------------------
$google_fonts = array(
							''		=> __('Default','persia'),
							'ABeeZee'		=> 'ABeeZee',
							'Abel'		=> 'Abel',
							'Abril+Fatface'		=> 'Abril Fatface',
							'Acme'		=> 'Acme',
							'Allan'		=> 'Allan',
							'Allerta+Stencil'		=> 'Allerta Stencil',
							'Allura'		=> 'Allura',
							'Amarante'		=> 'Amarante',
							'Anaheim'		=> 'Anaheim',
							'Andika'		=> 'Andika',
							'Arbutus'		=> 'Arbutus',
							'Atomic+Age'		=> 'Atomic Age',
							'Audiowide'		=> 'Audiowide',
							'Autour'		=> 'Autour',
							'Average'		=> 'Average',
							'Averia'		=> 'Averia',
							'Bad+Script'		=> 'Bad Script',
							'Basic'		=> 'Basic',
							'Berkshire Swash'		=> 'Berkshire Swash',
							'Black+Ops+One'		=> 'Black Ops One',
							'Boogaloo'		=> 'Boogaloo',
							'Bowlby+One'		=> 'Bowlby One',
							'Bree+Serif'		=> 'Bree Serif',
							'Cagliostro'		=> 'Cagliostro',
							'Cambo'		=> 'Cambo',
							'Capriola'		=> 'Capriola',
							'Changa'		=> 'Changa',
							'Chango'		=> 'Chango',
							'Chau+Philomene'		=> 'Chau Philomene',
							'Chelsea+Market'		=> 'Chelsea Market',
							'Comfortaa'		=> 'Comfortaa',
							'Convergence'		=> 'Convergence',
							'Courgette'		=> 'Courgette',
							'Cuprum'		=> 'Cuprum',
							'Delius+Swash+Caps'		=> 'Delius Swash Caps',
							'Electrolize'		=> 'Electrolize',
							'Exo'		=> 'Exo',
							'Fascinate'		=> 'Fascinate',
							'Fugaz'		=> 'Fugaz',
							'Gabriela'		=> 'Gabriela',
							'Glegoo'		=> 'Glegoo',
							'Henny+Penny'		=> 'Henny Penny',
							'Inder'		=> 'Inder',
							'Kavoon'		=> 'Kavoon',
							'Kaushan+Script'		=> 'Kaushan Script',
							'Kite'		=> 'Kite',
							'Lemon'		=> 'Lemon',
							'Lily'		=> 'Lily',
							'Limelight'		=> 'Limelight',
							'Marko+One'		=> 'Marko One',
							'Merienda'		=> 'Merienda',
							'Open+Sans'		=> 'Open Sans',
							'Source'		=> 'Source',
							'Share+Tech'    => 'Share Tech',
							'Tauri'		=> 'Tauri',
							'Viga'		=> 'Viga'
						);
		$menu_colors = array(
							'red'		=> __('Red','persia'),
							'blue'		=> __('Blue','persia'),
							'green'		=> __('Green','persia'),
							'orange'		=> __('Orange','persia'),
							'violet'		=> __('Violet','persia'),
							'pink'		=> __('Pink','persia'),
							'dark-blue'		=> __('Dark Blue','persia'),
							'grey'		=> __('Grey','persia')
						);				
	
		$font_list = $google_fonts;
	
						
function persia_font_sanitize( $input ) {
   global $font_list;
        
    if ( array_key_exists( $input, $font_list ) ) {
        return $input;
    } else {
        return '';
    }
}
function persia_color_sanitize( $input ) {
   global $menu_colors;
        
    if ( array_key_exists( $input, $menu_colors ) ) {
        return $input;
    } else {
        return '';
    }
}
function persia_bool_sanitize( $input ) {
   $persia_customize_bool = array(
									'yes' => 'Yes',
									'no' => 'No',
									'1',
									'2',
									'3',
									'4',
									'5'
								);
        
    if ( array_key_exists( $input, $persia_customize_bool ) ) {
        return $input;
    } else {
        return '';
    }
}

function persia_register_theme_customizer( $wp_customize ) {

global $font_list, $menu_colors;
	
//-------------------------
	$wp_customize->add_section(
		'persia_font_options',
		array(
			'title'     => __('Fonts','persia'),
			'priority'  => 200
		)
	);

	// Headers Font
	$wp_customize->add_setting(
		'persia_headers_font',
		array(
			'default'    =>  '',
			'sanitize_callback' => 'persia_font_sanitize'
			
		)
	);

	$wp_customize->add_control(
		'persia_headers_font',
		array(
			'section'   => 'persia_font_options',
			'label'     => __('Headers Font','persia'),
			'type'       => 'select',
            'choices'    => $font_list
		)
	);
	
	//Body Font
	$wp_customize->add_setting(
		'persia_body_font',
		array(
			'default'    =>  '',
			'sanitize_callback' => 'persia_font_sanitize'
			
		)
	);

	$wp_customize->add_control(
		'persia_body_font',
		array(
			'section'   => 'persia_font_options',
			'label'     => __('Body Font','persia'),
			'type'       => 'select',
            'choices'    => $font_list
		)
	);
	
	
	//post thumbnail
		$wp_customize->add_section(
		'persia_f_img_options',
		array(
			'title'     => __('Featured Image','persia'),
			'priority'  => 200
		)
	);
		
			
		$wp_customize->add_setting(
		'persia_f_img_show_single',
		array(
			'default'    =>  'yes',
			'sanitize_callback' => 'persia_bool_sanitize'
						
			)
		);
		$wp_customize->add_control( 'persia_f_img_show_single', array(
            'label'      => __( 'show featured image on single pages? ','persia' ),
            'section'    => 'persia_f_img_options',
            'type'       => 'radio',
            'choices'    => array(
                'yes'     => __('Yes','persia'),
				'no'  => __('No','persia')
                
                
            ),
        ) );
		
		/*------------ Menu-------------*/
		$wp_customize->add_section(
		'persia_menu_options',
		array(
			'title'     => __('Menu','persia'),
			'priority'  => 200
		)
		);
		
		//Menu Color	
		$wp_customize->add_setting(
		'persia_menu_color',
		array(
			'default'    =>  'violet',
			'sanitize_callback' => 'persia_color_sanitize'
						
			)
		);
		$wp_customize->add_control( 'persia_menu_color', array(
            'label'      => __( 'Choose the Menu Color? ','persia' ),
            'section'    => 'persia_menu_options',
            'type'       => 'radio',
            'choices'    => $menu_colors
                
                
            )
        ) ;
		//Menu Effect	
		$wp_customize->add_setting(
		'persia_menu_effect',
		array(
			'default'    =>  '1',
			'sanitize_callback' => 'persia_bool_sanitize'
									
			)
		);
		$wp_customize->add_control( 'persia_menu_effect', array(
            'label'      => __( 'Choose Responsive Menu Effect? ','persia' ),
            'section'    => 'persia_menu_options',
            'type'       => 'radio',
            'choices'    => array(
						'1' => '1',
						'2' => '2',
						'3' => '3',
						'4' => '4',
						'5' => '5'
				
			)
                
                
            )
        ) ;
			
		
} 
add_action( 'customize_register', 'persia_register_theme_customizer' );

function persia_customizer_css() {
	
	$final_fonts='';
	$fonts=array();
	
	$headers_font = esc_attr(get_theme_mod( 'persia_headers_font' ));
	$headers_font = trim(ucwords(str_replace ( '+',' ', $headers_font )));
	$body_font = esc_attr(get_theme_mod( 'persia_body_font' ));
	$body_font = trim(ucwords(str_replace ( '+',' ', $body_font )));

			
		if( $headers_font) :
			$fonts[]=$headers_font;
		endif;
		
		if( $body_font):
			$fonts[]=$body_font;
		endif;
		
		if($fonts):
			$final_fonts=implode('|',$fonts);
		endif;
			
		if($final_fonts): ?>
			
			
				<link href='http://fonts.googleapis.com/css?family=<?php echo $final_fonts;?>' rel='stylesheet' type='text/css'>
						
			<style id="fonts-style" rel='stylesheet' type="text/css">
				<?php if($body_font): ?>
					body {font-family : <?php echo $body_font; ?>,'<?php echo $body_font; ?>' }
				<?php endif; ?>
				
				<?php if($headers_font): ?>
					h1,h2,h3,h4,h5,h6 { font-family: <?php echo $headers_font; ?>,'<?php echo $headers_font; ?>'; }
				<?php else:
						if(!is_rtl()): ?>
							h1,h2,h3,h4,h5,h6 { font-family: "Open Sans", Helvetica, Arial, sans-serif; }
						<?php else: ?>
							h1,h2,h3,h4,h5,h6 { font-family: Tahoma, Helvetica, Arial, sans-serif; }
						<?php endif; ?>
				<?php endif; ?>
				
			</style>
	     
		 <?php endif; 
	 
}
add_action( 'wp_head', 'persia_customizer_css' );

 
?>