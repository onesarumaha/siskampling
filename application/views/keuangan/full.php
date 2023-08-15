
<title><?php echo $title; ?></title>
  <center><div>
    <h1><?php echo $title; ?></h1>
    <label><i></i></label>
    <label>Laporan Keuangan</label><br>
    <label><?php echo date('l, d M Y'); ?></label>
  </div></center>
  <hr>

<center>
  <script type="text/javascript">
  window.print();
</script>

<table border="1" cellspacing="0">
  <thead>
    <tr>
	       <th>No</th>
          <th style="width: 200px" class="text-center">No Transaksi</th>
          <th style="width: 200px" class="text-center">Tanggal</th>
          <th style="width: 200px" class="text-center">Jenis Transaksi</th>
          <th style="width: 200px" class="text-center">Kategori Transaksi</th>
          <th style="width: 170px" class="text-center">Nominal</th>
    </tr>
  </thead>

  <tbody>
    <?php 
    $no = 1;
    foreach($keuangan as $data) : ?>
    <tr>
      	<td style="text-align: center;"><?php echo $no++; ?></td>
            <td style="text-align: center;"><?= $data['no_transaksi']?></td>
            <td style="text-align: center;"><?= date("d M Y", strtotime( $data['tgl']))?></td>
            <td style="text-align: center;"><?= $data['jns_trans']?></td>
            <td style="text-align: center;"><?= $data['kategori_trans']?></td>
            <td style="text-align: center;">Rp. <?= number_format(@$tot = $data['nominal'])?></td>

    </tr>
    <?php 
    @$jumtot += $tot;
  endforeach; ?>

    <tr>
      <th colspan="5">Total Penjualan</th>
      <th style="text-align: center;">Rp. <?= @number_format($jumtot); ?></th>
    </tr>
    
      </tbody>

    </table>
  </center>


