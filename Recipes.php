<!DOCTYPE html>
<html>
<head>
<title>Recipe</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
body {font-family: "Times New Roman", Georgia, Serif;}

header {
            background-color: #aeaf8f;
            color: white;
            text-align: center;
            padding: 10px 0;
        }

         /* Footer styles */
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



</style>
</head>
<body>
    
  <header>
    <a href="insert.html">
        <img src="images/main Logo T.jpeg" height="100" width="200" alt="Logo" class="logo">
    </a>
</header>


<!-- Page content -->
<div class="w3-content" style="max-width:1100px">

  <!-- About Section -->
  <div class="w3-row w3-padding-64" id="about">
    <div class="w3-col m6 w3-padding-large w3-hide-small">
     <img src="images/Cheesecake.jpeg" class="w3-round w3-image w3-opacity-min" alt="Table Setting" width="600" height="750">
     <h5>Write a review</h5>
     <input id="myInput" value="leave review here...">
     <button id="myBtn" onclick="javascript:alert('Message Sent Successfullt!')">Enter</button>
    </div>

    <div class="w3-col m6 w3-padding-large">
      <h1 class="w3-center">How to Make this Simple Recipe</h1><br>
      <h5 class="w3-center">Blue Berry Cheesecake</h5>
      <p class="w3-large">Start with your crust,I use graham crumbs most often, but you could also use chocolate baking crumbs for a new twist! The melted butter is essential for helping it stick together when you remove it from the pan.Beat your cream cheese room temperature is essential for no lumps! Keep in mind that full fat cream cheese is best. If you compare the packages, you can see that light cream cheese has significantly more moisture and there’s less of a chance it will set. (That being said, I use light cream cheese often and have no issues, but it’s a chance you take <span class="w3-tag w3-light-grey">Add your powdered sugar and vanilla</span> ingredients.</p>
      <p class="w3-large w3-text-grey w3-hide-medium">Whip your cream and add it in: I have always been that person who beats the cream right in with the cream cheese. If you know me at all, I’m not going to tell you you need an extra step unless you absolutely do. In this instance, I’ve tested both ways and haven’t found much of a difference at all, but whipping it separately is a little more foolproof because you can see when you’ve got stuff peaks. I have updated the recipe to reflect this change.</p>
      <p>Chill, chill, chill. And don’t even think about removing it from the pan until it’s set! We don’t want no cheesecake soup here, so plan ahead and be patient.</p>
    </div>
  </div>
  
  <hr>
  
  <!-- Menu Section -->
  <div class="w3-row w3-padding-64" id="menu">
    <div class="w3-col l6 w3-padding-large">
      <h1 class="w3-center">How to Make This Simple Recipe</h1><br>
      <h4>Rice and Stew</h4>
      <p class="w3-text-grey">Grab your skillet and let’s get to work! For more detailed instructions and ingredient measurements, scroll down to the recipe card.</p>
      <p>Add the chicken in a bowl with cornstarch, salt and pepper. Toss to coat.</p>
      <p>Heat oil in a skillet over high heat. Add the chicken and cook until just browned on all sides. Keep in mind that you may need to do this in batches!</p>
    
      <h4>Make the sauce by whisking together juice, broth, marmalade, soy sauce, cornstarch, vinegar, garlic, ginger and red pepper flakes.</h4>
      <p class="w3-text-grey">Once the chicken is browned, reduce the heat to medium. Stir in the sauce. Cook and stir often until the sauce has thickened and the chicken is cooked all the way through.</p>
      <p>Change the chicken: You can feel free to use chicken thighs instead of breasts if preferred. This sauce is also delicious with pork!</p>
      <p>Make it gluten free: Cornstarch is naturally gluten free. The only ingredient you’d have to swap in this Orange Chicken recipe is the soy sauce! Simply use a gluten free alternative like coconut aminos. Be sure to check the labels on all other ingredients just in case.</p>
    
      <h4>Add some spice: I like to include just a small pinch of red pepper flakes for a little extra flavor. Feel free to add more to turn up the heat!</h4>
      <p class="w3-text-grey">Serve with Rice</p><br>  
    </div>
    
    <div class="w3-col l6 w3-padding-large">
      <img src="images/RicenStew.jpeg" class="w3-round w3-image w3-opacity-min" alt="Menu" style="width:100%">
      <h5>Write a review</h5>
      <input id="myInput" value="leave review here...">
      <button id="myBtn" onclick="javascript:alert('Message Sent Successfullt!')">Enter</button>
    </div>
  </div>

  <hr>

  <!-- Contact Section -->
  <div class="w3-container w3-padding-64" id="contact">
    <h1>Contact</h1><br>
    <p>We offer full-service catering for any event, large or small. We understand your needs and we will cater the food to satisfy the biggerst criteria of them all, both look and taste. Do not hesitate to contact us.</p>
    <p class="w3-text-blue-grey w3-large"><b>Catering Service, 66 Spring Garden, AB25 1GN Aberdeen, UK</b></p>
    <p>You can also contact us by phone 07362274126 or email nyonyonutor@gmail.com, or you can send us a message here:</p>
    <form action="/action_page.php" target="_blank">
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Name" required name="Name"></p>
      <p><input class="w3-input w3-padding-16" type="number" placeholder="How many people" required name="People"></p>
      <p><input class="w3-input w3-padding-16" type="datetime-local" placeholder="Date and time" required name="date" value="2020-11-16T20:00"></p>
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Message \ Special requirements" required name="Message"></p>
      <p><button class="w3-button w3-light-grey w3-section" type="submit">SEND MESSAGE</button></p>
    </form>
  </div>
  
</div>

<footer>

  <p>Follow us on social media:</p>
  <div class="social-icons">
      <a href="#" class="fa fa-facebook"></a>
      <a href="#" class="fa fa-twitter"></a>
      <a href="#" class="fa fa-instagram"></a>
  </div>
  <p>&copy; 2024 Recipes Galore. All rights reserved.</p>
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

<footer>

  <p>Follow us on social media:</p>
  <div class="social-icons">
      <a href="#" class="fa fa-facebook"></a>
      <a href="#" class="fa fa-twitter"></a>
      <a href="#" class="fa fa-instagram"></a>
  </div>
  <p>&copy; 2024 Sugar's Diner. All rights reserved.</p>
</footer>

</body>
</html>