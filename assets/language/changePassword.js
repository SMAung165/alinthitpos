function setLang() {
  if (localLanguage == "mm") {
    document.querySelectorAll(".change-password").forEach((element) => {
      element.textContent = mm.change_password;
    });
    document.querySelectorAll(".current-password").forEach((element) => {
      element.textContent = mm.current_password;
    });
    document.querySelectorAll(".new-password").forEach((element) => {
      element.textContent = mm.new_password;
    });
    document.querySelectorAll(".confirm-new-password").forEach((element) => {
      element.textContent = mm.confirm_new_password;
    });
    document.querySelectorAll(".submit").forEach((element) => {
      element.textContent = mm.submit;
    });
  } else {
    document.querySelectorAll(".change-password").forEach((element) => {
      element.textContent = en.change_password;
    });
    document.querySelectorAll(".current-password").forEach((element) => {
      element.textContent = en.current_password;
    });
    document.querySelectorAll(".new-password").forEach((element) => {
      element.textContent = en.new_password;
    });
    document.querySelectorAll(".confirm-new-password").forEach((element) => {
      element.textContent = en.confirm_new_password;
    });
    document.querySelectorAll(".submit").forEach((element) => {
      element.textContent = en.submit;
    });
  }
}
