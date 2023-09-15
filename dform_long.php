<!DOCTYPE html>
<html>

<head>
  <title>Form Submission</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://fonts.cdnfonts.com/css/metropolis-2" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>


  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
  <title>E-Survey</title>
  <link rel="icon" href="./Assets/fav.png" type="image/png">

  <link rel="stylesheet" type="text/css" href="./styles.css" />
  <style>
    .full-width-textarea,
    .full-width-textarea:active,
    .full-width-textarea:focus {
      width: 100%;
      padding: 1% 2%;
      border: 1px solid #0081fa;
      outline: 1px solid #0081fa;
    }

    sup {
      color: #ff0000;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="./Assets/tapLogo.png" alt="Logo" width="150" height="40" />
      </a>
      <a href="./admin.html">
        <button class="btn btn-primary px-3">Admin Login</button>
      </a>
    </div>
  </nav>
  <div class="mt-5 pt-5">

  </div>
  <div class="container mt-5 mb-5 px-5">
    <div class="row mx-4">
      <div class="col-md-12 px-5">
        <h3 class="lightblue">Test Case 03</h3>
        <p class="">
          Lorem Ipsum is simply dummy text of the printing and typesetting
          industry. Lorem Ipsum has been the industry's standard dummy text
          ever since the 1500s, when an unknown printer took a galley of type
          and scrambled it to make a type specimen book
        </p>
        <div class="container mt-5">
          <form class="row form gx-5" action="dform_db_long.php" method="post" styles="margin-top:0px">
            <div class="col-12 pb-4">
              <p>01) Que 01</p>
              <sup>* Sample</sup>
              <textarea name="textarea1" class="full-width-textarea"></textarea>
            </div>
            <div class="col-12 pb-4">
              <p>02) Que 01</p>
              <sup>* Sample</sup>
              <textarea name="textarea2" class="full-width-textarea"></textarea>
            </div>
            <div class="col-12 pb-4">
              <p>03) Que 01</p>
              <textarea name="textarea3" class="full-width-textarea"></textarea>
            </div>
            <div class="col-12 pb-4">
              <p>04) Que 01</p>
              <sup>* Sample</sup>
              <textarea name="textarea4" class="full-width-textarea"></textarea>
            </div>


            <div class="col-md-4"></div>
            <div class="col-md-4 text-center">
              <button type="submit" name="send" class="btn btn-primary px-5">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>