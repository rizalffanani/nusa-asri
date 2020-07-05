<div class="row" style="margin-bottom: 10px">
    <div class="col-md-4">
        <!-- <h2 style="margin-top:0px">Transaksi_pengeluaran List</h2> -->
        <?php echo anchor(site_url('transaksi_pengeluaran/create'), 'Tambah Laporan Pengeluaran', 'class="btn btn-primary"'); ?>`
    </div>
    <div class="col-md-4 text-center">
        <div style="margin-top: 4px"  id="message">
            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        </div>
    </div>
    <div class="col-md-4 text-right"></div>
</div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Pemasukan</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered table-striped" id="mytable">
                <thead>
                    <tr>
                        <th width="80px">No</th>
                        <th>Tanggal</th>
                        <th>Rincian</th>
                        <th>Nominal</th>
                        <th>Pembayaran</th>
                        <!-- <th width="200px">Action</th> -->
                    </tr>
                </thead>          
                <tbody>
                    <?php $i=1; foreach ($lappemasukan as $key => $value) {?>
                    <tr>
                        <td><?= $i?></td>
                        <td><?= $value->tanggal_transaksi?></td>
                        <td><?= "Pemesanan "?></td>
                        <td><?= "Rp.".rupiah($value->jml_pembayaran)?></td>
                        <td><?= $value->jenis_pembayaran.' '.$value->metode_pembayaran?></td>
                        <!-- <td><?= $i?></td> -->
                    </tr>
                    <?php $i++;}?>
                    <?php foreach ($lappejualan as $key => $value) {?>
                    <tr>
                        <td><?= $i?></td>
                        <td><?= $value->tanggal_transaksi?></td>
                        <td><?= "Penjualan "?></td>
                        <td><?= "Rp.".rupiah($value->jml_pembayaran)?></td>
                        <td><?= $value->jenis_pembayaran?></td>
                        <!-- <td><?= $i?></td> -->
                    </tr>
                    <?php $i++;}?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Pengeluaran</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered table-striped" id="mytable2">
                <thead>
                    <tr>
                        <th width="80px">No</th>
                        <th>Tanggal</th>
                        <th>Rincian</th>
                        <th>Nominal</th>
                        <th>Sumber Dana</th>
                        <th width="200px">Action</th>
                    </tr>
                </thead>       
                <tbody>
                    <?php $i=1; foreach ($lappengeluaran as $key => $value) {?>
                    <tr>
                        <td><?= $i?></td>
                        <td><?= $value->tanggal?></td>
                        <td><?= $value->rincian?></td>
                        <td><?= "Rp.".rupiah($value->nominal)?></td>
                        <td><?= $value->sumber_dana?></td>
                        <td><?= anchor(site_url('transaksi_pengeluaran/read/$value->id_transaksi_pengeluaran'),'Read')." | ".anchor(site_url('transaksi_pengeluaran/update/$value->id_transaksi_pengeluaran'),'Update')." | ".anchor(site_url('transaksi_pengeluaran/delete/$value->id_transaksi_pengeluaran'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"')?></td>
                    </tr>
                    <?php $i++;}?>
                </tbody>     
            </table>
        </div>
    </div>
        
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#mytable').DataTable();
                $('#mytable2').DataTable();
            } );
        </script>
