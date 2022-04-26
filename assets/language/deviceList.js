function setLang() {
  if (localLanguage == "mm") {
    for (i = 0; i < document.querySelectorAll(".deviceId").length; i++) {
      document.querySelectorAll(".deviceId")[i].textContent =
        language.mm.device_id;
      document.querySelectorAll(".deviceName")[i].textContent =
        language.mm.device_name;
      document.querySelectorAll(".deviceBrand")[i].textContent =
        language.mm.brand;
      document.querySelectorAll(".deviceModel")[i].textContent =
        language.mm.model_number;
      document.querySelectorAll(".colorVariant")[i].textContent =
        language.mm.color_variant;
      document.querySelectorAll(".expensePerOne")[i].textContent =
        language.mm.expense_per_one;
      document.querySelectorAll(".pricePerOne")[i].textContent =
        language.mm.price_per_one;
      document.querySelectorAll(".initialStock")[i].textContent =
        language.mm.initial_stock;
      document.querySelectorAll(".stockLeft")[i].textContent =
        language.mm.current_assets;
      document.querySelectorAll(".totalSold")[i].textContent =
        language.mm.total_sold;
      document.querySelectorAll(".profit")[i].textContent = language.mm.profit;
    }
    document.querySelectorAll(".currency").forEach((element) => {
      element.textContent = language.mm.mmk;
    });
    document.querySelectorAll(".countSign").forEach((element) => {
      element.textContent = language.mm.pcs;
    });
  } else {
    for (i = 0; i < document.querySelectorAll(".deviceId").length; i++) {
      document.querySelectorAll(".deviceId")[i].textContent =
        language.en.device_id;
      document.querySelectorAll(".deviceName")[i].textContent =
        language.en.device_name;
      document.querySelectorAll(".deviceBrand")[i].textContent =
        language.en.brand;
      document.querySelectorAll(".deviceModel")[i].textContent =
        language.en.model_number;
      document.querySelectorAll(".colorVariant")[i].textContent =
        language.en.color_variant;
      document.querySelectorAll(".expensePerOne")[i].textContent =
        language.en.expense_per_one;
      document.querySelectorAll(".pricePerOne")[i].textContent =
        language.en.price_per_one;
      document.querySelectorAll(".initialStock")[i].textContent =
        language.en.initial_stock;
      document.querySelectorAll(".stockLeft")[i].textContent =
        language.en.current_assets;
      document.querySelectorAll(".totalSold")[i].textContent =
        language.en.total_sold;
      document.querySelectorAll(".profit")[i].textContent = language.en.profit;
    }
    document.querySelectorAll(".currency").forEach((element) => {
      element.textContent = language.en.mmk;
    });
    document.querySelectorAll(".countSign").forEach((element) => {
      element.textContent = language.en.pcs;
    });
  }
}
