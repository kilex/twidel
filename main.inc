<div class="container">
    <div class="marketing">
        <h1>TwiDel</h1>
        <p class="marketing-byline">
            Пока это все что есть, но мы работаем над расширением функционала
        </p>
		<hr class="soften">
        <div class="row">
            <div class="span4">
                <h2><a href="./index.php?tweet=1">Написать твит</a></h2>
                <p>Вы можете написать твит из под любого доступного вам аккаунта</p>
            </div>
            <div class="span4">
                <h2><a href="?sharing=1">Доступ</a></h2>
                <p>Управление доступом к вашей учетной записи и просмотр списка полученного доступа</p>
            </div>
            <div class="span4">
                <h2><a href="./clearsessions.php">Выйти</a></h2>
                Завершить работу с сервисом (к примеру если вы вошли не со своего домашнего/рабочего компьютера)
            </div>
        </div>
    </div>
    <div class="footer">KiLEX@2012</div>
    <?php
    if (isset($debug)) print "<div class='well'>$debug</div> ";
    ?>
</div>
</body>
</html>
