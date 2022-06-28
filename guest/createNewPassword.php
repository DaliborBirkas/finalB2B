<?php require_once "../header.php";
?>

            <?php
            $selector=$_GET['selector'];
            $validator=$_GET['validator'];
            if (empty($selector) || empty($validator)){
                echo "Nismo mogli da nadjemo vas zahtev";
            }
            else{
                if (ctype_xdigit($selector) !== false && ctype_xdigit($validator)!==false){
               // echo '<script>alert("'.$selector.'")</script>';
              //  echo '<script>alert("'.$validator.'")</script>';
                    ?>

    <div class="container w-100 p-4 border border-disabled">
        <h3 style="text-align: center">Resetuj lozinku</h3>
        <form class="form-row" method="post" action="resetPassword.php">
            <div>
                <div class="form-group m-2">
                    <input type="hidden" class="form-control" name="selector" value="<?php echo $selector?>">
                    <input type="hidden" class="form-control" name="validator" value="<?php echo $validator?>">
                </div>
                <div class="form-group m-2">
                    <label for="password">Nova lozinka </label><span style="color: red"></span>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Nova lozinka">
                </div>
                <div class="form-group m-2">
                    <label for="passwordCheck">Ponovi lozinku </label><span style="color: red"></span>
                    <input type="password" class="form-control" id="passwordCheck" name="passwordRepeat" placeholder="Ponovi lozinku lozinka">
                </div>
                <button type="submit" name="resetPassword" class="btn btn-primary">Resetuj lozinku</button>
            </div>
        </form>

    </div>


                    <?php
                }
            }
            ?>


<?php
require_once "../footer.php"?>