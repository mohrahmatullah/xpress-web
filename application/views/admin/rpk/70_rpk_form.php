<!DOCTYPE html>
<html lang="en">

<?php include $_SERVER['DOCUMENT_ROOT'].'/application/views/admin/layout/head.php'; ?>

<body class="">
  <div class="wrapper ">

    <?php include $_SERVER['DOCUMENT_ROOT'].'/application/views/admin/layout/sidebar.php'; ?>

    <div class="main-panel">

      <?php include $_SERVER['DOCUMENT_ROOT'].'/application/views/admin/layout/navbar.php'; ?>


      <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Rpk <?php echo $button ?></h5>
              </div>
              <div class="card-body">
                <form action="<?php echo $action; ?>" method="post">
            
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label for="varchar">Kodrpk <?php echo form_error('kodrpk') ?></label>
                        <input type="text" class="form-control" name="kodrpk" id="kodrpk" placeholder="Kodrpk" value="<?php echo $kodrpk; ?>" />
                        </div>
                    </div>
                    <div class="col-md-4 px-1">
                        <div class="form-group">
                            <label for="varchar">Country <?php echo form_error('country') ?></label>
                            <input type="text" class="form-control" name="country" id="country" placeholder="Country" value="<?php echo $country; ?>" />
                        </div>
                    </div>
                    <div class="col-md-4 pl-1">
                        <div class="form-group">
                            <label for="varchar">Car <?php echo form_error('car') ?></label>
                            <input type="text" class="form-control" name="car" id="car" placeholder="Car" value="<?php echo $car; ?>" />
                        </div>
                    </div>
                    <div class="col-md-4 pr-1">
                        <div class="form-group">
                            <label for="varchar">Iso2 <?php echo form_error('iso2') ?></label>
                            <input type="text" class="form-control" name="iso2" id="iso2" placeholder="Iso2" value="<?php echo $iso2; ?>" />
                        </div>
                    </div>
                    <div class="col-md-4 px-1">
                        <div class="form-group">
                            <label for="int">Shc <?php echo form_error('shc') ?></label>
                            <input type="text" class="form-control" name="shc" id="shc" placeholder="Shc" value="<?php echo $shc; ?>" />
                        </div>
                    </div>
                    <div class="col-md-4 pl-1">
                        <div class="form-group">
                            <label for="int">Kg1 <?php echo form_error('kg1') ?></label>
                            <input type="text" class="form-control" name="kg1" id="kg1" placeholder="Kg1" value="<?php echo $kg1; ?>" />
                        </div>
                    </div>
                    <div class="col-md-4 pr-1">
                        <div class="form-group">
                            <label for="int">Kg2 <?php echo form_error('kg2') ?></label>
                            <input type="text" class="form-control" name="kg2" id="kg2" placeholder="Kg2" value="<?php echo $kg2; ?>" />
                        </div>
                    </div>
                    <div class="col-md-4 px-1">
                        <div class="form-group">
                            <label for="int">Kg5 <?php echo form_error('kg5') ?></label>
                            <input type="text" class="form-control" name="kg5" id="kg5" placeholder="Kg5" value="<?php echo $kg5; ?>" />
                        </div>
                    </div>
                    <div class="col-md-4 pl-1">
                        <div class="form-group">
                            <label for="int">Kg10 <?php echo form_error('kg10') ?></label>
                            <input type="text" class="form-control" name="kg10" id="kg10" placeholder="Kg10" value="<?php echo $kg10; ?>" />
                        </div>
                    </div>
                    <div class="col-md-4 pr-1">
                        <div class="form-group">
                            <label for="int">Kg20 <?php echo form_error('kg20') ?></label>
                            <input type="text" class="form-control" name="kg20" id="kg20" placeholder="Kg20" value="<?php echo $kg20; ?>" />
                        </div>
                    </div>
                    <div class="col-md-4 px-1">
                        <div class="form-group">
                            <label for="int">Kg30 <?php echo form_error('kg30') ?></label>
                            <input type="text" class="form-control" name="kg30" id="kg30" placeholder="Kg30" value="<?php echo $kg30; ?>" />
                        </div>
                    </div>
                    <div class="col-md-4 pl-1">
                        <div class="form-group">
                            <label for="varchar">Ltime <?php echo form_error('ltime') ?></label>
                            <input type="text" class="form-control" name="ltime" id="ltime" placeholder="Ltime" value="<?php echo $ltime; ?>" />
                        </div>
                    </div>
                    <div class="col-md-4 pl-1">
                        <div class="form-group">
                            <label for="varchar">Jenis <?php echo form_error('jenis') ?></label>
                            <input type="text" class="form-control" name="jenis" id="jenis" placeholder="Jenis" value="<?php echo $jenis; ?>" />
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="varchar">Ket <?php echo form_error('ket') ?></label>
                            <input type="text" class="form-control" name="ket" id="ket" placeholder="Ket" value="<?php echo $ket; ?>" />
                        </div>
                    </div>
                  </div>
                    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                    <button type="submit" class="btn btn-success"><?php echo $button ?></button> 
                    <a href="<?php echo site_url('rpk') ?>" class="btn btn-default">Cancel</a>
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