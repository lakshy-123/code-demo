
<?php

  require "conn.php";
  

  $data = $conn->query("SELECT * FROM tasks");


?>


<!DOCTYPE html>
<html>
	<head>
		<title>todos</title>
		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
		<link rel="stylesheet" href="style.css">

	</head>
	<style>
.form-inline{
margin-left:390px;
/* transition: box-shadow 0.3s ease; */
/* box-shadow:0 4px 15px -1px rgba(0, 0, 0 , 0.1),
0 2px 2px -4px rgba(0, 0, 0, 0.06); */
}
.btn-btn-default{
height:39px;
width:60px;
font-family:Verdana, Geneva, Tahoma, sans-serif;
background-color:skyblue;
color:white;
border:none;
border-radius:3px;
box-shadow:0 4px 15px -1px rgba(0, 0, 0 , 0.1),
0 2px 2px -4px rgba(0, 0, 0, 0.06);
cursor:pointer;
transition: box-shadow 0.3s ease;
}
.btn-btn-default:hover{
	background-color:dodgerblue;
}
.table{
border:transparent;
background-color:#ffffff;
font-family:Verdana, Geneva, Tahoma, sans-serif;
border-radius:8px;
box-shadow:0 4px 10px rgba(0, 0, 0, 0.1),
0 2px 4px -2px rgba(0, 0, 0, 0.06);
transition: box-shadow 0.3s ease;
margin-top:10px;
}
.table:hover{
	box-shadow: 0 8px 20px  rgba(0, 0, 0, 0.15);
}

	</style>
	<body>
        <div class="container">
		<form method="POST" action="insert.php" class="form-inline" id="user_form">
		 
		  <div class="form-group mx-sm-3 mb-2">
		    <!-- <label for="inputPassword2" class="sr-only">create</label> -->
		    <input name="mytask" type="text" class="form-control" id="task" placeholder="enter task">
		  </div>
		   <input type="hidden" name="action" id="action" /> 
		      <input type="submit" name="button_action" id="button_action" class="btn-btn-default" value="Create" />
		</form>

		<table class="table">
		  <thead>
		    <tr>
		      <th>Step</th>
		      <th>Task Name</th>
		      <th>Delete</th>
			  <th>Update</th>
		    </tr>
		  </thead>
		  <tbody>
		  	 <?php while($rows = $data->fetch(PDO::FETCH_OBJ)): ?>   
		    <tr>
		   
		     <td><?php echo $rows->id; ?></td>
		     <td><?php echo $rows->name; ?></td>
		     <td><a href="delete.php?del_id=<?php echo $rows->id; ?>" class="btn btn-danger">delete</a></td>
			 <td><a href="update.php?upd_id=<?php 
			 echo $rows->id; ?>" class="btn btn-danger">update</a></td>

		    </tr>
		<?php endwhile; ?>


		  </tbody>
		</table>
	</div>



		<script type="text/javascript">
			 $('#user_form').on('submit', function(event){  
                event.preventDefault();  
                var name = $('#task').val();  
      
                if(name != '')  
                {  
                	//console.log(name);
                     $.ajax({  
                          url:"insert.php",  
                          method:'POST',  
                          data:new FormData(this),  
                          contentType:false,  
                          processData:false,  
                          success:function(data)  
                          {  
                               alert(data);  
                                
                               
                               $("#action").val("Insert");  
                                $('#button_action').val("Insert");  
                                 
                          }  
                     });  
                }  
                else  
                {  
                     alert("Both Fields are Required");  
                }  
           });  

		</script>

	</body>
</html>