

  <x-atoms.label for="text" name="username"  >hello atomic</x-atoms.label>
  <x-atoms.input type="text" name="username" placeholder="Enter your username" />
  <x-atoms.textarea type="text" name="comment" placeholder="Enter your comment" />
  <x-atoms.select name="options[]" :options="[
    '1' => 'hello1',
    '2' => 'hello2',
    '3' => 'hello3',
]" />
  <x-atoms.input type="date" name="date" placeholder="Enter your date" />
  <x-atoms.input type="checkbox" name="checkbox" placeholder="Enter your checkbox" />
  <x-atoms.button type="submit">Submit</x-atoms.button>

<table>
  <x-atoms.thead>
  <x-atoms.td>
    td
  </x-atoms.td>
  <x-atoms.th>
    th
  </x-atoms.th>
</x-atoms.thead>
</table>
<x-atoms.button id="launchModalBtn" type="button" class="btn btn-primary">
  Launch modal
</x-atoms.button>



