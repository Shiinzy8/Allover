(function () {
'use strict';

angular.module('MsgApp', [])
.controller('MsgController', MsgController)
//этот фильтр мы передали в controller и можем его использовать внутри
.filter('loves', LovesFilter)
//регестрируем фильтр, а этот мы можем использовать в html
.filter('truth', TruthFilter);

//если я хочу исользовать свою функцию фильтра мне сначала надо ее написать потом прикрепить к model потом передать в controller
MsgController.$inject = ['$scope', 'lovesFilter'];
function MsgController($scope, lovesFilter) {
  $scope.stateOfBeing = "hungry";

  $scope.sayMessage = function () {
    var msg = "Yaakov likes to eat healthy snacks at night!";
    return msg;
  };

  $scope.sayLovesMessage = function () {
    //фильтр срабатывает только на первое совпадение
    var msg = "Yaakov likes likes to eat healthy snacks at night!";
    //здесь я уже ипользую свою функцию фильтра
    msg = lovesFilter(msg)
    return msg;
  };

  $scope.feedYaakov = function () {
    $scope.stateOfBeing = "fed";
  };
}

// функция которая опеределяет фильтрб она всегда должна возвращать саму функцию фильтра
function LovesFilter() {
  return function (input) {
    input = input || "";
    input = input.replace("likes", "loves");
    return input;
  };
}

function TruthFilter() {
  return function (input, target, replace) {
    input = input || "";
    input = input.replace(target, replace);
    return input;
  }
}

})();
