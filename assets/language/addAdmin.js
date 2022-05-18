function setLang() {
  if (localLanguage == "mm") {
    document.querySelector(".addAdmin").textContent = mm.add_admin;
    document.getElementById("username").textContent = mm.username;
    document.getElementById("firstname").textContent = mm.first_name;
    document.getElementById("lastname").textContent = mm.last_name;
    document.getElementById("email").textContent = mm.email;
    document.getElementById("confirmPassword").textContent =
      mm.confirm_password;
    document.getElementById("adminRole").textContent = mm.admin_role;
    document.getElementById("accountStatus").textContent = mm.account_status;
    document.getElementById("submit").textContent = mm.submit;
  } else {
    document.querySelector(".addAdmin").textContent = en.add_admin;
    document.getElementById("username").textContent = en.username;
    document.getElementById("firstname").textContent = en.first_name;
    document.getElementById("lastname").textContent = en.last_name;
    document.getElementById("email").textContent = en.email;
    document.getElementById("confirmPassword").textContent =
      en.confirm_password;
    document.getElementById("adminRole").textContent = en.admin_role;
    document.getElementById("accountStatus").textContent = en.account_status;
    document.getElementById("submit").textContent = en.submit;
  }
}
