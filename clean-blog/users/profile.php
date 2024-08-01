<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php

    if(isset($_GET['prof_id'])){

        //first select query
        $id = $_GET['prof_id'];

        $select = $conn->query("SELECT * FROM users WHERE id = '$id'");

        $select->execute();

        $post = $select->fetch(PDO::FETCH_OBJ);

        if($_SESSION['user_id'] !== $post->id)
        {
            header('location: http://localhost/clean-blog/index.php');
        }

        //second update query 

        if(isset($_POST['submit'])){

            if($_POST['email'] == '' OR $_POST['username'] == '')
            {
                echo "<div class='alert alert-danger text-center text-white' role='alert'>
                    Enter data into inputs
                </div>";
            }

            else{
    
                $email = $_POST['email'];
                $username = $_POST['username'];

                $update = $conn->prepare("UPDATE users SET email = :email, username = :username WHERE id = '$id'");
                $update->execute([
                    ':email' => $email,
                    ':username' => $username,
                ]);

                header('location: http://localhost/clean-blog/users/profile.php?prof_id='.$_SESSION['user_id'].'');

            }

        }
    }
    else{
        header("location: http://localhost/clean-blog/404.php");
    }
?>

            <form method="POST" action="profile.php?prof_id=<?php echo $post->id; ?>">
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="email" name="email" value="<?php echo $post->email; ?>" id="form2Example1" class="form-control" placeholder="Email" />     
                </div>

                <div class="form-outline mb-4">
                    <input type="text" name="username" value="<?php echo $post->username; ?>" id="form2Example1" class="form-control" placeholder="Username" />
                </div>

                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Update</button>

            </form>


<?php require "../includes/footer.php"; ?>
