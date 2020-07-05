<table class="table">
    <tr><td>Tanggal Transaksi</td><td><?php echo $tanggal_transaksi; ?></td></tr>
    <tr><td>Pelanggan</td><td><?php echo $nama_pelanggan; ?></td></tr>
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
                    <td><?= $value->harga_jual?></td>
                    <td><?= $value->subtotal?></td>
                </tr>
                <?php $i++;}?>
            </tbody>
        </table>
    </td></tr>
    <tr><td>Jumlah Potongan</td><td><?php echo $potongan.' '.$jumlah_potongan; ?></td></tr>
    <tr><td>Total</td><td><?php echo 'Rp '.$total; ?></td></tr>
    <tr><td>Jenis Pembayaran</td><td><?php echo $jenis_pembayaran; ?></td></tr>
    <tr><td>Jml Pembayaran</td><td><?php echo 'Rp '.$jml_pembayaran; ?></td></tr>
    <tr><td></td><td><a href="<?php echo site_url('transaksi_penjualan') ?>" class="btn btn-default">Cancel</a></td></tr>
</table>