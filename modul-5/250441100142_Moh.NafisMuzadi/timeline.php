<?php
$saya = [
    ['tahun' => '2022', 'judul' => 'Masih sekolah', 'deskripsi' => 'saya masih sekolah kelas 2 MA di salah satu sekolah swasta di pedesaan'],
    ['tahun' => '2023', 'judul' => 'Masih sekolah', 'deskripsi' => 'tahun ini saya sudah kelas 3 MA dan ditahun ini saya tau tentang pemrograman, dan saya mulai belajar membuat program di tahun ini. Bahasa pemrograman yang pertama kali saya pelajari adalah JavaScript'],
    ['tahun' => '2024', 'judul' => 'Lulus sekolah', 'deskripsi' => 'setelah saya lulus sekolah lanjut kuliah'],
    ['tahun' => '2025', 'judul' => 'Masuk kuliah', 'deskripsi' => ' tahun ini adalah tahun dimana saya masuk kuliah di YUTIEM'],
    ['tahun' => '2026', 'judul' => 'Tahun sekarang', 'deskripsi' => 'hari ini adalah hari dimana hari ini ya hari ini sekarang']
];

function highlightTahun($tahun) {
    if ($tahun == '2022') {
        return'text-red-500 font-bold';
    } else {
        return 'text-gray-800';
    }
};

function highlightDot($tahun) {
    if ($tahun == '2022') {
        return 'bg-red-500 scale-125';
    } else {
        return 'bg-black';
    }
};
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="p-4">
    <div class="max-w-2xl mx-auto py-10 bg-white-600 shadow-xl rounded-xl mt-8 px-4">
        <h2 class="text-4xl text-center font-semibold mt-4">TimeLine kuh</h2>
        <div class="relative border-l-4 pl-6">
            <?php foreach ($saya as $aku):?>
            <div class="mb-8 relative">
                <div class="absolute -left-9 top-1 w-5 h-5 rounded-full <?php echo highlightDot($aku['tahun']);?>"></div>
                <div>
                    <p class="<?php echo highlightTahun($aku['tahun']); ?> font-bold"><?php echo $aku['tahun']; ?></p>
                    <h2 class="text-xl font-semibold"><?php echo $aku['judul'];?></h2>
                    <p class="text-gray-600"><?php echo $aku['deskripsi']; ?></p>
                </div>
            </div>
            <?php endforeach;?>
        </div>        
    </div>
    <nav class="w-[50%] mx-auto flex items-center gap-4">
        <a href="index.php" class="group bg-gray-600 text-white rounded-lg px-14 py-4 mt-8 relative overflow-hidden">
            <span class="block group-hover:hidden">Back</span>
            <span class="hidden group-hover:block">Profil interaktif mahasiswa</span>
        </a>
        <a href="blog.php" class="group bg-gray-600 text-white rounded-lg px-10 py-4 mt-8 relative overflow-hidden">
            <span class="block group-hover:hidden">Next Page</span>
            <span class="hidden block group-hover:block">Blog reflektif developer</span>
        </a>
    </nav>

</body>
</html>