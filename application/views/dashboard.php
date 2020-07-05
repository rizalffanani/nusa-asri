<?php if($this->session->userdata("lvl")=="Admin" or $this->session->userdata("lvl")=="pemilik"){ ?>
<section class='content'>
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-blue">
            <div class="inner">
              <h3><?= $ttlpemesanan?></h3>
              <p>Pemesanan Hari ini</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>        
        <div class="col-lg-3 col-xs-6">          
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?= $ttlpenjualan?></h3>
              <p>Penjualan Hari ini</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-stalker"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>        
        <div class="col-lg-3 col-xs-6">          
          <div class="small-box bg-green">
            <div class="inner">
              <h3>Rp.<?= rupiah($pemasukkan)?></h3>

              <p>Pemasukkan Bulan ini</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-share"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>        
        <div class="col-lg-3 col-xs-6">          
          <div class="small-box bg-red">
            <div class="inner">
              <h3>Rp.<?= rupiah($pengeluaran)?></h3>

              <p>Pengeluaran Bulan ini</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>
      </div>
</section>
<div class="card">
        <div class="card-header">
            <h3 class="card-title">Stok Kosong</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>                    
                    <th>Nama Barang</th>
                    <th>Jenis Barang</th>
                    <th>Kategori</th>
                    <th>Ukuran</th>
                    <th>Varian</th>
                    <th>Stok</th>
                </tr>
            </thead>
        </table>

        </div>
</div>
<div class="card card-success">
<div class="card-header">
<h3 class="card-title">Grafik Laba Rugi</h3>
</div>
<div class="card-body">
<div class="chart">
  <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
</div>
</div>
<!-- /.card-body -->
</div>
<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
<script src="<?php echo base_url('templateadmin/plugins/chartjs/Chart.min.js') ?>"></script>
<script type="text/javascript">
    $(function () {
      var areaChartData = {
        labels  : ['Grafik Bulanan Laba Rugi'],
        datasets: [
          {
            label               : 'Pengeluaran',
            backgroundColor     : 'rgba(210, 214, 222, 1)',
            borderColor         : 'rgba(210, 214, 222, 1)',
            pointRadius         : false,
            pointColor          : 'rgba(210, 214, 222, 1)',
            pointStrokeColor    : '#c1c7d1',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data                : [<?= ($pengeluaran)?>]
          },
          {
            label               : 'Pendapatan',
            backgroundColor     : 'rgba(60,141,188,0.9)',
            borderColor         : 'rgba(60,141,188,0.8)',
            pointRadius          : false,
            pointColor          : '#3b8bba',
            pointStrokeColor    : 'rgba(60,141,188,1)',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data                : [<?= ($pemasukkan)?>]
          },
          {
            label               : 'Keuntungan',
            backgroundColor     : 'rgba(220, 53, 69, 1)',
            borderColor         : 'rgba(220, 53, 69, 1)',
            pointRadius         : false,
            pointColor          : 'rgba(220, 53, 69, 1)',
            pointStrokeColor    : '#c1c7d1',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data                : [<?= ($pemasukkan-$pengeluaran)?>]
          },
        ]
      }
      var barChartCanvas = $('#barChart').get(0).getContext('2d')
          var barChartData = jQuery.extend(true, {}, areaChartData)
          var temp0 = areaChartData.datasets[0]
          var temp1 = areaChartData.datasets[1]
          barChartData.datasets[0] = temp1
          barChartData.datasets[1] = temp0

          var barChartOptions = {
            responsive              : true,
            maintainAspectRatio     : false,
            datasetFill             : false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
          }

          var barChart = new Chart(barChartCanvas, {
            type: 'bar', 
            data: barChartData,
            options: barChartOptions
          })
    })
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
            ajax: {"url": "barang/json0", "type": "POST"},
            columns: [
                {
                    "data": "id_barang",
                    "orderable": false
                },{"data": "nama_barang"},{"data": "jenis_barang"},{"data": "kategori"},{"data": "ukuran"},{"data": "varian"},
                {
                    "data": null,
                    "render": function(data, type, full, meta){
                        return full["stok"]+ " " +full["unit"];
                    }
                },
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
</script>
<?php }?>