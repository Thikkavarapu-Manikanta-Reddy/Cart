 var app = angular.module('app', ['ngRoute']);

        app.config(function ($routeProvider) {
             
            $routeProvider.when('/', {
                templateUrl: 'email.html',
                controller: 'emailController'
            }).when('/otp', {
                templateUrl: 'otp.html',
                controller: 'otpController'
            }).when('/logup', {
                templateUrl: 'logup.html',
                controller: 'logController'
            }).when('/dashboard', {
               templateUrl: 'modal1.php',
                controller: 'AppCtrl1'
            }).otherwise({
                redirectTo: "/"
            });
        });
        app.controller("emailController", function ($scope,$location,$http) {
           $scope.john = function()
           {
                $http.post("otp123.php",{
                  'maniemail':$scope.acemail
                }).then(function successCallback(response){
                    $scope.users = response.data;
                    });
                $location.path('/otp');
           }
        });
         app.controller("otpController", function ($scope,$location,$http) {
           $scope.otp123 =function()
           {
                $http({
            method: 'get',
            url: 'otpcheck.php'
            }).then(function successCallback(response) {
                $scope.checkotp = response.data;
                 var sam = $scope.checkotp;
              //console.log($scope.checkotp);
              if(sam == $scope.otp)
              {
                $location.path('/logup');
              }
              else
              {
                alert('Enter The Correct OTP');
              }
            });

           }
        });

        app.controller("logController", function ($scope, $location,$http) {
           
           $scope.submit = function () {
                
                // $scope.password;
                if($scope.password == $scope.confirmpassword)
                {
                  $http.post("insert.php",{
                  'username123':$scope.username,
                  'password123':$scope.password
                }).then(function(response){
                    $scope.users123 = response.data;
                    });
                $location.path('/dashboard');
                }
             else
             {
              alert('Password and ConfirmPassword are different');
               }

            }
            });
            /*app.controller("dashboardController", function ($scope,$location,$routeParams) {
           // $scope.username = $routeParams.username;  // using $routeParams to get the parameters of the url
           var url = $location.path().split('/');       // using $location to get the parameters of the url by spliting both will work.
           $scope.username=url[2];
        });*/
        

         app.controller('AppCtrl1', function ($scope, $location,$http,$window) {
            
              $('#myModal2').modal('show');
            
            
              
            
                
                 $scope.Amazon1 = function (Item) {
          
                  $http.post("amazon123.php",{
                  'a1mazon':Item
                }).then(function successCallback(response){
                    $scope.users55 = response.data;
                    var samil = $scope.users55;
                    var pin = 100;
                    if(samil == pin)
                    {
                        alert("You've reached maximum quantity of that product");
                    }
                    else
                    {
                      $window.location.reload();
                    }
                    //$location.path('/dashboard2');
                    });
                  
                  //$route.reload();
            }
            

            $scope.Discard = function (Item1) {

                $http.post("amazondelete.php",{
                  'a2mazon':Item1
                }).then(function successCallback(response){
                    //$scope.users333 = response.data;
                     $scope.users333 = 109;
                    $window.location.reload();

                    });


              }
                console.log($scope.users333);


            });
         
        /*app.controller("modalController", function ($scope, $location) {
           
            $scope.open = function () {
                $location.path('/save')
            };

        });*/
        