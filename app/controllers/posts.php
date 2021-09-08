<?php 

 // make  connection to db
   require(ROOT_PATH ."/app/database/db.php");
   
   include(ROOT_PATH . '/app/helpers/validatePosts.php');
   
   include(ROOT_PATH . '/app/helpers/middleware.php');

    $table = 'posts';

    $posts = selectAll('posts');
    $categories = selectAll("categories");

    $id = '';
    $errors = [];
    $title = "";
    $body = "";
    $category_id = "";
    $published = "";

    // Select Post for Update //
    if (isset($_GET["id"])) {
        $post = selectOne($table, ["id" => $_GET["id"]]);

        $id = $post['id'];
        $title = $post['title'];
        $body = $post['body'];
        $category_id = $post['category_id'];
        $published = $post['published'];
    }

    // Publish and Unpublish //
    if (isset($_GET["published"]) && isset($_GET["p_id"])) {
        adminOnly();

        $published = $_GET["published"];
        $id = $_GET["p_id"];

        $count = update($table, $id, ['published' => $published]);

        $_SESSION["message"] = "Post published state changed successfully";
        $_SESSION["type"] = 'success';

        header('location:' . BASE_URL .  '/admin/posts/index.php');
        exit();

    }

    // Delete Post //
    if (isset($_GET["delete_id"])) {
        adminOnly();

        $count = delete($table, $_GET["delete_id"]);

        $_SESSION["message"] = "Post deleted successfully";
        $_SESSION["type"] = 'success';

        header('location:' . BASE_URL .  '/admin/posts/index.php');
        exit();
    }

    // Add Posts //
    if (isset($_POST["add_post"])) {
        adminOnly();
       
       $errors = validatePost($_POST);

        //    Image Validation //
        if (!empty($_FILES['image']['name'])) {
            
            $image_name = time() . "_" . $_FILES['image']['name'];
            $destination = ROOT_PATH . "/assets/images/" . $image_name;

            $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

            if ($result) {
                $_POST["image"] = $image_name;
            } 
            else {
                array_push($errors, "failed to upload image");
            }
        } 
        else {
            array_push($errors, "Post image is required");
        }

        if (count($errors) === 0) {

            unset($_POST['add_post']);
            $_POST['user_id'] = $_SESSION['id'];
            $_POST['published'] = isset($_POST['published']) ? 1 : 0;
            $_POST['body'] = htmlentities($_POST['body']);

            $post_id = create($table, $_POST);

            $_SESSION["message"] = "Post created successfully";
            $_SESSION["type"] = 'success';

            header('location:' . BASE_URL .  '/admin/posts/index.php');
            exit();
        }
        else {
            $title = $_POST['title'];
            $body = $_POST['body'];
            $category_id = $_POST['category_id'];
            $published = isset($_POST['published']) ? 1 : 0;
        }
   }

   // Update Posts //
    if (isset($_POST["update_post"])) {
    adminOnly();

        $errors = validatePost($_POST);

        //    Image Validation //
        if (!empty($_FILES['image']['name'])) {
            
            $image_name = time() . "_" . $_FILES['image']['name'];
            $destination = ROOT_PATH . "/assets/images/" . $image_name;

            $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

            if ($result) {
                $_POST["image"] = $image_name;
            } 
            else {
                array_push($errors, "failed to upload image");
            }
        } 
        else {
            array_push($errors, "Post image is required");
        }

        if (count($errors) === 0) {

            $id = $_POST["id"];
            unset($_POST['update_post'], $_POST["id"]);
            $_POST['user_id'] = $_SESSION['id'];
            $_POST['published'] = isset($_POST['published']) ? 1 : 0;
            $_POST['body'] = htmlentities($_POST['body']);

            $post_id = update($table, $id, $_POST);

            $_SESSION["message"] = "Post updated successfully";
            $_SESSION["type"] = 'success';

            header('location:' . BASE_URL .  '/admin/posts/index.php');
            exit();
        }
        else {
            $title = $_POST['title'];
            $body = $_POST['body'];
            $category_id = $_POST['category_id'];
            $published = isset($_POST['published']) ? 1 : 0;
        }
    }



?>