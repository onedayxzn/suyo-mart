function myFunction() {
   var jumlah = parseFloat(document.pesan.jumlah.value);
   var harga = parseFloat(document.pesan.harga.value);
   var hasil = jumlah*harga;
   document.pesan.jumlah_bayar.value=hasil;
  }