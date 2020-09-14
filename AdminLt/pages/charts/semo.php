<?php
?>
<html>
<link rel="stylesheet" type="" href="">>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<hr />
<canvas id="donut-chart-example"></canvas>
<hr />
Palettes borrowed from:<br />
<a href="https://blog.graphiq.com/finding-the-right-color-palettes-for-data-visualizations-fcd4e707a283">
    Finding the Right Color Palettes for Data Visualizations
</a>
<script>
	 $(document).ready(function () {
            showGraph();
        });

	 function showGraph()
        {
            {
                $.post("data.php",
                function (data)
                {
                    console.log(data);
                     var item_name = [];
                    var sold = [];

                    for (var i in data) {
                        item_name.push(data[i].item_name);
                        sold.push(data[i].sold);
                    }



pluscharts.draw({
    drawOn : "#donut-chart-example",
    type: "donut",
    dataset : {
        data: [
            {
                label: "IE",
                value: 70
            },
            {
                label: "Chrome",
                value: 50
            },
            {
                label: "Firefox",
                value: 30
            },
            {
                label: "Safari",
                value: 20
            }
        ],
        backgroundColor: ["#fff09d", "#5d62b4", "#f9b5c2", "#04d59f"],
        borderColor: "#ffffff",
        borderWidth: 0,
    },
    options: {
        width: 60,
        text: {
            display: false,
            color: "#f6f6f6"
        },
        legends: {
            display: true,
            width: 20,
            height: 20
        },
        size: {
            width: '400', //give 'container' if you want width and height of initiated container
            height: '400'
        }
    }
})

})

            }}

</script>

<script src="inv.js"></script>

</html>
