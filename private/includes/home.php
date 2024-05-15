<?php
include 'header.php';
?>

<h1>Home Page</h1>

<p>Welcome to the home page! Check out our other pages:</p>

<?php
// get post, by creating an object
$post_class = new Post(); // this is intantiating the class to make it usable. we can add a para i put number of posts// gets the post class and store inside the viriable
$result = $post_class->get_home_posts();// function available in the function folder in index page

if ($result){
    foreach ($result as $row){
          // code... get details
        // display ie posts
      echo "<div class='post'>
          <div>
            <h2>". $row['title'] . "</h2>
          </div>
          <p class='text'>" . substr($row['post'], 0, 200) . "</p>
          <a href='post.php'>..read more..</a>
          <p class='timestamp'>" . date("jS m, Y", strtotime($row['date']))." </p>
          <br style='clear:both;'>
        </div>";
    }
}


?>

<?php

$result =0;
$count =1;
$amount =2000;
for ($i=0; $i < 30; $i++){
   
    $rate  = $amount * 30/ 100 ;
   $amount = $amount + $rate;
    echo "<br> $amount <br>";
   echo $count++;
}
include 'footer.php';   
?>


<!--

<section style='border:1px solid black;'>
    <section>
        <section>
          <p>ratings</p>
        </section>
        <section>
          <p>ratings</p>
        </section>
    </section>
    <section>
    <p>How will you want it deliver?</p>
        <section>
           <select name="" id="">
            <option value="">Delivery options</option>
            <option value="">I will come and pick it up</option>
            <option value="">Deliver agent? charges apply!</option>
           </select>
        
        </section>
        <section>
        <p></p>
        </section>
    </section> 
</section>

<section style='border:1px solid black;'>

    <section class='d-flex flex-direction-row justify-content-space-around'>
        <p class='btn btn-success'>Related products</p>
        <section>
            <p class='rating'>rate product</p>
            <p>stars</p>
        </section>
        <section class='price'>
            <p>old price</p>
            <p>Current price</p>
            </section>
        </section>
        <p>View Shop location</p>
    <section>
    
       
        </section>
        <section>
        <p></p>
        </section>
    </section> 
</section> -->