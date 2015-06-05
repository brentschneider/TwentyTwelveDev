'use strict';

var controllers = angular.module('myAppCtrlr.controllers', []);

controllers.controller('AppCtrl', function($scope){

	$scope.title = "Angular & Dribbble";
	$scope.description = "Using Angular to pull popular shots via the API from dribbble!";

})

controllers.controller('ShotsListCtrl', function($scope, $routeParams, $http){

	var list = $routeParams.list;
	
	$http.jsonp('http://api.dribbble.com/shots/'+ list +'?callback=JSON_CALLBACK').then(function(data){

		$scope.list = data.data;
		console.log(data);

	})

});

controllers.controller('ShotsUrlCtrl', function($scope, $http){
	
})