<!doctype html>
<html class="no-js" lang="en">

<?php 
	include 'cek.php';
	include '../dbconnect.php';
	?>

<html>
<head>
<title>TOKO SURYA MAS 2</title>
<link rel="icon" 
      type="image/png" 
      href="favicon.png">
	   <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-144808195-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-144808195-1');
	</script>

<style>
    /* CSS untuk menempatkan watermark di posisi yang diinginkan */
    #watermark {
      position: fixed;
      top: 45%;
      width: 100%;
      text-align: center;
      opacity: 0.1;
      transform: rotate(30deg);
    }
</style>

</head>

<body>
		<div class="container">
			<center>
			<h3>Toko Kirana</h3>
			</center>
			<h2>Transaksi Bahan : Masuk / Kembali</h2>
			<div id="hidden-div">
				<button id="print-button" onclick="window.print()">Cetak Halaman</button>
			</div>
				<div class="data-tables datatable-dark">
					<table id="dataTable3" class="display" style="width:100%"><thead class="thead-dark">
											<tr>
												<th>No</th>
												<th>Tanggal</th>
												<th>Nama Barang</th>
												<th>Jenis</th>
												<th>Merk</th>
												<th>Ukuran</th>
												<th>Jumlah</th>
												<th>Satuan</th>
												<th>Keterangan</th>
												
												<!--<th>Opsi</th>-->
											</tr></thead><tbody>
											<?php 
											$brg=mysqli_query($conn,"SELECT * from sbrg_masuk sb, sstock_brg st where sb.idx=st.idx order by sb.id ASC");
											$no=1;
											while($b=mysqli_fetch_array($brg)){

												?>
												
												<tr>
													<td><?php echo $no++ ?></td>
													<td><?php $tanggals=$b['tgl']; echo date("d-M-Y", strtotime($tanggals)) ?></td>
													<td><?php echo $b['nama'] ?></td>
													<td><?php echo $b['jenis'] ?></td>
													<td><?php echo $b['merk'] ?></td>
													<td><?php echo $b['ukuran'] ?></td>
													<td><?php echo $b['jumlah'] ?></td>
													<td><?php echo $b['satuan'] ?></td>
													<td><?php echo $b['keterangan'] ?></td>
												</tr>		
												<?php 
											}
											?>
										</tbody>
										</table>
								</div>
						</div>
	
<script>
// Fungsi untuk menyembunyikan elemen div
function hideDiv() {
      var hiddenDiv = document.getElementById('hidden-div');
      hiddenDiv.style.display = 'none';
    }

    function addWatermark() {
      // Sembunyikan elemen div
      hideDiv();
      // Buat elemen div baru
      var watermarkDiv = document.createElement('h1');
      // Tambahkan teks atau gambar watermark ke dalam elemen div
      watermarkDiv.innerHTML = 'TOKO SURYA MAS 2';
      // Tambahkan elemen div ke dalam dokumen
      document.body.appendChild(watermarkDiv);

      // Gunakan CSS untuk menempatkan watermark di posisi yang diinginkan
      watermarkDiv.style.position = 'fixed';
      watermarkDiv.style.top = '45%';
      watermarkDiv.style.width = '100%';
      watermarkDiv.style.fontSize = '100px';
      // watermarkDiv.style.height = '100%';
      watermarkDiv.style.textAlign = 'center';
      watermarkDiv.style.opacity = '0.1';
      watermarkDiv.style.transform = 'rotate(30deg)';
	  window.print();
    }

    // Tambahkan event listener untuk menangani proses cetak
	var printButton = document.getElementById('print-button');
    window.addEventListener('beforeprint', addWatermark);

$(document).ready(function() {
    var Table = $('#dataTable3').DataTable( {
        // dom: 'Bfrtip',
        // buttons: [
        //    'copy', 'print',
		//    {
		//   extend: "pdfHtml5",
		//   messageTop: 'Data Barang Masuk'
		// 	},
		// 	{
		//   extend: "excelHtml5",
		//   messageTop: 'Data Barang Masuk'
		// 	},
		// 	{
		//   extend: "csvHtml5",
		//   messageTop: 'Data Barang Masuk'
		// 	}
        // ]
    } );
} );

</script>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>

	

</body>

</html>