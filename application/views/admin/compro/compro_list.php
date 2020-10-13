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
                    <h4 class="card-title"> Compro List</h4>
                  </div>
                  <div class="row" style="margin-bottom: 10px">
                    <div class="col-md-4">
                        &nbsp;&nbsp;&nbsp;&nbsp;<?php echo anchor(site_url('compro/create'),'Create', 'class=" btn btn-info"'); ?>
                    </div>
                    <div class="col-md-4 text-center">
                        <div style="margin-top: 8px" id="message">
                            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                        </div>
                    </div>
                    <div class="col-md-1 text-right">
                    </div>
                    <div class="col-md-3 text-right">
                      <form action="<?php echo site_url('compro/index'); ?>" method="get">
                        <div class="input-group no-border">
                          <input type="text" class="form-control" placeholder="Search..." name="q" value="<?php echo $q; ?>">
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <?php 
                                        if ($q <> '')
                                        {
                                            ?>
                                            <h9><a href="<?php echo site_url('compro'); ?>">Reset</a></h9>
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
                          <th class="text-left">
                            No
                          </th>
                          <th class="text-left">
                            Menu
                          </th>
                          <th class="text-left">
                            Isi
                          </th>
                          <th class="text-left">
                            Action
                          </th>
                        </thead>
                        <tbody>
                          <?php
                            foreach ($compro_data as $compro)
                            {
                                ?>
                            <tr>
                                <td width="80px"><?php echo ++$start ?></td>
                                <td><?php echo $compro->menu ?></td>
                                <td><?php echo $compro->isi ?></td>
                                <td>
                                    <?php 
                                    echo anchor(site_url('compro/read/'.$compro->id),'Read'); 
                                    echo ' | '; 
                                    echo anchor(site_url('compro/update/'.$compro->id),'Update'); 
                                    echo ' | '; 
                                    echo anchor(site_url('compro/delete/'.$compro->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
                          <?php echo anchor(site_url('compro/excel'), 'Excel', 'class="btn btn-danger"'); ?>
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
