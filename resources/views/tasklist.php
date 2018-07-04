<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <title>My tasklist</title>
    <link rel="stylesheet" type="text/css" media="all" href="/style.css" />
    <link rel="stylesheet" type="text/css" href="/css/media-queries.css" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,300italic,300,700,700italic|Open+Sans+Condensed:300,700' rel="stylesheet" type='text/css'>
    <!--[if IE 8]>
    <link rel="stylesheet" type="text/css" href="/css/ie8.css" media="all" />
    <![endif]-->
    <!--[if IE 9]>
    <link rel="stylesheet" type="text/css" href="/css/ie9.css" media="all" />
    <![endif]-->
    <script type="text/javascript" src="/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="/js/ddsmoothmenu.js"></script>
    <script type="text/javascript" src="/js/retina.js"></script>
    <script type="text/javascript" src="/js/selectnav.js"></script>
    <script type="text/javascript" src="/js/jquery.masonry.min.js"></script>
    <script type="text/javascript" src="/js/jquery.fitvids.js"></script>
    <script type="text/javascript" src="/js/jquery.backstretch.min.js"></script>
    <script type="text/javascript" src="/js/jquery.dcflickr.1.0.js"></script>
    <script type="text/javascript" src="/js/twitter.min.js"></script>
    <script type="text/javascript">
        $.backstretch("/images/bg/1.jpg");
    </script>
</head>
<body>
<div class="scanlines"></div>

<!-- Begin Header -->
<div class="header-wrapper opacity">
    <div class="header">
        <!-- Begin Logo -->
        <div class="logo">
            <a href="index.html">
                <h1>ほしいもの＊ますた</h1>
            </a>
        </div>
        <!-- End Logo -->
    </div>
</div>
<!-- End Header -->

<!-- Begin Wrapper -->
<div class="wrapper">
    <!-- Begin Intro -->
    <div class="intro">
        <img src="/images/intro_side_left.png" height="42px" width="20px">
        <p id="asd">ほしいものリスト</p>
        <img src="/images/intro_side_right.png" height="42px" width="20px">
    </div>
    <!-- add Task -->
    <div class="addtask_optionform">
    <div class="addtask clearfix">
        <p class="icon">タスクを追加する</p>
        <div class="addform">
            <form action="/task" method="post">
                <ul class="clearfix">
                    <?= csrf_field() ?>
                    <li>商品名：<br><input type="text" name="task_name" placeholder="マグカップ" required></li>
                    <li>値段：<br><input type="text" name="price"></li>
                    <li>期限：<br><input type="date" name="date"></li>
                    <li>URL:<br><input type="text" name="url"></li>
                    <li>メリット：<br><input type="text" name="meritto"></li>
                    <li>デメリット：<br><input type="text" name="demeritto"></li>
                    <li><input type="submit" value="タスクの追加"></li>

                </ul>
            </form>
        </div>

    </div>
    <div class="optionform">
        <p class="icon optionform_name">表示オプション</p>
        <div class="option">
            <div class="srch_form">
                <form action="/serch" method="post">
                    <?= csrf_field() ?>
                    <input type="text" name="srchword" placeholder="検索">
                    <input type="submit" value="検索">
                </form>
            </div>
            <div class="option_list clearfix">
                <p class="option_name">値段順</p>
                <form action="/sort/desc" method="get">
                <input type="submit" value="降順" class="clearfix">
                </form>
                <form action="/sort/asc" method="get">
                <input type="submit" value="昇順" class="clearfix">
                </form>
            </div>
            <div class="option_list clearfix">
                <p class="option_name">期限順</p>
                <form action="/limit/sort/desc" method="get">
                    <input type="submit" value="降順" class="clearfix">
                </form>
                <form action="/limit/sort/asc" method="get">
                    <input type="submit" value="昇順" class="clearfix">
                </form>
            </div>
            <div class="option_list clearfix">
                <p class="option_name">期限順</p>
                <form action="/sort/desc" method="get">
                    <input type="submit" value="降順" class="clearfix">
                </form>
                <form action="/sort/asc" method="get">
                    <input type="submit" value="昇順" class="clearfix">
                </form>
            </div>
            <div class="view_reset">
                <form action="/reset" method="get">
                <input type="submit" value="リセット">
                </form>
            </div>
        </div>
    </div>
    </div>
    <!-- Begin Blog Grid -->
    <div class="blog-wrap clearfix">
        <!-- Begin Blog -->
        <div class="">
            <!-- Begin Quote Format -->
            <?php foreach($tasks as $task): ?>
            <div class="post format-image box">
                <table class="postform"> 
                    <tr class="postform_li1">
                        <td>&emsp;<?=$task->task_name?></td>
                    </tr>
                </table>
                <input type="checkbox" class="postcheckbox">
                <table class="td_child">
                        <tr><td class="td"><strong>値段:</strong></td>
                            <td>&emsp;<?=$task->price?></td>
                        </tr>
                        <tr><td class="td"><strong>追加された日付:</strong></td>
                            <td>&emsp;<?=$task->date?></td>
                        </tr>
                        <tr><td class="td"><strong>URL:</strong></td>
                            <td>&emsp;<a href="<?=$task->url?>"><?=$task->url?></a></td>
                        </tr>
                        <tr><td class="td"><strong>メリット:</strong></td>
                            <td>&emsp;<?=$task->meritto?></td>
                        </tr>
                        <tr><td class="td"><strong>デメリット:</strong></td>
                            <td>&emsp;<?=$task->demeritto?></td>
                        </tr> 
                        </div>    
                </table>
                <script type="text/javascript">
                    var d = '<div class="hidden_box">'
                                +'<label for="label<?=$task->id?>" id="<?=$task->id?>"><p>編集</p></label>'
                                +'<input type="checkbox" id="label<?=$task->id?>"/>'
                                +'<div class="hidden_show">'
                                    +'<ul>'
                                        +'<form action="/task/update" method="POST" class="updb">'
                                            +'<?=csrf_field()?>'
                                            +'<li><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;商品名：&emsp;</th><td><input type="text" name="task_name" value="<?=$task->task_name?>" required></td></li>'
                                            +'<li><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;値段：&emsp;</th><td><input type="text" name="price" value="<?=$task->price?>"></td></li>'
                                            +'<li><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;期限：&emsp;</th><td><input type="date" name="date" value="<?=$task->date?>"></td></li>'
                                            +'<li><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;URL:&emsp;&nbsp;</th><td><input type="text" name="url" value="<?=$task->url?>"></td></li>'
                                            +'<li><th>&nbsp;&nbsp;メリット：&emsp;</th><td><input type="text" name="meritto" value="<?=$task->meritto?>"></td></li>'
                                            +'<li><th>デメリット：&nbsp;&nbsp;</th><td><input type="text" name="demeritto" value="<?=$task->demeritto?>"></td></li>'
                                            +'<input type="hidden" name="id" value="<?=$task->id?>">'
                                            +'<input type="submit" value="更新" class="updateB">'
                                        +'</form>'
                                    +'</ul>'
                                +'</div>'
                            +'</div>';
                    document.write(d);
                    
                </script>
                            <form action="/task/delete" method="POST" class="delb">
                                <?=csrf_field()?>
                                <input type="hidden" name="id" value="<?=$task->id?>">
                                <input type="submit" value="削除" class="delb">
                            </form>
                <div class="details">
                    <span class="icon-quote"><a href="#">September 21, 2012</a></span>
                    <span class="likes"><a href="#" class="likeThis">27</a></span>
                    <span class="comments"><a href="#">4</a></span>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <!-- End Blog -->
    </div>
    <!-- End Blog Grid -->



</div>
<!-- End Wrapper -->
<div class="site-generator-wrapper">
    <div class="site-generator">Copyright Obscura 2012. Design by <a href="http://elemisfreebies.com">elemis</a>. All rights reserved.</div>
</div>
<!-- End Footer -->
<script type="text/javascript" src="js/scripts.js"></script>

</body>
</html>