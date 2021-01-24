$(document).ready(function () {
  var itemCount = 10;
  $("#load_more").click(function () {
    itemCount = itemCount + 10;
    $("#items").load("itemLoader.php", {
      itemCounter: itemCount,
    });
  });
});
