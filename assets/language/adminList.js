function setLang() {
  if (localLanguage == "mm") {
    document.querySelector(".adminList").textContent = mm.admin_list;
    for (i = 0; i < document.querySelectorAll(".admin").length; i++) {
      document.querySelectorAll(".admin")[i].textContent = mm.admin;
      document.querySelectorAll(".username")[i].textContent = mm.username;
      document.querySelectorAll(".firstname")[i].textContent = mm.first_name;
      document.querySelectorAll(".lastname")[i].textContent = mm.last_name;
      document.querySelectorAll(".email")[i].textContent = mm.email;
      document.querySelectorAll(".role")[i].textContent = mm.admin_role;
      document.querySelectorAll(".accountStatus")[i].textContent =
        mm.account_status;
    }
  } else {
    document.querySelector(".adminList").textContent = en.admin_list;
    for (i = 0; i < document.querySelectorAll(".admin").length; i++) {
      document.querySelectorAll(".admin")[i].textContent = en.admin;
      document.querySelectorAll(".username")[i].textContent = en.username;
      document.querySelectorAll(".firstname")[i].textContent = en.first_name;
      document.querySelectorAll(".lastname")[i].textContent = en.last_name;
      document.querySelectorAll(".email")[i].textContent = en.email;
      document.querySelectorAll(".role")[i].textContent = en.admin_role;
      document.querySelectorAll(".accountStatus")[i].textContent =
        en.account_status;
    }
  }
}
