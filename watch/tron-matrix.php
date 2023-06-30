<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            body{
                font-family: monospace;
                margin: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
            }
            #watch{
                transform: scale(2) translate(50px, -50px);
            }
            #container {
                position: relative;
            }
            #canvas, #watch {
                position: absolute;
                top: 0;
                left: 0;
            }
            #canvas{
                width: 200px; /* Adjust as needed */
                height: 200px; /* Adjust as needed */
                -webkit-mask-image: radial-gradient(circle, transparent 50%, black 50%); /* Create the circular mask */
                mask-image: radial-gradient(circle, transparent 50%, black 50%);
                -webkit-mask-position: center;
                mask-position: center;
                -webkit-mask-repeat: no-repeat;
                mask-repeat: no-repeat;
                /* For an image background */
                /* background-image: url('path/to/your/image.jpg'); */
                /* background-size: cover; */
                /* For other content, you can add styles as needed */
            }
        </style>
    </head>
    <body style="background-color: black">
        <div id="container">
            <svg id="watch" xmlns="http://www.w3.org/2000/svg" width="200" height="200">
            <!-- Watch case -->
            <circle cx="100" cy="100" r="95" stroke-dasharray="0.2 0.8"
                    stroke-dashoffset="0.1" fill="none"
                    pathLength="60" stroke="cyan" stroke-width="5" />
            <circle cx="100" cy="100" r="45" stroke-dasharray="0.7 0.3" stroke-dashoffset="0.3"
                    pathLength="12" stroke="cyan" stroke-width="7" fill="none"/>
            <!-- Watch face -->
            <!-- Hour hand -->
            <line id="hour-hand" x1="100" y1="100" x2="100" y2="60" stroke="orange" stroke-width="4" />
            <!-- Minute hand -->
            <line id="minute-hand" x1="100" y1="100" x2="100" y2="40" stroke="orange" stroke-width="2" />
            <!-- Second hand -->
            <line id="second-hand" x1="100" y1="100" x2="100" y2="30" stroke="yellow" stroke-width="1" />
            <!-- Center dot -->
            <circle cx="100" cy="100" r="4" stroke="black" stroke-width="2" fill="cyan" />
            <mask id="myMask">
                <!-- Everything under a white pixel will be visible -->
                <rect x="0" y="0" width="200" height="200" fill="white"/>
                <!-- Everything under a black pixel will be invisible -->

                <g style="transform: translate(100px, 100px)">
                <circle cx="0" cy="0" r="98" stroke-dashoffset="0.1" fill="black"/>
                </g>
            </mask>
            <!-- with this mask applied, we "punch" a heart shape hole into the circle -->
            <rect x="0" y="0" width="200" height="200" fill="black" mask="url(#myMask)"/>
            </svg>
        </div>
        <canvas id="matrix-canvas"></canvas>
    </body>
    <script>
        // Get the SVG element
        const svg = document.getElementById("watch");
        // Get the watch hands by their IDs
        const hourHand = svg.getElementById("hour-hand");
        const minuteHand = svg.getElementById("minute-hand");
        const secondHand = svg.getElementById("second-hand");
        // Function to update the rotation of the hands
        function updateWatchHands() {
            const now = new Date();
            const hours = now.getHours();
            const minutes = now.getMinutes();
            const seconds = now.getSeconds();
            const hourRotation = (hours % 12) * 30 + minutes / 2;
            const minuteRotation = minutes * 6 + seconds / 10;
            const secondRotation = seconds * 6;
            hourHand.setAttribute("transform", `rotate(${hourRotation}, 100, 100)`);
            minuteHand.setAttribute("transform", `rotate(${minuteRotation}, 100, 100)`);
            secondHand.setAttribute("transform", `rotate(${secondRotation}, 100, 100)`);
        }
        // Update the watch hands initially
        updateWatchHands();
        // Update the watch hands every second (1000 milliseconds)
        setInterval(updateWatchHands, 1000);

        for (var i = 1; i <= 12; i++) {
            drawNumber(i, 60);
            drawNumber(i * 5, 85, "0.7em");
        }
        function drawNumber(text, r, size = "1em") {
            var pos = getCoordinate(100, 100, 30 * i, r);
            const newText = document.createElementNS("http://www.w3.org/2000/svg", "text");
            newText.setAttribute("x", pos.x);
            newText.setAttribute("y", pos.y);
            newText.setAttribute("text-anchor", "middle");
            newText.setAttribute("fill", "cyan");
            newText.setAttribute("font-size", size);
            newText.setAttribute("dominant-baseline", "middle");
            newText.textContent = text;
            svg.appendChild(newText);
        }
        function getCoordinate(cx, cy, degree, r) {
            degree -= 90;
            var radian = degree * Math.PI / 180;
            var x = cx + r * Math.cos(radian);
            var y = cy + r * Math.sin(radian);
            return {x, y};
        }
    </script>
    <script>
        // Get the canvas element
        const canvas = document.getElementById("matrix-canvas");
        const context = canvas.getContext("2d");

        // Set canvas size to match the window size
        canvas.width = 400;
        canvas.height = 400;

        // Create an array of characters
        const characters = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "A", "B", "C", "D", "E", "F"];


        // Set the font properties
        const fontSize = 10;
        const fontFamily = "Courier New";
        const numColumns = Math.floor(canvas.width / fontSize);

        // Generate random matrix rain
        const matrixRain = [];
        for (let column = 0; column < numColumns; column++) {
            matrixRain[column] = Math.floor(Math.random() * canvas.height);
        }

        // Animation loop
        // Animation loop
        function animate() {
            // Clear the canvas
            context.fillStyle = "rgba(0, 0, 0, 0.1)";
            context.fillRect(0, 0, canvas.width, canvas.height);

            // Set the font properties
            context.font = `${fontSize}px ${fontFamily}`;
            context.fillStyle = "#0F0";

            // Update and draw matrix rain
            for (let column = 0; column < numColumns; column++) {
                // Get a random character
                const character = characters[Math.floor(Math.random() * characters.length)];

                // Draw the character at the current position
                context.fillText(character, column * fontSize, matrixRain[column] * fontSize);

                // Update the position
                matrixRain[column] = (matrixRain[column] + 1) % Math.floor(canvas.height / fontSize);
            }

            // Adjust the delay here to control the speed (in milliseconds)
            const delay = 80;

            // Request the next animation frame
            setTimeout(animate, delay);
        }

        // Start the animation loop
        animate();



    </script>
    <script>
        // Get the canvas element and its context
        const ctx = canvas.getContext('2d');

        // Set the circle's position and size
        const circleX = canvas.width / 2;
        const circleY = canvas.height / 2;
        const circleRadius = 100;

        // Function to draw the masked circle
        function drawMaskedCircle() {
            // Clear the canvas
            ctx.clearRect(0, 0, canvas.width, canvas.height);

            // Draw the background (optional)
            // ctx.fillStyle = 'lightgray';
            // ctx.fillRect(0, 0, canvas.width, canvas.height);

            // Save the canvas state
            ctx.save();

            // Draw the circle
            ctx.beginPath();
            ctx.arc(circleX, circleY, circleRadius, 0, 2 * Math.PI);
            ctx.closePath();
            ctx.clip(); // This applies the masking effect

            // Draw the content inside the circle
            // For example, draw an image (optional)
            // const image = new Image();
            // image.src = 'path/to/your/image.jpg';
            // ctx.drawImage(image, circleX - circleRadius, circleY - circleRadius, circleRadius * 2, circleRadius * 2);

            // Draw other content or elements inside the circle as needed

            // Restore the canvas state
            ctx.restore();
        }

        // Call the function to draw the masked circle
        drawMaskedCircle();
    </script>
</html>
