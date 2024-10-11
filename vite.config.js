import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { viteStaticCopy } from 'vite-plugin-static-copy';
import * as packages from './package.json';
import fsExtra from 'fs-extra'; // Import fs-extra as a default import
import { join } from 'path';

export default defineConfig({
    plugins: [
      laravel({
        input: [
          'resources/css/app.css', 
          'resources/sass/app.scss', 
          'resources/js/app.js',

          // Resources assets js file paths
          'resources/assets/js/alerts',
          'resources/assets/js/apexcharts-area',
          'resources/assets/js/apexcharts-bar',
          'resources/assets/js/apexcharts-boxplot',
          'resources/assets/js/apexcharts-bubble',
          'resources/assets/js/apexcharts-candlestick',
          'resources/assets/js/apexcharts-column',
          'resources/assets/js/apexcharts-heatmap',
          'resources/assets/js/apexcharts-line',
          'resources/assets/js/apexcharts-mixed',
          'resources/assets/js/apexcharts-pie',
          'resources/assets/js/apexcharts-polararea',
          'resources/assets/js/apexcharts-radar',
          'resources/assets/js/apexcharts-radialbar',
          'resources/assets/js/apexcharts-rangearea',
          'resources/assets/js/apexcharts-scatter',
          'resources/assets/js/apexcharts-timeline',
          'resources/assets/js/apexcharts-treemap',
          'resources/assets/js/authentication-main',
          'resources/assets/js/blog-post',
          'resources/assets/js/canada',
          'resources/assets/js/chartjs-charts',
          'resources/assets/js/chat',
          'resources/assets/js/checkall-mail',
          'resources/assets/js/checkout',
          'resources/assets/js/choices',
          'resources/assets/js/color-picker',
          'resources/assets/js/custom-switcher',
          'resources/assets/js/dashboards-charts',
          'resources/assets/js/datatables',
          'resources/assets/js/date&time_pickers',
          'resources/assets/js/defaultmenu',
          'resources/assets/js/draggable-cards',
          'resources/assets/js/echarts',
          'resources/assets/js/file-details',
          'resources/assets/js/fileupload',
          'resources/assets/js/form-input-mask',
          'resources/assets/js/fullcalendar',
          'resources/assets/js/gallery',
          'resources/assets/js/google-maps',
          'resources/assets/js/grid',
          'resources/assets/js/handlecounter',
          'resources/assets/js/index',
          'resources/assets/js/italy',
          'resources/assets/js/jsvectormap',
          'resources/assets/js/landing',
          'resources/assets/js/leaflet',
          'resources/assets/js/modal',
          'resources/assets/js/notifications',
          'resources/assets/js/nouislider',
          'resources/assets/js/prism-custom',
          'resources/assets/js/profile',
          'resources/assets/js/quill-editor',
          'resources/assets/js/ratings',
          'resources/assets/js/russia',
          'resources/assets/js/select2',
          'resources/assets/js/simplebar',
          'resources/assets/js/spain',
          'resources/assets/js/sweet-alerts',
          'resources/assets/js/swiper',
          'resources/assets/js/Toasts',
          'resources/assets/js/treeview',
          'resources/assets/js/us-merc-en',
          'resources/assets/js/validation',
        ],
        refresh: true,
      }),

      viteStaticCopy({
        targets: [
          {
            src: ([
              'resources/assets/images/',
              'resources/assets/video/',
              'resources/assets/icon-fonts/',
              'resources/assets/js/main.js',
              'resources/assets/js/sticky.js',
              'resources/assets/js/show-password.js',
              'resources/assets/js/two-step-verification.js',
              'resources/assets/js/under-maintenance.js',
              'resources/assets/js/dataseries.js',
              'resources/assets/js/apexcharts-stock-prices.js',
              'resources/assets/js/apex-github-data.js',
              'resources/assets/js/apexcharts-irregulardata.js',
              'resources/assets/js/apexcharts-candlestick-seriesdata.js',
              'resources/assets/js/apexcharts-dayjs.js',
            ]),
            dest: 'assets/'
          }
        ]
      }),

      {
        // Use a custom plugin for copying distribution files
        name: 'copy-dist-files',
        writeBundle: async () => {
          const destDir = 'public/build/assets/libs';  // Update the destination directory
  
          for (const dep of Object.keys(packages.dependencies)) {
            const srcPath = join('node_modules', dep, 'dist');
            const destPath = join(destDir, dep);
  
            // Check if the 'dist' directory exists for the dependency
            if (await fsExtra.pathExists(srcPath)) {
              // Copy the distribution files (contents of 'dist') to the destination directory
              await fsExtra.copy(srcPath, destPath, {
                overwrite: true,
                recursive: true,
              });
  
              // Remove the 'dist' directory from the destination
              await fsExtra.remove(join(destPath, 'dist'));
            } else {
              // If 'dist' folder doesn't exist, check if the package itself exists and copy it.
              const packageSrcPath = join('node_modules', dep);
              const packageDestPath = join(destDir, dep);
  
              if (await fsExtra.pathExists(packageSrcPath)) {
                await fsExtra.copy(packageSrcPath, packageDestPath, {
                  overwrite: true,
                  recursive: true,
                });
              }
            }
          }
        },
      },

      {
      name: 'blade',
      handleHotUpdate({ file, server }) {
        if (file.endsWith('.blade.php')) {
          server.ws.send({
            type: 'full-reload',
            path: '*',
          });
        }
      },
      }
    ],
    build: {
      chunkSizeWarningLimit: 1600,
      outDir: 'public/build',
      emptyOutDir: true,
    },
});
