
@props(['headers','data','mainRoute'=>null,'row','pagination'=>null])

<x-molecules.Table :headers="$headers" :data="$data" :mainRoute="$mainRoute" :row="$row"  >
</x-molecules.Table>
<x-molecules.Pagination :pagination="$pagination"  >
</x-molecules.Pagination>