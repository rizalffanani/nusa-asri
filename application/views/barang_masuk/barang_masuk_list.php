    <style>
        #myImg {
          border-radius: 5px;
          cursor: pointer;
          transition: 0.3s;
        }

        #myImg:hover {opacity: 0.7;}

        /* The Modal (background) */
        .modal {
          display: none; /* Hidden by default */
          position: fixed; /* Stay in place */
          z-index: 1; /* Sit on top */
          padding-top: 100px; /* Location of the box */
          left: 0;
          top: 0;
          width: 100%; /* Full width */
          height: 100%; /* Full height */
          overflow: auto; /* Enable scroll if needed */
          background-color: rgb(0,0,0); /* Fallback color */
          background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
        }

        /* Modal Content (image) */
        .modal-content {
          margin: auto;
          display: block;
          width: 80%;
          max-width: 700px;
        }

        /* Caption of Modal Image */
        #caption {
          margin: auto;
          display: block;
          width: 80%;
          max-width: 700px;
          text-align: center;
          color: #ccc;
          padding: 10px 0;
          height: 150px;
        }

        /* Add Animation */
        .modal-content, #caption {  
          -webkit-animation-name: zoom;
          -webkit-animation-duration: 0.6s;
          animation-name: zoom;
          animation-duration: 0.6s;
        }

        @-webkit-keyframes zoom {
          from {-webkit-transform:scale(0)} 
          to {-webkit-transform:scale(1)}
        }

        @keyframes zoom {
          from {transform:scale(0)} 
          to {transform:scale(1)}
        }

        /* The Close Button */
        .close {
          position: absolute;
          right: 35px;
          color: #f1f1f1;
          font-size: 40px;
          font-weight: bold;
          transition: 0.3s;
        }

        .close:hover,
        .close:focus {
          color: #bbb;
          text-decoration: none;
          cursor: pointer;
        }

        /* 100% Image Width on Smaller Screens */
        @media only screen and (max-width: 700px){
          .modal-content {
            width: 100%;
          }
        }
    </style>
    <div class="row" style="margin-bottom: 10px">
        <div class="col-md-4">
            <?php echo anchor(site_url('barang_masuk/create'), 'Tambah Barang', 'class="btn btn-primary"'); ?>
        </div>
        <div class="col-md-4 text-center">
            <div style="margin-top: 4px"  id="message">
                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
            </div>
        </div>
        <div class="col-md-4 text-right"></div>
    </div>
    <table class="table table-bordered table-striped" id="mytable">
        <thead>
            <tr>
                <th width="80px">No</th>
	    <th>Tanggal</th>
	    <th>SKU</th>
        <th>Jenis Barang</th>
        <th>Nama Barang</th>
	    <th>Penerima</th>
	    <th>Pemasok</th>
	    <th>Tandaterima</th>
	    <th>Jumlah</th>
	    <th>Harga Beli</th>
	    <!-- <th width="200px">Action</th> -->
            </tr>
        </thead>
    </table>
    <div id="myModal" class="modal" >
      <span class="close" onclick="cle()">&times;</span>
      <img class="modal-content" id="img01"  onclick="cle()">
    </div>
    <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
            {
                return {
                    "iStart": oSettings._iDisplayStart,
                    "iEnd": oSettings.fnDisplayEnd(),
                    "iLength": oSettings._iDisplayLength,
                    "iTotal": oSettings.fnRecordsTotal(),
                    "iFilteredTotal": oSettings.fnRecordsDisplay(),
                    "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                    "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                };
            };

            var t = $("#mytable").dataTable({
                initComplete: function() {
                    var api = this.api();
                    $('#mytable_filter input')
                            .off('.DT')
                            .on('keyup.DT', function(e) {
                                if (e.keyCode == 13) {
                                    api.search(this.value).draw();
                        }
                    });
                },
                oLanguage: {
                    sProcessing: "loading..."
                },
                processing: true,
                serverSide: true,
                ajax: {"url": "barang_masuk/json", "type": "POST"},
                columns: [
                    {
                        "data": "idbrgmasuk",
                        "orderable": false
                    },{"data": "tanggal"},{"data": "sku"},{"data": "nama_barang"},{"data": "jenis_barang"},{"data": "penerima"},{"data": "pemasok"},
                    {
                        "data": "ttd",
                        "orderable": false,
                        "className" : "text-center"
                    },
                    {
                        "data": null,
                        "render": function(data, type, full, meta){
                          return full["jumlah"] + " " + full["unit"];
                       }
                    },
                    {"data": "harga_beli",render: $.fn.dataTable.render.number( '.', ',', 2, 'Rp.' )}
                ],
                order: [[0, 'desc']],
                rowCallback: function(row, data, iDisplayIndex) {
                    var info = this.fnPagingInfo();
                    var page = info.iPage;
                    var length = info.iLength;
                    var index = page * length + (iDisplayIndex + 1);
                    $('td:eq(0)', row).html(index);
                }
            });
        });
        function myImg(a) {
            var modal = document.getElementById("myModal");
            var img = document.getElementById(a);
            var modalImg = document.getElementById("img01");
            modal.style.display = "block";
            modalImg.src = img.src;
        }
        function cle() {
            var modal = document.getElementById("myModal");
            modal.style.display = "none";
        }
        var span = document.getElementsByClassName("close")[0];
        span.onclick = function() { 
            var modal = document.getElementById("myModal");
            modal.style.display = "none";
        }
    </script>