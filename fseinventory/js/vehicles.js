$(function() {

    let table = $('#vehicles-table').DataTable({
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

    // ajax open add new vehicle form
    $('#add_vehicle').click(function(){
        $.ajax({
            url: base_url + 'vehicles/add_new_entry_ajax',
            method: 'GET',
            success: function(response) {
                $('body').append(response);
                $('#add_vehicles_modal').modal("show");
                $('#add_vehicles_modal').on('hidden.bs.modal', function (e) {
                    $('#add_vehicles_modal').remove();
                });
            }
        });
    });

    // ajax open edit vehicle form
    $('#edit_vehicle').click(function(){
        $.ajax({
            url: base_url + 'vehicles/edit_entry_ajax',
            method: 'GET',
            success: function(response) {
                $('body').append(response);
                $('#edit_vehicles_modal').modal("show");
                $('#edit_vehicles_modal').on('hidden.bs.modal', function (e) {
                    $('#edit_vehicles_modal').remove();
                });
            }
        });
    });

    // currency input managing
    $('#priceInput1').change(function(){
        $('#priceInput1').val(parseFloat($('#priceInput1').val()).toFixed(2));
    });

});