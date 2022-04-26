function setLang() {
  if (localLanguage == "mm") {
    document.getElementById("admin").textContent = language.mm.admin;
    document.getElementById("about").textContent = language.mm.about;
    document.getElementById("basicInfo").textContent =
      language.mm.basic_information;
    document.getElementById("contactInfo").textContent =
      language.mm.contact_info;
    for (i = 0; i < document.querySelectorAll(".phoneNumber").length; i++) {
      document.querySelectorAll(".phoneNumber")[i].textContent =
        language.mm.phone_number;
      document.querySelectorAll(".address")[i].textContent =
        language.mm.address;
      document.querySelectorAll(".email")[i].textContent = language.mm.email;

      document.querySelectorAll(".dateOfBirth")[i].textContent =
        language.mm.date_of_birth;
      document.querySelectorAll(".gender")[i].textContent = language.mm.gender;
      document.querySelectorAll(".specialty")[i].textContent =
        language.mm.specialty;
      document.querySelectorAll(".skills")[i].textContent = language.mm.skills;
    }
  } else {
    document.getElementById("admin").textContent = language.en.admin;
    document.getElementById("about").textContent = language.en.about;
    document.getElementById("basicInfo").textContent =
      language.en.basic_information;
    document.getElementById("firstname").textContent = language.en.first_name;
    document.getElementById("lastname").textContent = language.en.last_name;
    document.getElementById("contactInfo").textContent =
      language.en.contact_info;
    document.getElementById("workPosition").textContent =
      language.en.work_position;
    for (i = 0; i < document.querySelectorAll(".phoneNumber").length; i++) {
      document.querySelectorAll(".phoneNumber")[i].textContent =
        language.en.phone_number;
      document.querySelectorAll(".address")[i].textContent =
        language.en.address;
      document.querySelectorAll(".email")[i].textContent = language.en.email;

      document.querySelectorAll(".dateOfBirth")[i].textContent =
        language.en.date_of_birth;
      document.querySelectorAll(".gender")[i].textContent = language.en.gender;
      document.querySelectorAll(".specialty")[i].textContent =
        language.en.specialty;
      document.querySelectorAll(".skills")[i].textContent = language.en.skills;
    }
  }
}
