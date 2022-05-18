function setLang() {
  if (localLanguage == "mm") {
    document.querySelector("#model").textContent = mm.model_number;
    document.querySelector("#brand").textContent = mm.brand;
    document.querySelector("#price").textContent = mm.price_determined;
    document.querySelector(".currency").textContent = mm.mmk;
    document.querySelector("#color").textContent = mm.color_variant;
    document.querySelector("#moreDeviceDetails").textContent =
      mm.more_device_details;
    document.querySelector("#customerInfo").textContent = mm.customer_info;
    document.querySelector("#customerName").textContent = mm.customer_name;
    document.querySelector("#address").textContent = mm.address;
    document.querySelector("#email").textContent = mm.email;
    document.querySelector("#phoneNumber").textContent = mm.phone_number;
    document.querySelector("#orderInfo").textContent = mm.order_info;
    document.querySelector("#orderNumber").textContent = mm.order_number;
    document.querySelector("#orderDate").textContent = mm.order_date;
    document.querySelector("#quantity").textContent = mm.quantity;
    document.querySelector("#totalCost").textContent = mm.total_price;
    document.querySelector("#overallStatus").textContent = mm.status;
    document.querySelector("#paymentStatus").textContent = mm.payment_status;
  } else {
    document.querySelector("#model").textContent = en.model_number;
    document.querySelector("#brand").textContent = en.brand;
    document.querySelector("#price").textContent = en.price_determined;
    document.querySelector(".currency").textContent = en.enk;
    document.querySelector("#color").textContent = en.color_variant;
    document.querySelector("#moreDeviceDetails").textContent =
      en.more_device_details;
    document.querySelector("#customerInfo").textContent = en.customer_info;
    document.querySelector("#customerName").textContent = en.customer_name;
    document.querySelector("#address").textContent = en.address;
    document.querySelector("#email").textContent = en.email;
    document.querySelector("#phoneNumber").textContent = en.phone_number;
    document.querySelector("#orderInfo").textContent = en.order_info;
    document.querySelector("#orderNumber").textContent = en.order_number;
    document.querySelector("#orderDate").textContent = en.order_date;
    document.querySelector("#quantity").textContent = en.quantity;
    document.querySelector("#totalCost").textContent = en.total_price;
    document.querySelector("#overallStatus").textContent = en.status;
    document.querySelector("#paymentStatus").textContent = en.payment_status;
  }
}
