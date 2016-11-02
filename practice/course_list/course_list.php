<main>

    <h1>Course List</h1>
    <table>
        <tr>
            <th>Course</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($courses as $course) : ?>
            <tr>
              <td><?php echo $course['Prefix']." ".$course['CourseNumber']." - "
              .$course['Name']." (".$course['Credits'].")"; ?></td>
              <td><form action="." method="post">
                  <input type="hidden" name="action"
                         value="delete_course">
                  <input type="hidden" name="course_id"
                         value="<?php echo $course['CourseId']; ?>">
                  <input type="submit" value="Delete">
              </form></td>
            <td><form action="." method="post">
                <input type="hidden" name="action"
                       value="edit_course">
                <input type="hidden" name="course_id"
                       value="<?php echo $product['courseId']; ?>">
                <input type="submit" value="Edit">
            </form></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2>Add course</h2>
    <form action="index.php" method="post" id="add_product_form">
        <input type="hidden" name="action" value="add_course">
        <label>Name:</label>
        <input type="text" name="name" />
        <label>&nbsp;</label>
        <input type="submit" value="Add" />
        <br>
    </form>

    <p><a href="index.php?action=list_products">List Products</a></p>

</main>
<?php include '../view/footer.php'; ?>
