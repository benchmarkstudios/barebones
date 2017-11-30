/**
 * Base config
 *
 * @param src - Main assets folder
 * @param public - Folder where assets should be compiled
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
 * @param base - Base configuration
 * @param scripts - Array of script files to create bundles from
 */
export default {
  /**
   * Base
   */
  base: config,

  /**
   * Scripts
   *
   * Add path continuing after 'config.src'
   */
  scripts: [
    '/js/scripts.js',
  ],
};
