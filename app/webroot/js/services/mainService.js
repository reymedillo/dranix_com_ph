angular.module('mainService', [])

.factory('Inquiry', function($http) {
  return {
    get : function() {
      return $http.get('api/inquiry');
    },
    save : function(inquiryData) {
      return $http({
        method: 'POST',
        url: 'api/inquiry',
        headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
        data: $.param(inquiryData)
      });
    },
    saveCart : function(product) {
      return $http({
          method: 'POST',
          url: '/carts',
          headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
          transformRequest: function(obj) {
          var str = [];
          for (var key in obj) {
              if (obj[key] instanceof Array) {
                  for(var idx in obj[key]){
                      var subObj = obj[key][idx];
                      for(var subKey in subObj){
                          str.push(encodeURIComponent(key) + "[" + idx + "][" + encodeURIComponent(subKey) + "]=" + encodeURIComponent(subObj[subKey]));
                      }
                  }
              }
              else {
                  str.push(encodeURIComponent(key) + "=" + encodeURIComponent(obj[key]));
              }
          }
          return str.join("&");
          },
          data: {itemId:product.id, itemName:product.name ,qty:1, price:product.price, total:product.price, session: product.session}
      });
    },
    getCarts : function() {
      return $http.get('/carts');
    },
    getApplicant : function() {
      return $http.get('api/rapplicant');
    },
    getResume : function() {
      return $http.get('api/resume');
    },
    getProducts : function() {
      return $http.get('api/products');
    },
    updateStatus : function(resumeData) {
      return $http({method:'PUT',url:'api/resume/' + resumeData.id,headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
       transformRequest: function(obj) {
       var str = [];
       for (var key in obj) {
           if (obj[key] instanceof Array) {
               for(var idx in obj[key]){
                   var subObj = obj[key][idx];
                   for(var subKey in subObj){
                       str.push(encodeURIComponent(key) + "[" + idx + "][" + encodeURIComponent(subKey) + "]=" + encodeURIComponent(subObj[subKey]));
                   }
               }
           }
           else {
               str.push(encodeURIComponent(key) + "=" + encodeURIComponent(obj[key]));
           }
       }
       return str.join("&");
       },
       data: resumeData
      });
    },
    updateCart : function(cart) {
      return $http({method:'PUT',url:'carts/' + cart.id,headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
       transformRequest: function(obj) {
       var str = [];
       for (var key in obj) {
           if (obj[key] instanceof Array) {
               for(var idx in obj[key]){
                   var subObj = obj[key][idx];
                   for(var subKey in subObj){
                       str.push(encodeURIComponent(key) + "[" + idx + "][" + encodeURIComponent(subKey) + "]=" + encodeURIComponent(subObj[subKey]));
                   }
               }
           }
           else {
               str.push(encodeURIComponent(key) + "=" + encodeURIComponent(obj[key]));
           }
       }
       return str.join("&");
       },
       data: {qty:cart.qty, total:cart.qty*cart.price}
      });
    }
  }
});


