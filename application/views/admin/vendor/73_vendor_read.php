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
        <h2 style="margin-top:0px">73_vendor Read</h2>
        <table class="table">
	    <tr><td>Kod</td><td><?php echo $kod; ?></td></tr>
	    <tr><td>Cp</td><td><?php echo $cp; ?></td></tr>
	    <tr><td>Venco</td><td><?php echo $venco; ?></td></tr>
	    <tr><td>Ph</td><td><?php echo $ph; ?></td></tr>
	    <tr><td>Mob</td><td><?php echo $mob; ?></td></tr>
	    <tr><td>Almt</td><td><?php echo $almt; ?></td></tr>
	    <tr><td>City</td><td><?php echo $city; ?></td></tr>
	    <tr><td>Country</td><td><?php echo $country; ?></td></tr>
	    <tr><td>Zip</td><td><?php echo $zip; ?></td></tr>
	    <tr><td>Mail</td><td><?php echo $mail; ?></td></tr>
	    <tr><td>Sosmed</td><td><?php echo $sosmed; ?></td></tr>
	    <tr><td>Bank</td><td><?php echo $bank; ?></td></tr>
	    <tr><td>Taxid</td><td><?php echo $taxid; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('vendor') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>