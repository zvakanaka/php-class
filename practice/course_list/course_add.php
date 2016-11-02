<?php include '../view/header.php'; ?>
<main>
    <h1>Add Course</h1>
    <form action="index.php" method="post" id="add_course_form">
        <input type="hidden" name="action" value="add_course">

        <label>Name:</label>
        <input type="text" name="name" />
        <br>

        <label>Credits:</label>
        <input type="number" name="credits" />
        <br>

        <label>Course Number:</label>
        <input type="number" name="course-number" />
        <br>

        <label>Prefix:</label>
        <input type="text" name="prefix" />
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Course" />
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=list_courses">View Course List</a>
    </p>

</main>
<?php include '../view/footer.php'; ?>
