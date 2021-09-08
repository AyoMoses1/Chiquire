<?php 

session_start();

// making connection to db
require("db-conn.php");

// temporary fxn to show values of arrays to be deleted
function showValue($value) {
    echo '<pre>', print_r($value, true), '</pre>';
    die();
};

// function to execute queries //

function queryExe($sql, $data) {

    global $conn;

    $stmt = $conn->prepare($sql);
    $values = array_values($data);
    $types = str_repeat("s", count($values));
    $stmt -> bind_param($types, ...$values);
    $stmt -> execute();
    return $stmt; 

}


// function to select all row after query //

function selectAll($table, $conditions = []) {

    global $conn;

    // write db query
    $sql = "SELECT * FROM $table";

    if (empty($conditions)) { 

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $record = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $record;

    } else {

        $i = 0;
        foreach ($conditions as $key => $value) {

            if ($i === 0) {

                $sql = $sql . " WHERE $key = ?";

            } else {

                $sql = $sql . " AND $key = ?";

            };
            $i++;
        };
    
        $stmt = queryExe($sql, $conditions);
        $record = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $record; 

    };


};

// function to select one row after query //

function selectOne($table, $conditions) {

    global $conn;

    // write db query
    $sql = "SELECT * FROM $table";

    $i = 0;
    foreach ($conditions as $key => $value) {

        if ($i === 0) {

            $sql = $sql . " WHERE $key = ?";

        } else {

            $sql = $sql . " AND $key = ?";

        };
        $i++;
    };

    $sql = $sql . " LIMIT 1";

    $stmt = queryExe($sql, $conditions);
    $record = $stmt->get_result()->fetch_assoc();
    return $record;

};

// function to create user //

function create($table, $data) {
    global $conn;
 
    $sql = "INSERT INTO $table SET ";

    $i = 0;
    foreach ($data as $key => $value) {

        if ($i === 0) {

            $sql = $sql . "$key = ?";

        } else {

            $sql = $sql . ", $key = ?";

        };
        $i++;
    };

    $stmt = queryExe($sql, $data);
    $id = $stmt->insert_id;
    return $id;

};

// function to update user //

function update($table, $id, $data) {
    global $conn;
 
    $sql = "UPDATE $table SET ";

    $i = 0;
    foreach ($data as $key => $value) {

        if ($i === 0) {

            $sql = $sql . "$key = ?";

        } else {

            $sql = $sql . ", $key = ?";

        };
        $i++;
    };

    $sql = $sql . " WHERE id = ?";

    $data["id"] = $id;
    $stmt = queryExe($sql, $data);
    return $stmt->affected_rows;

};

// function to delete user //

function delete($table, $id) {
    global $conn;
 
    $sql = "DELETE FROM $table WHERE id = ?";

    $stmt = queryExe($sql, ["id" => $id]);
    return $stmt->affected_rows;

};


// get published post
function getPublishedPosts() {

    global $conn;

    $sql = "SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.user_id = u.id WHERE p.published = ?";
    $stmt = queryExe($sql, ["published" => 1]);
    $record = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $record;

}

// get all posts with username
function getAllPosts() {

    global $conn;

    $sql = "SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.user_id = u.id";
    $stmt = mysqli_query($conn, $sql);
    $record = mysqli_fetch_all($stmt, MYSQLI_ASSOC);
    mysqli_free_result($stmt);
    return $record;

}

// get posts under topic
function getPostsByCategoryId($category_id) {

    global $conn;

    $sql = "SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.user_id = u.id WHERE p.published = ? AND p.category_id = ?";
    $stmt = queryExe($sql, ["published" => 1, "category_id" => $category_id]);
    $record = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $record;

}

function searchPosts($term) {

    global $conn;

    $match = "%" . $term . "%";
    $sql = "SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.user_id=u.id WHERE p.published = ?  AND p.title LIKE ? OR p.body LIKE ?";
    $stmt = queryExe($sql, ["published" => 1, 'title' => $match, 'body' => $match]);
    $record = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $record;

}

?>
