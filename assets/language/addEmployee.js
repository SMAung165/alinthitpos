function setLang() {
  if (localLanguage == "mm") {
    document.querySelector(".add-employee").textContent = mm.add_employee;
    document.querySelector("#firstName").textContent = mm.first_name;
    document.querySelector("#lastName").textContent = mm.last_name;
    document.querySelector("#phoneNumber").textContent = mm.phone_number;
    document.querySelector("#address").textContent = mm.address;
    document.querySelector("#workLocation").textContent = mm.work_location;
    document.querySelector("#gender").textContent = mm.gender;
    document.querySelector("#dateOfBirth").textContent = mm.date_of_birth;
    document.querySelector("#dateHired").textContent = mm.date_hired;
    document.querySelector("#position").textContent = mm.work_position;
    document.querySelector("#specialty").textContent = mm.specialty;
    document.querySelector("#skills").textContent = mm.skills;
    document.querySelector("#submit").textContent = mm.submit;
  } else {
    document.querySelector(".add-employee").textContent = en.add_employee;
    document.querySelector("#firstName").textContent = en.first_name;
    document.querySelector("#lastName").textContent = en.last_name;
    document.querySelector("#phoneNumber").textContent = en.phone_number;
    document.querySelector("#address").textContent = en.address;
    document.querySelector("#workLocation").textContent = en.work_location;
    document.querySelector("#gender").textContent = en.gender;
    document.querySelector("#dateOfBirth").textContent = en.date_of_birth;
    document.querySelector("#dateHired").textContent = en.date_hired;
    document.querySelector("#position").textContent = en.work_position;
    document.querySelector("#specialty").textContent = en.specialty;
    document.querySelector("#skills").textContent = en.skills;
    document.querySelector("#submit").textContent = en.submit;
  }
}
