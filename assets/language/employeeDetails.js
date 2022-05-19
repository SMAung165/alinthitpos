function setLang() {
  if (localLanguage == "mm") {
    document.querySelector("#about").textContent = mm.about;
    document.querySelector("#basicInfo").textContent = mm.basic_information;
    document.querySelector("#contactInfo").textContent = mm.contact_info;
    document.querySelector("#phoneNumber").textContent = mm.phone_number;
    document.querySelector("#dateOfBirth").textContent = mm.date_of_birth;
    document.querySelector("#gender").textContent = mm.gender;
    document.querySelector("#address").textContent = mm.address;
    document.querySelector("#work").textContent = mm.work;
    document.querySelector("#workLocation").textContent = mm.work_location;
    document.querySelector("#workPosition").textContent = mm.work_position;
    document.querySelector("#specialty").textContent = mm.specialty;
    document.querySelector("#skills").textContent = mm.skills;

    document.querySelector("#employeeName").textContent = mm.employee_name;
    document.querySelector("#month").textContent = mm.salary_month;
    document.querySelector("#basicSalary").textContent = mm.basic_salary;
    document.querySelector("#salaryBonus").textContent = mm.bonus;
    document.querySelector("#totalSalary").textContent = mm.total_salary;
    document.querySelector("#paymentDate").textContent = mm.payment_date;
    document.querySelector("#salaryStatus").textContent = mm.salary_status;

    document.querySelectorAll(".paid").forEach((element) => {
      element.textContent = mm.paid;
    });
    document.querySelectorAll(".unpaid").forEach((element) => {
      element.textContent = mm.unpaid;
    });

    document.querySelectorAll(".currency").forEach((element) => {
      element.textContent = mm.mmk;
    });
  } else {
    document.querySelector("#about").textContent = en.about;
    document.querySelector("#basicInfo").textContent = en.basic_information;
    document.querySelector("#contactInfo").textContent = en.contact_info;
    document.querySelector("#phoneNumber").textContent = en.phone_number;
    document.querySelector("#dateOfBirth").textContent = en.date_of_birth;
    document.querySelector("#gender").textContent = en.gender;
    document.querySelector("#address").textContent = en.address;
    document.querySelector("#work").textContent = en.work;
    document.querySelector("#workLocation").textContent = en.work_location;
    document.querySelector("#workPosition").textContent = en.work_position;
    document.querySelector("#employeeName").textContent = en.employee_name;
    document.querySelector("#month").textContent = en.salary_month;
    document.querySelector("#basicSalary").textContent = en.basic_salary;
    document.querySelector("#salaryBonus").textContent = en.bonus;
    document.querySelector("#totalSalary").textContent = en.total_salary;
    document.querySelector("#paymentDate").textContent = en.payment_date;
    document.querySelector("#salaryStatus").textContent = en.salary_status;

    document.querySelectorAll(".paid").forEach((element) => {
      element.textContent = en.paid;
    });
    document.querySelectorAll(".unpaid").forEach((element) => {
      element.textContent = en.unpaid;
    });

    document.querySelectorAll(".currency").forEach((element) => {
      element.textContent = en.mmk;
    });
  }
}
