function setLang() {
  if (localLanguage == "mm") {
    document.querySelector("#model").textContent = language.mm.model_number;
    document.querySelector("#brand").textContent = language.mm.brand;
    document.querySelector("#price").textContent = language.mm.price_determined;
    document.querySelector(".currency").textContent = language.mm.mmk;
    document.querySelector("#color").textContent = language.mm.color_variant;
    document.querySelector("#moreDeviceDetails").textContent =
      language.mm.more_device_details;
    document.querySelector("#customerInfo").textContent =
      language.mm.customer_info;
    document.querySelector("#customerName").textContent =
      language.mm.customer_name;
    document.querySelector("#address").textContent = language.mm.address;
    document.querySelector("#email").textContent = language.mm.email;
    document.querySelector("#phoneNumber").textContent =
      language.mm.phone_number;
    document.querySelector("#orderInfo").textContent = language.mm.order_info;
    document.querySelector("#orderNumber").textContent =
      language.mm.order_number;
    document.querySelector("#orderDate").textContent = language.mm.order_date;
    document.querySelector("#quantity").textContent = language.mm.quantity;
    document.querySelector("#totalCost").textContent = language.mm.total_price;
    document.querySelector("#overallStatus").textContent = language.mm.status;
    document.querySelector("#paymentStatus").textContent =
      language.mm.payment_status;
  } else {
    document.querySelector("#model").textContent = language.en.model_number;
    document.querySelector("#brand").textContent = language.en.brand;
    document.querySelector("#price").textContent = language.en.price_determined;
    document.querySelector(".currency").textContent = language.en.enk;
    document.querySelector("#color").textContent = language.en.color_variant;
    document.querySelector("#moreDeviceDetails").textContent =
      language.en.more_device_details;
    document.querySelector("#customerInfo").textContent =
      language.en.customer_info;
    document.querySelector("#customerName").textContent =
      language.en.customer_name;
    document.querySelector("#address").textContent = language.en.address;
    document.querySelector("#email").textContent = language.en.email;
    document.querySelector("#phoneNumber").textContent =
      language.en.phone_number;
    document.querySelector("#orderInfo").textContent = language.en.order_info;
    document.querySelector("#orderNumber").textContent =
      language.en.order_number;
    document.querySelector("#orderDate").textContent = language.en.order_date;
    document.querySelector("#quantity").textContent = language.en.quantity;
    document.querySelector("#totalCost").textContent = language.en.total_price;
    document.querySelector("#overallStatus").textContent = language.en.status;
    document.querySelector("#paymentStatus").textContent =
      language.en.payment_status;
  }
}
