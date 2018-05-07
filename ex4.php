




<?php 

//echo $_POST["txt"];

$ser = "localhost";
$user = "root";
$pass = "A255175a!";
$db = "casis_study";

$con = mysqli_connect($ser,$user, $pass, $db) or die("connection Failed");

$myArray = explode(',',  $_GET['id']);
$JsArray = $myArray;
//print_r( array_values( $myArray ));      //this is used to see all in the array
/*
$values = "'". $myArray[0];                //makes submiting the values to the DB easier
  for ($x = 1; $x < 16; $x++) {            
    $values =  $values . "','". $myArray[$x];
  }
$values = $values."'";


$sql = "INSERT INTO webdata(BrowserCN, BrowserName, BrowserVersion, CookiesEnabled, Platform, UserAgentHeader, UserAgentLanguage,
                 BrowserLanguage, BrowserEngineName, TimeZone, LocalStorageUse, SessionStorageUse, WebGLVendor, TotalPlugins, ScreenHeight, ScreenWidth)
        values($values)";
check($con,$sql);
//echo "new entry to webdata <br>";
$sql = "SELECT entry FROM webdata WHERE entry in (SELECT MAX(entry) FROM webdata)";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = $result->fetch_assoc()) {
        $entry = $row["entry"];
        //echo "entryNum: ". $entry."<br>";
    }
}
$y = 16;
if ($myArray[13] > 0) { //0 means no plugins found
	for ($i=0; $i < $myArray[13]; $i++) { 
     $plug = $myArray[$y + $i];
     //echo "plug: ".$plug."<br>";
	   $sql = "SELECT pIndex from pluginlibrary where description = '$plug' " ;
	   $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
      while($row = $result->fetch_assoc()) {
         //echo "pIndex: " . $row["pIndex"]."<br>";
         $pIndex = $row["pIndex"];
         $sql = "INSERT into pluginlog(Entry, pIndex) values($entry, $pIndex)";
         check($con,$sql);
        // echo "new entry to pLog <br>";
      }
		}else{
		//if plugin is not in database register it
			$sql = "INSERT into pluginlibrary(description) values('$plug')";
			check($con,$sql);
      //echo "new entry to library <br>";
       $sql = "SELECT pIndex from pluginlibrary where description = '$plug' " ;
       $result = mysqli_query($con, $sql);
       if (mysqli_num_rows($result) > 0) {
          while($row = $result->fetch_assoc()) {
           // echo "pIndexx: " . $row["pIndex"]."<br>";
            $pIndexx = $row["pIndex"];
            $sql = "INSERT into pluginlog(Entry, pIndex) values('$entry','$pIndexx')";
            check($con,$sql);
            //echo "new entry to pLog <br>";
          } 
        }
      
	  }
  }

}
*/
function check( $con, $sql){
	if ($con->query($sql) === TRUE) { 
	   //echo "success, " ;
	}else{
  	echo "Error: " . $sql . "<br>" . $con->error. "<br>"; 
	}
}

$con->close();
 ?>









 <div id="example"></div>
	
<script>
  var txt = "<p>Browser CodeName: <br> " + " <?php echo $JsArray[0] ?> " + "</p>";
   txt+= "<p>Browser Name: <br> " + " <?php echo $JsArray[1] ?> " + "</p>";
   txt+= "<p>Browser Version: <br> " + " <?php echo $JsArray[2] ?> " + "</p>";
   txt+= "<p>Cookies Enabled: <br> " + " <?php echo $JsArray[3] ?> " + "</p>";
   txt+= "<p>Platform: <br> " + " <?php echo $JsArray[4] ?> "+ "</p>";
   txt+= "<p>User-agent header:  <br>" + " <?php echo $JsArray[5] ?> " + "</p>";
   txt+= "<p>User-agent language: <br> " +" <?php echo $JsArray[6] ?> " + "</p>";
   txt+= "<p>Browser language: <br> " + " <?php echo $JsArray[7] ?> " + "</p>";
   txt+= "<p>Browser's Engine Name: <br> " + " <?php echo $JsArray[8] ?> " + "</p>";
   txt+= "<p>Time-Zone: <br> " + " <?php echo $JsArray[9] ?> " + "</p>";
   txt+= "<p> Use of local storage: <br> " + " <?php echo $JsArray[10] ?> " + "</p>";
   txt+= "<p> Use of session storage: <br> " + " <?php echo $JsArray[11] ?> " + "</p>";
   txt+= "<p> web GL Vendor: <br> " + " <?php echo $JsArray[12] ?> " + "</p>";
   txt+= "<p> Screen Size: <br> " + " <?php echo $JsArray[15] ?> " +" x "+" <?php echo $JsArray[14] ?> "+ "</p>";
   txt+="<p> Total plugin installed: "+ " <?php echo $JsArray[13] ?> " +"<p>";
   txt+="Installed plugins->"+"<br>";
var count = " <?php echo $JsArray[13] ?> ";
          for(var i=0;i<count;i++){
          txt+=navigator.plugins[i].name  + "<br/>"; 
          }
document.getElementById("example").innerHTML= txt;



</script>
