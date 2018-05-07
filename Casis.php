<html>
  <head>
    <script type="text/javascript">

      function work() {
   var BCN = navigator.appCodeName;
   var BN =  navigator.appName ;
   var BV =  navigator.appVersion ;
   var CE = navigator.cookieEnabled ;
   var p =  navigator.platform ;
   var UAH = navigator.userAgent ;
   var UAL = navigator.systemLanguage;
   var BL = navigator.language ;
   var BE = navigator.product;

n = new Date();
n = n.getTimezoneOffset();
n = n/60;
n = "GMT - " + n;
   var TZ = n;   //time zone 
   var LS, SS;
   if(localStorage.length == 0){
   LS = "no";
    }else{
   LS = "yes";
    }
   if(sessionStorage.length > 0){
   SS= "yes";
    }else{
   SS = "no";
    }

    //web GL Vendor
    var canvas = document.createElement("canvas");
    var gl = canvas.getContext("webgl") || canvas.getContext("experimental-webgl");
        WV = gl ? gl.getParameter(gl.VENDOR) : "Deprected Browser";
   // total num of plugins 
    var PL=navigator.plugins.length; 
   // height & width
    var W = screen.width;
    var H = screen.height;
      

   
        //array of web values
        var a = [BCN, BN, BV, CE, p, UAH, UAL, BL, BE, TZ,LS,SS, WV , 
                      PL,H, W ]
        //list of plugins
        var k = 16;
        for(var i=0; i<PL; i++){
            a[k + i] = navigator.plugins[i].name ; 
        }
        var formE = document.getElementById("id").value = a ;
      }

    </script>
  </head>

<body  onload="work()" >
    <form name="myform" action="ex4.php" method="GET">
     <input name="Submit" id="submitBtn" type="submit" value="send"/>
     <input type="hidden" name="id" id="id" value="">
    </form>
</body>
</html>