// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var nomProducto = prodMasVendido.map(function (item) {
  return item.producto_nombre;
});

var prodVendidos = prodMasVendido.map(function (item) {
  return item.productos_vendidos;
});
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: nomProducto,
    datasets: [{
      data: prodVendidos,
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#FF6384', '#FFCE56'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf', '#FF6384', '#FFCE56'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: true,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: true,
      position: 'bottom'
    },
    cutoutPercentage: 50,
  },
});
