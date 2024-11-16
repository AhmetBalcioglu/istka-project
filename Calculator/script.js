// Get the display element
const display = document.getElementById('display');

// Define the calculator's state
let currentNumber = '';
let previousNumber = '';
let operation = null;

// Function to handle button clicks
function handleButtonClick(value) {
    if (value === 'C') {
        // Clear the display and state
        display.textContent = '';
        currentNumber = '';
        previousNumber = '';
        operation = null;
    } else if (value === '=') {
        // Evaluate the expression
        if (operation && currentNumber) {
            const result = evaluateExpression(previousNumber, currentNumber, operation);
            display.textContent = result;
            currentNumber = result;
            previousNumber = '';
            operation = null;
        }
    } else if (['+', '-', '*', '/'].includes(value)) {
        // Store the operation and previous number
        operation = value;
        previousNumber = currentNumber;
        currentNumber = '';
    } else {
        // Append the digit to the current number
        currentNumber += value;
        display.textContent = currentNumber;
    }
}

// Function to evaluate the expression
function evaluateExpression(num1, num2, operation) {
    switch (operation) {
        case '+':
            return parseFloat(num1) + parseFloat(num2);
        case '-':
            return parseFloat(num1) - parseFloat(num2);
        case '*':
            return parseFloat(num1) * parseFloat(num2);
        case '/':
            return parseFloat(num1) / parseFloat(num2);
        default:
            return 0;
    }
}

// Add event listeners to the buttons
document.querySelectorAll('.btn').forEach((button) => {
    button.addEventListener('click', () => {
        handleButtonClick(button.textContent);
    });
});