var elixir = require('laravel-elixir');

// The assets path
elixir.config.assetsPath = 'assets';

// Run elixir tasks
elixir(function(mix) {
    mix.sass('barebones.scss', 'styles.css')
       .scripts(['script.js'], 'js/scripts.min.js');
});