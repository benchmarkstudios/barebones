/**
 * Base config
 *
 * src - main assets folder
 * public - folder where assets should be compiled
 */
const config = {
  src: './assets',
  public: './',
};

/**
 * Export configuration that is used in gulpfile
 *
 * For scripts and styles, each file will be a separate bundle
 *
 * base - base configuration
 * scripts - array of script files to create bundles from
 */
export default {
  /**
   * Base
   */
  base: config,

  /**
   * Scripts
   */
  scripts: [
    `${config.src}/scripts/scripts.js`,
  ],

  /**
   * Styles
   */
  styles: [
    `${config.src}/styles/*.scss`,
  ],
};
