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
  add_theme_support("menus");
  add_theme_support("titile-tag");
  add_theme_support( 'post-thumbnails' ); 
  register_nav_menus(array(
    'footer_nav' => esc_html__('footer navigation','rtbread'),
    'category_nav' => esc_html__('category navigation','rtbread'),
  ));
}
add_action('after_setup_theme','custom_theme_support');


//タイトル出力
function hamburgermenuwp_titile($title){
  if(is_front_page() && is_home()){
    $title = get_bloginfo("name","disply");
  }elseif (is_singular()){
    $title = get_bloginfo("",false);
  }
  return $title;
}
add_filter("pre_get_document_title","hamburger-menu-wp_titile");

// function hamburgermenuwp_script(){
//   //reset.css destyle
//   // wp_enqueue_style("style",get_template_directory_uri()."/asset/css/destyle.css",array(), '3.0.2' );
//   wp_enqueue_style("style",get_template_directory_uri()."/asset/css/style.min.css",array(), '1.0.0');
//   wp_enqueue_style("style",get_template_directory_uri()."/style.css",array(), '1.0.0');
// }
// add_action("wp_enqueue_scripts","hamburgermenuwp_script");


function readScript(){
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


/**
 * サイト内検索の範囲に、カテゴリー名、タグ名、を含める
 */
function custom_search($search, $wp_query) {
  global $wpdb;
   
  //サーチページ以外だったら終了
  if (!$wp_query->is_search)
   return $search;
  
  if (!isset($wp_query->query_vars))
   return $search;
   
  // タグ名・カテゴリ名も検索対象に
  $search_words = explode(' ', isset($wp_query->query_vars['s']) ? $wp_query->query_vars['s'] : '');
   if ( count($search_words) > 0 ) {
     $search = '';
     foreach ( $search_words as $word ) {
       if ( !empty($word) ) {
         $search_word = $wpdb->escape("%{$word}%");
         $search .= " AND (
             {$wpdb->posts}.post_title LIKE '{$search_word}'
             OR {$wpdb->posts}.post_content LIKE '{$search_word}'
             OR {$wpdb->posts}.ID IN (
               SELECT distinct r.object_id
               FROM {$wpdb->term_relationships} AS r
               INNER JOIN {$wpdb->term_taxonomy} AS tt ON r.term_taxonomy_id = tt.term_taxonomy_id
               INNER JOIN {$wpdb->terms} AS t ON tt.term_id = t.term_id
               WHERE t.name LIKE '{$search_word}'
             OR t.slug LIKE '{$search_word}'
             OR tt.description LIKE '{$search_word}'
             )
         ) ";
       }
     }
   }
   
   return $search;
   }
   add_filter('posts_search','custom_search', 10, 2);

   //pre_get_posts で 検索結果のクエリーに条件を追加
function change_posts_paging($query) {

  // 管理画面やメインクエリーでない場合は除外
   if ( is_admin() || ! $query->is_main_query() ) {
     return;
   }
   // 検索結果ページ
   if ( $query->is_search() ) {
      // 公開されてる記事のみ検索
      $query->set( 'post_status', 'publish' );
      // 投稿のみ検索
      $query->set( 'post_type', 'post' );
      // 表示したくないカテゴリーID
      // $query->set( 'category__not_in', 1 );
      //　表示したくない投稿ID。arrayで複数指定可。
      // $query->set( 'post__not_in', array( 1, 2, 3, 4, 5 ) );
      //　検索結果の表示順
      $query->set( 'order', 'DESC' );
      //　検索結果の表示数
      $query->set( 'posts_per_page', 5 );
     return;
    }
   }
   add_action( 'pre_get_posts', 'change_posts_paging' );
  
  //投稿タイプを追加する場合は、array 型で記述します。
  //カスタムポストタイプ（ex. music ）を含む場合もここに追加します。
  //$query->set( 'post_type', array( 'post', 'page', 'music' ) );

  function wp_search_title($search_title){
    if(is_search()){
      $search_title = get_search_query();
    }
    return $search_title;
  }
  add_filter('wp_title','wp_search_title');