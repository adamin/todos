$(function () {
        $.getJSON('/ajax/tasks', function (data) {
            
            console.log(data);

        // Create the chart
        $('#chartcontainer').highcharts({

            title: {
                text: 'Number of tasks created each month'
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                title: {
                    text: 'No. of tasks'
                }
            },
            legend: {
                enabled: false
            },
            series: [{
                    name: 'Tasks',
                    data: data
                //data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
            }, ]
        });
    });
});

var app = angular.module('app', [
    'tasks',
    'notes'
], function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});