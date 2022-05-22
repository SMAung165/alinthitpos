function setLang() {
  if (localLanguage == "mm") {
    document.querySelector(".account-recovery").textContent =
      mm.account_recovery;
    document.querySelector(".submit").textContent = mm.submit;
  } else {
    document.querySelector(".account-recovery").textContent =
      en.account_recovery;
    document.querySelector(".submit").textContent = en.submit;
  }
}
