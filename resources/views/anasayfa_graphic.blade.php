<script>
    window.onload = function() {

        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            theme: "light1", // "light1", "light2", "dark1", "dark2"
            title: {
                text: "Musteri Yonetim Paneli"
            },
            axisY: {
                title: "Total Customers Per User",
                //suffix: "%"
            },
            axisX: {
                title: "Users"
            },
            data: [{
                type: "column",
                yValueFormatString: "##\"customers\"",
                dataPoints: [{
                        label: "User1",
                        y: 7
                    },
                    {
                        label: "User2",
                        y: 6
                    },
                    {
                        label: "User3",
                        y: 5
                    },
                    {
                        label: "User4",
                        y: 4
                    },
                    {
                        label: "User5",
                        y: 3
                    },
                    {
                        label: "User6",
                        y: 2
                    },
                    {
                        label: "Other Users",
                        y: 1
                    },

                ]
            }]
        });
        chart.render();

    }
</script>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
