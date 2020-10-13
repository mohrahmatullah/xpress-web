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
                    <h4 class="card-title"> Vendor List</h4>
                  </div>
                  <div class="row" style="margin-bottom: 10px">
                    <div class="col-md-4">
                        &nbsp;&nbsp;&nbsp;&nbsp;<?php echo anchor(site_url('vendor/create'),'Create', 'class="btn btn-info"'); ?>
                    </div>
                    <div class="col-md-4 text-center">
                        <div style="margin-top: 8px" id="message">
                            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                        </div>
                    </div>
                    <div class="col-md-1 text-right">
                    </div>
                    <div class="col-md-3 text-right">
                      <form action="<?php echo site_url('vendor/index'); ?>>" method="get">
                        <div class="input-group no-border">
                          <input type="text" class="form-control" placeholder="Search..." name="q" value="<?php echo $q; ?>">
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <?php 
                                        if ($q <> '')
                                        {
                                            ?>
                                            <h9><a href="<?php echo site_url('vendor'); ?>">Reset</a></h9>
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
                        <thead class=" text-primary">
                            <th class="text-right">No</th>
                            <th class="text-right">Kod</th>
                            <th class="text-right">Cp</th>
                            <th class="text-right">Venco</th>
                            <th class="text-right">Ph</th>
                            <th class="text-right">Mob</th>
                            <th class="text-right">Almt</th>
                            <th class="text-right">City</th>
                            <th class="text-right">Country</th>
                            <th class="text-right">Zip</th>
                            <th class="text-right">Mail</th>
                            <th class="text-right">Sosmed</th>
                            <th class="text-right">Bank</th>
                            <th class="text-right">Taxid</th>
                            <th class="text-right">Action</th>
                        </thead>
                        <tbody>
                          <?php
                            foreach ($vendor_data as $vendor)
                            {
                                ?>
                        <tr>
                            <td><?php echo ++$start ?></td>
                            <td><?php echo $vendor->kod ?></td>
                            <td><?php echo $vendor->cp ?></td>
                            <td><?php echo $vendor->venco ?></td>
                            <td><?php echo $vendor->ph ?></td>
                            <td><?php echo $vendor->mob ?></td>
                            <td><?php echo $vendor->almt ?></td>
                            <td><?php echo $vendor->city ?></td>
                            <td><?php echo $vendor->country ?></td>
                            <td><?php echo $vendor->zip ?></td>
                            <td><?php echo $vendor->mail ?></td>
                            <td><?php echo $vendor->sosmed ?></td>
                            <td><?php echo $vendor->bank ?></td>
                            <td><?php echo $vendor->taxid ?></td>
                            <td>
                                <?php 
                                echo anchor(site_url('vendor/read/'.$vendor->id),'Read'); 
                                echo ' | '; 
                                echo anchor(site_url('vendor/update/'.$vendor->id),'Update'); 
                                echo ' | '; 
                                echo anchor(site_url('vendor/delete/'.$vendor->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
                          <?php echo anchor(site_url('vendor/excel'), 'Excel', 'class="btn btn-danger"'); ?>
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
