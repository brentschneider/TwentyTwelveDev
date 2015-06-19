'use strict';

// services module
var services = angular.module('myAppCtrlr.services', []);

// Factory associates a name

services.factory('dribbble', function ($http) {
  
  // takes a type and returns http jsonp call

  function load (path, params) {
    params = params || {};
    params.callback = "JSON_CALLBACK";
    return $http.jsonp("http://api.dribbble.com" + path, {params: params});
  }

  return {

    list: function (type, params) {
	  return load("/shots/" + type, params);
	},
	shot: function (id) {
	  return load("/shots/" + id);
	}

  }

});


