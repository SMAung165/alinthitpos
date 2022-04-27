if (localStorage.getItem("theme") == null) {
  localStorage.setItem("theme", "light");
}

function setTheme() {
  if (localStorage.getItem("theme") == "dark") {
    var head = document.getElementsByTagName("HEAD")[0];
    var link = document.createElement("link");

    link.rel = "stylesheet";
    link.type = "text/css";
    link.href = "assets/css/darkMode.css";
    link.id = "theme";

    head.appendChild(link);
    document.querySelector(".theme-btn").innerHTML =
      "<i class='fa-regular fa-sun' style='margin-right:5px;'></i><span>Light Mode</span>";
  } else {
    document.querySelector(".theme-btn").innerHTML =
      "<i class='fa-regular fa-moon' style='margin-right:5px;'></i><span>Dark Mode</span>";
  }
}

function modeSwitch() {
  if (localStorage.getItem("theme") == "dark") {
    localStorage.setItem("theme", "light");
    setTimeout(() => {
      setTheme();
      var head = document.getElementsByTagName("HEAD")[0];
      head.removeChild(document.getElementById("theme"));
    }, 0);
  } else {
    localStorage.setItem("theme", "dark");
    setTimeout(setTheme, 0);
  }
  // document.querySelector(".mode-switch").children[0].submit();
}

setTheme();
