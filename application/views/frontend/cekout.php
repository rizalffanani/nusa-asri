<form class="whole-wrap" method="post" action="<?= base_url(); ?>onlineshop/update_cart">
	<div class="container box_1170">
			<div class="section-top-border">
				<div class="progress-table-wrap">
					<div class="progress-table">
						<div class="table-head">
							<div class="serial">#</div>
							<div class="visit">Nama Produk</div>
							<div class="visit">Harga</div>
							<div class="visit">Qty</div>
							<div class="visit">Jumlah Pinjah</div>
							<div class="visit">Sub Total</div>
						</div>
						<?php $i = 1;$b=0; $keid = array(); foreach ($trandetail_data as $key) : ?>
						<div class="table-row">
							<div class="serial"><?= $i?></div>
							<div class="visit"><?= $key->nama_produk?></div>
							<div class="visit">Rp.<?= $key->harga_sewa?></div>
							<div class="visit"><?= $key->qty?></div>
							<div class="visit"><?= $tran_data->jmlhari?></div>
							<div class="visit">Rp.<?php echo $key->sub_total;$b=$b+$key->sub_total;?></div>
						</div>
						<?php $i++;endforeach; ?>
						<div class="table-row">
							<div class="serial">Total</div>
							<div class="visit"></div>
							<div class="visit"></div>
							<div class="visit"></div>
							<div class="visit"></div>
							<div class="visit">Rp.<?= $b?></div>
						</div>
					</div>
				</div>
			</div>
	</div>
</form>
