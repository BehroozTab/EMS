<html>
 <head>
      <!--
	   Author:Behrooz Tabrizian
	   -->
	    <title>Login</title>
		<link href="LoginFormat.css" rel="stylesheet" type="text/css"/>
  </head>
  <body style="background-color:rgb(240,240,240)">
  <?php
    unset($_SESSION);
    session_start();
    $_SESSION ['usertype'] = "";
    include "Includes/library.php"; 
    if(isset($_POST['logBot'])){
	      if(isset($_POST['username']) && !empty($_POST['username'])
	         && isset($_POST['password']) && !empty($_POST['password']))
	         {
              $str1 = $_POST['username'];
              $str2 = $_POST['password'];
     
              $query = "SELECT * FROM users where username = '".$str1."' and password = '".$str2."'";
              $result = $conn->query($query);
              $rows = mysqli_num_rows($result);     
                  if ($rows == 0) 
                  {	  
                    echo "<h3> The Username not found. </h3>";
                  }
                  else{
                      $row = mysqli_fetch_array($result);
                      $_SESSION ['usertype'] = $row ['usertype'];
                      header("location: App/App.php");
                      }
                    }
          else 
              echo "<h3> username or password is empty.</h3>";   
           }  
  ?>
  <div id="divform">
   <form name="LoginForm" id="LoginForm" action="" method="POST">
	   <fieldset id="Panel"> 
	   <fieldset id="LoginF"> 
	       <legend>Login</legend>
		   <label  class="BlockLabel">Username : 
		        <input type="text" name="username" id="username"/>
		   </label>
		   <label  class="BlockLabel">Password :
		        <input type="password" name="password" id="password"/>
		   </label>
	   </fieldset>
	   <input type="submit" name="logBot" id="logBot" value="submit" />
	   <input type="reset" id="CanBot" value="Cancel" />
	   </fieldset>
	   
  </div> 
	   
  <hr/>
  <div style = "text-align:center">Designed and Developed by Behrooz Tabrizian</div>  
  <hr/>
  <img src="Return_Img.png" id="im1"  alt="Return Image" usemap="#Returnmap" />
		<map id="Returnmap" name="Returnmap" >
		  <area shape="rect" coords="0, 0, 100, 50" href="../index.htm" alt="Home Page" />
		</map>
  </body>
</html>
