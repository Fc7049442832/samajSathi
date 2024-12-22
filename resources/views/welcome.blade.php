<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blur Background</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: url('https://via.placeholder.com/1920x1080') no-repeat center center/cover; /* Replace with your image URL */
    }

    /* Parent div */
    .container {
      position: relative;
      width: 400px;
      height: 300px;
      display: flex;
      justify-content: center;
      align-items: center;
      overflow: hidden;
      border-radius: 15px;
    }

    /* Pseudo-element for the blurred background */
    .container::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: inherit; /* Inherits the background of the parent (body) */
      filter: blur(15px); /* Adjust the blur amount */
      z-index: 1; /* Layer behind the content */
    }

    /* Content div */
    .content {
      position: relative;
      z-index: 2; /* Content above the blurred background */
      background: rgba(255, 255, 255, 0.8); /* Semi-transparent background */
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="content">
      <h3>Form</h3>
      <form>
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br><br>
        <button type="submit">Submit</button>
      </form>
    </div>
  </div>
</body>
</html>
