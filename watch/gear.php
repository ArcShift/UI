<!DOCTYPE html>
<html>
    <head>
        <title>SVG Gear</title>
        <style>
            /* Optional CSS styles for positioning the SVG */
            body {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                background-color: black;
                font-family: monospace;
            }
            #frame{
                transform: scale(2);
            }
        </style>
    </head>
    <body>
        <svg id="frame" width="200" height="200" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
        <!--MINUTE-->
        <g style="transform: translate(100px, 147px)">
        <g id="gMinute">
        <circle r="37" stroke="chocolate" stroke-width="12" fill="none"/>
        <?php for ($i = 0; $i < 12; $i++) { ?>
            <rect width="14" height="24" fill="chocolate" rx="3" ry="3" transform="rotate(<?= $i * 30 ?>, 0, 0) translate(-7,-55)"/>
            <text fill="black" font-weight="bold" text-anchor="middle" font-size="10" transform="rotate(<?= $i * 30 ?>, 0, 0) translate(0,-45)"><?= $i * 5 ?></text>
        <?php } ?>
        </g>
        </g>
        <!--SECOND-->
        <g style="transform:translate(170px, 100px)">
        <g id="gSecond">
        <circle r="37" stroke="orange" stroke-width="12" fill="none"/>
        <?php for ($i = 0; $i < 12; $i++) { ?>
            <rect width="14" height="24" fill="orange" rx="3" ry="3" transform="rotate(<?= $i * 30 ?>, 0, 0) translate(-7,-55)"/>
        <?php } ?>
        <?php for ($i = 0; $i < 6; $i++) { ?>
            <!--<line x2="8" y2="34" stroke="orange" stroke-width="10" transform="rotate(<?= $i * 60 -16?>, 0, 0)"/>-->
        <?php } ?>
        <?php for ($i = 0; $i < 12; $i++) { ?>
            <text fill="black" font-weight="bold" dominant-baseline="middle" text-anchor="middle" font-size="10" transform="rotate(<?= $i * 30 ?>, 0, 0) translate(-48,0)"><?= $i * 5 ?></text>
        <?php } ?>
        </g>
        </g>
        <!--HOUR-->
        <g style="transform: translate(30px, 100px)">
        <g id="gHour">
        <circle r="37" stroke="gold" stroke-width="12" fill="none"/>
        <?php for ($i = 1; $i <= 12; $i++) { ?>
            <rect width="14" height="24" fill="gold" rx="3" ry="3" transform="rotate(<?= $i * 30 ?>, 0, 0) translate(-7,-55)"/>
        <?php } ?>
        <?php for ($i = 1; $i <= 12; $i++) { ?>
            <text fill="black" font-weight="bold" dominant-baseline="middle" text-anchor="middle" font-size="10" transform="rotate(<?= $i * 30 ?>, 0, 0) translate(48,0)"><?= $i ?></text>
        <?php } ?>
        </g>
        </g>
        //
        <g style="transform: translate(100px, 100px)">
        <rect fill="none" rx="5" x="-35" y="-8" width="70" height="16" />
        </g>
    <mask id="myMask">
        <!-- Everything under a white pixel will be visible -->
        <rect x="0" y="0" width="200" height="200" fill="grey"/>
        <!-- Everything under a black pixel will be invisible -->

        <g style="transform: translate(100px, 100px)">
        <rect fill="black" rx="5" x="-35" y="-8" width="70" height="16" />
        </g>
    </mask>
    <!-- with this mask applied, we "punch" a heart shape hole into the circle -->
    <rect x="0" y="0" width="200" height="200" fill="black" mask="url(#myMask)"/>
    <text x="30" y="100" fill="cyan" dominant-baseline="middle" text-anchor="middle" font-size="12">HOUR</text>
    <text x="100" y="147" fill="cyan" dominant-baseline="middle" text-anchor="middle" font-size="12">MINUTE</text>
    <text x="170" y="100" fill="cyan" dominant-baseline="middle" text-anchor="middle" font-size="12">SECOND</text>
    </svg>

    <script>
        const svg = document.getElementById("frame");
        const hourHand = svg.getElementById("gHour");
        const minuteHand = svg.getElementById("gMinute");
        const gSecond = svg.getElementById("gSecond");
        // Function to update the rotation of the hands
        function updateWatchHands() {
            const now = new Date();
            const hours = now.getHours();
            const minutes = now.getMinutes();
            const seconds = now.getSeconds();
            const hourRotation = (hours % 12) * 30 + minutes / 2;
            const minuteRotation = minutes * 6;
            console.log(hours);
            const secondRotation = seconds * 6;
            hourHand.setAttribute("transform", `rotate(${-hourRotation}, 0, 0)`);
            minuteHand.setAttribute("transform", `rotate(${-minuteRotation}, 0, 0)`);
            gSecond.setAttribute("transform", `rotate(${-secondRotation}, 0, 0)`);
        }
        // Update the watch hands initially
        updateWatchHands();
        // Update the watch hands every second (1000 milliseconds)
        setInterval(updateWatchHands, 1000);
    </script>
</body>
</html>
