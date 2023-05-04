<?php
namespace app\models;

use PDO;

class User extends Model {
    protected $table = 'users';

    public function userByEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email=:email";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}