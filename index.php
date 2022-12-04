
<?php 
session_start();

	include("connection.php");
	include("functions/functions.php");

	$user_data = check_login($con);

?>
<?php include("header.php")?>

<!doctype html>

<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Mark Anthony Jr Aguado and Keite Gularte">
    <title>Music Academy - Home Page</title>
    <link rel="stylesheet" href="<?php echo 'css/style.css'; ?>" />
    <script src="<?php echo 'js/script.js'; ?>" defer></script>
    <script src="<?php echo 'js/form.js'; ?>" defer></script>
  </head>

  <body>
    
    <!-- 
        main page the user that login will see the contents on this webpage
    -->

    <main>
        <section class="section-one">
            <div class="container-width">
                <h1>Welcome, <?php echo $user_data['first_name'];?>!</h1>
                <p>Index description - In this page you will find all my courses available to you, classified by level. You can search them by name or filter by your level.</p>

                <form action="search-process.php" method="get" enctype="text/plain">

                    <div class="searchContainer">
                        <div class="searchItems">
                            
                        </div>
                        <div class="searchItems">
                            <input type="search" id="searchInput" name="search" value="Search" size="50" onkeyup="searchFunction()">
                        </div>
                    </div>

                </form>
            
            </div>
        </section>

        <div class="container-width">
            <div id="courseLevelContainer">
                <button class="btn active" onclick="filterSelection('all')"> Show all</button>
                <button class="btn" onclick="filterSelection('Level1')">Level 1</button>
                <button class="btn" onclick="filterSelection('Level2')">Level 2</button>
                <button class="btn" onclick="filterSelection('Level3')">Level 3</button>
                <button class="btn" onclick="filterSelection('Level4')">Level 4</button>
            </div>
        </div>

        <section class="section-two">
            <div class="container-width">
                <div class="display-flex">
                <!-- query statement from course_db to fetch values in database -->
                    <?php 
                        $query = "select * from course_db";
                        $result = mysqli_query($con, $query);
                        while($row = mysqli_fetch_array($result)){
                    ?>
                    <div class="cards-container flex-child <?php echo $row['level']?>">
                        <div class="img-container">
                            <img src="<?php echo $row['img_link'] ?>" alt="img-link" class="img-fluid">
                        </div>
                    
                        <div class="details">
                            <p class="course-title">
                                <?php 
                                    echo $row['title']
                                ?>
                            </p>
                            <p class="description">
                                Description: 
                                <?php 
                                    echo $row['description']
                                ?>
                            </p>
                            <p class="course-level">
                            <?php 
                                    echo $row['level']
                                ?>
                            </p>
                        </div>
                    </div>
                    <?php 
                            }
                    ?>
                </div>
            </div>
        </section>
    </main>

<?php include('footer.php')?>