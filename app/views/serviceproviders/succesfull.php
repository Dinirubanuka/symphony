<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Title</title>
  <style>
    body{
      margin: auto;
      /*width: 40%;*/
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background: linear-gradient(90deg, rgba(47,7,68,1) 32%, rgba(95,12,110,1) 100%);
    }
    .box{
      background: #FFFFFF;
      border: 1px solid #ccc;
      /*width: 50%;*/
      padding: 2% 5%;
      display: flex;
      flex-direction: column;
      align-items: center;
      box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    }
    button {
      font-family: "Roboto", sans-serif;
      text-transform: uppercase;
      outline: 0;
      background: linear-gradient(90deg, rgba(47,7,68,1) 15%, rgba(128,58,152,1) 55%, rgba(64,7,84,1) 89%);
      width: 100%;
      border: 0;
      padding: 10px;
      color: #FFFFFF;
      font-size: 14px;
      cursor: pointer;
      margin:10px 0;
    }
    button:hover{
      background: rgb(47,7,68);
    }
    input {
      margin: 0 5px;
      text-align: center;
      line-height: 30px;
      font-size: 20px;
      border: solid 1px #ccc;
      box-shadow: 0 0 5px #ccc inset;
      outline: none;
      transition: all .2s ease-in-out;
      border-radius: 3px;

      &:focus {
        border-color: purple;
        box-shadow: 0 0 5px purple inset;
      }

      &::selection {
        background: transparent;
      }
    }
    .invalid-feedback{
      color: red;
    }
  </style>
</head>
<body>
<div class="box">
  <h1>Registration successfull</h1>
  <button><a href="<?php echo URLROOT; ?>/serviceproviders/login" style="color:#cccccc;text-decoration: none">login</a></button>
</div>

</body>
</html>