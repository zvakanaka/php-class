<!DOCTYPE html>
<html>
<head>
    <title>Product Discount Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
    <main>
      <h1>Product Discount Calculator</h1>
      <?php $product_description = htmlspecialchars($_POST['product_description']); ?>
      <?php $list_price = filter_input(INPUT_POST, 'list_price', FILTER_VALIDATE_FLOAT); ?>
      <?php $discount_percent = filter_input(INPUT_POST, 'discount_percent', FILTER_VALIDATE_FLOAT); ?>
      <?php $discount_amount =  $list_price*($discount_percent/100.0); ?>
      <?php $discount_price = $list_price - $discount_amount; ?>
      <?php $sales_tax = 0.08; ?>
      <?php $sales_tax_amount = $discount_price*(1.0+$sales_tax); ?>
        <?php
          if (!$product_description)
            echo "<p class=\"error\">Missing description!</p>";
          if ($list_price === FALSE)
            echo "<p class=\"error\">Invalid price!</p>";
          if ($discount_percent === FALSE)
          echo "<p class=\"error\">Invalid percent!</p>";
        ?>
        <label>Product Description:</label>
        <span><?php echo $product_description; ?></span><br>

        <label>List Price:</label>
        <span><?php echo '$'.number_format($list_price, 2); ?></span><br>

        <label>Standard Discount:</label>
        <span><?php echo $discount_percent.'%'; ?></span><br>
        <label>Discount Amount:</label>
        <span><?php echo '$'.number_format($discount_amount, 2); ?></span><br>

        <label>Discount Price:</label>
        <span><?php echo '$'.number_format($discount_price, 2); ?></span><br>
        <label>Price Including Tax: (<?php echo $sales_tax * 100 . '%'; ?>)</label>
        <span><?php echo '$'.number_format($sales_tax_amount, 2); ?></span><br>
    </main>
</body>
</html>
