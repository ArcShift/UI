<!DOCTYPE html>
<html>

<head>
    <title>Home Finding Animation</title>
</head>

<body>
    <canvas id="myCanvas" width="400" height="300"></canvas>
    <script>
        const canvas = document.getElementById("myCanvas");
        const ctx = canvas.getContext("2d");

        const gridSize = 20; // Size of each house square
        const rows = 10;
        const columns = 15;
        const entryPoint = {
            x: 0,
            y: 0
        };
        let homePosition = {};

        function createGrid() {
            for (let y = 0; y < rows; y++) {
                for (let x = 0; x < columns; x++) {
                    const color = x === entryPoint.x && y === entryPoint.y ? "green" : "gray";
                    ctx.fillStyle = color;
                    ctx.fillRect(x * gridSize, y * gridSize, gridSize, gridSize);
                }
            }
        }

        function animate() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            createGrid();

            // Get user input for home position (replace with your input method)
            homePosition = {
                x: 5,
                y: 8
            }; // Example input

            const direction = calculateDirection(homePosition);

            // Render an indicator for the direction (e.g., an arrow)
            ctx.fillStyle = "red";
            ctx.beginPath();
            // Draw an arrow based on the direction (implement arrow drawing logic)
            ctx.closePath();
            ctx.fill();

            requestAnimationFrame(animate);
        }

        function calculateDirection(homePosition) {
            const entryPointX = entryPoint.x;
            const entryPointY = entryPoint.y;
            const homeX = homePosition.x;
            const homeY = homePosition.y;

            let direction = "";

            if (homeX > entryPointX) {
                direction = "right";
            } else if (homeX < entryPointX) {
                direction = "left";
            } else {
                if (homeY > entryPointY) {
                    direction = "down";
                } else {
                    direction = "up";
                }
            }

            return direction;
        }


        createGrid(); // Draw the initial grid
        requestAnimationFrame(animate);
    </script>
</body>

</html>