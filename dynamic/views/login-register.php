<?php include $_SERVER['DOCUMENT_ROOT'].'/php-class/dynamic/views/parts/head.php'; ?>
<main>
    <?php if (isset($error)) { ?>
      <p class="error">
        <?php echo $error; ?>
      </p>
    <?php } ?>

    <h1>Register</h1>
    <form action="." method="post" id="registration_form">
        <input type="hidden" name="action" value="insert_user">

        <label>Username:</label>
        <input type="text" name="username" />
        <br>

        <label>Password:</label>
        <input type="password" name="password" />
        <br>

        <label>Email:</label>
        <input type="email" name="email" />
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Register" />
        <br>
    </form>

</main>
<?php include $_SERVER['DOCUMENT_ROOT'].'/php-class/dynamic/views/parts/toes.php'; ?>
