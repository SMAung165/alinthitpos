function setLang() {
  if (localLanguage == "mm") {
    document.getElementById("admin").textContent = mm.admin;
    document.getElementById("about").textContent = mm.about;
    document.getElementById("basicInfo").textContent = mm.basic_information;
    document.getElementById("contactInfo").textContent = mm.contact_info;
    for (i = 0; i < document.querySelectorAll(".phoneNumber").length; i++) {
      document.querySelectorAll(".phoneNumber")[i].textContent =
        mm.phone_number;
      document.querySelectorAll(".address")[i].textContent = mm.address;
      document.querySelectorAll(".email")[i].textContent = mm.email;

      document.querySelectorAll(".dateOfBirth")[i].textContent =
        mm.date_of_birth;
      document.querySelectorAll(".gender")[i].textContent = mm.gender;
      document.querySelectorAll(".specialty")[i].textContent = mm.specialty;
      document.querySelectorAll(".skills")[i].textContent = mm.skills;
    }
  } else {
    document.getElementById("admin").textContent = en.admin;
    document.getElementById("about").textContent = en.about;
    document.getElementById("basicInfo").textContent = en.basic_information;
    document.getElementById("contactInfo").textContent = en.contact_info;
    for (i = 0; i < document.querySelectorAll(".phoneNumber").length; i++) {
      document.querySelectorAll(".phoneNumber")[i].textContent =
        en.phone_number;
      document.querySelectorAll(".address")[i].textContent = en.address;
      document.querySelectorAll(".email")[i].textContent = en.email;

      document.querySelectorAll(".dateOfBirth")[i].textContent =
        en.date_of_birth;
      document.querySelectorAll(".gender")[i].textContent = en.gender;
      document.querySelectorAll(".specialty")[i].textContent = en.specialty;
      document.querySelectorAll(".skills")[i].textContent = en.skills;
    }
  }
}
