<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            body{
                font-family: monospace;
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
            <circle id="circle1" cx="100" cy="100" r="95" stroke-dasharray="0.2 0.8"
                    stroke-dashoffset="0.1"
                    pathLength="60" stroke="cyan" stroke-width="5" />
            <circle id="circle2" cx="100" cy="100" r="45" stroke-dasharray="0.7 0.3" stroke-dashoffset="0.3"
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
            </svg>
        </div>
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
            
            const circle1 = svg.getElementById("circle1");
            const circle2 = svg.getElementById("circle2");
            const randomColor = `#${Math.floor(Math.random()*16777215).toString(16)}`;
            circle1.setAttribute("stroke", randomColor);
            circle2.setAttribute("stroke", randomColor);
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
</html>
