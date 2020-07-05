<h2 style="margin-top:0px">Barang_masuk Read</h2>
<table class="table">
    <tr><td>Tanggal</td><td><?php echo $tanggal; ?></td></tr>
    <tr><td>Id Barang</td><td><?php echo $id_barang; ?></td></tr>
    <tr><td>Penerima</td><td><?php echo $penerima; ?></td></tr>
    <tr><td>Pemasok</td><td><?php echo $pemasok; ?></td></tr>
    <tr><td>Tandaterima</td><td><?php echo $tandaterima; ?></td></tr>
    <tr><td>Jumlah</td><td><?php echo $jumlah; ?></td></tr>
    <tr><td>Harga Beli</td><td><?php echo $harga_beli; ?></td></tr>
    <tr><td></td><td><a href="<?php echo site_url('barang_masuk') ?>" class="btn btn-default">Cancel</a></td></tr>
</table>