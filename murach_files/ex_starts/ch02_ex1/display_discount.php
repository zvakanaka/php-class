<!DOCTYPE html>
<html>
<head>
    <title>Product Discount Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
    <main>
      <h1>Product Discount Calculator</h1>
        <label>Product Description:</label>
        <span><?php echo filter_input(INPUT_POST, 'product_description', FILTER_SANITIZE_SPECIAL_CHARS); ?></span><br>

        <label>List Price:</label>
        <?php $list_price = filter_input(INPUT_POST, 'list_price', FILTER_SANITIZE_SPECIAL_CHARS); ?>
        <span><?php echo '$'.number_format($list_price, 2); ?></span><br>

        <label>Standard Discount:</label>
        <?php $discount_percent = filter_input(INPUT_POST, 'discount_percent', FILTER_SANITIZE_SPECIAL_CHARS); ?>
        <span><?php echo $discount_percent.'%'; ?></span><br>
        <?php $discount_amount =  $list_price*($discount_percent/100); ?>
        <label>Discount Amount:</label>
        <span><?php echo '$'.number_format($discount_amount, 2); ?></span><br>

        <label>Discount Price:</label>
        <?php $discount_price = $list_price - $discount_amount; ?>
        <span><?php echo '$'.number_format($discount_price, 2); ?></span><br>
    </main>
</body>
</html>
