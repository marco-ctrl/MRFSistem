// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function (n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

graficarIngresos();
graficarEgresos();

function graficarIngresos() {
  $.ajax({
    type: "GET",
    url: "/MRFSistem/AccesoDatos/Ingresos/Graficar.php",
    success: function (responce) {
      console.log(responce);
      // Bar Chart Example
      var mes = [];
      var total = [];

      const ingresos = JSON.parse(responce);
      ingresos.forEach(cel => {
        mes.push(cel.mes);
        total.push(cel.total);
      });

      var ctx = document.getElementById("grf_ingresos");
      var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: mes,
          datasets: [{
            label: "Revenue",
            backgroundColor: [
              'rgba(82, 190, 128)',
              'rgba(82, 190, 128)'],
            hoverBackgroundColor: "#2e59d9",
            borderColor: [
              'rgba(82, 190, 128)',
              'rgba(82, 190, 128)'],
            data: total,
          }],
        },
        options: {
          maintainAspectRatio: false,
          layout: {
            padding: {
              left: 10,
              right: 25,
              top: 25,
              bottom: 0
            }
          },
          scales: {
            xAxes: [{
              time: {
                unit: 'month'
              },
              gridLines: {
                display: false,
                drawBorder: false
              },
              ticks: {
                maxTicksLimit: 6
              },
              maxBarThickness: 25,
            }],
            yAxes: [{
              ticks: {
                min: 0,
                max: 3000,
                maxTicksLimit: 5,
                padding: 10,
                // Include a dollar sign in the ticks
                callback: function (value, index, values) {
                  return 'Bs.' + number_format(value);
                }
              },
              gridLines: {
                color: "rgb(234, 236, 244)",
                zeroLineColor: "rgb(234, 236, 244)",
                drawBorder: false,
                borderDash: [2],
                zeroLineBorderDash: [2]
              }
            }],
          },
          legend: {
            display: false
          },
          tooltips: {
            titleMarginBottom: 10,
            titleFontColor: '#6e707e',
            titleFontSize: 14,
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            caretPadding: 10,
            callbacks: {
              label: function (tooltipItem, chart) {
                var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                return datasetLabel + ': Bs.' + number_format(tooltipItem.yLabel);
              }
            }
          },
        }
      });

    }
  });
}

function graficarEgresos() {
  $.ajax({
    type: "GET",
    url: "/MRFSistem/AccesoDatos/Egresos/Graficar.php",
    success: function (responce) {
      // Bar Chart Example
      var mes = [];
      var total = [];

      const ingresos = JSON.parse(responce);
      ingresos.forEach(cel => {
        mes.push(cel.mes);
        total.push(cel.total);
      });

      var ctx = document.getElementById("grf_egresos");
      var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: mes,
          datasets: [{
            label: "Revenue",
            backgroundColor: [
              '#EC7063',
              '#EC7063'],
            hoverBackgroundColor: "#2e59d9",
            borderColor: [
              '#EC7063',
              '#EC7063'],
            data: total,
          }],
        },
        options: {
          maintainAspectRatio: false,
          layout: {
            padding: {
              left: 10,
              right: 25,
              top: 25,
              bottom: 0
            }
          },
          scales: {
            xAxes: [{
              time: {
                unit: 'month'
              },
              gridLines: {
                display: false,
                drawBorder: false
              },
              ticks: {
                maxTicksLimit: 6
              },
              maxBarThickness: 25,
            }],
            yAxes: [{
              ticks: {
                min: 0,
                max: 3000,
                maxTicksLimit: 5,
                padding: 10,
                // Include a dollar sign in the ticks
                callback: function (value, index, values) {
                  return 'Bs.' + number_format(value);
                }
              },
              gridLines: {
                color: "rgb(234, 236, 244)",
                zeroLineColor: "rgb(234, 236, 244)",
                drawBorder: false,
                borderDash: [2],
                zeroLineBorderDash: [2]
              }
            }],
          },
          legend: {
            display: false
          },
          tooltips: {
            titleMarginBottom: 10,
            titleFontColor: '#6e707e',
            titleFontSize: 14,
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            caretPadding: 10,
            callbacks: {
              label: function (tooltipItem, chart) {
                var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                return datasetLabel + ': Bs.' + number_format(tooltipItem.yLabel);
              }
            }
          },
        }
      });

    }
  });
}

