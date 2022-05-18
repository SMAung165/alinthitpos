function setLang() {
  if (localLanguage == "mm") {
    document.getElementById("editOrder").textContent = mm.manage_order;
    document.getElementById("orderNumber").textContent = mm.order_number;
    document.getElementById("deviceName").textContent = mm.device_name;
    document.getElementById("brand").textContent = mm.brand;
    document.getElementById("color").textContent = mm.color_variant;
    document.getElementById("customerName").textContent = mm.customer_name;
    document.getElementById("customer").textContent = mm.customer;
    document.getElementById("address").textContent = mm.address;
    document.getElementById("quantity").textContent = mm.quantity;
    document.getElementById("totalCost").textContent = mm.total_price;
    document.getElementById("overallStatus").textContent = mm.status;
    document.getElementById("paymentStatus").textContent = mm.payment_status;
    if (document.querySelector(".hasChild").childElementCount !== 0) {
      document.getElementById("submit").textContent = mm.submit;
    }
  } else {
    document.getElementById("editOrder").textContent = en.manage_order;
    document.getElementById("orderNumber").textContent = en.order_number;
    document.getElementById("deviceName").textContent = en.device_name;
    document.getElementById("brand").textContent = en.brand;
    document.getElementById("color").textContent = en.color_variant;
    document.getElementById("customerName").textContent = en.customer_name;
    document.getElementById("customer").textContent = en.customer;
    document.getElementById("address").textContent = en.address;
    document.getElementById("quantity").textContent = en.quantity;
    document.getElementById("totalCost").textContent = en.total_price;
    document.getElementById("overallStatus").textContent = en.status;
    document.getElementById("paymentStatus").textContent = en.payment_status;
    if (document.querySelector(".hasChild").childElementCount !== 0) {
      document.getElementById("submit").textContent = en.submit;
    }
  }
}
