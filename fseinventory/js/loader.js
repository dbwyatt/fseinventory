'use strict';

module.exports = {
	create: create,
	start: start,
	stop: stop,
	destroy: destroy
};

let loader;
let self = this;

function start(selector) {
	if (selector) {
		self.selector = selector;
		$(selector + ' > div').hide();
		$(selector).prepend(loader);
	}
	loader.show();
}

function stop() {
	loader.hide();
}

function destroy() {
	loader.remove();
}

function create() {
	if (!loader) {
		loader = $(`
			<div class="loader">
				<div class="spinner"></div>
				<span>Loading...</span>
			</div>
		`);
	}
	return loader;
}
