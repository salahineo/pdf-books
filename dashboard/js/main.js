$(function () {
  $("#menu-toggle").click(function (e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
  });
  $(".confirm").click(function () {
    return confirm("هل أنت متأكد ؟");
  });
});
