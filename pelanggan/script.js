//ambil elemen dlu

var keyword = document.getElementById('keyword');
var tombolCari = document.getElementById('tombolcari');
var container = document.getElementById('kontainer');

//butuh trigger / acian
keyword.addEventListener('keyup', function () {

  //objek ajax
  var xhr = new XMLHttpRequest();

  //cek apakah siap digunakan apa nggak ??
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      container.innerHTML = xhr.responseText;
    }
  }

  // kill (eksekusi) ajax

  xhr.open('GET', 'memohonpelanggan.php?keyword=' + keyword.value, true);
  xhr.send();

});