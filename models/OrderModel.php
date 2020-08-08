<?php



class OrderModel extends Model {
    public function addOrder($email, $fullName, $country, $postal, $address, $apartment, $city, $phone, $numberOrder, $discount, $price)
    {
        $sql = "INSERT INTO orders (mail, fullName, country, postalCode, address, apartment, city, phone, numberOrder, discount, price)
        VALUES (:mail, :fullName, :country, :postalCode, :address, :apartment, :city, :phone, :numberOrder, :discount, :price)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue('mail', $email, PDO::PARAM_STR);
        $stmt->bindValue('fullName', $fullName, PDO::PARAM_STR);
        $stmt->bindValue('country', $country, PDO::PARAM_STR);
        $stmt->bindValue('postalCode', $postal, PDO::PARAM_STR);
        $stmt->bindValue('address', $address, PDO::PARAM_STR);
        $stmt->bindValue('apartment', $apartment, PDO::PARAM_STR);
        $stmt->bindValue('city', $city, PDO::PARAM_STR);
        $stmt->bindValue('phone', $phone, PDO::PARAM_STR);
        $stmt->bindValue('numberOrder', $numberOrder, PDO::PARAM_STR);
        $stmt->bindValue('discount', $discount, PDO::PARAM_STR);
        $stmt->bindValue('price', $price, PDO::PARAM_STR);
        $stmt->execute();

    }
    public function addOrderItem($idProd, $qnt, $numberOrder)
    {
        $sql = "INSERT INTO orderitems (idProduct, qnt, numberOrder)
        VALUES (:id, :qnt, :number)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue('id', $idProd, PDO::PARAM_STR);
        $stmt->bindValue('qnt', $qnt, PDO::PARAM_STR);
        $stmt->bindValue('number', $numberOrder, PDO::PARAM_STR);
        $stmt->execute();
    }
}