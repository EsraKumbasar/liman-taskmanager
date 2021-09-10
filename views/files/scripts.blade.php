<script>
    function files()
    {
        showSwal("Yükleniyor...", "info");

        let data = new FormData();
        request("{{ API('files_list') }}", data, function (response) {
            // Başarılıysa
            $("#files_list").html(response).find(".table").dataTable(dataTablePresets("normal"));
            Swal.close();
        }, function (error) {
            // Başarısızsa
            console.log(error);
        });
    }
</script>