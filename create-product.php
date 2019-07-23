<?php 
    //adding file with data to connect to database
    include_once "config/database.php";
    //adding files with objects definition
    include_once "objects/product.php";
    include_once "objects/category.php";

    //connect to database
    $database = new Database();
    $db= $database->getConnection(); // reference to method "getConnection" at Database class

    //reference to Product and Category classes in database $db
    $product= new Product($db);
    $category= new Category($db); 

    //setup the page title variable
    $page_title="Create Product";
    //adding file with header
    include_once "layout-header.php";

    echo "<div class='right-button-margin'>";
    echo "<a href='index.php' class='btn btn-default pull-right'>Read Products</a>";
    echo "</div>";


?>
<!-- PHP post code will be here -->


<!-- HTML form for product -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <table class="table table-hover table-responsive table-bordered">
        <tr>
            <td>Nazwa</td>
            <td><input type="text" name="name" class="form-control" /></td>
        </tr>
        <tr>
            <td>Cena</td>
            <td><input type="text" name="price" class="form-control" /></td>
        </tr>
        <tr>
            <td>Opis</td>
            <td><textarea name="description" class="form-control"></textarea></td>
        </tr>
        <tr>
            <td>Kategoria</td>
            <td>
                <!-- categories from database -->
                <?php
                $stmt=$category->read();

                echo "<select class='form-control' name='category_id'>";
                echo "<option>Wybierz kategorię...</option>";
                
                while ($row_category = $stmt->fetch(PDO::FETCH_ASSOC)){
                    extract($row_category);
                    echo "<option value='{$id}'>{$name}</option>";
                }
                echo "</select>";
                ?>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Dodaj</button>
            </td>
        </tr>
    </table>
</form>

<?php
//adding file with footer
include_once "layout-footer.php";
?>