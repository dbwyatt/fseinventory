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
    $('#add_tool').click(function(){
        $.ajax({
            url: base_url + 'tools/add_new_entry_ajax',
            method: 'GET',
            success: function(response) {
                $('body').append(response);
                $('#add_tool_modal').modal("show");
                $('#add_tool_modal').on('hidden.bs.modal', function (e) {
                    $('#add_tool_modal').remove();
                });
            }
        });
    });

    // ajax open edit tool entry form
    $('#edit_tools').click(function(){
        $.ajax({
            url: base_url + 'tools/edit_entry_ajax',
            method: 'GET',
            success: function(response) {
                $('body').append(response);
                $('#edit_tool_modal').modal("show");
                $('#edit_tool_modal').on('hidden.bs.modal', function (e) {
                    $('#edit_tool_modal').remove();
                });
            }
        });
    });

    $('#priceInput1').change(function(){
        $('#priceInput1').val(parseFloat($('#priceInput1').val()).toFixed(2));});
    $('#priceInput2').change(function(){
        $('#priceInput2').val(parseFloat($('#priceInput2').val()).toFixed(2));});

});