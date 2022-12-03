<?php 
session_start();

	include("connection.php");
	include("functions/admin-function.php");

	$user_data_admin = check_admin($con);

    // content management
     if($_SERVER['REQUEST_METHOD'] == "POST"){
        // something was posted
        $img_link = $_POST['img_link'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $level = $_POST['level'];
       
        // checks if input is not empty
        if(!empty($img_link) && !empty($title) &&!empty($description) &&!empty($level)){
            $query = "insert into course_db (img_link,title,description,level) values ('$img_link','$title','$description','$level')";
        
            mysqli_query($con, $query);

            header("Location: administrator.php");
            die;
        }

    }
    
?>


<?php include("custom-header.php")?>

    <!-- manage website users -->
    <section class="admin-firstfold">
        <div class="container-width">
    
            <h1>You are login as: <?php echo $user_data_admin['admin_user'] ?></h1>
          
            <h2>
                Manage User Accounts
            </h2>
    
            <!-- users table -->
            <div class="scrollable-on-mobile">
                <table class="table table-sm">
                    <thead>
                    
                        <tr>
                            <th>
                                Email
                            </th>
                            <th>
                                First Name
                            </th>
                            <th>
                                Last Name
                            </th>
                            <th>
                                Phone Number
                            </th>
                            <th>
                                Birth Date
                            </th>
                            <th>
                                Account Created
                            </th>
                            <th>
                                Delete
                            </th>
                            <th>
                                Update
                            </th>
                        </tr>
                        
                    </thead>
                    <tbody>
                        <?php 
                                $query = "select * from users";
                                $result = mysqli_query($con, $query);
                                while($row = mysqli_fetch_array($result)){
                        ?>
                        <tr>
                            <td>
                                <?php echo $row['email']; ?>
                                
                            </td>
                            <td>
                                <?php echo $row['first_name']; ?>
                            </td>
                            <td>
                                <?php echo $row['last_name']; ?>
                            </td>
                            <td>
                                <?php echo $row['phone_number']; ?>
                            </td>
                            <td>
                                <?php echo $row['birth_date']; ?>
                            </td>
                            <td>
                                <?php echo $row['data']; ?>
                            </td>
                            <td>
                                <a href="delete.php?id=<?php echo $row['id'] ?>">Delete</a>
                            </td>
                            <td>
                                <a href="edit.php?id=<?php echo $row['id'];?>">update</a>
                            </td>
                        </tr>
                        <?php 
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            
        </div>
        
    </section>

    <!-- content mananegment system for index -->
    <section class="admin-secfold">
        <div class="container-width">
            <h2>Manage Contents in Homepage</h2>
            <!-- nice to have -->
            <div class="cms-flex-container">
                <div class="cms-flex-child">
                    <div class="scrollable-on-mobile">
                        <table class="table table-sm cms-table">
                            <thead>
                            
                                <tr>
                                    <th>
                                        Image Picture
                                    </th>
                                    <th>
                                        Lesson Title
                                    </th>
                                    <th>
                                       Lesson Decription
                                    </th>
                                    <th>
                                        Level of Lesson
                                    </th>
                                    <th>
                                        Delete
                                    </th>
                                </tr>
                                
                            </thead>
                            <tbody>
                                <?php 
                                        $query = "select * from course_db";
                                        $result = mysqli_query($con, $query);
                                        while($row = mysqli_fetch_array($result)){
                                ?>
                                <tr>
                                    <td>
                                        <img src="<?php echo $row['img_link']; ?>" alt="Image row">
                                    </td>
                                    <td>
                                        <?php echo $row['title']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['description']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['level']; ?>
                                    </td>
                                    <td>
                                        <a href="delete.php?id=<?php echo $row['id'] ?>">Delete</a>
                                    </td>
                                </tr>
                                <?php 
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <form method="post" id="cms-form" class="cms-flex-child">
                    <div class="input-group">
                        <label for="img_link">Image Link URL</label>
                        <input class="form-control" type="text" name="img_link">
                    </div>
                    <div class="input-group">
                        <label for="title">Lesson Title</label>
                        <input class="form-control" type="text" name="title">
                    </div>
                    <div class="input-group">
                        <label for="description">Lesson Description</label>
                        <input class="form-control" type="text" name="description">
                    </div>
                    <div class="input-group">
                        <label for="level">Level of Lesson</label>
                        <select class="form-control" name="level" id="">
                            <option value="Level1">Level 1</option>
                            <option value="Level2">Level 2</option>
                            <option value="Level3">Level 3</option>
                            <option value="Level4">Level 4</option>
                        </select>
                    </div>
                    
                    <div class="button-container">
                        <button type="submit" class="default-button">Create Course</button>
                
                        <button type="reset" class="default-button">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <?php include("footer.php")?>