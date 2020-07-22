<?php
namespace src\handlers;

use \src\models\Post;
use \src\models\User;
use \src\models\UserRelation;

class PostHandler {

    public static function getHomeFeed($idUser, $page){
        $perPage = 2; // QUANTITY OF FEED POSTS APPEAR
        
        // GET LIST OF USERS BY I FOLLOW. huebrhuebr
        $userList = UserRelation::select()->where('user_from', $idUser)->get(); 
        $users = [];
        foreach($userList as $userItem) {
            $users[] = $userItem['user_to'];
        }
        $users[] = $idUser;

        // GET POSTS OF THIS LIST USERS, WITH ORDER BY DATE - KABUM!! You little POST LIST FEED *-*
        $postList = Post::select()
            ->where('id_user', 'in', $users)
            ->orderBy('created_at', 'desc')
            ->page($page, $perPage)
        ->get();

        $total = Post::select()
            ->where('id_user', 'in', $users)
        ->count();
        $pageCount = ceil($total / $perPage);

        // TRANSFORM THE RESULT IN OBJECT OF MODELS
        $posts = [];
        foreach($postList as $postItem) {
            $newPost = new Post();
            $newPost->id = $postItem['id'];
            $newPost->type = $postItem['type'];
            $newPost->created_at = $postItem['created_at'];            
            $newPost->body = $postItem['body'];
            $newPost->mine = false;

            if($postItem['id_user'] == $idUser) {
                $newPost->mine = true;
            }
        
            // INSERT THE ADITIONAL INFORMATION IN THE POST
            $newUser = User::select()->where('id', $postItem['id_user'])->one();
            $newPost->user = new User();
            $newPost->user->id = $newUser['id'];
            $newPost->user->name = $newUser['name'];
            $newPost->user->avatar = $newUser['avatar'];

            // TODO: INSERT THE ADITIONAL INFORMATION IN THE POST  // LIKES (Y)
            $newPost->likeCount = 0;
            $newPost->liked = false;

            // TODO: INSERT THE ADITIONAL INFORMATION IN THE POST // COMMENTS (BlaBlaBlá)
            $newPost->comments =[];

            $posts[] = $newPost;
        }

        // RETORNAR RESULTADO
        return [
            'posts' => $posts,
            'pageCount' => $pageCount,
            'currentPage' => $page
        ];
    }

    public function getPhotosFrom($idUser) {
        $photosData = Post::select()
            ->where('id_user', $idUser)
            ->where('type', 'photo')
        ->get();

        $photos = [];

        foreach($photosData as $photo) {
            $newPost = new Post();
            $newPost->id = $photo['id'];
            $newPost->type = $photo['photo'];
            $newPost->created_at = $photo['created_at'];
            $newPost->body = $photo['body'];
        
            $photos[] = $newPost;
        }

        return $photos;
    }

    public static function addPost($idUser, $type, $body){
        $body = trim($body);

        if(!empty($idUser) && !empty($body)) {

            Post::insert([
                'id_user' => $idUser,
                'type' => $type,
                'created_at' => date('Y-m-d H:i:s'),
                'body' => $body,
            ])->execute();
        }
    }
}