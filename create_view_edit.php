<?php
 class Create_view_edit {
 /*
$filename = 'views/student/view_add.php';
$controller_name='Student';
$label=array('Student Name','City','About Me','Password');
$input=array('name','city','about_me','password');
$input_type=array('text','dropdown','textarea','password');

*/
	//function create($filename,$controller_name,$label,$input,$input_type){
	function create($controller_name, $model_name, $label , $input , $input_type, $primary_key, $table_name, $order_by, $order_type,$folder_name ){
	/*
	$filename = 'views/view_edit.php';
	$controller_name='Student';
	$label=array('Student Name','City','About Me','Password');
	$input=array('name','city','about_me','password');
	$input_type=array('text','dropdown','textarea','password');
	*/
	
	$filename = "views/$folder_name/view_edit.php";
	/*
	$controller_name='Parent_subject';
	$label=array('Parent Subject');
	$input=array('parent_subject','subject_name','creative_status','objective_status','practical_status');
	$input_type=array('dropdown','text','dropdown','dropdown','dropdown');
	
	$primary_key='parent_subject_id';
	*/
	
	$fp = fopen($filename, 'w');
   
	
	// Create the form
	fwrite($fp, "<?php if(!empty(\$records)) { ?> \n");
	fwrite($fp, '<form role="form" name="myForm" class="form-horizontal" enctype="multipart/form-data" action="" method="post" autocomplete="off" >');
	fwrite($fp, "\n");
	fwrite($fp, "\n");
	
	for($i = 0; $i < count($input); $i++){
			
		switch ($input_type[$i])
		{
		case "text":
		$value='<input type="text" class="form-control"  name="'.strtolower($input[$i]).'" id="'.strtolower($input[$i]).'" value="<?php echo $records[0]["'.strtolower($input[$i]).'"]; ?>" >  <?php echo form_error("'.strtolower($input[$i]).'"); ?>';
		break;
		case "dropdown":
		$value="<?php\n     \$options = array(''  => 'Select','small' => 'Small Shirt',); \n";
		$value.="     echo form_dropdown('".strtolower($input[$i])."', \$options, \$records[0]['".strtolower($input[$i])."'],'class=\"form-control\"');\n  " ;
		$value.=" ?> \n";
		$value.= '    <?php echo form_error("'.strtolower($input[$i]).'"); ?>';
		break;
		case "textarea":
		$value='<textarea class="form-control" name="'.strtolower($input[$i]).'" id="'.strtolower($input[$i]).'" rows="4" cols="30" ><?php echo set_value("'.strtolower($input[$i]).'"); ?><?php echo $records[0]["'.strtolower($input[$i]).'"]; ?></textarea> <?php echo form_error("'.strtolower($input[$i]).'"); ?>';
		break;
		case "password":
		$value='<input type="password" class="form-control" name="'.strtolower($input[$i]).'" id="'.strtolower($input[$i]).'" value="<?php echo $records[0]["'.strtolower($input[$i]).'"]; ?>" > <?php echo form_error("'.strtolower($input[$i]).'"); ?>';
		
		}	  
	fwrite($fp, "     <div class=\"form-group\">\n");			
	fwrite($fp, "     <label class=\"col-md-2 control-label\">".$label[$i]."</label>\n");
	fwrite($fp, "       <div class=\"col-md-3\">\n");				
   	fwrite($fp, "            ".$value." \n");
	fwrite($fp, "       </div>\n");
	fwrite($fp, "     </div>\n");			
	
	fwrite($fp, "\n");	
	}
	
	fwrite($fp, "   <input type=\"hidden\" name=\"$primary_key\" value=\"<?php echo \$records[0]['$primary_key']; ?>\" > \n");
	
	fwrite($fp, "     <div class=\"form-group\"> \n");
	fwrite($fp, "        <div class=\"col-sm-offset-2 col-sm-10\"> \n");
	fwrite($fp, "           <a href=\"<?php echo base_url();?>".strtolower($controller_name)."/show\" class=\"btn btn-success\">Go Back</a> \n");
	fwrite($fp, "           <button type=\"submit\" class=\"btn btn-default\">Submit</button> \n");	
	fwrite($fp, "        </div> \n");
	fwrite($fp, "     </div> \n");		
   	
	fwrite($fp, "\n");
	fwrite($fp, "</form>");
	//Form Ends
	fwrite($fp, "<?php } else {echo \"No Records Found\" ;}?> \n");
	
	
   	fclose($fp);
	
    return true;
	
	}	
}	
 ?>