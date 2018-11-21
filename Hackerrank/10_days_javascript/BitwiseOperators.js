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

function getMaxLessThanK(n, max) {
    // console.log(n);
    // console.log(max);

    let currentMax = 0;
    let tempNumber = 0;

    for(let i = 1; i<n; i++) {
        for(let j = i+1; j<=n; j++) {
            tempNumber = i & j;
            currentMax = tempNumber > currentMax && tempNumber < max ? tempNumber : currentMax;
            // console.log(tempNumber);
        }
    }

    return currentMax;
}

function main() {
    const q = +(readLine());
    
    for (let i = 0; i < q; i++) {
        const [n, k] = readLine().split(' ').map(Number);
        
        console.log(getMaxLessThanK(n, k));
    }
}

// To run this script you need in console from this folder run command
// node BitwiseOperators.js < BitwiseOperators.txt