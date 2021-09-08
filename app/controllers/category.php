<?php 

 // make  connection to db
   require(ROOT_PATH ."/app/database/db.php");
   
   include(ROOT_PATH . '/app/helpers/validateCategory.php');

   include(ROOT_PATH . '/app/helpers/middleware.php');

   $table = "categories";

   $categories = selectAll($table);

   $id = "";
   $title = "";
   $description = "";

   $errors = [];


   //  handler for adding categories

   if (isset($_POST["add-cat"])) {
      adminOnly();

      $errors = validateCategory($_POST);

      if(count($errors) === 0) {

         unset($_POST["add-cat"]);
         $_POST['description'] = htmlentities($_POST['description']);

         $topic_id = create($table, $_POST);
         $_SESSION["message"] = "Category created successfully";
         $_SESSION["type"] = 'success';
         header("location:" . BASE_URL . "/admin/categories/index.php");

      }
      else {
         $title = $_POST['title'];
         $description = $_POST['description'];
      }

   }

    //  handler for fetching categories

   if(isset($_GET["id"])) {
      $id = $_GET['id'];
      $category = selectOne($table, ["id" => $id]);
      $id = $category['id'];
      $title = $category['name'];
      $description = $category['description'];
   }

    //  handler for updating categories

   if(isset($_POST["update-cat"])) {
      adminOnly();

      $errors = validateCategory($_POST);

      if(count($errors) === 0) {

         $id = $_POST['id'];
         unset($_POST['id'], $_POST['update-cat']);
         $topic_id = update($table, $id, $_POST);
         $_SESSION["message"] = "Category updated successfully";
         $_SESSION["type"] = 'success';
         header("location:" . BASE_URL . "/admin/categories/index.php");
         
      }
      else {
         $id = $_POST['id'];
         $title = $_POST['title'];
         $description = $_POST['description'];
      }

   }

    //  handler for deleting categories

   if(isset($_GET['del_id'])) {
      adminOnly();

      $id = $_GET['del_id'];
      $del = delete($table, $id);
      $_SESSION["message"] = "Category deleted successfully";
      $_SESSION["type"] = 'success';
      header("location:" . BASE_URL . "/admin/categories/index.php");
   }

?>