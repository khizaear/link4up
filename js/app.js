var app = angular.module('app', ['ngRoute','simplePagination']);

app.config(['$routeProvider',
  function($routeProvider) {
    $routeProvider.
      when('/', {
        templateUrl: 'view/temp.html',
        controller: 'index'
      }).
      when('/phones', {
        templateUrl: 'partials/phone-list.html',
        controller: 'PhoneListCtrl'
      }).
      when('/subcat/:subcatId', {
        templateUrl: 'view/subcat.html',
        controller: 'subcat'
      }).
      when('/cat/:catId', {
        templateUrl: 'view/catprod.html',
        controller: 'catprod'
      }).
      otherwise({
        redirectTo: '/'
      });
	   
  }]);
  
	app.controller('index', function($scope,$http,Pagination) {			
		$http.get('cake/product/getall').success(function(data, status, headers, config) {
			console.log(data.length);

			$scope.datas=data;	
			$scope.pagination = Pagination.getNew();
			$scope.pagination.numPages = Math.ceil($scope.datas.length/$scope.pagination.perPage);

		});		
	});
	app.controller('catprod', function($scope,$http,$routeParams, $route) {	
		var subcat=$routeParams.catId
		$http.get('cake/product/catprod/'+subcat).success(function(data, status, headers, config) {			
			$scope.datas=data;	
		});		
	});
	app.controller('subcat', function($scope,$http,$routeParams, $route) {	
		var cat=$routeParams.subcatId
		$http.get('cake/product/getprod/'+cat).success(function(data, status, headers, config) {			
			$scope.datas=data;	
		});		
	});

	
	app.controller('categories', function($scope,$http) {		
		$http.get('cake/cat/getcat').success(function(data, status, headers, config) {
			$scope.datas=data;	
		});		
	});
	
	app.controller('catprod-manknit', function($scope,$http) {		
		$http.get('cake/cat/getprods/1/').success(function(data, status, headers, config) {
			$scope.mkt=data;	
		});		
	});
	
	