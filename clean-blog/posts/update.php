<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php

    if(isset($_GET['upd_id'])){

        //first select query
        $id = $_GET['upd_id'];

        $select = $conn->query("SELECT * FROM posts WHERE id = '$id'");

        $select->execute();

        $post = $select->fetch(PDO::FETCH_OBJ);

        /*if($_SESSION['user_id'] !== $post->user_id)
        {
            header('location: http://localhost/clean-blog/index.php');
        }*/

        //second update query 

        if(isset($_POST['submit'])){

            if($_POST['title'] == '' OR $_POST['subtitle'] == '' OR $_POST['body'] == '')
            {
                echo "<div class='alert alert-danger text-center text-white' role='alert'>
                    Enter data into inputs
                </div>";
            }

            else{

                unlink("images/" .$post->img. "");
    
                $title = $_POST['title'];
                $subtitle = $_POST['subtitle'];
                $body = $_POST['body'];
                $img = $_FILES['img']['name'];

                $dir = 'images/' . basename($img);

                $update = $conn->prepare("UPDATE posts SET title = :title, subtitle = :subtitle, body = :body, img = :img WHERE id = '$id'");
                $update->execute([
                    'title' => $title,
                    'subtitle' => $subtitle,
                    'body' => $body,
                    'img' => $img
                ]);

                if(move_uploaded_file($_FILES['img']['tmp_name'], $dir))
                {
                    header('location: http://localhost/clean-blog/index.php');
                }

            }

        }
    }
    else{
        header("location: http://localhost/clean-blog/404.php");
    }
?>

            <form method="POST" action="update.php?upd_id=<?php echo $id; ?>" enctype="multipart/form-data">
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="text" name="title" value="<?php echo $post->title; ?>" id="form2Example1" class="form-control" placeholder="title" />
               
              </div>

              <div class="form-outline mb-4">
                <input type="text" name="subtitle" value="<?php echo $post->subtitle; ?>" id="form2Example1" class="form-control" placeholder="subtitle" />
            </div>

            <div class="form-outline mb-4">
                <textarea type="text" name="body" id="form2Example1" class="form-control" placeholder="body"> <?php echo $post->body; ?> </textarea>
            </div>
            <?php echo "<img src='images/".$post->img."' width=900px height=300px> "; ?>
              
             <div class="form-outline mb-4">
                <input type="file" name="img" id="form2Example1" class="form-control" placeholder="image" />
            </div>


              <!-- Submit button -->
              <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Update</button>

          
            </form>


<?php require "../includes/footer.php"; ?>
