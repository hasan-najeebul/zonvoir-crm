//$('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
//            if (!$(this).next().hasClass('show')) {
//                $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
//            }
//            var $subMenu = $(this).next(".dropdown-menu");
//            $subMenu.toggleClass('show');
//
//            $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
//                $('.dropdown-submenu .show').removeClass("show");
//            });
//
//            return false;
//        });



function format(item, state) {
  if (!item.id) {
    return item.text;
  }
  var countryUrl = "https://hatscripts.github.io/circle-flags/flags/";
  var stateUrl = "https://oxguy3.github.io/flags/svg/us/";
  var url = state ? stateUrl : countryUrl;
  var img = $("<img>", {
    class: "img-flag",
    width: 26,
    src: url + item.element.value.toLowerCase() + ".svg"
  });
  var span = $("<span>", {
    text: " " + item.text
  });
  span.prepend(img);
  return span;
}

$(document).ready(function () {
  $("#countries").select2({
    templateResult: function (item) {
      return format(item, false);
    }
  });
  $("#us-states").select2({
    templateResult: function (item) {
      return format(item, true);
    }
  });
});




