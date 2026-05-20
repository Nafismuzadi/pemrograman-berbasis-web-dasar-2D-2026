<?php
    $saya = [
        'html' => [
            'judul' => 'Belajar HTML pertama kali',
            'tanggal' => '32 Januari 1945',
            'isi' => 'pada tanggal 32 Januari 1945 pertama kali saya belajar html tapi saya sangat bingung karena susah dan belum pernah mendengar tentang pemrograman',
            'gambar' => 'assets/html.jpg',
            'link' => 'chatgpt.com'
        ],
        "error" => [
            "judul" => "Error Pertama",
            "tanggal" => "5 Februari 2023",
            "isi" => "Error pertama saya membuat saya frustrasi, tapi dari situlah saya belajar membaca error dan memperbaiki kode.",
            "gambar" => "assets/error.jpg",
            "link" => "https://stackoverflow.com"
        ],
        "js" => [
            "judul" => "Belajar JavaScript",
            "tanggal" => "10 Maret 2023",
            "isi" => "JavaScript membuka dunia baru dalam membuat website interaktif. Saya mulai membuat tombol dan animasi sederhana.",
            "gambar" => "assets/js.jpg",
            "link" => "https://developer.mozilla.org/en-US/docs/Web/JavaScript"
        ]
    ];

    $kutipan = [
        'Jangan lupa titik koma',
        'belajar coding itu marathon, bukan sprint',
        'carkecor',
        'taserrrr'
    ];

    $random = $kutipan[array_rand($kutipan)];

    $key = isset($_GET['saya']) ? $_GET['saya'] : null;
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Artikel Coding</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100">
    <div class="max-w-6xl mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6 text-center">Artikel Coding</h1>
        <div class="grid md:grid-cols-3 gap-6">
            <div class="bg-white p-4 rounded-2xl shadow">
                <h2 class="font-bold mb-4">Daftar Artikel</h2>
                <ul class="space-y-2">
                <?php foreach ($saya as $k => $item): ?>
                    <li>
                        <a href="?saya=<?= $k ?>" 
                           class="block p-2 rounded hover:bg-orange-200 transition">
                            <?= $item['judul'] ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
            </div>
            <div class="md:col-span-2 bg-white p-6 rounded-2xl shadow">
                <?php if ($key !== null && isset($saya[$key])): 
                    $data = $saya[$key];
                    $keys = array_keys($saya);
                    $index = array_search($key, $keys);
                ?>
                <h2 class="text-2xl font-bold mb-2"><?= $data['judul'] ?></h2>
                <p class="text-gray-500 mb-4"><?= $data['tanggal'] ?></p>
                <img src="<?= $data['gambar'] ?>" class="rounded-xl mb-4 w-full h-60 object-cover">
                <p class="mb-4"><?= $data['isi'] ?></p>
                <a href="<?= $data['link'] ?>" target="_blank" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Referensi
                </a>
                <div class="mt-6 p-4 bg-yellow-100 rounded-xl">
                    <p><?= $random ?></p>
                </div>
                <nav class="w-[70%] mx-auto flex items-center gap-4">
                    <a href="index.php" class="group bg-gray-600 text-white rounded-lg px-14 py-4 mt-8 relative overflow-hidden">
                        <span class="block group-hover:hidden">Back</span>
                        <span class="hidden group-hover:block">Profil interaktif mahasiswa</span>
                    </a>
                    <a href="blog.php" class="group bg-gray-600 text-white rounded-lg px-10 py-4 mt-8 relative overflow-hidden">
                        <span class="block group-hover:hidden">Back</span>
                        <span class="hidden block group-hover:block">Timelinekuhh</span>
                    </a>
                </nav>
                <?php else: ?>
                    <p class="text-gray-400 text-center mt-20">
                        Silakan pilih artikel di sebelah kiri 
                    </p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>