<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Server-Side Rendering (SSR)
    |--------------------------------------------------------------------------
    |
    | When using SSR with Inertia.js, this option defines whether SSR is enabled,
    | the URL of the SSR server (if external), and the path to the SSR bundle.
    |
    */
    'ssr' => [
        'enabled' => true,
        'url' => null, // Set this to your SSR server URL if external
        'bundle' => base_path('bootstrap/ssr/ssr.js'), // Path to the SSR bundle
    ],

    /*
    |--------------------------------------------------------------------------
    | Inertia Version
    |--------------------------------------------------------------------------
    |
    | This option controls the asset version sent with your Inertia responses.
    | It is useful for cache busting. By default, this will match your Mix/Webpack
    | or Vite asset versioning.
    |
    */
    'version' => function () {
        return md5_file(public_path('mix-manifest.json'));
    },
];