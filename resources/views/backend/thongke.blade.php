@extends('backend.layouts.master')
@section('content')
    <link rel="stylesheet" href="css/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="backend/js/morris.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <div>
        <h5 align="center">Thống kê số hóa đơn bán trong 30 ngày gần nhất</h5>
    </div>
    <div id="stats-container" style="height: 250px;"></div>
    <script>
        $(function () {

            // Create a function that will handle AJAX requests
            function requestData(days, chart) {
                $.ajax({
                    type: "GET",
                    dataType: 'json',
                    url: "admin/thongke", // This is the URL to the API
                    data: {days: days}
                })
                    .done(function (data) {
                        // When the response to the AJAX request comes back render the chart with new data
                        chart.setData(data);
                    })
                    .fail(function () {
                        // If there is no communication between the server, show an error
                        alert("error occured");
                    });
            }

            var chart = Morris.Bar({

                // ID of the element in which to draw the chart.
                element: 'stats-container',
                data: [0, 0, ], // Set initial data (ideally you would provide an array of default data)
                xkey: 'date',  // Set the key for X-axis
                ykeys: ['value'], // Set the key for Y-axis
                labels: ['Số hóa đơn'] // Set the label when bar is rolled over

            });

            // Request initial data for the past 7 days:
            requestData(30, chart);

            $('ul.ranges a').click(function (e) {
                e.preventDefault();

                // Get the number of days from the data attribute
                var el = $(this);
                days = el.attr('data-range');

                // Request the data and render the chart using our handy function
                requestData(days, chart);
            })
        });
    </script>
    <div id="container" data-order="{{ $orderYear }}"></div>
    <script>
        $(document).ready(function () {
            var order = $('#container').data('order');
            var listOfValue = [];
            var listOfYear = [];
            order.forEach(function (element) {
                listOfYear.push(element.getYear);
                listOfValue.push(element.value);
            });
            console.log(listOfValue);
            var chart = Highcharts.chart('container', {

                title: {
                    text: 'Thống kê số phiếu nhập kho trong 6 tháng gần nhất'
                },
                xAxis: {
                    categories: listOfYear,
                },

                series: [{
                    type: 'column',
                    colorByPoint: true,
                    data: listOfValue,
                    showInLegend: false
                }]
            });

            $('#plain').click(function () {
                chart.update({
                    chart: {
                        inverted: false,
                        polar: false
                    },
                });
            });

            $('#inverted').click(function () {
                chart.update({
                    chart: {
                        inverted: true,
                        polar: false
                    },
                    subtitle: {
                        text: 'Inverted'
                    }
                });
            });

            $('#polar').click(function () {
                chart.update({
                    chart: {
                        inverted: false,
                        polar: true
                    },
                    subtitle: {
                        text: 'Polar'
                    }
                });
            });
        });
    </script>
@endsection
