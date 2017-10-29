var app = angular.module('mainModule', []);

app.controller('formController', function($scope,$filter,$locale) {
	$scope.currentYear = new Date().getFullYear()
	$scope.currentMonth = new Date().getMonth() + 1
	$scope.months = $locale.DATETIME_FORMATS.MONTH

  $scope.showMe = true;
  $scope.cardName = /^[a-zA-Z ]{1,25}$/;
  $scope.ccinfo = {type:undefined}
  $scope.ccinfo.type = "default";
  $scope.cardImg = 'default';

  $scope.save = function(data){
		if ($scope.numberForm.$valid){
      alert("Ваши данные успешно отправлены в консоль!");
      console.log(data);
		}
	}
 	$scope.myFunc = function() {
        $scope.showMe = false;
    }

  $scope.$watch('ccinfo.number', function(num) {
    if(num) $scope.ccinfo.number = standardFormat(num);
  });

  $scope.$watch('name', function(val) {
    $scope.name = $filter('uppercase')(val);
  }); 

  $scope.$watch('nameSecond', function(val) {
    $scope.nameSecond = $filter('uppercase')(val);
  });

});

standardFormat = function(num) {
  if (num[14] === ' ') {
    if (num.length > 18) {
      return num.slice(0, 19);
    }
  }
  if ((num.length === 5 || num.length === 10 || num.length === 15) && num[num.length - 1] !== ' ') {
    return num.slice(0, -1) + ' ' + num[num.length - 1];
  } else if ((num.length === 6 || num.length === 11 || num.length === 16) && num[num.length - 2] !== ' ') {
    return num.slice(0, -2) + ' ' + num.slice(num.length - 2);
  } else if ((num.length === 7 || num.length === 12 || num.length === 17) && num[num.length - 3] !== ' ') {
    return num.slice(0, -3) + ' ' + num.slice(num.length - 3);
  } else if ((num.length === 8 || num.length === 13 || num.length === 18) && num[num.length - 4] !== ' ') {
    return num.slice(0, -4) + ' ' + num.slice(num.length - 4);
  } else if ((num.length === 9 || num.length === 14 || num.length === 19) && num[num.length - 5] !== ' ') {
    return num.slice(0, -5) + ' ' + num.slice(num.length - 5);
  } else {
    return easeDelete(num);
  }
};

easeDelete = function(num) {
  if (num[num.length - 1] === ' ') {
      return num.slice(0, -1);
    } else {
      return num;
  }
};

angular.module('mainModule').directive ( 'creditCardType', function() {
  var directive = { 
  	require: 'ngModel'
  	, link: function(scope, elm, attrs, ctrl) {
        ctrl.$parsers.unshift(function(value){
          scope.ccinfo.type = (/^3/.test(value)) ? "AmericanExpress": (/^4/.test(value)) ? "Visa"
            : (/^5/.test(value)) ? 'MasterCard': (/^6/.test(value)) ? 'DiscoverCard'
            :undefined
         ctrl.$setValidity('invalid',!!scope.ccinfo.type)

	       if(scope.ccinfo.type != undefined) scope.cardImg = scope.ccinfo.type;
			   else scope.cardImg = "default"
          return value
        })
      }
    }
    return directive
});

angular.module('mainModule').directive('cardExpiration', function(){
    var directive = { 
    	require: 'ngModel'
      , link: function(scope, elm, attrs, ctrl){

          scope.$watch('[ccinfo.month,ccinfo.year]',function(value){
            ctrl.$setValidity('invalid',true)
            if ( scope.ccinfo.year == scope.currentYear
                 && scope.ccinfo.month <= scope.currentMonth
               ) {
              ctrl.$setValidity('invalid',false)
            }
            return value
          },true)

        }
      }
    return directive
    }
  )

angular.module('mainModule').filter( 'range', function() {
      var filter = function(arr, lower, upper) {
          for (var i = lower; i <= upper; i++) arr.push(i)
          return arr
        }
      return filter
    }
  )

angular.module('mainModule').directive('validNumber', function(){
      var directive = { 
        require: 'ngModel'
        , link: function(scope, elm, attrs, ngModelCtrl){
            if(!ngModelCtrl) {
              return; 
            }

            ngModelCtrl.$parsers.push(function(val) {
              if (angular.isUndefined(val)) {
                var val = '';
              }
              var clean = val.replace(/[^-0-9 \.]/g, '');
              if (val !== clean) {
                ngModelCtrl.$setViewValue(clean);
                ngModelCtrl.$render();
              }
              return clean;
            });
          }
        }
      return directive
      }
    )

angular.module('mainModule').directive('validString', function(){
      var directive = { 
        require: 'ngModel'
        , link: function(scope, elm, attrs, ngModelCtrl){
            if(!ngModelCtrl) {
              return; 
            }

            ngModelCtrl.$parsers.push(function(val) {
              if (angular.isUndefined(val)) {
                var val = '';
              }

              var clean = val.replace(/[^a-zA-Z]/g, '');
              if (val !== clean) {
                ngModelCtrl.$setViewValue(clean);
                ngModelCtrl.$render();
              }
              return clean;
            });
          }
        }
      return directive
      }
    )