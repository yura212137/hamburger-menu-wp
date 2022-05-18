<form class="l-header__searchform c-searchform" action="<?php bloginfo('url'); ?>" method="get">
  <input class="c-searchform__input" type="text" name="s" id="s" placeholder="&#xf002" value="<?php if(is_search()){ echo get_search_query();} ?>">
  <input class="c-searchform__button" type="submit" name="submit" id="searchsubmit" value="検索">
</form>


