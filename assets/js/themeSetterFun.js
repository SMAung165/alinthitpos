if (localStorage.getItem("theme") == null) {
  localStorage.setItem("theme", "light");
}

var head = document.getElementsByTagName("HEAD")[0];
var link = document.createElement("link");

link.rel = "stylesheet";
link.type = "text/css";
link.href = "assets/css/darkMode.css";
link.id = "theme";

function setTheme() {
  if (localStorage.getItem("theme") == "dark") {
    // head.insertBefore(link, head.children[6]);
    head.appendChild(link);
  }
}
setTheme();
