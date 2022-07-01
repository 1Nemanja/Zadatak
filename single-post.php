
<?php include("header.php");?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
 integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">


<link href="styles/blog.css" rel="stylesheet">
<link rel="stylesheet" href="styles/style.css">


<main role="main" class="container">

    <div class="row">

        <div class="col-sm-8 blog-main">

                <?php
                    include ("db.php");
                    $sql = "SELECT * FROM posts WHERE posts.id = {$_GET['id']}";
                    $statement = $connection->prepare($sql);
                    $statement->execute();
                    $statement->setFetchMode(PDO::FETCH_ASSOC);
                    $singlePost = $statement->fetch();
                    // var_dump($singlePost);
                ?>
                    <!-- $post_id = $_GET['post_id'];
                    $sql = "SELECT * FROM posts WHERE posts.id = '" . $post_id . "'";

                    //var_dump($singlePost); -->


                <div class="blog-post">
                    <a href="single-post.php?id=<?php echo($singlePost["id"]) ?>">
                        <h2 class="blog-post-title"><?php echo($singlePost["title"])?></h2>
                    </a>
                    <p class="blog-post-meta"><?php echo($singlePost["created_at"]) ?> by <a
                            href="#"><?php echo($singlePost["author"]) ?></a></p>
                    <div>
                        <p><?php echo($singlePost["body"]); ?></p>
                    </div>

                </div>

                <?php
                    $sql_comments = "SELECT * FROM comments WHERE comments.post_id = {$_GET['id']}";
                    $statement_comments = $connection->prepare($sql_comments);
                    $statement_comments->execute();
                    $statement_comments->setFetchMode(PDO::FETCH_ASSOC);
                    $comments = $statement_comments->fetchAll();
                    // var_dump($singlePost);
                ?>


                <?php 
                    foreach($comments as $comment) {     
                ?>
                            
                    <ul>
                        <li>Author: <br/> <?php echo($comment["author"]) ?></li><br/>
                        <li>Comment: <br/> <?php echo($comment["text"]) ?></li><br/>
                        <hr>
                    </ul>             
                    
                <?php
                    }
                ?>  
        </div> 
        <?php include("sidebar.php");?>
    </div>

   
    <?php include("footer.php");?>


