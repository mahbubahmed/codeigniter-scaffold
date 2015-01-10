<?php
	
	include('create_controller.php');
	include('create_model.php');
	include('create_view_add.php');
	include('create_view_edit.php');
	include('create_view_show.php');
	
	
	$controller_name = 'Items';
	$model_name = 'mod_items';
	$folder_name  = 'items'; // view folder name
	
	$label  = array('Item Type','Parent Item', 'Item Name', 'Does it have sub item','Unit', 'Item Code', 'Status', 
	'Asset Account', 'Re Order Level', 'On Hand','Total Value',
	'Description','Cost','COGS Account',
	'Description','Price','Income Account','Tax Code'
	);
	$input  = array('item_type_id','parent_item_id','item_name', 'has_subitem','unit_id','item_code','is_active',
	'asset_account'	,'reorder_level','on_hand','total_value',
	'description_purchase', 'cost','cogs_account',
	'description_sales','price','income_account','tax_code_id'
	);
	
	//dropdown,text
	$input_type = array('dropdown','dropdown','text','dropdown','dropdown','text','dropdown',
	'dropdown','text','text','text',
	'textarea','text','dropdown',
	'textarea','text','dropdown','dropdown'	
	);	
	
	$primary_key = 'item_id';
	$table_name = 'cx_items';
	$order_by = 'item_name';
	$order_type = 'ASC';
	

	// Performing The task

	// At First Create the View Folders
	if (!file_exists("views/$folder_name")) 
	{
    	mkdir("views/$folder_name", 0777, true);
	}

	// Proceed to the next steps
	
	$controller = new Create_controller();
	echo $controller->create($controller_name,$model_name, $folder_name) ."<br>";
	
	$model = new Create_model();
	echo $model->create($controller_name, $model_name, $label , $input , $input_type, $primary_key, $table_name, $order_by, $order_type);
	
	$view = new create_view_add();
	echo $view->create($controller_name, $model_name, $label , $input , $input_type, $primary_key, $table_name, $order_by, $order_type, $folder_name );
	
	$view = new create_view_edit();
	echo $view->create($controller_name, $model_name, $label , $input , $input_type, $primary_key, $table_name, $order_by, $order_type, $folder_name );
	
	$view = new create_view_show();
	echo $view->create($controller_name, $model_name, $label , $input , $input_type, $primary_key, $table_name, $order_by, $order_type, $folder_name );
?>