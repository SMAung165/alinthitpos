function setLang() {
  if (localLanguage == "mm") {
    document.querySelector(".customerList").textContent =
      language.mm.customer_list;
    for (i = 0; i < document.querySelectorAll(".customer").length; i++) {
      document.querySelectorAll(".customer")[i].textContent =
        language.mm.customer;
      document.querySelectorAll(".firstname")[i].textContent =
        language.mm.first_name;
      document.querySelectorAll(".lastname")[i].textContent =
        language.mm.last_name;
      document.querySelectorAll(".email")[i].textContent = language.mm.email;
      document.querySelectorAll(".address")[i].textContent =
        language.mm.address;
      document.querySelectorAll(".phoneNumber")[i].textContent =
        language.mm.phone_number;
    }
  } else {
    document.querySelector(".customerList").textContent =
      language.en.admin_list;
    for (i = 0; i < document.querySelectorAll(".customer").length; i++) {
      document.querySelectorAll(".customer")[i].textContent =
        language.en.customer;
      document.querySelectorAll(".firstname")[i].textContent =
        language.en.first_name;
      document.querySelectorAll(".lastname")[i].textContent =
        language.en.last_name;
      document.querySelectorAll(".email")[i].textContent = language.en.email;
      document.querySelectorAll(".address")[i].textContent =
        language.en.address;
      document.querySelectorAll(".phoneNumber")[i].textContent =
        language.en.phone_number;
    }
  }
}
