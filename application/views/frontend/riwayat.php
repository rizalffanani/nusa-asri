<form class="whole-wrap" method="post" action="<?= base_url(); ?>onlineshop/update_cart">
		<div class="container box_1170">
			<div class="section-top-border">
				<h3 class="mb-30">Riwayat Transaksi</h3>
				<div class="progress-table-wrap">
					<div class="progress-table">
						<div class="table-head">
							<div class="serial">No Nota</div>
							<div class="visit">Tanggal Transaksi</div>
							<div class="visit">Tanggal Kembali</div>
							<div class="visit">Status</div>
							<div class="visit">Total</div>
							<div class="visit"></div>
						</div>
						<?php $i = 1;$b=0; $keid = array(); foreach($barang_dat1 as $key) : ?>
						<div class="table-row">
							<div class="serial"><?= $key->nonota?></div>
							<div class="visit"><?= $key->tgl_transaksi?></div>
							<div class="visit"><?= $key->tgl_kembali?></div>
							<div class="visit"><?= $key->status?></div>
							<div class="visit"><?= $key->total?></div>
							<div class="visit"><a href="<?= base_url(); ?>akun/ckt/<?= $key->nonota; ?>" class="genric-btn danger radius">Cetak</a></div>
						</div>
						<?php $i++;endforeach; ?>
					</div>
				</div>
			</div>
	</div>
</form>
