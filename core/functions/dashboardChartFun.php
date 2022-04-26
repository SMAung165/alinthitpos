<script type='text/javascript'>
  function showChart() {
    document.querySelectorAll(".refresh")[0].innerHTML =
      '<canvas id="lineChart" style="height:200px !important"></canvas>';

    document.querySelectorAll(".refresh")[1].innerHTML =
      ' <canvas id="singelBarChart" style="height:200px !important"></canvas>';
  }

  var monthlyProfit = localStorage.getItem("language") == 'en' ? "Monthly Profit" : "လစဉ်အမြတ်ငွေ";
  var dailyProfit = localStorage.getItem("language") == 'en' ? "Daily Profit" : "နေ့စဉ်အမြတ်ငွေ";

  function showChartFun() {

    var ctx = document.getElementById("lineChart");
    ctx.height = 150;
    var myChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
        datasets: [{
          label: monthlyProfit,
          borderColor: "rgba(0, 255, 0, 0.9)",
          borderWidth: "1",
          backgroundColor: "rgba(0, 255, 0, 0.5)",
          pointHighlightStroke: "rgba(0,255,148,1)",
          data: [<?php echo $getAllMonthlyProfit(); ?>]
        }]
      },
      options: {
        responsive: true,
        tooltips: {
          mode: 'index',
          intersect: false
        },
        hover: {
          mode: 'nearest',
          intersect: true
        },
      },
    });

    // single bar chart
    var ctx = document.getElementById("singelBarChart");
    ctx.height = 150;
    var myChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: [<?php echo $getDailyProfitForAWeek('day'); ?>],
        datasets: [{
          label: dailyProfit,
          data: [<?php echo $getDailyProfitForAWeek('profit'); ?>],
          borderColor: "rgba(0, 255, 0, 0.9)",
          borderWidth: "1",
          backgroundColor: "rgba(0, 255, 0, 0.5)",
          pointHighlightStroke: "rgba(0,255,148,1)",
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });

  }
</script>