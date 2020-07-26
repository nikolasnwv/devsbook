<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\UserHandler;

class SettingsController extends Controller {
    
    private $loggedUser;
    
    public function __construct() {
        $this->loggedUser = UserHandler::checkLogin();
        if($this->loggedUser === false) {
            $this->redirect('/signin');
        }
    }
    
    public function settings($atts = []) {
        $flash = '';
        if(!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        // Detectando usuário acessado
        $id = $this->loggedUser->id;
        if(!empty($atts['id'])) {
            $id = $atts['id'];
        }
        // Pegando informações do usuário
        $user = UserHandler::getUser($id, true);
        if(!$user) {
            $this->redirect('/');
        }
        $this->render('settings', [
            'loggedUser' => $this->loggedUser,
            'user' => $user,
            'flash' => $flash
        ]);
    }

    public function settingsAction() {
        $id = filter_input(INPUT_POST, 'id');
        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $birthdate = filter_input(INPUT_POST, 'birthdate');
        $password = filter_input(INPUT_POST, 'password');
        $password1 = filter_input(INPUT_POST, 'password1');
        $city = filter_input(INPUT_POST, 'city');
        $work = filter_input(INPUT_POST, 'work');
        $flash = '';

        // Detectando usuário acessado
        $id = $this->loggedUser->id;
        if(!empty($atts['id'])) {
            $id = $atts['id'];
        }
        // Pegando informações do usuário
        $user = UserHandler::getUser($id, true);
        if(!$user) {
            $this->redirect('/');
        }
        if($name != '') {
            
            UserHandler::updateName($id, $name);
            
        }
        if($email != '') {
            if(UserHandler::emailExists($email) === false) {
                UserHandler::updateEmail($id, $email);
                
            } else {
                $_SESSION['flash'] = 'E-mail já cadastrado!';
                $this->redirect('/settings');
            } 
            
        }
        if($birthdate != '') {
            $birthdate = explode('/', $birthdate);
            if(count($birthdate) !=3 ) {
                $_SESSION['flash'] = 'Data de nascimento inválida';
                $this->redirect('/settings');
            }
            $birthdate = $birthdate[2].'-'.$birthdate[1].'-'.$birthdate[0];
            if(strtotime($birthdate) === false) {
                $_SESSION['flash'] = 'Data de nascimento inválida';
                $this->redirect('/settings');
            }
            
            UserHandler::updateBirthdate($id, $birthdate);
        }
        if($city != '') {
            
            UserHandler::updateCity($id, $city);
        }
        if($work != '') {
            
            UserHandler::updateWork($id, $work);
        }
        if(($password != '') && ($password === $password1)) {
            UserHandler::updatepassword($id, $password);
            } else {  
                if ($password != $password1){              
                    $_SESSION['flash'] = 'As senhas devem ser iguais!';            
                    $this->redirect('/settings');
                }
        }
          
        $_SESSION['flash'] = 'Informações alteradas!';
        $this->redirect('/settings');
    }
}