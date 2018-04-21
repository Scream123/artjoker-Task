<div class="form-group">
    <label  class="col-sm-3 control-label">Район</label>
    <div class="col-sm-6">
    <select data-placeholder="Район" class="chosen-select" required="reuired field" style="width:270px;" id="district"> 
        <option value=""></option>
        {foreach from=$districts_arr item=district}
        <option value="{$district.ter_id}">{$district.ter_name}</option>
        {/foreach}   
    </select>
    </div>
  </div>
