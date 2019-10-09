'use strict';

process.stdin.resume();
process.stdin.setEncoding('utf-8');

let inputString = '';
let currentLine = 0;

process.stdin.on('data', inputStdin => {
    inputString += inputStdin;
});

process.stdin.on('end', _ => {
    inputString = inputString.trim().split('\n').map(string => {
        return string.trim();
    });
    
    main();    
});

function readLine() {
    return inputString[currentLine++];
}

/**
*   Return the second largest number in the array.
*   @param {Number[]} nums - An array of numbers.
*   @return {Number} The second largest number in the array.
**/
function getSecondLargest(nums) {
    // Complete the function
    let max = 0;
    let secondMax = 0;

    nums.forEach(function(e, i, array) {
        // 'i' is the index
        // 'e' is the element
        if (max < e) {
            secondMax = max;
            max = e;
        } 
        // console.log(max);
        if (secondMax < e && max > e) {
            secondMax = e;
        }
    });

    return secondMax;
}

function main() {
    const n = +(readLine());
    const nums = readLine().split(' ').map(Number);
    
    console.log(getSecondLargest(nums));
}

// To run this script you need in console from this folder run command
// node Arrays.js < Arrays.txt

// var a = ['first', 'second'];
// Loop over the Array
// a.forEach(function(e, i, array) {
    // 'i' is the index
    // 'e' is the element
    // console.log(i + ' ' + e);
// });
// Iterate over an Array
// for (let e of a) {
    // console.log('e:', e);
// }
// Append 'third' to array 'a'
// a.push('third');
// Remove the last element from the array
// let removed = a.pop();
// Remove the first element from the array
// let removed = a.shift();
// Insert element at the beginning of the array
// a.unshift('fourth');
// let position = a.indexOf('second');
// Remove 'elementsToRemove' element(s) starting at 'position'
// a.splice(1, 2);
// Shallow copy array 'a' into a new object
// let b = a.slice();
// Sort in ascending lexicographical order using a built-in
// b.sort();
// Sort in descending lexicographical order using a compare function
// b.sort(function(x, y) { return x < y; } );
// Sort in descending lexicographical order using a compare arrow function
// b.sort((x, y) => x < y);