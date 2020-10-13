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
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title"> Country List</h4>
                  </div>
                  <div class="row" style="margin-bottom: 10px">
                    <div class="col-md-4">
                        &nbsp;&nbsp;&nbsp;&nbsp;<?php echo anchor(site_url('country/create'),'Create', 'class="btn btn-info"'); ?>
                    </div>
                    <div class="col-md-4 text-center">
                        <div style="margin-top: 8px" id="message">
                            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                        </div>
                    </div>
                    <div class="col-md-1 text-right">
                    </div>
                    <div class="col-md-3 text-right">
                      <form action="<?php echo site_url('country/index'); ?>" method="get">
                        <div class="input-group no-border">
                          <input type="text" class="form-control" placeholder="Search..." name="q" value="<?php echo $q; ?>">
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('country'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                              <i class="now-ui-icons ui-1_zoom-bold" type="submit"></i>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table">
                        <thead class="text-primary">
                            <th class="text-left">No</th>
                            <th class="text-left">Iso2</th>
                            <th class="text-left">Country</th>
                            <th class="text-left">Iso3</th>
                            <th class="text-left">Kodph</th>
                            <th class="text-left">Continent</th>
                            <th class="text-left">Capital</th>
                            <th class="text-left">Ztime</th>
                            <th class="text-left">Currency</th>
                            <th class="text-left">Action</th>
                        </thead>
                        <tbody>
                          <?php
                            foreach ($country_data as $country)
                            {
                                ?>
                        <tr>
                            <td><?php echo ++$start ?></td>
                            <td><?php echo $country->iso2 ?></td>
                            <td><?php echo $country->country ?></td>
                            <td><?php echo $country->iso3 ?></td>
                            <td><?php echo $country->kodph ?></td>
                            <td><?php echo $country->continent ?></td>
                            <td><?php echo $country->capital ?></td>
                            <td><?php echo $country->ztime ?></td>
                            <td><?php echo $country->currency ?></td>
                            <td>
                                <?php 
                                echo anchor(site_url('country/read/'.$country->id),'Read'); 
                                echo ' | '; 
                                echo anchor(site_url('country/update/'.$country->id),'Update'); 
                                echo ' | '; 
                                echo anchor(site_url('country/delete/'.$country->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                                ?>
                            </td>
                        </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                      </table>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="#" class="btn btn-info">Total Record : <?php echo $total_rows ?></a>
                          <?php echo anchor(site_url('country/excel'), 'Excel', 'class="btn btn-danger"'); ?>
                        </div>
                        <div class="col-md-6 text-right">
                            <?php echo $pagination ?>
                        </div>
                    </div>
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