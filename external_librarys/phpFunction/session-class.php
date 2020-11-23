<?php

/*
 * The MIT License
 *
 * Copyright 2014 Matija Novak <matija.novak@foi.hr>.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 * 
 * Klasa za upravljanje sa sesijama
 *
 * @author Matija Novak <matija.novak@foi.hr>
 */

class Session {

    const USER = "user";
    const ROLE = "role";
    const CART = "userCart";
    const SESSION_NAME = "loginSession";

    public function __construct() {
        session_name(self::SESSION_NAME);
    }
    
    static function createSession() {
        if (session_id() == "") {
            session_start();
        }
    }

    static function createUser($user, $role) {
        self::createSession();
        $_SESSION[self::USER] = $user;
        $_SESSION[self::ROLE] = $role;
    }

    static function createCart($kosarica) {
        self::createSession();
        $_SESSION[self::CART] = $kosarica;
    }

    /**
     * 
     * @return type assoc array
     */
    static function getUser($DB) {
        self::createSession();
        $user = new User();
        if (isset($_SESSION[self::USER])){
            $user->username = $_SESSION[self::USER];
            $query = "SELECT * FROM user WHERE username='".$user->username."'";
            $r = $DB->selectDB($query);
            $user = getUserFromDB(mysqli_fetch_array($r), $DB);
        } else {
            $user->role = 4;
        }
        return $user; 
    }
    
     static function isUserLogedIn() {
        self::createSession();
        if (isset($_SESSION[self::USER])) {
            return true;
        } else {
            return false;
        }
    }

    static function getCart() {
        self::createSession();
        if (isset($_SESSION[self::CART])) {
            $userCart = $_SESSION[self::CART];
        } else {
            return null;
        }
        return $userCart;
    }

    /**
     * Log out user and delete session!
     */
    static function deleteSession() {
        self::createSession();
        
        if (session_id() != "") {
            unset($_SESSION[self::USER]);
            session_unset();
            session_destroy();
        }
    }

}
