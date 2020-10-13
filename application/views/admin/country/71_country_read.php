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
        <h2 style="margin-top:0px">71_country Read</h2>
        <table class="table">
	    <tr><td>Iso2</td><td><?php echo $iso2; ?></td></tr>
	    <tr><td>Country</td><td><?php echo $country; ?></td></tr>
	    <tr><td>Iso3</td><td><?php echo $iso3; ?></td></tr>
	    <tr><td>Kodph</td><td><?php echo $kodph; ?></td></tr>
	    <tr><td>Continent</td><td><?php echo $continent; ?></td></tr>
	    <tr><td>Capital</td><td><?php echo $capital; ?></td></tr>
	    <tr><td>Ztime</td><td><?php echo $ztime; ?></td></tr>
	    <tr><td>Currency</td><td><?php echo $currency; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('country') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>