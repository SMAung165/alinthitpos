function setLang() {
  if (localLanguage == "mm") {
    document.querySelector(".manageOrders").textContent = mm.manage_order;
    for (i = 0; i < document.querySelectorAll(".orderNumber").length; i++) {
      document.querySelectorAll(".customerName")[i].textContent =
        mm.customer_name;
      document.querySelectorAll(".orderNumber")[i].textContent =
        mm.order_number;
      document.querySelectorAll(".deviceName")[i].textContent = mm.device_name;
      document.querySelectorAll(".price")[i].textContent = mm.price_per_one;
      document.querySelectorAll(".quantity")[i].textContent = mm.quantity;
      document.querySelectorAll(".totalPrice")[i].textContent = mm.total_price;
      document.querySelectorAll(".orderDate")[i].textContent = mm.order_date;
      document.querySelectorAll(".status")[i].textContent = mm.status;
      document.querySelectorAll(".paymentStatus")[i].textContent =
        mm.payment_status;
    }
  } else {
    document.querySelector(".manageOrders").textContent = en.manage_order;
    for (i = 0; i < document.querySelectorAll(".orderNumber").length; i++) {
      document.querySelectorAll(".customerName")[i].textContent =
        en.customer_name;
      document.querySelectorAll(".orderNumber")[i].textContent =
        en.order_number;
      document.querySelectorAll(".deviceName")[i].textContent = en.device_name;
      document.querySelectorAll(".price")[i].textContent = en.price_per_one;
      document.querySelectorAll(".quantity")[i].textContent = en.quantity;
      document.querySelectorAll(".totalPrice")[i].textContent = en.total_price;
      document.querySelectorAll(".orderDate")[i].textContent = en.order_date;
      document.querySelectorAll(".status")[i].textContent = en.status;
      document.querySelectorAll(".paymentStatus")[i].textContent =
        en.payment_status;
    }
  }
}
