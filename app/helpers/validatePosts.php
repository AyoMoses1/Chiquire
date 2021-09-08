<?php 

    function validatePost($post_data) {

        $errors = [];         
        
        if (empty($post_data['title'])) {
            array_push($errors, "Title is required");
        }

        if (empty($post_data['body'])) {
            array_push($errors, "Body is required");
        }

        if (empty($post_data['category_id'])) {
            array_push($errors, "Please select a category");
        }
        
        $existingPost = selectOne("posts", ["title" => $_POST["title"]]);

        if($existingPost) {
            if (isset($post_data['update_post']) && $existingPost['id'] != $post_data['id']) {
                array_push($errors, "Post with that title already exists");    
            }
            if (isset($post_data['create_admin'])) {
                array_push($errors, "Post with that title already exists");
            }
            
        }

        return $errors;
        
    }

?>