var myApp = angular.module('myApp', [
	'mainCtrl', 
	'mainService',
	'angularMoment',
	'angularUtils.directives.dirPagination'
	], function($interpolateProvider){
    $interpolateProvider.startSymbol('{[');
    $interpolateProvider.endSymbol(']}');
});