<?php
namespace src\handlers;

use \src\models\User;
use \src\models\UserRelation;
use \src\handlers\PostHandler;

class UserHandler {

    public static function checkLogin() {
        if(!empty($_SESSION['token'])) {
            $token = $_SESSION['token'];
            $data = User::select()->where('token', $token)->one(); // one pode ser ->execute

            if(count($data) > 1) { //originalmente era 0 - porém da bug quando loga em janela anonima, com 1 funciona corretamente
                
                $loggedUser = new User();
                $loggedUser->id = $data['id'];
                $loggedUser->email = $data['email'];
                $loggedUser->name = $data['name'];
                $loggedUser->avatar = $data['avatar'];

                /**/ 
                $loggedUser->birthdate = $data['birthdate'];
                $loggedUser->city = $data['city'];
                $loggedUser->work = $data['work'];
                /**/

                return $loggedUser;
            }
        }
        return false;       
    }

    public static function verifyLogin($email, $password) {
        $user = User::select()->where('email', $email)->one();

        if($user) {
            if(password_verify($password, $user['password'])){
                $token = md5(time().rand(0,9999).time());

                User::update()
                    ->set('token', $token)
                    ->where('email', $email)
                ->execute();

                return $token;
            }
        }       
        return false;
    }   

    public function idExists($id) {
        $user = User::select()->where('id', $id)->one();
        return $user ? true : false;
    }

    public function emailExists($email) {
        $user = User::select()->where('email', $email)->one();
        return $user ? true : false;
    }

    public function addUser($name, $email, $password, $birthdate){
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $token = md5(time().rand(0,9999).time());
        
        User::insert([
            'name' => $name,
            'email' => $email,
            'password' => $hash,
            'birthdate' => $birthdate,
            'token' => $token
        ])->execute();

        return $token;
    }

    public function getUser($id, $full = false) {
        $data = User::select()->where('id', $id)->one();
        
        if($data) {
            $user = new User();
            $user->id = $data['id'];
            $user->name = $data['name'];
            $user->birthdate = $data['birthdate'];
            $user->city = $data['city'];
            $user->work = $data['work'];
            $user->avatar = $data['avatar'];
            $user->cover = $data['cover'];

            if($full) {
                $user->followers = [];
                $user->following = [];
                $user->photos = [];
            
                //followers
                $followers = UserRelation::select()->where('user_to', $id)->get();
                foreach($followers as $follower) {
                    $userData = User::select()->where('id', $follower['user_from'])->one();
                    $newUser = new User();
                    $newUser->id = $userData['id'];
                    $newUser->name = $userData['name'];
                    $newUser->avatar = $userData['avatar'];
                    
                    $user->followers[] = $newUser;
                }

                //following
                $following = UserRelation::select()->where('user_from', $id)->get();
                foreach($following as $follower) {
                    $userData = User::select()->where('id', $follower['user_to'])->one();
                    $newUser = new User();
                    $newUser->id = $userData['id'];
                    $newUser->name = $userData['name'];
                    $newUser->avatar = $userData['avatar'];
                    
                    $user->following[] = $newUser;
                }

                //photos
                $user->photos = $photos = PostHandler::getPhotosFrom($id);
                
            }
       
            return $user;
        }

        return false;
    }

    public static function isFollowing($from, $to) {
        $data = UserRelation::select()
            ->where('user_from', $from)
            ->where('user_to', $to)
        ->one();

        if($data) {
            return true;
        }
        return false;
    }

    public static function follow($from, $to) {
        UserRelation::insert([
            'user_from' => $from,
            'user_to' => $to
        ])->execute();
    }

    public static function unfollow($from, $to) {
        UserRelation::delete()
            ->where('user_from', $from)
            ->where('user_to', $to)
        ->execute();
    }
    
    public static function searchUser($term) {
        $users = [];

        $data = User::select()
            ->where('name','like', '%'.$term.'%')
        ->get();

        if($data) {
            foreach($data as $user) {
                
                $newUser = new User();
                $newUser->id = $user['id'];
                $newUser->name = $user['name'];
                $newUser->avatar = $user['avatar'];
                
                $users[] = $newUser;
            }
        }
        return $users;
    }

    /**/

    public function updateName($id, $name) {
        $user = User::select()->where('id', $id)->one();
        $hash = password_hash($password, PASSWORD_DEFAULT);
        
        if($name){
            User::update()
                ->set('name', $name)
                ->where('id', $id)
            ->execute();
        }
    }
    public function updateEmail($id, $email) {
        $user = User::select()->where('id', $id)->one();
        
        if($email){
            User::update()
                ->set('email', $email)
                ->where('id', $id)
            ->execute();
        }
    }
    public function updateBirthdate($id, $birthdate) {
        $user = User::select()->where('id', $id)->one();
        
        if($birthdate){
            User::update()
                ->set('birthdate', $birthdate)
                ->where('id', $id)
            ->execute();
        }
    }
    public function updateCity($id, $city) {
        $user = User::select()->where('id', $id)->one();
        
        if($city){
            User::update()
                ->set('city', $city)
                ->where('id', $id)
            ->execute();
        }
    }
    public function updateWork($id, $work) {
        $user = User::select()->where('id', $id)->one();
        
        if($work){
            User::update()
                ->set('work', $work)
                ->where('id', $id)
            ->execute();
        }
    }
    public function updatePassword($id, $password) {
        $user = User::select()->where('id', $id)->one();
        $hash = password_hash($password, PASSWORD_DEFAULT);
        
        if($hash){
            User::update()
                ->set('password', $hash)
                ->where('id', $id)
            ->execute();
        }
    }
    
    /**/
    
}