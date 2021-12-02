<?php
include_once "./databased.php";
if(isset($_SESSION['username'])){
  echo header ("Location: student/student.php");
}
$_SESSION['email'] = "";
$_SESSION['first'] = "";
$_SESSION['last'] = "";
$_SESSION['birth'] = "";
$_SESSION['city'] = "";
$_SESSION['address'] = "";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <title>E-COURSE</title>
    <link rel="icon" type="image/png" href="asset/favicon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https:/s.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="asset/style.css">
    <style>
      .find  {
        color: black;
      }
      .find:hover{
        color:darkblue;
      }
    </style>
  </head>
<body>
  <div class="container-fluid">
      <div
        class="row p-4"
        style="background: #5a47ab; width: 100%; left:0;"
      >
        <div class="row">
          <div class="col-sm-2" id="home">
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
                  <rect class="cls-1" x="409" y="173.5" width="64" height="36" />
                  <path
                    class="cls-1"
                    d="M1596.25,415.75H323.75C223.53,415.75,142,334.22,142,234S223.53,52.25,323.75,52.25h1272.5C1696.47,52.25,1778,133.78,1778,234S1696.47,415.75,1596.25,415.75ZM323.75,86.25C242.28,86.25,176,152.53,176,234s66.28,147.75,147.75,147.75h1272.5c81.47,0,147.75-66.28,147.75-147.75S1677.72,86.25,1596.25,86.25Z"
                    transform="translate(-142 -52.25)"
                  />
                </svg>
              </div>
            </div>
          </div>
          <div class="col-md-5 offset-4">
            <ul class="nav p-2">
              <li><a href="#home">Home</a></li>
              <li class="ms-4"><a href="#gallery">Gallery</a></li>
              <li class="ms-4"><a href="#testimony">Testimony</a></li>
            </ul>
          </div>
          <div class="col mt-2 login_logo">
            <a href="./Signin.php" "> 
              <svg
                id="Layer_1"
                data-name="Layer 1"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 1040.26 461.19"
              >
                <defs>
                  <style>
                    .cls-1-login {
                      fill: none;
                      stroke: #ffffff;
                      stroke-miterlimit: 10;
                      stroke-width: 20px;
                    }
                    .cls-2-login {
                      fill: #ffffff;
                    }
                  </style>
                </defs>
                <rect
                  class="cls-1-login"
                  x="10"
                  y="10"
                  width="1020.26"
                  height="441.19"
                  rx="97.28"
                />
                <path
                  class="cls-2-login"
                  d="M288.07,298.69h49.05v28.9H250.63V173.87h37.44Z"
                  transform="translate(-19.87 -39.4)"
                />
                <path
                  class="cls-2-login"
                  d="M378.4,321.68a56.12,56.12,0,0,1-22.56-21.9q-8.2-14.23-8.21-33.28,0-18.84,8.32-33.18a56.55,56.55,0,0,1,22.78-22,72.37,72.37,0,0,1,64.81,0,56.55,56.55,0,0,1,22.78,22q8.31,14.34,8.32,33.18t-8.43,33.17a57,57,0,0,1-23,22,68.7,68.7,0,0,1-32.51,7.66A67.44,67.44,0,0,1,378.4,321.68ZM429,289.05q7.56-7.87,7.56-22.55t-7.34-22.56a24.89,24.89,0,0,0-36.24-.11q-7.23,7.78-7.23,22.67,0,14.67,7.12,22.55a23,23,0,0,0,17.85,7.88A24.38,24.38,0,0,0,429,289.05Z"
                  transform="translate(-19.87 -39.4)"
                />
                <path
                  class="cls-2-login"
                  d="M563.65,208.91a38.72,38.72,0,0,1,15,13.79V205.4h37.44v122a68.66,68.66,0,0,1-6.68,30.55,51,51,0,0,1-20.36,21.79q-13.69,8.09-34,8.1-27.15,0-44-12.81t-19.27-34.71h37A17.73,17.73,0,0,0,537,351.35q6.57,4,16.21,4,11.6,0,18.5-6.68t6.9-21.35v-17.3A41.55,41.55,0,0,1,563.54,324q-9.64,5.37-22.55,5.36a50.1,50.1,0,0,1-27.38-7.77q-12.25-7.77-19.38-22.12t-7.11-33.17q0-18.84,7.11-33.07a53.23,53.23,0,0,1,19.38-21.9A50.69,50.69,0,0,1,541,203.65Q553.91,203.65,563.65,208.91Zm7.23,35.47a26.33,26.33,0,0,0-37.89-.11q-7.77,8-7.77,22T533,288.5a26.06,26.06,0,0,0,37.89.11q7.77-8.1,7.77-22.11T570.88,244.38Z"
                  transform="translate(-19.87 -39.4)"
                />
                <path
                  class="cls-2-login"
                  d="M646,186.9a18.81,18.81,0,0,1-6.24-14.34A19.07,19.07,0,0,1,646,158q6.24-5.79,16.09-5.8,9.64,0,15.88,5.8a19.07,19.07,0,0,1,6.24,14.57A18.81,18.81,0,0,1,678,186.9q-6.24,5.81-15.88,5.8Q652.23,192.7,646,186.9Zm34.71,18.5V327.59H643.24V205.4Z"
                  transform="translate(-19.87 -39.4)"
                />
                <path
                  class="cls-2-login"
                  d="M816.56,218q12.81,13.92,12.81,38.21v71.39H792.15V261.24q0-12.26-6.36-19.05t-17.08-6.79q-10.73,0-17.08,6.79t-6.35,19.05v66.35H707.84V205.4h37.44v16.21a39.59,39.59,0,0,1,15.33-12.81,48.74,48.74,0,0,1,21.68-4.71Q803.76,204.09,816.56,218Z"
                  transform="translate(-19.87 -39.4)"
                />
              </svg>
            </a>
          </div>
        </div>
        <div class="col-sm-5 p-5 mt-5" style="color: white;">
          <center>
            <h4 class="mt-3">Hello Students</h6>
            <h1 class="mt-3">Welcome to Education</h2>
            <div class="row">
              <div class=" col join_logo ">
                <a href="./Signin.php">
                  <p style="font-size:3vw; font-weight:bold;" class="aboutus">Join</p>
                </a>
              </div>
              <div class="col m-3">
                <a href="#aboutus"><p style="font-size:2vw; font-weight:bold;" class="aboutus">ABOUT US</p></a>
              </div>
            </div>
          
          </center>
        </div>
        <div class="col-sm-7 p-5" >
          <img src="asset/profile.jpg" alt="" style="width: 100%; border:white solid 10px; border-radius: 5px;">
        </div>
      </div>
      <div class="row p-5 mt-5">
        <div class="col-sm-6 offset-3">
          <center>
            <H4 style="color:#39229A;"">Why US ?</H4>
            <H5>Becasue our mission is to increase the language skill in English, because communication in a second language is needed in this digital era.</H5>
          </center>
        </div>
        <div class="row p-5 text-center">
          <div class="col-sm-4  mt-4 p-4">
            <img src="asset/gambar1.png" alt="" style="width: 100%;">
            <h4 class="mt-2" style="color:#39229A;">Best Teaching</h4>
            <h5>With materials taken from real day-to-day experience</h5>
          </div>
          <div class="col-sm-4 mt-2 p-4">
            <img src="asset/gambar2.png " alt="" style="width: 90%">
            <h4 style="color:#39229A;">Certified</h4>
            <h5>We deliver authorized certificate for our graduate </h5>
          </div>
          <div class="col-sm-4 mt-4 p-4">
            <img src="asset/gambar3.png" alt="" style="width: 60%"">
            <h4 class="mt-2" style="color:#39229A;">Best Material</h4>
            <h5> Guarenteed materials that you can get the best out of you!</h5>
          </div>
        </div>
        <div class="row text-center" id="gallery" >
          <div class="col-12">
            <h1 style="color:#39229A;">Gallery</h1>
          </div>
          <div class=" col offset-3 m-5">
            <div class="owl-carousel loop">
              <div> <img src="asset/1.jpg" alt="" style="width: 70%; margin:auto;"> </div>
              <div> <img src="asset/2.jpg" alt="" style="width: 70%; margin:auto;"></div>
              <div> <img src="asset/3.jpg" alt="" style="width: 70%; margin:auto;"> </div>
            </div>
        </div>
        <div class="row text-center" id="testimony">
          <h1 style="color:#39229A;">What They Say about us</h1>
          <div class="col p-5 text-center">
            <div class="owl-carousel testi">
              <div > 
                <img src="asset/testi1.jpg" alt="" style="width: 50%; margin:auto;"> 
                <h4 class="mt-2" style="color:#39229A;">Caitlyn</h4>
                <h5>"My English improved a lot after joining E-Course"</h5>
              </div>
              <div> 
                <img src="asset/2.jpg" alt="" style="width: 50%; margin:auto;">
                <h4 class="mt-2" style="color:#39229A;">Young B</h4>
                <h5>"Practicing with my friends sure helped me a lot" </h5>
              </div>
              <div> 
                <img src="asset/3.jpg" alt="" style="width: 50%; margin:auto;">
                <h4 class="mt-2" style="color:#39229A;">Mario</h4>
                <h5>"Tutorial that always can be played back"</h5>
               </div>
            </div>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col-sm-4 text-end ms-4" id="aboutus">
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
                    <rect class="cls-1" x="409" y="173.5" width="64" height="36" />
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
              <H6>
              One mission, Becoming your english solution
            </H6>
            </div>
          </div>
          <div class="col offset-3" style="font-size:3vw">
            <div class="col-sm-5">
              <h2 style="color:#39229A;">Find us on</h2>
            </div>
            <div class="col-sm-5">
              <a class="find" href=""><i class="fab size-7 fa-linkedin"></i></a> 
              <a class="find" href=""><i class="fab fa-twitter-square"></i></a>
              <a class="find" href=""><i class="fab fa-facebook-square"></i></a>
              <a class="find" href=""><i class="fab fa-instagram-square"></i></a>
            </div>
          </div>
        </div>
      </div>
      <script>
        $('.loop').owlCarousel({
            center: true,
            loop:true,
            margin:10,
            autoplay:true,
            autoplayTimeout:5000,
            responsive:{
                600:{
                    items:1
                }
            }
        });
        $('.testi').owlCarousel({
            center: true,
            items:2,
            loop:true,
            margin:20,
            autoplay:true,
            autoplayTimeout:7000,
            responsive:{
                100:{
                    items:2
                },
                600:{
                    items:2
                }
            }
        });
    </script>

  </div>
    <script src="https://kit.fontawesome.com/1ee3078536.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
</body>
</html>
