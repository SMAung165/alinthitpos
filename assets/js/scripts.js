(function ($) {
  "use strict";

  $(function () {
    for (
      var nk = window.location,
        o = $(".nano-content li a")
          .filter(function () {
            return this.href == nk;
          })
          .addClass("active")
          .parent()
          .addClass("active");
      ;

    ) {
      if (!o.is("li")) break;
      o = o.parent().addClass("d-block").parent().addClass("active");
    }
  });

  /* 
    ------------------------------------------------
    Sidebar open close animated humberger icon
    ------------------------------------------------*/

  $(".hamburger").on("click", function () {
    $(this).toggleClass("is-active");
  });

  /* TO DO LIST 
    --------------------*/
  $(".tdl-new").on("keypress", function (e) {
    var code = e.keyCode ? e.keyCode : e.which;
    if (code == 13) {
      var v = $(this).val();
      var s = v.replace(/ +?/g, "");
      if (s == "") {
        return false;
      } else {
        $(".tdl-content ul").append(
          "<li><label><input type='checkbox'><i></i><span>" +
            v +
            "</span><a href='#' class='ti-close'></a></label></li>"
        );
        $(this).val("");
      }
    }
  });

  $(".tdl-content a").on("click", function () {
    var _li = $(this).parent().parent("li");
    _li
      .addClass("remove")
      .stop()
      .delay(100)
      .slideUp("fast", function () {
        _li.remove();
      });
    return false;
  });

  // for dynamically created a tags
  $(".tdl-content").on("click", "a", function () {
    var _li = $(this).parent().parent("li");
    _li
      .addClass("remove")
      .stop()
      .delay(100)
      .slideUp("fast", function () {
        _li.remove();
      });
    return false;
  });
})(jQuery);

// My Script
const dropDownEls = document.getElementsByClassName("drop-down");
for (i = 0; i < dropDownEls.length; i++) {
  dropDownEls[i].parentElement.parentElement.addEventListener("click", (e) => {
    var currentDropdownEl = e.currentTarget.children[0].children[1];
    if (currentDropdownEl.classList.contains("showDropdown") === false) {
      currentDropdownEl.classList.add("showDropdown");
    } else {
      currentDropdownEl.classList.remove("showDropdown");
    }
  });
}

const getPageTitle = () => document.querySelector("title").innerHTML;
document.querySelector(".pageTitle").innerHTML = getPageTitle();
