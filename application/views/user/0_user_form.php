<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">0_user <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Unick <?php echo form_error('unick') ?></label>
            <input type="text" class="form-control" name="unick" id="unick" placeholder="Unick" value="<?php echo $unick; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Upass <?php echo form_error('upass') ?></label>
            <input type="text" class="form-control" name="upass" id="upass" placeholder="Upass" value="<?php echo $upass; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ugrp <?php echo form_error('ugrp') ?></label>
            <input type="text" class="form-control" name="ugrp" id="ugrp" placeholder="Ugrp" value="<?php echo $ugrp; ?>" />
        </div>
	    <input type="hidden" name="uid" value="<?php echo $uid; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('user') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>