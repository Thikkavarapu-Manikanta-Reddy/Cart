 var app = angular.module('app', ['ngRoute']);

        app.config(function ($routeProvider) {
             
            $routeProvider.when('/', {
                templateUrl: 'main.html',
                controller: 'emailController'
            }).otherwise({
                redirectTo: "/"
            });
        });
  app.controller("emailController", function ($scope) {

           //$(window).on('load',function(){
        //$('#myModal').modal('show');
        //});
    $('#myModal').modal('show');
});

        

       
    