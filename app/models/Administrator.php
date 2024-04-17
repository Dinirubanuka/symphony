<?php
class Administrator
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function register($data)
  {
    $this->db->query('INSERT INTO administrators (admin_name, admin_email, admin_contact_no, admin_nic, admin_address, password) VALUES(:admin_name, :admin_email, :admin_contact_no, :admin_nic, :admin_address, :password)');
    // Bind values
    try {
      $this->db->bind(':admin_name', $data['admin_name']);
      $this->db->bind(':admin_email', $data['admin_email']);
      $this->db->bind(':admin_contact_no', $data['admin_contact_no']);
      $this->db->bind(':admin_nic', $data['admin_nic']);
      $this->db->bind(':admin_address', $data['admin_address']);
      $this->db->bind(':password', $data['password']);

      // Execute
      if ($this->db->execute()) {
        return true;
      } else {
        return false;
      }
    } catch (PDOException $e) {

      die($e->getMessage());
    }
  }

  public function addmoderator($data)
  {
    $this->db->query('INSERT INTO moderators (moderator_name, moderator_email, moderator_contact_no, moderator_nic, moderator_address, password, type) VALUES(:moderator_name, :moderator_email, :moderator_contact_no, :moderator_nic, :moderator_address, :password, :type)');
    // Bind values
    try {
      $this->db->bind(':moderator_name', $data['moderator_name']);
      $this->db->bind(':moderator_email', $data['moderator_email']);
      $this->db->bind(':moderator_contact_no', $data['moderator_contact_no']);
      $this->db->bind(':moderator_nic', $data['moderator_nic']);
      $this->db->bind(':moderator_address', $data['moderator_address']);
      $this->db->bind(':password', $data['password']);
      $this->db->bind(':type', $data['type']);

      // Execute
      if ($this->db->execute()) {
        return true;
      } else {
        return false;
      }
    } catch (PDOException $e) {

      die($e->getMessage());
    }
  }

  public function getModerators()
  {
    $this->db->query('SELECT * FROM moderators');
    $results = $this->db->resultSet();
    return $results;
  }

  public function deleteModerator($moderator_id)
  {
    $this->db->query('DELETE FROM moderators WHERE moderator_id = :moderator_id');
    // Bind values
    $this->db->bind(':moderator_id', $moderator_id);

    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function getUsers()
  {
    $this->db->query('SELECT * FROM users');
    $results = $this->db->resultSet();
    return $results;
  }


  public function deleteUser($id)
  {
    $this->db->query('DELETE FROM users WHERE id = :id');
    // Bind values
    $this->db->bind(':id', $id);

    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function getServiceProviders()
  {
    $this->db->query('SELECT * FROM serviceproviders');
    $results = $this->db->resultSet();
    return $results;
  }

  public function getPendingServiceProviders()
  {
    $this->db->query('SELECT * FROM serviceproviders WHERE verification > 100000 AND verification < 150000');
    $results = $this->db->resultSet();
    return $results;
  }

  public function getActivatedServiceProviders()
  {
    $this->db->query('SELECT * FROM serviceproviders WHERE verification > 150000 AND verification < 200000');
    $results = $this->db->resultSet();
    return $results;
  }

  public function updateServiceProviderStateById($data)
  {
    $this->db->query('UPDATE serviceproviders SET verification = :verification WHERE id = :id');
    // Bind values
    $this->db->bind(':verification', $data['verification']);

    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }


  public function getDeactivatedServiceProviders()
  {
    $this->db->query('SELECT * FROM serviceproviders WHERE verification > 200000');
    $results = $this->db->resultSet();
    return $results;
  }

  public function getServiceProvider($serviceprovider_id)
  {
    $this->db->query('SELECT * FROM serviceproviders WHERE serviceprovider_id = :serviceprovider_id');
    $this->db->bind(':serviceprovider_id', $serviceprovider_id);
    $result = $this->db->single(); // Use fetch instead of resultSet
    return $result;
  }

  public function deleteServiceProvider($serviceprovider_id)
  {
    $this->db->query('DELETE FROM serviceproviders WHERE serviceprovider_id = :serviceprovider_id');
    // Bind values
    $this->db->bind(':serviceprovider_id', $serviceprovider_id);

    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }


  public function view($admin_id)
  {
    $this->db->query('SELECT * FROM administrators WHERE admin_id = :admin_id');
    $this->db->bind(':admin_id', $admin_id);
    $results = $this->db->single();
    return $results;
  }

  // Login User
  public function login($admin_email, $password)
  {
    $this->db->query('SELECT * FROM administrators WHERE admin_email = :admin_email');
    $this->db->bind(':admin_email', $admin_email);

    $row = $this->db->single();

    $hashed_password = $row->password;
    if (password_verify($password, $hashed_password)) {
      return $row;
    } else {
      return false;
    }
  }

  // Find user by email
  public function findAdministratorByEmail($admin_email)
  {
    $this->db->query('SELECT * FROM administrators WHERE admin_email = :admin_email');
    // Bind value
    $this->db->bind(':admin_email', $admin_email);

    $row = $this->db->single();

    // Check row
    if ($this->db->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function findModeratorByEmail($moderator_email)
  {
    $this->db->query('SELECT * FROM moderators WHERE moderator_email = :moderator_email');
    // Bind value
    $this->db->bind(':moderator_email', $moderator_email);

    $row = $this->db->single();

    // Check row
    if ($this->db->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }

  // Get User by ID
  public function getAdministratorById($admin_id)
  {
    $this->db->query('SELECT * FROM administratorss WHERE admin_id = :admin_id');
    // Bind value
    $this->db->bind(':admin_id', $admin_id);

    $row = $this->db->single();

    return $row;
  }
}
