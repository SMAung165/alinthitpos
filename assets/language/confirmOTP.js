function setLang() {
  if (localLanguage == "mm") {
    document.querySelector(".enter-otp").textContent = mm.enter_otp;
    document.querySelector(".submit").textContent = mm.submit;
  } else {
    document.querySelector(".enter-otp").textContent = en.enter_otp;
    document.querySelector(".submit").textContent = en.submit;
  }
}
