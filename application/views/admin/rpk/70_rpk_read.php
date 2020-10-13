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
        <h2 style="margin-top:0px">70_rpk Read</h2>
        <table class="table">
	    <tr><td>Kodrpk</td><td><?php echo $kodrpk; ?></td></tr>
	    <tr><td>Country</td><td><?php echo $country; ?></td></tr>
	    <tr><td>Car</td><td><?php echo $car; ?></td></tr>
	    <tr><td>Iso2</td><td><?php echo $iso2; ?></td></tr>
	    <tr><td>Shc</td><td><?php echo $shc; ?></td></tr>
	    <tr><td>Kg1</td><td><?php echo $kg1; ?></td></tr>
	    <tr><td>Kg2</td><td><?php echo $kg2; ?></td></tr>
	    <tr><td>Kg5</td><td><?php echo $kg5; ?></td></tr>
	    <tr><td>Kg10</td><td><?php echo $kg10; ?></td></tr>
	    <tr><td>Kg20</td><td><?php echo $kg20; ?></td></tr>
	    <tr><td>Kg30</td><td><?php echo $kg30; ?></td></tr>
	    <tr><td>Ltime</td><td><?php echo $ltime; ?></td></tr>
	    <tr><td>Jenis</td><td><?php echo $jenis; ?></td></tr>
	    <tr><td>Ket</td><td><?php echo $ket; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('rpk') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>