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
                    <h5 class="title">Vendor <?php echo $button ?></h5>
                  </div>
                  <div class="card-body">
                    <form action="<?php echo $action; ?>" method="post">
                      <div class="row">
                        <div class="col-md-4 px-1">
                            <div class="form-group">
                                <label for="varchar">Kod <?php echo form_error('kod') ?></label>
                                <input type="text" class="form-control" name="kod" id="kod" placeholder="Kod" value="<?php echo $kod; ?>" />
                            </div>
                        </div>
                        <div class="col-md-4 px-1">
                            <div class="form-group">
                                <label for="varchar">Cp <?php echo form_error('cp') ?></label>
                                <input type="text" class="form-control" name="cp" id="cp" placeholder="Cp" value="<?php echo $cp; ?>" />
                            </div>
                        </div>
                        <div class="col-md-4 px-1">
                            <div class="form-group">
                                <label for="varchar">Venco <?php echo form_error('venco') ?></label>
                                <input type="text" class="form-control" name="venco" id="venco" placeholder="Venco" value="<?php echo $venco; ?>" />
                            </div>
                        </div>
                        <div class="col-md-4 px-1">
                            <div class="form-group">
                                <label for="varchar">Ph <?php echo form_error('ph') ?></label>
                                <input type="text" class="form-control" name="ph" id="ph" placeholder="Ph" value="<?php echo $ph; ?>" />
                            </div>
                        </div>
                        <div class="col-md-4 px-1">
                            <div class="form-group">
                                <label for="varchar">Mob <?php echo form_error('mob') ?></label>
                                <input type="text" class="form-control" name="mob" id="mob" placeholder="Mob" value="<?php echo $mob; ?>" />
                            </div>
                        </div>
                        <div class="col-md-4 px-1">
                            <div class="form-group">
                                <label for="varchar">Almt <?php echo form_error('almt') ?></label>
                                <input type="text" class="form-control" name="almt" id="almt" placeholder="Almt" value="<?php echo $almt; ?>" />
                            </div>
                        </div>
                        <div class="col-md-4 px-1">
                            <div class="form-group">
                                <label for="varchar">City <?php echo form_error('city') ?></label>
                                <input type="text" class="form-control" name="city" id="city" placeholder="City" value="<?php echo $city; ?>" />
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
                                <label for="varchar">Zip <?php echo form_error('zip') ?></label>
                                <input type="text" class="form-control" name="zip" id="zip" placeholder="Zip" value="<?php echo $zip; ?>" />
                            </div>
                        </div>
                        <div class="col-md-4 px-1">
                            <div class="form-group">
                                <label for="varchar">Mail <?php echo form_error('mail') ?></label>
                                <input type="text" class="form-control" name="mail" id="mail" placeholder="Mail" value="<?php echo $mail; ?>" />
                            </div>
                        </div>
                        <div class="col-md-4 px-1">
                            <div class="form-group">
                                <label for="varchar">Sosmed <?php echo form_error('sosmed') ?></label>
                                <input type="text" class="form-control" name="sosmed" id="sosmed" placeholder="Sosmed" value="<?php echo $sosmed; ?>" />
                            </div>
                        </div>
                        <div class="col-md-4 px-1">
                            <div class="form-group">
                                <label for="varchar">Bank <?php echo form_error('bank') ?></label>
                                <input type="text" class="form-control" name="bank" id="bank" placeholder="Bank" value="<?php echo $bank; ?>" />
                            </div>
                        </div>
                        <div class="col-md-4 px-1">
                            <div class="form-group">
                                <label for="varchar">Taxid <?php echo form_error('taxid') ?></label>
                                <input type="text" class="form-control" name="taxid" id="taxid" placeholder="Taxid" value="<?php echo $taxid; ?>" />
                            </div>
                        </div>
                      </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                        <button type="submit" class="btn btn-success"><?php echo $button ?></button> 
                        <a href="<?php echo site_url('vendor') ?>" class="btn btn-default">Cancel</a>
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
