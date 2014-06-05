<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>REST.local</title>
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="css/restlocal.css" rel="stylesheet" type="text/css" >

        <script src="js/jquery-1.10.2.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
        <script language="javascript" type="text/javascript" src="js/jquery.rest_start.js"></script>

    </head>

    <body>
        <div id="wrap">
            <div class="header">
                <div class="container">
                    <div class="header-name">REST.local</div>
                    <div class="header-api">
                        <table class="table">
                            <tr>
                                <td>GET</td>
                                <td>авторизация</td>
                                <td>/author/</td>
                                <td>200 OK / 401 Unauthorized</td>
                                <td>ok/ - compare</td>
                            </tr>
                            <tr>
                                <td>POST</td>
                                <td>menu</td>
                                <td>/menu/</td>
                                <td>200 OK</td>
                                <td>ok</td>
                            </tr>
                            <tr>
                                <td>POST</td>
                                <td>list article</td>
                                <td>/article/</td>
                                <td>200 OK</td>
                                <td>ok/ - crud</td>
                            </tr>
                            <tr>
                                <td>POST</td>
                                <td>view</td>
                                <td>/view/3/</td>
                                <td>200 OK</td>
                                <td>ok</td>
                            </tr>
                            <tr>
                                <td>POST</td>
                                <td>add article</td>
                                <td>/add/</td>
                                <td>201 Created / 400 Bad Request</td>
                                <td>ok / - upload</td>
                            </tr>
                            <tr>
                                <td>POST</td>
                                <td>edit article</td>
                                <td>/edit/3/</td>
                                <td>202 Accepted / 400 Bad Request</td>
                                <td>ok</td>
                            </tr>
                            <tr>
                                <td>GET</td>
                                <td>DELETE</td>
                                <td>/delete/3/</td>
                                <td>202 Accepted / 400 Bad Request</td>
                                <td>ok</td>
                            </tr>
                        </table>
                        <!--    /*
                              GET    авторизация     /author/index.php                                  401 Unauthorized / 200 OK
                              POST   list article    /article/ — получить список всех книг              200 OK
                              POST   article         /article/3/ — получить книгу номер 3               200 OK
                              POST   add article     /edit/ — добавить книгу (данные в теле запроса)    201 Created
                              POST   edit article    /edit/3 – изменить книгу (данные в теле запроса)   202 Accepted
                              GET    DELETE          /delete/3 – удалить книгу                          202 Accepted 
                             */
                        -->
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="section_a">
                    <div class="page-header">
                        <h1>Добро пожаловать</h1>
                    </div>
                    <div class="section_m">
                        <form class="form-signin">
                            <h2 class="form-signin-heading">Авторизация</h2>
                            <input class="input-block-level" placeholder="Ваш e-mail" type="email" required>
                            <input type="password" class="input-block-level" placeholder="Пароль">
                            <!--                    <label class="checkbox">
                                                    <input type="checkbox" value="remember-me"> Remember me
                                                </label>
                            -->
                            <button class="btn btn-large btn-primary" type="submit">Отправить</button>
                        </form>
                    </div>
                </div>
<!--                <p class="lead">Pin a fixed-height footer to the bottom of the viewport in desktop browsers with this custom HTML and CSS.</p> -->
            </div>
            <div id="push"></div>
        </div>
        <div id="footer">
            <div class="container">
                <div class="footer-left">
                    <p class="muted credit">REST <a href="http://rest.local/">Fist attempt</a>. login: aaa@bbb.ccc pswd: 123</p>
                </div>
                <div class="footer-right"> </div>
            </div>
        </div>
    </body>
</html>