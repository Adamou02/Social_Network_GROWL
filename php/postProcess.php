<?php
   
    if(file_exists("./required.php"))
        require_once("./required.php");
    else
        require_once("./php/required.php");
    if(isset($_POST)) {
        $number_media = 0;
        $id_post=db_generateId("post");
        for($i = 0; $i<4; $i++){
            if(isset($_POST["base".$i]) && isset($_POST["type".$i])) {
                java_log(json_encode($_POST["type".$i]));
                $NewID = db_generateID("media");
                $media = array("MediaID" => $NewID,"Base64" => $_POST["base".$i], "Type" => $_POST["type".$i]);
                db_newRow('media', $media);
                $number_media++;
                $own_media=array('PostID' => $id_post, 'MediaID' => $NewID);
            }
        }
        if(isset($_POST["text_input"])){
            $pattern = '/#\w+/';
            if (preg_match_all($pattern, $_POST["text_input"], $matches)) {//On vérifie s'il y a des mots clés
                $words = array();
                foreach($matches[0] as $match) {
                    $words[] = substr($match, 1);
                }
                for($j = 0; $j < count($words); $j++) {
                    if($j > 0){
                        $key_words = $key_words.';'.$words[$j];
                    } else {
                        $key_words = $words[$j];
                    }                    
                }
                $post = array('NumberOfMedia' => $number_media, 'KeyWords' => $key_words, 'Content' =>$_POST["text_input"], 'PostedBy_UserID' =>$_SESSION['connected']);
            } elseif ($matches === false) {
                echo "Erreur de syntaxe dans le pattern.";
            } else {
                $post = array('NumberOfMedia' => $number_media, 'Content' =>$_POST["text_input"], 'PostedBy_UserID' =>$_SESSION['connected']);
            }
            
            db_newPost($post);
            if($number_media >0 )
            db_newRow('own_media', $own_media);
        }
        echo "<script> window.location.replace('".ROOT.INDEX."') </script>";
        redirect(ROOT.INDEX);
    } else {
        echo "<script> window.location.replace('".ROOT.INDEX."') </script>";
        redirect(ROOT.INDEX);
    }
    echo "<script> window.location.replace('".ROOT.INDEX."') </script>";
    redirect(ROOT.INDEX);
?>