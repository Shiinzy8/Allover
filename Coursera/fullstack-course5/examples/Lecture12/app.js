(function () {
'use strict';

angular.module('MsgApp',[])
.controller('MsgController',MsgController);

MsgController.$inject = ['$scope', '$filter'];
function MsgController($scope, $filter) {
  $scope.name = "Yaakov";
  $scope.stateOfBeing = "hungry";
  $scope.cookieCost = .45;

  $scope.sayMessage = function () {
    var msg = "Yaakov likes to eat healthy snacks at night!";
    var output = $filter('uppercase')(msg);
    return output;
  };

  $scope.feedYaakov = function () {
     if ($scope.stateOfBeing == "fed") {
        $scope.stateOfBeing = "hungry";
     } else {
        $scope.stateOfBeing = "fed";
     }
 };
    $scope.hungryYaakov = function(){
        if ($scope.stateOfBeing == "fed") {
            $scope.stateOfBeing = "hungry";
        }
    };
}

})();