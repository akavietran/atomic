@props(['title', 'name', 'options' => [],'id'=>null,'class'=>null,'selected'=>null])

<div >
    <x-atoms.label :value="$title"></x-atoms.label>
    <x-atoms.select :selected='$selected' :class="$class" :name="$name" :id="$id" :options="$options" ></x-atoms.select>
</div>
