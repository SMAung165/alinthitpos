function setLang() {
  if (localLanguage == "mm") {
    document.querySelector(".manageOrders").textContent =
      language.mm.manage_order;
    for (i = 0; i < document.querySelectorAll(".orderNumber").length; i++) {
      document.querySelectorAll(".customerName")[i].textContent =
        language.mm.customer_name;
      document.querySelectorAll(".orderNumber")[i].textContent =
        language.mm.order_number;
      document.querySelectorAll(".deviceName")[i].textContent =
        language.mm.device_name;
      document.querySelectorAll(".price")[i].textContent =
        language.mm.price_per_one;
      document.querySelectorAll(".quantity")[i].textContent =
        language.mm.quantity;
      document.querySelectorAll(".totalPrice")[i].textContent =
        language.mm.total_price;
      document.querySelectorAll(".orderDate")[i].textContent =
        language.mm.order_date;
      document.querySelectorAll(".status")[i].textContent = language.mm.status;
      document.querySelectorAll(".paymentStatus")[i].textContent =
        language.mm.payment_status;
    }
  } else {
    document.querySelector(".manageOrders").textContent =
      language.en.manage_order;
    for (i = 0; i < document.querySelectorAll(".orderNumber").length; i++) {
      document.querySelectorAll(".customerName")[i].textContent =
        language.en.customer_name;
      document.querySelectorAll(".orderNumber")[i].textContent =
        language.en.order_number;
      document.querySelectorAll(".deviceName")[i].textContent =
        language.en.device_name;
      document.querySelectorAll(".price")[i].textContent =
        language.en.price_per_one;
      document.querySelectorAll(".quantity")[i].textContent =
        language.en.quantity;
      document.querySelectorAll(".totalPrice")[i].textContent =
        language.en.total_price;
      document.querySelectorAll(".orderDate")[i].textContent =
        language.en.order_date;
      document.querySelectorAll(".status")[i].textContent = language.en.status;
      document.querySelectorAll(".paymentStatus")[i].textContent =
        language.en.payment_status;
    }
  }
}
