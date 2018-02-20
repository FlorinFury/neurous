<?php
session_start();
$_SERVER['REMOTE_USER']
?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="person-page.css" rel="stylesheet">
    <link rel="shortcut icon" href="../design/logo-brain1.png" type="image/png">

    <title>ACCOUNT</title>
</head>
<body>

    <div class="above-header">
        <div class="header">
            <section class="header-section">
                <a href="../site/first-page-re.html">
                    <img src="../design/logo-brain.png" hspace="30px" height="46px" alt="NEUROUS">
                </a>
            </section>
            <section class="header-section">
                <div class="header-section-right-p" style="margin: 0 auto">
                    <p style="color:#381A4B; text-align: right">Добро пожаловать на <strong>NEUROUS!</strong></p>
                </div>
            </section>
            <section class="header-section">
                <section class="header-section-in">
                    <a href="logout.php" style="text-decoration: none;"><p>Выйти</p></a>
                </section>
                <section class="header-section-in">
                    <a href="person-page.php" style="text-decoration: none;"><p>Аккаунт</p></a>
                </section>
                <section class="header-section-in"></section>
            </section>
        </div>
    </div>

    <div class="main-block">

        <div class="main-block-title">
            <h1 align="center">Аккаунт</h1>
            <h2 align="center"  value="<?php echo $_POST['username']; ?>"></h2>
        </div>

        <div class="main-block-content">
            <div class="profile-block">
                <div class="profile-block-img-back">
                    <div class="profile">
                        <img src="../design/user5.png" style="width: 155px">
                    </div>
                </div>
                <div class="profile-info">
                    <p><strong>Имя пользователя</strong></p>
                    <p style="margin-left: 15px" value="<?php echo "kys"; ?>"></p>
                    <p><strong>email</strong></p>
                    <p style="margin-left: 15px" value="<?php echo "kys"; ?>"></p>
                </div>
                <a href="../site/second-page-re.html" style="text-decoration: none">
                    <p style="margin: 35px auto; padding: 10px; width: 150px; height: 30px; background: #381A4B; color: white; border-radius: 25px; text-align: center">
                        Список курсов
                    </p>
                </a>
            </div>

            <div class="progress-block">
                <p style="text-align: center; font-size: 24px"><strong>Прогресс</strong></p>

                <div class="contentContainer">

                    <div class="skillBar">
                        <p style="text-align: center"><a href="../site/first-lesson.html"><strong>Урок 1.</strong></a> Вводный урок. Теория.</p>
                        <div class="skillBarContainer">
                            <div class="skillBarValue value-100"></div>
                        </div>
                    </div>
                </div>

                <div class="contentContainer">
                    <div class="skillBar">
                        <p style="text-align: center"><a href="../site/second-lesson.html"><strong>Урок 2.</strong></a> Искусственный нейрон.</p>
                        <div class="skillBarContainer">
                            <div class="skillBarValue value-80"></div>
                        </div>
                    </div>
                </div>

                <div class="contentContainer">
                    <div class="skillBar">
                        <p style="text-align: center"><a href="../site/third-lesson.html"><strong>Урок 3.</strong></a> Целостная структура нейронных сетей.</p>
                        <div class="skillBarContainer">
                            <div class="skillBarValue value-60"></div>
                        </div>
                    </div>
                </div>

                <div class="contentContainer">
                    <div class="skillBar">
                        <p style="text-align: center"><a href="../site/four-lesson.html"><strong>Урок 4.</strong></a> Практическое задание по созданию нейронной сети.</p>
                        <div class="skillBarContainer">
                            <div class="skillBarValue value-10"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <div class="page-footer"></div>

</body>
</html>