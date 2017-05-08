function key(index) {
  switch (index) {
    case 1:
      return "At-Home DNA Test";

    case 2:
      return "Legal DNA Test";

    case 3:
      return "Immigration/Surrogacy DNA Test";

    case 4:
      return "Prenatal DNA Test";
  }
}

function price(index) {
  switch (index) {
    case 1:
      return 210;

    case 2:
      return 450;

    case 3:
      return 550;

    case 4:
      return 630;
  }
}

function createCookie(name, value, days) {
  if (days) {
    var date = new Date();
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    var expires = "; expires=" + date.toGMTString();
  } else var expires = "";
  console.log(name);
  document.cookie = name + "=" + value + expires + "; path=/";
}

function readCookie(name) {
  var nameEQ = name + "=";
  var ca = document.cookie.split(';');
  for (var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') c = c.substring(1, c.length);
    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
  }
  return null;
}

function eraseCookie(name) {
  createCookie(name, "", -1);
}

function updateCookie(name, value) {
  var cvalue = parseInt(readCookie(name)) || 0;
  cvalue += value;
  if (cvalue < 0) {
    cvalue = 0;
  }
  createCookie(name, cvalue, 1);
}

function addTest(item) {
  var ckey = key(item);
  var cvalue = parseInt(readCookie(ckey)) || 0;
  createCookie(ckey, cvalue + 1, 1);
}

function toUSD(number) {
  var number = number.toString(),
    dollars = number.split('.')[0],
    cents = (number.split('.')[1] || '') + '00';
  dollars = dollars.split('').reverse().join('')
    .replace(/(\d{3}(?!$))/g, '$1,')
    .split('').reverse().join('');
  return '$' + dollars + '.' + cents.slice(0, 2);
}

function insertRow(amount, test, price, editable) {
  var table = document.getElementById("shopping_cart_table");
  var row = table.insertRow(1);
  var cell0 = row.insertCell(0);
  var cell1 = row.insertCell(1);
  var cell2 = row.insertCell(2);
  var cell3 = row.insertCell(3);
  cell0.innerHTML = amount;
  cell1.innerHTML = test;
  cell2.innerHTML = toUSD(price);
  cell3.innerHTML = toUSD(amount * price);
  if (editable) {
    var addBtn = document.createElement("BUTTON");
    var addText = document.createTextNode("+");
    addBtn.appendChild(addText);
    var removeBtn = document.createElement("BUTTON");
    var removeText = document.createTextNode("-");
    removeBtn.appendChild(removeText);
    addBtn.onclick = function () {
      updateCookie(test, 1);
      amount = readCookie(test)
      cell0.innerHTML = amount;
      cell0.appendChild(addBtn);
      cell0.appendChild(removeBtn);
      cell3.innerHTML = toUSD(amount * price);
      updateTotal();
    };
    removeBtn.onclick = function () {
      updateCookie(test, -1);
      amount = readCookie(test)
      cell0.innerHTML = readCookie(test);
      cell0.appendChild(addBtn);
      cell0.appendChild(removeBtn);
      cell3.innerHTML = toUSD(amount * price);
      updateTotal();
    };
    cell0.appendChild(addBtn);
    cell0.appendChild(removeBtn);
  }
}

function checkItemForIndex(index, editable) {
  var ckey = key(index);
  var cvalue = parseInt(readCookie(ckey)) || 0;
  if (editable || (!editable && cvalue > 0)) {
    insertRow(cvalue, ckey, price(index), editable);
  }
}

function total(index) {
  var test = key(index);
  var amount = parseInt(readCookie(test)) || 0;
  return amount * price(index);
}

function totalCost() {
  var total_cost = total(1);
  total_cost += total(2);
  total_cost += total(3);
  total_cost += total(4);
  return total_cost;
}

function updateTotal() {
  var total_cell = document.getElementById("total_cell");
  var total_cost = totalCost();
  total_cell.innerHTML = toUSD(total_cost);

  var visibility = "hidden";
  if (total_cost > 0) {
    visibility = "visible";
  }
  document.getElementById("checkout").style.visibility = visibility;
}

function displayShoppingCart() {
  checkItemForIndex(4, true);
  checkItemForIndex(3, true);
  checkItemForIndex(2, true);
  checkItemForIndex(1, true);
  updateTotal();

  var total_cost = totalCost();
  if (total_cost > 0) {
    document.getElementById("shopping_cart_table").style.visibility = "visible";
    document.getElementById("emptyCart").style.visibility = "hidden";
  } else {
    document.getElementById("shopping_cart_table").style.visibility = "hidden";
    document.getElementById("emptyCart").style.visibility = "visible";
  }
}

function displayOrderReview() {
  checkItemForIndex(4, false);
  checkItemForIndex(3, false);
  checkItemForIndex(2, false);
  checkItemForIndex(1, false);
  updateTotal();
}

var valid = 0;

function openCheckout() {
  window.open("checkout.php", "_self");
  valid = 0;
}

function deleteCookies() {
  eraseCookie(key(1));
  eraseCookie(key(2));
  eraseCookie(key(3));
  eraseCookie(key(4));
}

function resetForm() {
  document.getElementById("checkout_form").reset();
  enableSubmit(false);
}

function enableSubmit(enabled) {
  var btn = document.getElementById("submit_form")
  if (enabled === true) {
    btn.className = "enabledButton";
  } else {
    btn.className = "disableButton";
  }
  btn.disabled = !enabled;
}

function changingBit(number, x, n) {
  number ^= (-x ^ number) & (1 << n);
  return number;
}

function validation(id, pattern) {
  var input = document.getElementById(id).value;
  var test = pattern.test(input);
  var visibility = "hidden";
  if (test == false) {
    visibility = "visible";
  }
  document.getElementById(id.replace("Input", "Error")).style.visibility = visibility;
  return test
}

function firstNameValidation(id) {
  var a = validation(id, /^\s*[a-zA-Z]{3,}\s*$/);
  valid = changingBit(valid, a, 0);
  enableSubmit(valid == 4095);
}

function lastNameValidation(id) {
  var a = validation(id, /^\s*[a-zA-Z]{3,}\s*$/);
  valid = changingBit(valid, a, 1);
  enableSubmit(valid == 4095);
}

function address_line1Validation(id) {
  var a = validation(id, /^\s*\d{1,5}\s(\w\s*)*$/);
  valid = changingBit(valid, a, 2);
  enableSubmit(valid == 4095);
}

function cityValidation(id) {
  var a = validation(id, /^\s*[a-zA-Z]{3,}\s*$/);
  valid = changingBit(valid, a, 3);
  enableSubmit(valid == 4095);
}

function cpValidation(id) {
  var a = validation(id, /^\s*\d{5}\s*$/);
  valid = changingBit(valid, a, 4);
  enableSubmit(valid == 4095);
}

function stateValidation(id) {
  var a = validation(id, /^\s*(A[LKSZRAEP]|C[AOT]|D[EC]|F[LM]|G[AU]|HI|I[ADLN]|K[SY]|LA|M[ADEHINOPST]|N[CDEHJMVY]|O[HKR]|P[ARW]|RI|S[CD]|T[NX]|UT|V[AIT]|W[AIVY])\s*$/);
  valid = changingBit(valid, a, 5);
  enableSubmit(valid == 4095);
}

function emailValidation(id) {
  var a = validation(id, /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i);
  valid = changingBit(valid, a, 6);
  enableSubmit(valid == 4095);
}

function phoneValidation(id) {
  var a = validation(id, /^\s*(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}\s*$/);
  valid = changingBit(valid, a, 7);
  enableSubmit(valid == 4095);
}

function creditCardTypeValidation(id) {
  var a = validation(id, /^[12]$/);
  valid = changingBit(valid, a, 8);
  enableSubmit(valid == 4095);
}

function creditCardNumberValidation(id) {
  var type = document.getElementById("creditCardTypeInput").value;
  var a
  if (type == 1) {
    a = validation(id, /^\s*\d{4}\s?\d{4}\s?\d{4}\s?\d{4}\s*$/);
  } else if (type == 2) {
    a = validation(id, /^\s*\d{4}\s?\d{6}\s?\d{5}\s*$/);
  }
  valid = changingBit(valid, a, 9);
  enableSubmit(valid == 4095);
}

function expMonthValidation(id) {
  var a = validation(id, /^([123456789]|1[012])$/);
  valid = changingBit(valid, a, 10);
  enableSubmit(valid == 4095);
}

function expYearValidation(id) {
  var a = validation(id, /^\s*\d{4}\s*$/);
  valid = changingBit(valid, a, 11);
  enableSubmit(valid == 4095);
}