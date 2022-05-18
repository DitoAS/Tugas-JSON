<?php

$kataKunci = "corona";
$from = "2022-05-10";
$sortBy = "publishedAt";
$apiKey = "687bdc9b723849af8ea37caca8819417"; /* <-- Silakan register di newsapi.org untuk mendapatkan API_KEY */
$language = "en";
$alamatAPI = "http://newsapi.org/v2/everything?" .
    "q={$kataKunci}&language={$language}&from={$from}" .
    "&sortBy={$sortBy}&apiKey={$apiKey}";

    ?>

    <?php
# ambil data json dari $alamatAPI
$data = file_get_contents($alamatAPI);
# parsing variabel $data ke dalam array
$dataBerita = json_decode($data);
?>

<?php

if ($dataBerita->status === "ok") {
    # tampilkan menggunakan perulangan
    foreach ($dataBerita->articles as $berita) {
        echo "<h3><a href='{$berita->url}'>{$berita->title}</a></h3>";

        if ($berita->urlToImage) {
            echo "<img style='width: 10rem' src='{$berita->urlToImage}'>";
        }

        echo "<p>{$berita->description}</p>";
        echo "<hr>";
    }
}
?>