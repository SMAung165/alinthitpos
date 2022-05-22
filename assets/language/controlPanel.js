function setLang() {
  if (localLanguage == "mm") {
    document.querySelectorAll(".reset-the-system").forEach((element) => {
      element.textContent = mm.reset_the_system;
    });
    document.querySelectorAll(".reset-profits").forEach((element) => {
      element.textContent = mm.reset_profits;
    });
    document.querySelectorAll(".reset-warehouse-stocks").forEach((element) => {
      element.textContent = mm.reset_warehouse_stocks;
    });
    document.querySelectorAll(".reset-salary").forEach((element) => {
      element.textContent = mm.reset_salary;
    });
    document.querySelectorAll(".enter-your-password").forEach((element) => {
      element.textContent = mm.enter_your_password;
    });
  } else {
    document.querySelectorAll(".reset-the-system").forEach((element) => {
      element.textContent = en.reset_the_system;
    });
    document.querySelectorAll(".reset-profits").forEach((element) => {
      element.textContent = en.reset_profits;
    });
    document.querySelectorAll(".reset-warehouse-stocks").forEach((element) => {
      element.textContent = en.reset_warehouse_stocks;
    });
    document.querySelectorAll(".reset-salary").forEach((element) => {
      element.textContent = en.reset_salary;
    });
    document.querySelectorAll(".enter-your-password").forEach((element) => {
      element.textContent = en.enter_your_password;
    });
  }
}
