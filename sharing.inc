<script type="text/javascript" src="js/access.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap-modal.js"></script>

<div class="container">
    <div class="marketing">
        <h1>Управление доступом</h1>
        <div class="row">
            <div class="span4 offset1">
                <h2>Вы предоставили доступ:</h2>
                <div class="well">
                    <div id='access_list'></div>
                </div>
                <a class="btn btn-primary" onclick="openAddUser(); return false;">Добавить пользователя</a>
            </div>
            <div class="span4 offset2">
                <h2>Вы имеете доступ:</h2>
                <div class="well">
                    <div id='you_access'></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addUser">
  <div class="modal-header">
    <a class="close" data-dismiss="modal">×</a>
    <h3>Введите имя пользователя</h3>
  </div>
  <form action="./" method="post" onsubmit="addaccess(); return false;">
  <div class="modal-body">
    <p>Этому пользователю будет даны права на написание твитов от вашего лица</p>

          <div class="input-prepend">
                          <span class="add-on">@</span>
                          <input class="span2" id="twitteraccount" size="16" type="text">
                        </div>
  </div>
  <div class="modal-footer">
    <a href="#" class="btn" data-dismiss="modal">Close</a>
    <a class="btn btn-primary" onclick="addaccess(); return false;">Дать права</a>
  </div>
    </form>
</div>

