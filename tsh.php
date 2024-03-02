<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function clearResult(){
            document.getElementById("bil1"). value= "";
            document.getElementById("bil2"). value= "";
            document.getElementById("operasi"). value= "";
            document.getElementById("result"). value= "";
        }
    </script>
</head>
<body>
    <?php
    $bil1 = isset($_POST['bil1']) ? $_POST['bil1'] : ''; 
    $bil2 = isset($_POST['bil2']) ? $_POST['bil2'] : ''; 
    $operasi = isset($_POST['operasi']) ? $_POST['operasi'] : ''; 
    $hasil =''; 

    if (isset($_POST['hitung'])) {
        $bil1 = $_POST['bil1'];
        $bil2 = $_POST['bil2'];
        $operasi = $_POST['operasi'];
        switch ($operasi) {
            case 'tambah' :
                $hasil= $bil1 + $bil2 ;
                break;
            case 'kurang' :
                $hasil= $bil1 - $bil2 ;
                break;
            case 'kali' :
                $hasil= $bil1 * $bil2 ;
                break;
            case 'bagi' :
                $hasil= $bil1 / $bil2 ;
                break;
        }
    }
    ?>

    <div class="kalkulator">
    <h2 class="judul">Kalkulator Digital</h2>
    <form action="tsh.php" method="post">
        <input type="text" name="bil1" id="bil1" class="bil" placeholder="Bilangan Pertama" value="<?php echo $bil1;?>">
        <input type="text" name="bil2" id="bil2" class="bil" placeholder="Bilangan Kedua" value="<?php echo $bil2;?>">
        <select name="operasi" id="operasi" class="opt">
            <option <?php echo ($operasi == 'tambah') ? 'selected' : ''; ?> value="tambah">+</option>
            <option <?php echo ($operasi == 'kurang') ? 'selected' : ''; ?> value="kurang">-</option>
            <option <?php echo ($operasi == 'kali') ? 'selected' : ''; ?> value="kali">x</option>
            <option <?php echo ($operasi == 'bagi') ? 'selected' : ''; ?> value="bagi">/</option>
        </select>

        <?php if (isset($_POST['hitung'])) { ?>
                <input type="text" class="bil" id="result" value="<?php echo $hasil; ?>">
        <?php } else { ?>
                <input type="text" class="bil" id="result" value="0">
        <?php } ?>
        <input type="button" value="hapus" class="hapus" onclick="clearResult()">
        <input type="submit" value="hitung" class="tombol" name="hitung">
    </form>
    </div>
</body>
</html>