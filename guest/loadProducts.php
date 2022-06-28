<?php
session_start();
require_once "../database/db_config.php";
require_once "../header.php";
use PHPMailer\PHPMailer\PHPMailer;
     		 require_once "../PHPMailer/src/SMTP.php";
            require_once "../PHPMailer/src/Exception.php";
            require_once "../PHPMailer/src/PHPMailer.php";
  
require_once "ProcessingOrder.php";
if (isset($_SESSION['idUser'])){


?>

<div class="container text-success">
        <br />
    <?php
    if (isset($_SESSION['newUser'])){
      echo '<h3>'.$_SESSION['newUser'].'</h3>';
      unset($_SESSION['newUser']);
    }?>
        <h3 align="center"> Nasi proizvodi</h3>
        <br />
    <div class="pos-f-t ">
        <nav class="navbar navbar-light bg-warning " role="navigation" >
            <div class="container-fluid " >
                <div class="navbar-header "  >
                    <button class="navbar-toggler btn btn-light" type="button"  id="btn-Cart" onclick="btnCart()"  data-bs-toggle="collapse" data-bs-target="#popover_content_wrapper" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation" style="color:#000;" >
                    <span class="visually-hidden-focusable">Menu</span>
                        <span><b>Moja korpa</b></span>
                   <span> <b><i class="bi bi-cart4"></i></b></span>
                        <span class="badge" style="color: red;font-size: 20px" ></span>
                       <b> <span class="total_price">0.00 </span></b>
                    </button>
                </div>
            </div>
        </nav>
    </div>
    <div id="popover_content_wrapper"   >
        <span id="cart_details"></span>
        <div align="right" id="buttons" style="display:none;">
            Nastavi sa porudzbenicom->    <input type="button"  class="btn btn-secondary" id="order-button" value="Dalje">
            <a href="#"  class="btn btn-danger" id="clear_cart">
                <span class="glyphicon glyphicon-trash"></span> Obrisi sve
            </a>

        </div>
        <?php


        ?>
        <div id='details-form' style="display: none" >

            <?php
            require_once "ProcessingOrder.php";

            $po=new ProcessingOrder();
            $po->renderForm();


           if(isset($_POST['company-address'] ) &&isset($_POST['city']) && isset($_POST['number']) ){
               $address=$_POST['company-address'];
               $city=$_POST['city'];
               $number=$_POST['number'];
               $note=$_POST['note'];
               $po->setCompanyAddress($address);
               $po->setIdCity($city);
               $po->setMobilePhone($number);
               $po->setNote($note);
               var_dump($po->getCompanyAddress());
               var_dump($po->getIdCity());
             //  var_dump($po->getMobilePhone());
             //  var_dump($_SESSION["shopping_cart"]);
                $boolean=false;
                $date=date('Y-m-d H:i:s');
                var_dump($date);
               $query="INSERT INTO orders(id_customer,order_note,datetime,is_sent) values (:id_customer,:order_note,:datetime,:is_sent)";
               $statement=$connection->prepare($query);

               $statement->bindParam(":id_customer", $_SESSION['idUser'], PDO::PARAM_INT);
               $statement->bindParam(":order_note", $note, PDO::PARAM_STR);
               $statement->bindParam(":datetime", $date);
               $statement->bindParam(":is_sent", $boolean, PDO::PARAM_BOOL);
               $statement->execute();
               $last_id = $connection->lastInsertId();
            //   var_dump($last_id);
            //   var_dump($_SESSION['shopping_cart']);
               $totalPrice=0;
             $mail_body="<table>
                    <tr>
                         <th>
                            Naziv proizvoda
                        </th>
                        <th>Cena</th>
                        <th>Kolicina</th>
                        <th>Ukupnp</th>
                        
                    </tr>
                    </table>";
                foreach ($_SESSION["shopping_cart"] as $value){


                       // var_dump($value);
                        $total= intval($value["product_quantity"]) * floatval($value['product_price']);
                    $totalPrice=$total+$totalPrice;
                        var_dump($total);
                        $last_id=intval($last_id);
                        $id=intval($value["product_id"]);
                        $quantity=$value["product_quantity"];
                        var_dump($last_id,$id);

                        $sql="INSERT INTO ordered_products(id_order,id_product,total_price,count) values (:id_order,:id_product,:total_price,:quantity)";
                        $stmt=$connection->prepare($sql);
                        $stmt->bindParam(":id_order", $last_id );
                        $stmt->bindParam(":id_product", $id );
                        $stmt->bindParam(":total_price", $total);
                        $stmt->bindParam(":quantity", $quantity);
                 
                        $stmt->execute();
                
                 $sql2="SELECT * FROM product where id_product=:id_product";
                            $stmt2=$connection->prepare($sql2);
                            $stmt2->bindParam('id_product',$id);
                            $stmt2->execute();
                            $row=$stmt2->fetch();

                            $products[]=$row['name'];



                      echo '<script src="../script/customer/btn-showing-form.js"></script>';


                }
           


               $date2=date('Y-m-d');
                $findUserTraffic="SELECT * FROM traffic where id_customer=:id_customer and date=:datee";
                $stmt2=$connection->prepare($findUserTraffic);
               $stmt2->bindParam(":id_customer", $_SESSION['idUser'], PDO::PARAM_INT);
               $stmt2->bindParam(":datee", $date2);
               $stmt2->execute();
                $result=$stmt2->fetchAll();
                $currentOwes=0;
                if ($result>0){
                    foreach ($result as $value){
                        $currentOwes=$value["owes"];
                        $currentOwes=$currentOwes+$totalPrice;
                        $update="UPDATE traffic SET owes=:owes where id_customer=:id_customer and date=:datee";
                        $stmt3=$connection->prepare($update);
                        $stmt3->bindParam(":id_customer", $_SESSION['idUser'], PDO::PARAM_INT);
                        $stmt3->bindParam(":datee", $date2) ;
                        $stmt3->bindParam(":owes", $currentOwes);
                        $stmt3->execute();
                    }

                }
                else{
                    $insertTraffic="INSERT INTO traffic(id_customer,date,owes,requires) values (:id_customer,:datee,:owes,:requires)";
                    $statement2=$connection->prepare($insertTraffic);
                    $statement2->bindParam(":id_customer", $_SESSION['idUser'], PDO::PARAM_INT);
                    $statement2->bindParam(":datee", $date2);
                    $statement2->bindParam(":owes", $totalPrice );
                    $statement2->bindParam(":requires", $totalPrice);
                    $statement2->execute();
                }
            $mail = new PHPMailer(true);
         $to=$_SESSION['email'];
         $name=$_SESSION['name'];
         $proizvodi='';
         foreach ($products as $value){
            $proizvodi.=$value.',';
        }
           echo
                $mail->setFrom('koznagalenterija@gmail.com');
                $mail->addAddress($to,$name);
                $mail->Subject = "Your items";
                $mail->isHTML(true);
                $mail->Body = '
                         <html lang="en">
                         <head>
                         <title>Porudzbina</title>
                         </head>
                         <body>
                         <h1>Postavni '.$name.', ovo su vasi naruceni proizvodi</h1>
                <h4> '.$proizvodi.'</h4>
                <h3> Ukupna cena za ovu narudzbinu iznosi '.$totalPrice.' RSD</h3>
                <h2>Adresa za dostavu: '.$address.'</h2>
                <h3>Grad: '.$city.'</h3>
                <h3>Napomena: '.$note.'</h3>
                <h3>Kontakt: '.$number.'</h3>
                <br>
                <p>Pozdrav,</p>
                    <p>Dalibor Birkas</p>
                        <p>Kozna galenterija</p>
                        <p>Kontakt telefon: 061700500</p>
                         </body>
                        <br>
                    
                        </html>
                         ';
                
           

               unset($_SESSION['shopping_cart']);

           $mail->send();

           }

            ?>
        </div>
    </div>


        <div class="row"   id="display_item">
           <div><img src="../images/ajax_loader_orange_512.gif" alt="loading" width="100px" ></div>
        </div>
    </div>

<br />
<?php
}
else{
    ?>
    <div class="container">
        <div class="row">
            <div class="row"><h1>Ulogujte te se ili se registrujte da bi ste videli proizvode</h1></div>
        </div>
    </div>


    <?php
}
require_once "../footer.php";
?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="../script/customer/load-products-customer.js"></script>
<script src="../script/customer/load-products-customer-logout.js"></script>
<script src="../script/customer/btn-showing-form.js"></script>
<script>


</script>



</body>

</html>


