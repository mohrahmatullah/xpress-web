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
                    <h4 class="card-title"> Rpk List</h4>
                  </div>
                  <div class="row" style="margin-bottom: 10px">
                    <div class="col-md-4">
                        &nbsp;&nbsp;&nbsp;&nbsp;<?php echo anchor(site_url('rpk/create'),'Create', 'class="btn btn-info"'); ?>
                    </div>
                    <div class="col-md-4 text-center">
                        <div style="margin-top: 8px" id="message">
                            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                        </div>
                    </div>
                    <div class="col-md-1 text-right">
                    </div>
                    <div class="col-md-3 text-right">
                      <form action="<?php echo site_url('rpk/index'); ?>" method="get">
                        <div class="input-group no-border">
                          <input type="text" class="form-control" placeholder="Search..." name="q" value="<?php echo $q; ?>">
                          <div class="input-group-append">
                            <div class="input-group-text">
                                <?php 
                                  if ($q <> '')
                                  {
                                      ?>
                                      <a href="<?php echo site_url('rpk'); ?>" class="btn btn-default">Reset</a>
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
                          <tr>
                            <th class="text-right">No</th>
                            <th class="text-right">Kodrpk</th>
                            <th class="text-right">Country</th>
                            <th class="text-right">Car</th>
                            <th class="text-right">Iso2</th>
                            <th class="text-right">Shc</th>
                            <th class="text-right">Kg1</th>
                            <th class="text-right">Kg2</th>
                            <th class="text-right">Kg5</th>
                            <th class="text-right">Kg10</th>
                            <th class="text-right">Kg20</th>
                            <th class="text-right">Kg30</th>
                            <th class="text-right">Ltime</th>
                            <th class="text-right">Jenis</th>
                            <th class="text-right">Ket</th>
                            <th class="text-right">
                              Action
                            </th>
                        </thead>
                        <tbody>
                            <?php
                              foreach ($rpk_data as $rpk)
                              {
                            ?>
                          <tr>
                            <td><?php echo ++$start ?></td>
                            <td><?php echo $rpk->kodrpk ?></td>
                            <td><?php echo $rpk->country ?></td>
                            <td><?php echo $rpk->car ?></td>
                            <td><?php echo $rpk->iso2 ?></td>
                            <td><?php echo $rpk->shc ?></td>
                            <td><?php echo $rpk->kg1 ?></td>
                            <td><?php echo $rpk->kg2 ?></td>
                            <td><?php echo $rpk->kg5 ?></td>
                            <td><?php echo $rpk->kg10 ?></td>
                            <td><?php echo $rpk->kg20 ?></td>
                            <td><?php echo $rpk->kg30 ?></td>
                            <td><?php echo $rpk->ltime ?></td>
                            <td><?php echo $rpk->jenis ?></td>
                            <td><?php echo $rpk->ket ?></td>
                            <td>
                              <?php 
                              echo anchor(site_url('rpk/read/'.$rpk->id),'Read'); 
                              echo ' | '; 
                              echo anchor(site_url('rpk/update/'.$rpk->id),'Update'); 
                              echo ' | '; 
                              echo anchor(site_url('rpk/delete/'.$rpk->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
                          <?php echo anchor(site_url('rpk/excel'), 'Excel', 'class="btn btn-danger"'); ?>
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