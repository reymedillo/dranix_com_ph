var myApp = angular.module('myApp', [
	'mainCtrl', 
	'mainService',
	'angularMoment',
	'angularUtils.directives.dirPagination',
	'bootstrapLightbox'
	], function(){
    // $interpolateProvider.startSymbol('{[');
    // $interpolateProvider.endSymbol(']}');

});