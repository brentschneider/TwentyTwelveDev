'use strict';

var controllers = angular.module('myAppCtrlr.controllers', []);

controllers.controller('AppCtrl', function ($scope){

	$scope.title = "Angular & Dribbble";
	$scope.description = "Using Angular to pull popular shots via the API from dribbble!";

});


controllers.controller('ShotsListCtrl', function ($routeParams, $scope, dribbble){

	var list = $routeParams.list;

	dribbble.list(list).then(function (data) {
		$scope.list = data.data;
		// console.log(data);
	});

	$scope.loadNextPage = function () {

		dribbble.list(list, {page: $scope.list.page + 1}).then(function (data){
			console.log(data);
			// $scope.list.page = data.data.page;

			$scope.list.page = data.data.page;
			$scope.list.shots = $scope.list.shots.concat(data.data.shots);
		});
	}

});




controllers.controller('ShotsUrlCtrl', function ($routeParams, $scope, dribbble){

	var id = $routeParams.id;

	dribbble.shot(id).then(function (data){

		$scope.shots = data.data;
		// console.log(data);

	});

});