function setLang() {
  if (localLanguage == "mm") {
    document.querySelector(".employee-list").textContent = mm.employee_list;
    for (i = 0; i < document.querySelectorAll(".firstname").length; i++) {
      document.querySelectorAll(".firstname")[i].textContent = mm.first_name;
      document.querySelectorAll(".lastname")[i].textContent = mm.last_name;
      document.querySelectorAll(".phone")[i].textContent = mm.phone_number;
      document.querySelectorAll(".salary-month")[i].textContent =
        mm.salary_month;
      document.querySelectorAll(".salary-status")[i].textContent =
        mm.salary_status;
    }

    for (i = 0; i < document.querySelectorAll(".paid").length; i++) {
      document.querySelectorAll(".paid")[i].textContent = mm.paid;
    }
    for (i = 0; i < document.querySelectorAll(".unpaid").length; i++) {
      document.querySelectorAll(".unpaid")[i].textContent = mm.unpaid;
    }
  } else {
    document.querySelector(".employee-list").textContent = en.employee_list;
    for (i = 0; i < document.querySelectorAll(".firstname").length; i++) {
      document.querySelectorAll(".firstname")[i].textContent = en.first_name;
      document.querySelectorAll(".lastname")[i].textContent = en.last_name;
      document.querySelectorAll(".phone")[i].textContent = en.phone_number;
      document.querySelectorAll(".salary-month")[i].textContent =
        en.salary_month;
      document.querySelectorAll(".salary-status")[i].textContent =
        en.salary_status;
    }

    for (i = 0; i < document.querySelectorAll(".paid").length; i++) {
      document.querySelectorAll(".paid")[i].textContent = en.paid;
    }
    for (i = 0; i < document.querySelectorAll(".unpaid").length; i++) {
      document.querySelectorAll(".unpaid")[i].textContent = en.unpaid;
    }
  }
}
