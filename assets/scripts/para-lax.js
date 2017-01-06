
// maka buat perintah berupa gulirParalaks
function gulirParalaks () {
  // definisi dahulu mana yang akan dibuat paralaks
  var latar_Belakang = document.getElementsByClassName("collapsing_header");
  // Atur kecepatan paralaksnya, dalam hal ini nilainya seperempat.
  // Karena posisinya yang mengikuti gulir/fixed (lihat style),
  // maka perlu diberi minus pada perintah windownya
  // agar gerakannya menjadi ke atas.
  // (Tidak relatif bertambah pada posisi Y halamannya)
  latar_Belakang.style.top = -(window.pageYOffset / 4) + "px";
}
// tambahkan perintah untuk jendela browser
// agar dapat bekerja ketika di-scroll
window.addEventListener ("scroll", gulirParalaks, false);






