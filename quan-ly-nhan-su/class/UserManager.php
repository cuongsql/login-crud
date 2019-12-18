<?php
namespace Controller;
include_once 'Manager.php';

class UserManager extends Manager
{
    public function add($user)
    {
    $listUser = $this->readFile();
        $data = [
            'username' => $user->username,
            'password' => $user->password,
            'email' => $user->email,
            'level' => $user->level
        ];
        array_push($listUser, $data);
        $this->saveDataToFile($listUser);
    }
    public function checkLogin($username, $password)
    {
        $listUser = $this->readFile();
        foreach($listUser as $user){
            if($user['username'] == $username && $user['password'] == $password)
            header("location: ../index.php");
        }
    }
    // public function getList()
    //     {
    //         $data = $this->readFile();
            
    //         $arr = [];
    //         foreach ($data as $item) {
    //             $user = new User(
    //             $item['username'],
    //             $item['password'],
    //             $item['email'],
    //             $item['level']
    //                                 );
    //                                 array_push($arr, $user);
    //                             }
    //                             return $arr;
    //                         }
 }