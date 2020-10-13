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
        <h2 style="margin-top:0px">0_user Read</h2>
        <table class="table">
	    <tr><td>Unick</td><td><?php echo $unick; ?></td></tr>
	    <tr><td>Upass</td><td><?php echo $upass; ?></td></tr>
	    <tr><td>Ugrp</td><td><?php echo $ugrp; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('user') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>