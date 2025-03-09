const xValues = ["Warehouse", "Chairs", "Computers"];
const yValues = [5000000, 100000, 4000000,];
const barColors = ["red","green","blue"];

new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Available Inventory 2025"
    }
  }
});