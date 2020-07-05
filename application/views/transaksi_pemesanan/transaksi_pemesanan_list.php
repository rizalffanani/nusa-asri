<div class="row">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-info">

              <div class="info-box-content">
                <h3><?= $bp?></h3>
                <span class="progress-description">
                  Belum Diproses
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-success">

              <div class="info-box-content">
                <h3><?= $sd?></h3>
                <span class="progress-description">
                  Sedang Diproses
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-warning">

              <div class="info-box-content">
                <h3><?= $sdm?></h3>
                <span class="progress-description">
                  Siap Dikirim
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-danger">

              <div class="info-box-content">
                <h3><?= $tss?></h3>
                <span class="progress-description">
                  Transaksi Selesai
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('transaksi_pemesanan/create'), 'Tambah Pemesanan', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right"></div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
        		    <th>Tanggal Transaksi</th>
                    <th>Nomor Order</th>
        		    <th>Nama Pelanggan</th>
        		    <th>Tanggal Selesai</th>
        		    <!-- <th>Kurir</th> -->
        		    <!-- <th>Potongan</th> -->
                    <th>Total</th>
        		    <th>Jenis Pembayaran</th>
        		    <th>Terbayaran</th>
                <th>Sisa Pembayaran</th>
        		    <th width="200px">Status</th>
        		    <th>Action</th>
                </tr>
            </thead>
	        <tbody>
                <?php $i=1; foreach ($data as $key => $value) {?>
                <tr>
                    <td><?= $i?></td>
                    <td><?= $value->tanggal_transaksi?></td>
                    <td><?= $value->id_transaksi_pemesanan?></td>
                    <td><?= $value->nama_pelanggan?></td>
                    <td><?= $value->tanggal_selesai?></td>
                    <!-- <td><?= $value->kurir?></td> -->
                    <!-- <td><?= ($value->potongan=="Rp") ? $value->potongan." ".rupiah($value->jumlah_potongan) : $value->jumlah_potongan." ".$value->potongan ; ?></td> -->
                    <td><?= "Rp ".rupiah($value->total)?></td>
                    <td><?= $value->metode_pembayaran." ".$value->jenis_pembayaran?></td>
                    <td><?= "Rp ".rupiah($value->jml_pembayaran)?></td>
                    <td><?= "Rp ".rupiah($value->total-$value->jml_pembayaran)?></td>
                    <td>
                      <select class="form-control select2" onchange="reload(this.value,<?= $value->id_transaksi_pemesanan?>)">
                        <option value="1" <?php echo ($value->status=="pesanan selesai") ? 'selected' : '' ; ?>>pesanan selesai</option>
                        <option value="2" <?php echo ($value->status=="siap dikirim") ? 'selected' : '' ; ?>>siap dikirim</option>
                        <option value="3" <?php echo ($value->status=="transaksi selesai") ? 'selected' : '' ; ?>>transaksi selesai</option>
                      </select>
                    </td>
                    <td>
                      <?= 
                      anchor(site_url('transaksi_pemesanan/read/'.$value->id_transaksi_pemesanan),'Read')." | ".
                      anchor(site_url('transaksi_pemesanan/update/'.$value->id_transaksi_pemesanan),'Update')." | ".
                      anchor(site_url('transaksi_pemesanan/delete/'.$value->id_transaksi_pemesanan),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"')." | ".
                      anchor(site_url('transaksi_pemesanan/cetak/'.$value->id_transaksi_pemesanan),'Cetak');
                      ?>                    
                    </td>
                </tr>
                <?php $i++;}?>
            </tbody>
        </table>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#mytable').DataTable();
            } );
            function reload(a,b) {
              window.location = "<?php echo base_url() ?>transaksi_pemesanan/update_status/"+a+'/'+b;
            }
        </script>