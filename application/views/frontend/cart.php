<form class="whole-wrap" method="post" action="<?= base_url(); ?>onlineshop/update_cart">
		<div class="container box_1170">
			<div class="section-top-border">
				<h3 class="mb-30">Keranjang Belanja <?= count($this->cart->contents());?></h3>
				<div class="progress-table-wrap">
					<div class="progress-table">
						<div class="table-head">
							<div class="serial">#</div>
							<div class="visit">Nama Produk</div>
							<div class="visit">Harga</div>
							<div class="visit">Qty</div>
							<div class="visit">Tgl Transaksi</div>
							<div class="visit">Tgl Kembali</div>
							<div class="visit">Total</div>
							<div class="visit">Aksi</div>
						</div>
						<?php $i = 1;$b=0; $keid = array(); foreach($this->cart->contents() as $key) : ?>
						<div class="table-row">
							<div class="serial"><?= $i?></div>
							<div class="visit"><?= $key['name']?></div>
							<div class="visit">Rp.<?= $key['price']?></div>
							<div class="visit"><input type="number" value="<?= $key['qty']?>" min='1' name="qty<?= $key['rowid']?>" placeholder="Primary color"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Primary color'" required
                                    class="single-input-primary"></div>
							<div class="visit"><?= date("Y-m-d")?></div><?php $jmlhari = $key['jmlhari'];?>
							<div class="visit"><?= date('Y-m-d', strtotime(' +'.$jmlhari.' day'))?></div>
							<div class="visit">Rp.<?= $st = ($key['price']*$key['qty']*$jmlhari)?></div><?php $b=$b+$st;?>
							<div class="visit"><a href="<?= base_url(); ?>onlineshop/hapus_cart/<?= $key['rowid']; ?>" class="genric-btn danger radius">Hapus</a></div>
						</div>
						<?php $i++;endforeach; ?>
					</div>
				</div>
			</div>
			<?php if(count($this->cart->contents())>0){?>
			<div>
				<div>Jumlah Hari Sewa</div>
				<div><select class="form-select" id="default-select" name="jmlhari">
                    <option value="1" <?= (@$jmlhari=='1') ? 'selected' : '' ;?> >1 hari</option>
                    <option value="2" <?= (@$jmlhari=='2') ? 'selected' : '' ;?> >2 hari</option>
                    <option value="3" <?= (@$jmlhari=='3') ? 'selected' : '' ;?> >3 hari</option>
                </select></div>
                <div class="button-group-area mt-40">
                	<a href="#" class="genric-btn disable">Total Rp.<?= $b?></a>
					<a href="<?= base_url(); ?>akun/checkout/<?= $b?>/<?= $jmlhari?>" class="genric-btn success radius">Check Out</a>
					<button type="submit" class="genric-btn primary radius">Update</button>
				</div>
			</div>
		<?php }?>
	</div>
</form>
