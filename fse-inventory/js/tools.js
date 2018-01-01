$(function() {

    var table = $('#tools-table').DataTable({
        fixedHeader: true,
        autoFill: true,
        colReorder: true,
        rowReorder: true,
        response: true,
        select: true,
        buttons: [
            'copy', 'excel', 'pdf'
        ]
    });

    table.buttons().container()
    .appendTo( $('.col-sm-6:eq(0)', table.table().container() ) );
    
	$('.loading').hide();
	$('#tools-table').show();

});