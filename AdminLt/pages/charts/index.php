<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <title></title>
   <!--  <script src="jquery.js"></script> -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/canvasjs/1.7.0/canvasjs.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {

            $.getJSON("data.php", function (result) {

                CanvasJS.addColorSet("colorSet4",
                [//colorSet Array
                "#648fff",                                                
                "#785ef0",
                "#dc267f",
                "#fe6100",
                "#ffb000"                
                ]);

                var chart = new CanvasJS.Chart("chartContainer", {

                    colorSet:"colorSet4",
                    width:1020,
                    height:520,
                    dataPointWidth: 50,

                     axisX:{
                     
                     labelFontWeight: "bold",
                     labelFontColor: "red",
                     titleWrap:"false"

                 },
                  axisY:{
                
                     labelFontWeight: "bold",
                     labelFontColor: "red",
                     titleWrap:"false",

                 },

                    title:{
                            text: "Products Sold Max",
                        },
                   

                    data: [
                        {
                            type: "bar",
                            fontSize:"10px",
                            fontStyle:"bold",
                            showInLegend: true,
                            fontColor:"black",
                            dataPoints: result
                        }
                    ]
                });

                chart.render();
            });
        });
    </script>
</head>
<body>

    <div id="chartContainer" style="width: 800px; height: 380px;"></div>

</body>
</html>