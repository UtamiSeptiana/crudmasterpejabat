<?php $this->load->view('partials/header') ?>

<?php $this->load->view('partials/sidebar') ?>

<!-- ================================================================== -->
<!--                      MULAI TAMPILAN ISI                            -->
<!-- ================================================================== -->

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Data Pejabat</h1>
            </div>
        </div>

        <div class="row">
            <div class="panel-body">
                <form action="<?php echo site_url('pejabat/create'); ?>">
                    <button class="btn btn-primary" > TAMBAH PEJABAT</button>
                </form>
                <br>
                                
                <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert-success">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php elseif ($this->session->flashdata('error')): ?>
                    <div class="alert-danger">
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                <?php endif; ?>
                <br>

                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-pejabat">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAMA</th>
                            <th>JENIS KELAMIN</th>
                            <th>ALAMAT</th>
                            <th>MASTER PEJABAT ID</th>
                            <th>TANGGAL BUAT</th>
                            <th>TANGGAL UBAH</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                            $no = 0;
                            foreach ($pejabat_list as $pejabat)  { 
                            $no = $no + 1;
                        ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $pejabat->nama; ?></td>
                            <td><?php echo $pejabat->jenis_kelamin; ?></td>
                            <td><?php echo $pejabat->alamat; ?></td>
                            <td><?php echo $pejabat->nama_master; ?></td>
                            <td><?php echo $pejabat->tglBuat; ?></td>
                            <td><?php echo $pejabat->tglUbah; ?></td>
                            <td>
                                <a class="btn btn-sm btn-warning" href="<?php echo site_url('pejabat/edit/' . $pejabat->id); ?>">Edit</a>
                                <a class="btn btn-sm btn-danger" href="<?php echo site_url('pejabat/delete/' . $pejabat->id); ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus pejabat ini?')">Delete</a>
                            </td>
                        </tr>
                        <?Php }  ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
        <!-- /#page-wrapper -->

<!-- ================================================================== -->
<!--                    SELESAI TAMPILAN ISI                            -->
<!-- ================================================================== -->


<!-- ================================================================== -->
<!--                      MULAI TAMPILAN FOOTER                            -->
<!-- ================================================================== -->
<?php $this->load->view('partials/footer') ?>
<!-- ================================================================== -->
<!--                      SELESAI TAMPILAN FOOTER                       -->
<!-- ================================================================== -->


</div>
<!-- ================================================================== -->
<!--                      SELESAI WRAPPER                               -->
<!-- ================================================================== -->

    <!-- jQuery -->
    <script src="<?php echo base_url('vendor/jquery/jquery.min.js') ?>" ></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('vendor/bootstrap/js/bootstrap.min.js') ?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url('vendor/metisMenu/metisMenu.min.js') ?>"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url('vendor/raphael/raphael.min.js') ?>"></script>
    <script src="<?php echo base_url('vendor/morrisjs/morris.min.js') ?>"></script>
    <script src="<?php echo base_url('data/morris-data.js') ?>"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url('dist/js/sb-admin-2.js') ?>"></script>

    <!-- DataTables JavaScript -->
    <script src="<?php echo base_url('vendor/datatables/js/jquery.dataTables.min.js') ?>" ></script>
    <script src="<?php echo base_url('vendor/datatables-plugins/dataTables.bootstrap.min.js') ?>" ></script>
    <script src="<?php echo base_url('vendor/datatables-responsive/dataTables.responsive.js') ?>" ></script>

    <script>
    $(document).ready(function() {
        $('#dataTables-pejabat').DataTable({
            responsive: true
        });
    });
    </script>

</body>
</html>
