<div class="container">
    <div class="span6 offset2">
        <form class="form-horizontal" method="post" action="tweeting.php">
          <fieldset>
            <legend>Отправка твита</legend>
            <div class="control-group">
              <label class="control-label" for="input01">Текст твита</label>
              <div class="controls">
        <!--        <input type="text" class="input-xlarge" id="input01">-->
                  <textarea class="input-xlarge" id="textarea" name="sendtweet" rows="3"></textarea>
<!--                <p class="help-block">Текст сообщения</p>-->
                  <p class="help-block">Не более 140 символов!</p>

              </div>
                <hr>
                <label class="control-label" for="input01">Учетная запись</label>

                <div class="controls">
                      <select id="select01" name="account">
                        <?php print $listtext;?>
                      </select>
                        <p class="help-block">Выберите учетную запись, от которой хотите написать твит</p>

                    </div>

            </div>
          </fieldset>
            <div class="form-actions">
                <input type="submit" value="Отправить" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>