<?php 

namespace GSEN;

class Theme
{
  /**
   * Class Constructor
   * @param void 
   * @return void
   */
  public function __construct()
  {
    $this->register_actions();
  }

  /**
   * Register Actions Hooks
   * @param void
   * @return void
   */
  public function register_actions()
  {
    add_action( 'after_setup_theme', [$this, 'gsen_setup'] );
    add_action( 'after_setup_theme', [$this, 'gsen_content_width'], 0 );
    add_action( 'wp_enqueue_scripts', [$this, 'gsen_styles'], 10 );
    add_action( 'wp_enqueue_scripts', [$this, 'gsen_scripts'], 10 );
    add_action( 'pre_get_posts', [$this, 'change_post_query'] );
    add_action( 'widgets_init', [$this, 'gsen_widgets_init'] );
    add_action('phpmailer_init', [$this, 'mailtrap']);
    add_action('upload_mimes', [$this, 'cc_mime_types']);
  }

  /**
   * Register Filters Hooks
  */
  public function register_filters()
  {
    //add filters to change the defualt length
    add_filter('excerpt_length', [$this, 'custom_excerpt_length']);
  }

  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   */
  public function gsen_setup()
  {
  /*
    * Make theme available for translation.
    * Translations can be filed in the /languages/ directory.
    * If you're building a theme based on gsen, use a find and replace
    * to change 'gsen' to the name of your theme in all the template files.
  */
  load_theme_textdomain( 'gsen', get_template_directory() . '/languages' );

  // Add default posts and comments RSS feed links to head.
  add_theme_support( 'automatic-feed-links' );

  /*
    * Let WordPress manage the document title.
    * By adding theme support, we declare that this theme does not use a
    * hard-coded <title> tag in the document head, and expect WordPress to
    * provide it for us.
  */
  add_theme_support( 'title-tag' );

  /*
    * Enable support for Post Thumbnails on posts and pages.
    *
    * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
  */
  add_theme_support( 'post-thumbnails' );

  // This theme uses wp_nav_menu() in one location.
  register_nav_menus( 
    array(
    'menu-1' => esc_html__( 'Primary', 'gsen' ),
    'menu-2' => esc_html__('Footer', 'gsen')
    ) 
  );

  /*
    * Switch default core markup for search form, comment form, and comments
    * to output valid HTML5.
  */
  add_theme_support( 'html5', 
    array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
    )
  );

  // Set up the WordPress core custom background feature.
  add_theme_support( 'custom-background', 
    apply_filters( 'gsen_custom_background_args', array(
      'default-color' => 'ffffff',
      'default-image' => '',
    ) )
  );

  // Add theme support for selective refresh for widgets.
  add_theme_support('customize-selective-refresh-widgets' );

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support( 'custom-logo', array(
      'height'      => 250,
      'width'       => 250,
      'flex-width'  => true,
      'flex-height' => true,
    ) );
  }

  /**
   * Set the content width in pixels, based on the theme's design and stylesheet.
   *
   * Priority 0 to make it available to lower priority callbacks.
   *
   * @global int $content_width
   */

  public function gsen_content_width()
  {
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters( 'gsen_content_width', 640 );
  }

  /**
   * Enqueue scripts and styles.
   */
  public function gsen_styles() {
    wp_enqueue_style( 'font-awesome-style', 'https://use.fontawesome.com/releases/v5.7.1/css/all.css', array(),'1.0.0' );

    wp_enqueue_style( 'custom-style', get_template_directory_uri().'/assests/dist/css/main.css', array(),'1.0.0' );
  }

  /**
   * Enqueue sctpts
   */
  public function gsen_scripts() {
    wp_enqueue_script( 'gsen-script', get_template_directory_uri() . '/assests/dist/js/main.js', array(), '1.0.0', true );

    wp_localize_script(
      'gsen-script', 
      'form_info', 
      [
        'form_url' => admin_url('admin-ajax.php')
      ]
    );
  }

  /**
   * Register widget area.
   *
   * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
   */
  public function gsen_widgets_init()
  {
    register_sidebar( array(
      'name'          => esc_html__( 'Sidebar', 'gsen' ),
      'id'            => 'sidebar-1',
      'description'   => esc_html__( 'Add widgets here.', 'gsen' ),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
      'name'          => esc_html__( 'Footer', 'gsen' ),
      'id'            => 'footer',
      'description'   => esc_html__( 'Add widgets here.', 'gsen' ),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
      'name'          => esc_html__( 'SecondFooter', 'gsen' ),
      'id'            => 'SecondFooter',
      'description'   => esc_html__( 'Add widgets here.', 'gsen' ),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
      'name'          => esc_html__( 'thirdFooter', 'gsen' ),
      'id'            => 'thirdFooter',
      'description'   => esc_html__( 'Add widgets here.', 'gsen' ),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
      'name'          => esc_html__( 'fourthFooter', 'gsen' ),
      'id'            => 'fourthFooter',
      'description'   => esc_html__( 'Add widgets here.', 'gsen' ),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>',
    ) );
  }

  /**
  * Customize WordPress excerpt
  */
  public function custom_excerpt_length()
  {
    return 30;
  }

  public function mailtrap($phpmailer)
  {
    $phpmailer->isSMTP();
    $phpmailer->Host = 'smtp.mailtrap.io';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 2525;
    $phpmailer->Username = '9343afc2943060';
    $phpmailer->Password = 'f1c84bcf2ab7c7';
  }

  /**
   * Change the main query for the post type
   */
  public function change_post_query($query) {
    if(!is_admin() && $query->is_main_query()) {
      $cPage = get_query_var('paged');

      $query->set('category_name', 'news');
      //$query->set('paged', $cPage);
    }
  }

  //Allows SVG uploads
  public function cc_mime_types($mimes)
  {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
  }

}