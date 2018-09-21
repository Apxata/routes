<?php if(!isset($page_title)) {$page_title = 'Админка' ; }  ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Блог архата - <?php echo $page_title; ?></title>
        <link rel="stylesheet" href="<?php echo root_path('/css/bootstrap.min.css');?>">
        <link rel="stylesheet" href="<?php echo root_path('/css/style.css');?>">
<!--        <link rel="stylesheet" href="//cdn.jsdelivr.net/editor/0.1.0/editor.css">-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
        <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">

    </head>

    <body>
        <header>
            
            <nav class="navbar navbar-inverse" role="navigation">
                <div class="container">
                    <div class="row col-md-offset-1">
                    <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" >
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                            </button>

                    </div>
                        <?php  if ($session->is_logged_in()){ ?>
                       <!-- navbar header  -->
                       <div class="collapse navbar-collapse" id="collapse">
                            <ul class="nav navbar-nav">

                                    <li><a href="<?php echo root_path('staff/index.php'); ?>">Главная</a></li>
                                    <li><a href="<?php echo root_path('staff/articles/index.php'); ?>">Статьи</a></li>
                                    <li ><a href=<?php echo root_path('staff/users/index.php'); ?>>Пользователи</a></li>
                                    <li ><a href="<?php echo root_path('staff/logout.php'); ?>">Выйти</a></li>

                                </ul>
                                <form class="navbar-form navbar-left">
                                        <div class="form-group">
                                          <input type="text" class="form-control" placeholder="Поиск">
                                        </div>
                                        <button type="submit" class="btn btn-default">Найти</button>
                                </form>
                       </div>
                        <?php  } ?>
                       <!-- collapse navbar-collapse -->
                    </div> 
                </div> 
                <!-- menu container                 -->
            </nav>
        </header>