const path = require("path");
//const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const OptimizeCssAssetsPlugin = require("css-minimizer-webpack-plugin");
const TerserPlugin = require("terser-webpack-plugin");


module.exports = {
    entry: {
        main: "./src/js//Main.js",
        twit: "./src/js/Twit.js",
        layout: "./src/js/Layout.js"
    },
    output: {
        filename: "[name].bundle.js",
        path: path.resolve(__dirname, "dist")
    },
    optimization: {
        minimizer: [
            new OptimizeCssAssetsPlugin(),
            new TerserPlugin()
        ]
    },
    /*plugins: [
        new MiniCssExtractPlugin({ filename: "[name].css" })
    ],*/
    module: {
        rules: [
            {
                test: /\.scss$/,
                use: [
                    "style-loader",//MiniCssExtractPlugin.loader,
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