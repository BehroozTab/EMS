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
			  
		       var depno = document.getElementById("deptno").value
			         
		        if(!re.test(depno)) 
				{
		            alert( 'Departments Id should be an integer'  );
					retu = false;
					document.getElementById("deptno").value = "0";
				}
				
			return retu;
		  }
	 </script>
	    <link href="InsertFormat.css" rel="stylesheet" type="text/css"/>
  </head>
  <body>
  <?php
    include "../../Includes/library.php"; 
    if(isset($_POST['AddB'])){
	      if(isset($_POST['deptno']) && !empty($_POST['deptno'])
	         && isset($_POST['deptName']) && !empty($_POST['deptName']))
	         {
              $dno = $_POST['deptno'];
              $dnam = $_POST['deptName'];
			  $dphone = $_POST['deptPhone'];
		      $daddr = $_POST['deptAddr'];
     
              $query = "SELECT * FROM departments where deptno =$dno";
              $result = mysql_query($query);
              $rows = mysql_num_rows($result);     
                  if ($rows == 0) {
				  
                  $sql="INSERT INTO departments (deptno,deptName,deptPhone,deptAddr) 
				                         VALUES ($dno,'$dnam','$dphone','$daddr')";
	              mysql_query($sql);
                    echo "<h3> The department'information was inserted. </h3>";
                  }
                  else{
                       echo "<h3> This department_no is already there. </h3>";
                      }
                    }
          else 
              echo "<h3> Department no or name is empty.</h3>";   
           }  
  ?>
  <div id="div1">
  		  <form name="InsertForm" id="InsertForm" action="" method="POST" onsubmit = "return validate(this)">
		  <fieldset id="DepartmentFields"> 
		     <legend>Department Information</legend>
			  <label class="blockLabel">
			     Department Id<span>*</span>
     			 <input type="text" name="deptno" id="deptno" value="0" />
			 </label>
			 <label class="blockLabel">
			     Department Name<span>*</span>
     			 <input type="text" name="deptName" id="deptName" />
			 </label>
			 <label class="blockLabel">
			    Phone Number<span>*</span>
				<input type="text" name="deptPhone" id="deptPhone" />
			 </label>
			 <label class="blockLabel">
			    Address <span>*</span>
				<input type="text" name="deptAddr" id="deptAddr" />
			 </label>		
		 </fieldset>
		 <input type="submit" name="AddB" id="AddB" value="Add" />
		 <input type="reset"  id="CanB" value="Cancel" />
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
