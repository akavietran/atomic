@props(['label', 'type', 'id', 'name', 'placeholder'])

<div class="form-group">
    <x-atoms.label :for="$id" :value="$label" />
    <x-atoms.input :type="$type" :id="$id" :name="$name" :placeholder="$placeholder" />
</div>