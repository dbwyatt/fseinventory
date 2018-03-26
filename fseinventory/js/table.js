'use strict';

const _ = require('lodash');
const loader = require('loader');
loader.create();

function createTable(selector, options) {
    try {
        if (!selector && typeof selector !== 'string') {
            throw 'Selector is invalid';
        }

        options.initComplete = function(settings, json) {
            loader.stop();
        };
        
        loader.start('#body-content');
        const table = $(selector).DataTable(options);
        initializeButtons(table, options);
        return table;
    }
    catch (e) {
        console.log(e);
    }
}

function initializeButtons(table, options) {
    const toolbar = createToolbar();
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
    toolbar.appendTo('.content');
    toolbar.find('[data-toggle="tooltip"]').tooltip({delay: {'show': 500, 'hide': 100}});
}

function createToolbar() {
    const toolbar = $(`
        <div id="toolbar">
            <ul class="actions"></ul>
            <span class="divider"></span>
            <ul class="exports"></ul>
        </div>
    `);
    return toolbar;
}

module.exports = {
    createTable: createTable
};
