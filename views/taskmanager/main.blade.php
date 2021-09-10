<div id="task_list">

</div>

@component("modal-component", [
    "id" => "fileLocationModal",
    "title" => "Dosya Konumu",
    "notSized" => "true"
])
<div id="fileLocationContent"></div>
@endcomponent

@component("modal-component", [
    "id" => "fileTreeModal",
    "title" => "Görev Ağacı",
    "notSized" => "true"
])
<div id="fileTreeContent"></div>
@endcomponent

@include("taskmanager.scripts")