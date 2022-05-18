function setLang() {
  if (localLanguage == "mm") {
    document.querySelector("#totalProfit").textContent = mm.total_profit;
    document.querySelector("#pendingOrders").textContent = mm.pending_orders;
    document.querySelector("#currentMonthProfit").textContent =
      mm.current_month_profit;
    document.querySelector("#todayProfit").textContent = mm.today_profit;
    document.querySelector("#toEarn").textContent = mm.to_earn;
    document.querySelector("#currentAssets").textContent = mm.current_assets;
    document.querySelector("#deviceSold").textContent = mm.device_sold;
    document.querySelector("#bestSeller").textContent = mm.best_seller;
    document.querySelector("#monthlyProfit").textContent = mm.monthly_profit;
    monthlyProfit = mm.monthly_profit;
    dailyProfit = mm.daily_profit;
    document.querySelector("#dailyProfit").textContent = mm.daily_profit;
    document.querySelector("#mostDailyEarn").textContent = mm.most_daily_earn;

    for (i = 0; i < document.querySelectorAll(".currency").length; i++) {
      document.querySelectorAll(".currency")[i].textContent = mm.mmk;
    }
    for (i = 0; i < document.querySelectorAll(".countSign").length; i++) {
      document.querySelectorAll(".countSign")[i].textContent = mm.pcs;
    }
  } else {
    document.querySelector("#totalProfit").textContent = en.total_profit;
    document.querySelector("#pendingOrders").textContent = en.pending_orders;
    document.querySelector("#currentMonthProfit").textContent =
      en.current_month_profit;
    document.querySelector("#todayProfit").textContent = en.today_profit;
    document.querySelector("#toEarn").textContent = en.to_earn;
    document.querySelector("#currentAssets").textContent = en.current_assets;
    document.querySelector("#deviceSold").textContent = en.device_sold;
    document.querySelector("#bestSeller").textContent = en.best_seller;
    document.querySelector("#monthlyProfit").textContent = en.monthly_profit;
    monthlyProfit = en.monthly_profit;
    dailyProfit = en.daily_profit;
    document.querySelector("#dailyProfit").textContent = en.daily_profit;
    document.querySelector("#mostDailyEarn").textContent = en.most_daily_earn;

    for (i = 0; i < document.querySelectorAll(".currency").length; i++) {
      document.querySelectorAll(".currency")[i].textContent = en.mmk;
    }
    for (i = 0; i < document.querySelectorAll(".countSign").length; i++) {
      document.querySelectorAll(".countSign")[i].textContent = en.pcs;
    }
  }
}
