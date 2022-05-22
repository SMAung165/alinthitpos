function setBtn() {
  var themeBtn = document.querySelector(".theme-btn");
  if (localStorage.getItem("theme") == "dark") {
    themeBtn.innerHTML =
      "<i class='fa-regular fa-sun' style='margin-right:5px;'></i><span>Light Mode</span>";
  } else {
    themeBtn.innerHTML =
      "<i class='fa-regular fa-moon' style='margin-right:5px;'></i><span>Dark Mode</span>";
  }
}
setBtn();

var metaTheme = document.querySelector("#themeColor");

function modeSwitch() {
  if (localStorage.getItem("theme") == "dark") {
    localStorage.setItem("theme", "light");
    setTimeout(() => {
      head.removeChild(document.getElementById("theme"));
      metaTheme.setAttribute("content", "#fff");
      setBtn();
    }, 0);
  } else {
    localStorage.setItem("theme", "dark");
    setTimeout(() => {
      setTheme();
      setBtn();
    }, 0);
  }
}
