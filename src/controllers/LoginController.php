<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\LoginHandler;

class LoginController extends Controller {

    public function signup() {
        $flash = '';
        if(!empty($_SESSION['flash'])){
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $this->render('signup', ['flash' => $flash]);
    }

    public function signupAction() {
        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');
        $birthdate = filter_input(INPUT_POST, 'birthdate');
    
        if($name && $email && $password && $birthdate) {
            $birthdate = explode('/', $birthdate);
            if(count($birthdate) != 3) {
                $_SESSION['flash'] = 'mando tudo';
                $this->redirect('/register');
            }

            $birthdate = $birthdate[2].'-'.$birthdate[1].'-'.$birthdate[0];
            if(strtotime($birthdate) === false) {
                $_SESSION['flash'] = 'Separo errado';
                $this->redirect('/register');
            }

            if(LoginHandler::emailExists($email) === false) {
                $token = LoginHandler::addUser($name, $email, $password, $birthdate);
                $_SESSION['token'] = $token;
                $this->redirect('/login');
            } else {
                $_SESSION['flash'] = 'E-mail já cadastrado!';
                $this->redirect('/register');
            }

        } else {
            $this->redirect('/register');
        }
    }

    public function signin() {
        $flash = '';
        if(!empty($_SESSION['flash'])){
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $this->render('signin', ['flash' => $flash]);
    }

    public function signinAction() {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');
    
        if($email && $password) {

            $token = LoginHandler::verifyLogin($email, $password);
            if($token){
                $_SESSION['token'] = $token;
                $this->redirect('/');
            } else {
                $_SESSION['flash'] = 'Dados digitados, estão incorretos.';
                $this->redirect('/login');
            }         

        } else {
            $_SESSION['flash']= 'Preencha todos os campos.';
            $this->redirect('/login');
        }
    }

}