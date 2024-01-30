<?php
require_once 'core/init.php';

if(!$project = Input::get('project')){
	die('error');
}
else {	
	$project = new Project($project, 'project_ref_table');
	$pd = $project->data();

	$country = new Project(Input::get('c'), 'country_table');
	$c = $country->data();

	$implementing = new Project(Input::get('i'), 'implementing_office_table');
	$i = $implementing->data();

	$rn = new Project(Input::get('r'), 'readiness_or_nap_table');
	$r = $rn->data();

	$tr = new Project(Input::get('t'), 'type_of_readiness_table');
	$t = $tr->data();

	$st = new Project(Input::get('s'), 'status_table');
	$s = $st->data();
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Project | Edit Entry</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php include 'template/navbar.php' ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Project</span>
    </a>

    <!-- Sidebar -->
	<?php include 'template/sidebar.php' ?>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Entry</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../project/">Home</a></li>
              <li class="breadcrumb-item active">Edit Entry</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Edit Data</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
		  <form action="" method="post">
          <div class="card-body">
			<div class="row">
              <div class="col-md-6">
			  <?php

				if(Input::exists()){
					if(Token::check(Input::get('token'))){
						$validate = new Validate();
						$validation = $validate->check($_POST, array(
							//'project_ref' => array('required' => true)
						));
						if($validation->passed()){
							try{
								$pj = new Project();
								$pj->update('project_ref_table', array(
									"project_ref" => Input::get('project_ref'),
									"project_title" => Input::get('project_title'),
									"grant_amount" => Input::get('grant_amount'),
									"dates_from_gcf" => Input::get('dates_from_gcf'),
									"start_date" => Input::get('start_date'),
									"duration" => Input::get('duration'),
									"end_date" => Input::get('end_date'),
									"first_disbursement_amount" => Input::get('first_disbursement_amount')
								), $pd->id);
								
								echo '<div class="alert alert-success">';
								echo '<p><span class="fa fa-check"></span>&nbsp;Edited entry is successfully submited.</p>';
								echo '</div>';
								?>
								<script>setTimeout(function(){
									window.location.href = "../project/";
								}, 1000);</script>
								<?php
							}
							catch(Exception $e) {
								die($e->getMessage());
							}
						}
						else{
							echo '<div class="alert alert-danger">';
							
							foreach($validation->errors() as $error){
								echo '<p><span class="fa fa-exclamation-circle"></span>&nbsp;' .$error. '</p>';
							}

							echo '</div>';							
						}
						
					}
				}			  
			  ?>
			  </div>
			</div>
			<div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Project Reference</label>
				  <input class="form-control" name="project_ref" type="text" value="<?php echo $pd->project_ref; ?>" placeholder="" required>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Implementing Office</label>
                  <p><?php echo $i->implementing_office; ?></p>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Country</label>
				  <p><?php echo $c->country; ?></p>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Project Title</label>
				  <input class="form-control" name="project_title" type="text" value="<?php echo $pd->project_title; ?>" placeholder="" required>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Grant Amount (USD)</label>
				  <input class="form-control" name="grant_amount" type="number" step="0.01" placeholder="0.00" value="<?php echo $pd->grant_amount; ?>" required>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Date from GCF</label>
                  <input class="form-control" name="dates_from_gcf" type="date" placeholder="" value="<?php echo $pd->dates_from_gcf; ?>" required>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Duration (Months)</label>
				  <input class="form-control" name="duration" name="duration" type="number" placeholder="0" value="<?php echo $pd->duration; ?>" required>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Start Date</label>
                  <input class="form-control" name="start_date" name="start_date" type="date" placeholder="" value="<?php echo $pd->start_date; ?>" required>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>End Date</label>
				  <input class="form-control" name="end_date" type="date" placeholder="" value="<?php echo $pd->end_date; ?>" required>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Readiness or NAP</label>
				  <p><?php echo $r->readiness_or_nap; ?></p>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>First Disbursement Amount</label>
				  <input class="form-control" name="first_disbursement_amount" type="number" step="0.01" placeholder="0.00" value="<?php echo $pd->first_disbursement_amount; ?>" required>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Type of Readiness</label>
				  <p><?php echo $t->type_of_readiness; ?></p>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Status</label>
				  <p><?php echo $s->status; ?></p>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
		  <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
		  <button class="btn btn-success" type="submit">Save</button>
          </div>
		  </form>
        </div>
        <!-- /.card -->
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
	include 'template/footer.php';
  ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  })
</script>
</body>
</html>
