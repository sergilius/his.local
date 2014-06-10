<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="His">
        <!--    <link rel="shortcut icon" href="../../assets/ico/favicon.ico"> -->

        <title>His : <?php echo $data['title_page']; ?></title>

        <!-- Bootstrap core CSS -->
        <link href="/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="/css/his.css" rel="stylesheet">
        
        <script src="/js/jquery-1.10.2.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>

        <!-- Just for debugging purposes. Don't actually copy this line! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        <!-- Begin page content -->
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2 header-logo">
                        <a href="/"><span class="center-block">SomeLogo</span></a>
                    </div>
                    <div class="col-sm-8 header-center">
                        <div class="header-title">
                            <span class="center-block">Some Title</span>
                        </div>
                        <div class="header-nav">
                            <?php echo $data['menu_header']; ?>
                        </div>
                    </div>
                    <div class="col-sm-2 header-right">
                        11
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <!--     Left column - filters           -->
                <div class="col-sm-3 left-col">
                    <form role="form">
                        <div class="panel-group" id="brand">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#brandName">
                                            Каталог
                                        </a>
                                    </h4>
                                </div>
                                <div id="brandName" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div>
                                            <a href="/"><span class="center-block">Мобильные телефоны и смартфоны</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </form>
                </div> <!--  End   Left column - filters           -->
                <div class="col-sm-9 context-right well"> <!--  Right column - content       -->
                    <?php // echo $data['list_phones']; ?>
                    <?php echo $data['content']; ?>
                </div> <!--  End   Right column - content       -->
            </div>

        </div>

        <div id="footer">
            <div class="container">
                <div class="center-block footer-linx">
                    <?php echo $data['menu_footer']; ?>

                </div>
                <!--                <p class="text-muted">Place sticky footer content here.</p> -->
            </div>
        </div>


        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
    </body>
</html>