  <?php
  session_start();
  ?>
  <!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <!-- meta http-equiv="X-Frame-Options" content="deny" -->
      <title>Testing</title>
      <link rel = "stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=PT+Sans|Roboto">
      <link rel = "stylesheet" type="text/css" href="style.css">
      <style>
       .Product{
        width: 400px;
        height: 400px;
        float: left;
        margin: 0 20px 10px 10px;
        border: 2px solid white;

      }
      .Catalogue{
        display: inline-block;
        text-align: left;
        margin-left: 25%;    
      }
      .description{
        display: inline-block;
        text-align: left;
        margin-left: 25%;
        color: white;
        margin-top: 0px;
      }
        .remove{
        background-color:#6F0E0E;
        color: white;
        -webkit-transition-duration: 0.4s;
        transition-duration:0.4s;
        border-radius: 8px;
        padding: 14px 40px;
        border: 2px solid white;
        cursor: pointer;
      }
      .size, .quantity{
        background-color: #6F0E0E;
        color: white;
        border-radius:8px;
        padding: 5px 10px;
        border: 2px solid white;
      }
      .remove:hover{
        background-color: white;
        color: #6F0E0E;
        font-size:16px;
      }
      .table{
        margin:0 auto;
        color: white;
        margin-left: 25%;
        width: 50%;
      }
            .stylebutton{
      margin-left: auto;
      background-color:#6F0E0E;
      color: white;
      -webkit-transition-duration: 0.4s;
      transition-duration:0.4s;
      border-radius: 8px;
      padding: 14px 40px;
      border: 3px solid white;
    }
    .stylebutton:hover {
    background-color: white; 
    color: #6F0E0E;
    font-size: 20px;
    cursor: pointer;
    }
      table{
        margin:0 auto;
        color:white;
        border-spacing: 10px;
      }
      th, td{
        border-spacing: 10px 10px;
        width: 100px;
      }
      </style>
    </head>
    <header>
         <img src="munchieasia.jpg">
       <nav>
      <ul>
          <li><a href="index.html"><button class = "navigation">HOME</button></a></li>
          <li><a href="product.html" class = "selected"><button class = "navigation">PRODUCTS</button></a></li>
          <li><a href="aboutus.html"><button class = "navigation">ABOUT US</button></a></li>
          <li><a href="contactus.html"><button class = "navigation">CONTACT US</button></a></li>
          <li><a href="survey.html"><button class = "navigation">POLL/SURVEY</button></a></li>
        </ul>
      </nav>
    </header>
  <main>

    <body>

  <?php
  $Country = null;
  $i = 0;

  if (isset($_POST["remove"])){
    $count = $_POST["remove"];
    unset($_SESSION['cart'][$count]);
  }

  if (isset ($_POST["AddCart"])) {
    $booking = array (
      "size" => $_POST["size"],
      "Price" => $_POST["SA-span1"],
  );
    $tickets = array (
      "price" => (int) $_POST["SA"],
  );



  $subPrice =null;

  foreach ($tickets as $key => $value) {
    if ($value === 0) {
      unset($tickets[$key]);
    }
  }


  $booking ["tickets"] = $tickets;

  $_SESSION["cart"][] = $booking;

  }
  ?>
  <h1> Cart </h1>
  <hr>

  <?php
  $grandTotal=null;

  if (!isset ($_SESSION["cart"]) || count($_SESSION["cart"]) === 0)
  {
    echo "The cart is empty";
  }

  else {
    foreach ($_SESSION["cart"] as $i => $value) 
    {
      $subTotal = null;
      if ($value ["size"] == "smallKorean"){
        $value ["size"] = "Small";
        $Country = "Most Trending Korean Box";
      }
      else if ($value ["size"] == "mediumKorean"){
        $value ["size"] = "Medium";
       $Country = "Most Trending Korean Box";
      }
      else if ($value ["size"] == "largeKorean"){
        $value ["size"] = "Large";
        $Country = "Most Trending Korean Box";
      }
         else if ($value ["size"] == "smallChinese"){
        $value ["size"] = "Medium";
       $Country = "Most Trending Chinese Box";
      }
      else if ($value ["size"] == "mediumChinese"){
        $value ["size"] = "Large";
        $Country = "Most Trending Chinese Box";
      }
         else if ($value ["size"] == "largeChinese"){
        $value ["size"] = "Medium";
       $Country = "Most Trending Chinese Box";
      }
      else if ($value ["size"] == "smallJapanese"){
        $value ["size"] = "Small";
        $Country = "Most Trending Japanese Box";
      }
         else if ($value ["size"] == "mediumJapanese"){
      $value ["size"] = "Medium";
     $Country = "Most Trending Japanese Box";
    }
    else if ($value ["size"] == "largeJapanese"){
      $value ["size"] = "Large";
      $Country = "Most Trending Japanese Box";
    }

    ?>
    
        <?php

          foreach ($value ["tickets"] as $TicketType => $quantity)
          {


            if ($TicketType == "price")
              $subPrice = $value ["Price"];
            $subTotal += $subPrice;

            ?>
          <table class = "table">
            <tr>
              <th style ="width:25%;">Product Name</th>
              <th>Size</th>
              <th>Quantity</th>
              <th>Price</th>
              <th rowspan ="2" ><form action="" method="post">
              <button type="submit" name="remove" value="<?php echo $i; ?>" class = "remove" style="margin-left:5%">Remove</button>
              </form></th>
            </tr>
            <tr>
              <td style ="Width:25%;"><?php echo $Country; ?></td>
              <td><?php echo $value["size"]; ?></td>
              <td><?php echo $quantity; ?></td>
              <td><?php echo $subPrice; ?></td>
            </tr>
          </table>
              <hr>
         
                
              

            <?php

          }
          

        ?>

    <?php
    $grandTotal += $subTotal;

    }
  ?>
  <h2 style="color:white;"> Total: $<?php echo $grandTotal; ?>.00 </h2>

  <?php

  }
  ?>  
  <br>

  <form action="product.html">
      <input type="submit" value="Let me get MORE!" class = "remove">
  </form> 
  <h2 style = "color:white;"> OR </h2>
  <form action="confirmation.php" method ="post">
    <table style ="margin: 0 auto;, color:white;">
        <tr>
          <th>Email:</th>
          <td><input type = "email" name = "email" title = "email" placeholder="Please type in your Email Address" required/></td>
        </tr>
        <tr>
          <th>Name:</th>
          <td> <input type ="text" name="firstName" pattern="^[A-Za-z0-9,'\. ]+$"title ="Please type in your First Name." placeholder="Please type in your First Name"required/></td>
        </tr>
        <tr>
          <th>Phone Number:</th>
          <td><input type ="text" name="phoneNumber" pattern="^(\+614|\(04\)|04)(\d.?){8}$" title="Invalid Australian Number: Use +614 or (04) or 04!" placeholder="Please type a valid Australian number"required/></td>
        </tr> 

      </table>
      <input type="submit" name="Checkout" value="Checkout" class = "stylebutton">
  </form>
  <br>
  <?php
  if (isset($_POST["Checkout"])){
    unset($_SESSION['cart']);
  }
  ?>

        
