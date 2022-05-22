<?php get_header() ;?>
        <!-- main -->
        <main>
          <!-- .p-archiveTop -->
          <section class="p-archiveTop">
            <div class="p-archiveTop__img"></div>
            <div class="p-archiveTop__title">
              <h1>Menu:</h1>
              <p>
                <?php
                    $category = get_the_category(); 
                    echo $category[2]->cat_name;
                ?>
              </p>
            </div>
          </section>
          <section class="p-archiveTop__text">
            <div class="c-inner">
              <!-- <h2>小見出しが入ります</h2> -->
              <p>
                <?php echo category_description(); ?>
              </p>
            </div>
          </section>
          <!-- .p-archiveTop -->

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
                    ダブルチーズバーガー
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
                    スペシャルチーズバーガー
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
      <!-- main -->
      <?php get_sidebar() ;?>
<?php get_footer() ;?>