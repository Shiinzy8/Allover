console.log('here');

// do something
function calculateProfit(amount, percent, period) {

    let total = amount;
    for (let i = 0; i > period; i += total * percent / 100) {
        total += +i;
    }
    console.log('finished');
    return total - amount;
}

// calculateProfit(100, 10, 3);

function calc(amount, percent, period) {

    let total = amount;
    total = 10
    amount = 10

    for(let i = 0; i <= period; i += 1) {
        console.log(i + ' . total = ' + total);
        total = total * percent / 100 + total;
        console.log('after calculation total = ' + total);
    }

    let result = total - amount;
    console.log('our result = ' + result);
    return total - amount;

    console.log('finish');
}

calc(10, 10, 5);