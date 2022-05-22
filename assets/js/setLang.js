if (localStorage.getItem("language") == null) {
  localStorage.setItem("language", "en");
}

let localLanguage = localStorage.getItem("language");

function setLangAttri() {
  if (localLanguage == "en") {
    document.documentElement.setAttribute("lang", "en");
  } else if (localLanguage == "mm") {
    document.documentElement.setAttribute("lang", "mm");
  }
}
function changeLanguage(lang) {
  localStorage.setItem("language", lang);
  localLanguage = localStorage.getItem("language");
  window.setTimeout(setLang, 0);
  window.setTimeout(setLangSidebarAndIndicator, 0);
  window.setTimeout(setLangAttri, 0);
  if (
    document.querySelector("body").querySelector(".fixed-notification") !=
      null ||
    document.querySelector("body").querySelector(".confirm-form-container") !=
      null ||
    window.location.toString().includes("#warning") ||
    window.location.toString().includes("#reSuccess")
  ) {
    window.setTimeout(setLangForNoti, 0);
  }
}

setLang();

//Only if sidebar exist
if (document.querySelector("body").querySelector(".sidebar") != null) {
  setLangSidebarAndIndicator();
}

//Only if these classes exist
if (
  document.querySelector("body").querySelector(".fixed-notification") != null ||
  document.querySelector("body").querySelector(".confirm-form-container") !=
    null
) {
  setLangForNoti();
}
