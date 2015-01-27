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
	app.controller('subcat', function($scope,$http,$routeParams, $route) {	
		var subcat=$routeParams.subcatId
		$http.get('cake/product/getprod/'+subcat).success(function(data, status, headers, config) {			
			$scope.datas=data;	
		});		
	});
	
	app.controller('categories', function($scope,$http) {		
		$http.get('cake/cat/getcat').success(function(data, status, headers, config) {
			$scope.datas=data;	
		});		
	});
	
	