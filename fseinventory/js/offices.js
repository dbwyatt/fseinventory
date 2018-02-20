const dataTable = require('./table');

$(function() {
    'use strict';

    const tableOptions = {
        fixedHeader: true,
        autoFill: true,
        colReorder: true,
        rowReorder: true,
        responsive: true,
        select: true,
        // dom: 'Blfrtip',
        buttons: [
            {
                text: 'Add',
                action: function(e, dt, node, config) {
                    dt.ajax.reload();
                },
                type: 'actions',
                icon: 'plus-square'
            },
            {
                text: 'Edit',
                action: function(e, dt, node, config) {
                    dt.ajax.reload();
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
    const table = dataTable.createTable('#office-table', tableOptions);
    table.initializeButtons();
});