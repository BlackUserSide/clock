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
    public function addReview($text, $name, $position)
    {
        $sql = "INSERT INTO reviews (text, name, position) 
        VALUES (:text, :name, :position)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue('text', $text, PDO::PARAM_STR);
        $stmt->bindValue('name', $name, PDO::PARAM_STR);
        $stmt->bindValue('position', $position, PDO::PARAM_STR);
        $stmt->execute();
    }
}