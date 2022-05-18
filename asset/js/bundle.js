

jQuery(document).ready(function () {
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







