<form action="<?php echo $action; ?>" class="row" method="post">
    <div class="col-md-4">  
        <div class="card">
          <div class="card-body"> 
                <div class="form-group">
                    <label for="int">Pelanggan <?php echo form_error('id_pelanggan') ?></label>
                    <?php echo cmb_dinamis('id_pelanggan', 'pelanggan', 'nama_pelanggan', 'id_pelanggan', $id_pelanggan,'select2bs4','panggil(this.value)') ?>
                </div>
                <div class="form-group">
                    <label><i class="fa fa-home" aria-hidden="true"></i> <span id="alamat"></span></label>
                </div>
                <div class="form-group">
                    <label><i class="fa fa-phone" aria-hidden="true"></i> <span id="no_telepon"></span></label>
                </div>
                <div class="form-group">
                    <label for="datetime">Tanggal Transaksi <?php echo form_error('tanggal_transaksi') ?></label>
                    <input type="date" class="form-control" name="tanggal_transaksi" id="tanggal_transaksi" placeholder="Tanggal Transaksi" value="<?php echo $tanggal_transaksi; ?>" />
                </div>
                <div class="form-group">
                    <label for="datetime">No Order <?php echo form_error('id_transaksi') ?></label>
                    <input type="number" class="form-control" name="id_transaksi" id="id_transaksi" placeholder="No Order " value="<?php echo $id_transaksi; ?>" readonly/>
                </div>
          </div>
        </div>  
    </div>
    <div class="col-md-8">
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
                <tr id="tr1">
                    <td>
                        <?php echo cmb_dinamis('id_barang[]', 'barang', 'nama_barang', 'id_barang', $id_barang,'select2','panggil2(this.value,1)') ?>
                    </td>
                    <td>
                        <input type="number" class="form-control" name="qty[]" id="qty1" placeholder="Qty" value="0" min="0" onchange="plus(this.value,1)" />
                    </td>
                    <td>
                        <span id="harga1">0</span>
                        <input type="hidden" name="harga_jual[]" id="harga_jual1">
                    </td>
                    <td>
                        <span id="sub1">0</span>
                        <input type="hidden" name="subtototal[]" id="subtototal1">
                    </td>
                    <td></td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
          <div class="card-footer clearfix">
           <a onclick="tambah()" class="btn btn-success">Tambah Baris</a>
          </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-8">
                <!-- USERS LIST -->
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
                          <input type="number" name="jumlah_potongan" id="jumlah_potongan" value="0" onchange="pot(this.value)" class="form-control" placeholder="Potongan" >
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
                        <div class="col-sm-3">
                            <select class="form-control" name="jenis_pembayaran" id="jenis_pembayaran" onchange="dp(this.value)">
                                <option value="dp">dp</option>
                                <option value="lunas">lunas</option>
                            </select>
                        </div>
                        <div class="col-sm-5" id="pmb">
                          <input type="number" name="jml_pembayaran" id="jml_pembayaran" value="<?php echo $jml_pembayaran; ?>" class="form-control" placeholder="Pembayaran">
                        </div>
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <input type="hidden" name="id_transaksi" value="<?php echo $id_transaksi; ?>" /> 
                        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                      <a href="<?php echo site_url('transaksi_penjualan') ?>" class="btn btn-default float-right">Cancel</a>
                    </div>
                    <!-- /.card-footer -->
                  </div>
                </div>
                <!--/.card -->
            </div>
        </div>
    </div>
</form>
<script src="<?php echo base_url() ?>templateadmin/plugins/select2/js/select2.full.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?php echo base_url() ?>templateadmin/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
  $(function () {
    bsCustomFileInput.init();
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

  })
  var count = 1;
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
    var qty = document.getElementById('qty'+b).value;
    $.ajax({
        type:"POST",
        url:"<?=site_url('transaksi_penjualan/panggil2');?>",    
        dataType : "JSON",
        data : {product_code:a},
        success: function(data){   
            document.getElementById('harga'+b).innerHTML = formatMoney(data.harga_jual*1);
            document.getElementById('harga_jual'+b).value = data.harga_jual;
            document.getElementById('sub'+b).innerHTML = formatMoney(data.harga_jual*qty);
            document.getElementById('subtototal'+b).value = (data.harga_jual*qty);
            subttl();
        }  
    });
  }
  function plus(qty,b) {
        var harga_jual = document.getElementById('harga_jual'+b).value;
        document.getElementById('sub'+b).innerHTML = formatMoney(harga_jual*qty);
        document.getElementById('subtototal'+b).value = (harga_jual*qty);
        subttl();
  }
  function formatMoney(number) {
    return number.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });
  }
  function tambah() {
    count += 1;
    var newRow=document.getElementById('table').insertRow();
    newRow.id = "tr"+count;
    $.ajax({
        type:"POST",
        url:"<?=site_url('transaksi_penjualan/tabel');?>", 
        data : {a:count},  
        success: function(data){   
            newRow.innerHTML=data;
        }  
    });
  }
  function hapus(a) {
      var row = a.parentNode.parentNode;
    row.parentNode.removeChild(row);
  }
  function subttl() {
    var subttl = 0;
    for (var i = 1; i <= count; i++) {
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
      if (a=="lunas") {
        document.getElementById('pmb').style.display = "none";
        document.getElementById('jml_pembayaran').value = document.getElementById('total').value;
      }else{
        document.getElementById('pmb').style.display = "";
      }
  }
</script>