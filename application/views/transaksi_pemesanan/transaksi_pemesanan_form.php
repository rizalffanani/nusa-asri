<form action="<?php echo $action; ?>" method="post">    
    <div class="card ">
      <div class="card-body">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="datetime">No Order <?php echo form_error('id_transaksi_pemesanan') ?></label>
                <input type="number" class="form-control" name="id_transaksi_pemesanan" id="id_transaksi_pemesanan" placeholder="No Order " value="<?php echo $id_transaksi_pemesanan; ?>" readonly/>
              </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="date">Tanggal Transaksi <?php echo form_error('tanggal_transaksi') ?></label>
                    <input type="date" class="form-control" name="tanggal_transaksi" id="tanggal_transaksi" placeholder="Tanggal Transaksi" value="<?php echo $tanggal_transaksi; ?>" />
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="int">Pelanggan <?php echo form_error('id_pelanggan') ?></label>
                    <?php echo cmb_dinamis('id_pelanggan', 'pelanggan', 'nama_pelanggan', 'id_pelanggan', $id_pelanggan,'select2bs4','panggil(this.value)') ?>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="date">Tanggal Selesai <?php echo form_error('tanggal_selesai') ?></label>
                    <input type="date" class="form-control" name="tanggal_selesai" id="tanggal_selesai" placeholder="Tanggal Selesai" value="<?php echo $tanggal_selesai; ?>" />
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label><i class="fa fa-home" aria-hidden="true"></i> <span id="alamat"></span></label>
                </div>
                <div class="form-group">
                    <label><i class="fa fa-phone" aria-hidden="true"></i> <span id="no_telepon"></span></label>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="varchar">Kurir <?php echo form_error('kurir') ?></label>
                    <input type="text" class="form-control" name="kurir" id="kurir" placeholder="Kurir" value="<?php echo $kurir; ?>" />
                </div>
            </div>
          </div>
      </div>
    </div>
    <div class="card">
      <!-- /.card-header -->
      <div class="card-body">
        <table class="table table-bordered">
          <thead>                  
            <tr>
              <th>Produk</th>
              <th style="width: 100px">Qty</th>
              <th>Harga</th>
              <th>Sub Total</th>
              <th style="width: 40px"></th>
            </tr>
          </thead>
          <tbody id="table">
            <?php $i = 1;foreach($this->cart->contents() as $key) : ?>
            <tr id="tr1">
                <td>
                    <input type="text" class="form-control" name="nama_barang[]" id="nama_barang<?= $i?>" value="<?= @$key['names']?>" placeholder="barang" onclick="angka('<?= $key['rowid']; ?>',<?= $i?>)" data-toggle="modal" data-target="#modal-lg"/>
                </td>
                <td>
                    <input type="number" class="form-control" name="qtys[]" id="qtys<?= $i?>" value="<?= @$key['qty']?>" placeholder="Qty" onchange="plus(this.value,<?= $i?>)" min="0" mk<?= $i?>="<?= $i?>"  />
                </td>
                <td>
                    <input type="number" class="form-control" name="harga_jual[]" id="harga_jual<?= $i?>"  value="<?= @$key['price']?>"readonly>
                </td>
                <td>
                    <input type="number" class="form-control" name="subtototal[]" id="subtototal<?= $i?>"  value="<?= (@$key['qty']*@$key['price'])?>"readonly>
                </td>
                <td><?php if($i>1){?><a href="#" onclick="hapus2(this,'<?= $key['rowid']?>')">Hapus</a><?php }?></td>
            </tr>
            <?php $i++;endforeach; ?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
      <div class="card-footer clearfix">
       <a onclick="tambah()" class="btn btn-success">Tambah Baris</a>
      </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
              <div class="form-horizontal">
                    <div class="card-footer">                      
                      <input type="hidden" name="jenis_pembayaran" id="jenis_pembayaran" value="<?php echo $jenis_pembayaran; ?>">
                      <input type="hidden" name="metode_pembayaran" id="metode_pembayaran" value="<?php echo $metode_pembayaran; ?>">
                      <input type="hidden" name="id_transaksi_pemesanan" value="<?php echo $id_transaksi_pemesanan; ?>" /> 
                      <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                      <a href="<?php echo site_url('transaksi_pemesanan') ?>" class="btn btn-default float-right">Cancel</a>
                    </div>
              </div>
            </div>              
        </div>
        <div class="col-md-8">
            <div class="card">
              <div class="form-horizontal">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Sub Total</label>
                    <div class="col-sm-8">
                      <input type="number" class="form-control" id="subttl" placeholder="Sub Total" readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Potongan</label>
                    <div class="col-sm-3">
                        <select class="form-control" name="potongan" id="potongan">
                            <option value="Rp">Rp</option>
                            <option value="%">%</option>
                        </select>
                    </div>
                    <div class="col-sm-5">
                      <input type="number" name="jumlah_potongan" id="jumlah_potongan" value="0" onchange="pot(this.value)" class="form-control" placeholder="Potongan" min="0">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Total</label>
                    <div class="col-sm-8">
                      <input type="number" name="total" id="total" value="<?php echo $total; ?>" class="form-control" placeholder="Total" readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Pembayaran</label>
                    <div class="col-sm-8">
                      <input type="number" name="jml_pembayaran" id="jml_pembayaran" value="<?php echo $jml_pembayaran; ?>" class="form-control" placeholder="Pembayaran"  data-toggle="modal" data-target="#modal-lg2">
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</form>
<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
      <form class="modal-content" id="form1">
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="int">Jenis Barang Pesanan <?php echo form_error('id_pelanggan') ?></label>
                    <?php echo cmb_dinamis('id_barang_pesanan', 'jenis_barang_pesanan', 'jenis_barang', 'id_barang_pesanan', $id_pelanggan,'select2','panggil2(this.value);panggil3(this.value);') ?>
                </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for="datetime">Set</label>
                <input type="text" class="form-control" name="set" id="set" placeholder="Set" readonly/>
              </div>
            </div>
            <div class="col-sm-4" id="valueform" style="display: none;">
              <div class="form-group">
                <label></label>                
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="customCheckbox1" value="option2" name="value">
                  <label class="form-check-label" id="valuelabel">Custom Checkbox</label>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <table class="table table-bordered">
                <thead>                  
                  <tr>
                    <th>Nama Kain</th>
                    <th>Bidang</th>
                    <th>Ukuran</th>
                    <th>Pemakain</th>
                    <th>Harga</th>
                    <th><button type="button" class="btn btn-block btn-primary" onclick="tambah2()"><i class="fas fa-plus"></i></button></th>
                  </tr>
                </thead>
                <tbody id="table2">
                  <tr id="trt0">
                      <td>
                          <input type="text" class="form-control" name="nama_kain[]" id="nama_kain0" placeholder="Nama Kain" />
                      </td>
                      <td>
                          <select class="form-control" name="bidang[]" id="bidang0" >
                            <option value="">Pilih Bidang</option>
                            <option value="bidang kecil">bidang kecil</option>
                            <option value="bidang besar">bidang besar</option>
                        </select>
                      </td>
                      <td>
                          <input type="number" class="form-control"  name="ukuran[]" id="ukuran0" placeholder="Ukuran" min="1">
                      </td>
                      <td>
                          <input type="text" class="form-control" name="pemakaian[]" id="pemakainn0" placeholder="Pemakaian" />
                      </td>
                      <td><input type="number" class="form-control"  name="hrga[]" id="hrga0" placeholder="Harga" min="1"></td>
                      <td></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="int">Model</label>
                    <select name="jenis_barang_pesanan_model" id="jenis_barang_pesanan_model" class="form-control select2" required></select>
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="int">Tambahan</label>
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th>Produk</th>
                      <th>Qty</th>
                      <th>Unit</th>
                      <th>Harga</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td>
                            <input type="text" class="form-control" name="produk1" id="produk1" placeholder="Nama Produk" />
                        </td>
                        <td>
                            <input type="number" class="form-control"  name="qty1" id="qty1" placeholder="Qty" min="1">
                        </td>
                        <td>
                            <select class="form-control" name="unit1" id="unit1" >
                              <option value="">Pilih Unit</option>
                              <option value="pcs">pcs</option>
                              <option value="m">m</option>
                          </select>
                        </td>
                        <td>
                            <input type="number" class="form-control" name="harga1" id="harga1" placeholder="Harga" min="1" />
                        </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <input type="hidden" name="acak" id="acak" >
          <input type="hidden" name="id" id="id" >
          <button type="button" class="btn btn-primary" onclick="save()">Save</button>
          <button type="button" class="btn btn-default" data-dismiss="modal" id="close">Close</button>
        </div>
      </form>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal-lg2">
    <div class="modal-dialog modal-lg">
      <form class="modal-content" >
        <div class="modal-body">
          <div class="form-horizontal">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Jenis Pembayaran</label>
                    <div class="col-sm-9">
                      <select class="form-control" id="jenis_pembayaran2" onchange="dp(this.value)">
                            <option value="">pilih</option>
                            <option value="dp">dp</option>
                            <option value="lunas">lunas</option>
                        </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-3 col-form-label">Metode Pembayaran</label>
                    <div class="col-sm-9">
                      <select class="form-control" id="metode_pembayaran2" onchange="md(this.value)">
                            <option value="">pilih</option>
                            <option value="cash">cash</option>
                            <option value="transfer">transfer</option>
                        </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-3 col-form-label">Jumlah yang diterima</label>
                    <div class="col-sm-9">
                      <input type="number" id="jml_pembayaran2" onkeyup="jm(this.value)" class="form-control" placeholder="Pembayaran">
                    </div>
                  </div>
                </div>
              </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Save</button>
          <button type="button" class="btn btn-default" data-dismiss="modal" id="close">Close</button>
        </div>
      </form>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script src="<?php echo base_url() ?>templateadmin/plugins/select2/js/select2.full.min.js"></script>
<script>
  $(function () {
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  })
  function panggil(a) {
    $.ajax({
        type:"POST",
        url:"<?=site_url('transaksi_penjualan/panggil');?>",    
        dataType : "JSON",
        data : {product_code:a},
        success: function(data){   
            document.getElementById('alamat').innerHTML = data.alamat;
            document.getElementById('no_telepon').innerHTML = data.no_telepon;
        }  
    });
  }
  function panggil2(a,b) {
    $.ajax({
        type:"POST",
        url:"<?=site_url('transaksi_pemesanan/panggil');?>",    
        dataType : "JSON",
        data : {product_code:a},
        success: function(data){   
            document.getElementById('set').value = data.set_barang;
            if (data.jenis_barang!="wallpaper") {
              document.getElementById('valueform').style.display = "";
              document.getElementById('valuelabel').innerHTML = data.value;
              document.getElementById('customCheckbox1').value = data.value;
              if (b) {document.getElementById("customCheckbox1").checked = true;}
            }else{
              document.getElementById('valueform').style.display = "none";
              document.getElementById('valuelabel').innerHTML = "";
              document.getElementById('customCheckbox1').value = "";
            }
        }  
    });
  }
  function panggil3(a,b) {
    $.ajax({
        type:"POST",
        url:"<?=site_url('transaksi_pemesanan/panggil2');?>", 
        data : {product_code:a},
        success: function(data){   
            document.getElementById('jenis_barang_pesanan_model').innerHTML = data;
            if (b) {document.getElementById('jenis_barang_pesanan_model').value = b;}
        }  
    });
  }
  var hitung = 1;
  var count = 0;
  function angka(a,b) {
    count = 0;
    $.ajax({
        type:"POST",
        url:"<?=site_url('transaksi_pemesanan/angka');?>", 
        dataType : "JSON",
        data : {value:a},
        success: function(data){   
          var x = document.getElementById("table2").rows.length;
          document.getElementById('produk1').value = data.names;
          document.getElementById('qty1').value = data.qty;
          document.getElementById('unit1').value = data.unit;
          document.getElementById('harga1').value = data.price;
          document.getElementById('id_barang_pesanan').value = data.id_barang_pesanan;
          panggil2(data.id_barang_pesanan,data.value);panggil3(data.id_barang_pesanan,data.jenis_barang_pesanan_model);
          document.getElementById('acak').value = a;
          document.getElementById('nama_kain0').value = (data.nama_kain[0]) ? data.nama_kain[0]:"";
          document.getElementById('bidang0').value = data.bidang[0];
          document.getElementById('ukuran0').value = data.ukuran[0];
          document.getElementById('pemakainn0').value = (data.pemakaian[0]) ? data.pemakaian[0]:"";
          document.getElementById('hrga0').value = data.hrga[0];
          if (data.nama_kain.length >x) {
            for (var i = 1; i < data.nama_kain.length; i++) {              
              edit(i,data.nama_kain[i],data.bidang[i],data.ukuran[i],data.pemakaian[i],data.hrga[i]);
            }
          }
          
          document.getElementById('id').value = b;
        }  
    });
  }
  function tambah() {
    let lastRow = table.rows[table.rows.length-1];
    let lastCell = lastRow.cells[lastRow.cells.length-4];
    var myarr = lastCell.innerHTML.split("mk");
    var myarrs = myarr[1].split("=");
    var hitung = (parseInt(myarrs[0])+1);
    var newRow=document.getElementById('table').insertRow();
    newRow.id = "tr"+hitung;
    $.ajax({
        type:"POST",
        url:"<?=site_url('transaksi_pemesanan/tabel');?>", 
        data : {a:hitung},  
        success: function(data){   
            newRow.innerHTML=data;
        }  
    });
  }
  function tambah2() {
    count += 1;
    var newRow=document.getElementById('table2').insertRow();
    newRow.id = "trt"+count;
    $.ajax({
        type:"POST",
        url:"<?=site_url('transaksi_pemesanan/tabel2');?>", 
        data : {a:count},  
        success: function(data){   
            newRow.innerHTML=data;
        }  
    });
  }
  function edit(i,nama_kain,bidang,ukuran,pemakainn,hrga) {
    var newRow=document.getElementById('table2').insertRow();
      newRow.id = "trt"+i;
      $.ajax({
          type:"POST",
          url:"<?=site_url('transaksi_pemesanan/tabel2');?>", 
          data : {a:i},  
          success: function(data){   
              newRow.innerHTML=data;            
              document.getElementById('nama_kain'+i).value = nama_kain;
              document.getElementById('bidang'+i).value = bidang;
              document.getElementById('ukuran'+i).value = ukuran;
              document.getElementById('pemakainn'+i).value = pemakainn;
              document.getElementById('hrga'+i).value = hrga;
          }  
      });
  }
  function plus(qty,b) {
        var harga_jual = document.getElementById('harga_jual'+b).value;
        document.getElementById('subtototal'+b).value = (harga_jual*qty);
        subttl();
  }
  function formatMoney(number) {
    return number.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });
  }
  function hapus(a) {
      var row = a.parentNode.parentNode;
    row.parentNode.removeChild(row);
  }
  function hapus2(a,b) {
    var row = a.parentNode.parentNode;
    row.parentNode.removeChild(row);
    $.ajax({
        type:"POST",
        url:"<?=site_url('transaksi_pemesanan/hapus_cart');?>", 
        data : {row_id:b},
        success: function(data){}  
    });
  }
  function save() {
    // alert($("#form1").serialize());
    var values = $("#form1").serializeArray();
    $.ajax({
        type:"POST",
        url:"<?=site_url('transaksi_pemesanan/save_str');?>", 
        dataType : "JSON",
        data : values,
        success: function(data){ 
            document.getElementById('nama_barang'+data.id).value = data.names;
            document.getElementById('qtys'+data.id).value = data.qty;
            document.getElementById('harga_jual'+data.id).value = data.price;
            document.getElementById('subtototal'+data.id).value = (data.qty*data.price);
            subttl();
        }  
    });
    document.getElementById('close').click();
  }
  function subttl() {
    var subttl = 0;
    for (var i = 1; i <= document.getElementById("table").rows.length; i++) {
      if (document.getElementById('subtototal'+i)) {
        subttl = (subttl+parseInt(document.getElementById('subtototal'+i).value));
      }
    }
    document.getElementById('subttl').value = subttl;
    document.getElementById('total').value = (subttl-parseInt(document.getElementById('jumlah_potongan').value));
  }
  function pot(a) {
    var e = document.getElementById("potongan");
    var subttl = document.getElementById('subttl').value;
    var potongan = e.options[e.selectedIndex].value;
    if (potongan=="Rp") {
        document.getElementById('total').value = (parseInt(subttl)-parseInt(a));
    } 
    else {
        document.getElementById('total').value = parseInt(subttl)-(parseInt(subttl)*parseInt(a)/100);
    }
  }
  function dp(a) {
    document.getElementById('jenis_pembayaran').value = a;
    if (a=="lunas") {
      document.getElementById('jml_pembayaran').value = document.getElementById('total').value;
      document.getElementById('jml_pembayaran2').value = document.getElementById('total').value;
    }
  }
  function md(a) {
    document.getElementById('metode_pembayaran').value = a;
  }
  function jm(a) {
    document.getElementById('jml_pembayaran').value = a;
  }
</script>