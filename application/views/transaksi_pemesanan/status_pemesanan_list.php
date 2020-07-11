
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/datatables/dataTables.bootstrap.css"><div class="row">
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
                    <th>Total</th>
            		    <th>Jenis Pembayaran</th>
            		    <th>Terbayaran</th>
                    <th>Sisa Pembayaran</th>
                    <th width="200px">Status</th>
            		    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            // $(document).ready(function() {
            //     $('#mytable').DataTable();
            // } );
            /* Formatting function for row details - modify as you need */
            function format ( d ) {
              // alert(d.log);
                // `d` is the original data object for the row
                var hs = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
                    '<h3>Riwayat</h3>'+
                    '<tr>'+
                        '<td>Dibuat Oleh:</td>'+
                        '<td>('+d.id_user+')-('+d.tanggal_transaksi+')</td>'+
                    '</tr>';
                    for (var i = 0; i < d.log.length; i++) {
                      hs += '<tr>'+
                          '<td>['+d.log[i].date+','+d.log[i].time+']</td>'+
                          '<td>'+d.log[i].idser+': Pesanan '+d.log[i].status+'</td>'+
                      '</tr>';
                    }                    
                    hs += '</table>'
                return hs;
            }
             
            $(document).ready(function() {
                var table = $('#mytable').DataTable( {
                    "ajax": "<?php echo base_url() ?>status_pemesanan/json",
                    "columns": [
                        {
                            "className":      'details-control',
                            "orderable":      false,
                            "data":           null,
                            "defaultContent": ''
                        },
                        { "data": "tanggal_transaksi" },
                        { "data": "id_transaksi_pemesanan" },
                        { "data": "nama_pelanggan" },
                        { "data": "tanggal_selesai" },
                        { "data": "total" },
                        { "data": "metode_pembayaran" },
                        { "data": "jml_pembayaran" },
                        { "data": "kembali" },
                        { "data": "status" },
                        { "data": "action" },
                    ],
                    "order": [[1, 'asc']]
                } );
                 
                // Add event listener for opening and closing details
                $('#mytable tbody').on('click', 'td.details-control', function () {
                    var tr = $(this).closest('tr');
                    var row = table.row( tr );
             
                    if ( row.child.isShown() ) {
                        // This row is already open - close it
                        row.child.hide();
                        tr.removeClass('shown');
                    }
                    else {
                        // Open this row
                        row.child( format(row.data()) ).show();
                        tr.addClass('shown');
                    }
                } );
            } );
            function reload(a,b) {
              window.location = "<?php echo base_url() ?>status_pemesanan/update_action/"+a+'/'+b;
            }
        </script>
