<html>
 <head>
      <!--
	   Author:Behrooz Tabrizian
	   -->
	    <title>Report Data</title>
		<script type="text/javascript">	   
		  function validate()
           {	
               var retu = true;
		   
		       re = /\d{1,9}$/;
			  
		       var depno = document.getElementById("Searchdeptno").value
			         
		        if(!re.test(depno)) 
				{
		            alert( 'Department Id should be an integer'  );
					retu = false;
					document.getElementById("Searchdeptno").value = "0";
				}
				
			return retu;
		  }
	 </script>
	    <link href="UpdateFormat.css" rel="stylesheet" type="text/css"/>
  </head>
  
  <body>
  <div id="div1">
  		  <form name="InsertForm" id="InsertForm" action="" method="POST" onsubmit = "return validate(this)" >
		  <fieldset id="SearchFields"> 
		   <legend>Search by Department no</legend>
			  <label>
			     <input type="text" name="Searchdeptno" id="Searchdeptno" value="0"  />
		  		 <input type="submit" name="SearchB" id="SearchB" value="Search" />
			  </label>				 		 
		 </fieldset>
		 <?php
    include "../../Includes/library.php";
    session_start();	
    if(isset($_POST['SearchB'])){
	      if(isset($_POST['Searchdeptno']) && !empty($_POST['Searchdeptno']))	         
	         {
              $dno = $_POST['Searchdeptno'];     
              $query = "SELECT * FROM departments where deptno =$dno";
              $result = $conn->query($query);
              $rows = mysqli_num_rows($result);     
                  if ($rows == 0) {
                                echo "<p>There is no this Department no.</p>";
                                  }
                  else{
					    $row = mysqli_fetch_array($result);
						$_SESSION['deptno']=$row['deptno'];	
					  	echo '<fieldset id="DepartmentFields"> 
						       <legend>Department Information</legend>
			                   <label class="blockLabel">
			                     Department No: <label id="deptnoLa">'.$row['deptno'].'</label>
			                   </label>
			                   <label class="blockLabel">
			                     Department Name
     			                 <input type="text" name="deptName" id="deptName" value="'.$row['deptName'].'" />
			                   </label>
			                   <label class="blockLabel">
			                     Phone Number
				                 <input type="text" name="deptPhone" id="deptPhone" value="'.$row['deptPhone'].'" />
			                   </label>
			                   <label class="blockLabel">
			                     Address 
				                 <input type="text" name="deptAddr" id="deptAddr" value="'.$row['deptAddr'].'" />
			                   </label>		
		                       </fieldset>
		                       <input type="submit" name="DeleteB" id="DeleteB" value="Delete" />
							   <input type="submit" name="UpdateB" id="UpdateB" value="Update" />';
                      }
                    }
          else 
              echo "<p>Departmentno is empty.</p>";   
           } 
       if(isset($_POST['DeleteB'])){	
	      $query = "delete FROM departments where deptno = ".$_SESSION['deptno'];
              $result = $conn->query($query);
              echo "<p>department ".$_SESSION['deptno']." was deleted</p>"; 
	   }
       if(isset($_POST['UpdateB'])){	
	      $query = "update departments set deptName = '".$_POST['deptName'].
			                 "', deptPhone = '".$_POST['deptPhone'].
				           "', deptAddr = '".$_POST['deptAddr'].
					"' where deptno = ".$_SESSION['deptno'];
              $result = $conn->query($query);
              echo "<p>department ".$_SESSION['deptno']." was updated</p>"; 
	   }	   
  ?>

	</form>
   </div>
  <hr/>
  <div style = "text-align:center">Designed and Developed by Behrooz Tabrizian</div>  
  <hr/>
   <img src="Return_Img.png" id="im1"  alt="Return Image" usemap="#Returnmap" />
		<map id="Returnmap" name="Returnmap" >
		  <area shape="rect" coords="0, 0, 100, 50" href="../App.php" alt="Home Page" />
		</map>
  </body>
</html>
