<?php
  defined('APPS') OR exit('No direct script access allowed');

  $fields = "*";
  $table = "inventory";
  $conditions = " WHERE `is_delete` = 'N' ";
  $inventory = fetch_all($fields, $table, $conditions);
  $count_inventory = count($inventory);

  $position = fetch_all("`per_id`, `per_name`","position");
  $position_txt = array();
  foreach($position as $per){
    $position_txt[$per["per_id"]] = $per["per_name"];
  }
  
  $fields = "*";
  $table = "users";
  $conditions = " WHERE `is_delete` = 'N' ";
  if($_SESSION["POSITION"] == "3" || $_SESSION["POSITION"] == "4"){
    $conditions .= " AND `position` IN (3,4) ORDER BY `position` DESC  ";
  }
  $users = fetch_all($fields, $table, $conditions);
  $count_users = count($users);
  $count_technician = count($users);


  $fields = "*";
  $table = "repair";
  $form_date = date("Y-m-d")." 00:00:00";
  $to_date = date("Y-m-d")." 23:59:59";
  $conditions = " WHERE `created_at` >= '".$form_date."' AND `created_at` <= '".$to_date."'  ";
  if($_SESSION["POSITION"] == "3"){
    $conditions .= " AND `technician` = '".$_SESSION["USER_ID"]."' ";
  }
  $repair = fetch_all($fields, $table, $conditions);
  $count_repair_today = count($repair);
  
  $fields = "*";
  $table = "inventory";
  $conditions = " WHERE `is_delete` = 'N' AND `is_active` = 'Y' ";
  $inventory_y = fetch_all($fields, $table, $conditions);
  $count_inventory_y = count($inventory_y);

  $fields = "*";
  $table = "inventory";
  $conditions = " WHERE `is_delete` = 'N' AND `is_active` = 'N' ";
  $inventory_n = fetch_all($fields, $table, $conditions);
  $count_inventory_n = count($inventory_n);

  $fields = "*";
  $table = "inventory";
  $conditions = " WHERE `is_delete` = 'N' AND `is_active` = 'RP' ";
  $inventory_rp = fetch_all($fields, $table, $conditions);
  $count_inventory_rp = count($inventory_rp);

  $fields = "*";
  $table = "inventory";
  $conditions = " WHERE `is_delete` = 'N' AND `is_active` = 'WO' ";
  $inventory_wo = fetch_all($fields, $table, $conditions);
  $count_inventory_wo = count($inventory_wo);


  $fields = "*";
  $table = "repair";
  $conditions = "";
  if($_SESSION["POSITION"] == "3"){
    $conditions .= " WHERE `technician` = '".$_SESSION["USER_ID"]."' ";
  }
  $repair = fetch_all($fields, $table, $conditions);
  $arr_repair_id = array();
  foreach($repair as $v){
    $arr_repair_id[] = $v["id"];
  }

  $r_id = implode(",", $arr_repair_id);

  $inventory = fetch_all("*","inventory");
  $inventory_txt = array();
  foreach($inventory as $inven){
    $inventory_txt[$inven["id"]] = $inven["name"];
  }

  $users_2 = fetch_all("*","users");
  $users_txt = array();
  foreach($users_2 as $user){
    $users_txt[$user["id"]] = $user["first_name"]." ".$user["last_name"];
    $technician[$user["id"]] = $user["first_name"]." ".$user["last_name"];
  }


  $problems = fetch_all("*","problem");
  $problem_txt = array();
  foreach($problems as $problem){
    $problem_txt[$problem["id"]] = $problem["name"];
  }


  $r_status = fetch_all("*","status");
  $status_txt = array();
  foreach($r_status as $status){
    $status_txt[$status["id"]] = $status["name"];
    $bg_color[$status["id"]] = $status["bg_color"];
    $text_color[$status["id"]] = $status["text_color"];
  }

if(!empty($repair)){
  $conditions = " WHERE repair_id IN ($r_id) ";
 
  $repair_details = fetch_all("*","repair_detail", $conditions);
  $arr_repair_detail = array();
  $arr_repair_detail_status = array();
  foreach($repair_details as $repair_detail){
    $arr_repair_detail[] = $repair_detail;
    $arr_repair_detail_status[$repair_detail["repair_id"]] = $repair_detail["status_id"];
    $arr_repair_detail_note[$repair_detail["repair_id"]] = $repair_detail["note"];

  }
}

?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><?php lang("sendmail");?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="./"><?php lang("Home");?></a></li>
            <li class="breadcrumb-item active"><?php lang("sendmail");?></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
       
        <!-- /.col -->
        <div class="col-md-auto">
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <!-- /.tab-pane -->
                <div class="tab-pane active" id="info">
                
                <form action="apps/howto/send.php" method="post" name="frmMain">

                <div class="form-group">
    <label for="formGroupExampleInput">Name</label>
    <input type="text" name="txtname" class="form-control" id="formGroupExampleInput" placeholder="Example input">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput">E-mail</label>
    <input type="text" name="txtTo" class="form-control" id="formGroupExampleInput" placeholder="Example input">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput">Subject</label>
    <input type="text" name="txtSubject" class="form-control" id="formGroupExampleInput" placeholder="Example input">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Description</label>
    <input type="text" name="txtDescription" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
  </div>
  <button type="submit" class="btn btn-primary" value="send">Submit</button>
<br>
<br>
<br>
</form>
                </div>

            
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
           
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>



<?php unset($_SESSION["STATUS"],$_SESSION["MSG"]); ?>