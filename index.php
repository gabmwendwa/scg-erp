<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/erp-php/core/init.php';

?>
<!DOCTYPE html>
<html>

<head>
  <title title="<?php echo $webname; ?>"><?php echo $webname; ?> | Dashboard</title>
  <!-- Header -->
  <?php include $root . 'template/head.php' ?>
  <!-- /.header -->
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <?php include $root . 'template/navbar.php' ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php include $root . 'template/aside.php' ?>
    <!-- /.main sidebar container -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Dashboard Information</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?php echo $roothost; ?>">Dashboard</a></li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#employeeForm">
                  New Employee
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="overflow-x: auto;">
                <table id="table1" class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr class="align-middle text-center">
                      <th>#</th>
                      <th>Organization Setup</th>
                      <th>Employee</th>
                      <th>Payroll Settings</th>
                      <th>Payroll</th>
                      <th>Leave</th>
                      <th>Recruitment</th>
                      <th>Attendance</th>
                      <th>Performance</th>
                      <th>Onboarding</th>
                      <th>Training</th>
                    </tr>
                  </thead>
                  <tbody>

                  </tbody>
                  <tfoot>
                    <tr class="align-middle text-center">
                      <th>#</th>
                      <th>Organization Setup</th>
                      <th>Employee</th>
                      <th>Payroll Settings</th>
                      <th>Payroll</th>
                      <th>Leave</th>
                      <th>Recruitment</th>
                      <th>Attendance</th>
                      <th>Performance</th>
                      <th>Onboarding</th>
                      <th>Training</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#employeeForm">
                  New Employee
                </button>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
  include $root . 'template/footer.php';
  ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- Modals -->
  <div class="modal fade" id="comingSoon">
    <div class="modal-dialog">
      <div class="modal-content bg-info">
        <div class="modal-header">
          <h4 class="modal-title">Coming Soon</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h5 class="text-center"><span class="coming-type"></span> coming soon. Stay tuned!&nbsp;&nbsp;&nbsp;<i class="fas fa-thumbs-up"></i></h5>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-light" data-dismiss="modal">OK</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="employeeForm" tabindex="-1" role="dialog" aria-labelledby="employeeFormTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="employeeFormTitle">Employee Information</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="formCloseDefaults();">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="quickEmployeeForm">
          <div class="modal-body">
            <div class="container">
              <strong class="text-primary">Employee Bio</strong>
              <br>
              <div class="row">
                <div class="col-sm-12 col-lg-6">
                  <div class="form-group">
                    <label for="firstname">First Name</label>
                    <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Enter first name" autocapitalize="on" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                  <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Enter last name" autocapitalize="on" autocomplete="off">
                  </div>
                </div>

                <div class="col-sm-12 col-lg-6">
                  <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter email address" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                  <div class="form-group">
                    <label for="telephone">Telephone/Mobile</label>
                    <input type="tel" name="telephone" class="form-control" id="telephone" placeholder="Enter a telephone/mobile number" autocomplete="off">
                  </div>
                </div>

                <div class="col-sm-12 col-lg-6">
                  <div class="form-group">
                    <label for="onrecruitment">Recruitment Date</label>
                    <input type="date" name="onrecruitment" class="form-control" id="onrecruitment" placeholder="Enter the recruitment date" autocomplete="off">
                  </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                  <div class="form-group">
                    <label for="onboarding">Onboarding Date</label>
                    <input type="date" name="onboarding" class="form-control" id="onboarding" placeholder="Enter the onboarding date" autocomplete="off">
                  </div>
                </div>
              </div>
            </div>

            <div class="container">
              <strong class="text-primary">Organization Role</strong>
              <br>
              <div class="row">
                <div class="col-sm-12 col-lg-6">
                  <div class="form-group">
                    <label for="department">Department</label>
                    <select name="department" class="form-control" id="department">
                      <option value="">-Choose Department-</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                  <div class="form-group">
                    <label for="position">Position</label>
                    <select name="position" class="form-control" id="position">
                      <option value="">-Choose Position-</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="container">
                <strong class="text-primary">Payroll</strong>
                <br>
                <div class="row">
                  <div class="col-sm-12 col-lg-6">
                    <div class="form-group">
                      <label for="employee_number">Employee Number</label>
                      <input type="text" name="employee_number" class="form-control" id="employee_number" placeholder="Enter employee number" autocapitalize="on" autocomplete="off">
                    </div>
                  </div>
                  <div class="col-sm-12 col-lg-6">
                    <div class="form-group">
                      <label for="salary">Gross Salary</label>
                      <input type="number" name="salary" class="form-control" id="salary" placeholder="Enter gross salary" autocomplete="off" min="0" step="500">
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="formCloseDefaults();">Close</button>
              <button type="submit" class="btn btn-primary" id="saveEmployee">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>

  <!-- /.modals -->
  <!-- JS -->
  <?php include $root . 'template/javascript.php' ?>
  <!-- /.js -->

</body>

</html>