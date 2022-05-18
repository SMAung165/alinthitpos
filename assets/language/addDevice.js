function setLang() {
  if (localLanguage == "mm") {
    for (i = 0; i < document.querySelectorAll(".addDevices").length; i++) {
      document.querySelectorAll(".addDevices")[i].textContent = mm.add_devices;
    }
    document.getElementById("deviceName").textContent = mm.device_name;
    document.getElementById("brand").textContent = mm.brand;
    document.getElementById("modelNumber").textContent = mm.model_number;
    document.getElementById("colorVariant").textContent = mm.color_variant;
    document.getElementById("specs").textContent = mm.specifications;
    document.getElementById("expense").textContent = mm.expense;
    document.getElementById("priceDetermined").textContent =
      mm.price_determined;
    document.getElementById("initialStock").textContent = mm.initial_stock;
    document.getElementById("stockLeft").textContent = mm.current_assets;
    document.getElementById("totalSold").textContent = mm.total_sold;
  } else {
    for (i = 0; i < document.querySelectorAll(".addDevices").length; i++) {
      document.querySelectorAll(".addDevices")[i].textContent = en.add_devices;
    }
    document.getElementById("deviceName").textContent = en.device_name;
    document.getElementById("brand").textContent = en.brand;
    document.getElementById("modelNumber").textContent = en.model_number;
    document.getElementById("colorVariant").textContent = en.color_variant;
    document.getElementById("specs").textContent = en.specifications;
    document.getElementById("expense").textContent = en.expense;
    document.getElementById("priceDetermined").textContent =
      en.price_determined;
    document.getElementById("initialStock").textContent = en.initial_stock;
    document.getElementById("stockLeft").textContent = en.current_assets;
    document.getElementById("totalSold").textContent = en.total_sold;
  }
}
