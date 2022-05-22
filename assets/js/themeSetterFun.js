if (localStorage.getItem("theme") == null) {
  localStorage.setItem("theme", "light");
}

var head = document.getElementsByTagName("HEAD")[0];
var meta = document.createElement("meta");
var link = document.createElement("link");

link.rel = "stylesheet";
link.type = "text/css";
link.href = "assets/css/darkMode.css";
link.id = "theme";

meta.name = "theme-color";
meta.content = "";
meta.id = "themeColor";

function setTheme() {
  if (localStorage.getItem("theme") == "dark") {
    meta.content = "#262626";
    head.insertBefore(meta, head.children[2]);
    // head.insertBefore(link, head.children[6]);
    head.appendChild(link);
  } else {
    meta.content = "#fff";
    head.insertBefore(meta, head.children[2]);
  }
}
setTheme();
