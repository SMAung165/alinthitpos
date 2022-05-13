<script type='text/javascript'>
  function showChart() {
    document.querySelectorAll(".refresh")[0].innerHTML =
      ' <canvas id="pieChart"></canvas>';

    document.querySelectorAll(".refresh")[1].innerHTML =
      '<canvas id="lineChart" style="height:250px !important"></canvas>';

    document.querySelectorAll(".refresh")[2].innerHTML =
      ' <canvas id="singelBarChart" style="height:250px !important"></canvas>';
  }

  var monthlyProfit = localStorage.getItem("language") == 'en' ? "Monthly Profit" : "လစဉ်အမြတ်ငွေ";
  var dailyProfit = localStorage.getItem("language") == 'en' ? "Daily Profit" : "နေ့စဉ်အမြတ်ငွေ";

  function showChartFun() {

    var ctx = document.getElementById("lineChart");
    ctx.height = 150;
    var myChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: [<?php echo $getAllMonthlyProfit('month'); ?>],
        datasets: [{
          label: monthlyProfit,
          borderColor: "rgba(0, 255, 0, 0.9)",
          borderWidth: "1",
          backgroundColor: "rgba(0, 255, 0, 0.5)",
          pointHighlightStroke: "rgba(0,255,148,1)",
          data: [<?php echo $getAllMonthlyProfit('profit'); ?>]
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
      type: 'bar',
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

    //pie chart
    var ctx = document.getElementById("pieChart");
    ctx.height = 300;
    var myChart = new Chart(ctx, {
      type: 'pie',
      data: {
        datasets: [{
          data: [<?php echo $bestSellers('value'); ?>],
          backgroundColor: [
            "rgba(239, 245, 66, 0.9)",
            "rgba(0, 255, 0, 0.9)",
            "rgba(66, 245, 236, 0.9)",
            "rgba(66, 96, 245, 0.9)",
            "rgba(126, 66, 245,0.9)"
          ],
          hoverbackgroundColor: [
            "rgba(239, 245, 66, 0.7)",
            "rgba(0, 255, 0, 0.7)",
            "rgba(66, 245, 236, 0.7)",
            "rgba(66, 96, 245, 0.7)",
            "rgba(126, 66, 245,0.7)"
          ]

        }],
        labels: [<?php echo $bestSellers('name'); ?>]
      },
      options: {
        responsive: true
      }
    });

  }
</script>