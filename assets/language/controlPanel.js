function setLang() {
  if (localLanguage == "mm") {
    if (document.querySelectorAll(".reset-the-system") != null) {
      document.querySelectorAll(".reset-the-system").forEach((element) => {
        element.textContent = mm.reset_the_system;
      });
    }

    if (document.querySelectorAll(".reset-profits") != null) {
      document.querySelectorAll(".reset-profits").forEach((element) => {
        element.textContent = mm.reset_profits;
      });
    }

    if (document.querySelectorAll(".reset-warehouse-stocks") != null) {
      document
        .querySelectorAll(".reset-warehouse-stocks")
        .forEach((element) => {
          element.textContent = mm.reset_warehouse_stocks;
        });
    }

    if (document.querySelectorAll(".reset-orders") != null) {
      document.querySelectorAll(".reset-orders").forEach((element) => {
        element.textContent = mm.reset_orders;
      });
    }

    if (document.querySelectorAll(".reset-salary") != null) {
      document.querySelectorAll(".reset-salary").forEach((element) => {
        element.textContent = mm.reset_salary;
      });
    }

    if (document.querySelectorAll(".enter-your-password") != null) {
      document.querySelectorAll(".enter-your-password").forEach((element) => {
        element.textContent = mm.enter_your_password;
      });
    }
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
    document.querySelectorAll(".reset-orders").forEach((element) => {
      element.textContent = en.reset_orders;
    });
    document.querySelectorAll(".reset-salary").forEach((element) => {
      element.textContent = en.reset_salary;
    });
    document.querySelectorAll(".enter-your-password").forEach((element) => {
      element.textContent = en.enter_your_password;
    });
  }
}
