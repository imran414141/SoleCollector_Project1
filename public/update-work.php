<?php 

    // include the config file that we created last week
    require "../config.php";
    require "common.php";


    // run when submit button is clicked
    if (isset($_POST['submit'])) {
        try {
            $connection = new PDO($dsn, $username, $password, $options);  
            
            //grab elements from form and set as varaible
            $work =[
              "id"         => $_POST['id'],
              "brand" => $_POST['brand'],
              "colour"  => $_POST['colour'],
              "size"   => $_POST['size'],
              "date"   => $_POST['date'],
            ];
            
            // create SQL statement
            $sql = "UPDATE `shoes` 
                    SET id = :id, 
                        brand = :brand, 
                        colour = :colour, 
                        size = :size, 
                       date = :date 
                    WHERE id = :id";

            //prepare sql statement
            $statement = $connection->prepare($sql);
            
            //execute sql statement
            $statement->execute($work);

        } catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    }

    // GET data from DB
    //simple if/else statement to check if the id is available
    if (isset($_GET['id'])) {
        //yes the id exists 
        
        try {
            // standard db connection
            $connection = new PDO($dsn, $username, $password, $options);
            
            // set if as variable
            $id = $_GET['id'];
            
            //select statement to get the right data
            $sql = "SELECT * FROM shoes WHERE id = :id";
            
            // prepare the connection
            $statement = $connection->prepare($sql);
            
            //bind the id to the PDO id
            $statement->bindValue(':id', $id);
            
            // now execute the statement
            $statement->execute();
            
            // attach the sql statement to the new work variable so we can access it in the form
            $work = $statement->fetch(PDO::FETCH_ASSOC);
            
        } catch(PDOExcpetion $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    } else {
        // no id, show error
        echo "No id - something went wrong";
        //exit;
    };


?>

<?php include "templates/header.php"; ?>

<?php if (isset($_POST['submit']) && $statement) : ?>
	<p>Shoes updated.</p>
<?php endif; ?>

<h2>Update Shoes</h2>

<form method="post">
    
    <label for="id">ID</label>
    <input type="text" name="id" id="id" value="<?php echo escape($work['id']); ?>" >
    
    <label for="brand">Brand</label>
    <input type="text" name="brand" id="brand" value="<?php echo escape($work['brand']); ?>">

    <label for="colour">Colour</label>
    <input type="text" name="colour" id="colour" value="<?php echo escape($work['colour']); ?>">

    <label for="size">Size</label>
    <input type="text" name="size" id="size" value="<?php echo escape($work['size']); ?>">
  
    
    <label for="date">Update Date</label>
    <input type="text" name="date" id="date" value="<?php echo escape($work['date']); ?>">

    <input type="submit" name="submit" value="Update">

</form>





<?php include "templates/footer.php"; ?>