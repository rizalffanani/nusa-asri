<h2 style="margin-top:0px">Pasien Read</h2>
    <table class="table">
	    <tr><td>Nama Lengkap</td><td><?php echo $nama_lengkap; ?></td></tr>
	    <tr><td>Tgl Lahir</td><td><?php $date=date_create($tgl_lahir);echo date_format($date,"d-m-Y");?></td></tr>
	    <tr><td>Jenis Kelamin</td><td><?php echo $jenis_kelamin; ?></td></tr>
	    <tr><td>Nomerid</td><td><?php echo $nomerid; ?></td></tr>
      <tr>
        <td></td>
        <td>
          <?=@$val?><br>
          <form action="<?php echo $action; ?>" method="post"  enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleInputFile">File</label>
            <input type="file" name="foto" id="exampleInputFile" required>
            <p class="help-block">format txt.</p>
          </div>
          <input type="hidden" name="id" value="<?php echo $id_pasien; ?>" />
          <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        </form>
        </td>
      </tr>
	    <tr>
	    	<td colspan="2">
	    		<div id="chartContainer" style="height: 400px; width: 100%;"></div>
	    	</td>
	    </tr>
	    <tr><td>Analisis</td><td><?php echo $analisis; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('pasien') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
	<script type="text/javascript">//<![CDATA[
      var xAxisStripLinesArray = [];
      var yAxisStripLinesArray = [];
      var dps = [];
      var dataPointsArray = [<?php foreach ($value as $key) {
      	echo($key.",");
      }?>];

      var chart = new CanvasJS.Chart("chartContainer",{
      	title:{
        	text:"ECG Report",
        },
        subtitles:[
          {
            text: "Patient Name: <?php echo $nama_lengkap; ?>",
            horizontalAlign: "left",
          },
          {
            text: "Age: X-Years",
            horizontalAlign: "left",
          },
          // {
          //   text: "Doctor Sign",
          //   horizontalAlign: "right",
          //   verticalAlign: "bottom",
          // },
      	],
        axisY:{
        	stripLines:yAxisStripLinesArray,
          gridThickness: 2,
          gridColor:"#DC74A5",
          lineColor:"#DC74A5",
          tickColor:"#DC74A5",
          labelFontColor:"#DC74A5",        
        },
        axisX:{
        	stripLines:xAxisStripLinesArray,
          gridThickness: 2,
          gridColor:"#DC74A5",
          lineColor:"#DC74A5",
          tickColor:"#DC74A5",
          labelFontColor:"#DC74A5",
        },
        data: [{
          type: "spline",
          color:"black",
          dataPoints: dps
        }]
      });
        
      addDataPointsAndStripLines();
      chart.render();
        
      function addDataPointsAndStripLines(){
      		//dataPoints
          for(var i=0; i<dataPointsArray.length;i++){
              dps.push({y: dataPointsArray[i]});
          }
          //StripLines
          for(var i=0;i<30000;i=i+100){
            if(i%1000 != 0)
                yAxisStripLinesArray.push({value:i,thickness:0.7, color:"#DC74A5"});  
          }
          for(var i=0;i<14000;i=i+20){
            if(i%200 != 0)
                xAxisStripLinesArray.push({value:i,thickness:0.7, color:"#DC74A5"});  
          }
      }
    </script>
    <script>
      // tell the embed parent frame the height of the content
      if (window.parent && window.parent.parent){
        window.parent.parent.postMessage(["resultsFrame", {
          height: document.body.getBoundingClientRect().height,
          slug: ""
        }], "*")
      }

      // always overwrite window.name, in case users try to set it manually
      window.name = "result"
    </script>