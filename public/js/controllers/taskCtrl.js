var tasks = angular.module('tasks', []);

tasks.controller('TaskCtrl', ['$scope', '$http', '$window', function ($scope, $http, $window)
    {
        $scope.clickRow = function (location) {
            window.location.href = location;
        };
    }
]);