'use strict';


var filters = angular.module('myAppCtrlr.filters', []);

// dependancie injection
filters.filter('myAppCtrlrDate', function($filter){
	
	return function(value, format){
		// returns date

		if (value) {
			value = Date.parse(value);
		}
		return $filter('date')(value, format);
	}
})