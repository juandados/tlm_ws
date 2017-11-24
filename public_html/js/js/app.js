var script = document.createElement('script');
script.src = 'http://code.jquery.com/jquery-1.11.0.min.js';
script.type = 'text/javascript';
// Ionic Starter App

// angular.module is a global place for creating, registering and retrieving Angular modules
// 'starter' is the name of this angular module example (also set in a <body> attribute in index.html)
// the 2nd parameter is an array of 'requires'
angular.module('starter', ['ionic'])

.run(function($ionicPlatform) {
  $ionicPlatform.ready(function() {
    // Hide the accessory bar by default (remove this to show the accessory bar above the keyboard
    // for form inputs)
    if (window.cordova && window.cordova.plugins.Keyboard) {
      cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);
      cordova.plugins.Keyboard.disableScroll(true);
    }
    if (window.StatusBar) {
      // Set the statusbar to use the default style, tweak this to
      // remove the status bar on iOS or change it to use white instead of dark colors.
      StatusBar.styleLightContent();
    }
  });
})

// All this does is allow the message
// to be sent when you tap return
.directive('input', function($timeout) {
  return {
    restrict: 'E',
    scope: {
      'returnClose': '=',
      'onReturn': '&',
      'onFocus': '&',
      'onBlur': '&'
    },
    link: function(scope, element, attr) {
      element.bind('focus', function(e) {
        if (scope.onFocus) {
          $timeout(function() {
            scope.onFocus();
          });
        }
      });
      element.bind('blur', function(e) {
        if (scope.onBlur) {
          $timeout(function() {
            scope.onBlur();
          });
        }
      });
      element.bind('keydown', function(e) {
        if (e.which == 13) {
          if (scope.returnClose) element[0].blur();
          if (scope.onReturn) {
            $timeout(function() {
              scope.onReturn();
            });
          }
        }
      });
    }
  }
})


.controller('Messages', function($scope, $timeout, $ionicScrollDelegate) {

  $scope.showTime = true;

  var alternate,
    isIOS = ionic.Platform.isWebView() && ionic.Platform.isIOS();

/*
$scope.primerMensaje = function() {
    alternate=true;
    alert("boom");
    var d = new Date();
      d = d.toLocaleTimeString().replace(/:\d+ /, ' ');

        $scope.messages.push({
          userId: alternate ? '12345' : '54321',
          text: "$scope.data.message",
          time: d
        });
}
*/
    
var contador=-1;
var delay=500;
var usuario=localStorage.usuario;
var pregunta;
var contenido="";

  $scope.sendMessage = function() {
    //alternate = !alternate;
// pasando mensaje digitado por usuario:
    pregunta=JSON.parse('['+localStorage.Orden+']');
    contenido=$scope.data.message;
	  debugger;
	  dataString="usuario="+usuario+"&pregunta="+pregunta[contador]+"&contenido="+contenido+"&insert=";
    alternate=false;
    if(contenido.length>0)
    {
		$(document).ready(function(){
        $.ajax({
            type: "POST", url:"http://synaptica.tk/insertDiary.php",
            data: dataString,
            crossDomain: true,
            cache: false,
            beforeSend: function(){ $("#send").val('...');},
            success: function(data){
                if(data=="ok")
                {
                    //alert("inserted");
                }
                else if(data=="error")
                {
                    alert("error");
                }
                //alert($("#lista").get(0).innerHTML); 
            }
        });
        var d = new Date();
      	d = d.toLocaleTimeString().replace(/:\d+ /, ' ');

        $scope.messages.push({
          userId: alternate ? '12345' : '54321',
          text: $scope.data.message,
          time: d
        });
		});

// pasando mensaje desde base de datos:
      alternate=true;
        if(contador<pregunta.length){
			contador++;
		}else{
			alert("Gracias! Mañana seguimos nuestra charla");
			window.location ="/indexDiary.html";
		}
		
	
        dataString="id="+pregunta[contador]+"&query=";
		delete $scope.data.message;
        setTimeout(function() {
          //your code to be executed after 1 second
        $.ajax({
            //1 second
            type: "POST", url:"http://synaptica.tk/queryPregunta.php",
            data: dataString,
            crossDomain: true,
            cache: false,
            success: function(data){  
               debugger;
               var d = new Date();
              d = d.toLocaleTimeString().replace(/:\d+ /, ' ');

                $scope.messages.push({
                  userId: alternate ? '12345' : '54321',
                  text: data,
                  time: d
                });
                $ionicScrollDelegate.scrollBottom(true);    
            }
        });
            }, delay);
      
    }
  };


  $scope.inputUp = function() {
    if (isIOS) $scope.data.keyboardHeight = 216;
    $timeout(function() {
      $ionicScrollDelegate.scrollBottom(true);
    }, 300);

  };

  $scope.inputDown = function() {
    if (isIOS) $scope.data.keyboardHeight = 0;
    $ionicScrollDelegate.resize();
  };

  $scope.closeKeyboard = function() {
    // cordova.plugins.Keyboard.close();
  };


  $scope.data = {};
  $scope.myId = '12345';
  $scope.messages = [];

});
