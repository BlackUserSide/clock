<?php



class CatalogModel extends Model
{
    public function getDataProduct()
    {
        $sql = "SELECT * FROM product";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $res = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $res[$row['id']] = $row;
        }
        return $res;
    }
    public function getDataProducts($id)
    {
        $sql = "SELECT * FROM product WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue('id', $id, PDO::PARAM_STR);
        $stmt->execute();
        $res = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $res[$row['id']] = $row;
        }
        return $res;
    }
}