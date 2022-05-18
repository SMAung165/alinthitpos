function setLang() {
  if (localLanguage == "mm") {
    document.getElementById("addCustomer").textContent = mm.add_customer;
    document.getElementById("firstname").textContent = mm.first_name;
    document.getElementById("lastname").textContent = mm.last_name;
    document.getElementById("email").textContent = mm.email;
    document.getElementById("phoneNumber").textContent = mm.phone_number;
    document.getElementById("address").textContent = mm.address;
    document.getElementById("orderNumber").textContent = mm.order_number;
    document.getElementById("deviceId").textContent = mm.device_id;
    document.getElementById("quantity").textContent = mm.quantity;
    for (i = 0; i < document.querySelectorAll(".submit").length; i++) {
      document.getElementsByClassName("customer")[i].textContent = mm.customer;
      document.getElementsByClassName("submit")[i].textContent = mm.submit;
    }
  } else {
    document.getElementById("addCustomer").textContent = en.add_customer;
    document.getElementById("firstname").textContent = en.first_name;
    document.getElementById("lastname").textContent = en.last_name;
    document.getElementById("email").textContent = en.email;
    document.getElementById("phoneNumber").textContent = en.phone_number;
    document.getElementById("address").textContent = en.address;
    document.getElementById("orderNumber").textContent = en.order_number;
    document.getElementById("deviceId").textContent = en.device_id;
    document.getElementById("quantity").textContent = en.quantity;
    for (i = 0; i < document.querySelectorAll(".submit").length; i++) {
      document.getElementsByClassName("customer")[i].textContent = en.customer;
      document.getElementsByClassName("submit")[i].textContent = en.submit;
    }
  }
}
