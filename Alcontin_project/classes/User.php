<?php
class User {
    private $connect;

    public function __construct($connect)
    {
        $this->connect = $connect;
    }

    public function getAllUsers() {
        $sql = "SELECT * FROM users_table ORDER BY user_id DESC";
        $stmt = $this->connect->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addUser($first_name, $last_name, $email, $gender, $user_address, $username, $password) {
        $sql = "INSERT INTO users_table 
                (first_name, last_name, email, gender, user_address, username, password, date_created) 
                VALUES (?, ?, ?, ?, ?, ?, ?, CURDATE())";
        $stmt = $this->connect->prepare($sql);
        return $stmt->execute([$first_name, $last_name, $email, $gender, $user_address, $username, $password]);
    }

    public function updateUser($user_id, $first_name, $last_name, $email, $gender, $user_address, $username, $password) {
        $sql = "UPDATE users_table 
                SET first_name = ?, last_name = ?, email = ?, gender = ?, user_address = ?, username = ?, password = ?
                WHERE user_id = ?";
        $stmt = $this->connect->prepare($sql);
        return $stmt->execute([$first_name, $last_name, $email, $gender, $user_address, $username, $password, $user_id]);
    }

    public function deleteUser($user_id) {
        $sql = "DELETE FROM users_table WHERE user_id = :user_id";
        $stmt = $this->connect->prepare($sql);
        return $stmt->execute(['user_id' => $user_id]);
    }

    public function getUserbyId($user_id) {
        $sql = "SELECT * FROM users_table WHERE user_id = :user_id";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute(['user_id' => $user_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
