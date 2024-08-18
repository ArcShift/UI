<!DOCTYPE html>
<?php
$menu = [
    [
        'title' => 'home',
        'icon' => 'fa-solid fa-house'
    ], [
        'title' => 'chart',
        'icon' => 'fa-solid fa-chart-simple'
    ], [
        'title' => 'cart',
        'icon' => 'fa-solid fa-cart-shopping'
    ], [
        'title' => 'logout',
        'icon' => 'fa-solid fa-right-from-bracket'
    ]
];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Navbar</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body>
        <div class="bg-black flex items-center">
            <?php foreach ($menu as $i) { ?>
                <!--<div class="w-full h-1 bg-gray-500 hover:bg-gradient-to-r from-gray-500 via-cyan-300 to-gray-500"></div>-->
                <div class="text-gray-600 hover:text-[#00ffff] align-middle p-2 border-t-4 border-gray-600 hover:border-[#00ffff]">
                    <i class="<?= $i['icon'] ?>"></i>   
                </div>
            <?php } ?>
        </div>
        <div class="bg-black flex mt-5">
            <?php foreach ($menu as $m) { ?>
            <div class="text-white p-3 font-bold hover:bg-gradient-to-r from-neutral-900 to-red-500 rounded" role="button"><?= ucwords($m['title']) ?></div>
            <?php } ?>
        </div>
    </body>
</html>
