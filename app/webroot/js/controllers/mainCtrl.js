angular.module('mainCtrl', [])

.controller('mainController', function($scope, $http, Inquiry, $location) { 
  $scope.successMsg = false;
  $scope.test = 'rei';

  $scope.applicants = [];

  Inquiry.get()
    .success(function(data) {
      $scope.inqs = data;
      $scope.loading = false;
  });

  Inquiry.getApplicant()
    .success(function(data) {
      $scope.applicants = data;
  });
    
  $scope.getInquiry = function() {
  $scope.loading = true;
  Inquiry.get()
    .success(function(getData) {
        $scope.inqs = getData;
    });
  };
  // object to hold all the data for the new comment form
  $scope.inquiryData = {};

  // loading variable to show the spinning loading icon
  $scope.loading = true;

  // function to handle submitting the form
  $scope.submitInquiry = function() {
    $scope.loading = true;
    // save the comment. pass in comment data from the form
    Inquiry.save($scope.inquiryData)
      .success(function(data) {
        $scope.successMsg = true;
        $scope.inquiryData = {};
        window.location.replace('/contact');
      })
      .error(function(data) {
        console.log(data);
    });
  };

  $scope.predicate = '-id';
  $scope.showData = function(){
    $scope.curPage = 0;
    $scope.pageSize = 3;

    $scope.numberOfPages = function() {
        return Math.ceil($scope.applicants.length / $scope.pageSize);
    };    
  }

});