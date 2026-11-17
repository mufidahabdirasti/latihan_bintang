<?php
$tinggi = null;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = $_POST['tinggi'] ?? '';
    if ($input === '' || filter_var($input, FILTER_VALIDATE_INT) === false) {
        $error = 'Input tidak valid! Masukkan bilangan bulat antara 1 sampai 20.';
    } else {
        $nilai = (int) $input;
        if ($nilai < 1 || $nilai > 20) {
            $error = 'Input di luar batas! Tinggi segitiga harus antara 1 sampai 20.';
        } else {
            $tinggi = $nilai;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generator Pola Segitiga Bintang</title>
    <link rel="stylesheet" href="style.css?v=2">
</head>
<body>
<main class="container">
    <header class="header">
        <span class="badge">&#127800; PHP NATIVE &bull; NESTED LOOP &#127800;</span>
        <h1>Generator Pola Segitiga Bintang</h1>
        <p class="subtitle">Masukkan tinggi segitiga (angka bulat 1 – 20) untuk mencetak 4 pola simetris</p>
    </header>

    <form method="POST" class="control-form">
        <input type="text" name="tinggi" placeholder="Contoh: 5 (Angka 1 - 20)" value="<?= htmlspecialchars($_POST['tinggi'] ?? '') ?>" autocomplete="off">
        <button type="submit">&#10024; Tampilkan Pola</button>
    </form>

    <?php if ($error !== ''): ?>
        <div class="alert-error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <?php if ($tinggi !== null): ?>
        <div class="status-bar">
            <span>Hasil render untuk tinggi = <strong><?= $tinggi ?></strong></span>
            <span class="pill-success">Valid (1–20)</span>
        </div>

        <section class="grid-hasil">
            <article class="card-pola">
                <div class="card-head"><span class="num">01</span><h3>Segitiga Sama Kaki (Tegak)</h3></div>
                <div class="canvas-bintang"><pre><?php
                    for ($i = 1; $i <= $tinggi; $i++) {
                        for ($s = 1; $s <= ($tinggi - $i); $s++) echo " ";
                        for ($b = 1; $b <= (2 * $i - 1); $b++) echo "*";
                        echo "\n";
                    }
                ?></pre></div>
            </article>

            <article class="card-pola">
                <div class="card-head"><span class="num">02</span><h3>Segitiga Sama Kaki (Terbalik)</h3></div>
                <div class="canvas-bintang"><pre><?php
                    for ($i = $tinggi; $i >= 1; $i--) {
                        for ($s = 1; $s <= ($tinggi - $i); $s++) echo " ";
                        for ($b = 1; $b <= (2 * $i - 1); $b++) echo "*";
                        echo "\n";
                    }
                ?></pre></div>
            </article>

            <article class="card-pola">
                <div class="card-head"><span class="num">03</span><h3>Segitiga Lancip (Hadap Kanan)</h3></div>
                <div class="canvas-bintang"><pre><?php
                    for ($i = 1; $i <= $tinggi; $i++) {
                        for ($b = 1; $b <= $i; $b++) echo "*";
                        echo "\n";
                    }
                    for ($i = $tinggi - 1; $i >= 1; $i--) {
                        for ($b = 1; $b <= $i; $b++) echo "*";
                        echo "\n";
                    }
                ?></pre></div>
            </article>

            <article class="card-pola">
                <div class="card-head"><span class="num">04</span><h3>Segitiga Lancip (Hadap Kiri)</h3></div>
                <div class="canvas-bintang"><pre><?php
                    for ($i = 1; $i <= $tinggi; $i++) {
                        for ($s = 1; $s <= ($tinggi - $i); $s++) echo " ";
                        for ($b = 1; $b <= $i; $b++) echo "*";
                        echo "\n";
                    }
                    for ($i = $tinggi - 1; $i >= 1; $i--) {
                        for ($s = 1; $s <= ($tinggi - $i); $s++) echo " ";
                        for ($b = 1; $b <= $i; $b++) echo "*";
                        echo "\n";
                    }
                ?></pre></div>
            </article>
        </section>
    <?php endif; ?>
</main>
</body>
</html>
