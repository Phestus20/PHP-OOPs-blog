
<?php
include 'header.php';
?>

<h1>Posts Page</h1>

<p>Here are all sample posts:</p>
<?php
// post restriction access according to rank
if (access("admin")){
        // get posts
        $post_class = new Post(); // this is intantiating the class to make it usable. we can add a para i put numberber of posts// gets the post class and store inside the viriable
        $result = $post_class->get_all_posts();// function available in the function folder in index page


        if ($result){
            foreach ($result as $row){
                // code... get details
                // display ie posts
            echo "<div class='post'>
                <div>
                    <h2>". $row['title']."</h2>
                </div>
                <p class='text'>".$row['post']."</p>
                <a href='post.php'>..read more..</a>
                <p class='timestamp'>" . date("jS m, Y", strtotime($row['date'])) . "</p>
                <br style='clear:both;'>
                </div>";
            }
        }

}else{
    echo "<h5 class='text-danger'>We are sorry! You don't have access to this resource</h5>";
}
?>

<?php
include 'footer.php';
?>
