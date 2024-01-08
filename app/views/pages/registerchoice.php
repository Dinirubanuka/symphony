<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Musical Website</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700&display=swap"
      rel="stylesheet"
    />
    <style>
 @import url('https://fonts.googleapis.com/css?family=Open+Sans:300,400,800');

@media (min-width: 500px) {
  .col-sm-6 {
    width: 50%;
  }
}
html, body {
  height: 100%;
  min-height: 18em;
}

.frontend-side {
  background-image: url(<?php echo Login01; ?>);
}

.uiux-side {
  background-image: url(<?php echo Login02; ?>);
}

.frontend-side:hover {
  transform: scale(1.1);
}

.uiux-side:hover {
  transform: scale(1.1);
}

.split-pane {
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center center;
  width: 50%; /* Set the width to 50% to split horizontally */
  font-size: 2em;
  color: white;
  font-family: 'Open Sans', sans-serif;
  font-weight: 300;
  float: left;
}
@media(min-width: 500px) {
  .split-pane {
    padding-top: 2em;
    height: 100%;
  }
}
.split-pane > div {
  position: relative;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
  text-align: center;
}
.split-pane > div .text-content {
  line-height: 1.6em;
  margin-bottom: 1em;
}
.split-pane > div .text-content .big {
  font-size: 2em;
}
.split-pane > div img {
  height: 1.3em;
}
@media (max-width: 500px) {
  .split-pane > div img {
    display:none;
  }
}
.split-pane button, .split-pane a.button {
  font-family: 'Open Sans', sans-serif;
	font-weight:800;
  background: none;
  border: 1px solid white;
  -moz-border-radius: 5px;
  -webkit-border-radius: 5px;
  border-radius: 5px;
  width: 15em;
  padding: 0.7em;
  font-size: 0.5em;
  -moz-transition: all 0.2s ease-out;
  -o-transition: all 0.2s ease-out;
  -webkit-transition: all 0.2s ease-out;
  transition: all 0.2s ease-out;
  text-decoration: none;
  color: white;
  display: inline-block;
	cursor: pointer;
}
.split-pane button:hover, .split-pane a.button:hover {
  text-decoration: none;
  background-color: white;
  border-color: white;
	cursor: pointer;
}
.uiux-side.split-pane button:hover, .split-pane a.button:hover {
  color: violet;
}
.frontend-side.split-pane button:hover, .split-pane a.button:hover {
  color: blue;
}

#split-pane-or {
  font-size: 2em;
  color: white;
  font-family: 'Open Sans', sans-serif;
  text-align: center;
  width: 100%;
  position: absolute;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
}
@media (max-width: 925px) {
  #split-pane-or {
    top:15%;
  }
}
#split-pane-or > div img {
  height: 2.5em;
}
@media (max-width: 500px) {
  #split-pane-or {
    position: absolute;
    top: 50px;
  }
  #split-pane-or > div img {
    height:2em;
  }
}
@media(min-width: 500px) {
  #split-pane-or {
    font-size: 3em;
  }
}
.big {
  font-size: 2em;
}

#slogan {
  position: absolute;
  width: 100%;
  z-index: 100;
  text-align: center;
  vertical-align: baseline;
  top: 0.5em;
  color: white;
  font-family: 'Open Sans', sans-serif;
  font-size: 1.4em;
}
@media(min-width: 500px) {
  #slogan {
    top: 5%;
    font-size: 1.8em;
  }
}
#slogan img {
  height: 0.7em;
}
.bold {
	text-transform:uppercase;
}
.big {
	font-weight:800;
}
  
    </style>
</head>
<body>
<div class='split-pane col-xs-12 col-sm-6 uiux-side'>
  <div>
    <div class='text-content'>
      <div class="bold">Are you a</div>
      <div class='big'>SERVICE PROVIDER?</div>
    </div>
    <button onclick="window.location.href='<?php echo URLROOT; ?>/serviceproviders/serviceproviderregister';">
      REGISTER AS A SERVICE PROVIDER
    </button>
  </div>
</div>
<div class='split-pane col-xs-12 col-sm-6 frontend-side'>
  <div>
    <div class='text-content'>
      <div class="bold">Are you a</div>
      <div class='big'>CUSTOMER?</div>
    </div>
    <button onclick="window.location.href='<?php echo URLROOT; ?>/users/register';">
      REGISTER AS A CUSTOMER
    </button>
  </div>
</div>
<div id='split-pane-or'>
  <div>
    <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/74452/bcr-white.png'>
  </div>
</div>
</body>
</html>