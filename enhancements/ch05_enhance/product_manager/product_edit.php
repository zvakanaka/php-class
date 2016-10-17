<?php include '../view/header.php'; ?>
<main>
    <h1>Edit Product</h1>
    <form action="index.php" method="post" id="update_product_form">
        <input type="hidden" name="action" value="update_product">

        <label>Category:</label>
        <select name="category_id">
        <?php
            $product_id = $product['productID'];
            $code = $product['productCode'];
            $name = $product['productName'];
            $listPrice = $product['listPrice'];
            $category_id = $product['categoryID'];
        ?>
        <?php foreach ( $categories as $category ) : ?>
            <option <?php if ($category_id == $category['categoryID']) echo "selected='selected'"; ?>value="<?php echo $category['categoryID']; ?>">
                <?php echo $category['categoryName']; ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br>

        <label>Code:</label>
        <input type="text" name="code" <?php echo "value='$code'"; ?> />
        <br>

        <label>Name:</label>
        <input type="text" name="name" <?php echo "value='$name'"; ?> />
        <br>

        <label>List Price:</label>
        <input type="text" name="price" <?php echo "value='$listPrice'"; ?>/>
        <br>

        <input type="hidden" name="product_id" <?php echo "value='$product_id'"; ?>/>

        <label>&nbsp;</label>
        <input type="submit" value="Update Product" />
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=list_products">View Product List</a>
    </p>

</main>
<?php include '../view/footer.php'; ?>
