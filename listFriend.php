
<link rel="stylesheet" href="css/listFriend.css">

<div class="right-content">
    <div class="close-friends">
        <b>Friends List</b>
        <?php 
            if(!defined('ARRAYFRIEND')) {
                $friends_id = db_getFriends($_SESSION['connected']);
                $onclickfct = 'submitFormProfilLink';
            }
            if(is_string($friends_id[0])) {
                for($j = 0; $j <count($friends_id); $j++) {
                    $friends_id[$j] = array($friends_id[$j]);
                } 
            }
            for ($i=0; $i < count($friends_id); $i++) { 
                $friendData = db_getUserData($friends_id[$i][0]);
        ?>
        <div class="close-f" onclick='<?php echo $onclickfct ?>(<?=$i?>);'>  
            
            <div class="friend-profil-link" >
                <img src="<?= $friendData[9] ?>">
                <div>
                    <p id="pseudo-close-f-display"><?= $friendData[0] ?></p>
                </div>
                <form id="form-profil-link<?=$i?>" method="GET" action="<?= PROFIL ?>">
                    <input type="hidden" name="user" id="user" value="<?= $friendData[0] ?>">
                </form>
            </div>
            <?php  if(defined('CONVERSIONABLE')) { ?>
            <div class="close-message">
                <ion-icon name="paper-plane"></ion-icon>
            </div>
            <?php } ?>
            <?php  if(defined('TRASHABLE')) { ?>
            <div class="close-message">
                <ion-icon name="trash"></ion-icon>
            </div>
            <?php } ?>
        </div>
        <?php } ?>
    </div>
</div>