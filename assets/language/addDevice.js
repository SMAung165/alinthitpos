function setLang() {
  if (localLanguage == "mm") {
    for (i = 0; i < document.querySelectorAll(".addDevices").length; i++) {
      document.querySelectorAll(".addDevices")[i].textContent =
        language.mm.add_devices;
    }
    document.getElementById("deviceName").textContent = language.mm.device_name;
    document.getElementById("brand").textContent = language.mm.brand;
    document.getElementById("modelNumber").textContent =
      language.mm.model_number;
    document.getElementById("colorVariant").textContent =
      language.mm.color_variant;
    document.getElementById("specs").textContent = language.mm.specifications;
    document.getElementById("expense").textContent = language.mm.expense;
    document.getElementById("priceDetermined").textContent =
      language.mm.price_determined;
    document.getElementById("initialStock").textContent =
      language.mm.initial_stock;
    document.getElementById("stockLeft").textContent =
      language.mm.current_assets;
    document.getElementById("totalSold").textContent = language.mm.total_sold;
  } else {
    for (i = 0; i < document.querySelectorAll(".addDevices").length; i++) {
      document.querySelectorAll(".addDevices")[i].textContent =
        language.en.add_devices;
    }
    document.getElementById("deviceName").textContent = language.en.device_name;
    document.getElementById("brand").textContent = language.en.brand;
    document.getElementById("modelNumber").textContent =
      language.en.model_number;
    document.getElementById("colorVariant").textContent =
      language.en.color_variant;
    document.getElementById("specs").textContent = language.en.specifications;
    document.getElementById("expense").textContent = language.en.expense;
    document.getElementById("priceDetermined").textContent =
      language.en.price_determined;
    document.getElementById("initialStock").textContent =
      language.en.initial_stock;
    document.getElementById("stockLeft").textContent =
      language.en.current_assets;
    document.getElementById("totalSold").textContent = language.en.total_sold;
  }
}
