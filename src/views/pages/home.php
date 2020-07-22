<?=$render('header', ['loggedUser'=>$loggedUser]);?>
    
    <section class="container main">
        
        <?=$render('sidebar', ['activeMenu'=>'home']);?>
        <section class="feed mt-10">

            <div class="row">

                <div class="column pr-5">
                    <?=$render('feed-editor', ['user'=>$loggedUser]);?>

                    <?php foreach($feed['posts'] as $feedItem): ?>
                        <?=$render('feed-item', [
                            'data' => $feedItem,
                            'loggedUser' => $loggedUser
                        ]);?>
                    <?php endforeach; ?>

                    <div class="feed-pagination">
                        <ul>
                            <?php for($q=0;$q<$feed['pageCount'];$q++): ?>
                                <li>
                                    <a class="<?=($q==$feed['currentPage']?'active':'')?>" href="<?=$base;?>/?page=<?=$q;?>"><?=$q+1;?></a>
                                </li>
                            <?php endfor; ?>
                        <ul>        
                    </div>
                </div>

                <div class="column side pl-5">
                    <div class="box banners">
                        <div class="box-header">
                            <div class="box-header-text">Patrocinios</div>
                            <div class="box-header-buttons"></div>
                        </div>
                        <div class="box-body">
                            <a href="#"><img src="<?=$base;?>/media/uploads/1.jpg" /></a>
                            <a href="#"><img src="<?=$base;?>/media/uploads/1.jpg" /></a>
                        </div>
                    </div>
                    <div class="box">
                        <div class="box-body m-10">
                            Aprendi a fazer com ❤️
                        </div>
                    </div>
                </div>

            </div>

        </section>
    </section>

<?=$render('footer');?>