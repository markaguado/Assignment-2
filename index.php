<?php 
session_start();

	include("connection.php");
	include("functions/functions.php");

	$user_data = check_login($con);

?>
<?php include("custom-header.php")?>

    <section class="section-one">
        <div class="container-width">
            <h1>Welcome, <?php echo $user_data['first_name'];?>!</h1>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eaque dicta voluptate hic! Quaerat maiores aliquid facere, voluptates numquam sunt voluptatibus eaque consectetur dolor fugiat porro sit ipsum delectus minima maxime!</p>

            <form action="search-process.php" method="get" enctype="text/plain">

                <div class="searchContainer">
                    <div class="searchItems">
                        
                    </div>
                    <div class="searchItems">
                        <input type="search" id="searchInput" name="search" value="Search" size="50" onkeyup="searchFunction()">
                    </div>
                </div>

                <!-- <div class="radioContainer">
                    <div class="radioItems">
                        <input type="radio" id="highesttolowest" value="highesttolowest" name="card">
                        <label for="highesttolowest">Highest to Lowest</label>
                    </div>
                    <div class="radioItems">
                        <input type="radio" id="lowesttohighest" value="lowesttohighest" name="card">
                        <label for="lowesttohighest">Lowest to Highest</label>
                    </div>
                </div> -->
            </form>
           
        </div>
    </section>

    <div class="container-width">
        <div id="courseLevelContainer">
              <button class="btn active" onclick="filterSelection('all')"> Show all</button>
              <button class="btn" onclick="filterSelection('level1')">Level 1</button>
              <button class="btn" onclick="filterSelection('level2')">Level 2</button>
              <button class="btn" onclick="filterSelection('level3')">Level 3</button>
              <button class="btn" onclick="filterSelection('level4')">Level 4</button>
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
                    <img src="<?php echo $row['img_link'] ?>" alt="img-link" class="img-fluid">
                 
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

<?php include('footer.php')?>