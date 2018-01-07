const webpack = require('webpack');
const path = require('path');
const ExtractTextPlugin = require("extract-text-webpack-plugin");
const UglifyJSPlugin = require('uglifyjs-webpack-plugin');
const OptimizeCssAssetsPlugin = require('optimize-css-assets-webpack-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const GoogleFontsPlugin = require("google-fonts-webpack-plugin");

const config = {
    entry: {
        app: './assets/js/app.js'
    },
    output: {
        filename: 'js/[name].js',
        chunkFilename: "js/[name].js",
        path: path.resolve(__dirname, 'dist'),
    },
    module: {
        rules: [
            {
                test: /\.scss$/,
                use: ExtractTextPlugin.extract({
                    fallback: 'style-loader',
                    use: [
                        {
                            loader: 'css-loader',
                            options: {importLoaders: 1}
                        },
                        'postcss-loader', 'sass-loader']
                })
            },
            {
                test: /\.css$/,
                use: ExtractTextPlugin.extract({
                    fallback: 'style-loader',
                    use: ['css-loader', 'postcss-loader']
                })
            },
            {
                test: /\.js$/,
                exclude: /(node_modules|bower_components)/,
                loader: 'babel-loader',
                query: {
                    presets: ['es2015']
                }
            },
            // the url-loader uses DataUrls.
            // the file-loader emits files.
            {
                test: /\.woff2?(\?v=[0-9]\.[0-9]\.[0-9])?$/,
                // Limiting the size of the woff fonts breaks font-awesome ONLY for the extract text plugin
                // loader: "url?limit=10000"
                use: "url-loader"
            },
            {
                test: /\.(ttf|eot|svg)(\?[\s\S]+)?$/,
                use: 'file-loader'
            }
        ]
    },
    plugins: [
        new ExtractTextPlugin('/css/[name].css'),
        new webpack.optimize.CommonsChunkPlugin({
            name: 'vendor',
            minChunks(module) {
                let context = module.context;
                return context && context.indexOf('node_modules') >= 0;
            },
        }),
        new BrowserSyncPlugin({
            proxy: 'strzal.test',
            port: 3022,
            files: [
                '**/*.php', '**/*.html'
            ],
            ghostMode: {
                clicks: false,
                location: false,
                forms: false,
                scroll: false
            },
            injectChanges: true,
            logFileChanges: true,
            logLevel: 'debug',
            logPrefix: 'wepback',
            notify: true,
            reloadDelay: 0
        }),
      /*  new webpack.ProvidePlugin({
            $: 'jquery',
            jQuery: 'jquery',
            'window.jQuery': 'jquery',
            Popper: ['popper.js', 'default']
        }),*/
        new GoogleFontsPlugin({
            fonts: [
                { family: "Source Sans Pro" },
                { family: "Roboto", variants: [ "400", "700italic" ] }
            ]
            /* ...options */
        })
    ],
};

if (process.env.NODE_ENV === 'production') {
    config.plugins.push(
        new UglifyJSPlugin(),
        new OptimizeCssAssetsPlugin()
    );
}

module.exports =
 config
;
