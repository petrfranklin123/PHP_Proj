'use strict';

let path = require('path');
// по умолчанию, без этого конфигурацонного файла 
// входные данные берутся из папки src/index.js
// выход dist/main.js

//mode - задается тип редактирования 
//entry - путь откуда будет браться входной файл 
//output - выходные параметры, имя файла и путь
//watch - слежка за проектом 
//devtool - сохранение исходных даннных
module.exports = {
  mode: 'development',
  entry: './js/script.js',
  output: {
    filename: 'bundle.js',
    path: __dirname + '/js'
  },
  watch: true,

  devtool: "source-map",


  /*
  команды для babel
  npm install --save-dev @babel/core @babel/cli @babel/preset-env
  //добавляем все библиотеки
  npm install --save @babel/polyfill
  npm i --save-dev babel-loader
  npm i --save-dev core-js

  
  */
  module: {
    //rules - правила использования
    rules: [
      {
        //находим js файлы 
        test: /\.m?js$/,
        //исключения такие:
        exclude: /(node_modules|bower_components)/,
        //используем 
        use: {
          loader: 'babel-loader',
          options: {
            //используем пресет 
            presets: [['@babel/preset-env', {
                //debug - позволяет врежиме компиляции видеть, что происходит 
                debug: true,
                //определяем какие библиотеки нам нужны
                corejs: 3,
                useBuiltIns: "usage"
            }]]
          }
        }
      }
    ]
  }
};
