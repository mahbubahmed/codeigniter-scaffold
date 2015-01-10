<?php   

 class Create_controller {
 	
	function create($controller_name,$model_name, $folder_name){
	
	$file = ucfirst($controller_name);
	$filename = "controller/$file.php";
	
	
    $fp = fopen($filename, 'w');
    fwrite($fp, "<?php\n");
    fwrite($fp, "\n");
    fwrite($fp, "class ".ucfirst($controller_name)." extends CI_Controller {\n");
    fwrite($fp, "\n");
    fwrite($fp, "   function __construct()\n");
    fwrite($fp, "   {\n");
    fwrite($fp, "       parent::__construct();\n");
	fwrite($fp, "       include 'parent_construct.php';\n");
    fwrite($fp, "   }\n");
    fwrite($fp, "\n");

    /*
	// Add
    fwrite($fp, "   function add()\n");
    fwrite($fp, "   {\n");
    fwrite($fp, "       \$user_info = \$this->authex->get_userdata();\n");
    fwrite($fp, "       \$data['level']=\$user_info->level;\n");
	fwrite($fp, "       \$data['user_name']=\$this->authex->get_user_name();\n");
  
    fwrite($fp, "       \$this->load->view('".strtolower($controller_name)."/view_add', \$data);\n");
    fwrite($fp, "   }\n");
    fwrite($fp, "\n");
	*/
	// Added
    fwrite($fp, "   function add()\n");
    fwrite($fp, "   {\n");
    
    fwrite($fp, "       \$this->load->library('form_validation');\n");
    fwrite($fp, "       \$this->form_validation->set_error_delimiters('<span class=\"error\">', '</span>'); \n");
    fwrite($fp, "\n");
	fwrite($fp, "       if (\$this->form_validation->run() == FALSE) { \n");
	fwrite($fp, "\n");
	fwrite($fp, "            \$data['page_title'] = 'Add ".$folder_name."' ;\n");
	fwrite($fp, "            \$data['main_content'] = '".$folder_name."/view_add' ;\n");
	fwrite($fp, "            \$this->load->view('includes/template', \$data);\n");   
	fwrite($fp, "       } \n");
	fwrite($fp, "       else \n");
	fwrite($fp, "       { \n");
	fwrite($fp, "       	\$this->load->model('".strtolower($model_name)."');\n");
  	fwrite($fp, "       	\$response = \$this->".strtolower($model_name)."->add();\n");
	fwrite($fp, "       	   if (\$response) \n");
	fwrite($fp, "           { \n");
	fwrite($fp, "       			\$base = base_url().'".strtolower($controller_name)."/add'; \n");
	fwrite($fp, "       			\$data['type']='alert alert-success'; \n");
	fwrite($fp, "       			\$data['msg']=\"Successfully Added <a href='\$base'>Add More</a>\"; \n");
	fwrite($fp, "            } \n");
	fwrite($fp, "           else \n");
	fwrite($fp, "           { \n");
	fwrite($fp, "       			\$base = base_url().'".strtolower($controller_name)."/add'; \n");
	fwrite($fp, "       			\$data['type']='alert alert-danger'; \n");
	fwrite($fp, "       			\$data['msg']=\"Could not perform the requested action <a href='.\$base.'>Add More</a>\"; \n");
	fwrite($fp, "            } \n");
	fwrite($fp, "            \$data['page_title'] = 'Add ".$folder_name."' ;\n");
	fwrite($fp, "            \$data['main_content'] = \"view_success\" ;\n");
	fwrite($fp, "            \$this->load->view('includes/template', \$data);\n"); 
	
	
	fwrite($fp, "       } \n");
  
    fwrite($fp, "   }\n");
    fwrite($fp, "\n");
	
	// list
	fwrite($fp, "   function show()\n");
    fwrite($fp, "   {\n");
 
	fwrite($fp, "       \$this->load->model('".strtolower($model_name)."');\n");
  	fwrite($fp, "       \$data['records']= \$this->".strtolower($model_name)."->get_all();\n");
    fwrite($fp, "            \$data['page_title'] = 'List of ".$folder_name."' ;\n");
	fwrite($fp, "            \$data['main_content'] = '".$folder_name."/view_show' ;\n");
	fwrite($fp, "            \$this->load->view('includes/template', \$data);\n"); 
	
    fwrite($fp, "   }\n");
	fwrite($fp, "\n");
	/*
	// edit
	fwrite($fp, "   function edit(\$id)\n");
    fwrite($fp, "   {\n");
    fwrite($fp, "       \$user_info = \$this->authex->get_userdata();\n");
    fwrite($fp, "       \$data['level']=\$user_info->level;\n");
	fwrite($fp, "       \$data['user_name']=\$this->authex->get_user_name();\n");
  	fwrite($fp, "       \$this->load->model('".strtolower($model_name)."');\n");
  	fwrite($fp, "       \$data['records']= \$this->".strtolower($model_name)."->get_single_row(\$id);\n");
    fwrite($fp, "       \$this->load->view('".strtolower($controller_name)."/view_edit', \$data);\n");
    fwrite($fp, "   }\n");
	fwrite($fp, "\n");
	*/
	
	fwrite($fp, "   function edit(\$id)\n");
    fwrite($fp, "   {\n");
    
    fwrite($fp, "       \$this->load->library('form_validation');\n");
    fwrite($fp, "       \$this->form_validation->set_error_delimiters('<span class=\"error\">', '</span>'); \n");
    fwrite($fp, "\n");
	fwrite($fp, "       if (\$this->form_validation->run() == FALSE) { \n");
	fwrite($fp, "\n");	
	fwrite($fp, "       	\$this->load->model('".strtolower($model_name)."');\n");
  	fwrite($fp, "       	\$data['records'] = \$this->".strtolower($model_name)."->get_single_row(\$id);\n");	
	fwrite($fp, "            \$data['page_title'] = 'Edit ".$folder_name."' ;\n");
	fwrite($fp, "            \$data['main_content'] = '".$folder_name."/view_edit' ;\n");
	fwrite($fp, "            \$this->load->view('includes/template', \$data);\n");
	   
	fwrite($fp, "       } \n");
	fwrite($fp, "       else \n");
	fwrite($fp, "       { \n");
	fwrite($fp, "       	\$this->load->model('".strtolower($model_name)."');\n");
  	fwrite($fp, "       	\$response = \$this->".strtolower($model_name)."->edit();\n");
	fwrite($fp, "       	   if (\$response) \n");
	fwrite($fp, "           { \n");
	fwrite($fp, "\n");
	fwrite($fp, "       			\$base = base_url().'".strtolower($controller_name)."/show'; \n");
	fwrite($fp, "       			\$data['type']='alert alert-success'; \n");
	fwrite($fp, "       			\$data['msg']='Successfully Edited'; \n");
	fwrite($fp, "            } \n");
	fwrite($fp, "           else \n");
	fwrite($fp, "           { \n");
	fwrite($fp, "       			\$base = base_url().'".strtolower($controller_name)."/show'; \n");
	fwrite($fp, "       			\$data['type']='alert alert-danger'; \n");
	fwrite($fp, "       			\$data['msg']='Could not perform the requested action'; \n");
	fwrite($fp, "            } \n");
	fwrite($fp, "            \$data['page_title'] = 'Edit ".$folder_name."' ;\n");
	fwrite($fp, "            \$data['main_content'] = 'view_success' ;\n");
	fwrite($fp, "            \$this->load->view('includes/template', \$data);\n");
	
	fwrite($fp, "       } \n");
  
    fwrite($fp, "   }\n");
    fwrite($fp, "\n");
	
	
	/*
	// Edited
    fwrite($fp, "   function edit()\n");
    fwrite($fp, "   {\n");
    
    fwrite($fp, "       \$this->load->library('form_validation');\n");
    fwrite($fp, "\n");
	fwrite($fp, "       if (\$this->form_validation->run() == FALSE) { \n");
	fwrite($fp, "       //Write Form Validation Rules \n");
	fwrite($fp, "       } \n");
	fwrite($fp, "       else \n");
	fwrite($fp, "       { \n");
	fwrite($fp, "       \$this->load->model('".strtolower($model_name)."');\n");
  	fwrite($fp, "       echo \$response= \$this->".strtolower($model_name)."->edit();\n");
	fwrite($fp, "       } \n");
  
    fwrite($fp, "   }\n");
    fwrite($fp, "\n");
	*/
	// Delete
	fwrite($fp, "   function delete_item()\n");
    fwrite($fp, "   {\n");
    fwrite($fp, "       \$id = \$this->input->post('id');\n");    
  	fwrite($fp, "       \$this->load->model('".strtolower($model_name)."');\n");
  	fwrite($fp, "       echo \$response= \$this->".strtolower($model_name)."->delete_item(\$id);\n");

    fwrite($fp, "   }\n");
	fwrite($fp, "\n");
	
	
	//class ends
    fwrite($fp, "}\n");
    fclose($fp);
	
    return true;
	
	}
	
}	
 ?>