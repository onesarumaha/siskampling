const pesanData = $('.notif-datapetugas').data('notifdatapetugas');

if(pesanData) {
	Swal.fire({
	  title: 'Data Petugas !',
	  text: 'Berhasil '  +  pesanData,
	  icon: 'success',
	  confirmButtonText: 'OK'
	});



}

$('.hapus-petugas').on('click', function(e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
	  title: 'Yakin ?',
	  text: "Hapus Petugas",
	  icon: 'question',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Hapus'
	}).then((result) => {
	  if (result.value) {
	    document.location.href = href;
	  }
	})

});

const pesanDataWarga = $('.notif-datawarga').data('notifdatawarga');

if(pesanDataWarga) {
	Swal.fire({
	  title: 'Data Warga !',
	  text: 'Berhasil '  +  pesanDataWarga,
	  icon: 'success',
	  confirmButtonText: 'OK'
	});

}

$('.hapus-warga').on('click', function(e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
	  title: 'Yakin ?',
	  text: "Hapus Warga",
	  icon: 'question',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Hapus'
	}).then((result) => {
	  if (result.value) {
	    document.location.href = href;
	  }
	})

});

const pesanDataJadwal = $('.notif-datajadwal').data('notifdatajadwal');

if(pesanDataJadwal) {
	Swal.fire({
	  title: 'Jadwal Petugas !',
	  text: 'Berhasil '  +  pesanDataJadwal,
	  icon: 'success',
	  confirmButtonText: 'OK'
	});

}

$('.hapus-jadwal').on('click', function(e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
	  title: 'Data Jadwal ?',
	  text: "Hapus Jadwal Patroli",
	  icon: 'question',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Hapus'
	}).then((result) => {
	  if (result.value) {
	    document.location.href = href;
	  }
	})

});


const pesanDataIuran = $('.notif-dataiuran').data('notifdataiuran');

if(pesanDataIuran) {
	Swal.fire({
	  title: 'Data Iuran !',
	  text: 'Berhasil '  +  pesanDataIuran,
	  icon: 'success',
	  confirmButtonText: 'OK'
	});

}

$('.hapus-iuran').on('click', function(e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
	  title: 'Data Iuran ?',
	  text: "Hapus Iuran",
	  icon: 'question',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Hapus'
	}).then((result) => {
	  if (result.value) {
	    document.location.href = href;
	  }
	})

});

const pesanDataMasuk = $('.notif-datamasuk').data('notifdatamasuk');

if(pesanDataMasuk) {
	Swal.fire({
	  title: 'Pemasukan !',
	  text: 'Berhasil '  +  pesanDataMasuk,
	  icon: 'success',
	  confirmButtonText: 'OK'
	});

}

$('.hapus-masuk').on('click', function(e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
	  title: 'Pemasukan ?',
	  text: "Hapus ",
	  icon: 'question',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Hapus'
	}).then((result) => {
	  if (result.value) {
	    document.location.href = href;
	  }
	})

});