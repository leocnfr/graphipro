var elixir = require('laravel-elixir');

elixir(function(mix) {
    mix.browserify('main.js');// mix.browserify(srcPath, outputPath, srcBaseDir, browserifyOptions)
    mix.browserify('pro_livraison.js','public/js/pro_livraison.js')
});