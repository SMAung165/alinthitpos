function setLang() {
  if (localLanguage == "mm") {
    document.querySelector("#deviceId").textContent = mm.device_id;
    document.querySelector("#deviceWarehouseInfo").textContent =
      mm.device_warehouse_info;
    document.querySelector("#price").textContent = mm.price_determined;
    document.querySelector("#warehouseStock").textContent = mm.warehouse_stock;
    document.querySelector("#initialStock").textContent = mm.initial_stock;
    document.querySelector("#stockLeft").textContent = mm.current_assets;
    document.querySelector("#totalSold").textContent = mm.total_sold;
    document.querySelector("#dataEntry").textContent = mm.data_entry;
    document.querySelector("#dataEntryDate").textContent = mm.data_entry_date;
    document.querySelector("#dataEntryTime").textContent = mm.data_entry_time;
    document.querySelector("#deviceInfo").textContent = mm.device_details;
    document.querySelector("#specs").textContent = mm.specifications;
    document.querySelector("#appearance").textContent = mm.appearance;
    document.querySelector("#color").textContent = mm.color_variant;
    document.querySelector("#recentBuyers").textContent = mm.recent_buyers;
    document.querySelector("#customerName").textContent = mm.customer_name;
    document.querySelector("#date").textContent = mm.order_date;
    document.querySelector("#quantity").textContent = mm.quantity;
    document.querySelector("#totalPrice").textContent = mm.total_price;
    document.querySelector("#status").textContent = mm.payment_status;
    document.querySelector("#left").textContent = mm.left;
    document.querySelectorAll(".currency").forEach((element) => {
      element.textContent = mm.mmk;
    });
    document.querySelectorAll(".countSign").forEach((element) => {
      element.textContent = mm.pcs;
    });
  } else {
    document.querySelector("#deviceId").textContent = en.device_id;
    document.querySelector("#deviceWarehouseInfo").textContent =
      en.device_warehouse_info;
    document.querySelector("#price").textContent = en.price_determined;
    document.querySelector("#warehouseStock").textContent = en.warehouse_stock;
    document.querySelector("#initialStock").textContent = en.initial_stock;
    document.querySelector("#stockLeft").textContent = en.current_assets;
    document.querySelector("#totalSold").textContent = en.total_sold;
    document.querySelector("#dataEntry").textContent = en.data_entry;
    document.querySelector("#dataEntryDate").textContent = en.data_entry_date;
    document.querySelector("#dataEntryTime").textContent = en.data_entry_time;
    document.querySelector("#deviceInfo").textContent = en.device_details;
    document.querySelector("#specs").textContent = en.specifications;
    document.querySelector("#appearance").textContent = en.appearance;
    document.querySelector("#color").textContent = en.color_variant;
    document.querySelector("#recentBuyers").textContent = en.recent_buyers;
    document.querySelector("#customerName").textContent = en.customer_name;
    document.querySelector("#date").textContent = en.order_date;
    document.querySelector("#quantity").textContent = en.quantity;
    document.querySelector("#totalPrice").textContent = en.total_price;
    document.querySelector("#status").textContent = en.payment_status;
    document.querySelector("#left").textContent = en.left;
    document.querySelectorAll(".currency").forEach((element) => {
      element.textContent = en.mmk;
    });
    document.querySelectorAll(".countSign").forEach((element) => {
      element.textContent = en.pcs;
    });
  }
}
