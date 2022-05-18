<?php if(have_posts()): while(have_posts()): the_post();?>

<div class="p-menu__list">
  <div class="p-menu__img">
      <?php the_post_thumbnail(); ?>
  </div>
  <div class="p-menu__text">
    <h2 class="p-menu__title">
      <?php the_title(); ?>
    </h2>
    <h3>小見出しが入ります</h3>
    <p>
      <?php the_excerpt(); ?>
    </p>
    <button class="c-detailsBtn p-menu__button">
      <a href="<?php the_permalink(); ?>">詳しく見る</a> 
    </button>
  </div>
</div>
<?php endwhile; endif; ?>