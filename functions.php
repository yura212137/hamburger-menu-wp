<?php 
function custom_theme_support(){
  add_theme_support('html5',array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
  ));
  //テーマサポート
  register_nav_menus() ;
  add_theme_support("title-tag");
  add_theme_support( 'post-thumbnails' ); 
  add_theme_support( 'automatic-feed-links' );
  register_nav_menus(array(
    'footer_nav' => esc_html__('footer navigation','rtbread'),
    'category_nav' => esc_html__('category navigation','rtbread'),
  ));
}
add_action('after_setup_theme','custom_theme_support');


//タイトル出力
function hamburgermenuwp_title($title){
  if(is_front_page() && is_home()){
    $title = get_bloginfo("name","disply");
  }elseif (is_singular()){
    $title = get_bloginfo("",false);
  }
  return $title;
}
add_filter("pre_get_document_title","hamburgermenuwp_title");

// function hamburgermenuwp_script(){
//   //reset.css destyle
//   // wp_enqueue_style("style",get_template_directory_uri()."/asset/css/destyle.css",array(), '3.0.2' );
//   wp_enqueue_style("style",get_template_directory_uri()."/asset/css/style.min.css",array(), '1.0.0');
//   wp_enqueue_style("style",get_template_directory_uri()."/style.css",array(), '1.0.0');
// }
// add_action("wp_enqueue_scripts","hamburgermenuwp_script");


function readScript(){
  $my_theme = wp_get_theme();
  $theme_version = $my_theme->get( 'Version' );
  wp_enqueue_style("destyle",get_theme_file_uri("/asset/css/destyle.css"),array(), $theme_version );
  wp_enqueue_style("Robot",'//fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap',array(), '' );
  wp_enqueue_style("mplus",'//fonts.googleapis.com/css2?family=M+PLUS+1:wght@400;700&display=swap',array(), '' );
  // wp_enqueue_style("rtbread",get_theme_file_uri('style.css'),array(), $theme_version );
  wp_enqueue_style("rtbread",get_theme_file_uri('/asset/css/style.min.css'),array(), $theme_version );
  wp_enqueue_script("fontawesome",'//kit.fontawesome.com/48595fcda8.js',array(), '',false ); //false -> headerでの読み込み?
  wp_deregister_script('jquery');
  wp_enqueue_script("jquery",'//code.jquery.com/jquery-3.6.0.min.js','', '',true ); //true -> footerでの読み込み
  wp_enqueue_script("bundle",get_theme_file_uri('/asset/js/bundle.js'),'jquery', $theme_version,true ); //jquery -> 依存関係を示す 
}
add_action('wp_enqueue_scripts','readScript');

function cpt_register_notices(){
  $labels = [
    "singular_name" => "notices",
    "edit_item" => "notices",
  ];
  $args = [
    "label" =>"お知らせ",
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "map_meta_cap" => true,
    "hierarchical" => true,
    "rewrite" => ["slug" => "notices","with_front" => true],
    "query_var" => true,
    "menu_position" => 5,
    "supports" => ["title","editer","thumbnail",'post-formats','custom-fields','excerpt' ],
  ];
  register_post_type("notices",$args);
}
add_action('init','cpt_register_notices');

function cpt_register_dep(){
  $labels = [
    "singular_name" => "dep",
  ];
  $args = [
    "label" =>"カテゴリー",
    "labels" => $labels,
    "public_queryable" => true,
    "hierarchical" => true,
    "show_in_menu" => true,
    "query_var" => true,
    "rewrite" => ["slug" => "dep","with_front" => true],
    "show_admin_column" => false,
    "show_in_rest" => true,
    "rest_base" => "dep",
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "show_in_quick_edit" => false,
  ];
  register_taxonomy("dep",["notices"], $args);
}
add_action('init','cpt_register_dep');

//投稿データのみを検索
function my_pre_get_posts($query) {
  if ( !is_admin() && $query->is_main_query() && $query->is_search() ) {
    $query->set( 'post_type', array('post') );
  }
}
add_action( 'pre_get_posts','my_pre_get_posts' );

//検索されたタイトルをカスタマイズ
function wp_search_title($search_title){
  if(is_search()){
    $search_title = get_search_query();
  }
  return $search_title;
}
add_filter('wp_title','wp_search_title');