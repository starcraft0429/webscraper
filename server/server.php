<?php
    require_once("simple_html_dom.php");
    require_once("config.php");
    require_once("connectDB.php");
    
    if(isset($_REQUEST['urls'])){
        $urlArray = $_REQUEST['urls'];
        
        for($i=0;$i<count($urlArray);$i++){
                        
            $html = file_get_html($urlArray[$i]);
            switch($urlArray[$i]){
                case $examUrl_1:
                    $title = $html->find("div[class=smallfont] strong", 0)->plaintext;
                    $title = str_replace("'",'"',$title);
                    
                    
                    $post = $html->find("div[id=post_message_1772362]",0)->plaintext;
                    $post = str_replace("'",'"',$post);
                    
                    
                    //echo "<h2>replys:</h2>";
                    $table = $html->find("table[class=tborder]");
                    for($j=3;$j<count($table)-4;$j++){
                        $reply = $table[$j]->last_child()->first_child()->first_child()->next_sibling()->next_sibling()->plaintext;
                        $reply = str_replace("'",'"',$reply);
                        
                        $query = "INSERT INTO `scraping` (`url`, `title`, `post`, `reply`) VALUES ('$urlArray[$i]', '$title', '$post', '$reply');";
                        
                        mysql_query($query);
                    }
                    echo $urlArray[$i]."<br>";
                    break;
                case $examUrl_2:
                    $title = $html->find("h3[class=first]", 0);
                    $title = str_replace("'",'"',$title);
                    
                    $post = $html->find("div[class=postbody]",0)->last_child();
                    $post = str_replace("'",'"',$post);
                    
                    $replys = $html->find('p[class=author]');//get author tag
                    for($j=1;$j<count($replys);$j++){
                        $reply = $replys[$j]->next_sibling()->plaintext;
                        $reply = str_replace("'",'"',$reply);
                        
                        $query = "INSERT INTO `scraping` (`url`, `title`, `post`, `reply`) VALUES ('$urlArray[$i]', '$title', '$post', '$reply');";
                        
                        mysql_query($query);
                    }
                    echo $urlArray[$i]."<br>";
                    break;
                case $examUrl_3:
                    $title = $html->find("div[class=noticeContent]",0)->first_child()->next_sibling()->plaintext;
                    $title = str_replace("'",'"',$title);
                    
                    $post = $html->find("div[class=noticeContent]",0)->plaintext;
                    $post = str_replace("'",'"',$post);
                    
                    foreach($html->find('blockquote') as $replys) {
                        $reply = $replys->plaintext;
                        $reply = str_replace("'",'"',$reply);
                        
                        $query = "INSERT INTO `scraping` (`url`, `title`, `post`, `reply`) VALUES ('$urlArray[$i]', '$title', '$post', '$reply');";
                        
                        mysql_query($query);
                    }
                    echo $urlArray[$i]."<br>";
                    break;
                case $examUrl_4:
                    $title = $html->find("h2[class=title icon]",0)->plaintext;
                    $title = str_replace("'",'"',$title);
                    
                    $post = $html->find("div[id=post_message_316058]",0)->first_child()->plaintext;
                    $post = str_replace("'",'"',$post);
                    
                    $replys = $html->find("blockquote");
                    for($j=1;$j<count($replys);$j++){
                        $reply = $replys[$j]->plaintext;
                        $reply = str_replace("'",'"',$reply);
                        
                        $query = "INSERT INTO `scraping` (`url`, `title`, `post`, `reply`) VALUES ('$urlArray[$i]', '$title', '$post', '$reply');";
                        
                        mysql_query($query);
                    }
                    echo $urlArray[$i]."<br>";
                    break;
                case $examUrl_5:
                    $title = $html->find("h2[class=posttitle icon]",0)->plaintext;
                    $title = str_replace("'",'"',$title);
                    
                    $posts = $html->find("blockquote[class=postcontent restore]");
                    for($j=1;$j<count($posts);$j++){
                        $post = $posts[$j]->plaintext;
                        $post = str_replace("'",'"',$post);
                        
                        $query = "INSERT INTO `scraping` (`url`, `title`, `post`) VALUES ('$urlArray[$i]', '$title', '$post');";
                        
                        mysql_query($query);
                    }
                    echo $urlArray[$i]."<br>";
                    break;
                case $examUrl_6:
                    $title = $html->find("h1[id=HEADING]",0)->plaintext;
                    $title = str_replace("'",'"',$title);
                    
                    $post = $html->find("div[id=pst_adm_50548806]",0)->parent()->plaintext;
                    $post = str_replace("'",'"',$post);
                    
                    $replys = $html->find("div[class=postBody]");
                    for($j=1;$j<count($replys);$j++){
                        $reply = $replys[$j]->plaintext;
                        $reply = str_replace("'",'"',$reply);
                        
                        $query = "INSERT INTO `scraping` (`url`, `title`, `post`, `reply`) VALUES ('$urlArray[$i]', '$title', '$post', '$reply');";
                        
                        mysql_query($query);
                    }
                    echo $urlArray[$i]."<br>";
                    break;
                case $examUrl_7:
                    $title = $html->find("div[id=heading]",0)->first_child()->plaintext;
                    $title = str_replace("'",'"',$title);
                    
                    foreach($html->find("div[class=entry] p") as $posts) {
                        $post = $posts->plaintext;
                        $post = str_replace("'",'"',$post);
                        
                        $query = "INSERT INTO `scraping` (`url`, `title`, `post`) VALUES ('$urlArray[$i]', '$title', '$post');";
                        
                        mysql_query($query);
                    }
                    echo $urlArray[$i]."<br>";
                    break;
                    
            }
        }
    }


    

?>