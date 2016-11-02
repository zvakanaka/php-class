<?php
function get_courses() {
    global $db;
    $query = 'SELECT * FROM courses
              ORDER BY CourseId';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;
}

function get_course($course_id) {
    global $db;
    $query = 'SELECT * FROM course
              WHERE CourseId = :course_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':course_id', $course_id);
    $statement->execute();
    $course = $statement->fetch();
    $statement->closeCursor();
    return $course;
}

function delete_course($course_id) {
    global $db;
    $query = 'DELETE FROM courses
              WHERE CourseId = :course_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':course_id', $course_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_course($name) {
    global $db;
    $query = 'INSERT INTO courses
                 (Name)
              VALUES
                 (:name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->execute();
    $statement->closeCursor();
}
?>
