const path = require("path");
const OptimizeCssAssetsPlugin = require("css-minimizer-webpack-plugin");
const TerserPlugin = require("terser-webpack-plugin");
const HtmlMinimizerPlugin = require("html-minimizer-webpack-plugin");
const CopyPlugin = require("copy-webpack-plugin");


module.exports = {
    entry: {
        main: "./src/js//Main.js",
        twit: "./src/js/Twit.js",
        layout: "./src/js/Layout.js"

    },
    resolve: {
        alias: {
            jquery: "jquery/src/jquery"
        }
    },
    plugins: [
        new CopyPlugin({

            patterns: [
                {
                    from: path.resolve(__dirname, "src/html"),
                    to: 'html',
                    noErrorOnMissing: true
                },
            ],
        })
    ],
    output: {
        filename: "[name].bundle.js",
        path: path.resolve(__dirname, "dist")
    },
    optimization: {
        minimize: true,
        minimizer: [
            new OptimizeCssAssetsPlugin(),
            new TerserPlugin(),
            new HtmlMinimizerPlugin()
        ]
    },
    module: {
        rules: [
            {
                test: /\.html$/,
                type: "asset/resource",
            },
            {
                test: /\.scss$/,
                use: [
                    "style-loader",
                    "css-loader",
                    "sass-loader"
                ]
            },
            {
                test: /\.(svg|png|jpg|gif)$/,
                use: {
                    loader: "file-loader",
                    options: {
                        name: "[name].[hash].[ext]",
                        outputPath: "img"
                    }
                }
            }

        ]
    },
    stats: { children: true }
};