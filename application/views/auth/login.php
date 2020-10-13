<!DOCTYPE html>
<html lang="en">

<?php include $_SERVER['DOCUMENT_ROOT'].'/application/views/admin/layout/head.php'; ?>

<body class="">
      <div class="panel-header panel-header-sm">
       </div>

        <div class="content">
            <div class="row">
              <div class="col-md-4">
                
              </div>
              <div class="col-md-4">
                <div class="card">
                  <div class="card-header">
                    <h5 class="title">Please Login</h5>
                  </div>
                  <div class="card-body">
                    <form action="<?php echo $action ?>" method="post">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Username</label>
                            <input name="username" type="text" class="form-control" placeholder="Username"/>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Password</label>
                            <input name="password" type="password" class="form-control" placeholder="Password"/>
                          </div>
                        </div>
                      </div>
                      
                      <input name="submit" type="submit" value="Login" class="btn btn-success" />
                      
                      <div class="text-center text-error">
                        <?php echo $error; ?>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
         

<?php include $_SERVER['DOCUMENT_ROOT'].'/application/views/admin/layout/js.php'; ?>

</body>

</html>