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
}

setLang();
setLangSidebarAndIndicator();
