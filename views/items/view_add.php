<form role="form" name="myForm" class="form-horizontal" enctype="multipart/form-data" action="" method="post" autocomplete="off" >

     <div class="form-group">
     <label class="col-md-2 control-label">Item Type</label>
       <div class="col-md-3">
            <?php
     $options = array(''  => 'Select','small' => 'Small Shirt',); 
     echo form_dropdown('item_type_id', $options, '','class="form-control"');
   ?> 
    <?php echo form_error("item_type_id"); ?> 
       </div>
     </div>

     <div class="form-group">
     <label class="col-md-2 control-label">Parent Item</label>
       <div class="col-md-3">
            <?php
     $options = array(''  => 'Select','small' => 'Small Shirt',); 
     echo form_dropdown('parent_item_id', $options, '','class="form-control"');
   ?> 
    <?php echo form_error("parent_item_id"); ?> 
       </div>
     </div>

     <div class="form-group">
     <label class="col-md-2 control-label">Item Name</label>
       <div class="col-md-3">
            <input type="text" class="form-control"  name="item_name" id="item_name" value="<?php echo set_value("item_name"); ?>" >  <?php echo form_error("item_name"); ?> 
       </div>
     </div>

     <div class="form-group">
     <label class="col-md-2 control-label">Does it have sub item</label>
       <div class="col-md-3">
            <?php
     $options = array(''  => 'Select','small' => 'Small Shirt',); 
     echo form_dropdown('has_subitem', $options, '','class="form-control"');
   ?> 
    <?php echo form_error("has_subitem"); ?> 
       </div>
     </div>

     <div class="form-group">
     <label class="col-md-2 control-label">Unit</label>
       <div class="col-md-3">
            <?php
     $options = array(''  => 'Select','small' => 'Small Shirt',); 
     echo form_dropdown('unit_id', $options, '','class="form-control"');
   ?> 
    <?php echo form_error("unit_id"); ?> 
       </div>
     </div>

     <div class="form-group">
     <label class="col-md-2 control-label">Item Code</label>
       <div class="col-md-3">
            <input type="text" class="form-control"  name="item_code" id="item_code" value="<?php echo set_value("item_code"); ?>" >  <?php echo form_error("item_code"); ?> 
       </div>
     </div>

     <div class="form-group">
     <label class="col-md-2 control-label">Status</label>
       <div class="col-md-3">
            <?php
     $options = array(''  => 'Select','small' => 'Small Shirt',); 
     echo form_dropdown('is_active', $options, '','class="form-control"');
   ?> 
    <?php echo form_error("is_active"); ?> 
       </div>
     </div>

     <div class="form-group">
     <label class="col-md-2 control-label">Asset Account</label>
       <div class="col-md-3">
            <?php
     $options = array(''  => 'Select','small' => 'Small Shirt',); 
     echo form_dropdown('asset_account', $options, '','class="form-control"');
   ?> 
    <?php echo form_error("asset_account"); ?> 
       </div>
     </div>

     <div class="form-group">
     <label class="col-md-2 control-label">Re Order Level</label>
       <div class="col-md-3">
            <input type="text" class="form-control"  name="reorder_level" id="reorder_level" value="<?php echo set_value("reorder_level"); ?>" >  <?php echo form_error("reorder_level"); ?> 
       </div>
     </div>

     <div class="form-group">
     <label class="col-md-2 control-label">On Hand</label>
       <div class="col-md-3">
            <input type="text" class="form-control"  name="on_hand" id="on_hand" value="<?php echo set_value("on_hand"); ?>" >  <?php echo form_error("on_hand"); ?> 
       </div>
     </div>

     <div class="form-group">
     <label class="col-md-2 control-label">Total Value</label>
       <div class="col-md-3">
            <input type="text" class="form-control"  name="total_value" id="total_value" value="<?php echo set_value("total_value"); ?>" >  <?php echo form_error("total_value"); ?> 
       </div>
     </div>

     <div class="form-group">
     <label class="col-md-2 control-label">Description</label>
       <div class="col-md-3">
            <textarea class="form-control" name="description_purchase" id="description_purchase" rows="4" cols="30" ><?php echo set_value("description_purchase"); ?></textarea> <?php echo form_error("description_purchase"); ?> 
       </div>
     </div>

     <div class="form-group">
     <label class="col-md-2 control-label">Cost</label>
       <div class="col-md-3">
            <input type="text" class="form-control"  name="cost" id="cost" value="<?php echo set_value("cost"); ?>" >  <?php echo form_error("cost"); ?> 
       </div>
     </div>

     <div class="form-group">
     <label class="col-md-2 control-label">COGS Account</label>
       <div class="col-md-3">
            <?php
     $options = array(''  => 'Select','small' => 'Small Shirt',); 
     echo form_dropdown('cogs_account', $options, '','class="form-control"');
   ?> 
    <?php echo form_error("cogs_account"); ?> 
       </div>
     </div>

     <div class="form-group">
     <label class="col-md-2 control-label">Description</label>
       <div class="col-md-3">
            <textarea class="form-control" name="description_sales" id="description_sales" rows="4" cols="30" ><?php echo set_value("description_sales"); ?></textarea> <?php echo form_error("description_sales"); ?> 
       </div>
     </div>

     <div class="form-group">
     <label class="col-md-2 control-label">Price</label>
       <div class="col-md-3">
            <input type="text" class="form-control"  name="price" id="price" value="<?php echo set_value("price"); ?>" >  <?php echo form_error("price"); ?> 
       </div>
     </div>

     <div class="form-group">
     <label class="col-md-2 control-label">Income Account</label>
       <div class="col-md-3">
            <?php
     $options = array(''  => 'Select','small' => 'Small Shirt',); 
     echo form_dropdown('income_account', $options, '','class="form-control"');
   ?> 
    <?php echo form_error("income_account"); ?> 
       </div>
     </div>

     <div class="form-group">
     <label class="col-md-2 control-label">Tax Code</label>
       <div class="col-md-3">
            <?php
     $options = array(''  => 'Select','small' => 'Small Shirt',); 
     echo form_dropdown('tax_code_id', $options, '','class="form-control"');
   ?> 
    <?php echo form_error("tax_code_id"); ?> 
       </div>
     </div>

     <div class="form-group">        <div class="col-sm-offset-2 col-sm-10">     <button type="submit" class="btn btn-default">Submit</button>        </div>     </div>
</form>