<?php
 class Create_view_show {
 /*
$filename = 'views/student/view_add.php';
$controller_name='Student';
$label=array('Student Name','City','About Me','Password');
$input=array('name','city','about_me','password');
$input_type=array('text','dropdown','textarea','password');

*/
	//function create($filename,$controller_name,$label,$input,$input_type){
	function create($controller_name, $model_name, $label , $input , $input_type, $primary_key, $table_name, $order_by, $order_type, $folder_name ){
	/*
	$filename = 'views/view_show.php';
	$controller_name='Student';
	$label=array('Student Name','City','About Me','Password');
	$input=array('name','city','about_me','password');
	$input_type=array('text','dropdown','textarea','password');
	*/
	
	
	$filename = "views/$folder_name/view_show.php";
	/*
	$controller_name='Parent_subject';
	$label=array('Parent Subject','Subject Name','Creative','Objective','Practical');
	$input=array('parent_subject','subject_name','creative_status','objective_status','practical_status');
	$input_type=array('dropdown','text','dropdown','dropdown','dropdown');
	
	
	$primary_key='subject_id';
	*/
	
	$fp = fopen($filename, 'w');
   
	
	// Create the form
	
		
	fwrite($fp, "<?php if(!empty(\$records)) { ?> \n");
	fwrite($fp, "<table class='table table-hover' id='gtable'> \n");
	fwrite($fp, "  <thead> \n");
	fwrite($fp, "    <tr> \n");
	fwrite($fp, "       <th>SL#</th> \n");			
	for($i = 0; $i < count($input); $i++){	
	fwrite($fp, "       <th>".ucfirst($input[$i])."</th> \n");		
	}
	fwrite($fp, "       <th>Edit</th> \n");	
	fwrite($fp, "       <th>Delete</th> \n");	
	fwrite($fp, "    </tr> \n");		
	fwrite($fp, "  </thead> \n");	
	fwrite($fp, "\n");
	fwrite($fp, "\n");		
	

	fwrite($fp, "  <tbody> \n");
	fwrite($fp, "    <?php \$i = 0; foreach(\$records as \$rows) { \$i++ ?> \n");
	fwrite($fp, "    <tr> \n");		
	for($i = 0; $i < count($input); $i++){
	fwrite($fp, "       <td><?php echo \$i ; ?></td> \n");	
	fwrite($fp, "       <td><?php echo \$rows['$input[$i]'] ; ?></td> \n");
	}
	fwrite($fp, "       <td> <a href='<?php echo base_url();?>".strtolower($controller_name)."/edit/<?php echo \$rows['".$primary_key."']; ?>'>Edit</a> \n");
	fwrite($fp, "       <a href='<?php echo \$rows['".$primary_key."']; ?>'>Delete</a> </td> \n");
	fwrite($fp, "    </tr> \n");
	fwrite($fp, "   <?php } ?> \n");		
	fwrite($fp, "  </tbody> \n");	
	
	
	
	fwrite($fp, "\n");			
   	fwrite($fp, "</table> \n");	
   	
	
   	fwrite($fp, "<span id=\"url_id\" style=\"display: none;\"></span> \n");
	fwrite($fp, "<span id=\"url_address\" style=\"display: none;\"><?php echo base_url(); ?>".strtolower($controller_name)."/delete_item</span> \n");
	fwrite($fp, "<?php \$this->load->view('includes/delete_modal');?> \n");
	fwrite($fp, "<?php } else {echo 'No Records Found';} ?>");
	
	
	
	
   	fclose($fp);
	
    return true;
	
	}	
}	
 ?>