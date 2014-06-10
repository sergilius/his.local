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
                                            Производитель
                                        </a>
                                    </h4>
                                </div>
                                <div id="brandName" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="checkbox">
                                            <label class="checkbox">
                                                <input type="checkbox" id="inlineCheckbox1" value="option1"> Dell
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="checkbox">
                                                <input type="checkbox" id="inlineCheckbox2" value="option2"> DROID
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="checkbox">
                                                <input type="checkbox" id="inlineCheckbox3" value="option3"> LG
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="checkbox">
                                                <input type="checkbox" id="inlineCheckbox1" value="option1"> Motorola
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="checkbox">
                                                <input type="checkbox" id="inlineCheckbox2" value="option2"> Nexus
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="checkbox">
                                                <input type="checkbox" id="inlineCheckbox3" value="option3"> Samsung
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="checkbox">
                                                <input type="checkbox" id="inlineCheckbox2" value="option2"> SANYO
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="checkbox">
                                                <input type="checkbox" id="inlineCheckbox3" value="option3"> T-Mobile
                                            </label>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel-group" id="os">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#osSize">
                                            Операционная система
                                        </a>
                                    </h4>
                                </div>
                                <div id="osSize" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="checkbox">
                                            <label class="checkbox">
                                                <input type="checkbox" id="inlineCheckbox1" value="option1">Android
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="checkbox">
                                                <input type="checkbox" id="inlineCheckbox2" value="option2">Windows Phone
                                            </label>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="panel-group" id="screenSize">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#amountSize">
                                            Диагональ экрана
                                        </a>
                                    </h4>
                                </div>
                                <div id="amountSize" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="checkbox">
                                            <label class="checkbox">
                                                <input type="checkbox" id="inlineCheckbox1" value="option1">менее 3.2"
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="checkbox">
                                                <input type="checkbox" id="inlineCheckbox2" value="option2"> 3,3"-3,9"
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="checkbox">
                                                <input type="checkbox" id="inlineCheckbox3" value="option3"> 4"
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="checkbox">
                                                <input type="checkbox" id="inlineCheckbox2" value="option2"> 4,3"-4,6"
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="checkbox">
                                                <input type="checkbox" id="inlineCheckbox3" value="option3"> 4.7" - 5"
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="checkbox">
                                                <input type="checkbox" id="inlineCheckbox3" value="option3"> 5" и более
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel-group" id="screenResolution">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#amountResolution">
                                            Разрешение дисплея
                                        </a>
                                    </h4>
                                </div>
                                <div id="amountResolution" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="checkbox">
                                            <label class="checkbox">
                                                <input type="checkbox" id="inlineCheckbox1" value="option1">Full HD (1920x1080)
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="checkbox">
                                                <input type="checkbox" id="inlineCheckbox2" value="option2">HD (1280x720)
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="checkbox">
                                                <input type="checkbox" id="inlineCheckbox3" value="option3">qHD (960x540)
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="checkbox">
                                                <input type="checkbox" id="inlineCheckbox2" value="option2">854x480
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="checkbox">
                                                <input type="checkbox" id="inlineCheckbox3" value="option3">640x480
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                        

                        <div class="panel-group" id="flash">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#amountFlash">
                                            Объем встроенной памяти
                                        </a>
                                    </h4>
                                </div>
                                <div id="amountFlash" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="checkbox">
                                            <label class="checkbox">
                                                <input type="checkbox" id="inlineCheckbox1" value="option1">32 Гб
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="checkbox">
                                                <input type="checkbox" id="inlineCheckbox2" value="option2">16 Гб
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="checkbox">
                                                <input type="checkbox" id="inlineCheckbox3" value="option3">8 Гб
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="checkbox">
                                                <input type="checkbox" id="inlineCheckbox2" value="option2">< 4 Гб
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel-group" id="ram">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#amountRam">
                                            Объем оперативной памяти
                                        </a>
                                    </h4>
                                </div>
                                <div id="amountRam" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="checkbox">
                                            <label class="checkbox">
                                                <input type="checkbox" id="inlineCheckbox1" value="option1">До 512 Мб
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="checkbox">
                                                <input type="checkbox" id="inlineCheckbox2" value="option2">512 - 768 Мб
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="checkbox">
                                                <input type="checkbox" id="inlineCheckbox3" value="option3">1024 - 1792 Мб
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="checkbox">
                                                <input type="checkbox" id="inlineCheckbox2" value="option2">2048 Мб и более
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel-group" id="camera">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#amountCamera">
                                           Камера, Mpx
                                        </a>
                                    </h4>
                                </div>
                                <div id="amountCamera" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="checkbox">
                                            <label class="checkbox">
                                                <input type="checkbox" id="inlineCheckbox1" value="option1">Нет
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="checkbox">
                                                <input type="checkbox" id="inlineCheckbox2" value="option2"> < 2 Mpx
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="checkbox">
                                                <input type="checkbox" id="inlineCheckbox3" value="option3">3 Mpx
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="checkbox">
                                                <input type="checkbox" id="inlineCheckbox2" value="option2">5 Mpx
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="checkbox">
                                                <input type="checkbox" id="inlineCheckbox2" value="option2">8 и более
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="checkbox">
                                                <input type="checkbox" id="inlineCheckbox3" value="option3"> > 10 Mpx
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="checkbox">
                                                <input type="checkbox" id="inlineCheckbox2" value="option2">HTC UltraPixel
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="panel-group" id="battery">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#amountBattery">
                                           Емкость аккумулятора
                                        </a>
                                    </h4>
                                </div>
                                <div id="amountBattery" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="checkbox">
                                            <label class="checkbox">
                                                <input type="checkbox" id="inlineCheckbox1" value="option1">До 1000 mAh
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="checkbox">
                                                <input type="checkbox" id="inlineCheckbox2" value="option2">1000 - 1900 мАч
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="checkbox">
                                                <input type="checkbox" id="inlineCheckbox3" value="option3">2000 мАч и более
                                            </label>
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