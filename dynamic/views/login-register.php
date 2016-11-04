<?php include $_SERVER['DOCUMENT_ROOT'].'/php-class/dynamic/views/parts/head.php'; ?>
    <main>
    <?php if (isset($error)) { ?>
      <p class="error">
        <?php echo $error; ?>
      </p>
    <?php } ?>
    <h1>Login</h1>
    <form action="." method="post" id="login_form">
        <input type="hidden" name="action" value="authenticate">

        <label>Username:</label>
        <input type="text" name="username"<?php if(isset($username)) echo " value='$username'";?>/>
        <br>

        <label>Password:</label>
        <input type="password" name="password"<?php if(isset($password)) echo " value='$password'";?>/>
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Login" />
        <br>
    </form>
    <h1>Register</h1>
    <form action="." method="post" id="registration_form">
        <input type="hidden" name="action" value="insert_user">

        <label>Username:</label>
        <input type="text" name="username"<?php if(isset($username)) echo " value='$username'";?>/>
        <br>

        <label>Password:</label>
        <input type="password" name="password"<?php if(isset($password)) echo " value='$password'";?>/>
        <br>

        <label>Email:</label>
        <input type="email" name="email"<?php if(isset($email)) echo " value='$email'";?>/>
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Register" />
        <br>
    </form>
  </main>

<?php include $_SERVER['DOCUMENT_ROOT'].'/php-class/dynamic/views/parts/toes.php'; ?>
