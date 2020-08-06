<?php



class IndexModel extends Model
{
    public function getData()
    {
        $sql = "SELECT * FROM product WHERE id = 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[$row['id']] = $row;
        }
        return $result;
    }
    public function getReviewData()
    {
        $sql = "SELECT * FROM reviews";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[$row['id']] = $row;
        }
        return $result;
    }
}