<div class="row">
          <div class="col-md-4 col-sm-6 col-12">
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
          <div class="col-md-4 col-sm-6 col-12">
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
          <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box bg-danger">

              <div class="info-box-content">
                <h3><?= $ps?></h3>
                <span class="progress-description">
                  Pesanan Selesai
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
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
                        <option value="1" <?php echo ($value->status=="pesanan diterima") ? 'selected' : '' ; ?>>pesanan diterima</option>
                        <option value="2" <?php echo ($value->status=="sudah dipotong") ? 'selected' : '' ; ?>>sudah dipotong</option>
                        <option value="3" <?php echo ($value->status=="dijahit") ? 'selected' : '' ; ?>>dijahit</option>
                        <option value="4" <?php echo ($value->status=="finishing") ? 'selected' : '' ; ?>>finishing</option>
                        <option value="5" <?php echo ($value->status=="pesanan selesai") ? 'selected' : '' ; ?>>pesanan selesai</option>
                      </select>
                    </td>
                    <td>
                      <?= anchor(site_url('transaksi_pemesanan/read/'.$value->id_transaksi_pemesanan),'Read');?>                    
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
              window.location = "<?php echo base_url() ?>status_pemesanan/update_action/"+a+'/'+b;
            }
        </script>
