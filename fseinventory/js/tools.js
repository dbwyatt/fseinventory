$(function() {
    'use strict';

    const dataTable = require('./table');

    const tableOptions = {
        fixedHeader: {
            header: true,
            headerOffset: $('.navbar').outerHeight()
        },
        responsive: true,
        select: true,
        buttons: [
            {
                text: 'Add',
                action: function(e, dt, node, config) {
                    $.ajax({
                        url: base_url + 'tools/add_new_entry_ajax',
                        method: 'GET',
                        success: function(response) {
                            $('body').append(response);
                            $('#add_tool_modal').modal('show');
                            $('#add_tool_modal').on('hidden.bs.modal', function (e) {
                                $('#add_tool_modal').remove();
                            });
                        }
                    });
                },
                type: 'actions',
                icon: 'plus-square'
            },
            {
                text: 'Edit',
                action: function(e, dt, node, config) {
                    $.ajax({
                        url: base_url + 'tools/edit_entry_ajax',
                        method: 'GET',
                        success: function(response) {
                            $('body').append(response);
                            $('#edit_tool_modal').modal('show');
                            $('#edit_tool_modal').on('hidden.bs.modal', function (e) {
                                $('#edit_tool_modal').remove();
                            });
                        }
                    });
                },
                type: 'actions',
                icon: 'edit'
            },
            {
                extend: 'copy',
                text: 'Copy',
                type: 'actions',
                icon: 'copy'
            },
            {
                extend: 'csv',
                text: 'CSV',
                type: 'exports',
                icon: 'file'
            },
            {
                extend: 'excel',
                text: 'Excel',
                type: 'exports',
                icon: 'file-excel'
            },
            {
                extend: 'pdf',
                text: 'PDF',
                orientation: 'landscape',
                type: 'exports',
                icon: 'file-pdf'
            },
            {
                extend: 'print',
                text: 'Print',
                type: 'exports',
                icon: 'print'
            }
        ]
    };

    const table = dataTable.createTable('#tools-table', tableOptions);
    table.initializeButtons();

    // currency input managing
    $('#priceInput1').change(function(){
        $('#priceInput1').val(parseFloat($('#priceInput1').val()).toFixed(2));
    });
    $('#priceInput2').change(function(){
        $('#priceInput2').val(parseFloat($('#priceInput2').val()).toFixed(2));
    });

});
