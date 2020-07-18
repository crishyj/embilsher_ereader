<?php

ini_set('max_execution_time', 6000); //6000 seconds = 100 minutes
ob_start();
session_start();
include 'config.php';
require_once 'includes/functions.php';
require_once 'includes/ebook_create.php';

include 'phpMobi/MOBIClass/MOBI.php';

if (!isset($_SESSION['user_id']) || !isset($_SESSION['type'])) {
    header('Location: index.php');
    die();
}

if (isset($_GET['book'])) {
    $bookid = $DB->real_escape_string($_GET['book']);
}
if (isset($bookid)) {
    /*
    //Create the mobi object
    $mobi = new MOBI();

    $content = new MOBIFile();

    $sel = "SELECT * FROM private_library WHERE userid='$userid' AND id='$bookid'";
    $res = $DB->query($sel);
    if ($B = $res->fetch_assoc()){

        $content->set("title", $B['title']);
        $content->set("author", $B['author']);




        //get chapter nr.
        $logicnumber = 0;
        $GETchapters = "SELECT * FROM private_chapters WHERE bookid='$bookid' ORDER BY chapter_nr ASC";
        $chapters = $DB->query($GETchapters);
        while ($chap = $chapters->fetch_assoc()){
            $content->appendChapterTitle($chap['title']);

            $chap_nr = $logicnumber;
            $chap_id = $chap['id'];
            $sqlsave = "UPDATE private_chapters SET chap_nr = '$chap_nr' WHERE id='$chap_id'";
            $DB->query($sqlsave);

            $content->append entities_to_unicode($chap['content']).
            $content->appendPageBreak();
            $logicnumber++;
        }
    }


    */

    /*
    for($i = 0, $lenI = rand(5, 10); $i < $lenI; $i++){
        $content->appendParagraph("P".($i+1));
    }


    //Based on PHP's imagecreatetruecolor help paage
    $im = imagecreatetruecolor(220, 200);
    $text_color = imagecolorallocate($im, 233, 14, 91);
    imagestring($im, 10, 5, 5,  'A Simple Text String', $text_color);
    imagestring($im, 5, 15, 75,  'A Simple Text String', $text_color);
    imagestring($im, 3, 25, 125,  'A Simple Text String', $text_color);
    imagestring($im, 2, 10, 155,  'A Simple Text String', $text_color);
    $content->appendImage($im);
    imagedestroy($im);

    $content->appendPageBreak();

    for($i = 0, $lenI = rand(10, 15); $i < $lenI; $i++){
        $content->appendChapterTitle(($i+1).". Chapter ".($i+1));

        for($j = 0, $lenJ = rand(20, 40); $j < $lenJ; $j++){
            $content->appendParagraph("P".($i+1).".".($j+1)." TEXT TEXT TEXT");
        }

        $content->appendPageBreak();
    }
    */

    ////////OTHER WAY

    generateOneFile($DB, $bookid, $_SESSION['user_id']);

    $url = $SERVERURL.'ebooks/htmlbook'.$bookid.'.html'; // "http://thetricky.net/mySQL/GROUP%20BY%20vs%20ORDER%20BY";
    $recognize = false;
    $mobi = new MOBI();
    $content = null;

    if ($recognize) {				//Pass through to right handler
        $content = RecognizeURL::GetContentHandler($url);
    }

    if ($content == null) {		//If handler not found or if the recognition was turned off
        $content = new OnlineArticle($url);
    }

    //Get title and make it a 12 character long filename
    $userid = $_SESSION['user_id'];
    $sel = "SELECT * FROM private_library WHERE userid='$userid' AND id='$bookid'";
    $res = $DB->query($sel);
    if ($B = $res->fetch_assoc()) {
        $content->set('title', $B['title']);
        $content->set('author', $B['author']);
    }

    $mobi->setContentProvider($content);

    $title = $mobi->getTitle();
    if ($title === false) {
        $title = 'file';
    }
    $title = urlencode(str_replace(' ', '_', strtolower(substr($title, 0, 12))));

    $mobi->download($title.'.mobi');
    die;
}