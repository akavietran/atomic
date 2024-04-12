@props(['title','name','id'=>[]])


<div class="form-group">
  <x-atoms.label value="{{$title}}"></x-atoms.label>
  <select name="{{$name}}[]" id="{{$id['persons']}}" multiple style="display: none;">

  </select>
  <div id="{{$id['persons-checkboxes']}}"></div>
</div>



