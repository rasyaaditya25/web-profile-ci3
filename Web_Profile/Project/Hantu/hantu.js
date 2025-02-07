// Mendapatkan elemen audio dengan id "background-music" dan mengatur volumenya
const backgroundMusic = document.getElementById("background-music");
backgroundMusic.volume = 0.5;

// Fungsi untuk memutar musik
function playMusic() {
  backgroundMusic.play();
}

// Memutar musik ketika dokumen diklik
document.addEventListener("click", playMusic);

// Fungsi untuk menambahkan hantu secara acak di halaman
function setHantu() {
  let randomS = Math.random() * 150 + 120; // Nilai acak untuk margin-left
  let randomA = Math.random() * 300; // Nilai acak untuk margin-top

  // Membuat elemen hantu dengan posisi acak
  let ghost =
    '<div class="hantu" style="margin-left:-' +
    randomS +
    "px; margin-top:" +
    randomA +
    'px;"></div>';

  let container = document.getElementById("container");
  container.innerHTML += ghost; // Menambahkan elemen hantu ke container

  const clickSound = document.getElementById("click-sound");
  let hantu = document.getElementsByClassName("hantu");

  for (let i = 0; i < hantu.length; i++) {
    gerak(hantu[i], Math.random() * 10); // Menggerakkan hantu dengan kecepatan acak

    // Menambahkan event listener untuk setiap hantu
    hantu[i].addEventListener("click", function () {
      this.setAttribute("class", "boom"); // Mengubah class menjadi "boom" ketika diklik

      document.getElementById("score").innerHTML =
        parseInt(document.getElementById("score").innerHTML) + 1; // Menambahkan skor

      clickSound.currentTime = 0;
      clickSound.play(); // Memainkan suara klik

      let self = this;
      setTimeout(function () {
        self.remove(); // Menghapus elemen hantu setelah 200 ms
        setHantu(); // Menambahkan hantu baru
      }, 200);
    });
  }
}

// Fungsi untuk menggerakkan elemen dengan kecepatan tertentu
function gerak(elemen, speed) {
  elemen.style.marginLeft =
    parseInt(elemen.style.marginLeft.replace("px", "")) + 1 + "px"; // Menggerakkan elemen ke kanan

  setTimeout(function () {
    gerak(elemen, speed); // Mengulang fungsi gerak
  }, speed);
}

// Fungsi timer untuk menghitung mundur waktu
function timer() {
  let waktu = parseInt(document.getElementById("time").innerHTML);
  if (waktu > 0) {
    setTimeout(function () {
      document.getElementById("time").innerHTML = waktu - 1; // Mengurangi waktu
      timer(); // Mengulang timer
    }, 1000);
  } else {
    document.getElementById("game-over").style.display = "block"; // Tampilkan layar game over
    document.getElementById("over-user").innerHTML =
      document.getElementById("user").innerHTML; // Tampilkan nama pengguna
    document.getElementById("over-score").innerHTML =
      document.getElementById("score").innerHTML; // Tampilkan skor
    document.getElementById("container").innerHTML = ""; // Kosongkan container
  }
}

// Event listener untuk tombol "mulai" untuk memulai permainan
document.getElementById("mulai").addEventListener("click", function () {
  let username = document.getElementById("username").value;
  let level = document.getElementById("level").value;
  let time = document.getElementById("time");

  if (username === "") {
    alert("Username harus diisi"); // Peringatan jika username kosong
  } else {
    document.getElementById("welcome").style.display = "none"; // Sembunyikan tampilan selamat datang
    document.getElementById("out-score").style.display = "block"; // Tampilkan skor
    document.getElementById("container").style.display = "block"; // Tampilkan container
    document.getElementById("user").innerHTML = username; // Tampilkan nama pengguna

    if (level === "Easy") {
      for (let i = 0; i <= 5; i++) {
        setHantu(); // Tambahkan 6 hantu untuk level mudah
      }
      time.innerHTML = "20"; // Setel waktu ke 20 detik
      timer(); // Mulai timer
    } else if (level === "Medium") {
      for (let i = 0; i <= 15; i++) {
        setHantu(); // Tambahkan 16 hantu untuk level menengah
      }
      time.innerHTML = "15"; // Setel waktu ke 15 detik
      timer(); // Mulai timer
    } else if (level === "Hard") {
      for (let i = 0; i <= 25; i++) {
        setHantu(); // Tambahkan 26 hantu untuk level sulit
      }
      time.innerHTML = "10"; // Setel waktu ke 10 detik
      timer(); // Mulai timer
    }
  }
});

let sudahKlik = false;

// Event listener untuk tombol "simpan" untuk menyimpan skor
document.getElementById("simpan").addEventListener("click", function () {
  if (!sudahKlik) {
    let username = document.getElementById("over-user").innerHTML;
    let score = document.getElementById("over-score").innerHTML;
    let dataLama = localStorage.getItem("score");

    if (dataLama) {
      dataLama = JSON.parse(dataLama); // Parse data lama dari localStorage
    }

    let dataBaru = [];
    let i = 0;
    if (dataLama) {
      for (i = 0; i < dataLama.length; i++) {
        dataBaru[i] = dataLama[i]; // Salin data lama ke data baru
      }
    }
    dataBaru[i] = {
      username: username,
      score: score,
    };

    localStorage.setItem("score", JSON.stringify(dataBaru)); // Simpan data baru ke localStorage
    alert("Data sudah disimpan");
  } else {
    alert("Data sudah disimpan sebelumnya"); // Peringatan jika data sudah disimpan
  }
  sudahKlik = true;
});

// Menampilkan leaderboard dari localStorage
let leader = JSON.parse(localStorage.getItem("score"));
let leaderboard = document.getElementById("leaderboard");
if (leader) {
  leader.sort((a, b) => b.score - a.score); // Urutkan leaderboard berdasarkan skor tertinggi
  for (let i = 0; i < leader.length; i++) {
    leaderboard.innerHTML += `<li><span class="username">${leader[i].username}</span><span class="score">${leader[i].score}</span></li>`;
  }
}

// Event listener untuk tombol "hapus-leaderboard" untuk menghapus leaderboard
document
  .getElementById("hapus-leaderboard")
  .addEventListener("click", function () {
    localStorage.removeItem("score"); // Hapus leaderboard dari localStorage
    document.getElementById("leaderboard").innerHTML = ""; // Kosongkan tampilan leaderboard
    alert("Leaderboard telah dihapus");
  });