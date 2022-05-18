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

document.querySelectorAll("input").forEach((element) => {
  element.autocomplete = "off";
});

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

function closeNotice(e) {
  e.target.parentElement.parentElement.style.display = "none";
  const url = window.location.href.toString();
  if (url.includes("?") === true) {
    window.location.href = url.split("?")[0];
  } else if (url.includes("#") === true) {
    window.location.href = url.split("#")[0];
  } else {
    window.location.href = url;
  }
}
function suggestionBox(inputId, parentId, liveQuery) {
  document.querySelector(`${inputId}`).addEventListener("focus", (e) => {
    e.target.parentElement.children[2].children[0].classList.add("show");
  });

  document.querySelector(`${inputId}`).addEventListener("keyup", (e) => {
    var keyword = document.querySelector(`${inputId}`).value.toLowerCase();
    const liEl = [].slice.call(
      e.target.parentElement.children[2].children[0].children
    );

    liEl.forEach((element) => {
      if (
        element.children[0].textContent.toLowerCase().includes(`${keyword}`) ===
        false
      ) {
        element.style.display = "none";
      } else {
        element.style.display = "block";
      }
    });
    isSearchEmpty = [];
    for (i = 0; i < liEl.length; i++) {
      if (liEl[i].style.display == "none") {
        isSearchEmpty[i] = "none";
      } else {
        isSearchEmpty[i] = "block";
      }
    }
    if (isSearchEmpty.includes("block") === false) {
      e.target.parentElement.children[2].children[1].style.display = "block";
    } else {
      e.target.parentElement.children[2].children[1].style.display = "none";
    }
  });

  document.querySelectorAll(`${parentId} .suggest-value`).forEach((element) => {
    element.parentElement.addEventListener("click", (e) => {
      document.querySelector(`${inputId}`).value = e.target.children[1].value;
      if (typeof liveQuery !== "undefined") {
        liveQuery();
      }
    });
  });

  document.addEventListener("click", (e) => {
    const suggestionBox = document.querySelector(`${inputId}`).parentElement
      .children[2].children[0];
    if (document.querySelector(`${inputId}`).contains(e.target) === false) {
      suggestionBox.classList.remove("show");
    }
  });
}
