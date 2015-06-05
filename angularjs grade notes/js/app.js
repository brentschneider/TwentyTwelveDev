"use strict";

var app = angular.module('myAppCtrlr', ['ngRoute','myAppCtrlr.controllers']);


app.config(function($routeProvider){

	$routeProvider
	.when("/shots/:id", {controller:"ShotsUrlCtrl", templateUrl: "partial/shots.html"})
	.when("/:list", {controller:"ShotsListCtrl", templateUrl: "partial/shots_list.html"})
	.otherwise({redirectTo:"/popular"})

});