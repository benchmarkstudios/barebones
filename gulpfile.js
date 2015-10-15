var elixir = require('laravel-elixir');

// Assets path
elixir.config.assetsPath = 'assets';

// Run elixir tasks
elixir(function(mix) {
    mix.sass('barebones.scss', 'style.css')
       .scripts(['script.js'], 'js/script.min.js');
});