<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- サイトの説明文 -->
    <meta name="description" content="ハンバーガーを売りにしたオシャレなカフェデモサイト">

    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
    <!-- .l-header -->
    <div class="l-main">
      <!-- hamburger button -->
      <input id="menu" type="checkbox">
      <label for="menu" class="c-button open">Menu</label>
      <label for="menu" class="back"></label>
      <!-- hamburger button -->
      <div class="l-main__headermain">
        <header class="l-header">
          <a href="<?php echo esc_url(home_url("/")); ?>" class="l-header__title">
            <?php bloginfo("name");?>
          </a>
          <?php get_search_form(); ?>
        </header>
        <!-- .l-header -->