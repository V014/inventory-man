const xValues = ["Chairs", "Computers"];
const yValues = [100000, 4000000,];
const barColors = ["green","blue"];

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