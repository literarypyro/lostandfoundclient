import { createInertiaApp } from '@inertiajs/inertia-vue3'; // Correct Inertia Vue 3 package
import { renderToString } from '@vue/server-renderer'; // Vue SSR renderer
import { createSSRApp, h } from 'vue'; // Create SSR app with Vue 3

createInertiaApp({
  page: (page) => {
    return createInertiaApp({
      page,
      render: renderToString, // Use SSR rendering function
      resolve: (name) => {


        const pages = require.context('./Pages', true, /\.vue$/); 

        return pages[`./Pages/${name}.vue`]; // Resolve the correct page component
      },
      setup({ App, props, plugin }) {
        // Set up the SSR app
        return createSSRApp({
          render: () => h(App, props), // Render the app with SSR
        }).use(plugin); // Use Inertia plugin in SSR
      },
    });
  },
});