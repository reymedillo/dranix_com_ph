var myApp = angular.module('myApp', [
	'mainCtrl', 
	'mainService',
	'angularMoment',
	], function($interpolateProvider){
    $interpolateProvider.startSymbol('{[');
    $interpolateProvider.endSymbol(']}');
});