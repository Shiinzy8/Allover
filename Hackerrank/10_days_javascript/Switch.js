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

function getLetter(s) {
    let letter;
    let position;
    // Write your code here
    let arrArr = [
        ['a', 'e', 'i', 'o', 'u'],
        ['b', 'c', 'd', 'f', 'g'],
        ['h', 'j', 'k', 'l', 'm'],
        ['n', 'p', 'r', 'q', 's', 't', 'v', 'w', 'x', 'y', 'z'],
    ];

    arrArr.forEach(function(item, i, arr) {
        if (arrArr[i].indexOf(s[0]) != -1) {
            position = i;
        }
    });

    switch (position) {
        case 0:
            letter = 'A';
            break;
        case 1:
            letter = 'B';
            break;
        case 2:
            letter = 'C';
            break;
        case 3:
            letter = 'D';
            break;
    }
    
    return letter;
}

function main() {
    const s = readLine();
    
    console.log(getLetter(s));
}

// To run this script you need in console from this folder run command
// node Switch.js < Switch.txt