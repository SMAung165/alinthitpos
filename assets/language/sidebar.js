function setLangSidebarAndIndicator() {
  if (localLanguage == "mm") {
    document.querySelector(".alinthit").textContent = mm.alinthit;
    document.querySelector("#dashboard").textContent = mm.dashboard;
    document.querySelector("#devices").textContent = mm.devices;
    document.querySelector("#deviceList").textContent = mm.device_list;
    document.querySelector("#addDevices").textContent = mm.add_devices;
    document.querySelector("#manageDevices").textContent = mm.manage_devices;
    document.querySelector("#admin").textContent = mm.admin;
    document.querySelector("#adminList").textContent = mm.admin_list;
    document.querySelector("#addAdmin").textContent = mm.add_admin;
    document.querySelector("#customerAndOrder").textContent =
      mm.customer_and_order;
    document.querySelector("#customerList").textContent = mm.customer_list;
    document.querySelector("#manageOrder").textContent = mm.manage_order;
    document.querySelector("#addCustomerAndOrder").textContent =
      mm.add_customer_and_order;
    document.querySelector("#myProfile").textContent = mm.my_profile;
    document.querySelector("#controlPanel").textContent = mm.control_panel;
    document.querySelector("#changePassword").textContent = mm.change_password;
    document.querySelector("#employeeList").textContent = mm.employee_list;
    document.querySelector("#employeesAndSalary").textContent =
      mm.employees_and_salary;
    document.querySelector("#addEmployee").textContent = mm.add_employee;
    document.querySelector("#manageSalary").textContent = mm.manage_salary;

    // set lang indicator
    document.querySelectorAll(
      ".active-lang-indicator"
    )[1].style.backgroundColor = "#79ff54";

    document.querySelectorAll(
      ".active-lang-indicator"
    )[0].style.backgroundColor = "transparent";
  } else {
    document.querySelector(".alinthit").textContent = en.alinthit;
    document.querySelector("#dashboard").textContent = en.dashboard;
    document.querySelector("#devices").textContent = en.devices;
    document.querySelector("#deviceList").textContent = en.device_list;
    document.querySelector("#addDevices").textContent = en.add_devices;
    document.querySelector("#manageDevices").textContent = en.manage_devices;
    document.querySelector("#admin").textContent = en.admin;
    document.querySelector("#adminList").textContent = en.admin_list;
    document.querySelector("#addAdmin").textContent = en.add_admin;
    document.querySelector("#customerAndOrder").textContent =
      en.customer_and_order;
    document.querySelector("#customerList").textContent = en.customer_list;
    document.querySelector("#manageOrder").textContent = en.manage_order;
    document.querySelector("#addCustomerAndOrder").textContent =
      en.add_customer_and_order;
    document.querySelector("#myProfile").textContent = en.my_profile;
    document.querySelector("#controlPanel").textContent = en.control_panel;
    document.querySelector("#changePassword").textContent = en.change_password;
    document.querySelector("#employeeList").textContent = en.employee_list;
    document.querySelector("#employeesAndSalary").textContent =
      en.employees_and_salary;
    document.querySelector("#addEmployee").textContent = en.add_employee;
    document.querySelector("#manageSalary").textContent = en.manage_salary;

    // set lang indicator

    document.querySelectorAll(
      ".active-lang-indicator"
    )[0].style.backgroundColor = "#79ff54";
    document.querySelectorAll(
      ".active-lang-indicator"
    )[1].style.backgroundColor = "transparent";
  }
}
