<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SVG Graph Example</title>
</head>
<body>

<svg width="400" height="200">
    <!-- X-axis line -->
    <line x1="50" y1="150" x2="350" y2="150" stroke="black" stroke-width="2" />

    <!-- Y-axis line -->
    <line x1="50" y1="150" x2="50" y2="50" stroke="black" stroke-width="2" />

    <!-- Bars for the graph -->
    <rect x="100" y="100" width="50" height="50" fill="blue" />
    <rect x="200" y="120" width="50" height="30" fill="green" />
    <rect x="300" y="80" width="50" height="70" fill="red" />

    <!-- Text labels -->
    <text x="100" y="170" fill="black">A</text>
    <text x="200" y="170" fill="black">B</text>
    <text x="300" y="170" fill="black">C</text>
</svg>

</body>
</html>
