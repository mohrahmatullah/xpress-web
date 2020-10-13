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
                <h5 class="title">Country <?php echo $button ?></h5>
              </div>
              <div class="card-body">
                <form action="<?php echo $action; ?>" method="post">
                  <div class="row">
                    <div class="col-md-4 px-1">
                        <div class="form-group">
                            <label for="varchar">Iso2 <?php echo form_error('iso2') ?></label>
                            <input type="text" class="form-control" name="iso2" id="iso2" placeholder="Iso2" value="<?php echo $iso2; ?>" />
                        </div>
                    </div>
                    <div class="col-md-4 px-1">
                        <div class="form-group">
                            <label for="varchar">Country <?php echo form_error('country') ?></label>
                            <input type="text" class="form-control" name="country" id="country" placeholder="Country" value="<?php echo $country; ?>" />
                        </div>
                    </div>
                    <div class="col-md-4 px-1">
                        <div class="form-group">
                            <label for="varchar">Iso3 <?php echo form_error('iso3') ?></label>
                            <input type="text" class="form-control" name="iso3" id="iso3" placeholder="Iso3" value="<?php echo $iso3; ?>" />
                        </div>
                    </div>
                    <div class="col-md-4 px-1">
                        <div class="form-group">
                            <label for="varchar">Kodph <?php echo form_error('kodph') ?></label>
                            <input type="text" class="form-control" name="kodph" id="kodph" placeholder="Kodph" value="<?php echo $kodph; ?>" />
                        </div>
                    </div>
                    <div class="col-md-4 px-1">
                        <div class="form-group">
                            <label for="varchar">Continent <?php echo form_error('continent') ?></label>
                            <input type="text" class="form-control" name="continent" id="continent" placeholder="Continent" value="<?php echo $continent; ?>" />
                        </div>
                    </div>
                    <div class="col-md-4 px-1">
                        <div class="form-group">
                            <label for="varchar">Capital <?php echo form_error('capital') ?></label>
                            <input type="text" class="form-control" name="capital" id="capital" placeholder="Capital" value="<?php echo $capital; ?>" />
                        </div>
                    </div>
                    <div class="col-md-4 px-1">
                        <div class="form-group">
                            <label for="varchar">Ztime <?php echo form_error('ztime') ?></label>
                            <input type="text" class="form-control" name="ztime" id="ztime" placeholder="Ztime" value="<?php echo $ztime; ?>" />
                        </div>
                    </div>
                    <div class="col-md-4 px-1">
                        <div class="form-group">
                            <label for="varchar">Currency <?php echo form_error('currency') ?></label>
                            <input type="text" class="form-control" name="currency" id="currency" placeholder="Currency" value="<?php echo $currency; ?>" />
                        </div>
                    </div>
                  </div>
                    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                    <button type="submit" class="btn btn-success"><?php echo $button ?></button> 
                    <a href="<?php echo site_url('country') ?>" class="btn btn-default">Cancel</a>
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