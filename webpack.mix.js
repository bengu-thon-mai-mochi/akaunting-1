const mix = require('laravel-mix');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
let { VueLoaderPlugin } = require('vue-loader');
 const tailwindcss = require('tailwindcss');
const { treemapResquarify } = require('d3-hierarchy');



/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

//mix.js('resources/assets/js/views/**/*.js', 'public/js')

mix
    .setPublicPath('public/')
    .webpackConfig({
        output: {
            publicPath: 'public/js/',
            filename: '[name].js',
            chunkFilename: '[name].js',
        },
        module: {
            rules: [
                {
                    test: /\.js?$/,
                    exclude: [/node_modules/],
                    loader: 'babel-loader',
                },
                {
                    test: /\.vue$/,
                    exclude: [/node_modules/],
                    use: [
                        'vue-loader',
                    ]
                },
                {
                    test:  /\.s(a|c)ss$/,
                    use: [
                         {
                             loader: "sass-loader",
                             options: {
                                implementation: require('node-sass'),
                                sourceMap: true,
                                sassOptions: {
                                    outputStyle: "extended",
                                    fiber: require('fibers'),
                                },
                             }
                        },
                    ]
                },
            ],
        },
        stats: {
            children: true,
        },
        resolve: {
            alias: { vue: 'vue/dist/vue.esm.js' },
            extensions: ['.css', '.scss', '.less', '.js', '.jsx', '.vue']
        }
    })

    // Auth
    .js('resources/assets/js/views/auth/forgot.js', 'public/js/auth')
    .js('resources/assets/js/views/auth/login.js', 'public/js/auth')
    .js('resources/assets/js/views/auth/permissions.js', 'public/js/auth')
    .js('resources/assets/js/views/auth/reset.js', 'public/js/auth')
    .js('resources/assets/js/views/auth/roles.js', 'public/js/auth')
    .js('resources/assets/js/views/auth/users.js', 'public/js/auth')

    // Banking
    .js('resources/assets/js/views/banking/accounts.js', 'public/js/banking')
    .js('resources/assets/js/views/banking/transactions.js', 'public/js/banking')
    .js('resources/assets/js/views/banking/transfers.js', 'public/js/banking')
    .js('resources/assets/js/views/banking/reconciliations.js', 'public/js/banking')

    // Common
    .js('resources/assets/js/views/common/companies.js', 'public/js/common')
    .js('resources/assets/js/views/common/dashboards.js', 'public/js/common')
    .js('resources/assets/js/views/common/documents.js', 'public/js/common')
    .js('resources/assets/js/views/common/imports.js', 'public/js/common')
    .js('resources/assets/js/views/common/items.js', 'public/js/common')
    .js('resources/assets/js/views/common/reports.js', 'public/js/common')

    // Sales
    .js('resources/assets/js/views/sales/customers.js', 'public/js/sales')

    // Purchases
    .js('resources/assets/js/views/purchases/vendors.js', 'public/js/purchases')

    // Install
    .js('resources/assets/js/install.js', 'public/js')
    .js('resources/assets/js/views/install/update.js', 'public/js/install')

    //Wizard
    .js('resources/assets/js/wizard.js', 'public/js/wizard')

    // Modules
    .js('resources/assets/js/views/modules/item.js', 'public/js/modules')
    .js('resources/assets/js/views/modules/apps.js', 'public/js/modules')

    // Portal
    .js('resources/assets/js/views/portal/dashboard.js', 'public/js/portal')
    .js('resources/assets/js/views/portal/invoices.js', 'public/js/portal')
    .js('resources/assets/js/views/portal/payments.js', 'public/js/portal')
    .js('resources/assets/js/views/portal/profile.js', 'public/js/portal')

    // Settings
    .js('resources/assets/js/views/settings/categories.js', 'public/js/settings')
    .js('resources/assets/js/views/settings/currencies.js', 'public/js/settings')
    .js('resources/assets/js/views/settings/modules.js', 'public/js/settings')
    .js('resources/assets/js/views/settings/settings.js', 'public/js/settings')
    .js('resources/assets/js/views/settings/taxes.js', 'public/js/settings')
    
    .js('resources/assets/js/views/**/*.js', 'public/js')
        
    
    .postCss('resources/assets/sass/app.css', 'public/css', [
        require('tailwindcss'),
        require('autoprefixer'),
        require('postcss-preset-env')
    ])
    .options({
        processCssUrls: true,
        postCss: [tailwindcss('./tailwind.config.js')]
    }).sourceMaps();
    
/* 

mix.sourceMaps();

                         {
                            loader: "sass-loader",
                            options: {
                                implementation: require("sass"),
                                sourceMap: true,
                                sassOptions: {
                                    quietDeps: true,
                                    outputStyle: 'expanded',
                                }, 
                            },
                        },


{
                            loader: 'css-loader',
                            options: {
                                modules: true
                            },
                            
                        },
                        'sass-loader',
                        {
                            loader: `postcss-loader`,
                            options: {
                                options: {},
                            }
                        },
                        {
                            loader: MiniCssExtractPlugin.loader,
                            options: { publicPath: "" },
                        },
                    ]
                    */