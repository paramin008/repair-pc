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
    $arr_repair_detail_email[$repair_detail["repair_id"]] = $repair_detail["email"];

  }
}

?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><?php lang("Send Mail");?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="./"><?php lang("Home");?></a></li>
            <li class="breadcrumb-item active"><?php lang("Dashboard");?></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">

    

        <?php if($_SESSION["POSITION"] == "1"){?>
        
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
            
              <div class="card-title"><?php lang("List Repair");?></div>
             
              
            </div>
            <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th><?php lang("Date");?></th>
                    <th><?php lang("Inventory");?></th>
                    <th><?php lang("Problem");?></th>
                    <th><?php lang("Technician");?></th>
                    <th><?php lang("Status");?></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                      <?php
                $i = 1;

                         
                  foreach($repair as $repair){
                    $status = $status_txt[$arr_repair_detail_status[$repair["id"]]];
                    $note = $arr_repair_detail_note[$repair["id"]];
                    $email = $arr_repair_detail_email[$repair["id"]];
                    
        
                   
                ?>
                      <tr>
                        <td><?php echo $i++;?></td>
                        <td><?php echo $repair["created_at"];?></td>
                        <td><?php echo $repair["inventory_id"];?></td>
                        <td><?php echo $repair["problem"];?></td>
                        <td><?php echo isset($technician[$repair["technician"]]) ? $technician[$repair["technician"]] : "-";?></td>
                        <td><span class="badge badge-pill" style="background: <?php echo $bg_color[$arr_repair_detail_status[$repair["id"]]];?>; color: <?php echo $text_color[$arr_repair_detail_status[$repair["id"]]];?>;"><?php echo $status;?></span></td>
                        <td>
                          <button class="btn btn-primary btn-sm" title="View" data-toggle="modal" data-target="#Modal<?php echo $repair["id"];?>"><i class="fas fa-search"></i></button>
                        </td>
                      </tr>


                      <!-- Modal -->
                      <div class="modal fade" id="Modal<?php echo $repair["id"];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel"><?php lang("Repair Info");?>&nbsp;<?php echo $repair["id"];?></h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                            <div class="container-fluid">
                              
                              
                            <form action="apps/sendmail/send.php" method="post" name="frmMain">
                            
                              <div class="row">
                                <div class="col-md-4"><p><?php lang("Status");?></p></div>
                                <div class="col-md-8"><input type="text" name="txtTo" readonly class="form-control" id="formGroupExampleInput" 
                              value="<?php echo $status;?>" placeholder="Example input"></div>
                              </div>

                              <div class="row">
                              <div class="col-md-4"><p><?php lang("Email");?></p></div>
                              <div class="col-md-8"><input type="text" name="txtTo" readonly class="form-control" id="formGroupExampleInput" 
                              value="<?php echo $repair["email"];?>" placeholder=""></div>
                              </div>

                              <div class="row">
                              <div class="col-md-4"><p><?php lang("Subject");?></p></div>
                              <div class="col-md-8"><input type="text" name="txtSubject"  class="form-control" id="formGroupExampleInput" 
                              value="แจ้งนัดรับและชำระค่าซ่อม" placeholder="Example input"></div>
                              </div>
                              <div class="row">
                              <div class="col-md-4"><p><?php lang("detil");?></p></div>
                              <div class="col-md-8"><div class="form-group">
    <label for="exampleFormControlTextarea1"></label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="txtDescription" rows="8">วันที่ :<?php echo $repair["created_at"];?> 
รายการ : <?php echo $repair["inventory_id"];?> 
ปัญหา : <?php echo $repair["problem"];?>

ช่างซ่อม : <?php echo isset($technician[$repair["technician"]]) ? $technician[$repair["technician"]] : "-";?>

ราคา : 

</textarea>
  </div></div>
                              </div>
                            </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal"><?php lang("Close");?></button>
                              <button type="submit" class="btn btn-primary" value="send"><?php lang("Send Mail");?></button>
                            </div>
                          </div>
                        </div>
                        </form>
                      </div>
                      <?php } ?>
                    </tbody>
              </table>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>

        <?php if($_SESSION["POSITION"] == "3" || $_SESSION["POSITION"] == "4"){?>
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <div class="card-title"><?php lang("List Techician");?></div>
            </div>
            <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th><?php lang("Profile");?></th>
                    <th><?php lang("Full Name");?></th>
                    <th><?php lang("Phone Number");?></th>
                    <th><?php lang("Position");?></th>
                  </tr>
                </thead>
                <tbody>
                      <?php
                $i = 1;

                         
                foreach($users as $user){
                  if($user["is_active"] == "Y"){
                    $status = lang("Enabled", false);
                    $bg = "success";
                  }else{
                    $status = lang("Disabled", false);
                    $bg = "danger";
                  }
                   
                ?>
                      <tr>
                        <td><?php echo $i++;?></td>
                        <td>
                          <?php if(!empty($user["profile"])){ ?>
                          <?php if(file_exists("uploads/users/".$user["profile"])){ ?>
                          <img src="uploads/users/<?php echo $user["profile"];?>" class="picture-show"
                            alt="Profile-img">
                          <?php }else{ ?>
                          <img src="dist/img/avatar04.png" class="picture-show" alt="User Image">
                          <?php } ?>
                          <?php }else{ ?>
                          <img src="dist/img/avatar04.png" class="picture-show" alt="User Image">
                          <?php } ?>
                        </td>
                        <td><?php echo $user["first_name"]." ".$user["last_name"];?></td>
                        <td><?php echo !empty($user["phone_number"]) ? $user["phone_number"] : "-" ;?></td>
                        <td><?php echo $position_txt[$user["position"]];?></td>
                      </tr>
                      
                      <?php } ?>
                    </tbody>
              </table>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>

      </div>
      <!-- /.row -->

    </div><!-- /.container-fluid -->
  </div>

  <!-- /.content -->
</div>
<script type="text/javascript">
  var msg = "<?php echo isset($_SESSION["MSG"]) ? $_SESSION["MSG"] : ""  ?>";
  var status = "<?php echo isset($_SESSION["STATUS"]) ? $_SESSION["STATU"] : ""  ?>";
  var position = "<?php echo $_SESSION["POSITION"] ?>";

  var language = "<?php echo isset($_SESSION["LANGUAGE"]) ? $_SESSION["LANGUAGE"] : "en" ?>";

  var alert_delete_modal = "<?php lang("Do you want to delete this information?");?>";
</script>

<?php unset($_SESSION["STATUS"],$_SESSION["MSG"]); ?>
