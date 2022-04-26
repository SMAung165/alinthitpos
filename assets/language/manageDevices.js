function setLang() {
  if (localLanguage == "mm") {
    document.querySelector(".manageDevices").textContent =
      language.mm.manage_devices;
    for (i = 0; i < document.querySelectorAll(".image").length; i++) {
      document.querySelectorAll(".image")[i].textContent = language.mm.image;
      document.querySelectorAll(".deviceId")[i].textContent =
        language.mm.device_id;
      document.querySelectorAll(".deviceName")[i].textContent =
        language.mm.device_name;
      document.querySelectorAll(".brand")[i].textContent = language.mm.brand;
      document.querySelectorAll(".model")[i].textContent =
        language.mm.model_number;
      document.querySelectorAll(".colorVariant")[i].textContent =
        language.mm.color_variant;
      document.querySelectorAll(".price")[i].textContent =
        language.mm.price_determined;
      document.querySelectorAll(".stock")[i].textContent =
        language.mm.current_assets;
    }
    document.querySelectorAll(".currency").forEach((element) => {
      element.textContent = language.mm.mmk;
    });
    document.querySelectorAll(".countSign").forEach((element) => {
      element.textContent = language.mm.pcs;
    });
  } else {
    document.querySelector(".manageDevices").textContent =
      language.en.manage_devices;
    for (i = 0; i < document.querySelectorAll(".image").length; i++) {
      document.querySelectorAll(".image")[i].textContent = language.en.image;
      document.querySelectorAll(".deviceId")[i].textContent =
        language.en.device_id;
      document.querySelectorAll(".deviceName")[i].textContent =
        language.en.device_name;
      document.querySelectorAll(".brand")[i].textContent = language.en.brand;
      document.querySelectorAll(".model")[i].textContent =
        language.en.model_number;
      document.querySelectorAll(".colorVariant")[i].textContent =
        language.en.color_variant;
      document.querySelectorAll(".price")[i].textContent =
        language.en.price_determined;
      document.querySelectorAll(".stock")[i].textContent =
        language.en.current_assets;
    }
    document.querySelectorAll(".currency").forEach((element) => {
      element.textContent = language.en.mmk;
    });
    document.querySelectorAll(".countSign").forEach((element) => {
      element.textContent = language.en.pcs;
    });
  }
}
