<?php
class Moderator
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getModerators()
    {
        $this->db->query('SELECT * FROM moderators');

        $results = $this->db->resultSet();

        return $results;
    }

    public function register($data)
    {
        $this->db->query('INSERT INTO moderators (name, email, password, position) VALUES(:name, :email, :password, :position)');
        // Bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':position', $data['position']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function findModeratorByEmail($email)
    {
        $this->db->query('SELECT * FROM moderators WHERE email = :email');
        // Bind value
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        // Check row
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function updateModerator($data)
    {
        $this->db->query('UPDATE moderators SET name = :name, email = :email, password = :password, position = :position WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':position', $data['position']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getModeratorById($id)
    {
        $this->db->query('SELECT * FROM moderators WHERE id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    public function deleteModerator($id)
    {
        $this->db->query('DELETE FROM moderators WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $id);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
