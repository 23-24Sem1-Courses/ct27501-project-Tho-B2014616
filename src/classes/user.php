<?php
// namespace APP\classes\;

// use PDO;
class user{
    private PDO $connection;

    public int $ID;
    public string $username;
    public string $user_email;
    public string $user_pass;
    public string $role;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function check_admin($username): bool {
        $sql = 'SELECT role FROM user WHERE user_name = :username';
        $statement = $this->connection->prepare($sql);
        $statement->execute(['username' => $username]);
        $user = $statement->fetch(PDO::FETCH_ASSOC);

        // Kiểm tra xem người dùng có tồn tại và có quyền admin không
        if ($user['role'] == 1) {
            return true; // Người dùng có quyền admin
        } else {
            return false; // Người dùng không có quyền admin hoặc không tồn tại
        }
    }

    public function check_user_name($username, $user_pass): bool {
        $sql = 'SELECT * FROM user WHERE user_name = :username';
        $statement = $this->connection->prepare($sql);
        $statement->execute([
            'username' => $username
        ]);
    
        $user = $statement->fetch(PDO::FETCH_ASSOC);
    
        // Kiểm tra xem có người dùng với tên người dùng đã cho không và kiểm tra mật khẩu
        if ($user !== false && $user_pass == $user['user_pass']) {
            return true; // Tên người dùng và mật khẩu khớp
        } else {
            return false; // Tên người dùng không tồn tại hoặc mật khẩu không khớp
        }
    }
    
    public function add_user($username, $user_email, $user_pass): int {
        // Kiểm tra xem tên người dùng đã tồn tại chưa
        if ($this->is_username_exists($username)) {
            return 0; // Tên người dùng đã tồn tại
        }

        // Kiểm tra xem email đã tồn tại chưa
        if ($this->is_email_exists($user_email)) {
            return -1; // Email đã tồn tại
        }

        // Câu lệnh SQL để chèn một người dùng mới
        $sql = 'INSERT INTO user (user_name, user_email, user_pass) VALUES (:username, :user_email, :user_pass)';
        
        // Chuẩn bị câu lệnh SQL
        $statement = $this->connection->prepare($sql);
        
        // Thực thi câu lệnh SQL với các tham số đã được cung cấp
        $result = $statement->execute([
            'username' => $username,
            'user_email' => $user_email,
            'user_pass' => $user_pass
        ]);

        // Kiểm tra xem thêm người dùng có thành công không
        return $result;
    }

    // Kiểm tra xem tên người dùng đã tồn tại chưa
    private function is_username_exists($username): bool {
        $sql = 'SELECT COUNT(*) FROM user WHERE user_name = :username';
        $statement = $this->connection->prepare($sql);
        $statement->execute(['username' => $username]);
        $count = $statement->fetchColumn();

        return $count > 0;
    }

    // Kiểm tra xem email đã tồn tại chưa
    private function is_email_exists($user_email): bool {
        $sql = 'SELECT COUNT(*) FROM user WHERE user_email = :user_email';
        $statement = $this->connection->prepare($sql);
        $statement->execute(['user_email' => $user_email]);
        $count = $statement->fetchColumn();

        return $count > 0;
    }



    public function update_user($ID, $username, $user_email, $user_pass): bool {
        // Câu lệnh SQL để cập nhật thông tin người dùng
        $sql = 'UPDATE users SET user_name = :username, user_email = :user_email, user_pass = :user_pass WHERE ID = :ID';
    
        $statement = $this->connection->prepare($sql);
    
        // Thực hiện cập nhật với mật khẩu mới (nếu có)
        $hashedPassword = !empty($user_pass) ? password_hash($user_pass, PASSWORD_DEFAULT) : null;
    
        // Thực thi câu lệnh SQL với các tham số đã được cung cấp
        $result = $statement->execute([
            'ID' => $ID,
            'username' => $username,
            'user_email' => $user_email,
            'user_pass' => $hashedPassword
        ]);
    
        // Kiểm tra xem cập nhật có thành công không
        return $result;
    }
    

    public function user_all(): array {
        $sql = 'SELECT * FROM user';
        $statement = $this->connection->prepare($sql);
        $statement->execute();
    
        $users = $statement->fetchAll(PDO::FETCH_ASSOC);
    
        return $users;
    }

    public function delete($user_id): bool {
        $sql = 'DELETE FROM user WHERE user_id = :user_id';
        $statement = $this->connection->prepare($sql);
        
        // Bind giá trị của user_id và thực thi câu lệnh SQL
        $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $result = $statement->execute();
    
        return $result;
    }
    
    
}

?>