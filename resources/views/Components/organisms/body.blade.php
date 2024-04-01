@props(['datas','headers','props'=>[],'buttonClass'=>'test','rows','href'=>'route(atomic.create)','ulClass'=>'pagination','liClass'=>'page-item','aClass'=>'page-link','currentPage', 'lastPage', 'modal' => []])
<x-molecules.Table :datas="$datas" :headers="$headers" :rows="$rows" href="$href" :buttonClass="$buttonClass">
</x-molecules.Table>
<x-molecules.Pagination :currentPage="$currentPage" :lastPage="$lastPage" :ulClass="$ulClass" :liClass="$liClass" :aClass="$aClass"></x-molecules.Pagination>

<x-molecules.Modal :props="$props"/>