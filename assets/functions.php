<?php

require_once 'config/db.php';

function insertForumpost($username, $message) {
    $sql = "insert into forum (username, message) 
    values (:username, :message)";

    global $forum;

    $stmt = $forum->prepare($sql);

    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':message', $message);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

function getForumPosts() {
    $sql = "select * from forum order by time desc";

    global $forum;
    $stmt = $forum->prepare($sql);
    $stmt->execute();
    return $stmt;
}

function login($username, $password) {
    global $forum;

    $sql = "SELECT * FROM userr
            WHERE username = :username";

    $stmt = $forum->prepare($sql);
    $stmt->bindValue(':username', $username);
    $stmt->execute();
// hämtar användaren från databasen
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        return true;
    } else { // om användaren inte finns eller lösenordet är fel
        return false;
    }
    }

function ensureBookingTable() {
    global $forum;
    static $ready = false;

    if (!$ready) {
        $forum->exec("CREATE TABLE IF NOT EXISTS bookings (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(255) NOT NULL,
            booking_date DATE NOT NULL,
            stylist VARCHAR(100) NOT NULL,
            treatment VARCHAR(100) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )");
        $ready = true;
    }
}

function addBooking($username, $date, $stylist, $treatment) {
    global $forum;
    ensureBookingTable();

    $forum->beginTransaction();

    try {
        $account = $forum->prepare(
            "SELECT username FROM userr WHERE username = :username FOR UPDATE"
        );
        $account->bindValue(':username', $username);
        $account->execute();

        if (!$account->fetch(PDO::FETCH_ASSOC)) {
            throw new RuntimeException('The booking account could not be found.');
        }

        $existing = $forum->prepare(
            "SELECT COUNT(*) FROM bookings WHERE username = :username"
        );
        $existing->bindValue(':username', $username);
        $existing->execute();

        if ((int) $existing->fetchColumn() > 0) {
            $forum->rollBack();
            return false;
        }

        $stmt = $forum->prepare(
            "INSERT INTO bookings (username, booking_date, stylist, treatment)
             VALUES (:username, :booking_date, :stylist, :treatment)"
        );
        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':booking_date', $date);
        $stmt->bindValue(':stylist', $stylist);
        $stmt->bindValue(':treatment', $treatment);
        $stmt->execute();

        $forum->commit();
        return true;
    } catch (Throwable $error) {
        if ($forum->inTransaction()) {
            $forum->rollBack();
        }
        throw $error;
    }
}

function getUserBookings($username) {
    global $forum;
    ensureBookingTable();

    $stmt = $forum->prepare(
        "SELECT booking_date, stylist, treatment
         FROM bookings
         WHERE username = :username
         ORDER BY booking_date DESC, id DESC"
    );
    $stmt->bindValue(':username', $username);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function addUser($felt) {

  global $forum;

    $sql = "INSERT INTO userr(username, name, email, password) 
VALUES (:username,:name,:email,:password)";
    $stmt = $forum->prepare($sql);

    $stmt->bindValue(':username', $felt['username']);
    $stmt->bindValue(':name', $felt['name']);
    $stmt->bindValue(':email', $felt['email']);
    $stmt->bindValue(':password', $felt['password']);
    try {
        return $stmt->execute();
    }
    catch(Exception $e) {
        return false;
    }

//    if ($stmt->execute() > 0) {
//        return true;
//    } else {
//        return false;
//    }
}
function getInfo($username){
    $sql = "SELECT * FROM userr WHERE username = :username";

    global $forum;

    $stmt = $forum->prepare($sql);
    $stmt->bindValue(':username', $username);

    try {
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch(Exception $error) {
        return false;
    }
}
function updateUser($username, $name, $email, $password) {
    global $forum;

    $sql = "UPDATE userr SET name = :name, email = :email, password = :password WHERE username = :username";

    $stmt = $forum->prepare($sql);
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':password', $password);

    try {
        return $stmt->execute();
    } catch(Exception $error) {
        return false;
    }
}

