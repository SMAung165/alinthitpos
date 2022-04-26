function setLang() {
  if (localLanguage == "mm") {
    document.querySelector(".addAdmin").textContent = language.mm.add_admin;
    document.getElementById("username").textContent = language.mm.username;
    document.getElementById("firstname").textContent = language.mm.first_name;
    document.getElementById("lastname").textContent = language.mm.last_name;
    document.getElementById("email").textContent = language.mm.email;
    document.getElementById("confirmPassword").textContent =
      language.mm.confirm_password;
    document.getElementById("adminRole").textContent = language.mm.admin_role;
    document.getElementById("accountStatus").textContent =
      language.mm.account_status;
    document.getElementById("submit").textContent = language.mm.submit;
  } else {
    document.querySelector(".addAdmin").textContent = language.en.add_admin;
    document.getElementById("username").textContent = language.en.username;
    document.getElementById("firstname").textContent = language.en.first_name;
    document.getElementById("lastname").textContent = language.en.last_name;
    document.getElementById("email").textContent = language.en.email;
    document.getElementById("confirmPassword").textContent =
      language.en.confirm_password;
    document.getElementById("adminRole").textContent = language.en.admin_role;
    document.getElementById("accountStatus").textContent =
      language.en.account_status;
    document.getElementById("submit").textContent = language.en.submit;
  }
}
