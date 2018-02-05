$(function() {

    let table = $('#tools-table').DataTable({
        pagingType: 'numbers',
        fixedHeader: true,
        autoFill: true,
        colReorder: true,
        rowReorder: true,
        responsive: true,
        select: true,
        dom: 'Blfrtip',
        buttons: [
            'copy',
            'csv',
            'excel',
            {
                extend: 'pdf',
                orientation: 'landscape'
            },
            'print'
        ]
    });
    
    // ajax open add new tool entry form
    $('#add_tool_entry').click(function(){
        $.ajax({
            url: base_url + 'tools/add_new_entry_ajax',
            method: 'GET',
            success: function(response) {
                $('body').append(response);
                $('#tool_modal').modal("show");
                $('#tool_modal').on('hidden.bs.modal', function (e) {
                    $('#tool_modal').remove();
                });
            }
        });
    });

    // ajax open edit tool entry form
    $('#edit_tool_entry').click(function(){
        $.ajax({
            url: base_url + 'tools/edit_entry_ajax',
            method: 'GET',
            success: function(response) {
                $('body').append(response);
                $('#tool_modal').modal("show");
                $('#tool_modal').on('hidden.bs.modal', function (e) {
                    $('#tool_modal').remove();
                });
            }
        });
    });


});