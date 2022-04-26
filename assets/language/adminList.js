function setLang() {
  if (localLanguage == "mm") {
    document.querySelector(".adminList").textContent = language.mm.admin_list;
    for (i = 0; i < document.querySelectorAll(".admin").length; i++) {
      document.querySelectorAll(".admin")[i].textContent = language.mm.admin;
      document.querySelectorAll(".username")[i].textContent =
        language.mm.username;
      document.querySelectorAll(".firstname")[i].textContent =
        language.mm.first_name;
      document.querySelectorAll(".lastname")[i].textContent =
        language.mm.last_name;
      document.querySelectorAll(".email")[i].textContent = language.mm.email;
      document.querySelectorAll(".role")[i].textContent =
        language.mm.admin_role;
      document.querySelectorAll(".accountStatus")[i].textContent =
        language.mm.account_status;
    }
  } else {
    document.querySelector(".adminList").textContent = language.en.admin_list;
    for (i = 0; i < document.querySelectorAll(".admin").length; i++) {
      document.querySelectorAll(".admin")[i].textContent = language.en.admin;
      document.querySelectorAll(".username")[i].textContent =
        language.en.username;
      document.querySelectorAll(".firstname")[i].textContent =
        language.en.first_name;
      document.querySelectorAll(".lastname")[i].textContent =
        language.en.last_name;
      document.querySelectorAll(".email")[i].textContent = language.en.email;
      document.querySelectorAll(".role")[i].textContent =
        language.en.admin_role;
      document.querySelectorAll(".accountStatus")[i].textContent =
        language.en.account_status;
    }
  }
}
