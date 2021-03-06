//doughnut
var ctxD = document.getElementById("doughnutChart").getContext('2d');
var problems = document.getElementById("problems");
var ideas = document.getElementById("ideas");
var myLineChart = new Chart(ctxD, {
    type: 'doughnut',
    data: {
        labels: ["Ideas", "Problems"],
        datasets: [{
            data: [ideas.value, problems.value],
            backgroundColor: ["#F7464A", "#46BFBD"],
            hoverBackgroundColor: ["#FF5A5E", "#5AD3D1"]
        }]
    },
    options: {
        responsive: true
    }
});