
<div class="container-fluid">
    <div class="row" id="main_container">
        <div class="col-xs-6 col-md-6">
            Зарегистрироваться
        <br/><br/>
   <!--Форма регистрации -->   
   <div id="registerBox">
    <form class="form-horizontal" method="post" role="form">
<div class="form-group">
    <label  class="col-sm-3 control-label">ФИО</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="name" placeholder="Name" id="name" required>
    </div>
  </div>
  <div class="form-group">
    <label  class="col-sm-3 control-label">Email</label>
    <div class="col-sm-6">
      <input type="email" class="form-control" name="email" placeholder="Email" id="email" required >
    </div>
  </div>
  
<div class="form-group">
    <label  class="col-sm-3 control-label">Область</label>
    <div class="col-sm-6">
    <select data-placeholder="Область" class="chosen-select" required style="width:270px;" id="region"> 
        <option value=""></option>
        <option value="0100000000">Автономна Республіка Крим</option>
        <option value="0500000000">Вінницька область</option>
        <option value="0700000000">Волинська область</option>
        <option value="1200000000">Дніпропетровська область</option>
        <option value="1400000000">Донецька область</option>
        <option value="1800000000">Житомирська область</option>
        <option value="2100000000">Закарпатська область</option>
        <option value="2300000000">Запорізька область   </option>
        <option value="2600000000">Івано-Франківська область</option>
        <option value="3200000000">Київська область</option>
        <option value="3500000000">Кіровоградська область</option>
        <option value="4400000000">Луганська область</option>
        <option value="4600000000">Львівська область</option>
        <option value="4800000000">Миколаївська область</option>
        <option value="5100000000">Одеська область</option>
        <option value="5300000000">Полтавська область</option>
        <option value="5600000000">Рівненська область</option>
        <option value="5900000000">Сумська область</option>
        <option value="6100000000">Тернопільська область</option>
        <option value="6300000000">Харківська область</option>
        <option value="6500000000">Херсонська область</option>
        <option value="6800000000">Хмельницька область</option>
        <option value="7100000000">Черкаська область</option>
        <option value="7300000000">Чернівецька область</option>
        <option value="7400000000">Чернігівська область</option>
        </select>
    </div>
  </div>
<div id="districts"></div>
<div id="cities"></div> 
</form> 
   </div> 
        </div>
        <div class="col-xs-6 col-md-6" id="userData"></div>
    </div>
</div>