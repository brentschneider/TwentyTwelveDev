'use strict';

var controllers = angular.module('myAppCtrlr.controllers', []);

controllers.controller('AppCtrl', function($scope){

	$scope.title = "Angular & Dribbble";
	$scope.description = "Using Angular to pull popular shots via the API from dribbble!";

})


// Route for 
controllers.controller('ShotsListCtrl', function($routeParams, $scope, $http){

	var list = $routeParams.list;
	
	$http.jsonp('http://api.dribbble.com/shots/'+ list +'?callback=JSON_CALLBACK').then(function(data){

		$scope.list = data.data;
		console.log(data);

	})

});

controllers.controller('ShotsUrlCtrl', function($routeParams, $scope, $http){

	var id = $routeParams.id;
	
	$http.jsonp('http://api.dribbble.com/shots/'+ id +'?callback=JSON_CALLBACK').then(function(data){

		$scope.shots = data.data;
		console.log(data);

	})

});