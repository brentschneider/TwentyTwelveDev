'use strict';


// function AppCtrl ($scope) {
// 	$scope.name = "to me";
// }

var controllers = angular.module('myAppCtrlr.controllers', []);

controllers.controller('AppCtrl', function($scope){

	$scope.name = "to me";

})

controllers.controller('ShotsListCtrl', function($scope, $http){
	
	$scope.list;
	
	$http.jsonp('http://api.dribbble.com/shots/popular?callback=JSON_CALLBACK').then(function(data){
		console.log(data);
	})

})