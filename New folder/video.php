<!DOCTYPE html>
<html>
<head>
  <title>CSS Animation to Video</title>
  <style>
    /* Your CSS animation styles */
    .box {
      width: 100px;
      height: 100px;
      background-color: red;
      position: absolute;
      top: 0;
      left: 0;
    }
  </style>
</head>
<body>
  <div class="box"></div>

  <canvas id="canvas" width="200" height="100"></canvas>

  <script>
    // Initialize animation variables
    var duration = 2000; // Duration of animation in milliseconds
    var startTime = null;
    var canvas = document.getElementById('canvas');
    var ctx = canvas.getContext('2d');
    var captureInterval = 100; // Interval between captures in milliseconds

    // Function to draw a frame
    function drawFrame(timestamp) {
      if (!startTime) {
        startTime = timestamp;
      }
      var elapsed = timestamp - startTime;

      // Clear the canvas
      ctx.clearRect(0, 0, canvas.width, canvas.height);

      // Draw the animation at the current position
      var progress = Math.min(1, elapsed / duration);
      var position = progress * 200; // Change this according to your animation
      ctx.fillStyle = 'red';
      ctx.fillRect(position, 0, 100, 100);

      // Capture frame if not reached end of animation
      if (elapsed < duration) {
        setTimeout(function() {
          requestAnimationFrame(drawFrame);
        }, captureInterval);
      } else {
        exportVideo();
      }
    }

    // Function to export captured frames as video
    function exportVideo() {
      var video = document.createElement('video');
      var stream = canvas.captureStream();
      video.srcObject = stream;
      video.controls = true;
      document.body.appendChild(video);
    }

    // Start drawing frames
    requestAnimationFrame(drawFrame);
  </script>
</body>
</html>
