<?php
function tampilkanData($framework, $pengalaman, $tools, $minat, $skill) {
    echo "<div class='w-[60%] mx-auto mt-8 bg-white p-6 rounded shadow'>";
    echo "<h2 class='text-xl font-bold mb-4'>Hasil Input</h2>";
    echo "<table class='border border-black border-collapse w-full'>";
    echo "<tr>
            <th class='border px-4 py-2 text-left'>Framework</th>
            <td class='border px-4 py-2'>" . implode(", ", $framework) . "</td>
          </tr>";
    echo "<tr>
            <th class='border px-4 py-2 text-left'>Tools</th>
            <td class='border px-4 py-2'>" . implode(", ", $tools) . "</td>
          </tr>";
    echo "<tr>
            <th class='border px-4 py-2 text-left'>Minat</th>
            <td class='border px-4 py-2'>$minat</td>
          </tr>";
    echo "<tr>
            <th class='border px-4 py-2 text-left'>Skill</th>
            <td class='border px-4 py-2'>$skill</td>
          </tr>";
    echo "</table>";
    echo "<p class='mt-4'><b>Pengalaman:</b> $pengalaman</p>";
    echo "</div>";
}

$pesanError = "";
$pesanSkill = "";

if (isset($_POST['submit'])) {
    $frameworkInput = $_POST['framework'];
    $pengalaman = $_POST['pengalaman'];
    $tools = $_POST['tools'] ?? [];
    $minat = $_POST['minat'] ?? "";
    $skill = $_POST['skill'] ?? "";
    if (
        empty($frameworkInput) ||
        empty($pengalaman) ||
        empty($tools) ||
        empty($minat) ||
        empty($skill)
    ) {
        $pesanError = "Semua input wajib diisi!";
    } else {
        $framework = array_map('trim', explode(",", $frameworkInput));
        if (count($framework) > 2) {
            $pesanSkill = "Skill Anda cukup luas di bidang development!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="px-8">
    <nav class="flex items-center justify-between px-20 pt-4 mb-8 w-[100%]">
        <div class="text-black-400 text-2xl font-semibold">Belajar PhP</div>
        <div>
            <div>
                <a href="index.php" class="bg-white rounded-2xl py-2 px-16 shadow">Profil</a>
                <a href="timeline.php" class="bg-white rounded-2xl py-2 px-16 shadow">Timeline</a>
                <a href="blog.php" class="bg-white rounded-2xl py-2 px-20 shadow">Blog</a>
            </div>
        </div>
    </nav>
    <div class="mb-20">
        <h1 class="text-center text-2xl font-semibold mb-2">Profil Interatif Developer Pemula</h1>
        <div class="bg-gray-200 w-[40%] mx-auto p-8 rounded-lg shadow-xl">
            <table class="border border-black border-collapse [&_th]:border [&_td]:border [&_th]:p-4 [&_td]:p-4 [&_th]:text-left mx-auto">
                <tr>
                    <th>Nama</th>
                    <td>Moh. Nafis Muzadi</td>
                </tr>
                <tr>
                    <th>Id Developer</th>
                    <td>250441100142</td>
                </tr>
                <tr>
                    <th>Kota</th>
                    <td>Sumenep</td>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <td>08-13-2002</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>nafismuzadi06@gmail.com</td>
                </tr>
                <tr>
                    <th>WhatsApp</th>
                    <td>000000000000</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="w-[60%] mx-auto bg-gray-200 p-8 rounded-lg">
        <form method="post" class="space-y-4">
            <div>
                <label>Framework/tools Yang anda gunakan</label>
                <input type="text" name="framework" class="border w-full p-2 rounded" placeholder="Masukkan disini">
            </div>
            <div>
                <label for="">Pengalaman</label>
                <textarea name="pengalaman" id="" class="w-full border p-2 rounded"></textarea>
            </div>
            <div>
                <label for="" class="font-semibold">Tools</label>
                <br>
                <input type="checkbox" name="tools[]" value="VsCode"> VsCode
                <br>
                <input type="checkbox" name="tools[]" value="Github"> Github
                <br>
                <input type="checkbox" name="tools[]" value="Figma"> Figma
                <br>
                <input type="checkbox" name="tools[]" value="Postman"> Postman
            </div>
            <div>
                <label for="" class="font-semibold">Minat</label>
                <br>
                <input type="radio" name="minat" value="frontend"> FrontEnd
                <br>
                <input type="radio" name="minat" value="backend"> BackEnd
                <br>
                <input type="radio" name="minat" value="fullstack"> FullStack
            </div>
            <div>
                <label for="">Tingkat Skill</label>
                <select name="skill" class="border w-full p-2 rounded">
                    <option value="Dasar">Dasar</option>
                    <option value="Cukup">Cukup</option>
                    <option value="Proffesional">Proffesional</option>
                </select>
            </div>
            <button type="submit" name="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Kirim</button>
        </form>
        <?php if (!empty($pesanError)) : ?>
        <p class="text-red-500 text-center mt-4"><?= $pesanError ?></p>
        <?php endif; ?>
        <?php if (!empty($pesanSkill)) : ?>
        <p class="text-green-600 text-center mt-4"><?= $pesanSkill ?></p>
        <?php endif; ?>
        <?php
        if (isset($framework) && empty($pesanError)) {
            tampilkanData($framework, $pengalaman, $tools, $minat, $skill);
        }
        ?>
    </div>
</body>
</html>