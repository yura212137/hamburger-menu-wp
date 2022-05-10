    <!-- l-footer -->
    <footer class="l-footer">
      <div class="l-footer__link">
      <a href="" class="l-footer__shop">
        ショップ情報
      </a>
      <span>|</span>
      <a href="" class="l-footer__history">
        ヒストリー
      </a>
    </div>
      <small>Copyright: RaiseTech</small>
    </footer>

    <!-- .l-footer -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
      $(function () {
        $(".c-button").on("click", function () {
          $("body").toggleClass("open");
          $(this).toggleClass("open");
          $(window).resize(function () {  //リサイズされたときの処理
            $(".open").removeClass("open");
            $('#menu').prop('checked', false);
          });
        });
        $(".close").on("click", function () {
          $("body").removeClass("open");
        });
        $(".back").on("click", function () {
          $("body").removeClass("open");
        });
      });
    </script>
    <!-- jQuery -->
    <?php wp_footer(); ?>
  </body>

</html>