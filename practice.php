<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vertical Marquee</title>
  <style>
    .marquee-container {
      height: 100px; /* Adjust the height as needed */
      overflow: hidden;
      position: relative;
      border: 1px solid green; /* Border to resemble the example */
    }

    .marquee-content {
      display: inline-block;
      position: absolute;
      width: 100%;
      animation: marquee 10s linear infinite;
    }

    @keyframes marquee {
      0% {
        top: 100%;
      }
      100% {
        top: -100%;
      }
    }

    .marquee-item {
      display: block;
      padding: 10px;
    }

    .new-badge {
      color: red;
      font-weight: bold;
    }

    .view-more {
      display: block;
      text-align: center;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <div class="marquee-container">
    <div class="marquee-content">
      <div class="marquee-item">
       Moharam Function(17.07.2024)
        <span class="new-badge">NEW</span>
      </div>
      <div class="marquee-item">
        Independence day(15.08.2024)
        <span class="new-badge">NEW</span>
      </div>
    </div>
  </div>
  <a href="#" class="view-more">view more...</a>
</body>
</html>
