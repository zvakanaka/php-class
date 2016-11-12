<!DOCTYPE html>
<html>
<head>
    <title>Future Value Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>

<body>
    <main>
    <h1>Future Value Calculator</h1>
    <?php if (!empty($error_message)) { ?>
        <p class="error"><?php echo $error_message; ?></p>
    <?php } // end if ?>
    <form action="." method="post">
        <input type="hidden" name="action" value="display_results">
        <div id="data">
            <label>Investment Amount:</label>
            <select class="" name="investment">
              <?php for($i = 10000; $i < 50000; $i += 5000) { ?>
                  <option value="<?php echo $i;?>">
                    <?php echo $i;?>
                  </option>
              <?php } ?>
            </select>
            <br>

            <label>Yearly Interest Rate:</label>
            <select class="" name="interest_rate">
              <?php for($i = 4.0; $i < 12.0; $i += 0.5) { ?>
                  <option value="<?php echo $i;?>">
                    <?php echo $i;?>
                  </option>
              <?php } ?>
            </select>
            <br>

            <label>Number of Years:</label>
            <input type="text" name="years"
                   value="<?php echo $years; ?>"/><br>

            <input type="checkbox" name="monthly">
            <span>Compound Interest Monthly</span>
        </div>

        <div id="buttons">
            <label>&nbsp;</label>
            <input type="submit" value="Calculate"/><br>
        </div>

    </form>
    </main>
</body>
</html>
