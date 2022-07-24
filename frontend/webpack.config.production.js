const path = require('path');
const Dotenv = require('dotenv-webpack');

module.exports = {
    mode: 'production',
    entry: './src/index.js',
    output: {
        filename: 'main.js',
        path: path.resolve(__dirname, 'dist'),
    },
    plugins: [
        new Dotenv({
            path: './process.env',
        })
    ]
};
