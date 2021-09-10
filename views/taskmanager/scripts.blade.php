<script>
    function taskManager()
    {
        showSwal("Yükleniyor...", "info");

        let data = new FormData();
        request("{{ API('task_manager_list') }}", data, function (response) {
            // Başarılıysa
            $("#task_list").html(response).find(".table").dataTable(dataTablePresets("normal"));
            Swal.close();
        }, function (error) {
            // Başarısızsa
            console.log(error);
        });
    }

    function jsGetFileLocation(node)
    {
        showSwal("Yükleniyor...", "info");

        let data = new FormData();
        data.append("pid", $(node).find("#pid").html())
        request("{{ API('get_file_location') }}", data, function (response) {
            // Başarılıysa
            response = JSON.parse(response);
            $("#fileLocationModal").modal("show");
            $("#fileLocationContent").html(response.message);
            Swal.close();
        }, function (error) {
            // Başarısızsa
            console.log(error);
        });
    }

    function jsGetTree(node)
    {
        showSwal("Yükleniyor...", "info");

        let data = new FormData();
        // data.append("pid", $(node).find("#pid").html())
        request("{{ API('get_file_tree') }}", data, function (response) {
            // Başarılıysa
            response = JSON.parse(response);
            $("#fileTreeModal").modal("show");
            $("#fileTreeContent").html(response.message);
            Swal.close();
        }, function (error) {
            // Başarısızsa
            console.log(error);
        });
    }


    // function jsGetServiceStatus(node)
    // {
    //     showSwal("Yükleniyor...", "info");

    //     let data = new FormData();
    //     data.append("pid", $(node).find("#pid").html())
    //     request("{{ API('get_file_location') }}", data, function (response) {
    //         // Başarılıysa
    //         response = JSON.parse(response);
    //         $("#fileLocationModal").modal("show");
    //         $("#fileLocationContent").html(response.message);
    //         Swal.close();
    //     }, function (error) {
    //         // Başarısızsa
    //         console.log(error);
    //     });
    // }
</script>