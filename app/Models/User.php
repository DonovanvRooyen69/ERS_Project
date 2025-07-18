<?php
namespace App\Models;

use App\Models\Database;

class User{
    /**
     * Authenticates a user by email and password.
     *
     * @param string $email
     * @param string $password The plain-text password provided by the user.
     * @return array|null User data if authenticated, null otherwise.
     */

    public static function authenticate($accountId, $username ,$plainPassword){
        $db = Database::getInstance();
        $mysqli = $db->getConnection();

        $stmt = $mysqli->prepare("SELECT id, username, email, password FROM users WHERE id = ? AND username = ?");
        $stmt->bind_param('is', $accountId, $username);

        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();

        if($user && password_verify($plainPassword, $user['password'])){
            unset($user['password']);
            return $user;
        }
        return null;
    }

    /**
     * Creates a new user in the database.
     *
     * @param string $name
     * @param string $email
     * @param string $plainPassword The plain-text password to be hashed and stored.
     * @return bool True on success, false on failure.
     */

    public static function create($name, $email, $plainPassword){
        $db = Database::getInstance();
        $mysqli = $db->getConnection();

        $hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);
        $stmt = $mysqli->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param('sss', $name, $email, $hashedPassword);

        $success = $stmt->execute();
        $stmt->close();

        return $success;
    }

    /**
     * Finds a user by their ID.
     * (Example function, useful for retrieving user details after login)
     * @param int $id
     * @return array|null User data if found, null otherwise.
     */
    public static function findById($id)
    {
        $db = Database::getInstance();
        $mysqli = $db->getConnection();

        $stmt = $mysqli->prepare("SELECT id, name, email FROM users WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();

        return $user;
    }

    /**
     * Finds a user by their email.
     * (Useful for checking if an email already exists during registration)
     * @param string $email
     * @return array|null User data if found, null otherwise.
     */
    public static function findByEmail($email)
    {
        $db = Database::getInstance();
        $mysqli = $db->getConnection();

        $stmt = $mysqli->prepare("SELECT id, name, email FROM users WHERE email = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();

        return $user;
    }
}