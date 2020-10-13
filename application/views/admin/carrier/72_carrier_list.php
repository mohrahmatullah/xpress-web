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
                    <h4 class="card-title"> Carrier List</h4>
                  </div>
                  <div class="row" style="margin-bottom: 10px">
                    <div class="col-md-4">
                        &nbsp;&nbsp;&nbsp;&nbsp;<?php echo anchor(site_url('carrier/create'),'Create', 'class="btn btn-info"'); ?>
                    </div>
                    <div class="col-md-4 text-center">
                        <div style="margin-top: 8px" id="message">
                            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                        </div>
                    </div>
                    <div class="col-md-1 text-right">
                    </div>
                    <div class="col-md-3 text-right">
                      <form action="<?php echo site_url('carrier/index'); ?>" method="get">
                        <div class="input-group no-border">
                          <input type="text" class="form-control" placeholder="Search..." name="q" value="<?php echo $q; ?>">
                          <div class="input-group-append">
                            <div class="input-group-text">
                                  <?php 
                                    if ($q <> '')
                                    {
                                        ?>
                                        <a href="<?php echo site_url('carrier'); ?>" class="btn btn-default">Reset</a>
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
                            <th class="text-left">Car</th>
                            <th class="text-left">Cp</th>
                            <th class="text-left">Carco</th>
                            <th class="text-left">Ph</th>
                            <th class="text-left">Mob</th>
                            <th class="text-left">Almt</th>
                            <th class="text-left">City</th>
                            <th class="text-left">Country</th>
                            <th class="text-left">Zip</th>
                            <th class="text-left">Mail</th>
                            <th class="text-left">Sosmed</th>
                            <th class="text-left">Bank</th>
                            <th class="text-left">Taxid</th>
                            <th class="text-left">Del</th>
                            <th class="text-left">
                            Action
                            </th>
                        </thead>
                        <tbody>
                          <?php
                            foreach ($carrier_data as $carrier)
                            {
                                ?>
                        <tr>
                            <td width="80px"><?php echo ++$start ?></td>
                            <td><?php echo $carrier->car ?></td>
                            <td><?php echo $carrier->cp ?></td>
                            <td><?php echo $carrier->carco ?></td>
                            <td><?php echo $carrier->ph ?></td>
                            <td><?php echo $carrier->mob ?></td>
                            <td><?php echo $carrier->almt ?></td>
                            <td><?php echo $carrier->city ?></td>
                            <td><?php echo $carrier->country ?></td>
                            <td><?php echo $carrier->zip ?></td>
                            <td><?php echo $carrier->mail ?></td>
                            <td><?php echo $carrier->sosmed ?></td>
                            <td><?php echo $carrier->bank ?></td>
                            <td><?php echo $carrier->taxid ?></td>
                            <td><?php echo $carrier->del ?></td>
                            <td>
                                <?php 
                                echo anchor(site_url('carrier/read/'.$carrier->id),'Read'); 
                                echo ' | '; 
                                echo anchor(site_url('carrier/update/'.$carrier->id),'Update'); 
                                echo ' | '; 
                                echo anchor(site_url('carrier/delete/'.$carrier->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
                          <?php echo anchor(site_url('carrier/excel'), 'Excel', 'class="btn btn-danger"'); ?>
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