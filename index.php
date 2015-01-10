<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<script type="text/javascript" src="assets/js/jquery-1.7.1.min.js"></script>

<style>
.left_side{
width:500px;
height:auto;
background-color:#C4ECFF;
float:left;
}

.right_side{
width:500px;
height:auto;
background-color:#C4ECFF;
float:left;
}
</style>
</head>

<body>
<div id="container">
<h1>Configure</h1>
<form autocomplete="off" class="myform" id="myForm" enctype="multipart/form-data" action="" method="post" name="myForm">

<div class="box">
<h2 style="margin-left:20px;">General Information</h2>

<div align="center">
<label>Table</label>
<input type="text" name="table_name" class="basic_design" />
<label>Controller</label>
<input type="text" name="controller_name" class="basic_design" />
<label>Model</label>
<input type="text" name="model_name" class="basic_design" />
<label>Primary Key</label>
<input type="text" name="primary_key" class="basic_design" /><br />
<input type="checkbox" name="join" value="1" />Join Table
<input type="checkbox" name="list_by_date" value="1" />Get List Based On Date Range

</div>

<div align="center" style="margin-top:30px;">
<label>Date Field</label>
<input type="text" name="date_field_name" class="basic_design" />
<label>Tables To Join</label>
<input type="text" name="join_table" class="basic_design" />
<label>Foreign Fields To Join</label>
<input type="text" name="join_field" class="basic_design" />
<label>Local Fields To Join</label>
<input type="text" name="current_field" class="basic_design" />
</div>

<div align="center" style="margin-top:30px;">
<label>Order By</label>
<input type="text" name="order_by" class="basic_design" />
<label>Order Type</label>
<select name="order_type" class="element_design">
<option value="ASC">ASC</option>
<option value="DESC">DESC</option>

</select>

</div>


</div>

<br />
<?php $input= 5; 

for($i = 0; $i < $input ; $i++){

?>

<!-- Begining of Box -->
<div class="box">


<!-- Begining of Right Side -->
<div class="left_side">
<h2 style="margin-left:20px;">Field Details <?php echo $i+1 ;?></h2>
<label class="label">Label Name</label>
<input type="text" name="label_<?php echo $i+1 ;?>" class="element_design" /> <br />
<label class="label">Input Name</label>
<input type="text" name="input_<?php echo $i+1 ;?>" class="element_design" /> <br />
<label class="label">Input Type</label>
<select name="input_type_<?php echo $i+1 ;?>" rel="<?php echo $i+1 ;?>" class="element_design input_type">
<option value="">Select</option>
<option value="text">Text</option>
<option value="dropdown">Dropdown</option>
<option value="textarea">Text Area</option>
<option value="password">Password</option>
</select>
<span style="display:none;" id="populate_<?php echo $i+1 ;?>">
<label class="label">Dropdown Populate</label>
<select name="populate_from_<?php echo $i+1 ;?>" rel="<?php echo $i+1 ;?>" class="element_design populate_from">
<option value="">Select</option>
<option value="database">Database</option>
<option value="regular">Regular</option>
</select>
</span>


<span style="display:none;" id="dropdown_info_<?php echo $i+1 ;?>">
<label class="label">ID Feild</label>
<input type="text" name="dropdown_tbl_id_<?php echo $i+1 ;?>" class="element_design" />
<label class="label">Value Field</label>
<input type="text" name="dropdown_tbl_value_<?php echo $i+1 ;?>" class="element_design" /><br />
<label class="label">Table</label>
<input type="text" name="dropdown_tbl_name_<?php echo $i+1 ;?>" class="element_design" />
</span>

</div>
<!-- End of Left Side -->

<!-- Begining of Right Side -->
<div class="right_side">
<h2 style="margin-left:20px;">Validation Rules</h2>
<input type="checkbox" name="is_required_<?php echo $i+1 ;?>" value="1" />Required
<input type="checkbox" name="valid_email_<?php echo $i+1 ;?>" value="1" />Valid Email
<input type="checkbox" name="is_numeric_<?php echo $i+1 ;?>" value="1" />Numeric

</div>
<!-- End of Right Side -->



</div>
<div style="clear:both;"></div>
<!-- End of Box -->
<?php }?>

     <input type="submit" name="submit" value="Submit" >
</form>

</div>

<script  type="text/javascript">
   $(function(){ // added
	   $('.input_type').change(function(){
    				var a_href = $(this).val(); 
    				var rel = $(this).attr("rel");

    	if(a_href=="dropdown"){
			
			$('#populate_'+rel).show();
    		     	
    	}
    	else {			
  //Do stuff
 		   	    	    				
  			$('#populate_'+rel).hide();

    	}//if else		
    	return false
	});//change function ends here
	
	
	
	$('.populate_from').change(function(){
    				var a_href = $(this).val(); 
    				var rel = $(this).attr("rel");

    	if(a_href=="database"){
			
			$('#dropdown_info_'+rel).show();
    		     	
    	}
    	else {			
  //Do stuff
 		   	    	    				
  			$('#dropdown_info_'+rel).hide();
			
			
			
			
    	}//if else		
    	return false
	});//change function ends here
	
	
		
}); // function ends here														   
      	
 </script>
</body>
</html>
