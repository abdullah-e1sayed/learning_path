
<?php $page_title = 'Update an idea'; ?>
<?php $page_heading = 'Idea Updating';
require_once ('config.php');
$connection = new PDO($dsn,$username,$pass,$option); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title><?php echo $page_title; ?></title>

</head>

<body>
    <h1> <?php echo $page_heading; ?> </h1>
    <p> <a href="index.php">Go back to the homepage</a> </p>

    <?php if(isset($_GET['id'])): ?>
        <?php $id=$_GET['id']; ?>
        <div style="background:#eee;padding:10px;">
            <p>You are updating the idea #<?php echo $id; ?></p>
        </div>

        <br>
        <hr>
        <form action="" method="POST">
        <input type="hidden" name= "id" value= "<?php echo $id; ?>">
        <label for="title">Idea Title</label>
        <input type="text" name="title" placeholder="Enter your titel" value="<?php if(isset($_POST['title'])){echo $_POST['title'];} ?>">
        <br><br>
        <textarea name="idea" placeholder="Enter your idea" rows="8" cols="80"><?php if(isset($_POST['idea'])){echo $_POST['idea'];} ?></textarea>
        <br><br>
        <input type="submit" name="submit" value="update your idea">
    </form>
        <br>

        <?php if (isset($_POST['submit'])): ?>

            <?php $idea = array('id'=> $_POST['id'],
                    'title' => $_POST['title'],
                    'idea' => $_POST['idea']);
                   
                    $sql = "UPDATE ideas SET title=:title , idea=:idea WHERE id=:id ";
                    $statment = $connection->prepare($sql);
                    $statment->execute($idea);
            ?>
    
            <div style="background:green;color:white;padding:10px;">
                <p>Your have updated your idea succesfully</p>
            </div>
            <br>
        <?php endif; ?>
    <?php endif; ?>


</body>

</html>