<script>
    $(function () {
        $("#table").DataTable(
            {
                "pageLength": -1,
                "dom": 't',
                "scrollX": true,
                'columnDefs': [
                    {
                        "targets": [0],
                        "width": "250px"
                    },
                    {
                        "targets": [1],
                        "className": "text-center",
                        "width": "100px"
                    },
                    {
                        "targets": [2, 4],
                        "width": "200px"
                    },
                    {
                        "targets": [3, 5],
                        "width": "150px"
                    },
                    {
                        "targets": [6],
                        "width": "120px"
                    },
                    {
                        "targets": [7, 8],
                        "className": "text-center",
                        "width": "120px"
                    },
                    {
                        "targets": [9, 10],
                        "width": "300px"
                    },
                ],
                "order": [[1, "asc"]]
            }
        );
    });
</script>
