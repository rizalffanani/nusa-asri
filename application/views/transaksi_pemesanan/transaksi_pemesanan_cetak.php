<table class="table">
    <tr><td>Statuss</td><td><?php echo $status; ?></td></tr>
    <tr><td>Tanggal Transaksi</td><td><?php echo $tanggal_transaksi; ?></td></tr>
    <tr><td>Pelanggan</td><td><?php echo $nama_pelanggan; ?></td></tr>
    <tr><td>Tanggal Selesai</td><td><?php echo $tanggal_selesai; ?></td></tr>
    <tr><td>Kurir</td><td><?php echo $kurir; ?></td></tr>
    <tr><td colspan="2">
        <table class="table">
            <thead>                  
                <tr>
                  <th style="width: 40px">#</th>
                  <th>Produk</th>
                  <th style="width: 100px">Qty</th>
                  <th>Harga</th>
                  <th>Sub Total</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1;foreach ($detail as $key => $value) {?>
                <tr>
                    <td><?= $i?></td>
                    <td><?= $value->nama_barang?></td>
                    <td><?= $value->qty.' '.$value->unit?></td>
                    <td><?= $value->harga_barang?></td>
                    <td><?= $value->jumlah?></td>
                </tr>
                <?php $i++;}?>
            </tbody>
        </table>
    </td></tr>
    <tr><td>Jumlah Potongan</td><td><?php echo $potongan.' '.$jumlah_potongan; ?></td></tr>
    <tr><td>Total</td><td><?php echo 'Rp '.$total; ?></td></tr>
    <tr><td>Metode Pembayaran</td><td><?php echo $jenis_pembayaran.' '. $metode_pembayaran; ?></td></tr>
    <tr><td>Jml Pembayaran</td><td><?php echo 'Rp '.$jml_pembayaran; ?></td></tr>
    <tr><td></td><td><a href="<?php echo site_url('transaksi_pemesanan') ?>" class="btn btn-default">Cancel</a></td></tr>
</table>
<script>
    window.print();
</script>