<?php
include_once "./databased.php";
if (isset($_SESSION['username'])) {
  echo header("location: student/student.php");
}
if (isset($_GET['error'])) {
  $_error = $_GET['error'];
} else {
  $_error = 0;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <title>E-COURSE</title>
  <link rel="icon" type="image/png" href="asset/favicon.png">
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <link rel="stylesheet" href="https:/s.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <link rel="stylesheet" href="asset/style.css" />
  <style>
    html {
      scroll-behavior: smooth;
      font-family: "Manrope", sans-serif;
    }

    label {
      width: 100px;
    }

    .alert {
      display: none;
    }

    .requirements {
      list-style-type: none;
    }

    .wrong .fa-check {
      display: none;
    }

    .good .fa-times {
      display: none;
    }
  </style>
</head>

<body>
  <div class="container-fluid">
    <div class="row" style="border:#5A47AB solid 1px; height:100vh;">
      <div class="col p-4">
        <div class="col">
          <!-- /////////////////////////////////////////////////////////////////////////////////// -->

          <div class="col-sm-4 text-end ms-4">
            <a href="index.php">
              <div class="col-10 offset-2">
                <div class="icon mt-0">
                  <div class="ecourse">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1636 363.5">
                      <defs>
                        <style>
                          .cls-1 {
                            fill: #00c2cb;
                          }
                        </style>
                      </defs>
                      <path class="cls-1" d="M375.93,284.21h74.5v24.64H352.55V138.34H450.2V163H375.93V211h72.66v24.88H375.93Z" transform="translate(-142 -52.25)" />
                      <path class="cls-1" d="M731,162.73c14-15.36,33.7-25.36,55.48-25.36,36.67,0,65.56,24.39,74.73,62.93H838.28c-8.48-25.61-28.19-38.54-51.8-38.54-15.36,0-29.35,7.07-39.43,18.29a66,66,0,0,0,0,87.33c10.08,11.22,24.07,18.29,39.43,18.29,24.29,0,44.93-14.88,53.18-40.73h22.69c-9.17,38.78-38.51,65.13-75.87,65.13-21.78,0-41.5-9.76-55.48-25.37a92.59,92.59,0,0,1,0-122Z" transform="translate(-142 -52.25)" />
                      <path class="cls-1" d="M901.78,161.76c14.67-15.86,35.3-25.86,57.76-25.86,22.7,0,43.1,10,58,25.86a91.8,91.8,0,0,1,0,123.43c-14.9,16.1-35.3,25.85-58,25.85a78,78,0,0,1-57.76-25.85,91.8,91.8,0,0,1,0-123.43ZM1001,179.32c-10.78-11.46-25.68-18.54-41.5-18.54s-30.48,7.08-41,18.54a65.29,65.29,0,0,0,0,88.3c10.55,11.47,25.22,18.54,41,18.54s30.72-7.07,41.5-18.54a65.95,65.95,0,0,0,0-88.3Z" transform="translate(-142 -52.25)" />
                      <path class="cls-1" d="M1064.53,257.62V138.34h23.38V257.87c0,18.78,19,28.05,36,28.05,16.73,0,35.76-9.52,35.76-28.3V138.34H1183V257.87c0,34.63-31.63,52.68-59.14,52.68C1095.7,310.55,1064.53,292.5,1064.53,257.62Z" transform="translate(-142 -52.25)" />
                      <path class="cls-1" d="M1239,222.25h27c19.49,0,29.11-14.88,29.11-29.76,0-14.63-9.62-29.51-29.11-29.51h-35.53V308.85h-22.92V138.1H1266c34.84,0,52.27,27.32,52.27,54.39,0,24.15-14,47.08-41.5,52.2l50.67,64.16h-30L1239,234Z" transform="translate(-142 -52.25)" />
                      <path class="cls-1" d="M1424,182.25c-3.21-15.37-18.8-21.95-32.78-21.71-10.78.24-22.7,4.15-29.11,12.93-3.21,4.39-4.36,10-3.9,15.85,1.14,17.57,19.25,19.76,36.45,21.47,22,2.93,49.28,9,55.47,36.34a64.25,64.25,0,0,1,1.15,11.22c0,32.93-30.72,52-59.6,52-24.76,0-54.79-15.61-57.77-46.1l-.23-4.64,23.38-.48.23,3.66v-1c1.61,15.85,19.71,24.15,34.62,24.15,17.19,0,36-10.25,36-27.81a28.74,28.74,0,0,0-.68-5.85c-2.75-12.93-19.26-15.13-35.3-16.83-25-2.69-54.33-8.54-56.85-44.16v.25a48.27,48.27,0,0,1,8.71-32.44c10.77-14.88,30-22.69,48.59-22.69,24.76,0,50.43,13.66,54.56,44.88Z" transform="translate(-142 -52.25)" />
                      <path class="cls-1" d="M1494.1,284.21h74.5v24.64h-97.88V138.34h97.65V163H1494.1V211h72.67v24.88H1494.1Z" transform="translate(-142 -52.25)" />
                      <rect class="cls-1" x="409" y="173.5" width="64" height="36" />
                      <path class="cls-1" d="M1596.25,415.75H323.75C223.53,415.75,142,334.22,142,234S223.53,52.25,323.75,52.25h1272.5C1696.47,52.25,1778,133.78,1778,234S1696.47,415.75,1596.25,415.75ZM323.75,86.25C242.28,86.25,176,152.53,176,234s66.28,147.75,147.75,147.75h1272.5c81.47,0,147.75-66.28,147.75-147.75S1677.72,86.25,1596.25,86.25Z" transform="translate(-142 -52.25)" />
                    </svg>
                  </div>
                </div>
              </div>
            </a>
          </div>
          <!-- /////////////////////////////////////////////////////////////////////////////////// -->
          <div>
            <?php
            if ($_error == 1) {
              $login = "hide";
              $regist = "";
              $emailerror = "";
              $passworderr = "hide";
              $validAge = "hide";
            } else if ($_error == 2) {
              $login = "hide";
              $regist = "";
              $emailerror = "hide";
              $passworderr = "";
              $password_sec_err = "hide";
              $validAge = "hide";
            } else if ($_error == 3) {
              $login = "hide";
              $regist = "";
              $emailerror = "hide";
              $passworderr = "hide";
              $password_sec_err = "";
              $validAge = "hide";
            } else if ($_error == 12) {
              $login = "";
              $regist = "hide";
              $emailerror = "hide";
              $passworderr = "hide";
              $emailerrorlog = "";
              $password_sec_err = "hide";
              $validAge = "hide";
            } else if ($_error == 4) {
              $login = "hide";
              $regist = "";
              $emailerror = "hide";
              $passworderr = "hide";
              $emailerrorlog = "hide";
              $password_sec_err = "hide";
              $validAge = "";
            } else {
              $login = "";
              $regist = "hide";
              $emailerror = "hide";
              $passworderr = "hide";
              $emailerrorlog = "hide";
              $password_sec_err = "hide";
              $validAge = "hide";
            }
            ?>
          </div>
          <!-- ///////////////////////////////////////////////////////////////////////////////// -->
          <div class="p-5 <?php echo $login ?>" id="loginform" style="height: 100%; height:20vh;">
            <div class="text-center" style="color: #39229a">
              <h1>Sign In</h1>
            </div>
            <form action="./Manage/Login.php" method="POST">
              <div class="form-group mb-4">
                <input type="text" class="form-control" id="email" name="email" placeholder="Enter email" />
              </div>
              <div class="form-group mb-4">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" />
              </div>
              <div>
                <center>
                  <button type="submit" class="btn btn-primary" style="background: #39229a">
                    <span style="padding-left: 2em; padding-right: 2em ;">Sign in</span>
                  </button>
                </center>
              </div>
            </form>
            <div class="text-center mt-4">
              <span>Don't have an account</span>
              <div class="mt-3">
                <button type="submit" id="reg_button" class="btn btn-primary" style="background: #39229a">
                  <span style="padding-left: 2em; padding-right: 2em;" onclick="registbutton()">Register</span>
                </button>
              </div>
              <div class="mt-4 p-3 <?php echo $emailerrorlog ?>">
                <div class="col p-2" style="border-radius:5px; background:#f8d7da;">
                  <span class="m-2" style="color:#842029;">Check Your Password or Your Email</span>
                </div>
              </div>
            </div>
          </div>
          <!-- ///////////////////////////////////////////////////////////////////////////////////////// -->
          <div class="p-5 <?php echo $regist ?>" id="registform">
            <div class="" style="color: #39229a">
              <div class="row">
                <button class="col-sm-1" style="border: none; background: none; " onclick="loginbutton()">
                  <span style="color:#39229a; font-size: 2em;">
                    <i class="fa fa-backward" aria-hidden="true"></i>
                  </span>
                </button>
                <h1 class="text-center col">Registration</h1>
              </div>
              <form name="mail" action="./manage/Register.php" method="POST" class="needs-validation" novalidate>
                <div class="row mt-3">
                  <div class="col">
                    <input type="text" class="form-control" value="<?php echo $_SESSION['first'] ?>" id="firstname" name="firstname" placeholder="First name" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                  </div>
                  <div class="col">
                    <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $_SESSION['last'] ?>" placeholder="Last name" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                  </div>
                  <div class="row mt-2">
                    <div class="col">
                      <input type="text" class="form-control" id="address" value="<?php echo $_SESSION['address'] ?>" name="address" placeholder="Address" required>
                      <div class="valid-feedback">Valid.</div>
                      <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class="col">
                      <input type="date" class="form-control" id="birthdate" value="<?php echo $_SESSION['birth'] ?>" name="birthdate" placeholder="Birthdate" required>
                    </div>
                    <div class="col">
                      <input type="text " class="form-control" id="city" value="<?php echo $_SESSION['city'] ?>" name="city" placeholder="City" required>
                      <div class="valid-feedback">Valid.</div>
                      <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class="col">
                      <input type="email" class="form-control" value="<?php echo $_SESSION['email'] ?>" id="email" name="email" placeholder="Email" required>
                      <div class="valid-feedback">Valid.</div>
                      <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                  </div>

                  <div class="row mt-2">
                    <div class="col">
                      <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                      <div class="alert alert-warning password-alert" role="alert">
                        <ul>
                          <li class="requirements leng"><i class="fas fa-check green-text"></i><i class="fas fa-times red-text"></i> Your password must have at least 8 chars.</li>
                          <li class="requirements big-letter"><i class="fas fa-check green-text"></i><i class="fas fa-times red-text"></i> Your password must have at least 1 big letter.</li>
                          <li class="requirements num"><i class="fas fa-check green-text"></i><i class="fas fa-times red-text"></i> Your password must have at least 1 number.</li>
                          <li class="requirements special-char"><i class="fas fa-check green-text"></i><i class="fas fa-times red-text"></i> Your password must have at least 1 special char.</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class="col">
                      <input type="password" class="form-control" id="password_second" name="password_second" placeholder="Password" required>
                      <div class="alert alert-warning password-alert-second" role="alert">
                        <ul>
                          <li class="requirements check"><i class="fas fa-check green-text"></i><i class="fas fa-times red-text"></i> Your password must have at least 1 special char.</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row ms-2 mt-2">
                  <div class="col" style="font-size:1vw;">
                    By clicking Regist In, you agree to our <a href="" style="color:#39229a; text-decoration:underline;"> Terms, Data Policy and Cookie Policy. </a> You may receive SMS notifications from us and can opt out at any time.
                  </div>
                </div>
                <div class="text-center mt-4">
                  <button type="submit" id="reg_button" class="btn btn-primary" style="background: #39229a">
                    <span style="padding-left: 2em; padding-right: 2em;" onclick="">Regist in</span>
                  </button>
                </div>
              </form>
              <div class="mt-4 p-3 <?php echo $emailerror ?>">
                <div class="col p-2" style="border-radius:5px; background:#f8d7da;">
                  <span class="m-2" style="color:#842029;">EMAIL ALREADY IN USE</span>
                </div>
              </div>
              <div class="mt-4 p-3 <?php echo $passworderr ?>">
                <div class="col p-2" style="border-radius:5px; background:#f8d7da;">
                  <span class="m-2" style="color:#842029;">PLEASE USE OUR PASSWORD GUIDELINES</span>
                </div>
              </div>
              <div class="mt-4 p-3 <?php echo $password_sec_err ?>">
                <div class="col p-2" style="border-radius:5px; background:#f8d7da;">
                  <span class="m-2" style="color:#842029;">PLEASE CHECK YOUR PASSWORD AGAIN</span>
                </div>
              </div>
              <div class="mt-4 p-3 <?php echo $validAge ?>">
                <div class="col p-2" style="border-radius:5px; background:#f8d7da;">
                  <span class="m-2" style="color:#842029;">YOU MUST 18 YEARS TO JOIN</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col" style="background:#311996;">
        <img src="asset/login.png" alt="" style="width: 100%; margin-top:20vh;">
      </div>
    </div>

    <!-- <div class="row p-5">
        <div class="col">
          <div class="col text-end ms-4">
            <div class="col-10 offset-2">
              <div class="icon mt-0">
                <div class="ecourse">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 1636 363.5"
                  >
                    <defs>
                      <style>
                        .cls-1 {
                          fill: #00c2cb;
                        }
                      </style>
                    </defs>
                    <path
                      class="cls-1"
                      d="M375.93,284.21h74.5v24.64H352.55V138.34H450.2V163H375.93V211h72.66v24.88H375.93Z"
                      transform="translate(-142 -52.25)"
                    />
                    <path
                      class="cls-1"
                      d="M731,162.73c14-15.36,33.7-25.36,55.48-25.36,36.67,0,65.56,24.39,74.73,62.93H838.28c-8.48-25.61-28.19-38.54-51.8-38.54-15.36,0-29.35,7.07-39.43,18.29a66,66,0,0,0,0,87.33c10.08,11.22,24.07,18.29,39.43,18.29,24.29,0,44.93-14.88,53.18-40.73h22.69c-9.17,38.78-38.51,65.13-75.87,65.13-21.78,0-41.5-9.76-55.48-25.37a92.59,92.59,0,0,1,0-122Z"
                      transform="translate(-142 -52.25)"
                    />
                    <path
                      class="cls-1"
                      d="M901.78,161.76c14.67-15.86,35.3-25.86,57.76-25.86,22.7,0,43.1,10,58,25.86a91.8,91.8,0,0,1,0,123.43c-14.9,16.1-35.3,25.85-58,25.85a78,78,0,0,1-57.76-25.85,91.8,91.8,0,0,1,0-123.43ZM1001,179.32c-10.78-11.46-25.68-18.54-41.5-18.54s-30.48,7.08-41,18.54a65.29,65.29,0,0,0,0,88.3c10.55,11.47,25.22,18.54,41,18.54s30.72-7.07,41.5-18.54a65.95,65.95,0,0,0,0-88.3Z"
                      transform="translate(-142 -52.25)"
                    />
                    <path
                      class="cls-1"
                      d="M1064.53,257.62V138.34h23.38V257.87c0,18.78,19,28.05,36,28.05,16.73,0,35.76-9.52,35.76-28.3V138.34H1183V257.87c0,34.63-31.63,52.68-59.14,52.68C1095.7,310.55,1064.53,292.5,1064.53,257.62Z"
                      transform="translate(-142 -52.25)"
                    />
                    <path
                      class="cls-1"
                      d="M1239,222.25h27c19.49,0,29.11-14.88,29.11-29.76,0-14.63-9.62-29.51-29.11-29.51h-35.53V308.85h-22.92V138.1H1266c34.84,0,52.27,27.32,52.27,54.39,0,24.15-14,47.08-41.5,52.2l50.67,64.16h-30L1239,234Z"
                      transform="translate(-142 -52.25)"
                    />
                    <path
                      class="cls-1"
                      d="M1424,182.25c-3.21-15.37-18.8-21.95-32.78-21.71-10.78.24-22.7,4.15-29.11,12.93-3.21,4.39-4.36,10-3.9,15.85,1.14,17.57,19.25,19.76,36.45,21.47,22,2.93,49.28,9,55.47,36.34a64.25,64.25,0,0,1,1.15,11.22c0,32.93-30.72,52-59.6,52-24.76,0-54.79-15.61-57.77-46.1l-.23-4.64,23.38-.48.23,3.66v-1c1.61,15.85,19.71,24.15,34.62,24.15,17.19,0,36-10.25,36-27.81a28.74,28.74,0,0,0-.68-5.85c-2.75-12.93-19.26-15.13-35.3-16.83-25-2.69-54.33-8.54-56.85-44.16v.25a48.27,48.27,0,0,1,8.71-32.44c10.77-14.88,30-22.69,48.59-22.69,24.76,0,50.43,13.66,54.56,44.88Z"
                      transform="translate(-142 -52.25)"
                    />
                    <path
                      class="cls-1"
                      d="M1494.1,284.21h74.5v24.64h-97.88V138.34h97.65V163H1494.1V211h72.67v24.88H1494.1Z"
                      transform="translate(-142 -52.25)"
                    />
                    <rect
                      class="cls-1"
                      x="409"
                      y="173.5"
                      width="64"
                      height="36"
                    />
                    <path
                      class="cls-1"
                      d="M1596.25,415.75H323.75C223.53,415.75,142,334.22,142,234S223.53,52.25,323.75,52.25h1272.5C1696.47,52.25,1778,133.78,1778,234S1696.47,415.75,1596.25,415.75ZM323.75,86.25C242.28,86.25,176,152.53,176,234s66.28,147.75,147.75,147.75h1272.5c81.47,0,147.75-66.28,147.75-147.75S1677.72,86.25,1596.25,86.25Z"
                      transform="translate(-142 -52.25)"
                    />
                  </svg>
                </div>
              </div>
            </div>
            <div class="pt-4">
              <h6>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent
                porttitor velit ut lobortis congue. Maecenas in facilisis ipsum.
                Integer non consectetur libero.
              </h6>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="col offset-3" style="font-size: 3vw;">
            <div class="col-sm-5">
              <h2 style="color: #39229a">Find us on</h2>
            </div>
            <div class="col-sm-5">
              <i class="fab size-7 fa-linkedin"></i>
              <i class="fab fa-twitter-square"></i>
              <i class="fab fa-facebook-square"></i>
              <i class="fab fa-instagram-square"></i>
            </div>
          </div>
        </div>
      </div> -->
  </div>
  <script type="text/javascript">
    $(function() {
      $('#datetimepicker1').datetimepicker();
    });
  </script>
  <script>
    function registbutton() {
      var elementreg = document.getElementById("registform");
      var elementlog = document.getElementById("loginform");
      elementlog.classList.add("hide");
      elementreg.classList.remove("hide");
    }

    function loginbutton() {
      var elementreg = document.getElementById("registform");
      var elementlog = document.getElementById("loginform");
      elementreg.classList.add("hide");
      elementlog.classList.remove("hide");
    }
  </script>
  <script src="https://kit.fontawesome.com/1ee3078536.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script>
    // Disable form submissions if there are invalid fields
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        // Get the forms we want to add validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
  </script>
  <script>
    function ValidateEmail(inputText) {
      var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
      if (inputText.value.match(mailformat)) {
        alert("Valid email address!");
        document.form1.text1.focus();
        return true;
      } else {
        alert("You have entered an invalid email address!");
        document.form1.text1.focus();
        return false;
      }
    }
  </script>


  <script>
    $(function() {
      var $password = $(".form-control[id='password']");
      var $passwordAlert = $(".password-alert");
      var $requirements = $(".requirements");
      var leng, bigLetter, num, specialChar;
      var $leng = $(".leng");
      var $bigLetter = $(".big-letter");
      var $num = $(".num");
      var $specialChar = $(".special-char");
      var specialChars = "!@#$%^&*()-_=+[{]}\\|;:'\",<.>/?`~";
      var numbers = "0123456789";




      $requirements.addClass("wrong");
      $password.on("focus", function() {
        $passwordAlert.show();
      });

      $password.on("input blur", function(e) {
        var el = $(this);
        var val = el.val();
        $passwordAlert.show();

        if (val.length < 8) {
          leng = false;
        } else if (val.length > 7) {
          leng = true;
        }


        if (val.toLowerCase() == val) {
          bigLetter = false;
        } else {
          bigLetter = true;
        }

        num = false;
        for (var i = 0; i < val.length; i++) {
          for (var j = 0; j < numbers.length; j++) {
            if (val[i] == numbers[j]) {
              num = true;
            }
          }
        }

        specialChar = false;
        for (var i = 0; i < val.length; i++) {
          for (var j = 0; j < specialChars.length; j++) {
            if (val[i] == specialChars[j]) {
              specialChar = true;
            }
          }
        }

        console.log(leng, bigLetter, num, specialChar);

        if (leng == true && bigLetter == true && num == true && specialChar == true) {
          $(this).addClass("valid").removeClass("invalid");
          $requirements.removeClass("wrong").addClass("good");
          $passwordAlert.removeClass("alert-warning").addClass("alert-success");
        } else {
          $(this).addClass("invalid").removeClass("valid");
          $passwordAlert.removeClass("alert-success").addClass("alert-warning");

          if (leng == false) {
            $leng.addClass("wrong").removeClass("good");
          } else {
            $leng.addClass("good").removeClass("wrong");
          }

          if (bigLetter == false) {
            $bigLetter.addClass("wrong").removeClass("good");
          } else {
            $bigLetter.addClass("good").removeClass("wrong");
          }

          if (num == false) {
            $num.addClass("wrong").removeClass("good");
          } else {
            $num.addClass("good").removeClass("wrong");
          }

          if (specialChar == false) {
            $specialChar.addClass("wrong").removeClass("good");
          } else {
            $specialChar.addClass("good").removeClass("wrong");
          }
        }


        if (e.type == "blur") {
          $passwordAlert.hide();
        }
      });
    });
  </script>
</body>

</html>