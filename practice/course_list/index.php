<?php
require('../model/database.php');
require('../model/courses_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_courses';
    }
}

if ($action == 'list_products') {
    $course_id = filter_input(INPUT_GET, 'course_id',
            FILTER_VALIDATE_INT);
    if ($course_id == NULL || $course_id == FALSE) {
        $course_id = 1;
    }
    $course_name = get_course_name($course_id);
    $courses = get_courses();
    $products = get_products_by_course($course_id);
    include('product_list.php');
} else if ($action == 'list_courses') {
    $courses = get_courses();
    include('course_list.php');
} else if ($action == 'delete_course') {
    $course_id = filter_input(INPUT_POST, 'course_id',
          FILTER_VALIDATE_INT);
    if ($course_id == NULL || $course_id == FALSE) {
        $error = "Missing or incorrect course id.";
        include('../errors/error.php');
    }
    delete_course($course_id);
    header("Location: .?action=list_courses");
} else if ($action == 'delete_product') {
    $product_id = filter_input(INPUT_POST, 'product_id',
            FILTER_VALIDATE_INT);
    $course_id = filter_input(INPUT_POST, 'course_id',
            FILTER_VALIDATE_INT);
    if ($course_id == NULL || $course_id == FALSE ||
            $product_id == NULL || $product_id == FALSE) {
        $error = "Missing or incorrect product id or course id.";
        include('../errors/error.php');
    } else {
        delete_product($product_id);
        header("Location: .?course_id=$course_id");
    }
} else if ($action == 'edit_product') {
  $product_id = filter_input(INPUT_POST, 'product_id',
          FILTER_VALIDATE_INT);
  $course_id = filter_input(INPUT_POST, 'course_id',
          FILTER_VALIDATE_INT);
  if ($course_id == NULL || $course_id == FALSE ||
          $product_id == NULL || $product_id == FALSE) {
      $error = "Missing or incorrect product id or course id.";
      include('../errors/error.php');
  } else {
    $product = get_product($product_id);
    $courses = get_courses();
    include('product_edit.php');
  }
} else if ($action == 'update_product') {
  $course_id = filter_input(INPUT_POST, 'course_id',
          FILTER_VALIDATE_INT);
  $product_id = filter_input(INPUT_POST, 'product_id',
          FILTER_VALIDATE_INT);
  $code = filter_input(INPUT_POST, 'code');
  $name = filter_input(INPUT_POST, 'name');
  $price = filter_input(INPUT_POST, 'price');
  if ($product_id == NULL || $product_id == FALSE ||
          $course_id == NULL || $course_id == FALSE || $code == NULL ||
          $name == NULL || $price == NULL || $price == FALSE) {
      $error = "Invalid product data. Check all fields and try again.";
      include('../errors/error.php');
  } else {
    update_product($product_id, $course_id, $code, $name, $price);
    header("Location: .?action=list_products");
  }
} else if ($action == 'show_add_form') {
    $courses = get_courses();
    include('product_add.php');
} else if ($action == 'add_course') {
    $name = filter_input(INPUT_POST, 'name');
    if ($name == NULL) {
        $error = "Invalid course data. Check field and try again.";
        include('../errors/error.php');
    } else {
        add_course($name);
        header("Location: .?action=list_courses");
    }
} else if ($action == 'add_product') {
    $course_id = filter_input(INPUT_POST, 'course_id',
            FILTER_VALIDATE_INT);
    $code = filter_input(INPUT_POST, 'code');
    $name = filter_input(INPUT_POST, 'name');
    $price = filter_input(INPUT_POST, 'price');
    if ($course_id == NULL || $course_id == FALSE || $code == NULL ||
            $name == NULL || $price == NULL || $price == FALSE) {
        $error = "Invalid product data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
        add_product($course_id, $code, $name, $price);
        header("Location: .?course_id=$course_id");
    }
}
?>
