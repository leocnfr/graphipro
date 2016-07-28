var elixir = require('laravel-elixir');

elixir(function(mix) {
    mix.browserify('main.js'); // mix.browserify(srcPath, outputPath, srcBaseDir, browserifyOptions)
});