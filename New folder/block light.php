<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mouse Follow Circle</title>
    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
            /* Prevent scrollbars */
            background-color: black;
        }

        .full-size-background {
            width: 100vw;
            height: 100vh;
            background-image: url('hexagon.svg');
            background-size: auto;
            background-repeat: repeat;
            background-position: 0 0;
            position: relative;
            cursor: none;
            /* background-size: var(calc(26*10)) var(calc(15*10)); */
            /* Ensure positioning is relative */
        }

        .mouse-circle {
            /* z-index: -10; */
            position: absolute;
            pointer-events: none;
            /* Prevents the circle from interfering with mouse events */
            transform: translate(-50%, -50%);
            /* Centers the circle on the cursor */
            width: 600px;
            /* Diameter of the gradient point */
            height: 600px;
            /* Diameter of the gradient point */
            border-radius: 50%;
            background: radial-gradient(circle, rgba(255, 0, 255, 0.5) 0%, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0) 100%);
            pointer-events: none;
            /* Ensures the point does not block mouse events */
        }

        .point {
            position: absolute;
            width: 600px;
            /* Diameter of the gradient point */
            height: 600px;
            /* Diameter of the gradient point */
            border-radius: 50%;
            background: radial-gradient(circle, rgba(0, 0, 255, 1) 0%, rgba(255, 255, 255, 0) 50%);
            pointer-events: none;
            /* Ensures the point does not block mouse events */
        }
    </style>
</head>

<body>
    <div class="mouse-circle"></div>
    <div class="point"></div>
    <div class="full-size-background">
        <!-- <svg width="100" height="100" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
            <polygon points="50,15 90,35 90,75 50,95 10,75 10,35" style="fill:lime;stroke:purple;stroke-width:1" />
        </svg> -->
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.1/gsap.min.js"></script>
    <script>
        document.addEventListener('mousemove', (event) => {
            const circle = document.querySelector('.mouse-circle');
            circle.style.left = `${event.clientX}px`;
            circle.style.top = `${event.clientY}px`;
        });

        const point = document.querySelector('.point');
        const pointSize = 400;
        const speed = 200;

        function getRandomPosition() {
            const x = Math.random() * (window.innerWidth - pointSize);
            const y = Math.random() * (window.innerHeight - pointSize);
            return {
                x,
                y
            };
        }

        function calculateDistance(x1, y1, x2, y2) {
            return Math.sqrt((x2 - x1) ** 2 + (y2 - y1) ** 2);
        }

        function animatePoint() {
            const {
                x: startX,
                y: startY
            } = point.getBoundingClientRect();
            const {
                x: endX,
                y: endY
            } = getRandomPosition();
            const distance = calculateDistance(startX, startY, endX, endY);
            const duration = distance / speed; // Duration based on speed and distance

            gsap.to(point, {
                duration: duration,
                x: endX,
                y: endY,
                ease: "linear",
                onComplete: animatePoint // Call the function recursively for continuous animation
            });
        }
        animatePoint();
    </script>
</body>

</html>