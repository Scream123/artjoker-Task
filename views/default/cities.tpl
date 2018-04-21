<div class="form-group">
    <label  class="col-sm-3 control-label">Город</label>
    <div class="col-sm-6">
    <select data-placeholder="Город" class="chosen-select" required="reuired field" style="width:270px;" id="city"> 
        <option value=""></option>
        {foreach from=$cities_arr item=city}
        <option value="{$city.ter_id}">{$city.ter_name}</option>
        {/foreach}
    </select>
    </div>
  </div>
<input type="button" value="sign up" id="submit">