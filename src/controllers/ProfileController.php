<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\UserHandler;
use \src\handlers\PostHandler;

class ProfileController extends Controller {

    private $loggedUser;

    public function __construct() {
        $this->loggedUser = UserHandler::checkLogin();
        if($this->loggedUser === false){
            $this->redirect('/login');
        }
    }

    public function index($atts = []) {
        $page = intval(filter_input(INPUT_GET,'page'));

        //detectando o user acessado
        $id = $this->loggedUser->id;
        if(!empty($atts['id'])) {
            $id = $atts['id'];
        }

        //pegando info do usuario
        $user = UserHandler::getUser($id, true);
        if(!$user) {
            $this->redirect('/');
        }

        $dateFrom = new \DateTime($user->birthdate);
        $dateTo = new \DateTime('today');
        $user->ageYears = $dateFrom->diff($dateTo)->y;

        //pegando o feed do user
        $feed = PostHandler::getUserFeed($id, $page, $this->loggedUser->id);

        //verificar se eu sigo o user
        $isFollowing = false;

        if($user->id != $this->loggedUser->id){
            $isFollowing = UserHandler::isFollowing($this->loggedUser->id, $user->id);

        }

        $this->render('profile', [
            'loggedUser' => $this->loggedUser,
            'user' => $user,
            'feed' => $feed,
            'isFollowing' => $isFollowing
        ]);
    }

    // seguindo

    public function follow($atts){
        $to = intval($atts['id']);
        if(UserHandler::idExists($to)) {
            if(UserHandler::isFollowing($this->loggedUser->id, $to)) {    
            //unfollow
                UserHandler::unFollow($this->loggedUser->id, $to);
            } else {
            //follow
                UserHandler::follow($this->loggedUser->id, $to);
            }
        }
        
        $this->redirect('/profile/'.$to);
    }
}