<?php

namespace APP;

use PDO;
use DateTime;

class hoa_don
{
    private PDO $connection;

    public int $ID;
    public DateTime $timeDate;
    public int $idUser;
    public string $user_name;
    public string $address;
    public string $Phone;
    public int $tong_tien;
    public array $list_books;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }
    public function hoa_don_all(): array
    {
        $sql = 'SELECT a.ID_HD, b.timeDate, a.tong_tien, c.user_name
                FROM hoa_don_view a, hoa_don b, user c 
                WHERE a.ID_HD = b.ID_HD and c.id=b.ID_user
                ORDER BY a.ID_HD';
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $hoadon_es = [];
        while ($row = $statement->fetch()) {
            $hoadon = new hoa_don($this->connection);
            $hoadon->ID = $row['ID_HD'];
            $hoadon->timeDate = new DateTime($row['timeDate']);
            $hoadon->tong_tien = $row['tong_tien'];
            $hoadon->user_name = $row['user_name'];
            $hoadon_es[] = $hoadon;
        };
        return $hoadon_es;
    }

    public function hoa_don_theo_ID(int $ID_HD): hoa_don
    {
        $sql = 'SELECT *
                FROM hoa_don_view a, hoa_don b, user c
                WHERE a.ID_HD = b.ID_HD and c.id=b.ID_user and b.ID_HD = :ID_HD
                ORDER BY a.ID_HD';
        $statement = $this->connection->prepare($sql);
        $statement->execute(['ID_HD' => $ID_HD]);
        $row = $statement->fetch();
        $hoadon = new hoa_don($this->connection);
        $hoadon->ID = $row['ID_HD'];
        $hoadon->timeDate = new DateTime($row['timeDate']);
        $hoadon->tong_tien = $row['tong_tien'];
        $hoadon->address = $row['address'];
        $hoadon->user_name = $row['user_name'];
        $hoadon->Phone = $row['Phone'];
        return $hoadon;
    }
    // Trong class hoa_don
    public function add_HD(int $idUser, string $DateTime, array $list_books, string $address, string $phone): bool
    {
        // Tạo một hóa đơn mới
        $sql_insert_hoadon = 'INSERT INTO hoa_don (ID_user, address, timeDate, Phone) VALUES (:ID_user, :address, :timeDate, :Phone)';
        $statement_insert_hoadon = $this->connection->prepare($sql_insert_hoadon);
        $statement_insert_hoadon->bindParam(':ID_user', $idUser, PDO::PARAM_INT);
        $statement_insert_hoadon->bindParam(':address', $address, PDO::PARAM_STR);
        $statement_insert_hoadon->bindParam(':timeDate', $DateTime, PDO::PARAM_STR);
        $statement_insert_hoadon->bindParam(':Phone', $phone, PDO::PARAM_STR);
        $result_insert_hoadon = $statement_insert_hoadon->execute();
    
        if (!$result_insert_hoadon) {
            // Xử lý lỗi khi thêm hóa đơn
            return false;
        }
    
        // Lấy ID của hóa đơn vừa thêm
        $ID_HD = $this->connection->lastInsertId();
    
        // Thêm sách vào chi tiết hóa đơn
        $sql_insert_chitiet = 'INSERT INTO info_hoa_don (ID_HD, ID_SP, solg) VALUES (:ID_HD, :ID_SP, :solg)';
        $statement_insert_chitiet = $this->connection->prepare($sql_insert_chitiet);
    
        foreach ($list_books as $book) {
            $result_insert_chitiet = $statement_insert_chitiet->execute([
                ':ID_HD' => $ID_HD,
                ':ID_SP' => $book['id'],
                ':solg' => $book['soluong'],
            ]);
    
            if (!$result_insert_chitiet) {
                // Xử lý lỗi khi thêm chi tiết hóa đơn
                return false;
            }
        }
    
        return true;
    }
    
}
