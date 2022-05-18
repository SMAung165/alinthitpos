function setLang() {
  if (localLanguage == "mm") {
    document.querySelector(".salary-list").textContent = mm.salary_list;
    document.querySelectorAll(".salary").forEach((element) => {
      element.textContent = mm.salary;
    });
    document.querySelectorAll(".employee").forEach((element) => {
      element.textContent = mm.employee;
    });
    document.querySelectorAll(".position").forEach((element) => {
      element.textContent = mm.work_position;
    });
    document.querySelectorAll(".employee-name").forEach((element) => {
      element.textContent = mm.employee_name;
    });
    mm.employee_name;
    document.querySelectorAll(".month").forEach((element) => {
      element.textContent = mm.salary_month;
    });
    document.querySelectorAll(".basic-salary").forEach((element) => {
      element.textContent = mm.basic_salary;
    });
    document.querySelectorAll(".bonus").forEach((element) => {
      element.textContent = mm.bonus;
    });
    document.querySelectorAll(".total-salary").forEach((element) => {
      element.textContent = mm.total_salary;
    });
    document.querySelectorAll(".payment-date").forEach((element) => {
      element.textContent = mm.payment_date;
    });
    document.querySelectorAll(".salary-status").forEach((element) => {
      element.textContent = mm.salary_status;
    });
    document.querySelectorAll(".mmk").forEach((element) => {
      element.textContent = mm.mmk;
    });
    document.querySelectorAll(".paid").forEach((element) => {
      element.textContent = mm.paid;
    });
    document.querySelectorAll(".unpaid").forEach((element) => {
      element.textContent = mm.unpaid;
    });
    document.querySelectorAll(".currency").forEach((element) => {
      element.textContent = mm.mmk;
    });
    document.querySelector(".submit").textContent = mm.submit;
  } else {
    document.querySelector(".salary-list").textContent = en.salary_list;
    document.querySelectorAll(".salary").forEach((element) => {
      element.textContent = en.salary;
    });
    document.querySelectorAll(".employee").forEach((element) => {
      element.textContent = en.employee;
    });
    document.querySelectorAll(".position").forEach((element) => {
      element.textContent = en.work_position;
    });
    document.querySelectorAll(".employee-name").forEach((element) => {
      element.textContent = en.employee_name;
    });
    en.employee_name;
    document.querySelectorAll(".month").forEach((element) => {
      element.textContent = en.salary_month;
    });
    document.querySelectorAll(".basic-salary").forEach((element) => {
      element.textContent = en.basic_salary;
    });
    document.querySelectorAll(".bonus").forEach((element) => {
      element.textContent = en.bonus;
    });
    document.querySelectorAll(".total-salary").forEach((element) => {
      element.textContent = en.total_salary;
    });
    document.querySelectorAll(".payment-date").forEach((element) => {
      element.textContent = en.payment_date;
    });
    document.querySelectorAll(".salary-status").forEach((element) => {
      element.textContent = en.salary_status;
    });
    document.querySelectorAll(".paid").forEach((element) => {
      element.textContent = en.paid;
    });
    document.querySelectorAll(".unpaid").forEach((element) => {
      element.textContent = en.unpaid;
    });
    document.querySelectorAll(".currency").forEach((element) => {
      element.textContent = en.mmk;
    });
    document.querySelector(".submit").textContent = en.submit;
  }
}
