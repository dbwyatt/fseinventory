$(function() {

    let table = $('#office-table').DataTable({
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

    // ajax open add new office item form
    $('#add_office_item').click(function(){
        $.ajax({
            url: base_url + 'offices/add_new_entry_ajax',
            method: 'GET',
            success: function(response) {
                $('body').append(response);
                $('#add_office_item_modal').modal("show");
                $('#add_office_item_modal').on('hidden.bs.modal', function (e) {
                    $('#add_office_item_modal').remove();
                });
            }
        });
    });

    // ajax open edit office item form
    $('#edit_office_item').click(function(){
        $.ajax({
            url: base_url + 'offices/edit_entry_ajax',
            method: 'GET',
            success: function(response) {
                $('body').append(response);
                $('#edit_office_item_modal').modal("show");
                $('#edit_office_item_modal').on('hidden.bs.modal', function (e) {
                    $('#edit_office_item_modal').remove();
                });
            }
        });
    });

    // currency input managing
    $('#priceInput1').change(function(){
        $('#priceInput1').val(parseFloat($('#priceInput1').val()).toFixed(2));});
    $('#priceInput2').change(function(){
        $('#priceInput2').val(parseFloat($('#priceInput2').val()).toFixed(2));});
    
});