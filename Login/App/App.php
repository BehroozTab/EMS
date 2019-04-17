<html>
 <head>
      <!--
	   Author:Behrooz Tabrizian
	   -->
	  <title>Employee Management System Demo</title>
	  <link href="AppFormat.css" rel="stylesheet" type="text/css"/>
  </head>
  <body >
    
    <?php
      session_start();
      //include "Includes/library.php"; 
      if(isset($_SESSION ['usertype'])){
		    if($_SESSION ['usertype'] == 'Admin'){
		       echo	'<p style = "text-align:center">';
	           echo '<a href="Insertdata\InsertD.php" id="l">Insert Department Information   </a>';
	           echo '<a href="Updatedata\UpdateD.php" id="l" >Update Department Information</a>';
	           echo '<a href="Insertdata\InsertE.php" id="l"> Insert Employee Information    </a>';
	           echo '<a href="Updatedata\UpdateE.php" id="l" > Update Employee Information    </a>';
	           echo ' </p>';
	                                   }}
      else 
              echo "Error";    
     ?>    
      <p style = "text-align:center">
        <a href="Searchdata\SearchD.php" id="l">Search Department Information</a>
	    <a href="Reportdata\ReportD.php" id="l">Report Department Information</a>
		<a href="Searchdata\SearchE.php" id="l">Search Employee Information</a>
	    <a href="Reportdata\ReportE.php" id="l">Report Employee Information</a>
	  </p>
     
	   <div style = "text-align:center"><img id="im1" src="1.jpg" alt="Employee Management System Image"/></div>
     
	 <hr/>
     <div style = "text-align:center">Designed and Developed by Behrooz Tabrizian</div>  
     <hr/>
	  <a href="Logout.php" id="l" >Logout</a>
  </body>
</html>