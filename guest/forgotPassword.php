<?php require_once "../header.php";
?>



<div class="container w-100 p-4 border border-disabled" >
    <h3 style="text-align: center">Resetuj lozinku</h3>
    <p style="background-color: #909090; font-weight: bold; border-radius: 10px;" class="p-2 border border-dark">Zaboravio si sifru? Nikakav problem unesi svoj email</p>
    <form class="form-row" method="post" action="resetRequest.php">
        <div>
            <div class="form-group m-2">
                <label for="email">E-mail </label><span style="color: red"></span>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email adresa">
            </div>
        </div>
        <button type="submit" name="reset" class="btn btn-primary">Reset</button>
    </form>
    <?php
    if (isset($_GET['reset'])){
        if ($_GET['reset']="success"){
            echo '<p class="signupsuccess">Check your email </p>';
        }
    }
    ?>
</div>
<?php
require_once "../footer.php"?>