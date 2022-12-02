<?php 
    include("database/db.php");

    if (isset($_GET['id'])){
        $id= $_GET['id'];
        $query= "SELECT * FROM task WHERE ID = $id";
        $result= mysqli_query($conn , $query);
        if(mysqli_num_rows($result) == 1){ 
            $row = mysqli_fetch_array($result);
            $title = $row['Title'];
            $description = $row['Description'];
        }
    }

    if(isset($_POST['update'])) {
        $id= $_GET['id'];
        $new_title = $_POST['title'];
        $new_description = $_POST['description'];
        $query = "UPDATE task set Title = '$new_title' , Description = '$new_description' WHERE ID = '$id' ";
        mysqli_query($conn , $query);

        $_SESSION['message'] = "Task updated successfully ✒ ✨";
        $_SESSION['message_type'] = "secondary";
        header("Location: index.php");
    }
?>

<?php include("includes/header.php")?>

<div class="container p-4">
    <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">
                    <form action="edit_task.php?id=<?php  echo $_GET['id']; ?>" method="POST">
                        <div class="form-group">
                            <input 
                                type="text" 
                                name="title" 
                                value="<?php echo $title; ?>" 
                                class="form-control"
                                placeholder="Update title  "
                            >
                        </div>
                        <div class="form-group">
                            <textarea                         
                                name="description" 
                                rows="4"
                                class="form-control mt-4"
                                placeholder="Update description " 
                            ><?php echo $description; ?></textarea>
                            <button class="btn btn-secondary mt-4" name="update">
                                Update ✒
                            </button>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</div>


<?php include("includes/footer.php")?>
