<?php
// Fungsi untuk melakukan operasi matematika
function kalkulator($input1, $input2, $operator) {
  switch ($operator) {
    case 'tambah':
      $hasil = $input1 + $input2;
      $proses = "$input1 + $input2";
      break;
    case 'kurang':
      $hasil = $input1 - $input2;
      $proses = "$input1 - $input2";
      break;
    case 'kali':
      $hasil = $input1 * $input2;
      $proses = "$input1 × $input2";
      break;
    case 'bagi':
      if ($input2 != 0) {
        $hasil = $input1 / $input2;
        $proses = "$input1 ÷ $input2";
      } else {
        $hasil = "Error: Pembagian dengan nol!";
        $proses = "";
      }
      break;
    default:
      $hasil = "Error: Operator tidak valid!";
      $proses = "";
  }
  return array($hasil, $proses);
}

// Fungsi untuk memeriksa apakah suatu angka adalah bilangan prima
function is_prime($n) {
  if ($n <= 1 || !is_int($n)) {
    return false;
  }
  for ($i = 2; $i <= sqrt($n); $i++) {
    if ($n % $i == 0) {
      return false;
    }
  }
  return true;
}

// Fungsi untuk menampilkan segitiga bintang
function print_triangle($n) {
  for ($i = 1; $i <= $n; $i++) {
    echo str_repeat('*', $i) . "<br>";
  }
}

// Proses input dari form
if (isset($_POST['input1']) && isset($_POST['input2']) && isset($_POST['operator'])) {
  $input1 = (int) $_POST['input1'];  // Pastikan input berupa integer
  $input2 = (int) $_POST['input2'];  // Pastikan input berupa integer
  $operator = $_POST['operator'];
  list($hasil, $proses) = kalkulator($input1, $input2, $operator);
}
?>

<!-- Form input -->
<form action="" method="post">
  <label for="input1">Input angka pertama:</label>
  <br>
  <input type="number" id="input1" name="input1" required>
  <br>
  <label for="input2">Input angka kedua:</label>
  <br>
  <input type="number" id="input2" name="input2" required>
  <br>
  <label for="operator">Operator:</label> 
  <select id="operator" name="operator" required>
    <option value="tambah">Tambah (+)</option>
    <option value="kurang">Kurang (-)</option>
    <option value="kali">Kali (×)</option>
    <option value="bagi">Bagi (÷)</option>
  </select>
  <br>
  <input type="submit" value="Hitung">
</form>

<?php
// Tampilkan hasil di bawah tombol hitung
if (isset($hasil) && isset($proses)) { ?>
  <h2>Hasil:</h2>
  <p><?= $proses ?> = <?= $hasil ?></p>
  <?php 
  if (is_int($hasil) && is_prime($hasil)) { ?>
    <h3>Bilangan Prima (Segitiga Bintang):</h3>
    <?php print_triangle($hasil); ?>
  <?php }
}
?>

<!-- ISSET =  -->