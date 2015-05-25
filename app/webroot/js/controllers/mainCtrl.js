angular.module('mainCtrl', [])

.controller('mainController', function($scope, $http, Inquiry, $location, Lightbox) { 
  $scope.successMsg = false;
  $scope.test = 'rei';
  $scope.listQty = [{id:1,value:1},{id:2,value:2},{id:3,value:3}];
  $scope.newPrice = '0';  

  $scope.applicants = [];
  $scope.cartData = {};


Inquiry.get()
  .success(function(data) {
    $scope.inqs = data;
    $scope.loading = false;
});

Inquiry.getProducts()
  .success(function(data) {
    $scope.products = data;
    $scope.loading = false;
});
    
Inquiry.getApplicant()
  .success(function(data) {
    $scope.applicants = data;
});

Inquiry.getCarts()
  .success(function(data) {
    $scope.carts = data;
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

$scope.submitCart = function(product) {
  var addToArray=true;
  for (var i = 0; i < $scope.carts.length; i++) {
    if ($scope.carts[i].itemId === product.id) {
      addToArray = false;
    }
  }

  if(addToArray){
    Inquiry.saveCart(product)
      .success(function(data) {
        Inquiry.getCarts()
          .success(function(getdata) {
          $scope.carts = getdata;
      });
    })
    .error(function(data) {
        console.log(data);
    });
    console.log('Item not yet exists in cart.');
  }
  else {
    console.log('Item already exist in current cart.');
  }
};

  $scope.updateStatus = function(id) {
    // update the status of applicant
    Inquiry.updateStatus(id)
    .success(function(data) {
      data.total = 100;
      Inquiry.get()
        .success(function(getData) {
          $scope.inqs = getData;
      });
    })
  };

$scope.updateQty = function(data) {
  Inquiry.updateCart(data)
    .success(function(data) {
    Inquiry.getCarts()
      .success(function(data) {
      $scope.carts = data;
    });
    })
    .error(function(data) {
      console.log(data);
    });
};
$scope.updateUom = function(data) {
  Inquiry.updateUom(data)
    .success(function(data) {
    Inquiry.getCarts()
      .success(function(data) {
      $scope.carts = data;
    });
  })
  .error(function(data) {
    console.log(data);
  });
};
$scope.updatePrice = function(id,itemId,uom,qty) {
  Inquiry.getUom(itemId,uom)
    .success(function(getData) {
    Inquiry.updatePrice(id,getData[0].price,qty)
      .success(function(data) {
      Inquiry.getCarts()
        .success(function(data) {
        $scope.carts = data;
      });
    })
    .error(function(data) {
      console.log(data);
    });
  });
};

$scope.deleteItem = function(data) {
  Inquiry.deleteCart(data)
    .success(function(data) {
    Inquiry.getCarts()
      .success(function(data) {
      $scope.carts = data;
    });
  });
};

$scope.showData = function(){
  $scope.curPage = 0;
  $scope.pageSize = 10;
  
  $scope.numberOfPages = function() {
      return Math.ceil($scope.applicants.length / $scope.pageSize);
  };
};

$scope.openLightboxModal = function (index) {

  Lightbox.openModal($scope.products, index);
};

$scope.netTotal = function() {
  var total = 0;
  angular.forEach($scope.carts, function(cart) {
      total += cart.qty*cart.price;
  })
  return total;
};

});