<?php $this->load->view('partials/header') ?>

<?php $this->load->view('partials/sidebar') ?>

<!-- ================================================================== -->
<!--                      MULAI TAMPILAN ISI                            -->
<!-- ================================================================== -->

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit Pejabat</h1>
            </div>
        </div>

        <div class="panel panel-default col-lg-6">
            <div class="panel-body">
                <form class="form" method="post" action="">
                    <label for="nama">NAMA</label>
                        <input class="form-control" type="text" name="nama" value="<?php echo $pejabat->nama; ?>" required>
                    <br>
                    <br>

                    <label for="jenis_kelamin">JENIS KELAMIN</label>
                        <div class="radio">
                            <label><input type="radio" name="jenis_kelamin" value="L" <?php if ($pejabat->jenis_kelamin == "L") echo "checked"; ?>> Laki-laki </label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" name="jenis_kelamin" value="P" <?php if ($pejabat->jenis_kelamin == "P") echo "checked"; ?>> Perempuan </label>        
                        </div>
                    <br>

                    <label for="alamat">ALAMAT</label>
                        <input class="form-control" type="text" name="alamat" value="<?php echo $pejabat->alamat; ?>" required>
                    <br>
                    <br>

                    <label for="m_pejabat_id">JABATAN</label>
                        <select class="js-example-basic-single form-control" id="m_pejabat_id"  name="m_pejabat_id">
                            <?php foreach ($pejabat_options as $master_pejabat): ?>
                                <option value="<?= $master_pejabat->id ?>" <?= ($master_pejabat->id == $pejabat->m_pejabat_id) ? 'selected' : '' ?>>
                                    <?= $master_pejabat->nama ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    <br>

                    <div>
                        <br>
                        <a class="btn btn-danger" href="<?php echo site_url('pejabat'); ?>" class="button-kembali">Kembali</a>
                        <button class="btn btn-primary" type="submit">Ubah</button>
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
            $('#m_pejabat_id').select2({
                    ajax: {
                        url: '<?= site_url('pejabat/select_data') ?>',
                        dataType: 'json',
                        delay: 250,
                        data: function(params) {
                            return {
                                q: params.term,
                                page: params.page || 1
                            };
                        },
                        processResults: function(data, params) {
                            params.page = params.page || 1;

                            return {
                                results: data.results,
                                pagination: {                    
                                more: data.pagination.more
                                }
                            };
                        },
                        cache: true
                    },
                    minimumInputLength: 0
                });
        });
    </script>

</body>

</html>
