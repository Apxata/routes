<?php

//ищем статьи постранично
if (isset($_GET['page'])){
    $current_page = $_GET['page'];
}else {
    $current_page = 1 ;
}
$per_page = 10 ;
$total_count = article::count_all_visible();

$pagination = new Pagination($current_page, $per_page, $total_count);
$offset = $pagination->offset();

$articles = article::find_all_visible_articles_per_page($per_page, $offset);

$Parsedown = new Parsedown();
$Parsedown->setSafeMode(true);

foreach ($articles as &$a) {
    $a['full_text'] =  nl2br($Parsedown->line($a['full_text']));
    $comms = Comment::count_all_comments($a['id']);
    $a['count_comments'] = array_shift($comms);
}

//Подключаем шаблонизатор СМАРТИ
$smarty = new Smarty;
$smarty->assign('articles', $articles);

    // <!-- подключаем футер -->
include(_HEADER . '/public_header.php');

$smarty->display(_ROOT_DIR . ('/tpls/articles.tpl'));
//Вывод пагинации
//$url = root_path('/article.php');
//echo $pagination->page_links();

include(_HEADER . '/public_footer.php');
