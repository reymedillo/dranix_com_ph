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
        getApplicant : function() {
            return $http.get('api/rapplicant');
        },
        getResume : function() {
            return $http.get('api/resume');
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
       }
    }
});


