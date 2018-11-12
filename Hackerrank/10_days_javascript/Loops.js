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

/*
 * Complete the vowelsAndConsonants function.
 * Print your output using 'console.log()'.
 */
function vowelsAndConsonants(s) {
    let stringSplit = s.split("");
    let vowels = ['a', 'e', 'i', 'o', 'u'];
    let nonVowels = [];

    stringSplit.forEach(function(letter, i, arr) {
        if (vowels.indexOf(letter) != -1) {
            console.log(letter);
        } else {
            nonVowels.push(letter);
        }
    });

    nonVowels.forEach(function(letter, i, arr) {
        console.log(letter);
    });
}

function main() {
    const s = readLine();
    
    vowelsAndConsonants(s);
}

// To run this script you need in console from this folder run command
// node Loops.js < Loops.txt