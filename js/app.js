var app = angular.module('app', ['ngRoute','simplePagination','ngSanitize']);

app.config(['$routeProvider',
  function($routeProvider) {
    $routeProvider.
      when('/', {
        templateUrl: 'view/temp.html',
        controller: 'index'
      }).

      when('/subcat/:subcatId', {
        templateUrl: 'view/subcat.html',
        controller: 'subcat'
      }).
      when('/cat/:catId', {
        templateUrl: 'view/catprod.html',
        controller: 'catprod'
      }).
      when('/about-us', {
        templateUrl: 'view/about-us.html',
        controller: 'pageabout'
      }).
      when('/finished-leather', {
        templateUrl: 'view/finshedleathers.html',
        controller: 'finshedleathers'
      }).
      otherwise({
        redirectTo: '/'
      });
	   
  }]);
  
	app.controller('index', function($scope,$http,Pagination) {			
		$http.get('cake/product/getall').success(function(data, status, headers, config) {
			console.log(data.length);

			$scope.datas=data;	
			$scope.pagination = Pagination.getNew(24);
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
		$scope.clickedPage = function(value){
			$scope.activeValue = value;

		};
	});
	app.controller('pageabout', function($scope,$http,$sce) {		
		$http.get('cake/admin/get_pageabout').success(function(data, status, headers, config) {			
			$scope.datas=$sce.trustAsHtml(data.about);		
		});		
	});
	app.controller('finshedleathers', function($scope,$http,$sce, $location) {		
		$http.get('cake/admin/get_pagefinishedleather').success(function(data, status, headers, config) {			
		$scope.datas=$sce.trustAsHtml(data.about);

		});		
	});
	
	app.controller('catprod-manknit', function($scope,$http) {		
		$http.get('cake/cat/getprods/1/').success(function(data, status, headers, config) {
			$scope.mkt=data;	
		});		
	});
	
	
	app.controller('banner', function($scope,$location,$route) {		
	 $scope.locations = window.location;
	});
		
	app.controller('user', function($scope,$location,$route,$http) {		
	 $http.get('cake/admin/guser/').success(function(data, status, headers, config) {
			$scope.loguser=data;	
		});	
	});
	