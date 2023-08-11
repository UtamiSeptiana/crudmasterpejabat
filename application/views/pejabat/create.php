<?php $this->load->view('partials/header') ?>

<?php $this->load->view('partials/sidebar') ?>

<!-- ================================================================== -->
<!--                      MULAI TAMPILAN ISI                            -->
<!-- ================================================================== -->

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tambah Pejabat</h1>
            </div>
        </div>

        <div class="panel panel-default col-lg-6">
            <div class="panel-body">
                <form class="form" method="post" action="">
                    <?php echo validation_errors(); ?>

                    <label for="nama">Nama</label>
                        <input class="form-control" type="text" name="nama" required>
                    <br>

                    <label>Jenis Kelamin</label>
                        <div class="radio">
                            <label><input class="radio" type="radio" name="jenis_kelamin" value="L" required>Laki-laki</label>
                        </div>
                        <div class="radio">
                            <label><input class="radio" type="radio" name="jenis_kelamin" value="P" required>Perempuan</label>
                        </div>
                    <br>

                    <label for="alamat">Alamat</label>
                        <input class="form-control"  type="text" name="alamat" required>
                    <br>

                    <label for="m_pejabat_id">Pilih Pejabat</label>
                        <select class="js-example-basic-single form-control" required name="m_pejabat_id">
                        <option value="">-- PILIH JABATAN ANDA --</option>
                            <?php foreach ($pejabat_options as $pejabat) { ?>
                                <option value="<?php echo $pejabat->id; ?>"><?php echo $pejabat->nama; ?></option>
                            <?php } ?>
                        </select>
                        <br>
                        <br>

                        <div>
                            <a class="btn btn-danger" href="<?php echo site_url('pejabat'); ?>" class="button-kembali">Kembali</a>
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                </form>
            </div>
                        <!-- /.panel-body -->
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

    <script src="<?php echo base_url('vendor/select2/dist/js/select2.min.js'); ?>"></script>

    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>

</body>

</html>
