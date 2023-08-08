
<?php $page_title = 'Add your idea'; ?>
<?php $page_heading = 'Share your idea with us'; ?>
<?php require_once ('config.php');
      require_once ('install.php');
 $connection = new PDO($dsn,$username,$pass,$option) ;
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title><?php echo $page_title; ?></title>
    <style>
    table,
    th,
    td {
        border: 1px solid;
        border-collapse: collapse;
    }
    </style>
</head>

<body>
    <h1> <?php echo $page_heading; ?> </h1>

    <?php if(isset($_POST['submit'])): ?>

        <?php if(isset($_POST['title'])): ?>
            <?php $idea_title = $_POST['title']; ?>
        <?php endif; ?>

        <?php if(isset($_POST['text'])): ?>
            <?php $idea_text = $_POST['text'];
            
            ?>
        <?php endif; ?>

        

        <div style="background:green;color:white; padding:10px;">
            <h3> Your idea was added succesfully:</h3>
            <p>Your idea title: <?php echo $idea_title; ?> </p>
            <p>Your idea text: <?php echo $idea_text; ?> </p>
        </div>
        <hr>
        <hr>
        <br>

    <?php $new_idea = array('title'=> $idea_title , 'idea'=> $idea_text); 
            $key_stirng= implode ( ',' , array_keys($new_idea) ) ;
            $key_values= ':' . implode (', :' , array_keys($new_idea) ) ;
            
            $sql = sprintf ( "INSERT INTO %s (%s) VALUES (%s)",
            'ideas',
            $key_stirng,
            $key_values
            );
            $statment= $connection->prepare($sql);
            $statment->execute($new_idea);
        endif; 
        ?>

    <form action="" method="POST">
        <label for="title">Idea Title</label>
        <input type="text" name="title" placeholder="Enter your titel" value="<?php if(isset($_POST['title'])){echo $_POST['title'];} ?>">
        <br><br>
        <textarea name="text" placeholder="Enter your idea" rows="8" cols="80"><?php if(isset($_POST['text'])){echo $_POST['text'];} ?></textarea>
        <br><br>
        <input type="submit" name="submit" value="Save your idea">
    </form>
    <?php  
    $sql="SELECT * FROM ideas ";
    $statment=$connection->prepare($sql);
    $statment->execute();
    $resulte=$statment->fetchAll();    
    ?>

    
    <hr><br>
    
    <table style="width:100%;background:#eee;text-align:center">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Idea</th>
            <th>Delete</th>
        </tr>

        <?php
        foreach($resulte as $row ): ?>

        <tr>
            <th><a href="update.php?id=<?php echo $row['id']  ?>"><?php echo $row['id']  ?></a></th>
            <th><?php echo $row['title']  ?></th>
            <th><?php echo $row['idea']  ?></th>
            <th><a href="delete.php?id=<?php echo $row['id']  ?>" style="color:red;">X<?php   ?></a></th>
        </tr>
        <?php endforeach;?>
       


    </table>

</body>

</html>