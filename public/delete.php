<?php 

    // include the config file 
    require "../config.php";
    require "common.php";

    // This code will only run if the delete button is clicked
    if (isset($_GET["id"])) {
	    // this is called a try/catch statement 
        try {
            // define database connection
            $connection = new PDO($dsn, $username, $password, $options);
            
            // set id variable
            $id = $_GET["id"];
            
            // Create the SQL 
            $sql = "DELETE FROM shoes WHERE id = :id";

            // Prepare the SQL
            $statement = $connection->prepare($sql);
            
            // bind the id to the PDO
            $statement->bindValue(':id', $id);
            
            // execute the statement
            $statement->execute();

            // Success message
            $success = "Shoes deleted from your Collection!";

        } catch(PDOException $error) {
            // if there is an error, tell us what it is
            echo $sql . "<br>" . $error->getMessage();
        }
    };

    // This code runs on page load
    try {
        $connection = new PDO($dsn, $username, $password, $options);
		
        // SECOND: Create the SQL 
        $sql = "SELECT * FROM shoes";
        
        // THIRD: Prepare the SQL
        $statement = $connection->prepare($sql);
        $statement->execute();
        
        // FOURTH: Put it into a $result object that we can access in the page
        $result = $statement->fetchAll();
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }

?>

<?php include "templates/header.php"; ?>


<h2>Delete Shoes</h2>



<!-- This is a loop, which will loop through each result in the array -->
<?php foreach($result as $row) { ?>

<p>
    ID:
    <?php echo escape($row['id']); ?><br> Brand:
    <?php echo $row['brand']; ?><br> Colour:
    <?php echo $row['colour']; ?><br> Size:
    <?php echo $row['size']; ?><br>
    <a href='delete.php?id=<?php echo $row['id']; ?>'>Delete</a>
</p>

<hr>
<?php }; //close the foreach
?>



<?php include "templates/footer.php"; ?>