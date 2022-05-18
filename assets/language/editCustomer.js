function setLang() {
  if (localLanguage == "mm") {
    document.getElementById("editCustomer").textContent = mm.edit_customer;
    document.getElementById("firstname").textContent = mm.first_name;
    document.getElementById("lastname").textContent = mm.last_name;
    document.getElementById("email").textContent = mm.email;
    document.getElementById("phoneNumber").textContent = mm.phone_number;
    document.getElementById("address").textContent = mm.address;
    for (i = 0; i < document.querySelectorAll(".submit").length; i++) {
      document.getElementsByClassName("customer")[i].textContent = mm.customer;
      document.getElementsByClassName("submit")[i].textContent = mm.submit;
    }
  } else {
    document.getElementById("editCustomer").textContent = en.edit_customer;
    document.getElementById("firstname").textContent = en.first_name;
    document.getElementById("lastname").textContent = en.last_name;
    document.getElementById("email").textContent = en.email;
    document.getElementById("phoneNumber").textContent = en.phone_number;
    document.getElementById("address").textContent = en.address;
    for (i = 0; i < document.querySelectorAll(".submit").length; i++) {
      document.getElementsByClassName("customer")[i].textContent = en.customer;
      document.getElementsByClassName("submit")[i].textContent = en.submit;
    }
  }
}
