<?php
class Serviceprovider
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getServiceproviders()
    {
        $this->db->query('SELECT * FROM serviceproviders');

        $results = $this->db->resultSet();

        return $results;
    }

    public function deleteServiceprovider($id)
    {
        $this->db->query('DELETE FROM serviceproviders WHERE serviceprovider_id = :id');
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
