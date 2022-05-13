function setLang() {
  if (localLanguage == "mm") {
    document.querySelector("#totalProfit").textContent =
      language.mm.total_profit;
    document.querySelector("#pendingOrders").textContent =
      language.mm.pending_orders;
    document.querySelector("#currentMonthProfit").textContent =
      language.mm.current_month_profit;
    document.querySelector("#todayProfit").textContent =
      language.mm.today_profit;
    document.querySelector("#toEarn").textContent = language.mm.to_earn;
    document.querySelector("#currentAssets").textContent =
      language.mm.current_assets;
    document.querySelector("#deviceSold").textContent = language.mm.device_sold;
    document.querySelector("#bestSeller").textContent = language.mm.best_seller;
    document.querySelector("#monthlyProfit").textContent =
      language.mm.monthly_profit;
    monthlyProfit = language.mm.monthly_profit;
    dailyProfit = language.mm.daily_profit;
    document.querySelector("#dailyProfit").textContent =
      language.mm.daily_profit;

    for (i = 0; i < document.querySelectorAll(".currency").length; i++) {
      document.querySelectorAll(".currency")[i].textContent = language.mm.mmk;
    }
    for (i = 0; i < document.querySelectorAll(".countSign").length; i++) {
      document.querySelectorAll(".countSign")[i].textContent = language.mm.pcs;
    }
  } else {
    document.querySelector("#totalProfit").textContent =
      language.en.total_profit;
    document.querySelector("#pendingOrders").textContent =
      language.en.pending_orders;
    document.querySelector("#currentMonthProfit").textContent =
      language.en.current_month_profit;
    document.querySelector("#todayProfit").textContent =
      language.en.today_profit;
    document.querySelector("#toEarn").textContent = language.en.to_earn;
    document.querySelector("#currentAssets").textContent =
      language.en.current_assets;
    document.querySelector("#deviceSold").textContent = language.en.device_sold;
    document.querySelector("#bestSeller").textContent = language.en.best_seller;
    document.querySelector("#monthlyProfit").textContent =
      language.en.monthly_profit;
    monthlyProfit = language.en.monthly_profit;
    dailyProfit = language.en.daily_profit;
    document.querySelector("#dailyProfit").textContent =
      language.en.daily_profit;

    for (i = 0; i < document.querySelectorAll(".currency").length; i++) {
      document.querySelectorAll(".currency")[i].textContent = language.en.mmk;
    }
    for (i = 0; i < document.querySelectorAll(".countSign").length; i++) {
      document.querySelectorAll(".countSign")[i].textContent = language.en.pcs;
    }
  }
}

showChart();
showChartFun();

document.querySelectorAll(".change-language").forEach((element) => {
  element.addEventListener("click", () => {
    window.setTimeout(showChart, 0);
    window.setTimeout(showChartFun, 0);
  });
});
