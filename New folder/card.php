<?php
$list = [
    [
        'title' => 'one',
        'img' => 'https://4kwallpapers.com/images/wallpapers/futuristic-modern-2732x2732-12471.jpg'
    ], [
        'title' => 'two',
        'img' => 'https://img.freepik.com/free-vector/realistic-background-futuristic-style_23-2149129125.jpg'
    ], [
        'title' => 'three',
        'img' => 'https://img.freepik.com/free-photo/futuristic-background-with-colorful-glowing-abstract-neon-lights_181624-27735.jpg'
    ], [
        'title' => 'four',
        'img' => 'https://c4.wallpaperflare.com/wallpaper/8/637/191/digital-digital-art-artwork-futuristic-futuristic-city-hd-wallpaper-preview.jpg'
    ], [
        'title' => 'one',
        'img' => 'https://4kwallpapers.com/images/wallpapers/futuristic-modern-2732x2732-12471.jpg'
    ], [
        'title' => 'two',
        'img' => 'https://img.freepik.com/free-vector/realistic-background-futuristic-style_23-2149129125.jpg'
    ], [
        'title' => 'three',
        'img' => 'https://img.freepik.com/free-photo/futuristic-background-with-colorful-glowing-abstract-neon-lights_181624-27735.jpg'
    ], [
        'title' => 'four',
        'img' => 'https://c4.wallpaperflare.com/wallpaper/8/637/191/digital-digital-art-artwork-futuristic-futuristic-city-hd-wallpaper-preview.jpg'
    ], [
        'title' => 'one',
        'img' => 'https://4kwallpapers.com/images/wallpapers/futuristic-modern-2732x2732-12471.jpg'
    ], [
        'title' => 'two',
        'img' => 'https://img.freepik.com/free-vector/realistic-background-futuristic-style_23-2149129125.jpg'
    ], [
        'title' => 'three',
        'img' => 'https://img.freepik.com/free-photo/futuristic-background-with-colorful-glowing-abstract-neon-lights_181624-27735.jpg'
    ], [
        'title' => 'four',
        'img' => 'https://c4.wallpaperflare.com/wallpaper/8/637/191/digital-digital-art-artwork-futuristic-futuristic-city-hd-wallpaper-preview.jpg'
    ], [
        'title' => 'one',
        'img' => 'https://4kwallpapers.com/images/wallpapers/futuristic-modern-2732x2732-12471.jpg'
    ], [
        'title' => 'two',
        'img' => 'https://img.freepik.com/free-vector/realistic-background-futuristic-style_23-2149129125.jpg'
    ], [
        'title' => 'three',
        'img' => 'https://img.freepik.com/free-photo/futuristic-background-with-colorful-glowing-abstract-neon-lights_181624-27735.jpg'
    ], [
        'title' => 'four',
        'img' => 'https://c4.wallpaperflare.com/wallpaper/8/637/191/digital-digital-art-artwork-futuristic-futuristic-city-hd-wallpaper-preview.jpg'
    ]
];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Card</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body>
        <div class="flex gap-3">
            <?php foreach ($list as $k => $l) { ?>
                <div class="main-card align-baseline bg-black text-white p-4 rounded w-10 <?= $k == 0 ? 'w-96' :'' ?> h-96 bg-[url('<?= $l['img'] ?>')]" role="button" onmouseover="cardHover(this)"><?= $l['title'] ?></div>
            <?php } ?>
        </div>
    </body>
    <script>
        function cardHover(n) {
            $('.main-card').removeClass('w-96');
            $(n).addClass('w-96');
        }
    </script>
</html>
