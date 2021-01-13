const { series, src, dest, watch, gulp } = require('gulp');
const sass = require('gulp-sass');
const bsync = require('browser-sync').create();

function css_comp(cb) {
  return src('sass/style.scss')
  .pipe(sass())
  .pipe(dest('../.'))
  .pipe(bsync.stream())
  cb()
}

function phpreload(cb) {
  return src('../**/*.php')
  .pipe(bsync.stream())
  cb()
}

function serve(cb) {

  bsync.init({
    proxy: 'banzai.com.loc/',
    port: 3000
  })

  watch('../**/*.php', series('phpreload'))
  watch('../**/*.s[ac]ss', series('css_comp'))
  cb()
}

exports.default = serve;
exports.phpreload = phpreload;
exports.css_comp = css_comp;
