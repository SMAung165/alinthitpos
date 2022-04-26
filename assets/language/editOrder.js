function setLang() {
  if (localLanguage == "mm") {
    document.getElementById("editOrder").textContent = language.mm.manage_order;
    document.getElementById("orderNumber").textContent =
      language.mm.order_number;
    document.getElementById("deviceName").textContent = language.mm.device_name;
    document.getElementById("brand").textContent = language.mm.brand;
    document.getElementById("color").textContent = language.mm.color_variant;
    document.getElementById("customerName").textContent =
      language.mm.customer_name;
    document.getElementById("customer").textContent = language.mm.customer;
    document.getElementById("address").textContent = language.mm.address;
    document.getElementById("quantity").textContent = language.mm.quantity;
    document.getElementById("totalCost").textContent = language.mm.total_price;
    document.getElementById("overallStatus").textContent = language.mm.status;
    document.getElementById("paymentStatus").textContent =
      language.mm.payment_status;
    if (document.querySelector(".hasChild").childElementCount !== 0) {
      document.getElementById("submit").textContent = language.mm.submit;
    }
  } else {
    document.getElementById("editOrder").textContent = language.en.manage_order;
    document.getElementById("orderNumber").textContent =
      language.en.order_number;
    document.getElementById("deviceName").textContent = language.en.device_name;
    document.getElementById("brand").textContent = language.en.brand;
    document.getElementById("color").textContent = language.en.color_variant;
    document.getElementById("customerName").textContent =
      language.en.customer_name;
    document.getElementById("customer").textContent = language.en.customer;
    document.getElementById("address").textContent = language.en.address;
    document.getElementById("quantity").textContent = language.en.quantity;
    document.getElementById("totalCost").textContent = language.en.total_price;
    document.getElementById("overallStatus").textContent = language.en.status;
    document.getElementById("paymentStatus").textContent =
      language.en.payment_status;
    if (document.querySelector(".hasChild").childElementCount !== 0) {
      document.getElementById("submit").textContent = language.en.submit;
    }
  }
}
