const path = require('path');
const webpack = require('webpack');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const CleanWebpackPlugin = require('clean-webpack-plugin');
const glob = require('glob');

module.exports = {
	entry: {
		// main: './fseinventory/js/main.js',
		myPages: glob.sync('./fseinventory/js/*.js'),
		// vendor: ['jquery']
	},
	devtool: 'source-map',
	devServer: {
		contentBase: './dist/js',
		port: 8008
	},
	plugins: [
		new CleanWebpackPlugin(['dist']),
		new HtmlWebpackPlugin({
			title: 'Development'
		})
	],
	output: {
		path: path.resolve(__dirname, 'dist/js'),
		filename: 'main.bundle.js'
	},
	module: {
		rules: [
			{
				test: /\.js$/,
				exclude: /(node_modules|bower_components)/,
				use: {
					loader: 'babel-loader',
					options: {
						presets: ['babel-preset-env']
					}
				}
			}
		]
	},
	stats: {
		colors: true
	}
};