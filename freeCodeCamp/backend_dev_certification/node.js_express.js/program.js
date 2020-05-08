console.log("HELLO WORLD");


console.log(process.argv);
// эта строка вернет массив из элементов введенных в консоли
// но первый элемент всегда будет node
// второй всегда будет место установки node
// так что всегда надо начинать с 3 элемента массива что б перебрать аргументы
// так же у всех элементов тип строка


var sum = 0;
for (var i = 2; i < process.argv.length; i++) {
	sum += Number(process.argv[i]);
}
console.log(sum);


// стандартная строка, она подключает модуль node.js который может оперировать с файлами
var fs = require('fs');
var path_to_file = process.argv[2];	
var buf_data_string = fs.readFileSync(path_to_file).toString();
var count = buf_data_string.split("\n");

console.log(count.length - 1);