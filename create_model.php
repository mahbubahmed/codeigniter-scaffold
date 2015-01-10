<?php 
  
  class Create_model {
/*
 $filename = 'model/model.php';
 $controller_name='Student';
 $model_name='mod_student';
 $input=array('name','email');
 $input_type=array('input','dropdown');
 $table_name='cx_student';
 $primary_key='id';
 $list_by_date='1';
 $date_field_name='reg_date';
 $order_by='reg_date';
 $order_type='ASC';
 $join='1';
 $join_table=array('cane_batch','cane_admin');
 $join_field=array('batchid','admin_id');
 $current_field=array('st_batchid','entry_id');
 
 */	
	//function create($filename,$model_name,$table_name,$primary_key,$list_by_date,$date_field_name,$order_by,$order_type,$join,$join_table,$join_field,$current_field,$input,$input_type){
		
function create($controller_name, $model_name, $label , $input , $input_type, $primary_key, $table_name, $order_by, $order_type  ){
	
	$file = ucfirst($model_name);
 	$filename = "model/$file.php";
 /*
 $controller_name='Parent_subject';
 $model_name='mod_parent_subject'; 
 $input=array('parent_subject_name');
 $input_type=array('text');
 $table_name='cane_subject';
 $primary_key='subject_id';
 $order_by='subject_name';
 $order_type='ASC';
  */
  
 $list_by_date='0';
 $date_field_name='reg_date';
 

 $join='0';
 $join_table=array('cane_batch','cane_admin');
 $join_field=array('batchid','admin_id');
 $current_field=array('st_batchid','entry_id');	
			
 
    $fp = fopen($filename, 'w');
    fwrite($fp, "<?php\n");
    fwrite($fp, "\n");
    fwrite($fp, "class ".ucfirst($model_name)." extends CI_Model {\n");
    fwrite($fp, "\n");
    fwrite($fp, "   function __construct()\n");
    fwrite($fp, "   {\n");
    fwrite($fp, "       parent::__construct();\n");
    fwrite($fp, "   }\n");
    fwrite($fp, "\n");
	
	// Add
    fwrite($fp, "   function add()\n");
    fwrite($fp, "   {\n");
		for($i = 0; $i < count($input); $i++){	
   		 	fwrite($fp, "      \$".strtolower($input[$i])." = trim(\$this->input->post('".$input[$i]."'));\n");
		}
	fwrite($fp, "\n");
    fwrite($fp, "       \$data = array(\n");
	fwrite($fp, "          '".$primary_key."' => '',\n");
		for($i = 0; $i < count($input); $i++){	
			fwrite($fp,     "       '".strtolower($input[$i])."' => \$".strtolower($input[$i]).",\n");
		}
	//fwrite($fp, "          'school_id' => \$this->authex->get_account_id()\n");	
    fwrite($fp, "       );\n");
    fwrite($fp, "       \$this->db->insert('".$table_name."', \$data);\n");
	fwrite($fp, "       if(\$this->db->affected_rows() > 0)\n");
    fwrite($fp, "       { \n");
	fwrite($fp, "         return TRUE;\n");
	fwrite($fp, "       } \n");
	fwrite($fp, "       else \n");
	fwrite($fp, "       { \n");
	fwrite($fp, "         return FALSE;\n");
	fwrite($fp, "       }\n");
	
    fwrite($fp, "   }\n");
    fwrite($fp, "\n");
	
		
	// list
	if($list_by_date=='1') {$parementer="\$daterange1,\$daterange2";} else {$parementer="";}
	fwrite($fp, "   function get_all(".$parementer.")\n");
    fwrite($fp, "   {\n");
	if($list_by_date=='1') {
		fwrite($fp, "      \$daterange1=date('Y-m-d', strtotime(\$daterange1));\n");
		fwrite($fp, "      \$daterange2=date('Y-m-d', strtotime(\$daterange2));\n");
		fwrite($fp, "   \n");
	}
    fwrite($fp, "       \$this->db->select('*');\n");
    fwrite($fp, "       \$this->db->from('".$table_name."');\n");
	
		// if need to join any table
	if($join=='1') {
			for($i = 0; $i < count($join_table); $i++){
			fwrite($fp, "       \$this->db->join('".$join_table[$i]."', '".$join_table[$i].".".$join_field[$i]." = ".$table_name.".".$current_field[$i]."');\n");
		}
	}
	if($list_by_date=='1') {
			fwrite($fp, "       \$this->db->where('".$date_field_name." >=', \$daterange1);\n");
			fwrite($fp, "       \$this->db->where('".$date_field_name." <=', \$daterange2);\n");
	}
	//fwrite($fp, "       \$this->db->where('school_id', \$this->authex->get_account_id() );\n");		
	fwrite($fp, "       \$this->db->order_by('".$order_by."','".$order_type."');\n");
	fwrite($fp, "       \$getData = \$this->db->get('');\n");
  	fwrite($fp, "       if(\$getData->num_rows() > 0)\n");
    fwrite($fp, "       return \$getData->result_array();\n");
	fwrite($fp, "       else\n");
	fwrite($fp, "       return null;\n");
    fwrite($fp, "   }\n");
	fwrite($fp, "\n");
	
	// Get Single Row
	fwrite($fp, "   function get_single_row(\$id)\n");
    fwrite($fp, "   {\n");
	fwrite($fp, "       \$sql = \"SELECT * FROM ".$table_name." WHERE ".$primary_key." = ?\" ;\n");
    fwrite($fp, "       \$getData = \$this->db->query(\$sql,array(\$id));\n");
    //fwrite($fp, "       \$getData = \$this->db->query(\$sql,array(\$id, \$this->authex->get_account_id()));\n");
    fwrite($fp, "       if(\$getData->num_rows() > 0)\n");
	fwrite($fp, "       return \$getData->result_array();\n");
  	fwrite($fp, "       else\n");
	fwrite($fp, "       return null;\n");
  	
  
    fwrite($fp, "   }\n");
	fwrite($fp, "\n");
	
	// Edited
    fwrite($fp, "   function edit()\n");
    fwrite($fp, "   {\n");
	fwrite($fp, "      \$".$primary_key." = trim(\$this->input->post('".$primary_key."'));\n");
		for($i = 0; $i < count($input); $i++){	
   		 	fwrite($fp, "      \$".strtolower($input[$i])." = trim(\$this->input->post('".$input[$i]."'));\n");
		}
	fwrite($fp, "\n");
    fwrite($fp, "       \$data = array(\n");
	
		for($i = 0; $i < count($input); $i++){	
			fwrite($fp, "       '".strtolower($input[$i])."' => \$".strtolower($input[$i]).",\n");
		}
    fwrite($fp, "       );\n");
	fwrite($fp, "       \$this->db->where('".$primary_key."',\$".$primary_key.");\n");
	fwrite($fp, "       \$this->db->where('school_id' );\n");
	//fwrite($fp, "       \$this->db->where('school_id',\$this->authex->get_account_id() );\n");
    fwrite($fp, "       \$this->db->update('".$table_name."', \$data);\n");
	fwrite($fp, "       if(\$this->db->affected_rows() > 0)\n");
    fwrite($fp, "       { \n");
	fwrite($fp, "         return TRUE;\n");
	fwrite($fp, "       } \n");
	fwrite($fp, "       else \n");
	fwrite($fp, "       { \n");
	fwrite($fp, "         return FALSE;\n");
	fwrite($fp, "       }\n");
	
    fwrite($fp, "   }\n");
    fwrite($fp, "\n");
	
	// delete
	fwrite($fp, "   function delete_item(\$id)\n");
    fwrite($fp, "   {\n");
    fwrite($fp, "       \$query= \$this->db->delete('".$table_name."', array('".$primary_key."' => \$".$primary_key."));\n");
    fwrite($fp, "       if(\$this->db->affected_rows() > 0)\n");
    fwrite($fp, "       { \n");
	fwrite($fp, "         return TRUE;\n");
	fwrite($fp, "       } \n");
	fwrite($fp, "       else \n");
	fwrite($fp, "       { \n");
	fwrite($fp, "         return FALSE;\n");
	fwrite($fp, "       }\n");
  	fwrite($fp, "   }\n");
	fwrite($fp, "\n");
	
	
	
		
	
	
	//class ends
    fwrite($fp, "}\n");
    fclose($fp);
	
   	return true;
	
	}
		
}	
 ?>