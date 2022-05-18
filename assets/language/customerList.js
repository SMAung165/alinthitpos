function setLang() {
  if (localLanguage == "mm") {
    document.querySelector(".customerList").textContent = mm.customer_list;
    for (i = 0; i < document.querySelectorAll(".customer").length; i++) {
      document.querySelectorAll(".customer")[i].textContent = mm.customer;
      document.querySelectorAll(".firstname")[i].textContent = mm.first_name;
      document.querySelectorAll(".lastname")[i].textContent = mm.last_name;
      document.querySelectorAll(".email")[i].textContent = mm.email;
      document.querySelectorAll(".address")[i].textContent = mm.address;
      document.querySelectorAll(".phoneNumber")[i].textContent =
        mm.phone_number;
    }
  } else {
    document.querySelector(".customerList").textContent = en.admin_list;
    for (i = 0; i < document.querySelectorAll(".customer").length; i++) {
      document.querySelectorAll(".customer")[i].textContent = en.customer;
      document.querySelectorAll(".firstname")[i].textContent = en.first_name;
      document.querySelectorAll(".lastname")[i].textContent = en.last_name;
      document.querySelectorAll(".email")[i].textContent = en.email;
      document.querySelectorAll(".address")[i].textContent = en.address;
      document.querySelectorAll(".phoneNumber")[i].textContent =
        en.phone_number;
    }
  }
}
