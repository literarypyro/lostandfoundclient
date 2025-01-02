import { createInertiaApp } from '@inertiajs/inertia-vue3'; // Correct Inertia Vue 3 package
import { renderToString } from '@vue/server-renderer'; // Vue SSR renderer
import { createSSRApp, h } from 'vue'; // Create SSR app with Vue 3
import path from 'path';
import fs from 'fs';

export default function render(page) {
  return createInertiaApp({
    page, // The initial page object
    render: renderToString, // Use Vue SSR renderer
    resolve: (name) => {
      // Dynamically resolve the Vue component
      const pagesDir = path.resolve(__dirname, '../../resources/js/Pages');
      const filePath = path.resolve(pagesDir, `${name}.vue`);

      if (fs.existsSync(filePath)) {
        return import(filePath);
      }

      throw new Error(`Page component not found: ${name}`);
    },
    setup({ App, props, plugin }) {
      // Create and configure the SSR app
      return createSSRApp({
        render: () => h(App, props), // Render the app with SSR
      }).use(plugin); // Use Inertia plugin
    },
  });
}