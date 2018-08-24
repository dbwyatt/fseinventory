'use strict';

const _ = require('lodash');

function createTable(selector, options) {
    try {
        if (!selector && typeof selector !== 'string') {
            throw 'Selector is invalid';
        }
        
        const table = $(selector).DataTable(options);

        table.on('select', selectAction);
        table.on('deselect', selectAction);
        window.summaryItems = summarize(table.rows(), table);

        table.initializeButtons = initializeButtons(table, options);
        return table;

        function selectAction(e, dt, type, indexes) {
            if (type === 'row' && dt.rows({selected: true}).count() !== 0) {
                window.summaryItems = summarize(dt.rows({selected: true}), dt);
            }
            else if (dt.rows({selected: true}).count() === 0) {
                window.summaryItems = summarize(dt.rows({}), dt);
            }
        }
    }
    catch (e) {
        console.log(e);
    }
}

function initializeButtons(table, options) {
    return function () {
        const toolbar = $(`
            <div id="toolbar">
                <ul class="actions"></ul>
                <span class="divider"></span>
                <ul class="exports"></ul>
            </div>
        `);
        const buttons = table.buttons().container().find('button');
        _.map(options.buttons, (button) => button.text = button.text.toLowerCase());
        buttons.each(function(i, button) {
            const buttonText = $(button).text();
            const mapping = _.find(options.buttons, {text: buttonText.toLowerCase()});
            const fauxButton = $(
                `<li class="toolbar-button" data-toggle="tooltip" title="${buttonText}">
                    <i class="fa${mapping.text === 'print' ? 's' : 'r'} fa-${mapping.icon}"></i>
                </li>`
            ).on('click', () => $(button).trigger('click'));
            
            toolbar.find(`.${mapping.type}`).append(fauxButton);
        });
        toolbar.appendTo('.datatable-tile');
        toolbar.find('[data-toggle="tooltip"]').tooltip({delay: {'show': 500, 'hide': 100}});
    };
}

function summarize(selected, dt) {
    const high = 1000;
    const mid = 500;
    const low = 0;
    let count, totalValue, highValue, midValue, lowValue;
    
    const columnIndex = dt.column($('#total_line_value') || $('#purchase_price')).index();
    const columnData = _.map(selected.data(), columnIndex);
    count = selected.count();
    totalValue = columnData.reduce((a, b) => {
        return parseFloat(a) + parseFloat(b);
    }, 0);
    highValue = columnData.reduce((a, b) => {
        return parseFloat(a) + (parseFloat(b) >= high ? parseFloat(b) : 0);
    }, 0);
    midValue = columnData.reduce((a, b) => {
        return parseFloat(a) + (parseFloat(b) >= mid && parseFloat(b) < high ? parseFloat(b) : 0);
    }, 0);
    lowValue = columnData.reduce((a, b) => {
        return parseFloat(a) + (parseFloat(b) >= low && parseFloat(b) < mid ? parseFloat(b) : 0);
    }, 0);

    console.log('Count: ', count);
    console.log('Total: ', totalValue);
    console.log('High: ', highValue);
    console.log('Mid: ', midValue);
    console.log('Low: ', lowValue);

    $('.total-value .value').text(`$${Number(totalValue).toLocaleString()}`);
    $('.total-count .value').text(Number(count).toLocaleString());

    return {
        getCount: () => count,
        getTotalValue: () => totalValue,
        getHighValue: () => highValue,
        getMidValue: () => midValue,
        getLowValue: () => lowValue
    };
}


module.exports = {
    createTable: createTable
};
