
$(document).ready(function(){
    $.getJSON({
        url: "http://localhost:8080/Project/MyCutMyTime/data.php",
        method: "GET",
        success: function(data) {
            console.log(data);
            var orders = [];
            var servicedescription = [];


            for(var i in data) {
                orders.push(data[i].orders);
                servicedescription.push(data[i].servicedescription);
            }

            var chartdata = {
                labels: servicedescription,
                datasets : [
                    {
                        label: 'Number of appointments',
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'],

                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth:1,
                        hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                        hoverBorderColor: 'rgba(200, 200, 200, 1)',
                        data: orders
                    }
                ]
            };

            var ctx = $("#mycanvas");

            var barGraph = new Chart(ctx, {
                type: 'doughnut',
                animation:{
                    animateScale:true,
                    animateRotate:true,
                },
                data: chartdata,
                options: {
                    responsive:'true',
                    scales: {
                        // yAxes: [{
                        //     ticks: {
                        //         beginAtZero:true
                        //     }
                        // }]
                    }
                }

            });


        },
        error: function(data) {
            console.log(data);
        }
    });
});