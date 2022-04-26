(function ($) {
  "use strict";

  $(function () {
    for (
      var nk = window.location,
        o = $(".nano-content li a")
          .filter(function () {
            return this.href == nk;
          })
          .addClass("active")
          .parent()
          .addClass("active");
      ;

    ) {
      if (!o.is("li")) break;
      o = o.parent().addClass("d-block").parent().addClass("active");
    }
  });

  /* 
    ------------------------------------------------
    Sidebar open close animated humberger icon
    ------------------------------------------------*/

  $(".hamburger").on("click", function () {
    $(this).toggleClass("is-active");
  });

  /* TO DO LIST 
    --------------------*/
  $(".tdl-new").on("keypress", function (e) {
    var code = e.keyCode ? e.keyCode : e.which;
    if (code == 13) {
      var v = $(this).val();
      var s = v.replace(/ +?/g, "");
      if (s == "") {
        return false;
      } else {
        $(".tdl-content ul").append(
          "<li><label><input type='checkbox'><i></i><span>" +
            v +
            "</span><a href='#' class='ti-close'></a></label></li>"
        );
        $(this).val("");
      }
    }
  });

  $(".tdl-content a").on("click", function () {
    var _li = $(this).parent().parent("li");
    _li
      .addClass("remove")
      .stop()
      .delay(100)
      .slideUp("fast", function () {
        _li.remove();
      });
    return false;
  });

  // for dynamically created a tags
  $(".tdl-content").on("click", "a", function () {
    var _li = $(this).parent().parent("li");
    _li
      .addClass("remove")
      .stop()
      .delay(100)
      .slideUp("fast", function () {
        _li.remove();
      });
    return false;
  });
})(jQuery);

// My Script
const dropDownEls = document.getElementsByClassName("drop-down");
for (i = 0; i < dropDownEls.length; i++) {
  dropDownEls[i].parentElement.parentElement.addEventListener("click", (e) => {
    var currentDropdownEl = e.currentTarget.children[0].children[1];
    if (currentDropdownEl.classList.contains("showDropdown") === false) {
      currentDropdownEl.classList.add("showDropdown");
    } else {
      currentDropdownEl.classList.remove("showDropdown");
    }
  });
}

const getPageTitle = () => document.querySelector("title").innerHTML;
document.querySelector(".pageTitle").innerHTML = getPageTitle();

const language = {
  en: {
    alinthit: "Alin Thit",
    dashboard: "Dashboard",
    total_profit: "Total Profit",
    mmk: "MMK",
    current_month_profit: "Current Month Profit",
    today_profit: "Today Profit",
    pending_orders: "Pending Orders",
    to_earn: "To Earn",
    stock_left: "Stock Left",
    pcs: "PCS",
    current_assets: "Current Assets",
    device_sold: "Device Sold",
    monthly_profit: "Monthly Profit",
    daily_profit: "Daily Profit",

    devices: "Devices",
    device_list: "Device List",
    device_id: "Device ID",
    device_name: "Device Name",
    model_number: "Model No.",
    brand: "Brand",
    color_variant: "Color Variant",
    expense_per_one: "Expense Per One",
    price_per_one: "Price Per One",
    initial_stock: "Initial Stock",
    total_sold: "Total Sold",
    profit: "Profit",

    add_devices: "Add Devices",
    specifications: "Specifications",
    expense: "Expense",
    price_determined: "Price Determinded",
    submit: "Submit",

    manage_devices: "Manage Devices",
    image: "Image",
    action: "Action",
    details: "Details",
    device_details: "Device Details",
    device_warehouse_info: "Device Warehouse Info",
    price: "Price",
    warehouse_stock: "Warehouse Stock",
    data_entry: "Data Entry",
    data_entry_date: "Data Entry Date",
    data_entry_time: "Data Entry Time",
    appearance: "Appearance",
    recent_buyers: "Recent Buyers",
    customer_name: "Customer Name",

    device: "Device",
    submit: "Submit",
    edit: "Edit",
    delete: "Delete",

    admin: "Admin",
    admin_list: "Admin List",
    username: "Username",
    first_name: "Frist Name",
    last_name: "Last Name",
    email: "Email",
    confirm_password: "Confirm Password",
    role: "Role",
    status: "Status",

    add_admin: "Add Admin",
    admin_role: "Admin Role",
    account_status: "Account Status",
    activated: "Activated",
    deactivated: "Deactivated",

    customer_and_order: "Customer and Order",
    customer_list: "Customer List",
    phone_number: "Phone Number",

    manage_order: "Manage Order",
    customer: "Customer",
    order_number: "Order No.",
    product_name: "Product Name",
    quantity: "Quantity",
    left: "Left",
    order_date: "Order Date",
    overall_status: "Overall Status",
    completed: "Completed",
    pending: "Pending",
    payment_status: "Payment Status",
    paid: "Paid",
    cancelled: "Cancelled",
    customer_info: "Customer Info",
    order_info: "Order Info",
    total_price: "Total Cost",
    more_device_details: "More Device Details",

    add_customer_and_order: "Add Customer and Order",
    add_customer: "Add Customer",
    address: "Address",
    add_order: "Add Order",

    my_profile: "My Profile",
    work: "Work",

    contact_info: "Contact Information",
    specialty: "Specialty",
    skills: "Skills",
    work_position: "Work Position",
    about: "About",
    basic_information: "Basic Information",
    date_of_birth: "Date of Birth",
    gender: "Gender",
    location: "location",
  },
  mm: {
    alinthit: "အလင်းသစ်",
    dashboard: "Dashboard",
    total_profit: "စုစုပေါင်း အကျိုးအမြတ်",
    mmk: "ကျပ်",
    current_month_profit: "ယခုလအတွက်အမြတ်ငွေ",
    today_profit: "ယနေ့အမြတ်ငွေ",
    pending_orders: "မပြီးသေးသောအော်ဒါများ",
    to_earn: "ရရှိရန်",
    stock_left: "ကျန်နေသောထုတ်ကုန်များ",
    pcs: "လုံး",
    current_assets: "လက်ရှိပိုင်ဆိုင်မှုများ",
    device_sold: "ရောင်းထွက် ဖုန်း",
    monthly_profit: "လစဉ်အမြတ်ငွေ",
    daily_profit: "နေ့စဉ်အမြတ်ငွေ",

    devices: "ဖုန်းများ",
    device_list: "ဖုန်း စာရင်း",
    device_id: "ဖုန်း ID",
    device_name: "ဖုန်း အမည်",
    model_number: "မော်ဒယ်နံပါတ်",
    brand: "တံဆိပ်",
    color_variant: "အရောင်",
    expense_per_one: "တစ်ခုချင်း၏ကုန်ကျငွေ",
    price_per_one: "တစ်ခုချင်း၏ကျသင့်ငွေ",
    initial_stock: "မူလ ဖုန်း အရေအတွက်",
    total_sold: "စုစုပေါင်းအရောင်း",
    profit: "အကျိုးအမြတ်",

    add_devices: "ဖုန်းများထည့်ရန်",
    specifications: "ဖုန်း ၏ ‌စွမ်းဆောင်ရည် သတ်မှတ်ချက်များ",
    expense: "ကုန်ကျငွေ (အရင်း)",
    price_determined: "ရောင်း မည့် ဈေးနှုန်း",
    submit: "တင်ပြသည်",

    manage_devices: "ဖုန်း စားရင်ပြင်ရန်",
    image: "ပုံ",
    action: "လုပ်ဆောင်ရန်",
    details: "အသေးစိတ်များ",
    device_details: "Device အသေးစိတ်အချက်အလက်များ",
    device_warehouse_info: "Device Warehouse Info",
    price: "ဈေးနှုန်း",
    warehouse_stock: "Warehouse Stock",
    data_entry: "ဒေတာထည့်သွင်းသည်",
    data_entry_date: "ဒေတာထည့်သောနေ့စွဲ",
    data_entry_time: "ဒေတာထည့်သောအချိန်",
    appearance: "အသွင်အပြင်",
    recent_buyers: "လက်တလောဝယ်ယူထားသူများ",
    customer_name: "ဝယ်ယူသူအမည်",

    device: "ဖုန်း ",
    submit: "တင်မည်",
    edit: "ပြင်ဆင်သည်",
    delete: "ဖျက်သည်",

    admin: "အက်မင်",
    admin_list: "အက်မင်စာရင်း",
    username: "အကောင့်အမည်",
    first_name: "ရှေ့ နာမည်",
    last_name: "နောက် နာမည်",
    email: "အီးမေးလ်",
    confirm_password: "Password ထပ်ရိုက်ပါ",
    role: "အခန်းကဏ္ဌ",
    status: "အခြေအနေ",

    add_admin: "အက်မင် ထည့်ရန်",
    admin_role: "အက်မင်၏အခန်းကဏ္ဌ",
    account_status: "အကောင့်အခြေအနေ",
    activated: "ဖွင့်ထားသည်",
    deactivated: "ပိတ်ထားသည်",

    customer_and_order: "ဈေးဝယ်သူ နှင့် အော်ဒါ",
    customer_list: "ဈေးဝယ်သူစာရင်း",
    phone_number: "ဖုန်းနံပါတ်",

    manage_order: "အော်ဒါ စီစဉ် ရန်",
    customer: "ဈေးဝယ်သူ",
    order_number: "အော်ဒါ အမှတ်စဉ်",
    product_name: "ထုတ်ကုန်အမည်",
    quantity: "အရေအတွက်",
    left: "ကျန်",
    order_date: "မှာယူသောနေ့စွဲ",
    overall_status: "အကြမ်းဖျင်းအ‌ခြေအနေ",
    completed: "ပေးချေမှုလုပ်ဆောင်ပြီး",
    pending: "ပေးရန်ကျန်နေသည်",
    payment_status: "ငွေပေးချေမှုအ‌ခြေအနေ",
    paid: "ပေးချေခဲ့သည်",
    cancelled: "ပယ်ဖျက်ခဲ့သည်",
    customer_info: "ဈေးဝယ်သူအချက်အလက်",
    order_info: "မှာယူမှုအချက်ကလက်များ",
    total_price: "ကျသင့်ငွေစုစုပေါင်း",
    more_device_details: "More Device Details",

    add_customer_and_order: "ဈေးဝယ်သူနှင့်မှာယူမှုများထပ်ထည့်ရန်",
    add_customer: "ဈေးဝယ်သူထပ်ထည့်ရန်",
    address: "နေရပ်လိပ်စာ",
    add_order: "မှာယူမှုထပ်ပေါင်းရန်",

    my_profile: "ကျွန်ုပ်၏ပရိုဖိုင်",
    work: "အလုပ်",

    contact_info: "ဆက်သွယ်ရန်အချက်အလက်",
    specialty: "အထူးပြု",
    skills: "တတ်ကျွမ်းမှုများ",
    about: "အကြောင်းအရာ",
    work_position: "အလုပ်ရာထူး",
    basic_information: "အခြေခံအချက်အလက်များ",
    date_of_birth: "မွေးနေ့",
    gender: "ကျား၊မ",
    location: "တည်နေရာ",
  },
};

if (localStorage.getItem("language") == null) {
  localStorage.setItem("language", "en");
}

let localLanguage = localStorage.getItem("language");

function setLangSideBar() {
  if (localLanguage == "mm") {
    document.querySelector(".alinthit").textContent = language.mm.alinthit;
    document.querySelector("#dashboard").textContent = language.mm.dashboard;
    document.querySelector("#devices").textContent = language.mm.devices;
    document.querySelector("#deviceList").textContent = language.mm.device_list;
    document.querySelector("#addDevices").textContent = language.mm.add_devices;
    document.querySelector("#manageDevices").textContent =
      language.mm.manage_devices;
    document.querySelector("#admin").textContent = language.mm.admin;
    document.querySelector("#adminList").textContent = language.mm.admin_list;
    document.querySelector("#addAdmin").textContent = language.mm.add_admin;
    document.querySelector("#customerAndOrder").textContent =
      language.mm.customer_and_order;
    document.querySelector("#customerList").textContent =
      language.mm.customer_list;
    document.querySelector("#manageOrder").textContent =
      language.mm.manage_order;
    document.querySelector("#addCustomerAndOrder").textContent =
      language.mm.add_customer_and_order;
    document.querySelector("#myProfile").textContent = language.mm.my_profile;

    document.querySelectorAll(
      ".active-lang-indicator"
    )[1].style.backgroundColor = "#79ff54";

    document.querySelectorAll(
      ".active-lang-indicator"
    )[0].style.backgroundColor = "transparent";
  } else {
    document.querySelector(".alinthit").textContent = language.en.alinthit;
    document.querySelector("#dashboard").textContent = language.en.dashboard;
    document.querySelector("#devices").textContent = language.en.devices;
    document.querySelector("#deviceList").textContent = language.en.device_list;
    document.querySelector("#addDevices").textContent = language.en.add_devices;
    document.querySelector("#manageDevices").textContent =
      language.en.manage_devices;
    document.querySelector("#admin").textContent = language.en.admin;
    document.querySelector("#adminList").textContent = language.en.admin_list;
    document.querySelector("#addAdmin").textContent = language.en.add_admin;
    document.querySelector("#customerAndOrder").textContent =
      language.en.customer_and_order;
    document.querySelector("#customerList").textContent =
      language.en.customer_list;
    document.querySelector("#manageOrder").textContent =
      language.en.manage_order;
    document.querySelector("#addCustomerAndOrder").textContent =
      language.en.add_customer_and_order;
    document.querySelector("#myProfile").textContent = language.en.my_profile;
    document.querySelectorAll(
      ".active-lang-indicator"
    )[0].style.backgroundColor = "#79ff54";
    document.querySelectorAll(
      ".active-lang-indicator"
    )[1].style.backgroundColor = "transparent";
  }
}

function changeLanguage(lang) {
  localStorage.setItem("language", lang);
  localLanguage = localStorage.getItem("language");
  window.setTimeout(setLang, 0);
  window.setTimeout(setLangSideBar, 0);
}

setLang();
setLangSideBar();
