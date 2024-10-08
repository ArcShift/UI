<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Orbitron">
        <style>
            body{
                font-family: Orbitron;
            }
            #watch{
                transform: scale(2) translate(0, 50px);
            }
        </style>
    </head>
    <body style="background-color: black">
        <div style="display: grid; place-items: center;">
            <svg id="watch" xmlns="http://www.w3.org/2000/svg" width="200" height="200">
            <!-- Watch case -->
            <!--<mask id="myMask" x="0" y="0" width="200" height="200">-->
                <!-- Black rectangle to hide part of the underlying graphic -->
                <!--<rect x="0" y="50" width="200" height="100" fill="black" />-->
                <!-- White circle to reveal part of the underlying graphic -->
            <!--</mask>-->
                <rect x="0" y="0" width="200" height="100" fill="white" />

            <g id="second-group-mask">
            <g id="second-group">
            <circle cx="100" cy="100" r="93" stroke-dasharray="0.2 0.8" stroke-dashoffset="0.1"
                    pathLength="36" stroke="cyan" stroke-width="5" />
            </g>
            </g>

            <circle cx="100" cy="100" r="45" stroke-dasharray="0.7 0.3" stroke-dashoffset="0.3"
                    pathLength="12" stroke="cyan" stroke-width="7" fill="none"/>
            <!-- Watch face -->
            <!-- Hour hand -->
            <line id="hour-hand" x1="100" y1="100" x2="100" y2="60" stroke="orange" stroke-width="4" />
            <!-- Minute hand -->
            <line id="minute-hand" x1="100" y1="100" x2="100" y2="40" stroke="orange" stroke-width="2" />
            <!-- Center dot -->
            <circle cx="100" cy="100" r="4" stroke="black" stroke-width="2" fill="cyan" />

        </div>
    </body>
    <script>
        // Get the SVG element
        const svg = document.getElementById("watch");
        // Get the watch hands by their IDs
        const hourHand = svg.getElementById("hour-hand");
        const minuteHand = svg.getElementById("minute-hand");
        const secondGroup = svg.getElementById("second-group");
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
            //secondHand.setAttribute("transform", `rotate(${secondRotation}, 100, 100)`);
            secondGroup.setAttribute("transform", `rotate(${-secondRotation}, 100, 100)`);
        }
        // Update the watch hands initially
        updateWatchHands();
        // Update the watch hands every second (1000 milliseconds)
        setInterval(updateWatchHands, 1000);

        for (var i = 1; i <= 12; i++) {
            drawNumber(svg, i, 60);
            drawNumber(secondGroup, i * 5, 85, "0.7em", i * 30);
        }
        function drawNumber(parent, text, r, size = "1em", rotate = 0) {
            var pos = getCoordinate(100, 100, 30 * i, r);
            const newText = document.createElementNS("http://www.w3.org/2000/svg", "text");
            newText.setAttribute("x", pos.x);
            newText.setAttribute("y", pos.y);
            newText.setAttribute("transform", "rotate(" + rotate + ", " + pos.x + ", " + pos.y + ")");
            newText.setAttribute("text-anchor", "middle");
            newText.setAttribute("fill", "cyan");
            newText.setAttribute("font-size", size);
            newText.setAttribute("dominant-baseline", "middle");
            newText.textContent = text;
            parent.appendChild(newText);
        }
        function getCoordinate(cx, cy, degree, r) {
            degree -= 90;
            var radian = degree * Math.PI / 180;
            var x = cx + r * Math.cos(radian);
            var y = cy + r * Math.sin(radian);
            return {x, y};
        }
    </script>
</html>
