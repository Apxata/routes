<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Инфо портал</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="//cdn.jsdelivr.net/editor/0.1.0/editor.css">
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
                           <!-- navbar header  -->
                       <div class="collapse navbar-collapse" id="collapse">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="<?php echo WWW_ROOT ; ?>/index.php">Главная</a></li>
                                <li class=""><a href="<?php echo WWW_ROOT ; ?>/articles.php">Статьи</a></li>
                                <li class=""><a href="<?php echo CONTROLLER_PATH . "/fame" ?>/fame_farm.php">Фейм фарм</a></li>
                                <li class=""><a href="<?php echo WWW_ROOT ; ?>/logout.php">Выход</a></li>
                            </ul>
                            <form class="navbar-form navbar-left">
                                <div class="form-group">
                                  <input type="text" class="form-control" placeholder="Поиск">
                                </div>
                                <button type="submit" class="btn btn-default">Найти</button>
                            </form>
                       </div>
                       <!-- collapse navbar-collapse -->
                    </div> 
                </div> 
                <!-- menu container                 -->
            </nav>
        </header>