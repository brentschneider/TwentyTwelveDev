"use strict";

var app = angular.module('myAppCtrlr', ['ngRoute','myAppCtrlr.controllers', 'myAppCtrlr.filters', 'myAppCtrlr.services']);


app.config(function($routeProvider){

	$routeProvider
	// individual shot
	.when("/shots/:id", {controller:"ShotsUrlCtrl", templateUrl: "partial/shots.html"})
	// default list of popular shots
	   .when("/:list", {controller:"ShotsListCtrl", templateUrl: "partial/shots_list.html"})
	.otherwise({redirectTo:"/popular"})

});