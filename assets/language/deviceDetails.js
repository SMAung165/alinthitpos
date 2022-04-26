function setLang() {
  if (localLanguage == "mm") {
    document.querySelector("#deviceId").textContent = language.mm.device_id;
    document.querySelector("#deviceWarehouseInfo").textContent =
      language.mm.device_warehouse_info;
    document.querySelector("#price").textContent = language.mm.price_determined;
    document.querySelector("#warehouseStock").textContent =
      language.mm.warehouse_stock;
    document.querySelector("#initialStock").textContent =
      language.mm.initial_stock;
    document.querySelector("#stockLeft").textContent =
      language.mm.current_assets;
    document.querySelector("#totalSold").textContent = language.mm.total_sold;
    document.querySelector("#dataEntry").textContent = language.mm.data_entry;
    document.querySelector("#dataEntryDate").textContent =
      language.mm.data_entry_date;
    document.querySelector("#dataEntryTime").textContent =
      language.mm.data_entry_time;
    document.querySelector("#deviceInfo").textContent =
      language.mm.device_details;
    document.querySelector("#specs").textContent = language.mm.specifications;
    document.querySelector("#appearance").textContent = language.mm.appearance;
    document.querySelector("#color").textContent = language.mm.color_variant;
    document.querySelector("#recentBuyers").textContent =
      language.mm.recent_buyers;
    document.querySelector("#customerName").textContent =
      language.mm.customer_name;
    document.querySelector("#date").textContent = language.mm.order_date;
    document.querySelector("#quantity").textContent = language.mm.quantity;
    document.querySelector("#totalPrice").textContent = language.mm.total_price;
    document.querySelector("#status").textContent = language.mm.payment_status;
    document.querySelector("#left").textContent = language.mm.left;
    document.querySelectorAll(".currency").forEach((element) => {
      element.textContent = language.mm.mmk;
    });
    document.querySelectorAll(".countSign").forEach((element) => {
      element.textContent = language.mm.pcs;
    });
  } else {
    document.querySelector("#deviceId").textContent = language.en.device_id;
    document.querySelector("#deviceWarehouseInfo").textContent =
      language.en.device_warehouse_info;
    document.querySelector("#price").textContent = language.en.price_determined;
    document.querySelector("#warehouseStock").textContent =
      language.en.warehouse_stock;
    document.querySelector("#initialStock").textContent =
      language.en.initial_stock;
    document.querySelector("#stockLeft").textContent =
      language.en.current_assets;
    document.querySelector("#totalSold").textContent = language.en.total_sold;
    document.querySelector("#dataEntry").textContent = language.en.data_entry;
    document.querySelector("#dataEntryDate").textContent =
      language.en.data_entry_date;
    document.querySelector("#dataEntryTime").textContent =
      language.en.data_entry_time;
    document.querySelector("#deviceInfo").textContent =
      language.en.device_details;
    document.querySelector("#specs").textContent = language.en.specifications;
    document.querySelector("#appearance").textContent = language.en.appearance;
    document.querySelector("#color").textContent = language.en.color_variant;
    document.querySelector("#recentBuyers").textContent =
      language.en.recent_buyers;
    document.querySelector("#customerName").textContent =
      language.en.customer_name;
    document.querySelector("#date").textContent = language.en.order_date;
    document.querySelector("#quantity").textContent = language.en.quantity;
    document.querySelector("#totalPrice").textContent = language.en.total_price;
    document.querySelector("#status").textContent = language.en.payment_status;
    document.querySelector("#left").textContent = language.en.left;
    document.querySelectorAll(".currency").forEach((element) => {
      element.textContent = language.en.mmk;
    });
    document.querySelectorAll(".countSign").forEach((element) => {
      element.textContent = language.en.pcs;
    });
  }
}
