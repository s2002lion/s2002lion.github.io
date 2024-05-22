// Display current date and time
function displayDateTime() {
  const now = new Date();
  const dateTimeString = now.toLocaleString();
  document.getElementById(
    'dateTime'
  ).innerText = `Current Date and Time: ${dateTimeString}`;
}

displayDateTime();
setInterval(displayDateTime, 1000); // Update every second

// Calculate amusement park entrance fee
function calculateEntranceFee() {
  const age = document.getElementById('age').value;
  let fee;

  if (age < 3) {
    fee = 'Free';
  } else if (age >= 3 && age <= 12) {
    fee = '$10';
  } else if (age >= 13 && age <= 64) {
    fee = '$20';
  } else if (age >= 65) {
    fee = '$15';
  } else {
    fee = 'Invalid age';
  }

  document.getElementById('feeResult').innerText = `Entrance Fee: ${fee}`;
}

// Calculate cafe menu total
function calculateTotal() {
  const coffeeCount = document.getElementById('coffee').value;
  const teaCount = document.getElementById('tea').value;
  const sandwichCount = document.getElementById('sandwich').value;

  const coffeePrice = 5;
  const teaPrice = 3;
  const sandwichPrice = 7;

  const total =
    coffeeCount * coffeePrice +
    teaCount * teaPrice +
    sandwichCount * sandwichPrice;
  document.getElementById('totalResult').innerText = `Total: $${total.toFixed(
    2
  )}`;
}
