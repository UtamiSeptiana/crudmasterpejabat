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
                <?php echo $this->session->flashdata('error'); ?>
                    <div class="alert-danger">
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                <?php endif; ?>
                <br>

                <table width="100%" class="table table-striped table-bordered table-hover" id="table">
                    <thead>
                        <tr>
                        <th>NO</th>
                            <th>ID</th>
                            <th>NAMA</th>
                            <th>JK</th>
                            <th>ALAMAT</th>
                            <th>M_PEJABAT_ID</th>
                            <th>TANGGAL BUAT</th>
                            <th>TANGGAL UBAH</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>

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
    <script src="<?php echo base_url('vendor/datatables-plugins/dataTables.bootstrap.min.js') ?>"  ></script>
    <script src="<?php echo base_url('vendor/datatables-responsive/dataTables.responsive.js') ?>"  ></script>

    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                "processing": true,
                "serverSide": true,

                "order": [], 
                "ajax": {
                    "url": "<?php echo site_url('pejabat/get_data'); ?>",
                    "type": "POST"
                },
                "columns": [

                    {"data": null,width: 10}, // Add row_number column
                        {"data": "id",width:10},
                        {"data": "nama",width:100},
                        {"data": "jenis_kelamin",width:10},
                        {"data": "alamat",width:100},
                        {"data": "nama_master",width:50},
                        {"data": "tglBuat",width:100},
                        {"data": "tglUbah",width:100},
                        {
                            "data": null,
                            "width": 100,
                            "orderable": false,
                            "render": function(data, type, row) {
                                var editUrl = "<?php echo site_url('pejabat/edit'); ?>/" + row.id;
                                var deleteUrl = "<?php echo site_url('pejabat/delete'); ?>/" + row.id;

                                return '<a href="' + editUrl + '" class="btn btn-warning btn-sm">Edit</a>' +
                                        ' ' +
                                       '<a href="' + deleteUrl + '" class="btn btn-danger btn-sm ml-2" onclick="return confirmDelete()">Delete</a>';

                            }
                        }
                ],
                "createdRow": function(row, data, index) {
                $('td', row).eq(0).html(index + 1);
            }
                
            });
        });
    </script>

    <script>
        function confirmDelete() {
    return confirm('Apakah Anda yakin ingin menghapus data ini?');
}
    </script>

</body>

</html>





