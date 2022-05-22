<?php get_header() ;?>
        <!-- main -->
        <main>
          <!-- .p-fv -->
          <section class="p-fv">
            <h1 class="p-fv__title">
              ダミーサイト
            </h1>
          </section>
          <!-- .p-fv -->
          <!-- .p-model -->
          <section class="p-model">
            <div class="p-model__takeout">
              <h2 class="p-model__title c-title--takeout">
                Take Out
              </h2>
              <div class="p-model__content">
                
                <div class="p-model__description">
                  <?php
                    $args = array(
                      'post_type' => 'notices',
                      'posts_per_page' => 2,
                      'order' => 'DESC',
                      'tax_query' => array(
                      array(
                        'taxonomy' => 'dep', /* カスタムタクソノミー名が「area_category」 */
                        'field' => 'slug',
                        'terms' => 'takeout'
                      )
                      )
                    );
                  $the_query = new WP_Query( $args );
                  if ( $the_query->have_posts() ): ?>
                  <ul>
                  <?php while ( $the_query->have_posts() ): $the_query->the_post(); ?>
                    <li>
                        <h3><?php echo CFS()->get('to_title'); ?></h3>
                        <p><?php echo CFS()->get('to_text'); ?></p>
                    </li>
                  <?php endwhile; ?>
                  </ul>
                  <?php endif; wp_reset_postdata(); ?>
                </div>
                <!-- <div class="p-model__description">
                  <h3>Take OUT</h3>
                  <p>当店のテイクアウトで利用できる商品を掲載しています当店のテイクアウト
                    で利用できる商品を掲載しています当店のd
                  </p>
                  
                </div> -->
              </div>
            </div>
            <div class="p-model__eatin">
              <h2 class="p-model__title c-title">
                Eat In
              </h2>
              <div class="p-model__content">
                <div class="p-model__description">
                <?php
                    $args = array(
                      'post_type' => 'notices',
                      'posts_per_page' => 2,
                      'order' => 'DESC',
                      'tax_query' => array(
                      array(
                        'taxonomy' => 'dep', /* カスタムタクソノミー名が「area_category」 */
                        'field' => 'slug',
                        'terms' => 'eatin'
                      )
                      )
                    );
                  $the_query = new WP_Query( $args );
                  if ( $the_query->have_posts() ): ?>
                  <ul>
                  <?php while ( $the_query->have_posts() ): $the_query->the_post(); ?>
                    <li>
                        <h3><?php echo CFS()->get('ei_title'); ?></h3>
                        <p><?php echo CFS()->get('ei_text'); ?></p>
                    </li>
                  <?php endwhile; ?>
                  </ul>
                  <?php endif; wp_reset_postdata(); ?>
                </div>
                <!-- <div class="p-model__description">
                  <h3>Eat In</h3>
                  <p>店内でお食事いただけるメニューです店内でお食事いただけるメニューです<br>
                    店内でお食事いただけるメニューです店内でお食事いただけるメニューです<br>
                    店内でお食事いただけるメニューです店内でお食事いただけるメニューです<br>
                    店内でお食事いただけるメニューです店内でお食事いただけるメニューです</p>
                </div> -->
              </div>
            </div>
          </section>
          <!-- .p-model -->

          <!-- .p-access -->
          <section class="p-access">
          <?php
                    $args = array(
                      'post_type' => 'notices',
                      'posts_per_page' => 1,
                      'order' => 'DESC',
                      'tax_query' => array(
                      array(
                        'taxonomy' => 'dep', /* カスタムタクソノミー名が「area_category」 */
                        'field' => 'slug',
                        'terms' => 'access'
                      )
                      )
                    );
                  $the_query = new WP_Query( $args );
                  if ( $the_query->have_posts() ): ?>
                  <?php while ( $the_query->have_posts() ): $the_query->the_post(); ?>
            <div class="p-access__map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3276.6090881930263!2d135.5451339!3d34.7906151!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6000e314dd01218b%3A0xb5894753ced79c3c!2z44CSNTY1LTA4MTYg5aSn6Ziq5bqc5ZC555Sw5biC6ZW36YeO5p2x77yU4oiS77yR77yUIOWNg-mHjOS4mA!5e0!3m2!1sja!2sjp!4v1652968530614!5m2!1sja!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
              <div class="p-access__content">
                <div class="p-access__description">
                  <h2 class="p-access__title c-title--access">
                  <?php echo CFS() -> get('m_title'); ?>
                  </h2>
                  <p class="p-access__text">
                  <?php echo CFS() -> get('m_text'); ?>
                  </p>
                </div>
            </div>
            <?php endwhile; ?><?php endif; wp_reset_postdata(); ?>
          </section>
          <!-- .p-access -->  
        </main>
      </div>
      <!-- main -->
<?php get_sidebar() ;?>
<?php get_footer() ;?>