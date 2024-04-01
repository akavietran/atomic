@props(['props'=>[]])


<div class="{{  $props['modal']['main'] }}" tabindex="-1" id="exampleModal" role="dialog" aria-hidden="false">
  <div class="{{  $props['modal']['dialog'] }}" role="document">
    <div class="{{  $props['modal']['content'] }}">
      <div class="{{  $props['modal']['header'] }}">
        <x-atoms.heading5 class="{{  $props['modal']['title'] }}">{{ $props['title'] }}</x-atoms.heading5>
      </div>
      
      <div class="{{  $props['modal']['body'] }}">
        <x-atoms.p>{{ $props['body'] }}</x-atoms.p>
      </div>
      
      <div class="{{  $props['modal']['footer'] }}">
        <x-atoms.button type="button" class="btn btn-primary {{ $props['buttonClass']}}">Save changes</x-atoms.button>
        <x-atoms.button type="button" onclick="handleClose()" class="btn btn-secondary {{ $props['buttonClass'] }}" data-dismiss="modal">Close</x-atoms.button>
      </div>
    </div>
  </div>
</div>
