<?php
include 'Functions.php';
session_start();

$_SESSION["foo"] ="foo"; 
?>



<?=navbar('Login')?>

<div class='container'>



    
    <formmethod="post" action="#">
        <div class="form-input">
            <input type="text" name="username" placeholder="Enter your User Name">
        </div>
        
        <div class="form-input">
             <input type="password" name="password" placeholder="Enter your Passsword">
        </div>
        
        <input onclick='employeeLogin("foo")' type="submit" type="submit" value="LOGIN" class="btn-login">
        
    </form>


    <form action=''>
            <label for='fname'></label>
            <input type='button' value ='employeeLogin' id='' name='foo' onclick="employeeLogin(document.getElementById('returnBox').innerHTML)">
          </form>
    
    <span id='returnBox'>foo</span>

</div>

<?php 

$servername = "localhost";
$username = "root";
$password = "teamyellow";
$db = "coffee_emps";

$conn = new mysqli($servername, $username, $password, $db);
 
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
  
$sql = "SELECT * FROM loginfrom";
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo $row["User"]. $row["Pass"]. "<br>";
  }
} else {
  echo "0 results";
}
  ?>




<!---
  
 if(isset($_POST['username'])){
    
    $uname=$_POST['username'];
    $password=$_POST['password'];
    
    $sql="select * from loginfrom where user='".$uname."'AND Pass='".$password."' limit 1";
    
    $result=mysql_query($sql);
    
    if(mysql_num_rows($result)==1){
        echo " You Have Successfully Logged in";
        exit();
    }
    else{
        echo " You Have Entered Incorrect Password";
        exit();
    }
        
}
?> 
  -->
  </body>

  <script>

function employeeLogin(str) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("returnBox").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "employeeLogin.php?q=" + str, true);
    xmlhttp.send();
  }
</script>
    
</html>
