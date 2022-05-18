function setLang() {
  if (localLanguage == "mm") {
    for (i = 0; i < document.querySelectorAll(".deviceId").length; i++) {
      document.querySelectorAll(".deviceId")[i].textContent = mm.device_id;
      document.querySelectorAll(".deviceName")[i].textContent = mm.device_name;
      document.querySelectorAll(".deviceBrand")[i].textContent = mm.brand;
      document.querySelectorAll(".deviceModel")[i].textContent =
        mm.model_number;
      document.querySelectorAll(".colorVariant")[i].textContent =
        mm.color_variant;
      document.querySelectorAll(".expensePerOne")[i].textContent =
        mm.expense_per_one;
      document.querySelectorAll(".pricePerOne")[i].textContent =
        mm.price_per_one;
      document.querySelectorAll(".initialStock")[i].textContent =
        mm.initial_stock;
      document.querySelectorAll(".stockLeft")[i].textContent =
        mm.current_assets;
      document.querySelectorAll(".totalSold")[i].textContent = mm.total_sold;
      document.querySelectorAll(".profit")[i].textContent = mm.profit;
    }
    document.querySelectorAll(".currency").forEach((element) => {
      element.textContent = mm.mmk;
    });
    document.querySelectorAll(".countSign").forEach((element) => {
      element.textContent = mm.pcs;
    });
  } else {
    for (i = 0; i < document.querySelectorAll(".deviceId").length; i++) {
      document.querySelectorAll(".deviceId")[i].textContent = en.device_id;
      document.querySelectorAll(".deviceName")[i].textContent = en.device_name;
      document.querySelectorAll(".deviceBrand")[i].textContent = en.brand;
      document.querySelectorAll(".deviceModel")[i].textContent =
        en.model_number;
      document.querySelectorAll(".colorVariant")[i].textContent =
        en.color_variant;
      document.querySelectorAll(".expensePerOne")[i].textContent =
        en.expense_per_one;
      document.querySelectorAll(".pricePerOne")[i].textContent =
        en.price_per_one;
      document.querySelectorAll(".initialStock")[i].textContent =
        en.initial_stock;
      document.querySelectorAll(".stockLeft")[i].textContent =
        en.current_assets;
      document.querySelectorAll(".totalSold")[i].textContent = en.total_sold;
      document.querySelectorAll(".profit")[i].textContent = en.profit;
    }
    document.querySelectorAll(".currency").forEach((element) => {
      element.textContent = en.mmk;
    });
    document.querySelectorAll(".countSign").forEach((element) => {
      element.textContent = en.pcs;
    });
  }
}
