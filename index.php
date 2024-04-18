<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="images/" href="/images/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="apple-touch-icon" sizes="180x180" href="./images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest"> 
    <title>Sugar's Diner</title>
    <style>
  
        header {
            background-color: #aeaf8f;
            color: white;
            text-align: center;
            padding: 10px 0;
        }

        .logo {
            display: block;
            margin: 0 auto;
        }

        footer {
            background-color: #aeaf8f;
            padding: 10px;
            text-align: center;
        }

        .fa-facebook {
            background: #14171c;
            color: white;
        }

        .fa-twitter {
            background: #0a0a0b;
            color: white;
        }

        .fa-instagram {
            background: #0d0e0f;
            color: white;
        }
        .tablink {
            background-color: #555;
            color: white;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            font-size: 17px;
            width: 25%;
        }

        .tablink:hover {
            background-color: #777;
        }

        .tabcontent {
            color: rgba(16, 17, 16, 0.73);
            display: none;
            padding: 100px 20px;
            height: 200%;
        }

        #Home {
            background-image: url(images/Recipe5.jpg);
        }

        #About {
            background-color: white;
        }

        #Recipe {
            background-color: rgb(243, 243, 238);
        }

        #Profile {
            background-color: rgb(80, 96, 2);
        }

        .w3-row {
    display: flex;
    justify-content: center;
    align-items: center;
}

.menu-item {
    margin-bottom: 20px;
}

.menu-item-image {
    text-align: center;
}

        .container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            max-height: 500;
            background-color: rgb(232, 243, 227);
            color: rgb(17, 18, 16);
        }
        .w3-row {
    display: flex;
    justify-content: center;
    align-items: center;
}

.w3-col.l6 {
    flex: 1;
}

.menu-item {
    margin-bottom: 20px;
}

.menu-item-image {
    text-align: center;
}


        .left-section,
        .middle-section,
        .right-section {
            text-align: center;
        }

        .news-container {
            display: flex;
            align-items: center;
        }

        .content-wrapper {
            display: flex;
            flex-direction: row;
        }

        img {
            margin-right: 20px;
        }

        .landing-container {
            flex: 1;
        }

        
        .left-section p,
        .middle-section p,
        .right-section p {
            margin: 10px 0;
        }

        .button {
            background-color: white;
        }

        * {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
  padding: 20px;
  font-family: Arial;
}

.main {
  max-width: 1000px;
  margin: auto;
}

h1 {
  font-size: 50px;
  word-break: break-all;
}

.row {
  margin: 8px -16px;
}

.row,
.row > .column {
  padding: 8px;
}


.column {
  float: left;
  width: 25%;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

.content {
  background-color: white;
  padding: 10px;
}

@media screen and (max-width: 900px) {
  .column {
    width: 50%;
  }
}

@media screen and (max-width: 600px) {
  .column {
    width: 100%;
  }
}
    </style>
</head>
<body>

<header>
    <a href="Chef dashboard.html">
        <img src="images/main Logo T.jpeg" height="100" width="200" alt="Logo" class="logo">
    </a>
</header>

<button class="tablink" onclick="openPage('Home', this, 'pastel')"id="defaultOpen">Home</button>

<button class="tablink" onclick="openPage('About', this, 'sage green')">About</button>
<button class="tablink" onclick="openPage('Recipe', this, 'olive')">Recipes</button>
<button class="tablink" onclick="openPage('Profile', this, 'rgb(2, 96, 2)')">Profile</button>
<button class="tablink" onclick="window.location.href='New-recipes.php'">New Recipes</button>


<a class="tablink" href="Logout.php">LogOut</a>




<div id="Home" class="tabcontent">
    <main>
        <div class="container">
          <?php

          //echo $_SESSION["username"];
          ?>
            <div class="left-section">
                <h2>Latest</h2>
                <p>Our goal is to fundamentally change the way the world appreciates and engages with African food. In
                    addition to this, we took on a challenge to introduce creative and exceptional ways food in general
                    could be exploited and unconventionally manipulated.</p>
                <p>26 OXO Tools Our Editors Love for Meal Prepping and Decluttering</p>
                <p>15 Simplehuman Solutions Our Editors Love for a Clean and Clutter-Free Kitchen</p>
                <p>You Deserve a Great Bowl of Ramen (It’s Worth the Work!)</p>
                <p>The Best Places to Buy Caraway Cookware</p>
                <p>The Forgotten Pantry Staple That Guarantees the Best Waffles of Your Life</p>
                <p>Chef Pierre Thiam not only creates delicious food in the fine dining world, he also writes and teaches his skills in the kitchen to others. He has catered huge events that have involved the President and big name celebrities too!</p>
                <button type="Go to Recipe">See All</button>


              

            </div>
            <div class="middle-section">
                <!-- Middle Section Content -->
                <h2>Our Lastest Favourite</h2>
                <img src="images/Recipe 9.jpeg" height="500" width="400" alt="Home">
                <p>Shrimp Scampi (with Linguine) This is a dish for easy, fancy shrimp at its very best — over pasta!
                </p>
                <button class="button button1" onclick="window.location.href='r2.html'">View Recipe</button>

            </div>
            <div class="right-section">
                <!-- Right Section Content -->
                <h2>Videos</h2>
                <iframe width="400" height="500"
                        src="https://www.youtube.com/embed/ONn15ufNT0o?si=mhghp3GBsevRK4m0" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                <p> ONE-PAN Ebunuebunu</p>
                <p>This one-pan dinner has it all: tender chicken, a sun-dried tomato cream sauce, and a 30-minute cook
                    time.</p>
            </div>
        </div>
    </main>
</div>

<div id="About" class="tabcontent">
    <div class="content-wrapper">
        <img src="images/Esi.JPG" height="600px" width="500px" alt="Chef 1">
        <div class="landing-container">
          <h1 class="w3-center">About</h1>
            <p>I started Sugar's Diner Recipe in 2024 as a personal blog. It was just an easy way to share my baking recipes with friends and family. My small hobby blog quickly ignited a passion for food photography as well as a desire to teach others…not just what to bake, but how to bake.
                <p> I hope that the recipes here inspire you to try cooking a new dish, or try cooking a familiar dish
                    in a new way. <br>You’ll find a host of inventive recipes for breakfast, lunch, and dinner, but I
                    also want Sugar's Diner Recipe to be a resource for you. We have guides to working with a range of
                    tips for cooking and after all those dishes, I always save room for dessert! In my opinion, healthy
                    eating is all about balance, so you’ll find various recipes for brownies, and more here too.</p>
                  <p>Rooted in traditional African home cooking that emphasizes African-grown ingredients.<br> Teranga is a culinary journey into the depth, diversity, and deliciousness that the motherland has to offer.</p>
                  <p>Growing up, I spent hours watching my mother and grandmother work their baking magic in the kitchen, especially their pecan pie and Irish soda bread. And as a self-taught home baker myself, I’m fiercely dedicated to providing well-tested recipes and sharing everything I’ve learned along the way.</p>
                  <p>And as a self-taught home baker myself, I’m fiercely dedicated to providing well-tested recipes and sharing everything I’ve learned along the way. Before I post a new recipe, you can feel confident that I have already tested it dozens of times in my own kitchen. </p>
                  <p>This is why Sugar's Diner Recipes has become a trusted resource for anyone who wants to cook from scratch. In addition to the hundreds of recipes on the site, you’ll also find helpful kitchen tips, lessons on baking basics, and video tutorials that will help you gain confidence and expertise in the kitchen.</p>

                    <ul>
                      <a href="Profile.html">Read more</a>
                    </ul>
                    
        </div>
    </div>
    
</div>
<!-- Filter options for location and category -->
<div>
        <label for="location">Location:</label>
        <select id="location">
            <option value="all">All Locations</option>
            <!-- Add more location options as needed -->
        </select>

        <label for="category">Category:</label>
        <select id="category">
            <option value="all">All Categories</option>
            <!-- Add more category options as needed -->
        </select>

        <button onclick="filterRecipes()">Apply Filter</button>
    </div>

    <!-- Recipe content will be dynamically updated based on filter selection -->
    <div id="recipeContainer">
        <!-- Initial recipe content -->
        <?php include 'load_recipes.php'; ?>
    </div>
</div>


<div id="Recipe" class="tabcontent">
  <h2>Recipe's</h2>
  <p>Our perception of ourselves starts with the food we eat.</p>
  
  <!-- Portfolio Gallery Grid -->
  <div class="row">
    <div class="column">
      <div class="content">
        <img src="images/Strawberry.jpeg" alt="Mountains" style="width:100%">
        <h3>Strawberry Dutch Pancakes</h3>
        <p>This glazed strawberry bread tastes like summer in a loaf pan!</p>
        <button class="button button1" onclick="window.location.href='r4.html'">View Recipe</button>
      </div>
    </div>
    <div class="column">
      <div class="content">
      <img src="images/RicenStew.jpeg" alt="Lights" style="width:100%">
        <h3>Rice and Chunk Beef Stew</h3>
        <p>Flavoured rice with beef sauce</p>
        <button class="button button1" onclick="window.location.href='Recipes.php'">View Recipe</button>
      </div>
    </div>
    <div class="column">
      <div class="content">
      <img src="images/CheeseCaseerole.jpeg" alt="Nature" style="width:100%">
        <h3>Mac & Cheese</h3>
        <p>The key to this baked macaroni and cheese is the rich and velvety cheesse</p>
        <button class="button button1" onclick="window.location.href='r4.html'">View Recipe</button>
      </div>
    </div>
    <div class="column">
      <div class="content">
      <img src="images/Cheesecake.jpeg" alt="Mountains" style="width:100%">
        <h3>Cheese Cake</h3>
        <p>This is the kind of dessert we all love eating: creamy, thick, and rich cheesecake </p>
        <button class="button button1" onclick="window.location.href='Recipes.html'">View Recipe</button>
      </div>
    </div>
    <div class="column">
      <div class="content">
      <img src="images/Dumplings.jpeg" alt="Mountains" style="width:100%">
        <h3>Korean Dumplings</h3>
        <p>Dumplings are the perfect addition to a casserole or stew, to me, the meal isn’t complete without them!</p>
        <button class="button button1" onclick="window.location.href='r2.html'">View Recipe</button>
      </div>
    </div>
    <div class="column">
      <div class="content">
      <img src="images/Jollof.jpeg" alt="Mountains" style="width:100%">
        <h3>Spicy jollof Rice</h3>
        <p>This is a proof recipe for cooking Jollof rice, West Africa’s most popular dish. </p>
        <button class="button button1" onclick="window.location.href='r2.html'">View Recipe</button>
      </div>
    </div>
    <div class="column">
      <div class="content">
      <img src="images/Recipe 10.jpeg" alt="Mountains" style="width:100%">
        <h3>Shrimp Panini</h3>
        <p>Golden, sweet, and crisp coconut shrimp is a crowd-favorite finger food </p>
        <button class="button button1" onclick="window.location.href='r3.html'">View Recipe</button>
      </div>
    </div>
    <div class="column">
      <div class="content">
      <img src="images/k-Photo-Recipes-2024-02-carrot-cake-carrot-cake-249_1.jpeg" alt="Mountains" style="width:100%">
        <h3>Carrot Cake</h3>
        <p>With its outstanding spice flavor, super moist crumb, and velvety cream cheese frosting.</p>
        <button class="button button1" onclick="window.location.href='r3.html'">View Recipe</button>
      </div>
    </div>
  <!-- END GRID -->
  </div>
  </div>
      
  </div>
  
      </div>
  </div>
  
      
        
      </div>
    </div>
  
    <hr>
</div>

<div id="Profile" class="tabcontent">
    <h3>Profile</h3>
    <img src="images/Esi.JPG" height="600px" width="500px" alt="Chef 1">
    <p>User profile details go here.</p>
    <p>I started Sugar's Diner Recipe in 2024 as a personal blog. It was just an easy way to share my baking recipes with friends and family. My small hobby blog quickly ignited a passion for food photography as well as a desire to teach others…not just what to bake, but how to bake.
                <p> I hope that the recipes here inspire you to try cooking a new dish, or try cooking a familiar dish
                    in a new way. <br>You’ll find a host of inventive recipes for breakfast, lunch, and dinner, but I
                    also want Sugar's Diner Recipe to be a resource for you. We have guides to working with a range of
                    tips for cooking and after all those dishes, I always save room for dessert! In my opinion, healthy
                    eating is all about balance, so you’ll find various recipes for brownies, and more here too.</p>
                  <p>Rooted in traditional African home cooking that emphasizes African-grown ingredients.<br> Teranga is a culinary journey into the depth, diversity, and deliciousness that the motherland has to offer.</p>
                  <p>Growing up, I spent hours watching my mother and grandmother work their baking magic in the kitchen, especially their pecan pie and Irish soda bread. And as a self-taught home baker myself, I’m fiercely dedicated to providing well-tested recipes and sharing everything I’ve learned along the way.</p>
                  <p>And as a self-taught home baker myself, I’m fiercely dedicated to providing well-tested recipes and sharing everything I’ve learned along the way. Before I post a new recipe, you can feel confident that I have already tested it dozens of times in my own kitchen. </p>
                  <p>This is why Sugar's Diner Recipes has become a trusted resource for anyone who wants to cook from scratch. In addition to the hundreds of recipes on the site, you’ll also find helpful kitchen tips, lessons on baking basics, and video tutorials that will help you gain confidence and expertise in the kitchen.</p>
    <a href="chfdsb.html">Read more</a>

</div>

<footer>

    <p>Follow us on social media:</p>
    <div class="social-icons">
        <a href="#" class="fa fa-facebook"></a>
        <a href="#" class="fa fa-twitter"></a>
        <a href="#" class="fa fa-instagram"></a>
    </div>
    <p>&copy; 2024 Sugar's Diner. All rights reserved.</p>
</footer>

<script>
    function openPage(pageName, elmnt, color) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].style.backgroundColor = "";
        }
        document.getElementById(pageName).style.display = "block";
        elmnt.style.backgroundColor = color;
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
</script>

</body>
</html>
