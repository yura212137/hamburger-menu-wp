<?php get_header() ;?>
        <!-- main -->
        <main>
          <!-- .p-searchTop -->
          <section class="p-searchTop">
            <div class="p-searchTop__img"></div>
            <div class="p-searchTop__title">
              <h1>Search:</h1>
              <p>
                <?php 
                  wp_title();
                ?>
              </p>
            </div>
          </section>
          <section class="p-searchTop__text">
            <div class="c-inner">
              <!-- <h2>小見出しが入ります</h2> -->
              <?php if (have_posts()): ?>
              <p>         
                <?php
                  if (isset($_GET['s']) && empty($_GET['s'])) {
                    echo '検索キーワード未入力'; // 検索キーワードが未入力の場合のテキストを指定
                  } else {
                    echo '“'.$_GET['s'] .'”の検索結果：'.$wp_query->found_posts .'件'; // 検索キーワードと該当件数を表示
                  }
                ?>
                <?php else: ?>
                検索されたキーワードにマッチする記事はありませんでした
                <?php endif; ?>
              </p>
            </div>
          </section>

          <!-- .p-searchTop -->

          <!-- .p-menu -->
          <section class="p-menu">
            <div class="c-inner">
            <?php get_template_part('template'); ?>
              <!-- <div class="p-menu__list">
                <div class="p-menu__img"></div>
                <div class="p-menu__text">
                  <h2 class="p-menu__title">
                    チーズバーガー
                  </h2>
                  <h3>小見出しが入ります</h3>
                  <p>テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
                  <button class="c-detailsBtn p-menu__button">
                    詳しく見る
                  </button>
                </div>
              </div>
              <div class="p-menu__list">
                <div class="p-menu__img"></div>
                <div class="p-menu__text">
                  <h2 class="p-menu__title">
                    チーズバーガー
                  </h2>
                  <h3>小見出しが入ります</h3>
                  <p>テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
                  <button class="c-detailsBtn p-menu__button">
                    詳しく見る
                  </button>
                </div>
              </div>
              <div class="p-menu__list">
                <div class="p-menu__img"></div>
                <div class="p-menu__text">
                  <h2 class="p-menu__title">
                    チーズバーガー
                  </h2>
                  <h3>小見出しが入ります</h3>
                  <p>テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
                  <button class="c-detailsBtn p-menu__button">
                    詳しく見る
                  </button>
                </div>
              </div>
              <div class="p-menu__list">
                <div class="p-menu__img"></div>
                <div class="p-menu__text">
                  <h2 class="p-menu__title">
                    チーズバーガー
                  </h2>
                  <h3>小見出しが入ります</h3>
                  <p>テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
                  <button class="c-detailsBtn p-menu__button">
                    詳しく見る
                  </button>
                </div>
              </div>
              <div class="p-menu__list">
                <div class="p-menu__img"></div>
                <div class="p-menu__text">
                  <h2 class="p-menu__title">
                    チーズバーガー
                  </h2>
                  <h3>小見出しが入ります</h3>
                  <p>テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
                  <button class="c-detailsBtn p-menu__button">
                    詳しく見る
                  </button>
                </div>
              </div> -->
            </div>
          </section>
          <!-- .p-model -->

          <!-- .p-pege -->
          <div class="c-inner">
            <section class="p-page c-page">
            <?php wp_pagenavi(); ?>

              <!-- <div class="c-page__spPrev">
                <i class="fa-solid fa-angles-left fa-lg"></i>
                <a href="">前へ</a>
              </div>
              <div class="c-page__tbpc">
                <div class="c-page__currentpage">
                  page 1/10
                </div>
                <i class="fa-solid fa-angles-left fa-lg"></i>
                <div class="c-page__number">
                  <a href="">1</a>
                  <a href="">2</a>
                  <a href="">3</a>
                  <a href="">4</a>
                  <a href="">5</a>
                  <a href="">6</a>
                  <a href="">7</a>
                  <a href="">8</a>
                  <a href="">9</a>
                </div>
                <i class="fa-solid fa-angles-right fa-lg"></i>
              </div>
              <div class="c-page__spNext">
                <a href="">次へ</a>
                <i class="fa-solid fa-angles-right fa-lg"></i>
              </div> -->
            </section>
          </div>
          <!-- .p-page -->
        </main>
      </div>
      <?php get_sidebar() ;?>
<?php get_footer() ;?>