<!DOCTYPE html>
<html lang="ja">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- サイトのタイトル -->
    <title>Hamburger</title>
    <!-- サイトの説明文 -->
    <meta name="description" content="ハンバーガーを売りにしたオシャレなカフェデモサイト">
    <!-- サイトのアイコン -->
    <link rel="shortcut icon" href="#" type="image/x-icon" />
    <!-- reset.css destyle -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/destyle.css@1.0.15/destyle.css" />
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1:wght@400;700&family=Roboto:wght@400;700&display=swap"
      rel="stylesheet">
    <link rel="stylesheet" href="<?php bloginfo("template_url"); ?>/asset/css/style.min.css">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/48595fcda8.js" crossorigin="anonymous"></script>
    <?php wp_head(); ?>
  </head>

  <body>
    <!-- .l-header -->
    <div class="l-main">
      <!-- hamburger button -->
      <input id="menu" type="checkbox">
      <label for="menu" class="c-button open">Menu</label>
      <label for="menu" class="back"></label>
      <!-- hamburger button -->
      <div class="l-main__headermain">
        <header class="l-header">

          <div class="l-header__title">
            Hamburger
          </div>

          <form class="l-header__searchform c-searchform" action="#" method="get">
            <input class="c-searchform__input" type="text" name="search" placeholder="&#xf002">
            <input class="c-searchform__button" type="submit" name="submit" value="検索">
          </form>


        </header>
        <!-- .l-header -->