function setLang() {
  if (localLanguage == "mm") {
    document.querySelector(".alinthit").textContent = mm.alinthit;
    document.querySelector(".admin-login").textContent = mm.admin_login;
    document.querySelector(".username").textContent = mm.username;
    document.querySelector(".forgotten-password").textContent =
      mm.forgotten_password;
    document.querySelector(".submit").textContent = mm.submit;
  } else {
    document.querySelector(".alinthit").textContent = en.alinthit;
    document.querySelector(".admin-login").textContent = en.admin_login;
    document.querySelector(".username").textContent = en.username;
    document.querySelector(".forgotten-password").textContent =
      en.forgotten_password;
    document.querySelector(".submit").textContent = en.submit;
  }
}
