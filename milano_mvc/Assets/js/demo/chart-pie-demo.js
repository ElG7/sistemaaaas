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


var nomProdStock = prodMenorStock.map(function (item) {
  return item.nombre_producto;
});

var cantProdStock = prodMenorStock.map(function (item) {
  return item.stock;
});

var ctx = document.getElementById("chart_poco_stock");
var chart_poco_stock = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: nomProdStock,
    datasets: [{
      data: cantProdStock,
      backgroundColor: ['#7952b3', '#ffb74d', '#4db6ac', '#ff7043', '#9e9e9e'],
      hoverBackgroundColor: ['#512da8', '#ffa726', '#00897b', '#e64a19', '#616161'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
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
  },
});


var nomProducto = prodMenosVendido.map(function (item) {
  return item.producto_nombre;
});

var prodVendidos = prodMenosVendido.map(function (item) {
  return item.productos_vendidos;
});


var ctx = document.getElementById("chart_menos_vendidos");
var chart_menos_vendidos = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: nomProducto,
    datasets: [{
      data: prodVendidos,
      backgroundColor: ['#3498db', '#e74c3c', '#2ecc71', '#f39c12', '#9b59b6'],
      hoverBackgroundColor: ['#2980b9', '#c0392b', '#27ae60', '#f1c40f', '#8e44ad'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
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
  },
});


