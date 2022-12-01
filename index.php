<?php include("database/db.php")?>
<?php include("includes/header.php")?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4">
            <?php if(isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show " role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            <?php session_unset(); } ?>
            <div class="card card-body border border-dark ">
                <form action="save_task.php" method="POST">
                    <div class="form-group">
                        <input 
                            type="text" 
                            name="title" 
                            class="form-control border border-dark" 
                            placeholder="Task Title" 
                            autofocus
                        >
                    </div>
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

        </div>
    </div>
</div>
<?php include("includes/footer.php")?>

