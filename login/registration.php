<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="registration.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">Post an selling ad</div>
    <div class="content">
      <form action="connect.php" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" placeholder="Enter your email" name="email" required/>
          </div>
          <div class="input-box">
            <span class="details">Property Type</span>
            <input type="text" placeholder="(i.e. flat, club, court)" name="type" required/>
          </div>
          <div class="input-box">
            <span class="details">House No.</span>
            <input type="text" placeholder="Enter house no." name="house" required>
          </div>
          <div class="input-box">
            <span class="details">Road No./Name</span>
            <input type="text" placeholder="Enter your road" name="road" required>
          </div>
          <div class="input-box">
            <span class="details">Area/City</span>
            <input type="int" placeholder="Enter your property placement" name="place" required>
          </div>
          <div class="input-box">
            <span class="details">Size</span>
            <input type="text" placeholder="Enter your property size (in sq ft)" name="size" required>
          </div>
          <div class="input-box">
            <span class="details">Asking price</span>
            <input type="text" placeholder="Price in BDT" name="price" required>
          </div>
        <div class="button">
          <input type="submit" value="Post ad!" name = "submit">
        </div>
      </form>
    </div>
  </div>
</body>
</html>