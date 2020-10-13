<!DOCTYPE html>
<html lang="en">

<?php include $_SERVER['DOCUMENT_ROOT'].'/application/views/admin/layout/head.php'; ?>

<body class="">
  <div class="wrapper ">

    <?php include $_SERVER['DOCUMENT_ROOT'].'/application/views/admin/layout/sidebar.php'; ?>

    <div class="main-panel">

      <?php include $_SERVER['DOCUMENT_ROOT'].'/application/views/admin/layout/navbar.php'; ?>

        <!-- <h2 style="margin-top:0px">Compro <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
  	       <div class="form-group">
              <label for="varchar">Menu <?php echo form_error('menu') ?></label>
              <input type="text" class="form-control" name="menu" id="menu" placeholder="Menu" value="<?php echo $menu; ?>" />
          </div>
  	       <div class="form-group">
              <label for="isi">Isi <?php echo form_error('isi') ?></label>
              <textarea class="form-control" rows="3" name="isi" id="isi" placeholder="Isi"><?php echo $isi; ?></textarea>
          </div>
  	       <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
  	       <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
  	       <a href="<?php echo site_url('compro') ?>" class="btn btn-default">Cancel</a>
  	    </form> -->

        <div class="content">
            <div class="row">
              <div class="col-md-8">
                <div class="card">
                  <div class="card-header">
                    <h5 class="title">Compro <?php echo $button ?></h5>
                  </div>
                  <div class="card-body">
                    <form action="<?php echo $action; ?>" method="post">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="varchar">Menu <?php echo form_error('menu') ?></label>
                            <input type="text" class="form-control" name="menu" id="menu" placeholder="Menu" value="<?php echo $menu; ?>" />
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="isi">Isi <?php echo form_error('isi') ?></label>
                            <textarea class="form-control" rows="3" name="isi" id="isi" placeholder="Isi"><?php echo $isi; ?></textarea>
                          </div>
                        </div>
                      </div>
                      <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                      <button type="submit" class="btn btn-success"><?php echo $button ?></button> 
                      <a href="<?php echo site_url('compro') ?>" class="btn btn-default">Cancel</a>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
        
    <?php include $_SERVER['DOCUMENT_ROOT'].'/application/views/admin/layout/footer.php'; ?>

    </div>
  </div>

<?php include $_SERVER['DOCUMENT_ROOT'].'/application/views/admin/layout/js.php'; ?>

</body>

</html>