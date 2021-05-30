<?php 

include_once('server.php');
//helper class
class ProductQueries 
{
    public static function updateFurniture($item_id,$product_name,$product_price,$product_description,$material,$category)
{
    $con =  Dbh::connect();
    $query = $con->prepare("
    UPDATE furniture
     SET name = :name, price = :price, description = :description, material = :material, category = :category 
    WHERE id=:id
    ");
    $query->bindParam(":name", $product_name);
    $query->bindParam(":price", $product_price);
    $query->bindParam(":description", $product_description);
    $query->bindParam(":material", $material);
    $query->bindParam(":category", $category);
    $query->bindParam(":id",$item_id);

    return $query->execute();
}

public static function getFurnitureById($id) {
        
        $sql = "SELECT * FROM furniture WHERE id = ?";
        $stmt = Dbh::connect()->prepare($sql);

        $stmt->execute([$id]);
        $result = $stmt->fetch();


        return $result;
        
    }
    //to insert into the database
public static function addFurniture($con, $name, $price, $description, $material, $category, $file_name) {
            $query = $con->prepare("
            INSERT INTO  furniture (id,name,price,description,material,category, file_name)

            VALUES(NULL,:product_name,:price,:product_description,:material,:category, :file_name)
        ");
        $query->bindParam(":product_name",$name);
        $query->bindParam(":price",$price);
        $query->bindParam(":product_description",$description);
        $query->bindParam(":material",$material);
        $query->bindParam(":category",$category);
        $query->bindParam(":file_name",$file_name);

return $query->execute();
    }

    public static function getAllFurniture() {
        
        $sql = "SELECT * FROM furniture";
        $stmt = Dbh::connect()->prepare($sql);

        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function getFurnitureByCategory($category) {
        
        $sql = "SELECT id, name, price , description, material, category, file_name FROM furniture where category = :category and deleted = 0";
        $stmt = Dbh::connect()->prepare($sql);
        $stmt ->bindParam(":category", $category);
        $i = 0;
        $stmt->execute();
        $result = null;
        foreach ($stmt as $row) {
            $result[$i] = new Furniture($row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6]);
            $i++;
        }
        
        
        
        return $result;

    }

    public static function getFurnitureByName($name) {
        
        $sql = "SELECT id, name, price , description, material, category, file_name FROM furniture where name = :name and deleted = 0";
        $stmt = Dbh::connect()->prepare($sql);
        $stmt ->bindParam(":name", $name);
        $i = 0;
        $stmt->execute();
        $result = null;
        foreach ($stmt as $row) {
            $result[$i] = new Furniture($row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6]);
            $i++;
        }
        
        
        
        return $result;

    }


    public static function deleteFurniture($item_id) {
        $con =  Dbh::connect();
        $query = $con->prepare("
        UPDATE furniture
         SET deleted = TRUE
        WHERE id=:id
        ");
        $query->bindParam(":id",$item_id);
    
        return $query->execute();
    }


}

?>