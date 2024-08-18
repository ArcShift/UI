<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Web Portfolio Animation</title>
  <style>
    .section {
      opacity: 0;
      transform: translateY(20px);
      transition: all 0.5s ease-out;
    }
  </style>
</head>
<body>
  <div class="section">Hello, I'm [Your Name]!</div>
  <div class="section">Here's some of my work.</div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js"></script>
  <script>
    gsap.from(".section", {
      duration: 1,
      y: 50,
      opacity: 0,
      stagger: 0.3,
      scrollTrigger: {
        trigger: ".section",
        start: "top 80%",
        end: "bottom 20%",
        toggleActions: "play none none reverse"
      }
    });
  </script>
</body>

</html>