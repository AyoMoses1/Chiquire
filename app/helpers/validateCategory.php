<?php 

    function validateCategory($post_data) {

        $errors = [];         
        
        if (empty($post_data['title'])) {
            array_push($errors, "Title is required");
        }
        
        $existingCategories = selectOne("categories", ["title" => $post_data["title"]]);

        if($existingCategories) {
            if (isset($post_data['update-cat']) && $existingCategories['id'] != $post_data['id']) {
                array_push($errors, "Category already exists");
            }
            if (isset($post_data['add-cat'])) {
                array_push($errors, "Category already exists");
            }
        }

        return $errors;
        
    }

?>