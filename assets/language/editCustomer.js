function setLang() {
  if (localLanguage == "mm") {
    document.getElementById("editCustomer").textContent =
      language.mm.edit_customer;
    document.getElementById("firstname").textContent = language.mm.first_name;
    document.getElementById("lastname").textContent = language.mm.last_name;
    document.getElementById("email").textContent = language.mm.email;
    document.getElementById("phoneNumber").textContent =
      language.mm.phone_number;
    document.getElementById("address").textContent = language.mm.address;
    for (i = 0; i < document.querySelectorAll(".submit").length; i++) {
      document.getElementsByClassName("customer")[i].textContent =
        language.mm.customer;
      document.getElementsByClassName("submit")[i].textContent =
        language.mm.submit;
    }
  } else {
    document.getElementById("editCustomer").textContent =
      language.en.edit_customer;
    document.getElementById("firstname").textContent = language.en.first_name;
    document.getElementById("lastname").textContent = language.en.last_name;
    document.getElementById("email").textContent = language.en.email;
    document.getElementById("phoneNumber").textContent =
      language.en.phone_number;
    document.getElementById("address").textContent = language.en.address;
    for (i = 0; i < document.querySelectorAll(".submit").length; i++) {
      document.getElementsByClassName("customer")[i].textContent =
        language.en.customer;
      document.getElementsByClassName("submit")[i].textContent =
        language.en.submit;
    }
  }
}
