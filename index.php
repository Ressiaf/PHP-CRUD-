<?php include("database/db.php")?>
<?php include("includes/header.php")?>
<div class="container p-4">
    <div class="row">
        <!-- ADD TASK FORM  -->
        <div class="col-md-4">
            <!-- Alert whit session message  -->
            <?php if(isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show " role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            <?php session_unset(); } ?>
            <div class="card card-body border border-dark ">
                <form action="save_task.php" method="POST">
                    <!-- Task title input  -->
                    <div class="form-group">
                        <input 
                            type="text" 
                            name="title" 
                            class="form-control border border-dark" 
                            placeholder="Task Title" 
                            autofocus
                        >
                    </div>
                    <!-- Task description input -->
                    <div class="form-group">
                        <textarea 
                        name="description" 
                        rows="4"
                        cols="10"
                        class="form-control mt-4 text-secondary border border-dark" 
                        placeholder="Task Description"
                        />
                        </textarea>
                    </div>
                    <input type="submit" class="btn btn-outline-dark btn-block py-8 mt-4" name="save_task" value="Save Task 📂">
                </form>
            </div>
        </div>
        <div class="col md-8">
                <!-- TASK LIST  -->
                <table class="table table-bordered  border border-dark">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody >
                        <?php 
                        $query = "SELECT * FROM task";
                        $result_tasks = mysqli_query($conn , $query);
                        while($row = mysqli_fetch_array($result_tasks)) { ?>
                            <tr >
                                <td><?php echo $row['Title'] ?></td>
                                <td><?php echo $row['Description'] ?></td>
                                <td><?php echo $row['Created_at'] ?></td>
                                <td >
                                    <a 
                                        href="edit_task.php?id=<?php echo $row['ID'] ?>"
                                        class="btn btn-outline-secondary mx-3 "
                                    >
                                        ✒
                                    </a>
                                    <a 
                                        href="delete_task.php?id=<?php echo $row['ID'] ?>"
                                        class="btn btn-outline-danger "
                                    >
                                        🗑
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

        </div>
    </div>
</div>
<?php include("includes/footer.php")?>

