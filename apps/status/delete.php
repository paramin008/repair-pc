<?php
  defined('APPS') OR exit('No direct script access allowed');
  $fields = "*";
  $table = "status";
  $conditions = "WHERE `is_delete` = 'Y' ";
  $status = fetch_all($fields, $table, $conditions);
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><?php lang("Status");?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="./"><?php lang("Home");?></a></li>
            <li class="breadcrumb-item"><a href="?page=status"><?php lang("Status");?></a></li>
            <li class="breadcrumb-item active"><?php lang("Trash");?></li>
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

        <!-- /.col-md-6 -->
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-hover table-sm">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th><?php lang("Name");?></th>
                        <th><?php lang("Color");?></th>
                        <th><?php lang("Status");?></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                $i = 1;
                foreach($status as $row){
                  if($row["is_active"] == "Y"){
                    $status = "<?php lang('Enabled');?>";
                    $bg = "success";
                  }else{
                    $status = "<?php lang('Disabled');?>";
                    $bg = "danger";
                  }
                ?>
                      <tr>
                        <td><?php echo $i++;?></td>
                        <td><?php echo $row["name"];?></td>
                        <td><div class="text-center" style="background: <?php echo $row["bg_color"];?>; color: <?php echo $row["text_color"];?>; width: 200px; height: 24px;"><?php echo $row["name"];?></div></td>
                        <td><span class="badge badge-<?php echo $bg;?> badge-pill"><?php echo $status;?></span></td>
                        <td>
                        <button class="btn btn-danger btn-sm" data-toggle="modal"
                                  data-target="#modalDelete" data-status-id="<?php echo $row["id"];?>" data-status-name="<?php echo $row["name"];?>"><i class="fas fa-trash"></i></button>
                        <a href="apps/status/do_status.php?action=cancel_delete&status_id=<?php echo $row["id"];?>" class="btn btn-primary btn-sm" ><i class="fas fa-times"></i></a>
                        </td>
                      </tr>
                      <?php } ?>

                    </tbody>
                  </table>
                </div>

            </div>
          </div>
        </div>
        <!-- /.col-md-6 -->

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <!-- /.content -->
</div>

<div class="modal" id="modalDelete" role="dialog" tabindex="-1" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <i class="fas fa-exclamation-circle"></i>
        <span></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php lang("No");?></button>
        <button type="button" class="btn btn-primary btn-continue" onClick=""><?php lang("Yes");?></button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
  var msg = "<?php echo isset($_SESSION["MSG"]) ? $_SESSION["MSG"] : ""  ?>";
  var status = "<?php echo isset($_SESSION["STATUS"]) ? $_SESSION["STATUS"] : ""  ?>";
  var position = "<?php echo $_SESSION["POSITION"] ?>";

  var language = "<?php echo isset($_SESSION["LANGUAGE"]) ? $_SESSION["LANGUAGE"] : "en" ?>";

  var alert_delete_modal = "<?php lang("Do you want to delete this information?");?>";
  var required_name = "<?php lang("Please Enter Name");?>";

</script>

<?php unset($_SESSION["STATUS"],$_SESSION["MSG"]); ?>
