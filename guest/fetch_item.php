<?php
require_once "../database/db_config.php";

$query="SELECT * FROM product ORDER BY id_product DESC";
$statement=$connection->prepare($query);
if($statement->execute()){
    $output='';
    $result=$statement->fetchAll();
    foreach ($result as $row){
        $output.='  
            <div class="col-md-3" style="margin-top:12px;">
             <div class="card" style="width: 18rem;"> 
              <img src="../img/privesci/'.$row["image"].'" class="card-img-top product-item-image"/> 
              <div class="card-body">
                <h4 class="text-info">'.$row["name"].'</h4>
                <h4 class="text-danger">'.$row["price"].' RSD</h4>
                <input type="text" name="quantity" id="quantity'.$row["id_product"].'" class="form-control" value="1">
                <input type="hidden" name="hidden_name" id="name'.$row["id_product"].'" value="'.$row["name"].'">
                <input type="hidden" name="hidden_price" id="price'.$row["id_product"].'" value="'.$row["price"].'">
                <input type="button"  name="add_to_cart" id="'.$row["id_product"].'" style="margin-top: 5px;" class="btn btn-success form-control add_to_cart" value="Add to Cart"> 
                </div>
               </div>
             </div>';

    }

echo $output;
}
/*<div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>*/