function setLang() {
  if (localLanguage == "mm") {
    document.querySelector(".manageDevices").textContent = mm.manage_devices;
    for (i = 0; i < document.querySelectorAll(".image").length; i++) {
      document.querySelectorAll(".image")[i].textContent = mm.image;
      document.querySelectorAll(".deviceId")[i].textContent = mm.device_id;
      document.querySelectorAll(".deviceName")[i].textContent = mm.device_name;
      document.querySelectorAll(".brand")[i].textContent = mm.brand;
      document.querySelectorAll(".model")[i].textContent = mm.model_number;
      document.querySelectorAll(".colorVariant")[i].textContent =
        mm.color_variant;
      document.querySelectorAll(".price")[i].textContent = mm.price_determined;
      document.querySelectorAll(".stock")[i].textContent = mm.current_assets;
    }
    document.querySelectorAll(".currency").forEach((element) => {
      element.textContent = mm.mmk;
    });
    document.querySelectorAll(".countSign").forEach((element) => {
      element.textContent = mm.pcs;
    });
  } else {
    document.querySelector(".manageDevices").textContent = en.manage_devices;
    for (i = 0; i < document.querySelectorAll(".image").length; i++) {
      document.querySelectorAll(".image")[i].textContent = en.image;
      document.querySelectorAll(".deviceId")[i].textContent = en.device_id;
      document.querySelectorAll(".deviceName")[i].textContent = en.device_name;
      document.querySelectorAll(".brand")[i].textContent = en.brand;
      document.querySelectorAll(".model")[i].textContent = en.model_number;
      document.querySelectorAll(".colorVariant")[i].textContent =
        en.color_variant;
      document.querySelectorAll(".price")[i].textContent = en.price_determined;
      document.querySelectorAll(".stock")[i].textContent = en.current_assets;
    }
    document.querySelectorAll(".currency").forEach((element) => {
      element.textContent = en.mmk;
    });
    document.querySelectorAll(".countSign").forEach((element) => {
      element.textContent = en.pcs;
    });
  }
}
