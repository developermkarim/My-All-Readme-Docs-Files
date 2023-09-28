# JS PROBLEM SOLVING TOPIC BASED ON W3SHOOLS.COM
---
Here essments. However, please note that creating such a comprehensive document would be a time-consuming process, and it might not be feasible to cover all possible topics in a single response.

## BASIC
---
Its Basic Level Problem SOlving With the serial of W3SCHOOL.com website

### statements, syntax, variables, keywords, and operators
---


**Problem 1: Variable Declaration**
**Description:** Declare a variable `name` and assign the string "John" to it. Then, log the value of `name` to the console.

**Solution:**
```javascript
let name = "John";
console.log(name);
```

**Problem 2: Data Types**
**Description:** Create variables for an integer, a floating-point number, a string, and a boolean. Perform operations that demonstrate their data types.

**Solution:**
```javascript
let num = 42; // Integer
let floatNum = 3.14; // Floating-point number
let text = "Hello, world!"; // String
let isTrue = true; // Boolean

console.log(typeof num); // Output: "number"
console.log(typeof floatNum); // Output: "number"
console.log(typeof text); // Output: "string"
console.log(typeof isTrue); // Output: "boolean"
```

**Problem 3: Conditional Statements**
**Description:** Write a JavaScript program that checks if a given number is even or odd.

**Solution:**
```javascript
function isEvenOrOdd(num) {
  if (num % 2 === 0) {
    return "Even";
  } else {
    return "Odd";
  }
}

console.log(isEvenOrOdd(7)); // Output: "Odd"
```

**Problem 4: Logical Operators**
**Description:** Implement a function that checks if a number is between 10 and 20 (inclusive).

**Solution:**
```javascript
function isBetweenTenAndTwenty(num) {
  return num >= 10 && num <= 20;
}

console.log(isBetweenTenAndTwenty(15)); // Output: true
```

**Problem 5: Ternary Operator**
**Description:** Use the ternary operator to check if a person is eligible to vote based on their age.

**Solution:**
```javascript
function canVote(age) {
  return age >= 18 ? "Eligible to vote" : "Not eligible to vote";
}

console.log(canVote(21)); // Output: "Eligible to vote"
```
**Problem 6: Loops**
**Description:** Write a function that calculates the factorial of a given positive integer using a `for` loop.

**Solution:**
```javascript
function factorial(n) {
  let result = 1;
  for (let i = 1; i <= n; i++) {
    result *= i;
  }
  return result;
}

console.log(factorial(5)); // Output: 120
```

**Problem 7: Switch Statement**
**Description:** Create a JavaScript function that takes a day of the week (e.g., "Monday") as input and returns whether it's a weekday or a weekend day.

**Solution:**
```javascript
function isWeekdayOrWeekend(day) {
  switch (day) {
    case "Saturday":
    case "Sunday":
      return "Weekend";
    default:
      return "Weekday";
  }
}

console.log(isWeekdayOrWeekend("Wednesday")); // Output: "Weekday"
```

**Problem 8: String Concatenation**
**Description:** Write a function that concatenates two strings and returns the result.

**Solution:**
```javascript
function concatenateStrings(str1, str2) {
  return str1 + str2;
}

console.log(concatenateStrings("Hello, ", "world!")); // Output: "Hello, world!"
```

**Problem 9: Arrays**
**Description:** Create a function that finds the maximum element in an array of numbers.

**Solution:**
```javascript
function findMax(arr) {
  let max = arr[0];
  for (let i = 1; i < arr.length; i++) {
    if (arr[i] > max) {
      max = arr[i];
    }
  }
  return max;
}

console.log(findMax([3, 7, 2, 8, 5])); // Output: 8
```

**Problem 10: Logical NOT Operator**
**Description:** Write a function that checks if a given value is falsy (e.g., 0, "", null, undefined).

**Solution:**
```javascript
function isFalsy(value) {
  return !value;
}

console.log(isFalsy(0)); // Output: true
```

### arithmetic, assignments & data types
---

**Problem 1: Basic Arithmetic**
**Description:** Write a JavaScript function that performs basic arithmetic operations (addition, subtraction, multiplication, division) on two numbers.

**Solution:**
```javascript
function basicArithmetic(a, b) {
  const addition = a + b;
  const subtraction = a - b;
  const multiplication = a * b;
  const division = a / b;

  return {
    addition,
    subtraction,
    multiplication,
    division,
  };
}

const result = basicArithmetic(10, 5);
console.log(result); // Output: { addition: 15, subtraction: 5, multiplication: 50, division: 2 }
```

**Problem 2: Increment and Decrement**
**Description:** Create a JavaScript program that demonstrates the use of increment (`++`) and decrement (`--`) operators.

**Solution:**
```javascript
let count = 5;

console.log(count++); // Output: 5 (post-increment)
console.log(count);   // Output: 6

console.log(--count); // Output: 5 (pre-decrement)
console.log(count);   // Output: 5
```

**Problem 3: String Concatenation**
**Description:** Implement a function that concatenates two strings and returns the result.

**Solution:**
```javascript
function concatenateStrings(str1, str2) {
  return str1 + str2;
}

console.log(concatenateStrings("Hello, ", "world!")); // Output: "Hello, world!"
```

**Problem 4: Assignment Operators**
**Description:** Write a program that uses various assignment operators (`+=`, `-=`) to update a variable.

**Solution:**
```javascript
let num = 10;

num += 5; // Equivalent to num = num + 5
console.log(num); // Output: 15

num -= 3; // Equivalent to num = num - 3
console.log(num); // Output: 12
```

**Problem 5: Data Type Conversion**
**Description:** Explain implicit and explicit data type conversion in JavaScript and provide examples of both.

**Solution:**
```javascript
// Implicit conversion
const number = 42;
const text = "The answer is: " + number; // Implicitly converts number to a string
console.log(text); // Output: "The answer is: 42"

// Explicit conversion
const stringNumber = "55";
const intNumber = parseInt(stringNumber); // Explicitly converts string to an integer
console.log(intNumber); // Output: 55
```

**Problem 6: Division by Zero**
**Description:** Handle division by zero error in JavaScript and provide a safe solution.

**Solution:**
```javascript
function safeDivision(a, b) {
  if (b === 0) {
    return "Division by zero is not allowed.";
  } else {
    return a / b;
  }
}

console.log(safeDivision(10, 0)); // Output: "Division by zero is not allowed."
console.log(safeDivision(10, 5)); // Output: 2
```

**Problem 7: Number Validation**
**Description:** Implement a function that checks if a given input is a valid number.

**Solution:**
```javascript
function isValidNumber(input) {
  return typeof input === "number" && !isNaN(input);
}

console.log(isValidNumber(42));   // Output: true
console.log(isValidNumber("42")); // Output: false
```

**Problem 8: Floating-Point Precision**
**Description:** Explain the concept of floating-point precision issues in JavaScript and provide an example demonstrating such an issue.

**Solution:**
```javascript
function floatingPointPrecisionIssue() {
  const result = 0.1 + 0.2;
  console.log(result); // Output: 0.30000000000000004 (not 0.3 as expected due to precision)
}

floatingPointPrecisionIssue();
```

**Problem 9: NaN Handling**
**Description:** Implement a function that handles NaN values and replaces them with a default value.

**Solution:**
```javascript
function handleNaN(value, defaultValue) {
  return isNaN(value) ? defaultValue : value;
}

console.log(handleNaN(42, 0)); // Output: 42
console.log(handleNaN("Hello", 0)); // Output: 0 (replaced with default)
```

**Problem 10: Typeof Operator**
**Description:** Explain how to use the `typeof` operator to determine the data type of a variable.

**Solution:**
```javascript
function getDataType(value) {
  return typeof value;
}

console.log(getDataType(42)); // Output: "number"
console.log(getDataType("Hello")); // Output: "string"
```

**Problem 16: Working with Booleans**
**Description:** Write a JavaScript function that performs logical operations with Boolean values and returns the result.

**Solution:**
```javascript
function performLogicalOperations(a, b) {
  const andResult = a && b; // Logical AND
  const orResult = a || b;  // Logical OR
  const notResultA = !a;    // Logical NOT for 'a'
  const notResultB = !b;    // Logical NOT for 'b'

  return {
    andResult,
    orResult,
    notResultA,
    notResultB,
  };
}

console.log(performLogicalOperations(true, false));
// Output: { andResult: false, orResult: true, notResultA: false, notResultB: true }
```

**Problem 17: Null and Undefined**
**Description:** Create a JavaScript program that demonstrates the differences between `null` and `undefined`.

**Solution:**
```javascript
function nullVsUndefined() {
  let variable1; // Undefined by default
  let variable2 = null;

  const isUndefined1 = variable1 === undefined;
  const isUndefined2 = variable2 === undefined;
  const isNull1 = variable1 === null;
  const isNull2 = variable2 === null;

  return {
    isUndefined1,
    isUndefined2,
    isNull1,
    isNull2,
  };
}

console.log(nullVsUndefined());
// Output: { isUndefined1: true, isUndefined2: false, isNull1: false, isNull2: true }
```

**Problem 18: Working with Symbols**
**Description:** Explain the concept of symbols in JavaScript and provide an example of creating and using symbols.

**Solution:**
```javascript
// Example illustrating symbols
const uniqueKey = Symbol("description");

const obj = {
  [uniqueKey]: "This is a unique symbol key",
};

console.log(obj[uniqueKey]); // Output: "This is a unique symbol key"
```

**Problem 19: BigInt Data Type**
**Description:** Create a program that demonstrates the use of the BigInt data type for handling large integers.

**Solution:**
```javascript
function bigIntExample() {
  const bigNumber = BigInt(Number.MAX_SAFE_INTEGER) + BigInt(1);
  return bigNumber.toString();
}

console.log(bigIntExample());
// Output: A very large integer beyond the limits of Number.MAX_SAFE_INTEGER
```

**Problem 20: Typeof null and Functions**
**Description:** Explain why the `typeof null` is "object" and provide an example of using the `typeof` operator with functions.

**Solution:**
```javascript
// Explanation for typeof null
console.log(typeof null); // Output: "object" (a historical JavaScript quirk)

// Example with typeof and functions
function greet() {
  return "Hello, world!";
}

console.log(typeof greet); // Output: "function"
```

<!-- MORE ALTERNATIVE PROBLEMS ABOVE THAT -->
Certainly, here are 20 real-life JavaScript problem-solving scenarios related to arithmetic operations, assignments, and data types, each with detailed explanations and code examples:

**Problem 1: Basic Arithmetic Operations**
**Description:** Write a JavaScript function that calculates the result of basic arithmetic operations (addition, subtraction, multiplication, division) based on user input.

**Solution:**
```javascript
function basicArithmeticOperation(operator, num1, num2) {
  switch (operator) {
    case '+':
      return num1 + num2;
    case '-':
      return num1 - num2;
    case '*':
      return num1 * num2;
    case '/':
      return num1 / num2;
    default:
      return "Invalid operator";
  }
}

console.log(basicArithmeticOperation('+', 5, 3)); // Output: 8
```

**Problem 2: Calculate the Area of a Rectangle**
**Description:** Create a JavaScript function that calculates the area of a rectangle based on its length and width.

**Solution:**
```javascript
function calculateRectangleArea(length, width) {
  return length * width;
}

console.log(calculateRectangleArea(5, 4)); // Output: 20
```

**Problem 3: Calculate Compound Interest**
**Description:** Implement a JavaScript function that calculates compound interest based on principal amount, interest rate, and time.

**Solution:**
```javascript
function calculateCompoundInterest(principal, rate, time) {
  const compoundInterest = principal * Math.pow((1 + rate / 100), time) - principal;
  return compoundInterest.toFixed(2); // Round to 2 decimal places
}

console.log(calculateCompoundInterest(1000, 5, 3)); // Output: "157.63"
```

**Problem 4: Generate a Random Number**
**Description:** Write a JavaScript function that generates a random integer between a specified minimum and maximum value.

**Solution:**
```javascript
function getRandomInteger(min, max) {
  return Math.floor(Math.random() * (max - min + 1)) + min;
}

console.log(getRandomInteger(1, 100)); // Output: Random integer between 1 and 100
```

**Problem 5: String Length Check**
**Description:** Create a JavaScript function that checks if a given string exceeds a specified maximum length.

**Solution:**
```javascript
function isStringTooLong(str, maxLength) {
  return str.length > maxLength;
}

console.log(isStringTooLong("Hello, world!", 10)); // Output: true
```

**Problem 6: Celsius to Fahrenheit Conversion**
**Description:** Write a JavaScript function that converts a temperature in Celsius to Fahrenheit.

**Solution:**
```javascript
function celsiusToFahrenheit(celsius) {
  return (celsius * 9/5) + 32;
}

console.log(celsiusToFahrenheit(25)); // Output: 77
```

**Problem 7: Sum of Array Elements**
**Description:** Implement a JavaScript function that calculates the sum of all elements in an array.

**Solution:**
```javascript
function sumArrayElements(arr) {
  return arr.reduce((total, currentValue) => total + currentValue, 0);
}

console.log(sumArrayElements([1, 2, 3, 4, 5])); // Output: 15
```

**Problem 8: Finding the Largest Element in an Array**
**Description:** Create a JavaScript function that finds the largest element in an array of numbers.

**Solution:**
```javascript
function findLargestElement(arr) {
  return Math.max(...arr);
}

console.log(findLargestElement([8, 3, 11, 6, 2])); // Output: 11
```

**Problem 9: Check for Palindrome**
**Description:** Write a JavaScript function that checks if a given string is a palindrome (reads the same forwards and backwards).

**Solution:**
```javascript
function isPalindrome(str) {
  const cleanedStr = str.toLowerCase().replace(/[^a-zA-Z0-9]/g, '');
  const reversedStr = cleanedStr.split('').reverse().join('');
  return cleanedStr === reversedStr;
}

console.log(isPalindrome("A man, a plan, a canal, Panama")); // Output: true
```

**Problem 10: Calculate Factorial**
**Description:** Implement a JavaScript function that calculates the factorial of a positive integer.

**Solution:**
```javascript
function calculateFactorial(n) {
  if (n === 0) {
    return 1;
  } else {
    return n * calculateFactorial(n - 1);
  }
}

console.log(calculateFactorial(5)); // Output: 120
```

**Problem 11: Reverse a String**
**Description:** Create a JavaScript function that reverses a given string.

**Solution:**
```javascript
function reverseString(str) {
  return str.split('').reverse().join('');
}

console.log(reverseString("Hello, world!")); // Output: "!dlrow ,olleH"
```

**Problem 12: Count Vowels in a String**
**Description:** Write a JavaScript function that counts the number of vowels in a given string.

**Solution:**
```javascript
function countVowels(str) {
  const vowelRegex = /[aeiouAEIOU]/g;
  const matches = str.match(vowelRegex);
  return matches ? matches.length : 0;
}

console.log(countVowels("Hello, world!")); // Output: 3
```

**Problem 13: Capitalize the First Letter of Each Word**
**Description:** Implement a JavaScript function that capitalizes the first letter of each word in a sentence.

**Solution:**
```javascript
function capitalizeWords(sentence) {
  return sentence.split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');
}

console.log(capitalizeWords("hello world")); // Output: "Hello World"
```

**Problem 14: Check for Anagrams**
**Description:** Create a JavaScript function that checks if two given strings are anagrams (contain the same characters in a different order).

**Solution:**
```javascript
function areAnagrams(str1, str2) {
  const sortedStr1 = str1.split('').sort().join('');
  const sortedStr2 = str2.split('').sort().join('');
  return sortedStr1 === sortedStr2;
}

console.log(areAnagrams("listen", "silent")); // Output: true
```

**Problem 15: Generate a Fibonacci Sequence**
**Description:** Write a JavaScript function that generates a Fibonacci sequence up to a specified number of terms.

**Solution:**
```javascript
function generateFibonacci(n) {
  const fibonacci = [0, 1];
  for (let i = 2; i < n; i++) {
    fibonacci[i] = fibonacci[i - 1] + fibonacci[i - 2];
  }
  return fibonacci;
}

console.log(generateFibonacci(10)); // Output: [0, 1, 1, 2, 3, 5, 8, 13, 21, 34]
```

**Problem 16: Calculate the Mean (Average)**
**Description:** Implement a JavaScript function that calculates the mean (average) of an array of numbers.

**Solution:**
```javascript
function

 calculateMean(numbers) {
  if (numbers.length === 0) {
    return 0;
  }
  const sum = numbers.reduce((total, num) => total + num, 0);
  return sum / numbers.length;
}

console.log(calculateMean([1, 2, 3, 4, 5])); // Output: 3
```

**Problem 17: Check for Prime Numbers**
**Description:** Write a JavaScript function that checks if a given number is prime.

**Solution:**
```javascript
function isPrime(number) {
  if (number <= 1) {
    return false;
  }
  if (number <= 3) {
    return true;
  }
  if (number % 2 === 0 || number % 3 === 0) {
    return false;
  }
  let i = 5;
  while (i * i <= number) {
    if (number % i === 0 || number % (i + 2) === 0) {
      return false;
    }
    i += 6;
  }
  return true;
}

console.log(isPrime(17)); // Output: true
```

**Problem 18: Remove Duplicates from an Array**
**Description:** Create a JavaScript function that removes duplicate elements from an array while preserving the original order.

**Solution:**
```javascript
function removeDuplicates(arr) {
  return arr.filter((value, index, self) => self.indexOf(value) === index);
}

console.log(removeDuplicates([1, 2, 2, 3, 4, 4, 5])); // Output: [1, 2, 3, 4, 5]
```

**Problem 19: Check for Even or Odd**
**Description:** Write a JavaScript function that checks if a given number is even or odd.

**Solution:**
```javascript
function isEvenOrOdd(number) {
  return number % 2 === 0 ? "Even" : "Odd";
}

console.log(isEvenOrOdd(7)); // Output: "Odd"
```

**Problem 20: Capitalize the First Letter of a String**
**Description:** Implement a JavaScript function that capitalizes the first letter of a given string.

**Solution:**
```javascript
function capitalizeFirstLetter(str) {
  return str.charAt(0).toUpperCase() + str.slice(1);
}

console.log(capitalizeFirstLetter("hello")); // Output: "Hello"
```

### JS Objects
---

**Problem 1: Create an Object**
**Description:** Write a JavaScript function that creates an object representing a person with properties like name, age, and country.

**Solution:**
```javascript
function createPerson(name, age, country) {
  return {
    name,
    age,
    country,
  };
}

const person = createPerson("John", 30, "USA");
console.log(person); // Output: { name: 'John', age: 30, country: 'USA' }
```

**Problem 2: Access Object Properties**
**Description:** Implement a JavaScript function that accesses and prints the properties of a given object.

**Solution:**
```javascript
function accessObjectProperties(obj) {
  for (let key in obj) {
    console.log(`${key}: ${obj[key]}`);
  }
}

const person = { name: "Alice", age: 25, country: "Canada" };
accessObjectProperties(person);
// Output:
// name: Alice
// age: 25
// country: Canada
```

**Problem 3: Modify Object Properties**
**Description:** Write a JavaScript program that modifies the properties of an object.

**Solution:**
```javascript
const person = { name: "Bob", age: 30, country: "UK" };

person.age = 31;
person.country = "England";

console.log(person);
// Output: { name: 'Bob', age: 31, country: 'England' }
```

**Problem 4: Add New Object Properties**
**Description:** Implement a JavaScript function that adds new properties to an existing object.

**Solution:**
```javascript
const person = { name: "Eve", age: 28 };

person.country = "France";
person.email = "eve@example.com";

console.log(person);
// Output: { name: 'Eve', age: 28, country: 'France', email: 'eve@example.com' }
```

**Problem 5: Object Methods**
**Description:** Create a JavaScript object representing a car with methods for starting and stopping the engine.

**Solution:**
```javascript
const car = {
  isEngineRunning: false,
  startEngine() {
    this.isEngineRunning = true;
    console.log("Engine started");
  },
  stopEngine() {
    this.isEngineRunning = false;
    console.log("Engine stopped");
  },
};

car.startEngine(); // Output: "Engine started"
car.stopEngine();  // Output: "Engine stopped"
```

**Problem 6: Nested Objects**
**Description:** Write a JavaScript program that represents a nested object with multiple levels of properties.

**Solution:**
```javascript
const school = {
  name: "XYZ School",
  address: {
    street: "123 Main St",
    city: "Anytown",
    zipCode: "12345",
  },
  students: {
    total: 500,
    grades: ["A", "B", "C"],
  },
};

console.log(school.address.city); // Output: "Anytown"
console.log(school.students.grades[0]); // Output: "A"
```

**Problem 7: Object Destructuring**
**Description:** Implement a JavaScript function that uses object destructuring to extract specific properties from an object.

**Solution:**
```javascript
function getUserInfo(user) {
  const { name, age, email } = user;
  return `Name: ${name}, Age: ${age}, Email: ${email}`;
}

const user = { name: "Alex", age: 35, email: "alex@example.com" };
console.log(getUserInfo(user)); // Output: "Name: Alex, Age: 35, Email: alex@example.com"
```

**Problem 8: Check if a Property Exists**
**Description:** Write a JavaScript program that checks if a property exists in an object and returns a corresponding message.

**Solution:**
```javascript
function checkPropertyExists(obj, propertyName) {
  if (obj.hasOwnProperty(propertyName)) {
    return `${propertyName} exists in the object.`;
  } else {
    return `${propertyName} does not exist in the object.`;
  }
}

const person = { name: "Grace", age: 27 };
console.log(checkPropertyExists(person, "name")); // Output: "name exists in the object."
```

**Problem 9: Object Iteration**
**Description:** Create a JavaScript function that iterates through the properties of an object and performs an action.

**Solution:**
```javascript
function iterateObjectProperties(obj) {
  for (let key in obj) {
    if (obj.hasOwnProperty(key)) {
      console.log(`${key}: ${obj[key]}`);
    }
  }
}

const car = { make: "Toyota", model: "Camry", year: 2022 };
iterateObjectProperties(car);
// Output:
// make: Toyota
// model: Camry
// year: 2022
```

**Problem 10: Copy Object Properties**
**Description:** Implement a JavaScript function that copies properties from one object to another.

**Solution:**
```javascript
function copyObjectProperties(source, target) {
  for (let key in source) {
    if (source.hasOwnProperty(key)) {
      target[key] = source[key];
    }
  }
}

const sourceObj = { name: "Sam", age: 29 };
const targetObj =

 {};
copyObjectProperties(sourceObj, targetObj);

console.log(targetObj);
// Output: { name: 'Sam', age: 29 }
```

**Problem 11: Object Serialization**
**Description:** Write a JavaScript program that serializes an object to a JSON string and then parses it back to an object.

**Solution:**
```javascript
const person = { name: "Lily", age: 24, country: "Australia" };

const jsonString = JSON.stringify(person);
console.log(jsonString);

const parsedPerson = JSON.parse(jsonString);
console.log(parsedPerson);
```

**Problem 12: Object Equality**
**Description:** Implement a JavaScript function that checks if two objects are equal (have the same properties and values).

**Solution:**
```javascript
function areObjectsEqual(obj1, obj2) {
  const keys1 = Object.keys(obj1);
  const keys2 = Object.keys(obj2);

  if (keys1.length !== keys2.length) {
    return false;
  }

  for (let key of keys1) {
    if (obj1[key] !== obj2[key]) {
      return false;
    }
  }

  return true;
}

const person1 = { name: "Mike", age: 30 };
const person2 = { name: "Mike", age: 30 };
console.log(areObjectsEqual(person1, person2)); // Output: true
```

**Problem 13: Object Freeze**
**Description:** Write a JavaScript program that demonstrates how to freeze an object to prevent further modification.

**Solution:**
```javascript
const student = { name: "Sophia", age: 22 };
Object.freeze(student);

student.age = 23; // Attempted modification
console.log(student); // Output: { name: 'Sophia', age: 22 }
```

**Problem 14: Object Sealing**
**Description:** Implement a JavaScript function that demonstrates how to seal an object, allowing property values to be changed but preventing property addition or removal.

**Solution:**
```javascript
const book = { title: "The Great Gatsby", author: "F. Scott Fitzgerald" };
Object.seal(book);

book.year = 1925; // Attempted property addition
delete book.author; // Attempted property removal

console.log(book); // Output: { title: 'The Great Gatsby', author: 'F. Scott Fitzgerald' }
```

**Problem 15: Object Property Enumeration Order**
**Description:** Create a JavaScript program that explores the enumeration order of object properties.

**Solution:**
```javascript
const student = {
  name: "Emma",
  age: 20,
  grade: "A",
};

for (let key in student) {
  console.log(key);
}
// Output: "name", "age", "grade" (enumeration order not guaranteed)
```

**Problem 16: Merge Objects**
**Description:** Implement a JavaScript function that merges properties from multiple objects into a single object.

**Solution:**
```javascript
function mergeObjects(...objects) {
  return Object.assign({}, ...objects);
}

const person = { name: "Oliver" };
const details = { age: 28, country: "Spain" };
const merged = mergeObjects(person, details);

console.log(merged);
// Output: { name: 'Oliver', age: 28, country: 'Spain' }
```

**Problem 17: Convert Object to Array**
**Description:** Write a JavaScript program that converts an object into an array of key-value pairs.

**Solution:**
```javascript
function objectToArray(obj) {
  return Object.entries(obj);
}

const student = { name: "Ava", age: 19, grade: "B" };
const studentArray = objectToArray(student);

console.log(studentArray);
// Output: [ ['name', 'Ava'], ['age', 19], ['grade', 'B'] ]
```

**Problem 18: Find Object by Property Value**
**Description:** Create a JavaScript function that searches for an object in an array of objects by a specific property value.

**Solution:**
```javascript
function findObjectByPropertyValue(objects, propertyName, value) {
  return objects.find(obj => obj[propertyName] === value);
}

const students = [
  { name: "Liam", age: 21 },
  { name: "Emma", age: 20 },
  { name: "Liam", age: 22 },
];

const result = findObjectByPropertyValue(students, "name", "Emma");
console.log(result); // Output: { name: 'Emma', age: 20 }
```

**Problem 19: Calculate Object Size**
**Description:** Write a JavaScript program that calculates the number of properties in an object.

**Solution:**
```javascript
function getObjectSize(obj) {
  return Object.keys(obj).length;
}

const car = { make: "Honda", model: "Civic", year: 2021 };
console.log(getObjectSize(car)); // Output: 3
```

**Problem 20: Deep Clone an Object**
**Description:** Implement a JavaScript function that creates a deep clone of an object, including nested objects.

**Solution:**
```javascript
function deepClone(obj) {
  return JSON.parse(JSON.stringify(obj));
}

const original = { a: 1, b: { c: 2 } };
const cloned = deepClone(original);

console.log(cloned);
// Output: { a: 1, b: { c: 2 } } (a deep copy of the original object)
```


### Events and using all of them
---


**Problem 1: Button Click Event**
**Description:** Write a JavaScript program that adds a click event listener to a button and changes the button's text when clicked.

**Solution:**
```html
<!DOCTYPE html>
<html>
<head>
  <title>Button Click Event</title>
</head>
<body>
  <button id="myButton">Click me</button>
  <script>
    const button = document.getElementById("myButton");
    button.addEventListener("click", () => {
      button.textContent = "Clicked!";
    });
  </script>
</body>
</html>
```

**Problem 2: Keyboard Event Handling**
**Description:** Create a JavaScript program that listens for keyboard events and displays the key code and key name when a key is pressed.

**Solution:**
```html
<!DOCTYPE html>
<html>
<head>
  <title>Keyboard Event Handling</title>
</head>
<body>
  <p>Press a key to see its code and name.</p>
  <script>
    document.addEventListener("keydown", (event) => {
      const key = event.key;
      const keyCode = event.keyCode;
      alert(`Key: ${key}, Key Code: ${keyCode}`);
    });
  </script>
</body>
</html>
```

**Problem 3: Mouse Hover Event**
**Description:** Write a JavaScript program that changes the background color of an element when the mouse hovers over it.

**Solution:**
```html
<!DOCTYPE html>
<html>
<head>
  <title>Mouse Hover Event</title>
</head>
<body>
  <div id="myElement" style="width: 200px; height: 200px; background-color: lightgray;"></div>
  <script>
    const element = document.getElementById("myElement");
    element.addEventListener("mouseover", () => {
      element.style.backgroundColor = "skyblue";
    });
    element.addEventListener("mouseout", () => {
      element.style.backgroundColor = "lightgray";
    });
  </script>
</body>
</html>
```

**Problem 4: Form Submission Event**
**Description:** Implement a JavaScript program that prevents a form from submitting if a required field is empty.

**Solution:**
```html
<!DOCTYPE html>
<html>
<head>
  <title>Form Submission Event</title>
</head>
<body>
  <form id="myForm">
    <input type="text" id="name" placeholder="Name" required>
    <input type="email" id="email" placeholder="Email" required>
    <button type="submit">Submit</button>
  </form>
  <script>
    const form = document.getElementById("myForm");
    form.addEventListener("submit", (event) => {
      const nameInput = document.getElementById("name");
      if (nameInput.value.trim() === "") {
        event.preventDefault();
        alert("Name is required.");
      }
    });
  </script>
</body>
</html>
```

**Problem 5: Scroll Event**
**Description:** Create a JavaScript program that displays a message when the user scrolls the page.

**Solution:**
```html
<!DOCTYPE html>
<html>
<head>
  <title>Scroll Event</title>
</head>
<body>
  <p>Scroll down to see the message.</p>
  <script>
    window.addEventListener("scroll", () => {
      alert("You scrolled the page.");
    });
  </script>
</body>
</html>
```

**Problem 6: Event Delegation**
**Description:** Write a JavaScript program that uses event delegation to handle multiple click events on a list of items.

**Solution:**
```html
<!DOCTYPE html>
<html>
<head>
  <title>Event Delegation</title>
</head>
<body>
  <ul id="myList">
    <li>Item 1</li>
    <li>Item 2</li>
    <li>Item 3</li>
  </ul>
  <script>
    const list = document.getElementById("myList");
    list.addEventListener("click", (event) => {
      if (event.target.tagName === "LI") {
        alert(`Clicked: ${event.target.textContent}`);
      }
    });
  </script>
</body>
</html>
```

**Problem 7: Custom Event Handling**
**Description:** Implement a JavaScript program that demonstrates custom event creation and handling.

**Solution:**
```html
<!DOCTYPE html>
<html>
<head>
  <title>Custom Event Handling</title>
</head>
<body>
  <button id="myButton">Click me to trigger custom event</button>
  <script>
    const button = document.getElementById("myButton");

    const customEvent = new Event("myCustomEvent");

    button.addEventListener("myCustomEvent", () => {
      alert("Custom event triggered!");
    });

    button.addEventListener("click", () => {
      button.dispatchEvent(customEvent);
    });
  </script>
</body>
</html>
```

**Problem 8: Touch Event Handling**
**Description:** Write a JavaScript program that responds to touch events on a mobile device and displays touch coordinates.

**Solution:**
```html
<!DOCTYPE html>
<html>
<head>
  <title>Touch Event Handling</title>
</head>
<body>
  <p>Touch and drag your finger on the screen.</p>
  <p id="coordinates"></p>
  <script>
    const coordinates = document.getElementById("coordinates");

    document.addEventListener("touchmove", (event) => {
      const touch = event.touches[0];
      const x = touch.clientX;
      const y = touch.clientY;
      coordinates.textContent = `X: ${x}, Y: ${y}`;
    });
  </script>
</body>
</html>
```

**Problem 9: Resize Event**
**Description:** Create a JavaScript program that detects and displays a message when the window is resized.

**Solution:**
```html
<!DOCTYPE html>
<html>
<head>
  <title>Resize Event</title>
</head>
<body>
  <p>Resize the window to see the message.</p>
  <script>
    window.addEventListener("resize", () => {
      alert("Window resized!");
    });
  </script>
</body>
</html>
```

**Problem 10: Prevent Context Menu**
**Description:** Implement a JavaScript program that prevents the right-click context menu from appearing on a webpage.

**Solution:**
```html
<!DOCTYPE html>
<html>
<head>
  <title>Prevent Context Menu</title>
</head>
<body oncontextmenu="return false;">
  <p>Right-click is disabled on this page.</p>
</body>
</html>
```

**Problem 11: Drag and Drop Event**
**Description:** Write a JavaScript program that enables drag-and-drop functionality for elements on a webpage.

**Solution:**
```html
<!DOCTYPE html>
<html>
<head>
  <title>Drag and Drop Event</title>
  <style>
    #

dragElement {
      width: 100px;
      height: 100px;
      background-color: lightblue;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div id="dragElement" draggable="true">Drag me</div>
  <script>
    const dragElement = document.getElementById("dragElement");

    dragElement.addEventListener("dragstart", (event) => {
      event.dataTransfer.setData("text/plain", "Dragged!");
    });

    dragElement.addEventListener("dragend", () => {
      alert("Element has been dragged.");
    });
  </script>
</body>
</html>
```

**Problem 12: Mouse Double-Click Event**
**Description:** Create a JavaScript program that detects double-click events on an element and performs an action.

**Solution:**
```html
<!DOCTYPE html>
<html>
<head>
  <title>Mouse Double-Click Event</title>
</head>
<body>
  <button id="myButton">Double-click me</button>
  <script>
    const button = document.getElementById("myButton");

    button.addEventListener("dblclick", () => {
      alert("Double-clicked!");
    });
  </script>
</body>
</html>
```

**Problem 13: Event Propagation (Bubbling)**
**Description:** Implement a JavaScript program that demonstrates event propagation (bubbling) with nested elements.

**Solution:**
```html
<!DOCTYPE html>
<html>
<head>
  <title>Event Propagation (Bubbling)</title>
</head>
<body>
  <div id="outer">
    Outer Div
    <div id="inner">
      Inner Div
    </div>
  </div>
  <script>
    const outerDiv = document.getElementById("outer");
    const innerDiv = document.getElementById("inner");

    outerDiv.addEventListener("click", () => {
      alert("Outer Div Clicked");
    });

    innerDiv.addEventListener("click", () => {
      alert("Inner Div Clicked");
    });
  </script>
</body>
</html>
```

**Problem 14: Event Propagation (Capturing)**
**Description:** Write a JavaScript program that demonstrates event propagation (capturing) with nested elements.

**Solution:**
```html
<!DOCTYPE html>
<html>
<head>
  <title>Event Propagation (Capturing)</title>
</head>
<body>
  <div id="outer">
    Outer Div
    <div id="inner">
      Inner Div
    </div>
  </div>
  <script>
    const outerDiv = document.getElementById("outer");
    const innerDiv = document.getElementById("inner");

    outerDiv.addEventListener("click", () => {
      alert("Outer Div Clicked");
    }, true); // Use capturing phase

    innerDiv.addEventListener("click", () => {
      alert("Inner Div Clicked");
    }, true); // Use capturing phase
  </script>
</body>
</html>
```

**Problem 15: Context Menu Event**
**Description:** Create a JavaScript program that displays a custom context menu when right-clicking an element.

**Solution:**
```html
<!DOCTYPE html>
<html>
<head>
  <title>Context Menu Event</title>
  <style>
    #contextMenu {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      border: 1px solid #ddd;
      padding: 5px;
    }
  </style>
</head>
<body>
  <div id="target" oncontextmenu="return false;">Right-click me</div>
  <div id="contextMenu">
    <p>Custom Context Menu</p>
    <ul>
      <li>Option 1</li>
      <li>Option 2</li>
      <li>Option 3</li>
    </ul>
  </div>
  <script>
    const target = document.getElementById("target");
    const contextMenu = document.getElementById("contextMenu");

    target.addEventListener("contextmenu", (event) => {
      event.preventDefault();
      const x = event.clientX;
      const y = event.clientY;
      contextMenu.style.left = `${x}px`;
      contextMenu.style.top = `${y}px`;
      contextMenu.style.display = "block";
    });

    document.addEventListener("click", () => {
      contextMenu.style.display = "none";
    });
  </script>
</body>
</html>
```

**Problem 16: Event Removal**
**Description:** Write a JavaScript program that adds and removes event listeners dynamically.

**Solution:**
```html
<!DOCTYPE html>
<html>
<head>
  <title>Event Removal</title>
</head>
<body>
  <button id="myButton">Add Event Listener</button>
  <button id="removeButton">Remove Event Listener</button>
  <script>
    const addButton = document.getElementById("myButton");
    const removeButton = document.getElementById("removeButton");

    function clickHandler() {
      alert("Button clicked!");
    }

    addButton.addEventListener("click", clickHandler);

    removeButton.addEventListener("click", () => {
      addButton.removeEventListener("click", clickHandler);
      alert("Event listener removed.");
    });
  </script>
</body>
</html>
```

**Problem 17: Form Reset Event**
**Description:** Implement a JavaScript program that detects when a form is reset and displays a confirmation message.

**Solution:**
```html
<!DOCTYPE html>
<html>
<head>
  <title>Form Reset Event</title>
</head>
<body>
  <form id="myForm">
    <input type="text" placeholder="Name" required>
    <input type="email" placeholder="Email" required>
    <button type="submit">Submit</button>
    <button type="reset">Reset</button>
  </form>
  <script>
    const form = document.getElementById("myForm");

    form.addEventListener("reset", () => {
      const confirmed = confirm("Are you sure you want to reset the form?");
      if (!confirmed) {
        event.preventDefault();
      }
    });
  </script>
</body>
</html>
```

**Problem 18: Copy and Paste Events**
**Description:** Create a JavaScript program that captures copy and paste events on an input field.

**Solution:**
```html
<!DOCTYPE html>
<html>
<head>
  <title>Copy and Paste Events</title>
</head>
<body>
  <input type="text" id="myInput" placeholder="Try copying and pasting">
  <script>
    const input = document.getElementById("myInput");

    input.addEventListener("copy", () => {
      alert("Text has been copied!");
   

 });

    input.addEventListener("paste", () => {
      alert("Text has been pasted!");
    });
  </script>
</body>
</html>
```

**Problem 19: DOMContentLoaded Event**
**Description:** Write a JavaScript program that waits for the DOM to be fully loaded before executing code.

**Solution:**
```html
<!DOCTYPE html>
<html>
<head>
  <title>DOMContentLoaded Event</title>
</head>
<body>
  <p>The DOMContentLoaded event will trigger when the DOM is ready.</p>
  <script>
    document.addEventListener("DOMContentLoaded", () => {
      alert("DOM is fully loaded!");
    });
  </script>
</body>
</html>
```

**Problem 20: Event Listener for Multiple Events**
**Description:** Implement a JavaScript program that adds a single event listener for multiple events on an element.

**Solution:**
```html
<!DOCTYPE html>
<html>
<head>
  <title>Event Listener for Multiple Events</title>
</head>
<body>
  <button id="myButton">Click me</button>
  <script>
    const button = document.getElementById("myButton");

    function eventHandler() {
      alert("Button clicked or hovered!");
    }

    button.addEventListener("click", eventHandler);
    button.addEventListener("mouseenter", eventHandler);
  </script>
</body>
</html>
```


### Stings and all methods of string
---


**Problem 1: Concatenating Strings**
**Description:** Write a JavaScript program that concatenates two strings.

**Solution:**
```javascript
const string1 = "Hello";
const string2 = "World";
const result = string1 + " " + string2;
console.log(result); // Output: "Hello World"
```

**Problem 2: String Length**
**Description:** Implement a JavaScript program that calculates the length of a string.

**Solution:**
```javascript
const str = "JavaScript";
const length = str.length;
console.log(length); // Output: 10
```

**Problem 3: Accessing Characters in a String**
**Description:** Create a JavaScript program that accesses individual characters in a string.

**Solution:**
```javascript
const str = "Hello";
console.log(str[0]); // Output: "H"
console.log(str[1]); // Output: "e"
```

**Problem 4: String Interpolation**
**Description:** Write a JavaScript program that uses string interpolation to create a dynamic string.

**Solution:**
```javascript
const name = "Alice";
const message = `Hello, ${name}!`;
console.log(message); // Output: "Hello, Alice!"
```

**Problem 5: Converting to Uppercase**
**Description:** Implement a JavaScript program that converts a string to uppercase.

**Solution:**
```javascript
const str = "javascript";
const upperStr = str.toUpperCase();
console.log(upperStr); // Output: "JAVASCRIPT"
```

**Problem 6: Converting to Lowercase**
**Description:** Create a JavaScript program that converts a string to lowercase.

**Solution:**
```javascript
const str = "JavaScript";
const lowerStr = str.toLowerCase();
console.log(lowerStr); // Output: "javascript"
```

**Problem 7: Trimming Whitespace**
**Description:** Write a JavaScript program that removes leading and trailing whitespace from a string.

**Solution:**
```javascript
const str = "   Hello, World!   ";
const trimmedStr = str.trim();
console.log(trimmedStr); // Output: "Hello, World!"
```

**Problem 8: Checking for Substring**
**Description:** Implement a JavaScript program that checks if a string contains a specific substring.

**Solution:**
```javascript
const sentence = "The quick brown fox";
const substring = "fox";
const containsSubstring = sentence.includes(substring);
console.log(containsSubstring); // Output: true
```

**Problem 9: Finding Substring Index**
**Description:** Create a JavaScript program that finds the index of the first occurrence of a substring in a string.

**Solution:**
```javascript
const sentence = "The quick brown fox";
const substring = "brown";
const index = sentence.indexOf(substring);
console.log(index); // Output: 10
```

**Problem 10: Replacing Substring**
**Description:** Write a JavaScript program that replaces a specific substring with another string.

**Solution:**
```javascript
const sentence = "The quick brown fox";
const oldSubstring = "brown";
const newSubstring = "red";
const replacedSentence = sentence.replace(oldSubstring, newSubstring);
console.log(replacedSentence); // Output: "The quick red fox"
```

**Problem 11: Splitting a String**
**Description:** Implement a JavaScript program that splits a string into an array based on a delimiter.

**Solution:**
```javascript
const sentence = "Hello,World";
const words = sentence.split(",");
console.log(words); // Output: ["Hello", "World"]
```

**Problem 12: Joining Array Elements to Form a String**
**Description:** Create a JavaScript program that joins array elements to form a single string.

**Solution:**
```javascript
const words = ["Hello", "World"];
const sentence = words.join(" ");
console.log(sentence); // Output: "Hello World"
```

**Problem 13: Checking if a String Starts With**
**Description:** Write a JavaScript program that checks if a string starts with a specific prefix.

**Solution:**
```javascript
const sentence = "Hello, World!";
const prefix = "Hello";
const startsWithPrefix = sentence.startsWith(prefix);
console.log(startsWithPrefix); // Output: true
```

**Problem 14: Checking if a String Ends With**
**Description:** Implement a JavaScript program that checks if a string ends with a specific suffix.

**Solution:**
```javascript
const sentence = "Hello, World!";
const suffix = "World!";
const endsWithSuffix = sentence.endsWith(suffix);
console.log(endsWithSuffix); // Output: true
```

**Problem 15: Checking if a String Contains Only Digits**
**Description:** Create a JavaScript program that checks if a string contains only numeric digits.

**Solution:**
```javascript
function containsOnlyDigits(str) {
  return /^\d+$/.test(str);
}

console.log(containsOnlyDigits("12345")); // Output: true
console.log(containsOnlyDigits("123abc")); // Output: false
```

**Problem 16: Checking if a String Contains Alphabetic Characters**
**Description:** Write a JavaScript program that checks if a string contains only alphabetic characters.

**Solution:**
```

javascript
function containsOnlyAlphabets(str) {
  return /^[A-Za-z]+$/.test(str);
}

console.log(containsOnlyAlphabets("Hello")); // Output: true
console.log(containsOnlyAlphabets("Hello123")); // Output: false
```

**Problem 17: Checking if a String Contains Special Characters**
**Description:** Implement a JavaScript program that checks if a string contains special characters (non-alphanumeric).

**Solution:**
```javascript
function containsSpecialCharacters(str) {
  return /[^A-Za-z0-9]/.test(str);
}

console.log(containsSpecialCharacters("Hello!")); // Output: true
console.log(containsSpecialCharacters("Hello123")); // Output: false
```

**Problem 18: Reversing a String**
**Description:** Write a JavaScript program that reverses a string.

**Solution:**
```javascript
function reverseString(str) {
  return str.split("").reverse().join("");
}

console.log(reverseString("JavaScript")); // Output: "tpircSavaJ"
```

**Problem 19: Checking for Palindrome**
**Description:** Create a JavaScript program that checks if a string is a palindrome (reads the same forwards and backwards).

**Solution:**
```javascript
function isPalindrome(str) {
  const cleanStr = str.toLowerCase().replace(/[^A-Za-z]/g, "");
  const reversedStr = cleanStr.split("").reverse().join("");
  return cleanStr === reversedStr;
}

console.log(isPalindrome("racecar")); // Output: true
console.log(isPalindrome("hello")); // Output: false
```

**Problem 20: Counting Occurrences of a Character**
**Description:** Implement a JavaScript program that counts the number of times a specific character appears in a string.

**Solution:**
```javascript
function countOccurrences(str, char) {
  const regex = new RegExp(char, "g");
  const matches = str.match(regex);
  return matches ? matches.length : 0;
}

console.log(countOccurrences("banana", "a")); // Output: 3
```

**Problem 21: Extracting Substring**
**Description:** Write a JavaScript program that extracts a substring from a string.

**Solution:**
```javascript
const str = "JavaScript";
const substring = str.substring(4, 7);
console.log(substring); // Output: "Scr"
```

**Problem 22: Extracting Substring with Slice**
**Description:** Create a JavaScript program that extracts a substring from a string using the `slice` method.

**Solution:**
```javascript
const str = "JavaScript";
const substring = str.slice(4, 7);
console.log(substring); // Output: "Scr"
```

**Problem 23: Checking if a String Contains Another String**
**Description:** Implement a JavaScript program that checks if a string contains another string.

**Solution:**
```javascript
const sentence = "The quick brown fox";
const subString = "brown";
const containsSubString = sentence.includes(subString);
console.log(containsSubString); // Output: true
```

**Problem 24: Removing a Specific Character**
**Description:** Write a JavaScript program that removes a specific character from a string.

**Solution:**
```javascript
function removeCharacter(str, char) {
  return str.split(char).join("");
}

console.log(removeCharacter("Hello, World!", ",")); // Output: "Hello World!"
```

**Problem 25: Capitalizing the First Letter of Each Word**
**Description:** Create a JavaScript program that capitalizes the first letter of each word in a sentence.

**Solution:**
```javascript
function capitalizeWords(sentence) {
  return sentence.split(" ").map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(" ");
}

console.log(capitalizeWords("hello world")); // Output: "Hello World"
```

**Problem 26: Removing Duplicate Characters**
**Description:** Implement a JavaScript program that removes duplicate characters from a string.

**Solution:**
```javascript
function removeDuplicates(str) {
  return [...new Set(str)].join("");
}

console.log(removeDuplicates("programming")); // Output: "progamin"
```

**Problem 27: Checking if a String is Empty**
**Description:** Write a JavaScript program that checks if a string is empty.

**Solution:**
```javascript
function isEmpty(str) {
  return str.trim() === "";
}

console.log(isEmpty("")); // Output: true
console.log(isEmpty("Hello")); // Output: false
```

**Problem 28: Extracting URL Parameters**
**Description:** Create a JavaScript program that extracts and parses parameters from a URL string.

**Solution:**
```javascript
function extractURLParameters(url) {
  const searchParams = new URL(url).searchParams;
  const params = {};
  for (const [key, value] of searchParams.entries()) {
    params[key] = value;
  }
  return params;
}

const url = "https://example.com?name=John&age=30";
console.log(extractURLParameters(url));
// Output: { name: "John", age: "30" }
```

**Problem 29: Replacing Multiple Spaces with Single Space**
**Description:** Implement a JavaScript program that replaces multiple consecutive spaces with a single space.

**Solution:**
```javascript
function replaceMultipleSpaces(str) {
  return str.replace(/\s+/g, " ");
}

console.log(replaceMultipleSpaces("Hello    World")); // Output: "Hello World"
```

**Problem 30: Capitalizing the First Letter of a String**
**Description:** Write a JavaScript program that capitalizes the first letter of a string.

**Solution:**
```javascript
function capitalizeFirstLetter(str) {
  return str.charAt(0).toUpperCase() + str.slice(1);
}

console.log(capitalizeFirstLetter("javascript")); // Output: "Javascript"
```

**Problem 31: Checking if a String Contains Numbers**
**Description:** Create a JavaScript program that checks if a string contains numeric digits.

**Solution:**
```javascript
function containsNumbers(str) {
  return /\d/.test(str);
}

console.log(containsNumbers("Hello123")); // Output: true
console.log(containsNumbers("Hello")); // Output: false
```

**Problem 32: Counting Words in a Sentence**
**Description:** Implement a JavaScript program that counts the number of words in a sentence.

**Solution:**
```javascript
function countWords(sentence) {
  return sentence.split(" ").length;
}

console.log(countWords("This is a sample sentence.")); // Output: 5
```

**Problem 33: Counting Vowels and Consonants**
**Description:** Write a JavaScript program that counts the number of vowels and consonants in a string.

**Solution:**
```javascript
function countVowelsAndConsonants(str) {
  const vowels = str.match(/[aeiouAEIOU]/g) || [];
  const consonants = str.match(/[^aeiouAEIOU\s]/g) || [];
  return { vowels: vowels.length, consonants: consonants.length };
}

const text = "Hello, World!";
console.log(countVowelsAndConsonants(text));
// Output: { vowels: 3, consonants: 8 }
```

**Problem 34: Checking if a String is Alphanumeric**
**Description:** Create a JavaScript program that checks if

 a string is alphanumeric (contains only letters and digits).

**Solution:**
```javascript
function isAlphanumeric(str) {
  return /^[A-Za-z0-9]+$/.test(str);
}

console.log(isAlphanumeric("Hello123")); // Output: true
console.log(isAlphanumeric("Hello!")); // Output: false
```

**Problem 35: Checking if a String is a Valid Email Address**
**Description:** Implement a JavaScript program that checks if a string is a valid email address.

**Solution:**
```javascript
function isValidEmail(email) {
  const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return regex.test(email);
}

console.log(isValidEmail("test@example.com")); // Output: true
console.log(isValidEmail("invalid-email")); // Output: false
```

**Problem 36: Removing HTML Tags**
**Description:** Write a JavaScript program that removes HTML tags from a string.

**Solution:**
```javascript
function removeHtmlTags(html) {
  return html.replace(/<[^>]*>/g, "");
}

const htmlContent = "<p>This is <b>bold</b> text.</p>";
console.log(removeHtmlTags(htmlContent)); // Output: "This is bold text."
```

**Problem 37: Generating a Random String**
**Description:** Create a JavaScript program that generates a random string of a specified length.

**Solution:**
```javascript
function generateRandomString(length) {
  const charset = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
  let randomString = "";
  for (let i = 0; i < length; i++) {
    const randomIndex = Math.floor(Math.random() * charset.length);
    randomString += charset.charAt(randomIndex);
  }
  return randomString;
}

console.log(generateRandomString(8)); // Output: "Dp3gY9qA"
```

**Problem 38: Checking if a String Contains a URL**
**Description:** Implement a JavaScript program that checks if a string contains a URL.

**Solution:**
```javascript
function containsURL(str) {
  const regex = /(http(s)?:\/\/[^\s]+)/g;
  return regex.test(str);
}

console.log(containsURL("Visit my website at https://example.com")); // Output: true
console.log(containsURL("No URL here.")); // Output: false
```

**Problem 39: Capitalizing Acronyms**
**Description:** Write a JavaScript program that capitalizes acronyms within a string.

**Solution:**
```javascript
function capitalizeAcronyms(str) {
  return str.replace(/\b([A-Z]+)\b/g, match => match.toUpperCase());
}

console.log(capitalizeAcronyms("abc HTML xyz CSS")); // Output: "abc HTML xyz CSS"
console.log(capitalizeAcronyms("ABC HTML XYZ CSS")); // Output: "ABC HTML XYZ CSS"
```

**Problem 40: Checking if a String Contains Only Whitespace**
**Description:** Create a JavaScript program that checks if a string contains only whitespace characters.

**Solution:**
```javascript
function containsOnlyWhitespace(str) {
  return /^\s*$/.test(str);
}

console.log(containsOnlyWhitespace("   ")); // Output: true
console.log(containsOnlyWhitespace("   Hello   ")); // Output: false
```

**Problem 41: Counting Sentence Punctuation**
**Description:** Implement a JavaScript program that counts the number of punctuation marks in a sentence.

**Solution:**
```javascript
function countPunctuationMarks(sentence) {
  const punctuationMarks = sentence.match(/[.,;:!?]/g) || [];
  return punctuationMarks.length;
}

const text = "Hello, World! This is a test.";
console.log(countPunctuationMarks(text)); // Output: 4
```

**Problem 42: Reversing Words in a Sentence**
**Description:** Write a JavaScript program that reverses the order of words in a sentence.

**Solution:**
```javascript
function reverseWords(sentence) {
  return sentence.split(" ").reverse().join(" ");
}

console.log(reverseWords("Hello World")); // Output: "World Hello"
```

**Problem 43: Checking for Anagrams**
**Description:** Create a JavaScript program that checks if two strings are anagrams of each other.

**Solution:**
```javascript
function areAnagrams(str1, str2) {
  const normalize = (str) => str.replace(/[^\w]/g, "").toLowerCase();
  return normalize(str1) === normalize(str2);
}

console.log(areAnagrams("listen", "silent")); // Output: true
console.log(areAnagrams("hello", "world")); // Output: false
```

**Problem 44: Reversing Words and Characters in a Sentence**
**Description:** Implement a JavaScript program that reverses the order of words in a sentence and also reverses the characters within each word.

**Solution:**
```javascript
function reverseWordsAndCharacters(sentence) {
  const words = sentence.split(" ");
  const reversedWords = words.map(word => word.split("").reverse().join(""));
  return reversedWords.reverse().join(" ");
}

console.log(reverseWordsAndCharacters("Hello World")); // Output: "olleH dlroW"
```

**Problem 45: Removing Duplicates from a Sorted String**
**Description:** Write a JavaScript program that removes duplicates from a sorted string.

**Solution:**
```javascript
function removeDuplicatesFromSorted(str) {
  return str.replace(/(.)\1+/g, "$1");
}

console.log(removeDuplicatesFromSorted("aabbcccdd")); // Output: "abcd"
```

**Problem 46: Counting Words in a CamelCase String**
**Description:** Create a JavaScript program that counts the number of words in a CamelCase string.

**Solution:**
```javascript
function countCamelCaseWords(str) {
  const words = str.split(/(?=[A-Z])/);
  return words.length;
}

console.log(countCamelCaseWords("helloWorld")); // Output: 2
```

**Problem 47: Checking if a String Contains Balanced Parentheses**
**Description:** Implement a JavaScript program that checks if a string contains balanced parentheses.

**Solution:**
```javascript
function hasBalancedParentheses(str) {
  const stack = [];
  for (const char of str) {
    if (char === "(") {
      stack.push(char);
    } else if (char === ")") {
      if (stack.pop() !== "(") {
        return false;
      }
    }


  }
  return stack.length === 0;
}

console.log(hasBalancedParentheses("((a + b) * (c - d))")); // Output: true
console.log(hasBalancedParentheses(")(a + b) * (c - d)(")); // Output: false
```

**Problem 48: Checking if a String Contains Only Unique Characters**
**Description:** Write a JavaScript program that checks if a string contains only unique characters.

**Solution:**
```javascript
function hasUniqueCharacters(str) {
  const charSet = new Set();
  for (const char of str) {
    if (charSet.has(char)) {
      return false;
    }
    charSet.add(char);
  }
  return true;
}

console.log(hasUniqueCharacters("abcdefg")); // Output: true
console.log(hasUniqueCharacters("hello")); // Output: false
```

**Problem 49: Capitalizing Every Word in a Sentence**
**Description:** Create a JavaScript program that capitalizes the first letter of every word in a sentence.

**Solution:**
```javascript
function capitalizeEveryWord(sentence) {
  return sentence.replace(/\b\w/g, match => match.toUpperCase());
}

console.log(capitalizeEveryWord("hello world")); // Output: "Hello World"
```

**Problem 50: Converting a String to Title Case**
**Description:** Implement a JavaScript program that converts a string to title case (capitalizes the first letter of each word while converting the rest to lowercase).

**Solution:**
```javascript
function toTitleCase(str) {
  return str.toLowerCase().split(" ").map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(" ");
}

console.log(toTitleCase("hello world")); // Output: "Hello World"
```

**Problem 51: Removing Whitespace from a String**
**Description:** Write a JavaScript program that removes all whitespace characters (spaces, tabs, and line breaks) from a string.

**Solution:**
```javascript
function removeWhitespace(str) {
  return str.replace(/\s/g, "");
}

console.log(removeWhitespace("  Hello \t World \n")); // Output: "HelloWorld"
```

**Problem 52: Checking if a String Contains Only Letters**
**Description:** Implement a JavaScript program that checks if a string contains only alphabetical letters.

**Solution:**
```javascript
function containsOnlyLetters(str) {
  return /^[A-Za-z]+$/.test(str);
}

console.log(containsOnlyLetters("Hello")); // Output: true
console.log(containsOnlyLetters("Hello123")); // Output: false
```

**Problem 53: Swapping Cases in a String**
**Description:** Create a JavaScript program that swaps the cases (lowercase to uppercase and vice versa) of all letters in a string.

**Solution:**
```javascript
function swapCases(str) {
  return str.replace(/[a-zA-Z]/g, (match) =>
    match === match.toLowerCase() ? match.toUpperCase() : match.toLowerCase()
  );
}

console.log(swapCases("Hello World")); // Output: "hELLO wORLD"
```

**Problem 54: Checking for Substring Count**
**Description:** Write a JavaScript program that counts the number of occurrences of a specific substring within a string.

**Solution:**
```javascript
function countSubstringOccurrences(str, substring) {
  const regex = new RegExp(substring, "g");
  const matches = str.match(regex);
  return matches ? matches.length : 0;
}

console.log(countSubstringOccurrences("hello hello world", "hello")); // Output: 2
```

**Problem 55: Checking for Valid Phone Numbers**
**Description:** Implement a JavaScript program that checks if a given string represents a valid phone number in a specific format (e.g., (123) 456-7890).

**Solution:**
```javascript
function isValidPhoneNumber(str) {
  const regex = /^\(\d{3}\) \d{3}-\d{4}$/;
  return regex.test(str);
}

console.log(isValidPhoneNumber("(123) 456-7890")); // Output: true
console.log(isValidPhoneNumber("123-456-7890")); // Output: false
```

**Problem 56: Capitalizing the First Letter of Each Sentence**
**Description:** Create a JavaScript program that capitalizes the first letter of each sentence in a paragraph.

**Solution:**
```javascript
function capitalizeSentences(paragraph) {
  return paragraph.replace(/([.!?]\s*)([a-z])/g, (match) => match.toUpperCase());
}

console.log(capitalizeSentences("hello. world! how are you?")); // Output: "Hello. World! How are you?"
```

**Problem 57: Checking for Valid URLs**
**Description:** Write a JavaScript program that checks if a given string represents a valid URL.

**Solution:**
```javascript
function isValidURL(str) {
  const regex = /^(https?|ftp):\/\/[^\s/$.?#].[^\s]*$/;
  return regex.test(str);
}

console.log(isValidURL("https://example.com")); // Output: true
console.log(isValidURL("example.com")); // Output: false
```

**Problem 58: Counting Words with Specific Length**
**Description:** Implement a JavaScript program that counts the number of words in a sentence with a specific length.

**Solution:**
```javascript
function countWordsWithLength(sentence, length) {
  const words = sentence.split(" ");
  return words.filter((word) => word.length === length).length;
}

console.log(countWordsWithLength("This is a sample sentence", 4)); // Output: 1
```

**Problem 59: Extracting File Extension**
**Description:** Create a JavaScript program that extracts the file extension from a file path.

**Solution:**
```javascript
function getFileExtension(filePath) {
  return filePath.split(".").pop();
}

console.log(getFileExtension("document.pdf")); // Output: "pdf"
```

**Problem 60: Truncating Text**
**Description:** Write a JavaScript program that truncates a long text to a specified maximum length and adds "..." at the end.

**Solution:**
```javascript
function truncateText(text, maxLength) {
  return text.length > maxLength ? text.slice(0, maxLength) + "..." : text;
}

console.log(truncateText("This is a long sentence.", 10)); // Output: "This is a..."
```

**Problem 61: Extracting All Email Addresses**
**Description:** Implement a JavaScript program that extracts all email addresses from a given text.

**Solution:**
```javascript
function extractEmailAddresses(text) {
  const regex = /[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/g;
  return text.match(regex) || [];
}

const textWithEmails = "Contact support@example.com for assistance. Send inquiries to info@example.org.";
console.log(extractEmailAddresses(textWithEmails));
// Output: ["support@example.com", "info@example.org"]
```

**Problem 62: Removing Non-Alphanumeric Characters**
**Description:** Write a JavaScript program that removes all non-alphanumeric characters from a string.

**Solution:**
```javascript
function removeNonAlphanumeric(str) {
  return str.replace(/[^A-Za-z0-9]/g, "");
}

console.log(removeNonAlphanumeric("Hello, $123!")); // Output: "Hello123"
```

**Problem 63: Checking for Valid IPv4 Addresses**
**Description:** Create a JavaScript program that checks if a given string represents a valid IPv4 address.

**Solution:**
```javascript
function isValidIPv4Address(str) {
  const regex = /^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/;
  return regex.test(str);
}

console.log(isValidIPv4Address("192.168.0.1")); // Output: true
console.log(isValidIPv4Address("256.0.0.1")); // Output: false
```

**Problem 64: Reversing Words in a CamelCase String**
**Description:** Implement a JavaScript program that reverses the order of words in a CamelCase string.

**Solution:**
```javascript
function reverseCamelCaseWords(str) {
  const words = str.split(/(?=[A-Z])/);
  return words.reverse().join("");
}

console.log(reverseCamelCaseWords("helloWorld")); // Output: "Worldhello"
```

**Problem 65: Converting Markdown Headings to HTML

**
**Description:** Write a JavaScript program that converts Markdown headings (e.g., "# Heading") to HTML headings (e.g., "<h1>Heading</h1>") in a text.

**Solution:**
```javascript
function convertMarkdownToHTML(text) {
  return text.replace(/# (.+?)\n/g, "<h1>$1</h1>");
}

const markdownText = "# Hello\n## World";
console.log(convertMarkdownToHTML(markdownText));
// Output: "<h1>Hello</h1><h2>World</h2>"
```

**Problem 66: Removing URLs from Text**
**Description:** Create a JavaScript program that removes all URLs from a given text.

**Solution:**
```javascript
function removeURLs(text) {
  return text.replace(/(https?|ftp):\/\/[^\s/$.?#].[^\s]*/g, "");
}

const textWithUrls = "Visit my website at https://example.com. More info: https://example.org.";
console.log(removeURLs(textWithUrls)); // Output: "Visit my website at . More info: ."
```

**Problem 67: Checking for Valid ISBNs**
**Description:** Implement a JavaScript program that checks if a given string represents a valid ISBN-10 (International Standard Book Number) or ISBN-13.

**Solution:**
```javascript
function isValidISBN(str) {
  const cleanStr = str.replace(/[- ]/g, "");
  if (cleanStr.length !== 10 && cleanStr.length !== 13) {
    return false;
  }

  if (cleanStr.length === 10) {
    const sum = cleanStr
      .split("")
      .map((char, index) => (char === "X" ? 10 : parseInt(char, 10)) * (10 - index))
      .reduce((acc, value) => acc + value, 0);
    return sum % 11 === 0;
  } else {
    const weights = [1, 3, 1, 3, 1, 3, 1, 3, 1, 3, 1, 3, 1];
    const sum = cleanStr
      .split("")
      .map((char, index) => parseInt(char, 10) * weights[index])
      .reduce((acc, value) => acc + value, 0);
    return sum % 10 === 0;
  }
}

console.log(isValidISBN("0-306-40615-2")); // Output: true
console.log(isValidISBN("978-0-306-40615-7")); // Output: true
```

**Problem 68: Finding Longest Palindromic Substring**
**Description:** Write a JavaScript program that finds the longest palindromic substring in a given string.

**Solution:**
```javascript
function longestPalindromicSubstring(str) {
  let longest = "";
  for (let i = 0; i < str.length; i++) {
    for (let j = i + 1; j <= str.length; j++) {
      const substring = str.slice(i, j);
      if (isPalindrome(substring) && substring.length > longest.length) {
        longest = substring;
      }
    }
  }
  return longest;
}

function isPalindrome(str) {
  return str === str.split("").reverse().join("");
}

console.log(longestPalindromicSubstring("babad")); // Output: "bab" or "aba"
```

**Problem 69: Generating an Abbreviation**
**Description:** Create a JavaScript program that generates an abbreviation from a given phrase by using the initial letters of each word.

**Solution:**
```javascript
function generateAbbreviation(phrase) {
  return phrase
    .split(" ")
    .map((word) => word[0].toUpperCase())
    .join("");
}

console.log(generateAbbreviation("World Health Organization")); // Output: "WHO"
```

**Problem 70: Checking for Balanced Brackets**
**Description:** Implement a JavaScript program that checks if a string contains balanced brackets (e.g., "({})" is balanced, but "({)" is not).

**Solution:**
```javascript
function hasBalancedBrackets(str) {
  const stack = [];
  const bracketPairs = {
    "(": ")",
    "{": "}",
    "[": "]",
  };

  for (const char of str) {
    if (bracketPairs[char]) {
      stack.push(char);
    } else if (Object.values(bracketPairs).includes(char)) {
      if (char !== bracketPairs[stack.pop()]) {
        return false;
      }
    }
  }

  return stack.length === 0;
}

console.log(hasBalancedBrackets("({})")); // Output: true
console.log(hasBalancedBrackets("({)")); // Output: false
```


### String search & string templates
---


**Problem 71: Searching for a Substring**
**Description:** Write a JavaScript function that searches for a substring within a given string and returns its starting index. If the substring is not found, return -1.

**Solution:**
```javascript
function searchString(text, target) {
  return text.indexOf(target);
}

console.log(searchString("Hello, world!", "world")); // Output: 7
console.log(searchString("JavaScript is fun", "Python")); // Output: -1
```

**Problem 72: Case-Insensitive Substring Search**
**Description:** Create a JavaScript function that performs a case-insensitive search for a substring within a given string and returns its starting index. If the substring is not found, return -1.

**Solution:**
```javascript
function caseInsensitiveSearch(text, target) {
  const lowerText = text.toLowerCase();
  const lowerTarget = target.toLowerCase();
  return lowerText.indexOf(lowerTarget);
}

console.log(caseInsensitiveSearch("Hello, world!", "WORLD")); // Output: 7
console.log(caseInsensitiveSearch("JavaScript is fun", "python")); // Output: -1
```

**Problem 73: Checking for Substring Existence**
**Description:** Implement a JavaScript function that checks if a substring exists within a given string and returns a boolean value.

**Solution:**
```javascript
function doesSubstringExist(text, target) {
  return text.includes(target);
}

console.log(doesSubstringExist("Hello, world!", "world")); // Output: true
console.log(doesSubstringExist("JavaScript is fun", "Python")); // Output: false
```

**Problem 74: Replacing Substrings**
**Description:** Write a JavaScript function that replaces all occurrences of a substring with another substring in a given string.

**Solution:**
```javascript
function replaceSubstring(text, target, replacement) {
  return text.replace(new RegExp(target, "g"), replacement);
}

console.log(replaceSubstring("Hello, world!", "world", "universe")); // Output: "Hello, universe!"
console.log(replaceSubstring("JavaScript is fun, fun, fun!", "fun", "exciting")); // Output: "JavaScript is exciting, exciting, exciting!"
```

**Problem 75: String Interpolation**
**Description:** Create a JavaScript function that performs string interpolation by replacing placeholders in a template string with values from an object.

**Solution:**
```javascript
function interpolateString(template, data) {
  return template.replace(/\${(.*?)}/g, (match, key) => data[key.trim()]);
}

const template = "Hello, ${name}! You are ${age} years old.";
const data = { name: "Alice", age: 30 };
console.log(interpolateString(template, data)); // Output: "Hello, Alice! You are 30 years old."
```

**Problem 76: Generating a URL from Template**
**Description:** Write a JavaScript function that generates a URL from a template string by replacing route parameters with values.

**Solution:**
```javascript
function generateURL(template, params) {
  return template.replace(/:(\w+)/g, (match, param) => params[param]);
}

const routeTemplate = "/users/:id/profile";
const routeParams = { id: 123 };
console.log(generateURL(routeTemplate, routeParams)); // Output: "/users/123/profile"
```

**Problem 77: Reversing a String**
**Description:** Implement a JavaScript function that reverses a given string.

**Solution:**
```javascript
function reverseString(str) {
  return str.split("").reverse().join("");
}

console.log(reverseString("Hello, world!")); // Output: "!dlrow ,olleH"
```

**Problem 78: Truncating a String**
**Description:** Create a JavaScript function that truncates a string to a specified maximum length and appends "..." if the string exceeds the limit.

**Solution:**
```javascript
function truncateString(str, maxLength) {
  if (str.length > maxLength) {
    return str.slice(0, maxLength) + "...";
  }
  return str;
}

console.log(truncateString("This is a long sentence.", 10)); // Output: "This is a..."
```

**Problem 79: Capitalizing Words in a Sentence**
**Description:** Write a JavaScript function that capitalizes the first letter of each word in a sentence.

**Solution:**
```javascript
function capitalizeWords(sentence) {
  return sentence.split(" ").map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(" ");
}

console.log(capitalizeWords("hello world")); // Output: "Hello World"
```

**Problem 80: Checking for Prefix**
**Description:** Implement a JavaScript function that checks if a given string starts with a specified prefix.

**Solution:**
```javascript
function startsWithPrefix(str, prefix) {
  return str.startsWith(prefix);
}

console.log(startsWithPrefix("Hello, world!", "Hello")); // Output: true
console.log(startsWithPrefix("JavaScript is fun", "Python")); // Output: false
```


### JS Number : all types of numbers, BigInt, methods, and properties
---

**Problem 81: Checking if a Number is Even**
**Description:** Write a JavaScript function that checks if a given number is even and returns true if it is, or false if it's not.

**Solution:**
```javascript
function isEven(number) {
  return number % 2 === 0;
}

console.log(isEven(4)); // Output: true
console.log(isEven(7)); // Output: false
```

**Problem 82: Checking if a Number is Prime**
**Description:** Create a JavaScript function that checks if a given number is a prime number and returns true if it is, or false if it's not.

**Solution:**
```javascript
function isPrime(number) {
  if (number <= 1) return false;
  if (number <= 3) return true;

  if (number % 2 === 0 || number % 3 === 0) return false;

  let i = 5;
  while (i * i <= number) {
    if (number % i === 0 || number % (i + 2) === 0) return false;
    i += 6;
  }

  return true;
}

console.log(isPrime(17)); // Output: true
console.log(isPrime(24)); // Output: false
```

**Problem 83: Generating a Random Integer**
**Description:** Write a JavaScript function that generates a random integer within a specified range.

**Solution:**
```javascript
function randomInteger(min, max) {
  return Math.floor(Math.random() * (max - min + 1) + min);
}

console.log(randomInteger(1, 100)); // Output: Random integer between 1 and 100
```

**Problem 84: Rounding a Number to N Decimal Places**
**Description:** Create a JavaScript function that rounds a number to a specified number of decimal places.

**Solution:**
```javascript
function roundToDecimalPlaces(number, decimalPlaces) {
  return Number(number.toFixed(decimalPlaces));
}

console.log(roundToDecimalPlaces(3.14159, 2)); // Output: 3.14
```

**Problem 85: Finding the Maximum Number**
**Description:** Write a JavaScript function that finds and returns the maximum number from an array of numbers.

**Solution:**
```javascript
function findMaxNumber(numbers) {
  return Math.max(...numbers);
}

console.log(findMaxNumber([5, 2, 9, 1, 5])); // Output: 9
```

**Problem 86: Finding the Minimum Number**
**Description:** Implement a JavaScript function that finds and returns the minimum number from an array of numbers.

**Solution:**
```javascript
function findMinNumber(numbers) {
  return Math.min(...numbers);
}

console.log(findMinNumber([5, 2, 9, 1, 5])); // Output: 1
```

**Problem 87: Calculating the Sum of Numbers**
**Description:** Create a JavaScript function that calculates and returns the sum of all numbers in an array.

**Solution:**
```javascript
function calculateSum(numbers) {
  return numbers.reduce((total, number) => total + number, 0);
}

console.log(calculateSum([1, 2, 3, 4, 5])); // Output: 15
```

**Problem 88: Calculating the Average of Numbers**
**Description:** Write a JavaScript function that calculates and returns the average of numbers in an array.

**Solution:**
```javascript
function calculateAverage(numbers) {
  if (numbers.length === 0) return NaN;
  return calculateSum(numbers) / numbers.length;
}

console.log(calculateAverage([1, 2, 3, 4, 5])); // Output: 3
```

**Problem 89: Calculating Factorial**
**Description:** Implement a JavaScript function that calculates and returns the factorial of a given non-negative integer.

**Solution:**
```javascript
function calculateFactorial(number) {
  if (number === 0 || number === 1) return 1;
  let factorial = 1;
  for (let i = 2; i <= number; i++) {
    factorial *= i;
  }
  return factorial;
}

console.log(calculateFactorial(5)); // Output: 120
```

**Problem 90: Checking if a Number is a Perfect Square**
**Description:** Create a JavaScript function that checks if a given number is a perfect square (e.g., 4, 9, 16) and returns true if it is, or false if it's not.

**Solution:**
```javascript
function isPerfectSquare(number) {
  const squareRoot = Math.sqrt(number);
  return Number.isInteger(squareRoot);
}

console.log(isPerfectSquare(16)); // Output: true
console.log(isPerfectSquare(25)); // Output: true
console.log(isPerfectSquare(14)); // Output: false
```

**Problem 91: Generating a Random BigInt**
**Description:** Write a JavaScript function that generates a random BigInt within a specified range.

**Solution:**
```javascript
function randomBigInt(min, max) {
  const

 range = max - min + 1n;
  return min + BigInt(Math.floor(Math.random() * Number(range)));
}

console.log(randomBigInt(1n, 100n)); // Output: Random BigInt between 1 and 100
```

**Problem 92: Checking for NaN**
**Description:** Implement a JavaScript function that checks if a value is NaN (Not-a-Number) and returns true if it is, or false if it's not.

**Solution:**
```javascript
function isNaN(value) {
  return Number.isNaN(value);
}

console.log(isNaN(NaN)); // Output: true
console.log(isNaN(42)); // Output: false
```

**Problem 93: Checking if a Number is an Integer**
**Description:** Create a JavaScript function that checks if a given value is an integer and returns true if it is, or false if it's not.

**Solution:**
```javascript
function isInteger(value) {
  return Number.isInteger(value);
}

console.log(isInteger(42)); // Output: true
console.log(isInteger(3.14)); // Output: false
```

**Problem 94: Generating a Random Float**
**Description:** Write a JavaScript function that generates a random float (decimal number) within a specified range.

**Solution:**
```javascript
function randomFloat(min, max) {
  return Math.random() * (max - min) + min;
}

console.log(randomFloat(1.0, 5.0)); // Output: Random float between 1.0 and 5.0
```

**Problem 95: Checking for Finite Numbers**
**Description:** Implement a JavaScript function that checks if a given number is finite and returns true if it is, or false if it's not (e.g., excluding Infinity and NaN).

**Solution:**
```javascript
function isFiniteNumber(value) {
  return Number.isFinite(value);
}

console.log(isFiniteNumber(42)); // Output: true
console.log(isFiniteNumber(Infinity)); // Output: false
```

**Problem 96: Converting String to Integer**
**Description:** Create a JavaScript function that converts a numeric string to an integer.

**Solution:**
```javascript
function stringToInteger(str) {
  return parseInt(str, 10);
}

console.log(stringToInteger("42")); // Output: 42
```

**Problem 97: Converting String to Float**
**Description:** Write a JavaScript function that converts a string to a floating-point number.

**Solution:**
```javascript
function stringToFloat(str) {
  return parseFloat(str);
}

console.log(stringToFloat("3.14")); // Output: 3.14
```

**Problem 98: Getting the Absolute Value**
**Description:** Implement a JavaScript function that returns the absolute value of a number.

**Solution:**
```javascript
function absoluteValue(number) {
  return Math.abs(number);
}

console.log(absoluteValue(-5)); // Output: 5
```

**Problem 99: Rounding to the Nearest Integer**
**Description:** Create a JavaScript function that rounds a number to the nearest integer.

**Solution:**
```javascript
function roundToNearestInteger(number) {
  return Math.round(number);
}

console.log(roundToNearestInteger(3.4)); // Output: 3
console.log(roundToNearestInteger(3.7)); // Output: 4
```

**Problem 100: Checking for Negative Numbers**
**Description:** Write a JavaScript function that checks if a number is negative and returns true if it is, or false if it's not.

**Solution:**
```javascript
function isNegative(number) {
  return number < 0;
}

console.log(isNegative(-5)); // Output: true
console.log(isNegative(3)); // Output: false
```

**Problem 101: Getting the Sign of a Number**
**Description:** Implement a JavaScript function that returns the sign of a number as -1 (negative), 0 (zero), or 1 (positive).

**Solution:**
```javascript
function getNumberSign(number) {
  return Math.sign(number);
}

console.log(getNumberSign(-5)); // Output: -1
console.log(getNumberSign(0)); // Output: 0
console.log(getNumberSign(3)); // Output: 1
```

**Problem 102: Checking for Even-Odd in an Array**
**Description:** Create a JavaScript function that takes an array of numbers and returns an object with the count of even and odd numbers in the array.

**Solution:**
```javascript
function countEvenOddNumbers(numbers) {
  let evenCount = 0;
  let oddCount = 0;

  for (const number of numbers) {
    if (number % 2 === 0) {
      evenCount++;
    } else {
      oddCount++;
    }
  }

  return { even: evenCount, odd: oddCount };
}

const numbers = [1, 2, 3, 4, 5];
console.log(countEvenOddNumbers(numbers)); // Output: { even: 2, odd: 3 }
```

**Problem 103: Checking for Perfect Numbers**
**Description:** Write a JavaScript function that checks if a given number is a perfect number (a positive integer that is equal to the sum of its proper divisors excluding itself).

**Solution:**
```javascript
function isPerfectNumber(number) {
  if (number <= 1) return false;
  let sum = 1;

  for (let i = 2; i <= Math.sqrt(number); i++) {
    if (number % i === 0) {
      sum += i;
      if (i !== number / i) {
        sum += number / i;
      }
    }
  }

  return sum === number;
}

console.log(isPerfectNumber(6)); // Output: true (6 = 1 + 2 + 3)
```

**Problem 104: Getting the Smallest Common Multiple**
**Description:** Create a JavaScript function that finds the smallest common multiple of two or more positive integers.

**Solution:**
```javascript
function getSmallestCommonMultiple(numbers) {
  const gcd = (a, b) => (b === 0 ? a : gcd(b, a % b));
  const lcm = (a, b) => (a * b) / gcd(a, b);

  let result = 1;
  for (const number of numbers) {
    result = lcm(result, number);
  }

  return result;


}

console.log(getSmallestCommonMultiple([3, 4, 5])); // Output: 60
```

**Problem 105: Checking for Armstrong Numbers**
**Description:** Write a JavaScript function that checks if a given number is an Armstrong number (a number that is equal to the sum of its own digits each raised to the power of the number of digits).

**Solution:**
```javascript
function isArmstrongNumber(number) {
  const numStr = number.toString();
  const numDigits = numStr.length;
  let sum = 0;

  for (const digit of numStr) {
    sum += parseInt(digit) ** numDigits;
  }

  return sum === number;
}

console.log(isArmstrongNumber(153)); // Output: true (1^3 + 5^3 + 3^3 = 153)
```

**Problem 106: Converting Number to Binary**
**Description:** Create a JavaScript function that converts a positive integer to its binary representation as a string.

**Solution:**
```javascript
function decimalToBinary(number) {
  return number.toString(2);
}

console.log(decimalToBinary(10)); // Output: "1010"
```

**Problem 107: Converting Binary to Decimal**
**Description:** Write a JavaScript function that converts a binary string to its decimal equivalent.

**Solution:**
```javascript
function binaryToDecimal(binaryString) {
  return parseInt(binaryString, 2);
}

console.log(binaryToDecimal("1010")); // Output: 10
```

**Problem 108: Checking for Palindromic Numbers**
**Description:** Implement a JavaScript function that checks if a given number is a palindromic number (reads the same forwards and backwards).

**Solution:**
```javascript
function isPalindromicNumber(number) {
  const numStr = number.toString();
  const reversedStr = numStr.split("").reverse().join("");
  return numStr === reversedStr;
}

console.log(isPalindromicNumber(121)); // Output: true
```

**Problem 109: Getting the Factors of a Number**
**Description:** Create a JavaScript function that finds and returns an array of factors for a given positive integer.

**Solution:**
```javascript
function getFactors(number) {
  const factors = [];
  for (let i = 1; i <= number; i++) {
    if (number % i === 0) {
      factors.push(i);
    }
  }
  return factors;
}

console.log(getFactors(12)); // Output: [1, 2, 3, 4, 6, 12]
```

**Problem 110: Calculating Exponents**
**Description:** Write a JavaScript function that calculates the result of raising a number to a specified exponent.

**Solution:**
```javascript
function calculateExponent(base, exponent) {
  return base ** exponent;
}

console.log(calculateExponent(2, 3)); // Output: 8
```

**Problem 111: Checking for Prime Factors**
**Description:** Implement a JavaScript function that finds and returns an array of prime factors for a given positive integer.

**Solution:**
```javascript
function getPrimeFactors(number) {
  const primeFactors = [];
  let divisor = 2;

  while (number > 1) {
    if (number % divisor === 0) {
      primeFactors.push(divisor);
      number /= divisor;
    } else {
      divisor++;
    }
  }

  return primeFactors;
}

console.log(getPrimeFactors(24)); // Output: [2, 3]
```

**Problem 112: Converting Decimal to Octal**
**Description:** Create a JavaScript function that converts a positive integer to its octal representation as a string.

**Solution:**
```javascript
function decimalToOctal(number) {
  return number.toString(8);
}

console.log(decimalToOctal(18)); // Output: "22"
```

**Problem 113: Converting Decimal to Hexadecimal**
**Description:** Write a JavaScript function that converts a positive integer to its hexadecimal representation as a string.

**Solution:**
```javascript
function decimalToHexadecimal(number) {
  return number.toString(16).toUpperCase();
}

console.log(decimalToHexadecimal(255)); // Output: "FF"
```

**Problem 114: Getting the Precision of a Floating-Point Number**
**Description:** Implement a JavaScript function that returns the number of decimal places in a floating-point number.

**Solution:**
```javascript
function getDecimalPrecision(number) {
  const decimalPart = (number.toString().split(".")[1] || "").length;
  return decimalPart;
}

console.log(getDecimalPrecision(3.14159)); // Output: 5
```

**Problem 115: Calculating Trigonometric Functions**
**Description:** Create a JavaScript function that calculates and returns the sine, cosine, and tangent of an angle in radians.

**Solution:**
```javascript
function calculateTrigonometry(angleInRadians) {
  const sine = Math.sin(angleInRadians);
  const cosine = Math.cos(angleInRadians);
  const tangent = Math.tan(angleInRadians);
  return { sine, cosine, tangent };
}

console.log(calculateTrigonometry(Math.PI / 6)); // Output: { sine: 0.5, cosine: 0.86602540378, tangent: 0.57735026919 }
```

**Problem 116: Calculating the Square Root**
**Description:** Write a JavaScript function that calculates and returns the square root of a non-negative number.

**Solution:**
```javascript
function calculateSquareRoot(number) {
  return Math.sqrt(number);
}

console.log(calculateSquareRoot(16)); // Output: 4
```

**Problem 117: Converting Radians to Degrees**
**Description:** Implement a JavaScript function that converts an angle in radians to degrees.

**Solution:**
```javascript
function radiansToDegrees(radians) {
  return (radians * 180) / Math.PI;
}

console.log(radiansToDegrees(Math.PI)); // Output: 180
```

**Problem 118: Converting Degrees to Radians**
**Description:** Create a JavaScript function that converts an angle in degrees to radians.

**Solution:**
```javascript
function degreesToRadians(degrees) {
  return (degrees * Math.PI) / 180;
}

console.log(degreesToRadians(90)); // Output: 1.57079632679
```

**Problem 119: Calculating Logarithm**
**Description:** Write a JavaScript function that calculates and returns the natural logarithm (base e) of a positive number.

**Solution:**
```javascript
function calculateNaturalLogarithm(number) {
  return Math.log(number);
}

console.log(calculateNaturalLogarithm(Math.E)); // Output: 1
```

**Problem 120: Calculating Power**
**Description:** Create a JavaScript function that calculates and returns the result of raising a number to a specified power.

**Solution:**
```javascript
function calculatePower(base, exponent) {
  return Math.pow(base, exponent);
}

console.log(calculatePower(2, 3)); // Output: 8
```

**Problem 121: Checking for NaN or Infinity**
**Description:** Implement a JavaScript function that checks if a number is NaN or Infinity and returns true if it is, or false if it's

 not.

**Solution:**
```javascript
function isNanOrInfinity(number) {
  return !Number.isFinite(number);
}

console.log(isNanOrInfinity(NaN)); // Output: true
console.log(isNanOrInfinity(Infinity)); // Output: true
console.log(isNanOrInfinity(42)); // Output: false
```

**Problem 122: Getting the Minimum Safe Integer**
**Description:** Write a JavaScript function that returns the minimum safe integer (the largest integer that can be represented without loss of precision).

**Solution:**
```javascript
function getMinimumSafeInteger() {
  return Number.MIN_SAFE_INTEGER;
}

console.log(getMinimumSafeInteger()); // Output: -9007199254740991
```

**Problem 123: Getting the Maximum Safe Integer**
**Description:** Create a JavaScript function that returns the maximum safe integer (the largest integer that can be represented without loss of precision).

**Solution:**
```javascript
function getMaximumSafeInteger() {
  return Number.MAX_SAFE_INTEGER;
}

console.log(getMaximumSafeInteger()); // Output: 9007199254740991
```

**Problem 124: Checking for Even-Odd with BigInt**
**Description:** Implement a JavaScript function that checks if a given BigInt is even and returns true if it is, or false if it's not.

**Solution:**
```javascript
function isBigIntEven(bigIntValue) {
  return bigIntValue % 2n === 0n;
}

console.log(isBigIntEven(42n)); // Output: true
console.log(isBigIntEven(13n)); // Output: false
```

**Problem 125: Calculating Factorial with BigInt**
**Description:** Write a JavaScript function that calculates and returns the factorial of a non-negative integer using BigInt.

**Solution:**
```javascript
function calculateBigIntFactorial(number) {
  if (number < 0n) return 0n;
  if (number <= 1n) return 1n;
  let factorial = 1n;
  for (let i = 2n; i <= number; i++) {
    factorial *= i;
  }
  return factorial;
}

console.log(calculateBigIntFactorial(20n)); // Output: 2432902008176640000n
```

**Problem 126: Getting the Minimum Exponent Value**
**Description:** Create a JavaScript function that returns the minimum exponent value for the radix used by the `Number` object.

**Solution:**
```javascript
function getMinimumExponentValue() {
  return Number.EPSILON;
}

console.log(getMinimumExponentValue()); // Output: 2.220446049250313e-16
```

**Problem 127: Checking for Integer Overflow**
**Description:** Implement a JavaScript function that checks if an arithmetic operation involving integers has resulted in an overflow and returns true if it has, or false if it hasn't.

**Solution:**
```javascript
function hasIntegerOverflow(a, b, result) {
  return result < a || result < b;
}

console.log(hasIntegerOverflow(2 ** 31 - 1, 2 ** 31 - 1, (2 ** 31 - 1) * 2)); // Output: true
```

**Problem 128: Checking for Safe Integer**
**Description:** Write a JavaScript function that checks if a given number is a safe integer and returns true if it is, or false if it's not.

**Solution:**
```javascript
function isSafeInteger(number) {
  return Number.isSafeInteger(number);
}

console.log(isSafeInteger(42)); // Output: true
console.log(isSafeInteger(2 ** 53)); // Output: false
```

**Problem 129: Calculating the Largest Power of 2**
**Description:** Create a JavaScript function that calculates and returns the largest power of 2 less than or equal to a given number.

**Solution:**
```javascript
function largestPowerOf2(number) {
  let power = 0;
  while (2 ** power <= number) {
    power++;
  }
  return 2 ** (power - 1);
}

console.log(largestPowerOf2(10)); // Output: 8
```

**Problem 130: Calculating the Square of a Number**
**Description:** Implement a JavaScript function that calculates and returns the square of a number without using the `**` operator.

**Solution:**
```javascript
function squareNumber(number) {
  return number * number;
}

console.log(squareNumber(5)); // Output: 25
```

**Problem 131: Getting the Smallest Positive Number**
**Description:** Write a JavaScript function that returns the smallest positive number that is greater than zero.

**Solution:**
```javascript
function getSmallestPositiveNumber() {
  return Number.MIN_VALUE;
}

console.log(getSmallestPositiveNumber()); // Output: 5e-324
```

**Problem 132: Getting the Largest Number**
**Description:** Create a JavaScript function that returns the largest possible number that can be represented in JavaScript.

**Solution:**
```javascript
function getLargestNumber() {
  return Number.MAX_VALUE;
}

console.log(getLargestNumber()); // Output: 1.7976931348623157e+308
```

**Problem 133: Calculating the Cube of a Number**
**Description:** Implement a JavaScript function that calculates and returns the cube of a number.

**Solution:**
```javascript
function cubeNumber(number) {
  return number * number * number;
}

console.log(cubeNumber(3)); // Output: 27
```

**Problem 134: Getting the Square of Infinity**
**Description:** Write a JavaScript function that returns the result of squaring positive and negative infinity.

**Solution:**
```javascript
function squareInfinity() {
  return Infinity * Infinity;
}

console.log(squareInfinity()); // Output: Infinity
```

**Problem 135: Calculating the Absolute Difference**
**Description:** Create a JavaScript function that calculates and returns the absolute difference between two numbers.

**Solution:**
```javascript
function absoluteDifference(a, b) {
  return Math.abs(a - b);
}

console.log(absoluteDifference(5, 8)); // Output: 3
```

**Problem 136: Calculating the Hypotenuse**
**Description:** Implement a JavaScript function that calculates and returns the length of the hypotenuse of a right triangle given the lengths of the other two sides.

**Solution:**
```javascript
function calculateHypotenuse(side1, side2) {
  return Math.sqrt(side1 * side1 + side2 * side2);
}

console.log(calculateHypotenuse(3, 4)); // Output: 5
```

**Problem 137: Calculating the Square of a BigInt**
**Description:** Write a JavaScript function that calculates and returns the square of a BigInt.

**Solution:**
```javascript
function squareBigInt(bigIntValue) {
  return bigIntValue * bigIntValue;
}

console.log(squareBigInt(12345678901234567890n)); // Output: 

1524155677487802747881582315629031215100n
```

**Problem 138: Checking for Fibonacci Numbers**
**Description:** Create a JavaScript function that checks if a given positive integer is a Fibonacci number and returns true if it is, or false if it's not.

**Solution:**
```javascript
function isFibonacciNumber(number) {
  function isPerfectSquare(x) {
    const sqrtX = Math.sqrt(x);
    return Number.isInteger(sqrtX) && sqrtX * sqrtX === x;
  }

  return isPerfectSquare(5 * number * number + 4) || isPerfectSquare(5 * number * number - 4);
}

console.log(isFibonacciNumber(5)); // Output: true
console.log(isFibonacciNumber(7)); // Output: false
```

**Problem 139: Getting the Golden Ratio**
**Description:** Write a JavaScript function that calculates and returns the golden ratio (phi) as a constant value.

**Solution:**
```javascript
function getGoldenRatio() {
  return (1 + Math.sqrt(5)) / 2;
}

console.log(getGoldenRatio()); // Output: 1.618033988749895
```

**Problem 140: Calculating the Exponential Function**
**Description:** Implement a JavaScript function that calculates and returns the exponential function of a number (e^x).

**Solution:**
```javascript
function calculateExponentialFunction(x) {
  return Math.exp(x);
}

console.log(calculateExponentialFunction(2)); // Output: 7.38905609893065
```

### JS Arrays : Arrays & Array methods
---



**1. Create an Array:**
   Problem: Create an array with three elements: "apple," "banana," and "cherry."
   Solution:
   ```javascript
   const fruits = ["apple", "banana", "cherry"];
   ```

**2. Accessing Elements:**
   Problem: Access and log the second element of the array.
   Solution:
   ```javascript
   console.log(fruits[1]); // Outputs: "banana"
   ```

**3. Array Length:**
   Problem: Find and log the length of the array.
   Solution:
   ```javascript
   console.log(fruits.length); // Outputs: 3
   ```

**4. Adding Elements:**
   Problem: Add "date" to the end of the array.
   Solution:
   ```javascript
   fruits.push("date");
   ```

**5. Removing Elements:**
   Problem: Remove the first element from the array.
   Solution:
   ```javascript
   fruits.shift();
   ```

**6. Iterating through an Array:**
   Problem: Use a loop to log each element in the array.
   Solution:
   ```javascript
   for (const fruit of fruits) {
     console.log(fruit);
   }
   ```

**7. Array Methods - `map()`:**
   Problem: Create a new array with the lengths of the fruit names.
   Solution:
   ```javascript
   const fruitLengths = fruits.map(fruit => fruit.length);
   ```

**8. Array Methods - `filter()`:**
   Problem: Create a new array with fruits that have more than five letters.
   Solution:
   ```javascript
   const longFruits = fruits.filter(fruit => fruit.length > 5);
   ```

**9. Array Methods - `reduce()`:**
   Problem: Calculate the total length of all fruit names in the array.
   Solution:
   ```javascript
   const totalLength = fruits.reduce((acc, fruit) => acc + fruit.length, 0);
   ```

**10. Sorting an Array:**
    Problem: Sort the array in alphabetical order.
    Solution:
    ```javascript
    fruits.sort();
    ```
    
**11. Finding an Element:**
   Problem: Check if the array contains the element "cherry."
   Solution:
   ```javascript
   const hasCherry = fruits.includes("cherry");
   ```

**12. Removing Elements by Value:**
   Problem: Remove "banana" from the array.
   Solution:
   ```javascript
   const index = fruits.indexOf("banana");
   if (index > -1) {
     fruits.splice(index, 1);
   }
   ```

**13. Slicing an Array:**
   Problem: Create a new array containing the first two elements of the original array.
   Solution:
   ```javascript
   const slicedFruits = fruits.slice(0, 2);
   ```

**14. Reversing an Array:**
   Problem: Reverse the order of elements in the array.
   Solution:
   ```javascript
   fruits.reverse();
   ```

**15. Concatenating Arrays:**
   Problem: Create a new array by combining `fruits` and `["grape", "kiwi"]`.
   Solution:
   ```javascript
   const moreFruits = fruits.concat(["grape", "kiwi"]);
   ```

**16. Searching for an Object in an Array:**
   Problem: Find the index of an object in an array based on a property.
   Solution:
   ```javascript
   const people = [{ name: "Alice" }, { name: "Bob" }, { name: "Charlie" }];
   const index = people.findIndex(person => person.name === "Bob");
   ```

**17. Removing Duplicates:**
   Problem: Remove duplicate values from an array.
   Solution:
   ```javascript
   const uniqueFruits = Array.from(new Set(fruits));
   ```

**18. Splitting a String into an Array:**
   Problem: Split a string into an array of words.
   Solution:
   ```javascript
   const sentence = "This is a sample sentence";
   const words = sentence.split(" ");
   ```

**19. Joining Array Elements:**
   Problem: Join the elements of an array into a single string separated by commas.
   Solution:
   ```javascript
   const joinedFruits = fruits.join(", ");
   ```

**20. Copying an Array:**
   Problem: Create a copy of the `fruits` array without modifying the original.
   Solution:
   ```javascript
   const copiedFruits = [...fruits];
   ```
   
**21. Checking for Empty Array:**
   Problem: Check if the `fruits` array is empty.
   Solution:
   ```javascript
   const isEmpty = fruits.length === 0;
   ```

**22. Summing Array Elements:**
   Problem: Calculate the sum of all numbers in an array.
   Solution:
   ```javascript
   const numbers = [1, 2, 3, 4, 5];
   const sum = numbers.reduce((acc, num) => acc + num, 0);
   ```

**23. Finding Maximum and Minimum:**
   Problem: Find the maximum and minimum values in an array of numbers.
   Solution:
   ```javascript
   const max = Math.max(...numbers);
   const min = Math.min(...numbers);
   ```

**24. Checking for Array Equality:**
   Problem: Check if two arrays are equal (have the same elements).
   Solution:
   ```javascript
   const array1 = [1, 2, 3];
   const array2 = [1, 2, 3];
   const areEqual = JSON.stringify(array1) === JSON.stringify(array2);
   ```

**25. Flattening Nested Arrays:**
   Problem: Flatten an array of nested arrays into a single array.
   Solution:
   ```javascript
   const nestedArray = [[1, 2], [3, 4], [5, 6]];
   const flatArray = nestedArray.flat();
   ```

**26. Counting Occurrences:**
   Problem: Count how many times a specific element appears in an array.
   Solution:
   ```javascript
   const count = fruits.filter(fruit => fruit === "apple").length;
   ```

**27. Checking if All Elements Meet a Condition:**
   Problem: Check if all numbers in an array are even.
   Solution:
   ```javascript
   const allEven = numbers.every(num => num % 2 === 0);
   ```

**28. Checking if Any Element Meets a Condition:**
   Problem: Check if there is at least one even number in the array.
   Solution:
   ```javascript
   const hasEven = numbers.some(num => num % 2 === 0);
   ```

**29. Array Chunking:**
   Problem: Split an array into chunks of a specified size.
   Solution:
   ```javascript
   function chunkArray(arr, size) {
     const chunked = [];
     for (let i = 0; i < arr.length; i += size) {
       chunked.push(arr.slice(i, i + size));
     }
     return chunked;
   }
   ```

**30. Merging Arrays:**
   Problem: Merge two arrays while removing duplicate elements.
   Solution:
   ```javascript
   const array1 = [1, 2, 3];
   const array2 = [3, 4, 5];
   const mergedArray = [...new Set([...array1, ...array2])];
   ```

**31. Sum of Even Numbers:**
   Problem: Calculate the sum of all even numbers in an array.
   Solution:
   ```javascript
   const evenSum = numbers.reduce((acc, num) => (num % 2 === 0 ? acc + num : acc), 0);
   ```

**32. Finding the First Occurrence:**
   Problem: Find the index of the first occurrence of a specific element in an array.
   Solution:
   ```javascript
   const index = fruits.indexOf("cherry");
   ```

**33. Removing Last Element:**
   Problem: Remove the last element from the array.
   Solution:
   ```javascript
   fruits.pop();
   ```

**34. Array Rotation:**
   Problem: Rotate the elements of an array to the right by one position.
   Solution:
   ```javascript
   const lastElement = fruits.pop();
   fruits.unshift(lastElement);
   ```

**35. Repeating Elements:**
   Problem: Create an array with a specified element repeated a certain number of times.
   Solution:
   ```javascript
   const repeatedArray = Array(5).fill("hello");
   ```

**36. Finding Missing Numbers:**
   Problem: Find missing numbers in a range within an array.
   Solution:
   ```javascript
   function findMissingNumbers(arr) {
     const max = Math.max(...arr);
     const min = Math.min(...arr);
     const missingNumbers = [];
     for (let i = min; i <= max; i++) {
       if (!arr.includes(i)) {
         missingNumbers.push(i);
       }
     }
     return missingNumbers;
   }
   ```

**37. Palindrome Check:**
   Problem: Check if a given string is a palindrome (reads the same backward as forward).
   Solution:
   ```javascript
   function isPalindrome(str) {
     return str === str.split('').reverse().join('');
   }
   ```

**38. Frequency Count:**
   Problem: Count the frequency of each element in an array and store it in an object.
   Solution:
   ```javascript
   const frequencyCount = {};
   numbers.forEach(num => {
     frequencyCount[num] = (frequencyCount[num] || 0) + 1;
   });
   ```

**39. Combining Arrays with Zip:**
   Problem: Combine two arrays element-wise using a "zip" operation.
   Solution:
   ```javascript
   function zipArrays(arr1, arr2) {
     return arr1.map((item, index) => [item, arr2[index]]);
   }
   ```

**40. Checking for Subarray:**
   Problem: Check if an array is a subarray of another array.
   Solution:
   ```javascript
   function isSubarray(subarray, array) {
     return subarray.every(item => array.includes(item));
   }
   ```

**41. Finding the Second Largest Number:**
   Problem: Find the second largest number in an array of integers.
   Solution:
   ```javascript
   function findSecondLargest(arr) {
     arr.sort((a, b) => b - a);
     return arr[1];
   }
   ```

**42. Intersection of Two Arrays:**
   Problem: Find the common elements between two arrays.
   Solution:
   ```javascript
   function intersection(arr1, arr2) {
     return arr1.filter(item => arr2.includes(item));
   }
   ```

**43. Removing Duplicate Objects:**
   Problem: Remove duplicate objects from an array based on a property.
   Solution:
   ```javascript
   function removeDuplicates(arr, prop) {
     return arr.filter((item, index, self) =>
       index === self.findIndex(obj => obj[prop] === item[prop])
     );
   }
   ```

**44. Array Palindromes:**
   Problem: Check if an array of strings contains palindromes.
   Solution:
   ```javascript
   function hasPalindromes(arr) {
     return arr.some(str => str === str.split('').reverse().join(''));
   }
   ```

**45. Rotating an Array:**
   Problem: Rotate an array to the right by a given number of positions.
   Solution:
   ```javascript
   function rotateArray(arr, positions) {
     const n = arr.length;
     const rotated = [];
     for (let i = 0; i < n; i++) {
       const newPosition = (i + positions) % n;
       rotated[newPosition] = arr[i];
     }
     return rotated;
   }
   ```

**46. Maximum Sum Subarray:**
   Problem: Find the maximum sum of a subarray within an array of numbers.
   Solution:
   ```javascript
   function maxSubarraySum(arr) {
     let maxSum = -Infinity;
     let currentSum = 0;
     for (const num of arr) {
       currentSum = Math.max(num, currentSum + num);
       maxSum = Math.max(maxSum, currentSum);
     }
     return maxSum;
   }
   ```

**47. Array Shuffling:**
   Problem: Shuffle the elements of an array randomly.
   Solution:
   ```javascript
   function shuffleArray(arr) {
     for (let i = arr.length - 1; i > 0; i--) {
       const j = Math.floor(Math.random() * (i + 1));
       [arr[i], arr[j]] = [arr[j], arr[i]];
     }
     return arr;
   }
   ```

**48. Moving Zeros to the End:**
   Problem: Move all zeros in an array to the end while maintaining the order of other elements.
   Solution:
   ```javascript
   function moveZerosToEnd(arr) {
     return arr.filter(item => item !== 0).concat(arr.filter(item => item === 0));
   }
   ```

**49. Reversing Words in a String:**
   Problem: Reverse the order of words in a string.
   Solution:
   ```javascript
   function reverseWords(str) {
     return str.split(' ').reverse().join(' ');
   }
   ```

**50. Checking for Prime Numbers:**
   Problem: Check if an array of numbers contains prime numbers.
   Solution:
   ```javascript
   function isPrime(num) {
     if (num <= 1) return false;
     if (num <= 3) return true;
     if (num % 2 === 0 || num % 3 === 0) return false;
     for (let i = 5; i * i <= num; i += 6) {
       if (num % i === 0 || num % (i + 2) === 0) return false;
     }
     return true;
   }
   const hasPrimes = numbers.some(isPrime);
   ```

**51. Finding the Average:**
   Problem: Calculate the average of numbers in an array.
   Solution:
   ```javascript
   function findAverage(arr) {
     const sum = arr.reduce((acc, num) => acc + num, 0);
     return sum / arr.length;
   }
   ```

**52. Finding the Third Largest Number:**
   Problem: Find the third largest number in an array of integers.
   Solution:
   ```javascript
   function findThirdLargest(arr) {
     arr.sort((a, b) => b - a);
     return arr[2];
   }
   ```

**53. Matrix Transposition:**
   Problem: Transpose a given matrix (2D array).
   Solution:
   ```javascript
   function transposeMatrix(matrix) {
     const rows = matrix.length;
     const cols = matrix[0].length;
     const transposed = [];
     for (let i = 0; i < cols; i++) {
       transposed[i] = [];
       for (let j = 0; j < rows; j++) {
         transposed[i][j] = matrix[j][i];
       }
     }
     return transposed;
   }
   ```

**54. Find Missing Element:**
   Problem: Find the missing element in an array of consecutive numbers.
   Solution:
   ```javascript
   function findMissingElement(arr) {
     const n = arr.length + 1;
     const totalSum = (n * (n + 1)) / 2;
     const actualSum = arr.reduce((acc, num) => acc + num, 0);
     return totalSum - actualSum;
   }
   ```

**55. Counting Unique Values:**
   Problem: Count the number of unique values in an array.
   Solution:
   ```javascript
   function countUniqueValues(arr) {
     const uniqueValues = new Set(arr);
     return uniqueValues.size;
   }
   ```

**56. Array Partitioning:**
   Problem: Divide an array into two subarrays, one with even elements and the other with odd elements.
   Solution:
   ```javascript
   function partitionArray(arr) {
     const even = arr.filter(num => num % 2 === 0);
     const odd = arr.filter(num => num % 2 !== 0);
     return [even, odd];
   }
   ```

**57. Sorting by Object Property:**
   Problem: Sort an array of objects based on a specific property.
   Solution:
   ```javascript
   function sortByProperty(arr, prop) {
     return arr.sort((a, b) => a[prop] - b[prop]);
   }
   ```

**58. Destructive Array Assignment:**
   Problem: Swap the values of two variables using array destructuring.
   Solution:
   ```javascript
   let a = 1;
   let b = 2;
   [a, b] = [b, a];
   ```

**59. Finding Prime Factors:**
   Problem: Find the prime factors of a given number and store them in an array.
   Solution:
   ```javascript
   function primeFactors(num) {
     const factors = [];
     let divisor = 2;
     while (num > 2) {
       if (num % divisor === 0) {
         factors.push(divisor);
         num /= divisor;
       } else {
         divisor++;
       }
     }
     return factors;
   }
   ```

**60. Merge Sorted Arrays:**
   Problem: Merge two sorted arrays into a single sorted array.
   Solution:
   ```javascript
   function mergeSortedArrays(arr1, arr2) {
     let merged = [];
     while (arr1.length && arr2.length) {
       if (arr1[0] < arr2[0]) {
         merged.push(arr1.shift());
       } else {
         merged.push(arr2.shift());
       }
     }
     return merged.concat(arr1, arr2);
   }
   ```

**61. Array Duplicates:**
   Problem: Find and remove duplicates from an array.
   Solution:
   ```javascript
   function removeDuplicates(arr) {
     return [...new Set(arr)];
   }
   ```

**62. Chunking with Size:**
   Problem: Split an array into chunks of a specified size.
   Solution:
   ```javascript
   function chunkArray(arr, size) {
     const chunked = [];
     for (let i = 0; i < arr.length; i += size) {
       chunked.push(arr.slice(i, i + size));
     }
     return chunked;
   }
   ```

**63. Merge Objects:**
   Problem: Merge two objects into one.
   Solution:
   ```javascript
   function mergeObjects(obj1, obj2) {
     return { ...obj1, ...obj2 };
   }
   ```

**64. Sorting String Array:**
   Problem: Sort an array of strings in alphabetical order.
   Solution:
   ```javascript
   function sortStringArray(arr) {
     return arr.sort();
   }
   ```

**65. Largest Even Number:**
   Problem: Find the largest even number in an array.
   Solution:
   ```javascript
   function findLargestEven(arr) {
     const evenNumbers = arr.filter(num => num % 2 === 0);
     return Math.max(...evenNumbers);
   }
   ```

**66. Sum of Positive Numbers:**
   Problem: Calculate the sum of positive numbers in an array.
   Solution:
   ```javascript
   function sumPositiveNumbers(arr) {
     const positiveNumbers = arr.filter(num => num > 0);
     return positiveNumbers.reduce((acc, num) => acc + num, 0);
   }
   ```

**67. Sorting by String Length:**
   Problem: Sort an array of strings by their length in ascending order.
   Solution:
   ```javascript
   function sortByStringLength(arr) {
     return arr.sort((a, b) => a.length - b.length);
   }
   ```

**68. Array Deduplication:**
   Problem: Remove duplicate elements from an array without using a Set.
   Solution:
   ```javascript
   function deduplicateArray(arr) {
     return arr.filter((item, index, self) => self.indexOf(item) === index);
   }
   ```

**69. Maximum Product Subarray:**
   Problem: Find the contiguous subarray within an array that has the largest product.
   Solution:
   ```javascript
   function maxProductSubarray(arr) {
     let maxProduct = arr[0];
     let minProduct = arr[0];
     let result = arr[0];
     
     for (let i = 1; i < arr.length; i++) {
       if (arr[i] < 0) {
         [maxProduct, minProduct] = [minProduct, maxProduct];
       }
       
       maxProduct = Math.max(arr[i], maxProduct * arr[i]);
       minProduct = Math.min(arr[i], minProduct * arr[i]);
       
       result = Math.max(result, maxProduct);
     }
     return result;
   }
   ```

**70. Finding Mode in an Array:**
   Problem: Find the mode (most frequently occurring element) in an

 array.
   Solution:
   ```javascript
   function findMode(arr) {
     const frequency = {};
     let maxFrequency = 0;
     let mode = null;
     
     for (const num of arr) {
       frequency[num] = (frequency[num] || 0) + 1;
       if (frequency[num] > maxFrequency) {
         maxFrequency = frequency[num];
         mode = num;
       }
     }
     
     return mode;
   }
   ```

**71. Grouping by Property:**
   Problem: Group an array of objects by a specific property.
   Solution:
   ```javascript
   function groupByProperty(arr, prop) {
     return arr.reduce((groups, item) => {
       const key = item[prop];
       if (!groups[key]) {
         groups[key] = [];
       }
       groups[key].push(item);
       return groups;
     }, {});
   }
   ```

**72. Flattening Nested Objects:**
   Problem: Flatten a nested object into a single-level object.
   Solution:
   ```javascript
   function flattenObject(obj, prefix = '') {
     return Object.keys(obj).reduce((acc, key) => {
       const propName = prefix ? `${prefix}.${key}` : key;
       if (typeof obj[key] === 'object' && !Array.isArray(obj[key])) {
         Object.assign(acc, flattenObject(obj[key], propName));
       } else {
         acc[propName] = obj[key];
       }
       return acc;
     }, {});
   }
   ```

**73. Shifting an Array:**
   Problem: Shift the elements of an array to the left by one position.
   Solution:
   ```javascript
   function shiftArrayLeft(arr) {
     const firstElement = arr.shift();
     arr.push(firstElement);
   }
   ```

**74. Fibonacci Series:**
   Problem: Generate a Fibonacci series up to a specified length.
   Solution:
   ```javascript
   function generateFibonacciSeries(length) {
     const series = [0, 1];
     while (series.length < length) {
       const nextNumber = series[series.length - 1] + series[series.length - 2];
       series.push(nextNumber);
     }
     return series;
   }
   ```

**75. Array Frequency Count:**
   Problem: Count the frequency of each element in an array and return the count as an object.
   Solution:
   ```javascript
   function frequencyCount(arr) {
     const count = {};
     for (const item of arr) {
       count[item] = (count[item] || 0) + 1;
     }
     return count;
   }
   ```

**76. Array Reversal:**
   Problem: Reverse the elements of an array in place (without creating a new array).
   Solution:
   ```javascript
   function reverseArray(arr) {
     for (let i = 0; i < Math.floor(arr.length / 2); i++) {
       const temp = arr[i];
       arr[i] = arr[arr.length - 1 - i];
       arr[arr.length - 1 - i] = temp;
     }
   }
   ```

**77. Array Swapping:**
   Problem: Swap the values of two elements in an array.
   Solution:
   ```javascript
   function swapArrayElements(arr, index1, index2) {
     const temp = arr[index1];
     arr[index1] = arr[index2];
     arr[index2] = temp;
   }
   ```

**78. Finding Prime Numbers:**
   Problem: Create an array of prime numbers within a specified range.
   Solution:
   ```javascript
   function generatePrimesInRange(start, end) {
     const primes = [];
     for (let num = start; num <= end; num++) {
       if (isPrime(num)) {
         primes.push(num);
       }
     }
     return primes;
   }
   
   function isPrime(num) {
     if (num <= 1) return false;
     if (num <= 3) return true;
     if (num % 2 === 0 || num % 3 === 0) return false;
     for (let i = 5; i * i <= num; i += 6) {
       if (num % i === 0 || num % (i + 2) === 0) return false;
     }
     return true;
   }
   ```

**79. Array Intersection Count:**
   Problem: Count the number of common elements between two arrays.
   Solution:
   ```javascript
   function countCommonElements(arr1, arr2) {
     const commonElements = arr1.filter(item => arr2.includes(item));
     return commonElements.length;
   }
   ```

**80. Array Filtering by Length:**
   Problem: Filter an array to keep only elements with a specified length.
   Solution:
   ```javascript
   function filterByLength(arr, length) {
     return arr.filter(item => item.length === length);
   }
   ```

**81. Finding Odd Numbers:**
   Problem: Create an array of odd numbers within a specified range.
   Solution:
   ```javascript
   function generateOddNumbersInRange(start, end) {
     const oddNumbers = [];
     for (let num = start; num <= end; num++) {
       if (num % 2 !== 0) {
         oddNumbers.push(num);
       }
     }
     return oddNumbers;
   }
   ```

**82. Array Search:**
   Problem: Search for an element in an array and return its index, or -1 if not found.
   Solution:
   ```javascript
   function searchElement(arr, element) {
     return arr.indexOf(element);
   }
   ```

**83. Array Subset Check:**
   Problem: Check if an array is a subset of another array.
   Solution:
   ```javascript
   function isSubset(subset, array) {
     return subset.every(item => array.includes(item));
   }
   ```

**84. Finding Maximum Number:**
   Problem: Find the maximum number in an array without using the `Math.max` method.
   Solution:
   ```javascript
   function findMaxNumber(arr) {
     let max = arr[0];
     for (let i = 1; i < arr.length; i++) {
       if (arr[i] > max) {
         max = arr[i];
       }
     }
     return max;
   }
   ```

**85. Finding Minimum Number:**
   Problem: Find the minimum number in an array without using the `Math.min` method.
   Solution:
   ```javascript
   function findMinNumber(arr) {
     let min = arr[0];
     for (let i = 1; i < arr.length; i++) {
       if (arr[i] < min) {
         min = arr[i];
       }
     }
     return min;
   }
   ```

**86. Array Chunking with Callback:**
   Problem: Split an array into chunks based on a callback function.
   Solution:
   ```javascript
   function chunkArrayWithCallback(arr, callback) {
     const chunked = [];
     let currentChunk = [];
     for (const item of arr) {
       if (callback(item)) {
         if (currentChunk.length > 0) {
           chunked.push(currentChunk);
         }
         currentChunk = [];
       }
       currentChunk.push(item);
     }
     if (currentChunk.length > 0) {
       chunked.push(currentChunk);
     }
     return chunked;
   }
   ```

**87. Array Rotation by Steps:**
   Problem: Rotate an array to the right by a specified number of steps.
   Solution:
   ```javascript
   function rotateArrayBySteps(arr, steps) {
     const n = arr.length;
     const rotated = new Array(n);
     for (let i = 0; i < n; i++) {
       rotated[(i + steps) % n] = arr[i];
     }
     return rotated;
   }
   ```

**88. Array Element Count:**
   Problem: Count the occurrences of a specific element in an array.
   Solution:
   ```javascript
   function countElementOccurrences(arr, element) {
     return arr.reduce((count, current) => (current === element ? count + 1 : count), 0);
   }
   ```

**89. Finding Maximum Sum Subarray:**
   Problem: Find the subarray with the maximum sum in an array.
   Solution:
   ```javascript
   function findMaxSumSubarray(arr) {
     let maxSum = arr[0];
     let currentSum = arr[0];
     for (let i = 1; i < arr.length; i++) {
       currentSum = Math.max(arr[i], currentSum + arr[i]);
       maxSum = Math.max(maxSum, currentSum);
     }
     return maxSum;
   }
   ```

**90. Array Split by Value:**
   Problem: Split an array into two arrays at the first occurrence of a specified value.
   Solution:
   ```javascript
   function splitArrayByValue(arr, value) {
     const index = arr.indexOf(value);
     if (index === -1) return [arr, []];
     return [arr.slice(0, index), arr.slice(index)];
   }
   ```

**91. Converting Arrays to Objects:**
   Problem: Convert two arrays, one containing keys and the other values, into an object.
   Solution:
   ```javascript
   function arraysToObject(keys, values) {
     const obj = {};
     for (let i = 0; i < keys.length; i++) {
       obj[keys[i]] = values[i];
     }
     return obj;
   }
   ```

**92. Array Average without `reduce`:**
   Problem: Calculate the average of numbers in an array without using the `reduce` method.
   Solution:


   ```javascript
   function calculateAverage(arr) {
     let sum = 0;
     for (const num of arr) {
       sum += num;
     }
     return sum / arr.length;
   }
   ```

**93. Unique Characters in a String:**
   Problem: Find and return an array of unique characters in a string.
   Solution:
   ```javascript
   function uniqueCharacters(str) {
     const uniqueChars = [];
     for (const char of str) {
       if (!uniqueChars.includes(char)) {
         uniqueChars.push(char);
       }
     }
     return uniqueChars;
   }
   ```

**94. Array Odd and Even Count:**
   Problem: Count the number of odd and even numbers in an array.
   Solution:
   ```javascript
   function countOddAndEven(arr) {
     let oddCount = 0;
     let evenCount = 0;
     for (const num of arr) {
       if (num % 2 === 0) {
         evenCount++;
       } else {
         oddCount++;
       }
     }
     return { odd: oddCount, even: evenCount };
   }
   ```

**95. Array Concatenation with Duplicates:**
   Problem: Concatenate two arrays while allowing duplicate elements.
   Solution:
   ```javascript
   function concatenateArraysAllowDuplicates(arr1, arr2) {
     return arr1.concat(arr2);
   }
   ```

**96. Flattening Deeply Nested Arrays:**
   Problem: Flatten a deeply nested array into a single-level array.
   Solution:
   ```javascript
   function flattenDeepArray(arr) {
     return arr.reduce((flat, current) => {
       return Array.isArray(current) ? flat.concat(flattenDeepArray(current)) : flat.concat(current);
     }, []);
   }
   ```

**97. Array Merge by Index:**
   Problem: Merge two arrays by interleaving their elements based on index.
   Solution:
   ```javascript
   function mergeArraysByIndex(arr1, arr2) {
     const merged = [];
     const maxLength = Math.max(arr1.length, arr2.length);
     for (let i = 0; i < maxLength; i++) {
       if (i < arr1.length) {
         merged.push(arr1[i]);
       }
       if (i < arr2.length) {
         merged.push(arr2[i]);
       }
     }
     return merged;
   }
   ```

**98. Finding N Smallest Numbers:**
   Problem: Find the N smallest numbers in an array and return them in ascending order.
   Solution:
   ```javascript
   function findNSmallestNumbers(arr, n) {
     const sorted = arr.slice().sort((a, b) => a - b);
     return sorted.slice(0, n);
   }
   ```

**99. Finding Array Mode:**
   Problem: Find the mode (most frequently occurring element) in an array.
   Solution:
   ```javascript
   function findArrayMode(arr) {
     const count = {};
     let maxCount = 0;
     let mode = null;
     for (const num of arr) {
       count[num] = (count[num] || 0) + 1;
       if (count[num] > maxCount) {
         maxCount = count[num];
         mode = num;
       }
     }
     return mode;
   }
   ```

**100. Array Duplicate Removal in Place:**
   Problem: Remove duplicate elements from an array in place (without using additional arrays).
   Solution:
   ```javascript
   function removeDuplicatesInPlace(arr) {
     for (let i = 0; i < arr.length; i++) {
       for (let j = i + 1; j < arr.length; j++) {
         if (arr[i] === arr[j]) {
           arr.splice(j, 1);
           j--;
         }
       }
     }
   }
   ```

   
**101. Array Sum and Average:**
   Problem: Calculate the sum and average of numbers in an array.
   Solution:
   ```javascript
   function sumAndAverage(arr) {
     const sum = arr.reduce((acc, num) => acc + num, 0);
     const average = sum / arr.length;
     return { sum, average };
   }
   ```

**102. Array Slice:**
   Problem: Get a slice of an array between two specified indices.
   Solution:
   ```javascript
   function arraySlice(arr, start, end) {
     return arr.slice(start, end + 1);
   }
   ```

**103. Removing Specific Elements:**
   Problem: Remove all occurrences of a specific element from an array.
   Solution:
   ```javascript
   function removeElement(arr, element) {
     return arr.filter(item => item !== element);
   }
   ```

**104. Array Max and Min Indices:**
   Problem: Find the indices of the maximum and minimum values in an array.
   Solution:
   ```javascript
   function maxAndMinIndices(arr) {
     const maxIndex = arr.indexOf(Math.max(...arr));
     const minIndex = arr.indexOf(Math.min(...arr));
     return { maxIndex, minIndex };
   }
   ```

**105. Sorting Arrays:**
   Problem: Sort an array of numbers in ascending and descending order.
   Solution:
   ```javascript
   function sortAscending(arr) {
     return arr.slice().sort((a, b) => a - b);
   }
   
   function sortDescending(arr) {
     return arr.slice().sort((a, b) => b - a);
   }
   ```

**106. Array Mapping:**
   Problem: Create a new array by applying a function to each element of an existing array.
   Solution:
   ```javascript
   function mapArray(arr, func) {
     return arr.map(func);
   }
   ```

**107. Array Filling:**
   Problem: Fill an array with a specified value or range of values.
   Solution:
   ```javascript
   function fillArray(value, length) {
     return new Array(length).fill(value);
   }
   ```

**108. Array Chunking with Size:**
   Problem: Split an array into chunks of a specified size.
   Solution:
   ```javascript
   function chunkArray(arr, size) {
     const chunked = [];
     for (let i = 0; i < arr.length; i += size) {
       chunked.push(arr.slice(i, i + size));
     }
     return chunked;
   }
   ```

**109. Unique Elements Count:**
   Problem: Count the number of unique elements in an array.
   Solution:
   ```javascript
   function countUniqueElements(arr) {
     const uniqueElements = [...new Set(arr)];
     return uniqueElements.length;
   }
   ```

**110. Array Filtering:**
   Problem: Filter an array to keep only elements that meet a specific condition.
   Solution:
   ```javascript
   function filterArray(arr, condition) {
     return arr.filter(item => condition(item));
   }
   ```

**111. Duplicates Count:**
   Problem: Count the occurrences of duplicate elements in an array.
   Solution:
   ```javascript
   function countDuplicates(arr) {
     const count = {};
     arr.forEach(item => {
       count[item] = (count[item] || 0) + 1;
     });
     return count;
   }
   ```

**112. Finding the Median:**
   Problem: Find the median value of an array (middle value when sorted).
   Solution:
   ```javascript
   function findMedian(arr) {
     const sorted = arr.slice().sort((a, b) => a - b);
     const middle = Math.floor(sorted.length / 2);
     if (sorted.length % 2 === 0) {
       return (sorted[middle - 1] + sorted[middle]) / 2;
     } else {
       return sorted[middle];
     }
   }
   ```

**113. Array Concatenation:**
   Problem: Concatenate two arrays into a single array.
   Solution:
   ```javascript
   function concatenateArrays(arr1, arr2) {
     return arr1.concat(arr2);
   }
   ```

**114. Array Filtering by Range:**
   Problem: Filter an array to keep only elements within a specified range.
   Solution:
   ```javascript
   function filterByRange(arr, min, max) {
     return arr.filter(item => item >= min && item <= max);
   }
   ```

**115. Array Deduplication:**
   Problem: Remove duplicate elements from an array while preserving the order.
   Solution:
   ```javascript
   function deduplicateArrayPreserveOrder(arr) {
     const uniqueElements = [];
     for (const item of arr) {
       if (!uniqueElements.includes(item)) {
         uniqueElements.push(item);
       }
     }
     return uniqueElements;
   }
   ```

**116. Array Element Rotation:**
   Problem: Rotate the elements of an array to the right by a specified number of positions.
   Solution:
   ```javascript
   function rotateArrayRight(arr, positions) {
     for (let i = 0; i < positions; i++) {
       const lastElement = arr.pop();
       arr.unshift(lastElement);
     }
   }
   ```

**117. Array Grouping:**
   Problem: Group elements of an array into subarrays of a specified size.
   Solution:
   ```javascript
   function groupArray(arr, size) {
     const grouped = [];
     for (let i = 0; i < arr.length; i += size) {
       grouped.push(arr.slice(i, i + size));
     }
     return grouped;
   }
   ```

**118. Finding Palindromes:**
   Problem: Identify and return palindromic strings from an array.
   Solution:
   ```javascript
   function findPalindromes(arr) {
     return arr.filter(str => str === str.split('').reverse().join(''));
   }
   ```

**119. Array Intersection:**
   Problem: Find the common elements between two arrays.
   Solution:
   ```javascript
   function findArrayIntersection(arr1, arr2) {
     return arr1.filter(item => arr2.includes(item));
   }
   ```

**120. Array Sum by Index:**
   Problem: Calculate the sum of values at specified indices in an array.
   Solution:
   ```javascript
   function sumByIndices(arr, indices) {
     return indices.reduce((sum, index) => sum + arr[index], 0);
   }
   ```

**121. Maximum Sum of Consecutive Elements:**
   Problem: Find the maximum sum of `k` consecutive elements in an array.
   Solution:
   ```javascript
   function maxConsecutiveSum(arr, k) {
     let maxSum = 0;
     let currentSum = 0;
     for (let i = 0; i < k; i++) {
       maxSum += arr[i];
     }
     currentSum = maxSum;
     for (let i = k; i < arr.length; i++) {
       currentSum = currentSum - arr[i -

 k] + arr[i];
       maxSum = Math.max(maxSum, currentSum);
     }
     return maxSum;
   }
   ```

**122. Array Element Frequency:**
   Problem: Count the frequency of each element in an array and return it as an object.
   Solution:
   ```javascript
   function elementFrequency(arr) {
     const frequency = {};
     arr.forEach(item => {
       frequency[item] = (frequency[item] || 0) + 1;
     });
     return frequency;
   }
   ```

**123. Longest Increasing Subarray:**
   Problem: Find the length of the longest increasing subarray in an array.
   Solution:
   ```javascript
   function longestIncreasingSubarray(arr) {
     let maxLength = 1;
     let currentLength = 1;
     for (let i = 1; i < arr.length; i++) {
       if (arr[i] > arr[i - 1]) {
         currentLength++;
       } else {
         maxLength = Math.max(maxLength, currentLength);
         currentLength = 1;
       }
     }
     return Math.max(maxLength, currentLength);
   }
   ```

**124. Array Flattening with Depth:**
   Problem: Flatten a nested array to a specified depth.
   Solution:
   ```javascript
   function flattenArrayWithDepth(arr, depth) {
     return depth > 0 ? arr.reduce((acc, val) => acc.concat(Array.isArray(val) ? flattenArrayWithDepth(val, depth - 1) : val), []) : arr.slice();
   }
   ```

**125. Array Symmetry Check:**
   Problem: Check if an array is symmetric (same forwards and backwards).
   Solution:
   ```javascript
   function isSymmetricArray(arr) {
     const reversed = arr.slice().reverse();
     return JSON.stringify(arr) === JSON.stringify(reversed);
   }
   ```

**126. Shifting Array Elements:**
   Problem: Shift the elements of an array to the right by one position.
   Solution:
   ```javascript
   function shiftArrayRight(arr) {
     const lastElement = arr.pop();
     arr.unshift(lastElement);
   }
   ```

**127. Remove First Occurrence of Element:**
   Problem: Remove the first occurrence of a specific element from an array.
   Solution:
   ```javascript
   function removeFirstOccurrence(arr, element) {
     const index = arr.indexOf(element);
     if (index !== -1) {
       arr.splice(index, 1);
     }
   }
   ```

**128. Finding Second Largest Element:**
   Problem: Find the second largest element in an array.
   Solution:
   ```javascript
   function findSecondLargest(arr) {
     if (arr.length < 2) return null;
     let firstLargest = arr[0];
     let secondLargest = null;
     for (let i = 1; i < arr.length; i++) {
       if (arr[i] > firstLargest) {
         secondLargest = firstLargest;
         firstLargest = arr[i];
       } else if (arr[i] < firstLargest) {
         if (secondLargest === null || arr[i] > secondLargest) {
           secondLargest = arr[i];
         }
       }
     }
     return secondLargest;
   }
   ```

**129. Array Rotation to the Left:**
   Problem: Rotate an array to the left by a specified number of positions.
   Solution:
   ```javascript
   function rotateArrayLeft(arr, positions) {
     for (let i = 0; i < positions; i++) {
       const firstElement = arr.shift();
       arr.push(firstElement);
     }
   }
   ```

**130. Array Range Generator:**
   Problem: Generate an array of numbers in a specified range.
   Solution:
   ```javascript
   function generateRange(start, end) {
     return Array.from({ length: end - start + 1 }, (_, index) => start + index);
   }
   ```

**131. Array Reordering:**
   Problem: Reorder an array so that all even numbers come before odd numbers.
   Solution:
   ```javascript
   function reorderArray(arr) {
     const evenNumbers = arr.filter(num => num % 2 === 0);
     const oddNumbers = arr.filter(num => num % 2 !== 0);
     return evenNumbers.concat(oddNumbers);
   }
   ```

**132. Finding Missing Number:**
   Problem: Find the missing number in an array of consecutive numbers.
   Solution:
   ```javascript
   function findMissingNumber(arr) {
     const n = arr.length + 1;
     const expectedSum = (n * (n + 1)) / 2;
     const actualSum = arr.reduce((sum, num) => sum + num, 0);
     return expectedSum - actualSum;
   }
   ```

**133. Array Split by Value (Alternate):**
   Problem: Split an array into two arrays at the first occurrence of a specified value without using the `indexOf` method.
   Solution:
   ```javascript
   function splitArrayByValueAlternate(arr, value) {
     const left = [];
     const right = [];
     let found = false;
     for (const item of arr) {
       if (item === value) {
         found = true;
       } else if (!found) {
         left.push(item);
       } else {
         right.push(item);
       }
     }
     return [left, right];
   }
   ```

**134. Array Mapping with Index:**
   Problem: Create a new array by applying a function to each element of an existing array along with its index.
   Solution:
   ```javascript
   function mapArrayWithIndex(arr, func) {
     return arr.map((item, index) => func(item, index));
   }
   ```

**135. Array Sum with Condition:**
   Problem: Calculate the sum of elements in an array that meet a specific condition.
   Solution:
   ```javascript
   function sumWithCondition(arr, condition) {
     return arr.reduce((sum, num) => (condition(num) ? sum + num : sum), 0);
   }
   ```

**136. Array Intersection Count:**
   Problem: Count the number of common elements between two arrays (alternate method).
   Solution:
   ```javascript
   function countCommonElementsAlternate(arr1, arr2) {
     const set1 = new Set(arr1);
     const set2 = new Set(arr2);
     let count = 0;
     for (const item of set1) {
       if (set2.has(item)) {
         count++;
       }
     }
     return count;
   }
   ```

**137. Array Rotation to the Left (Alternate):**
   Problem: Rotate an array to the left by a specified number of positions (alternate method).
   Solution:
   ```javascript
   function rotateArrayLeftAlternate(arr, positions) {
     const n = arr.length;
     const rotated = new Array(n);
     for (let i = 0; i < n; i++) {
       rotated[(i - positions + n) % n] = arr[i];
     }
     return rotated;
   }
   ```

**138. Finding Maximum Sum Subarray (Alternate):**
   Problem: Find the subarray with the maximum sum in an array (alternate method).
   Solution:
   ```javascript
   function findMaxSumSubarrayAlternate(arr) {
     let maxSum = arr[0];
     let currentSum = arr[0];
     for (let i = 1; i < arr.length; i++) {
       currentSum = Math.max(arr[i], currentSum + arr[i]);
       maxSum = Math.max(maxSum, currentSum);
     }
     return maxSum;
   }
   ```

**139. Array Deduplication (Alternate):**
   Problem: Remove duplicate elements from an array while preserving the order (alternate method).
   Solution:
   ```javascript
   function deduplicateArrayPreserveOrderAlternate(arr) {
     return arr.filter((item, index) => arr.indexOf(item) === index);
   }
   ```

**140. Finding Palindromes (Alternate):**
   Problem: Identify and return palindromic strings from an array (alternate method).
   Solution:
   ```javascript
   function findPalindromesAlternate(arr) {
     return arr.filter(str => str === str.split('').reverse().join(''));
   }
   ```

**141. Finding Even Numbers:**
   Problem: Create an array of even numbers within a specified range.
   Solution:
   ```javascript
   function generateEvenNumbersInRange(start, end) {
     const evenNumbers = [];
     for (let num = start; num <= end; num++) {
       if (num % 2 === 0) {
         evenNumbers.push(num);
       }
     }
     return evenNumbers;
   }
   ```

**142. Finding Odd Numbers (Alternate):**
   Problem: Create an array of odd numbers within a specified range (alternate method).
   Solution:
   ```javascript
   function generateOddNumbersInRangeAlternate(start, end) {
     const oddNumbers = [];
     for (let num = start; num <= end; num++) {
       if (num % 2 !== 0) {
         oddNumbers.push(num);
       }
     }
     return oddNumbers;
   }
   ```

**143. Array Grouping by Condition:**
   Problem: Group elements of an array based on a condition.
   Solution:
   ```javascript
   function groupArrayByCondition(arr, condition) {
     return arr.reduce((groups, item) => {
       const key = condition(item);
       if (!groups[key]) {
         groups[key] = [];
       }
       groups[key].push(item);
       return groups;
     }, {});
   }
   ```

**144. Array Sorting by Length:**
   Problem: Sort an array of strings by their length in ascending order.
   Solution:
   ```javascript
   function sortArrayByLength(arr) {
     return arr.slice().sort((a, b) => a.length - b.length);
   }
   ```

**145. Finding Array Median (Alternate):**
   Problem: Find the median value of an array (alternate method).
   Solution:
   ```javascript
   function findMedianAlternate(arr) {
     const sorted = arr.slice().sort((a, b) => a - b);
     const middle = Math.floor(sorted.length / 2);
     return sorted.length % 2 === 0 ? (sorted[middle - 1] + sorted[middle]) / 2 : sorted[middle];
   }
   ```

**146. Array Reverse in Place (Alternate):**
   Problem: Reverse the elements of an array in place (alternate method).
   Solution:
   ```javascript
   function reverseArrayInPlaceAlternate(arr) {
     for (let i = 0; i < Math.floor(arr.length / 2); i++) {
       const temp = arr[i];
       arr[i] = arr[arr.length - 1 - i];
       arr[arr.length - 1 - i] = temp;
     }
   }
   ```

**147. Finding Maximum Number (Alternate):**
   Problem: Find the maximum number in an

 array without using the `Math.max` method (alternate method).
   Solution:
   ```javascript
   function findMaxNumberAlternate(arr) {
     let max = arr[0];
     for (let i = 1; i < arr.length; i++) {
       if (arr[i] > max) {
         max = arr[i];
       }
     }
     return max;
   }
   ```

**148. Finding Minimum Number (Alternate):**
   Problem: Find the minimum number in an array without using the `Math.min` method (alternate method).
   Solution:
   ```javascript
   function findMinNumberAlternate(arr) {
     let min = arr[0];
     for (let i = 1; i < arr.length; i++) {
       if (arr[i] < min) {
         min = arr[i];
       }
     }
     return min;
   }
   ```

**149. Finding Array Mode (Alternate):**
   Problem: Find the mode (most frequently occurring element) in an array (alternate method).
   Solution:
   ```javascript
   function findArrayModeAlternate(arr) {
     const count = {};
     let mode = arr[0];
     let maxCount = 1;
     for (const num of arr) {
       count[num] = (count[num] || 0) + 1;
       if (count[num] > maxCount) {
         mode = num;
         maxCount = count[num];
       }
     }
     return mode;
   }
   ```

**150. Array Duplicate Removal (Alternate):**
   Problem: Remove duplicate elements from an array in place (alternate method).
   Solution:
   ```javascript
   function removeDuplicatesInPlaceAlternate(arr) {
     const uniqueSet = new Set(arr);
     const uniqueArray = [...uniqueSet];
     arr.length = 0;
     arr.push(...uniqueArray);
   }
   ```

**151. Array Element Swapping:**
   Problem: Swap the positions of two elements in an array.
   Solution:
   ```javascript
   function swapArrayElements(arr, index1, index2) {
     const temp = arr[index1];
     arr[index1] = arr[index2];
     arr[index2] = temp;
   }
   ```

**152. Finding Prime Numbers in Range:**
   Problem: Generate an array of prime numbers within a specified range.
   Solution:
   ```javascript
   function generatePrimeNumbersInRange(start, end) {
     const primes = [];
     for (let num = start; num <= end; num++) {
       if (isPrime(num)) {
         primes.push(num);
       }
     }
     return primes;
   }

   function isPrime(num) {
     if (num <= 1) return false;
     if (num <= 3) return true;
     if (num % 2 === 0 || num % 3 === 0) return false;
     let i = 5;
     while (i * i <= num) {
       if (num % i === 0 || num % (i + 2) === 0) return false;
       i += 6;
     }
     return true;
   }
   ```

**153. Array Sum of Squares:**
   Problem: Calculate the sum of squares of elements in an array.
   Solution:
   ```javascript
   function sumOfSquares(arr) {
     return arr.reduce((sum, num) => sum + num * num, 0);
   }
   ```

**154. Finding Maximum Occurrence Element:**
   Problem: Find the element that occurs the most in an array.
   Solution:
   ```javascript
   function findMaxOccurrenceElement(arr) {
     const count = {};
     let maxCount = 0;
     let maxElement = arr[0];
     for (const num of arr) {
       count[num] = (count[num] || 0) + 1;
       if (count[num] > maxCount) {
         maxCount = count[num];
         maxElement = num;
       }
     }
     return maxElement;
   }
   ```

**155. Array Sort by Frequency:**
   Problem: Sort an array by the frequency of elements (most frequent first).
   Solution:
   ```javascript
   function sortArrayByFrequency(arr) {
     const frequency = {};
     arr.forEach(item => {
       frequency[item] = (frequency[item] || 0) + 1;
     });
     return arr.slice().sort((a, b) => frequency[b] - frequency[a]);
   }
   ```

**156. Finding Consecutive Subarrays:**
   Problem: Find all consecutive subarrays of a specified length in an array.
   Solution:
   ```javascript
   function findConsecutiveSubarrays(arr, length) {
     const subarrays = [];
     for (let i = 0; i <= arr.length - length; i++) {
       subarrays.push(arr.slice(i, i + length));
     }
     return subarrays;
   }
   ```

**157. Array Rotation by K Positions (Alternate):**
   Problem: Rotate an array to the right by a specified number of positions (alternate method).
   Solution:
   ```javascript
   function rotateArrayRightAlternate(arr, positions) {
     const n = arr.length;
     const rotated = new Array(n);
     for (let i = 0; i < n; i++) {
       rotated[(i + positions) % n] = arr[i];
     }
     return rotated;
   }
   ```

**158. Finding Array Median (Alternate 2):**
   Problem: Find the median value of an array (alternate method 2).
   Solution:
   ```javascript
   function findMedianAlternate2(arr) {
     const sorted = [...arr].sort((a, b) => a - b);
     const middle = Math.floor(sorted.length / 2);
     return sorted.length % 2 === 0
       ? (sorted[middle] + sorted[middle - 1]) / 2
       : sorted[middle];
   }
   ```

**159. Array Flattening (Alternate):**
   Problem: Flatten a nested array (alternate method).
   Solution:
   ```javascript
   function flattenArrayAlternate(arr) {
     return arr.reduce((flat, item) => flat.concat(Array.isArray(item) ? flattenArrayAlternate(item) : item), []);
   }
   ```

**160. Finding Maximum Difference:**
   Problem: Find the maximum difference between any two elements in an array.
   Solution:
   ```javascript
   function findMaxDifference(arr) {
     let min = arr[0];
     let maxDiff = 0;
     for (const num of arr) {
       maxDiff = Math.max(maxDiff, num - min);
       min = Math.min(min, num);
     }
     return maxDiff;
   }
   ```

**161. Array Sorting by Object Property:**
   Problem: Sort an array of objects by a specific property's value.
   Solution:
   ```javascript
   function sortByObjectProperty(arr, property) {
     return arr.slice().sort((a, b) => a[property] - b[property]);
   }
   ```

**162. Array Intersection (Alternate 2):**
   Problem: Find the common elements between two arrays (alternate method 2).
   Solution:
   ```javascript
   function findArrayIntersectionAlternate2(arr1, arr2) {
     const set1 = new Set(arr1);
     return arr2.filter(item => set1.has(item));
   }
   ```

**163. Finding Prime Factors:**
   Problem: Find the prime factors of a given number and return them in an array.
   Solution:
   ```javascript
   function primeFactors(num) {
     const factors = [];
     let divisor = 2;
     while (num >= 2) {
       if (num % divisor === 0) {
         factors.push(divisor);
         num = num / divisor;
       } else {
         divisor++;
       }
     }
     return factors;
   }
   ```

**164. Array Concatenation (Alternate 2):**
   Problem: Concatenate two arrays into a single array (alternate method 2).
   Solution:
   ```javascript
   function concatenateArraysAlternate2(arr1, arr2) {
     return [...arr1, ...arr2];
   }
   ```

**165. Finding Array Average:**
   Problem: Calculate the average of elements in an array using a different method.
   Solution:
   ```javascript
   function calculateAverageAlternate(arr) {
     return arr.reduce((sum, num) => sum + num) / arr.length;
   }
   ```

**166. Array Chunking (Alternate):**
   Problem: Split an array into chunks of a specified size (alternate method).
   Solution:
   ```javascript
   function chunkArrayAlternate(arr, size) {
     const chunked = [];
     for (let i = 0; i < arr.length; i += size) {
       chunked.push(arr.slice(i, i + size));
     }
     return chunked;
   }
   ```

**167. Array Element Frequency (Alternate):**
  

 Problem: Count the frequency of each element in an array and return it as an object (alternate method).
   Solution:
   ```javascript
   function elementFrequencyAlternate(arr) {
     return arr.reduce((frequency, item) => {
       frequency[item] = (frequency[item] || 0) + 1;
       return frequency;
     }, {});
   }
   ```

**168. Array Palindromic Check:**
   Problem: Check if an array is palindromic (same forwards and backwards).
   Solution:
   ```javascript
   function isPalindromicArray(arr) {
     const reversed = arr.slice().reverse();
     return JSON.stringify(arr) === JSON.stringify(reversed);
   }
   ```

**169. Array Element Rotation (Alternate):**
   Problem: Rotate the elements of an array to the right by a specified number of positions (alternate method).
   Solution:
   ```javascript
   function rotateArrayRightAlternate2(arr, positions) {
     const n = arr.length;
     const rotated = new Array(n);
     for (let i = 0; i < n; i++) {
       rotated[(i - positions + n) % n] = arr[i];
     }
     return rotated;
   }
   ```

**170. Shifting Array Elements (Alternate):**
   Problem: Shift the elements of an array to the right by one position (alternate method).
   Solution:
   ```javascript
   function shiftArrayRightAlternate(arr) {
     const firstElement = arr.shift();
     arr.push(firstElement);
   }
   ```

**171. Array Difference:**
   Problem: Find the elements that are present in one array but not in another.
   Solution:
   ```javascript
   function arrayDifference(arr1, arr2) {
     return arr1.filter(item => !arr2.includes(item));
   }
   ```

**172. Finding Maximum Occurrence Element (Alternate):**
   Problem: Find the element that occurs the most in an array (alternate method).
   Solution:
   ```javascript
   function findMaxOccurrenceElementAlternate(arr) {
     const count = {};
     let maxCount = 0;
     let maxElement = arr[0];
     for (const num of arr) {
       count[num] = (count[num] || 0) + 1;
       if (count[num] >= maxCount) {
         maxCount = count[num];
         maxElement = num;
       }
     }
     return maxElement;
   }
   ```

**173. Array Sorting (Case-Insensitive):**
   Problem: Sort an array of strings case-insensitively.
   Solution:
   ```javascript
   function sortArrayCaseInsensitive(arr) {
     return arr.slice().sort((a, b) => a.toLowerCase().localeCompare(b.toLowerCase()));
   }
   ```

**174. Finding Unique Elements in Two Arrays:**
   Problem: Find and return unique elements that exist in either of two arrays but not in both.
   Solution:
   ```javascript
   function uniqueElementsInTwoArrays(arr1, arr2) {
     const set1 = new Set(arr1);
     const set2 = new Set(arr2);
     const uniqueInArr1 = arr1.filter(item => !set2.has(item));
     const uniqueInArr2 = arr2.filter(item => !set1.has(item));
     return [...uniqueInArr1, ...uniqueInArr2];
   }
   ```

**175. Finding Minimum Subarray Sum:**
   Problem: Find the minimum sum of any contiguous subarray of an array.
   Solution:
   ```javascript
   function minSubarraySum(arr) {
     let minSum = arr[0];
     let currentSum = arr[0];
     for (let i = 1; i < arr.length; i++) {
       currentSum = Math.min(arr[i], currentSum + arr[i]);
       minSum = Math.min(minSum, currentSum);
     }
     return minSum;
   }
   ```

**176. Array Element Multiplication:**
   Problem: Multiply all elements in an array and return the result.
   Solution:
   ```javascript
   function arrayMultiplication(arr) {
     return arr.reduce((product, num) => product * num, 1);
   }
   ```

**177. Array Reverse in Place (Alternate 2):**
   Problem: Reverse the elements of an array in place (alternate method 2).
   Solution:
   ```javascript
   function reverseArrayInPlaceAlternate2(arr) {
     for (let left = 0, right = arr.length - 1; left < right; left++, right--) {
       const temp = arr[left];
       arr[left] = arr[right];
       arr[right] = temp;
     }
   }
   ```

**178. Array Sorting by Multiple Properties:**
   Problem: Sort an array of objects by multiple properties.
   Solution:
   ```javascript
   function sortByMultipleProperties(arr, properties) {
     return arr.slice().sort((a, b) => {
       for (const prop of properties) {
         if (a[prop] < b[prop]) return -1;
         if (a[prop] > b[prop]) return 1;
       }
       return 0;
     });
   }
   ```

**179. Array Rotation to the Left (Alternate 2):**
   Problem: Rotate an array to the left by a specified number of positions (alternate method 2).
   Solution:
   ```javascript
   function rotateArrayLeftAlternate2(arr, positions) {
     const n = arr.length;
     const rotated = new Array(n);
     for (let i = 0; i < n; i++) {
       rotated[(i - positions + n) % n] = arr[i];
     }
     return rotated;
   }
   ```

**180. Finding Median of Two Sorted Arrays:**
   Problem: Find the median of two sorted arrays.
   Solution:
   ```javascript
   function findMedianOfTwoSortedArrays(arr1, arr2) {
     const merged = [...arr1, ...arr2].sort((a, b) => a - b);
     const middle = Math.floor(merged.length / 2);
     if (merged.length % 2 === 0) {
       return (merged[middle - 1] + merged[middle]) / 2;
     } else {
       return merged[middle];
     }
   }
   ```

**181. Array Intersection Count (Alternate 3):**
   Problem: Count the number of common elements between two arrays (alternate method 3).
   Solution:
   ```javascript
   function countCommonElementsAlternate3(arr1, arr2) {
     const set1 = new Set(arr1);
     const set2 = new Set(arr2);
     return [...set1].filter(item => set2.has(item)).length;
   }
   ```

**182. Array Chunking with Fill Value:**
   Problem: Split an array into chunks of a specified size, and fill any gaps with a provided value.
   Solution:
   ```javascript
   function chunkArrayWithFillValue(arr, size, fillValue) {
     const chunked = [];
     for (let i = 0; i < arr.length; i += size) {
       const chunk = arr.slice(i, i + size);
       while (chunk.length < size) {
         chunk.push(fillValue);
       }
       chunked.push(chunk);
     }
     return chunked;
   }
   ```

**183. Array Element Frequency (Alternate 2):**
   Problem: Count the frequency of each element in an array and return it as

 an object (alternate method 2).
   Solution:
   ```javascript
   function elementFrequencyAlternate2(arr) {
     return arr.reduce((frequency, item) => {
       frequency[item] = (frequency[item] || 0) + 1;
       return frequency;
     }, {});
   }
   ```

**184. Array Intersection (Alternate 4):**
   Problem: Find the common elements between two arrays (alternate method 4).
   Solution:
   ```javascript
   function findArrayIntersectionAlternate4(arr1, arr2) {
     return arr1.filter(item => arr2.includes(item));
   }
   ```

**185. Finding GCD of Array:**
   Problem: Find the greatest common divisor (GCD) of elements in an array.
   Solution:
   ```javascript
   function findArrayGCD(arr) {
     const gcd = (a, b) => (b === 0 ? a : gcd(b, a % b));
     return arr.reduce((result, num) => gcd(result, num));
   }
   ```

**186. Array Subtraction:**
   Problem: Subtract one array from another, removing any common elements.
   Solution:
   ```javascript
   function arraySubtraction(arr1, arr2) {
     const set2 = new Set(arr2);
     return arr1.filter(item => !set2.has(item));
   }
   ```

**187. Finding Array Mode (Alternate 2):**
   Problem: Find the mode (most frequently occurring element) in an array (alternate method 2).
   Solution:
   ```javascript
   function findArrayModeAlternate2(arr) {
     const count = {};
     let mode = arr[0];
     let maxCount = 1;
     for (const num of arr) {
       count[num] = (count[num] || 0) + 1;
       if (count[num] > maxCount) {
         mode = num;
         maxCount = count[num];
       }
     }
     return mode;
   }
   ```

**188. Array Chunking with Overlapping:**
   Problem: Split an array into overlapping chunks of a specified size.
   Solution:
   ```javascript
   function chunkArrayWithOverlapping(arr, size, overlap) {
     const chunked = [];
     for (let i = 0; i < arr.length - size + 1; i += overlap) {
       chunked.push(arr.slice(i, i + size));
     }
     return chunked;
   }
   ```

**189. Finding Array Average (Alternate 2):**
   Problem: Calculate the average of elements in an array using a different method (alternate method 2).
   Solution:
   ```javascript
   function calculateAverageAlternate2(arr) {
     const sum = arr.reduce((total, num) => total + num, 0);
     return sum / arr.length;
   }
   ```

**190. Array Element Frequency (Alternate 3):**
   Problem: Count the frequency of each element in an array and return it as an object (alternate method 3).
   Solution:
   ```javascript
   function elementFrequencyAlternate3(arr) {
     const frequency = {};
     for (const item of arr) {
       frequency[item] = (frequency[item] || 0) + 1;
     }
     return frequency;
   }
   ```

**191. Finding Array Median (Alternate 3):**
   Problem: Find the median value of an array (alternate method 3).
   Solution:
   ```javascript
   function findMedianAlternate3(arr) {
     const sorted = [...arr].sort((a, b) => a - b);
     const middle = Math.floor(sorted.length / 2);
     return sorted.length % 2 === 0
       ? (sorted[middle - 1] + sorted[middle]) / 2
       : sorted[middle];
   }
   ```

**192. Array Rotation by K Positions (Alternate 3):**
   Problem: Rotate an array to the right by a specified number of positions (alternate method 3).
   Solution:
   ```javascript
   function rotateArrayRightAlternate3(arr, positions) {
     const n = arr.length;
     const rotated = new Array(n);
     for (let i = 0; i < n; i++) {
       rotated[(i + positions) % n] = arr[i];
     }
     return rotated;
   }
   ```

**193. Finding Maximum Occurrence Element (Alternate 2):**
   Problem: Find the element that occurs the most in an array (alternate method 2).
   Solution:
   ```javascript
   function findMaxOccurrenceElementAlternate2(arr) {
     const count = {};
     let maxCount = 0;
     let maxElement = arr[0];
     for (const num of arr) {
       count[num] = (count[num] || 0) + 1;
       if (count[num] >= maxCount) {
         maxCount = count[num];
         maxElement = num;
       }
     }
     return maxElement;
   }
   ```

**194. Array Intersection (Alternate 5):**
   Problem: Find the common elements between two arrays (alternate method 5).
   Solution:
   ```javascript
   function findArrayIntersectionAlternate5(arr1, arr2) {
     const set1 = new Set(arr1);
     const set2 = new Set(arr2);
     return [...set1].filter(item => set2.has(item));
   }
   ```

**195. Array Sorting by Length (Alternate):**
   Problem: Sort an array of strings by their length in descending order (alternate method).
   Solution:
   ```javascript
   function sortArrayByLengthAlternate(arr) {
     return arr.slice().sort((a, b) => b.length - a.length);
   }
   ```

**196. Array Subtraction (Alternate 2):**
   Problem: Subtract one array from another, removing any common elements (alternate method 2).
   Solution:
   ```javascript
   function arraySubtractionAlternate2(arr1, arr2) {
     const set1 = new Set(arr1);
     const set2 = new Set(arr2);
     return [...arr1].filter(item => !set2.has(item));
   }
   ```

**197. Finding Prime Numbers in Range (Alternate):**
   Problem: Generate an array of prime numbers within a specified range (alternate method).
   Solution:
   ```javascript
   function generatePrimeNumbersInRangeAlternate(start, end) {
     const primes = [];
     for (let num = start; num <= end; num++) {
       if (isPrime(num)) {
         primes.push(num);
       }
     }
     return primes;
   }

   function isPrime(num) {
     if (num <= 1) return false;
     if (num <= 3) return true;
     if (num % 2 === 0 || num % 3 === 0) return false;
     let i = 5;
     while (i * i <= num) {
       if (num % i === 0 || num % (i + 2) === 0) return false;
       i += 6;
     }
     return true;
   }
   ```

**198. Array Sorting by Object Property (Alternate):**
   Problem: Sort an array of objects by a specific property's value

 (alternate method).
   Solution:
   ```javascript
   function sortByObjectPropertyAlternate(arr, property) {
     return arr.slice().sort((a, b) => a[property] - b[property]);
   }
   ```

**199. Array Shuffling (Alternate):**
   Problem: Shuffle the elements of an array randomly (alternate method).
   Solution:
   ```javascript
   function shuffleArrayAlternate(arr) {
     for (let i = arr.length - 1; i > 0; i--) {
       const j = Math.floor(Math.random() * (i + 1));
       [arr[i], arr[j]] = [arr[j], arr[i]];
     }
   }
   ```

**200. Finding Array Average (Alternate 3):**
   Problem: Calculate the average of elements in an array using a different method (alternate method 3).
   Solution:
   ```javascript
   function calculateAverageAlternate3(arr) {
     const sum = arr.reduce((total, num) => total + num, 0);
     return sum / arr.length;
   }
   ```

**201. Array Chunking with Overlapping (Alternate 2):**
   Problem: Split an array into overlapping chunks of a specified size (alternate method 2).
   Solution:
   ```javascript
   function chunkArrayWithOverlappingAlternate2(arr, size, overlap) {
     const chunked = [];
     for (let i = 0; i < arr.length - size + 1; i += overlap) {
       chunked.push(arr.slice(i, i + size));
     }
     return chunked;
   }
   ```

**202. Finding Array Mode (Alternate 3):**
   Problem: Find the mode (most frequently occurring element) in an array (alternate method 3).
   Solution:
   ```javascript
   function findArrayModeAlternate3(arr) {
     const count = {};
     let mode = arr[0];
     let maxCount = 1;
     for (const num of arr) {
       count[num] = (count[num] || 0) + 1;
       if (count[num] > maxCount) {
         mode = num;
         maxCount = count[num];
       }
     }
     return mode;
   }
   ```

**203. Array Concatenation (Alternate 3):**
   Problem: Concatenate two arrays into a single array (alternate method 3).
   Solution:
   ```javascript
   function concatenateArraysAlternate3(arr1, arr2) {
     return arr1.concat(arr2);
   }
   ```

**204. Finding Array Median (Alternate 4):**
   Problem: Find the median value of an array (alternate method 4).
   Solution:
   ```javascript
   function findMedianAlternate4(arr) {
     const sorted = [...arr].sort((a, b) => a - b);
     const middle = Math.floor(sorted.length / 2);
     return sorted.length % 2 === 0
       ? (sorted[middle - 1] + sorted[middle]) / 2
       : sorted[middle];
   }
   ```

**205. Array Rotation to the Left (Alternate 3):**
   Problem: Rotate an array to the left by a specified number of positions (alternate method 3).
   Solution:
   ```javascript
   function rotateArrayLeftAlternate3(arr, positions) {
     const n = arr.length;
     const rotated = new Array(n);
     for (let i = 0; i < n; i++) {
       rotated[(i - positions + n) % n] = arr[i];
     }
     return rotated;
   }
   ```

**206. Array Element Frequency (Alternate 4):**
   Problem: Count the frequency of each element in an array and return it as an object (alternate method 4).
   Solution:
   ```javascript
   function elementFrequencyAlternate4(arr) {
     return arr.reduce((frequency, item) => {
       frequency[item] = (frequency[item] || 0) + 1;
       return frequency;
     }, {});
   }
   ```

**207. Array Intersection (Alternate 6):**
   Problem: Find the common elements between two arrays (alternate method 6).
   Solution:
   ```javascript
   function findArrayIntersectionAlternate6(arr1, arr2) {
     const set1 = new Set(arr1);
     const set2 = new Set(arr2);
     return [...set1].filter(item => set2.has(item));
   }
   ```

**208. Array Sorting (Descending Order):**
   Problem: Sort an array of numbers in descending order.
   Solution:
   ```javascript
   function sortArrayDescending(arr) {
     return arr.slice().sort((a, b) => b - a);
   }
   ```

**209. Array Shuffling (Alternate 2):**
   Problem: Shuffle the elements of an array randomly (alternate method 2).
   Solution:
   ```javascript
   function shuffleArrayAlternate2(arr) {
     for (let i = arr.length - 1; i > 0; i--) {
       const j = Math.floor(Math.random() * (i + 1));
       [arr[i], arr[j]] = [arr[j], arr[i]];
     }
   }
   ```

**210. Array Subtraction (Alternate 3):**
   Problem: Subtract one array from another, removing any common elements (alternate method 3).
   Solution:
   ```javascript
   function arraySubtractionAlternate3(arr1, arr2) {
     const set1 = new Set(arr1);
     const set2 = new Set(arr2);
     return [...arr1].filter(item => !set2.has(item));
   }
   ```

**211. Finding Prime Numbers in Range (Alternate 2):**
   Problem: Generate an array of prime numbers within a specified range (alternate method 2).
   Solution:
   ```javascript
   function generatePrimeNumbersInRangeAlternate2(start, end) {
     const primes = [];
     for (let num = start; num <= end; num++) {
       if (isPrime(num)) {
         primes.push(num);
       }
     }
     return primes;
   }

   function isPrime(num) {
     if (num <= 1) return false;
     if (num <= 3) return true;
     if (num % 2 === 0 || num % 3 === 0) return false;
     let i = 5;
     while (i * i <= num) {
       if (num % i === 0 || num % (i + 2) === 0) return false;
       i += 6;
     }
     return true;
   }
   ```

**212. Array Sorting by Object Property (Alternate 2):**
   Problem: Sort an array of objects by a specific property's value (alternate method 2).
   Solution:
   ```javascript
   function sortByObjectPropertyAlternate2(arr, property) {
     return arr.slice().sort((a, b) => a[property] - b[property]);
   }
   ```

**213. Finding Array Average (Alternate 4):**
   Problem: Calculate the average of elements in an array using a different method (alternate method 4).
   Solution:
   ```javascript
   function calculateAverageAlternate4(arr) {
     const sum = arr.reduce((total, num) => total + num, 0);
     return sum / arr.length;
   }
   ```

**214. Array Rotation to the Right (Alternate 4):**
   Problem: Rotate an array to the right by a specified number of positions (alternate method 4).
   Solution:
   ```javascript
   function rotateArrayRightAlternate4(arr, positions) {
     const n = arr.length;
     const rotated = new Array(n);
     for (let i = 0; i < n; i++) {
       rotated[(i + positions) % n] = arr[i];
     }
     return rotated;
   }
   ```

**215. Array Element Frequency (Alternate 5):**
   Problem: Count the frequency of each element in an array and return it as an object (alternate method 5).
   Solution:
   ```javascript
   function elementFrequencyAlternate5(arr) {
     const frequency = {};
     for (const item of arr) {
       frequency[item]

 = (frequency[item] || 0) + 1;
     }
     return frequency;
   }
   ```

**216. Finding Array Median (Alternate 5):**
   Problem: Find the median value of an array (alternate method 5).
   Solution:
   ```javascript
   function findMedianAlternate5(arr) {
     const sorted = [...arr].sort((a, b) => a - b);
     const middle = Math.floor(sorted.length / 2);
     return sorted.length % 2 === 0
       ? (sorted[middle - 1] + sorted[middle]) / 2
       : sorted[middle];
   }
   ```

**217. Array Chunking with Fill Value (Alternate):**
   Problem: Split an array into chunks of a specified size, and fill any gaps with a provided value (alternate method).
   Solution:
   ```javascript
   function chunkArrayWithFillValueAlternate(arr, size, fillValue) {
     const chunked = [];
     for (let i = 0; i < arr.length; i += size) {
       const chunk = arr.slice(i, i + size);
       while (chunk.length < size) {
         chunk.push(fillValue);
       }
       chunked.push(chunk);
     }
     return chunked;
   }
   ```

**218. Finding Maximum Occurrence Element (Alternate 3):**
   Problem: Find the element that occurs the most in an array (alternate method 3).
   Solution:
   ```javascript
   function findMaxOccurrenceElementAlternate3(arr) {
     const count = {};
     let maxCount = 0;
     let maxElement = arr[0];
     for (const num of arr) {
       count[num] = (count[num] || 0) + 1;
       if (count[num] >= maxCount) {
         maxCount = count[num];
         maxElement = num;
       }
     }
     return maxElement;
   }
   ```

**219. Array Intersection Count (Alternate 4):**
   Problem: Count the number of common elements between two arrays (alternate method 4).
   Solution:
   ```javascript
   function countCommonElementsAlternate4(arr1, arr2) {
     const set1 = new Set(arr1);
     const set2 = new Set(arr2);
     return [...set1].filter(item => set2.has(item)).length;
   }
   ```

**220. Array Sorting by Length (Alternate 2):**
   Problem: Sort an array of strings by their length in ascending order (alternate method 2).
   Solution:
   ```javascript
   function sortArrayByLengthAlternate2(arr) {
     return arr.slice().sort((a, b) => a.length - b.length);
   }
   ```

**221. Array Subtraction (Alternate 4):**
   Problem: Subtract one array from another, removing any common elements (alternate method 4).
   Solution:
   ```javascript
   function arraySubtractionAlternate4(arr1, arr2) {
     const set1 = new Set(arr1);
     const set2 = new Set(arr2);
     return [...arr1].filter(item => !set2.has(item));
   }
   ```

**222. Finding Array Average (Alternate 5):**
   Problem: Calculate the average of elements in an array using a different method (alternate method 5).
   Solution:
   ```javascript
   function calculateAverageAlternate5(arr) {
     const sum = arr.reduce((total, num) => total + num, 0);
     return sum / arr.length;
   }
   ```

**223. Array Rotation to the Right (Alternate 5):**
   Problem: Rotate an array to the right by a specified number of positions (alternate method 5).
   Solution:
   ```javascript
   function rotateArrayRightAlternate5(arr, positions) {
     const n = arr.length;
     const rotated = new Array(n);
     for (let i = 0; i < n; i++) {
       rotated[(i + positions) % n] = arr[i];
     }
     return rotated;
   }
   ```

**224. Array Element Frequency (Alternate 6):**
   Problem: Count the frequency of each element in an array and return it as an object (alternate method 6).
   Solution:
   ```javascript
   function elementFrequencyAlternate6(arr) {
     return arr.reduce((frequency, item) => {
       frequency[item] = (frequency[item] || 0) + 1;
       return frequency;
     }, {});
   }
   ```

**225. Finding Array Median (Alternate 6):**
   Problem: Find the median value of an array (alternate method 6).
   Solution:
   ```javascript
   function findMedianAlternate6(arr) {
     const sorted = [...arr].sort((a, b) => a - b);
     const middle = Math.floor(sorted.length / 2);
    

 return sorted.length % 2 === 0
       ? (sorted[middle - 1] + sorted[middle]) / 2
       : sorted[middle];
   }
   ```

**226. Array Intersection Count (Alternate 5):**
   Problem: Count the number of common elements between two arrays (alternate method 5).
   Solution:
   ```javascript
   function countCommonElementsAlternate5(arr1, arr2) {
     const set1 = new Set(arr1);
     const set2 = new Set(arr2);
     return [...set1].filter(item => set2.has(item)).length;
   }
   ```

**227. Array Chunking with Fill Value (Alternate 2):**
   Problem: Split an array into chunks of a specified size, and fill any gaps with a provided value (alternate method 2).
   Solution:
   ```javascript
   function chunkArrayWithFillValueAlternate2(arr, size, fillValue) {
     const chunked = [];
     for (let i = 0; i < arr.length; i += size) {
       const chunk = arr.slice(i, i + size);
       while (chunk.length < size) {
         chunk.push(fillValue);
       }
       chunked.push(chunk);
     }
     return chunked;
   }
   ```

**228. Array Sorting by Object Property (Alternate 3):**
   Problem: Sort an array of objects by a specific property's value (alternate method 3).
   Solution:
   ```javascript
   function sortByObjectPropertyAlternate3(arr, property) {
     return arr.slice().sort((a, b) => a[property] - b[property]);
   }
   ```

**229. Array Shuffling (Alternate 3):**
   Problem: Shuffle the elements of an array randomly (alternate method 3).
   Solution:
   ```javascript
   function shuffleArrayAlternate3(arr) {
     for (let i = arr.length - 1; i > 0; i--) {
       const j = Math.floor(Math.random() * (i + 1));
       [arr[i], arr[j]] = [arr[j], arr[i]];
     }
   }
   ```

**230. Finding Prime Numbers in Range (Alternate 3):**
   Problem: Generate an array of prime numbers within a specified range (alternate method 3).
   Solution:
   ```javascript
   function generatePrimeNumbersInRangeAlternate3(start, end) {
     const primes = [];
     for (let num = start; num <= end; num++) {
       if (isPrime(num)) {
         primes.push(num);
       }
     }
     return primes;
   }

   function isPrime(num) {
     if (num <= 1) return false;
     if (num <= 3) return true;
     if (num % 2 === 0 || num % 3 === 0) return false;
     let i = 5;
     while (i * i <= num) {
       if (num % i === 0 || num % (i + 2) === 0) return false;
       i += 6;
     }
     return true;
   }
   ```

**231. Array Reversal by Group:**
   Problem: Reverse an array in groups of a specified size.
   Solution:
   ```javascript
   function reverseArrayInGroups(arr, size) {
     const reversed = [];
     for (let i = 0; i < arr.length; i += size) {
       const group = arr.slice(i, i + size);
       reversed.push(...group.reverse());
     }
     return reversed;
   }
   ```

**232. Finding Array Median (Alternate 7):**
   Problem: Find the median value of an array (alternate method 7).
   Solution:
   ```javascript
   function findMedianAlternate7(arr) {
     const sorted = [...arr].sort((a, b) => a - b);
     const middle = Math.floor(sorted.length / 2);
     return sorted.length % 2 === 0
       ? (sorted[middle - 1] + sorted[middle]) / 2
       : sorted[middle];
   }
   ```

**233. Array Intersection Count (Alternate 6):**
   Problem: Count the number of common elements between two arrays (alternate method 6).
   Solution:
   ```javascript
   function countCommonElementsAlternate6(arr1, arr2) {
     const set1 = new Set(arr1);
     const set2 = new Set(arr2);
     return [...set1].filter(item => set2.has(item)).length;
   }
   ```

**234. Array Chunking with Fill Value (Alternate 3):**
   Problem: Split an array into chunks of a specified size, and fill any gaps with a provided value (alternate method 3).
   Solution:
   ```javascript
   function chunkArrayWithFillValueAlternate3(arr, size, fillValue) {
     const chunked = [];
     for (let i = 0; i < arr.length; i += size) {
       const chunk = arr.slice(i, i + size);
       while (chunk.length < size) {
         chunk.push(fillValue);
       }
       chunked.push(chunk);
     }
     return chunked;
   }
   ```

**235. Array Sorting by Object Property (Alternate 4):**
   Problem: Sort an array of objects by a specific property's value (alternate method 4).
   Solution:
   ```javascript
   function sortByObjectPropertyAlternate4(arr, property) {
     return arr.slice().sort((a, b) => a[property] - b[property]);
   }
   ```

**236. Array Shuffling (Alternate 4):**
   Problem: Shuffle the elements of an array randomly (alternate method 4).
   Solution:
   ```javascript
   function shuffleArrayAlternate4(arr) {
     for (let i = arr.length - 1; i > 0; i--) {
       const j = Math.floor(Math.random() * (i + 1));
       [arr[i], arr[j]] = [arr[j], arr[i]];
     }
   }
   ```

**237. Finding Prime Numbers in Range (Alternate 4):**
   Problem: Generate an array of prime numbers within a specified range (alternate method 4).
   Solution:
   ```javascript
   function generatePrimeNumbersInRangeAlternate4(start, end) {
     const primes = [];
     for (let num = start; num <= end; num++) {
       if (isPrime(num)) {
         primes.push(num);
       }
     }
     return primes;
   }

   function isPrime(num) {
     if (num <= 1) return false;
     if (num <= 3) return true;
     if (num % 2 === 0 || num % 3 === 0) return false;
     let i = 5;
     while (i * i <= num) {
       if (num % i === 0 || num % (i + 2) === 0) return false;
       i += 6;
     }
     return true;
   }
   ```

**238. Array Flattening (Alternate):**
   Problem: Flatten a nested array into a single-dimensional array (alternate method).
   Solution:
   ```javascript
   function flattenArrayAlternate(arr) {
     return arr.reduce((flat, item) => flat.concat(Array.isArray(item) ? flattenArrayAlternate(item) : item), []);
   }
   ```

**239. Finding Unique Elements in Two Sorted Arrays:**
   Problem: Find and return unique elements that exist in either of two sorted arrays but not in both.
   Solution:
   ```javascript
   function uniqueElementsInTwoSortedArrays(arr1, arr2) {
     const unique = [];
     let i = 0, j = 0;
     while (i < arr1.length && j < arr2.length) {
       if (arr1[i] < arr2[j]) {
         unique.push(arr1[i]);
         i++;
       } else if (arr1[i] > arr2[j]) {
         unique.push(arr2[j]);
         j++;
       } else {
         i++;
         j++;
       }
     }
     while (i < arr1.length) {
       unique.push(arr1[i]);
       i++;
     }
     while (j < arr2.length) {
       unique.push(arr2[j]);
       j++;
     }
     return unique;
   }
   ```

**240. Array Sorting by Length (Alternate 3):**
   Problem: Sort an array of strings by their length in descending order (alternate method 3).
   Solution:
   ```javascript
   function sort

ArrayByLengthDescendingAlternate3(arr) {
     return arr.slice().sort((a, b) => b.length - a.length);
   }
   ```

**241. Finding Array Maximum (Alternate 2):**
   Problem: Find the maximum value in an array (alternate method 2).
   Solution:
   ```javascript
   function findArrayMaximumAlternate2(arr) {
     return Math.max(...arr);
   }
   ```

**242. Array Element Frequency (Alternate 7):**
   Problem: Count the frequency of each element in an array and return it as an object (alternate method 7).
   Solution:
   ```javascript
   function elementFrequencyAlternate7(arr) {
     return arr.reduce((frequency, item) => {
       frequency[item] = (frequency[item] || 0) + 1;
       return frequency;
     }, {});
   }
   ```

**243. Array Rotation to the Left (Alternate 4):**
   Problem: Rotate an array to the left by a specified number of positions (alternate method 4).
   Solution:
   ```javascript
   function rotateArrayLeftAlternate4(arr, positions) {
     const n = arr.length;
     const rotated = new Array(n);
     for (let i = 0; i < n; i++) {
       rotated[(i - positions + n) % n] = arr[i];
     }
     return rotated;
   }
   ```

**244. Finding Array Mode (Alternate 4):**
   Problem: Find the mode (most frequently occurring element) in an array (alternate method 4).
   Solution:
   ```javascript
   function findArrayModeAlternate4(arr) {
     const count = {};
     let mode = arr[0];
     let maxCount = 1;
     for (const num of arr) {
       count[num] = (count[num] || 0) + 1;
       if (count[num] > maxCount) {
         mode = num;
         maxCount = count[num];
       }
     }
     return mode;
   }
   ```

**245. Array Chunking with Overlapping (Alternate 3):**
   Problem: Split an array into overlapping chunks of a specified size (alternate method 3).
   Solution:
   ```javascript
   function chunkArrayWithOverlappingAlternate3(arr, size, overlap) {
     const chunked = [];
     for (let i = 0; i < arr.length - size + 1; i += overlap) {
       chunked.push(arr.slice(i, i + size));
     }
     return chunked;
   }
   ```

**246. Finding Array Average (Alternate 6):**
   Problem: Calculate the average of elements in an array using a different method (alternate method 6).
   Solution:
   ```javascript
   function calculateAverageAlternate6(arr) {
     const sum = arr.reduce((total, num) => total + num, 0);
     return sum / arr.length;
   }
   ```

**247. Array Subtraction (Alternate 5):**
   Problem: Subtract one array from another, removing any common elements (alternate method 5).
   Solution:
   ```javascript
   function arraySubtractionAlternate5(arr1, arr2) {
     const set1 = new Set(arr1);
     const set2 = new Set(arr2);
     return [...arr1].filter(item => !set2.has(item));
   }
   ```

**248. Finding Array Median (Alternate 8):**
   Problem: Find the median value of an array (alternate method 8).
   Solution:
   ```javascript
   function findMedianAlternate8(arr) {
     const sorted = [...arr].sort((a, b) => a - b);
     const middle = Math.floor(sorted.length / 2);
     return sorted.length % 2 === 0
       ? (sorted[middle - 1] + sorted[middle]) / 2
       : sorted[middle];
   }
   ```

**249. Array Intersection Count (Alternate 7):**
   Problem: Count the number of common elements between two arrays (alternate method 7).
   Solution:
   ```javascript
   function countCommonElementsAlternate7(arr1, arr2) {
     const set1 = new Set(arr1);
     const set2 = new Set(arr2);
     return [...set1].filter(item => set2.has(item)).length;
   }
   ```

**250. Array Chunking with Fill Value (Alternate 4):**
   Problem: Split an array into chunks of a specified size, and fill any gaps with a provided value (alternate method 4).
   Solution:
   ```javascript
   function chunkArrayWithFillValueAlternate4(arr, size, fillValue) {
     const chunked = [];
     for (let i = 0; i < arr.length; i += size) {
       const chunk = arr.slice(i, i + size);
       while (chunk.length < size) {
         chunk.push(fillValue);
       }
       chunked.push(chunk);
     }
     return chunked;
   }
   ```
   
### JS Date : Date objects, Date formats, date get & set methods
---

**1. Problem: Create a Date object for the current date and time.**
   - Solution: 
     ```javascript
     const currentDate = new Date();
     console.log(currentDate);
     ```

**2. Problem: Get the current year from a Date object.**
   - Solution:
     ```javascript
     const currentDate = new Date();
     const currentYear = currentDate.getFullYear();
     console.log(currentYear);
     ```

**3. Problem: Format a date as "MM/DD/YYYY".**
   - Solution:
     ```javascript
     function formatDate(date) {
       const month = date.getMonth() + 1;
       const day = date.getDate();
       const year = date.getFullYear();
       return `${month}/${day}/${year}`;
     }
     const currentDate = new Date();
     console.log(formatDate(currentDate));
     ```

**4. Problem: Calculate the difference in days between two dates.**
   - Solution:
     ```javascript
     function dateDiffInDays(date1, date2) {
       const diffInMilliseconds = Math.abs(date1 - date2);
       return Math.floor(diffInMilliseconds / (1000 * 60 * 60 * 24));
     }
     const dateA = new Date('2023-09-01');
     const dateB = new Date('2023-09-15');
     console.log(dateDiffInDays(dateA, dateB));
     ```

**5. Problem: Get the current day of the week.**
   - Solution:
     ```javascript
     const daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
     const currentDate = new Date();
     const currentDayOfWeek = daysOfWeek[currentDate.getDay()];
     console.log(currentDayOfWeek);
     ```

**6. Problem: Create a Date object for a specific date.**
   - Solution:
     ```javascript
     const specificDate = new Date('2023-10-15');
     console.log(specificDate);
     ```

**7. Problem: Add a specific number of days to a date.**
   - Solution:
     ```javascript
     function addDaysToDate(date, days) {
       date.setDate(date.getDate() + days);
       return date;
     }
     const startDate = new Date('2023-09-15');
     const newDate = addDaysToDate(startDate, 7);
     console.log(newDate);
     ```

**8. Problem: Get the last day of the current month.**
   - Solution:
     ```javascript
     const currentDate = new Date();
     const lastDayOfMonth = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0);
     console.log(lastDayOfMonth.getDate());
     ```

**9. Problem: Check if a given year is a leap year.**
   - Solution:
     ```javascript
     function isLeapYear(year) {
       return (year % 4 === 0 && year % 100 !== 0) || (year % 400 === 0);
     }
     const yearToCheck = 2024;
     console.log(isLeapYear(yearToCheck));
     ```

**10. Problem: Get the current time in 12-hour format with AM/PM.**
    - Solution:
      ```javascript
      function getTimeIn12HourFormat() {
        const currentDate = new Date();
        const hours = currentDate.getHours();
        const minutes = currentDate.getMinutes();
        const amOrPm = hours >= 12 ? 'PM' : 'AM';
        const formattedHours = hours % 12 || 12; // Convert 0 to 12
        return `${formattedHours}:${minutes} ${amOrPm}`;
      }
      console.log(getTimeIn12HourFormat());
      ```

**11. Problem: Calculate the age of a person based on their birthdate.**
   - Solution:
     ```javascript
     function calculateAge(birthdate) {
       const today = new Date();
       const birthYear = birthdate.getFullYear();
       const currentYear = today.getFullYear();
       const age = currentYear - birthYear;
       return age;
     }
     const birthdate = new Date('1990-05-15');
     console.log(calculateAge(birthdate));
     ```

**12. Problem: Find the number of days in a given month of a specific year.**
   - Solution:
     ```javascript
     function daysInMonth(year, month) {
       return new Date(year, month + 1, 0).getDate();
     }
     const year = 2023;
     const month = 2; // March (0-based index)
     console.log(daysInMonth(year, month));
     ```

**13. Problem: Get the first day of a specific month.**
   - Solution:
     ```javascript
     function getFirstDayOfMonth(year, month) {
       return new Date(year, month, 1).getDay();
     }
     const year = 2023;
     const month = 8; // September (0-based index)
     console.log(getFirstDayOfMonth(year, month)); // 4 (Thursday)
     ```

**14. Problem: Determine if a date is in the future.**
   - Solution:
     ```javascript
     function isFutureDate(date) {
       const today = new Date();
       return date > today;
     }
     const futureDate = new Date('2024-12-31');
     console.log(isFutureDate(futureDate));
     ```

**15. Problem: Convert a date to a Unix timestamp.**
   - Solution:
     ```javascript
     function dateToUnixTimestamp(date) {
       return Math.floor(date.getTime() / 1000);
     }
     const currentDate = new Date();
     console.log(dateToUnixTimestamp(currentDate));
     ```

**16. Problem: Find the number of days between a specific date and today.**
   - Solution:
     ```javascript
     function daysUntilToday(targetDate) {
       const today = new Date();
       const diffInMilliseconds = targetDate - today;
       return Math.floor(diffInMilliseconds / (1000 * 60 * 60 * 24));
     }
     const targetDate = new Date('2023-12-31');
     console.log(daysUntilToday(targetDate));
     ```

**17. Problem: Determine if a year is within a specific range.**
   - Solution:
     ```javascript
     function isYearInRange(year, startYear, endYear) {
       return year >= startYear && year <= endYear;
     }
     const yearToCheck = 2023;
     const startYear = 2000;
     const endYear = 2050;
     console.log(isYearInRange(yearToCheck, startYear, endYear));
     ```

**18. Problem: Find the current quarter (Q1, Q2, Q3, Q4).**
   - Solution:
     ```javascript
     function getCurrentQuarter() {
       const currentDate = new Date();
       const currentMonth = currentDate.getMonth() + 1;
       return Math.ceil(currentMonth / 3);
     }
     console.log(`Current quarter: Q${getCurrentQuarter()}`);
     ```

**19. Problem: Check if a given date is a weekend (Saturday or Sunday).**
   - Solution:
     ```javascript
     function isWeekend(date) {
       const dayOfWeek = date.getDay();
       return dayOfWeek === 0 || dayOfWeek === 6;
     }
     const someDate = new Date('2023-09-23');
     console.log(isWeekend(someDate));
     ```

**20. Problem: Get the number of days remaining in the current month.**
   - Solution:
     ```javascript
     function daysRemainingInMonth() {
       const currentDate = new Date();
       const lastDayOfMonth = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0);
       const daysRemaining = lastDayOfMonth.getDate() - currentDate.getDate();
       return daysRemaining;
     }
     console.log(daysRemainingInMonth());
     ```


**1. Problem: Find the square root of a number.**
   - Solution:
     ```javascript
     const number = 16;
     const squareRoot = Math.sqrt(number);
     console.log(squareRoot);
     ```

**2. Problem: Round a number to the nearest integer.**
   - Solution:
     ```javascript
     const number = 3.7;
     const roundedNumber = Math.round(number);
     console.log(roundedNumber);
     ```

**3. Problem: Calculate the absolute value of a number.**
   - Solution:
     ```javascript
     const number = -5;
     const absoluteValue = Math.abs(number);
     console.log(absoluteValue);
     ```

**4. Problem: Generate a random integer between a given range.**
   - Solution:
     ```javascript
     function getRandomInt(min, max) {
       return Math.floor(Math.random() * (max - min + 1)) + min;
     }
     console.log(getRandomInt(1, 10));
     ```

**5. Problem: Calculate the power of a number.**
   - Solution:
     ```javascript
     const base = 2;
     const exponent = 3;
     const result = Math.pow(base, exponent);
     console.log(result);
     ```

**6. Problem: Calculate the factorial of a number.**
   - Solution:
     ```javascript
     function factorial(n) {
       if (n === 0) return 1;
       return n * factorial(n - 1);
     }
     console.log(factorial(5));
     ```

**7. Problem: Round down to the nearest integer.**
   - Solution:
     ```javascript
     const number = 7.9;
     const roundedDown = Math.floor(number);
     console.log(roundedDown);
     ```

**8. Problem: Round up to the nearest integer.**
   - Solution:
     ```javascript
     const number = 2.1;
     const roundedUp = Math.ceil(number);
     console.log(roundedUp);
     ```

**9. Problem: Find the minimum of two numbers.**
   - Solution:
     ```javascript
     const num1 = 5;
     const num2 = 3;
     const minNumber = Math.min(num1, num2);
     console.log(minNumber);
     ```

**10. Problem: Find the maximum of two numbers.**
    - Solution:
      ```javascript
      const num1 = 8;
      const num2 = 12;
      const maxNumber = Math.max(num1, num2);
      console.log(maxNumber);
      ```

**11. Problem: Calculate the sine of an angle in radians.**
    - Solution:
      ```javascript
      const angle = Math.PI / 4; // 45 degrees in radians
      const sineValue = Math.sin(angle);
      console.log(sineValue);
      ```

**12. Problem: Calculate the cosine of an angle in radians.**
    - Solution:
      ```javascript
      const angle = Math.PI / 3; // 60 degrees in radians
      const cosineValue = Math.cos(angle);
      console.log(cosineValue);
      ```

**13. Problem: Calculate the tangent of an angle in radians.**
    - Solution:
      ```javascript
      const angle = Math.PI / 6; // 30 degrees in radians
      const tangentValue = Math.tan(angle);
      console.log(tangentValue);
      ```

**14. Problem: Convert degrees to radians.**
    - Solution:
      ```javascript
      function degreesToRadians(degrees) {
        return (degrees * Math.PI) / 180;
      }
      console.log(degreesToRadians(90));
      ```

**15. Problem: Generate a random number between 0 and 1.**
    - Solution:
      ```javascript
      const randomNum = Math.random();
      console.log(randomNum);
      ```

**16. Problem: Calculate the natural logarithm (base e) of a number.**
    - Solution:
      ```javascript
      const number = 2.718; // Approximately e
      const logValue = Math.log(number);
      console.log(logValue);
      ```

**17. Problem: Calculate the base 10 logarithm of a number.**
    - Solution:
      ```javascript
      const number = 100;
      const log10Value = Math.log10(number);
      console.log(log10Value);
      ```

**18. Problem: Find the nearest integer less than or equal to a number.**
    - Solution:
      ```javascript
      const number = 5.8;
      const nearestInteger = Math.floor(number);
      console.log(nearestInteger);
      ```

**19. Problem: Find the nearest integer greater than or equal to a number.**
    - Solution:
      ```javascript
      const number = 3.2;
      const nearestInteger = Math.ceil(number);
      console.log(nearestInteger);
      ```

**20. Problem: Calculate the cube root of a number.**
    - Solution:
      ```javascript
      const number = 8;
      const cubeRoot = Math.cbrt(number);
      console.log(cubeRoot);
      ```

**21. Problem: Calculate the hypotenuse of a right triangle given two side lengths.**
    - Solution:
      ```javascript
      function calculateHypotenuse(a, b) {
        return Math.sqrt(a * a + b * b);
      }
      console.log(calculateHypotenuse(3, 4));
      ```

**22. Problem: Calculate the arc tangent of a number.**
    - Solution:
      ```javascript
      const number = 1;
      const arcTanValue = Math.atan(number);
      console.log(arcTanValue);
      ```

**23. Problem: Calculate the exponent (e^x) of a number.**
    - Solution:
      ```javascript
      const x = 2;
      const exponentValue = Math.exp(x);
      console.log(exponentValue);
      ```

**24. Problem: Find the greatest common divisor (GCD) of two numbers.**
    - Solution:
      ```javascript
      function gcd(a, b) {
        if (b === 0) return a;
        return gcd(b, a % b);
      }
      console.log(gcd(48, 18));
      ```

**25. Problem: Calculate the square of a number.**
    - Solution:
      ```javascript
      const number = 7;
      const square = Math.pow(number, 2);
      console.log(square);
      ```

**26. Problem: Calculate the cube of a number.**
    - Solution:
      ```javascript
      const number = 4;
      const cube = Math.pow(number, 3);
      console.log(cube);
      ```

**27. Problem: Calculate the remainder when dividing two numbers.**
    - Solution:
      ```javascript
      const dividend = 19;
      const divisor = 5;
      const remainder = dividend % divisor;
      console.log(remainder);
      ```

**28. Problem: Find the average of an array of numbers.**
    - Solution:
      ```javascript
     

 function calculateAverage(numbers) {
        const sum = numbers.reduce((acc, num) => acc + num, 0);
        return sum / numbers.length;
      }
      const numbers = [5, 10, 15, 20];
      console.log(calculateAverage(numbers));
      ```

**29. Problem: Calculate the standard deviation of an array of numbers.**
    - Solution:
      ```javascript
      function calculateStandardDeviation(numbers) {
        const mean = calculateAverage(numbers);
        const squaredDifferences = numbers.map((num) => Math.pow(num - mean, 2));
        const variance = calculateAverage(squaredDifferences);
        return Math.sqrt(variance);
      }
      const numbers = [4, 7, 10, 13];
      console.log(calculateStandardDeviation(numbers));
      ```

**30. Problem: Generate a random boolean value (true or false).**
    - Solution:
      ```javascript
      const randomBoolean = Math.random() < 0.5;
      console.log(randomBoolean);
      ```

**31. Problem: Calculate the sine of an angle in degrees.**
    - Solution:
      ```javascript
      function degreesToRadians(degrees) {
        return (degrees * Math.PI) / 180;
      }
      const angleInDegrees = 45;
      const angleInRadians = degreesToRadians(angleInDegrees);
      const sineValue = Math.sin(angleInRadians);
      console.log(sineValue);
      ```

**32. Problem: Calculate the cosine of an angle in degrees.**
    - Solution:
      ```javascript
      function degreesToRadians(degrees) {
        return (degrees * Math.PI) / 180;
      }
      const angleInDegrees = 60;
      const angleInRadians = degreesToRadians(angleInDegrees);
      const cosineValue = Math.cos(angleInRadians);
      console.log(cosineValue);
      ```

**33. Problem: Calculate the tangent of an angle in degrees.**
    - Solution:
      ```javascript
      function degreesToRadians(degrees) {
        return (degrees * Math.PI) / 180;
      }
      const angleInDegrees = 30;
      const angleInRadians = degreesToRadians(angleInDegrees);
      const tangentValue = Math.tan(angleInRadians);
      console.log(tangentValue);
      ```

**34. Problem: Calculate the arc sine of a number and convert it to degrees.**
    - Solution:
      ```javascript
      const number = 0.5;
      const arcSineValue = Math.asin(number);
      function radiansToDegrees(radians) {
        return (radians * 180) / Math.PI;
      }
      console.log(radiansToDegrees(arcSineValue));
      ```

**35. Problem: Calculate the arc cosine of a number and convert it to degrees.**
    - Solution:
      ```javascript
      const number = 0.866; // cos(30 degrees)
      const arcCosineValue = Math.acos(number);
      function radiansToDegrees(radians) {
        return (radians * 180) / Math.PI;
      }
      console.log(radiansToDegrees(arcCosineValue));
      ```

**36. Problem: Calculate the arc tangent of a number and convert it to degrees.**
    - Solution:
      ```javascript
      const number = 1;
      const arcTanValue = Math.atan(number);
      function radiansToDegrees(radians) {
        return (radians * 180) / Math.PI;
      }
      console.log(radiansToDegrees(arcTanValue));
      ```

**37. Problem: Calculate the hyperbolic sine of a number.**
    - Solution:
      ```javascript
      const number = 2;
      const hyperbolicSineValue = Math.sinh(number);
      console.log(hyperbolicSineValue);
      ```

**38. Problem: Calculate the hyperbolic cosine of a number.**
    - Solution:
      ```javascript
      const number = 2;
      const hyperbolicCosineValue = Math.cosh(number);
      console.log(hyperbolicCosineValue);
      ```

**39. Problem: Calculate the hyperbolic tangent of a number.**
    - Solution:
      ```javascript
      const number = 1;
      const hyperbolicTangentValue = Math.tanh(number);
      console.log(hyperbolicTangentValue);
      ```

**40. Problem: Calculate the base 2 logarithm (binary logarithm) of a number.**
    - Solution:
      ```javascript
      const number = 32;
      const log2Value = Math.log2(number);
      console.log(log2Value);
      ```

**41. Problem: Generate a random color in hexadecimal format (e.g., #RRGGBB).**
   - Solution:
     ```javascript
     function getRandomColor() {
       const letters = '0123456789ABCDEF';
       let color = '#';
       for (let i = 0; i < 6; i++) {
         color += letters[Math.floor(Math.random() * 16)];
       }
       return color;
     }
     console.log(getRandomColor());
     ```

**42. Problem: Generate a random RGB color (e.g., rgb(255, 100, 0)).**
   - Solution:
     ```javascript
     function getRandomRGBColor() {
       const r = Math.floor(Math.random() * 256);
       const g = Math.floor(Math.random() * 256);
       const b = Math.floor(Math.random() * 256);
       return `rgb(${r}, ${g}, ${b})`;
     }
     console.log(getRandomRGBColor());
     ```

**43. Problem: Generate a random boolean value with a given probability (e.g., 70% chance of true).**
   - Solution:
     ```javascript
     function randomBooleanWithProbability(probability) {
       return Math.random() < probability;
     }
     console.log(randomBooleanWithProbability(0.7)); // 70% chance of true
     ```

**44. Problem: Generate a random integer within a specific range, inclusive.**
   - Solution:
     ```javascript
     function getRandomIntInclusive(min, max) {
       min = Math.ceil(min);
       max = Math.floor(max);
       return Math.floor(Math.random() * (max - min + 1)) + min;
     }
     console.log(getRandomIntInclusive(1, 10)); // Random integer between 1 and 10 (inclusive)
     ```

**45. Problem: Generate a random item from an array.**
   - Solution:
     ```javascript
     function getRandomItemFromArray(arr) {
       const randomIndex = Math.floor(Math.random() * arr.length);
       return arr[randomIndex];
     }
     const fruits = ['apple', 'banana', 'orange', 'kiwi'];
     console.log(getRandomItemFromArray(fruits));
     ```

**46. Problem: Simulate a dice roll and return the result (1 to 6).**
   - Solution:
     ```javascript
     function rollDice() {
       return Math.floor(Math.random() * 6) + 1;
     }
     console.log(rollDice());
     ```

**47. Problem: Generate a random time within a specified time range.**
   - Solution:
     ```javascript
     function getRandomTime(startTime, endTime) {
       const startTimestamp = startTime.getTime();
       const endTimestamp = endTime.getTime();
       const randomTimestamp = Math.random() * (endTimestamp - startTimestamp) + startTimestamp;
       return new Date(randomTimestamp);
     }
     const startDate = new Date('2023-01-01');
     const endDate = new Date('2023-12-31');
     console.log(getRandomTime(startDate, endDate));
     ```

**48. Problem: Shuffle an array randomly.**
   - Solution:
     ```javascript
     function shuffleArray(array) {
       for (let i = array.length - 1; i > 0; i--) {
         const j = Math.floor(Math.random() * (i + 1));
         [array[i], array[j]] = [array[j], array[i]];
       }
       return array;
     }
     const numbers = [1, 2, 3, 4, 5];
     console.log(shuffleArray(numbers));
     ```

**49. Problem: Generate a random UUID (Universally Unique Identifier).**
   - Solution:
     ```javascript
     function generateUUID() {
       return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function (c) {
         const r = Math.random() * 16 | 0;
         const v = c === 'x' ? r : (r & 0x3 | 0x8);
         return v.toString(16);
       });
     }
     console.log(generateUUID());
     ```

**50. Problem: Generate a random password with a specified length and character set.**
   - Solution:
     ```javascript
     function generateRandomPassword(length) {
       const charset = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
       let password = '';
       for (let i = 0; i < length; i++) {
         const randomIndex = Math.floor(Math.random() * charset.length);
         password += charset[randomIndex];
       }
       return password;
     }
     console.log(generateRandomPassword(8)); // Generates an 8-character password
     ```

**51. Problem: Generate a random number between 0 and 1.**
   - Solution:
     ```javascript
     const randomNum = Math.random();
     console.log(randomNum);
     ```

**52. Problem: Generate a random number between 1 and 10.**
   - Solution:
     ```javascript
     const randomNum = Math.floor(Math.random() * 10) + 1;
     console.log(randomNum);
     ```

**53. Problem: Generate a random integer between 0 and 100.**
   - Solution:
     ```javascript
     const randomInt = Math.floor(Math.random() * 101);
     console.log(randomInt);
     ```

**54. Problem: Generate a random boolean value (true or false).**
   - Solution:
     ```javascript
     const randomBoolean = Math.random() < 0.5;
     console.log(randomBoolean);
     ```

**55. Problem: Simulate a coin toss (heads or tails).**
   - Solution:
     ```javascript
     const coinToss = Math.random() < 0.5 ? 'Heads' : 'Tails';
     console.log(coinToss);
     ```

**56. Problem: Roll a fair six-sided die (generate a random number from 1 to 6).**
   - Solution:
     ```javascript
     const dieRoll = Math.floor(Math.random() * 6) + 1;
     console.log(dieRoll);
     ```

**57. Problem: Generate a random index for selecting an item from an array.**
   - Solution:
     ```javascript
     const items = ['apple', 'banana', 'cherry', 'date'];
     const randomIndex = Math.floor(Math.random() * items.length);
     console.log(items[randomIndex]);
     ```

**58. Problem: Create a random RGB color.**
   - Solution:
     ```javascript
     function getRandomRGBColor() {
       const r = Math.floor(Math.random() * 256);
       const g = Math.floor(Math.random() * 256);
       const b = Math.floor(Math.random() * 256);
       return `rgb(${r}, ${g}, ${b})`;
     }
     console.log(getRandomRGBColor());
     ```

**59. Problem: Simulate a 20% chance event.**
   - Solution:
     ```javascript
     const eventOccurred = Math.random() < 0.2;
     console.log(eventOccurred);
     ```

**60. Problem: Generate a random year between 2000 and 2022.**
   - Solution:
     ```javascript
     const randomYear = Math.floor(Math.random() * 23) + 2000;
     console.log(randomYear);
     ```
### JS Boolean & comparison : all typea of boolean & various comparisons
---


**1. Problem: Check if a variable is a boolean.**
   - Solution:
     ```javascript
     const value = true;
     const isBoolean = typeof value === 'boolean';
     console.log(isBoolean);
     ```

**2. Problem: Check if a number is even.**
   - Solution:
     ```javascript
     const number = 8;
     const isEven = number % 2 === 0;
     console.log(isEven);
     ```

**3. Problem: Check if a number is positive.**
   - Solution:
     ```javascript
     const number = 5;
     const isPositive = number > 0;
     console.log(isPositive);
     ```

**4. Problem: Check if a string is empty.**
   - Solution:
     ```javascript
     const text = '';
     const isEmpty = text.length === 0;
     console.log(isEmpty);
     ```

**5. Problem: Check if an array is not empty.**
   - Solution:
     ```javascript
     const array = [1, 2, 3];
     const isNotEmpty = array.length > 0;
     console.log(isNotEmpty);
     ```

**6. Problem: Check if a string contains a specific substring.**
   - Solution:
     ```javascript
     const text = 'Hello, World!';
     const containsSubstring = text.includes('World');
     console.log(containsSubstring);
     ```

**7. Problem: Check if a number is within a specified range.**
   - Solution:
     ```javascript
     const number = 15;
     const min = 10;
     const max = 20;
     const isInRange = number >= min && number <= max;
     console.log(isInRange);
     ```

**8. Problem: Check if two strings are equal (case-sensitive).**
   - Solution:
     ```javascript
     const str1 = 'Hello';
     const str2 = 'hello';
     const areEqual = str1 === str2;
     console.log(areEqual);
     ```

**9. Problem: Check if two strings are equal (case-insensitive).**
   - Solution:
     ```javascript
     const str1 = 'Hello';
     const str2 = 'hello';
     const areEqual = str1.toLowerCase() === str2.toLowerCase();
     console.log(areEqual);
     ```

**10. Problem: Check if an object has a specific property.**
    - Solution:
      ```javascript
      const person = { name: 'John', age: 30 };
      const hasProperty = 'age' in person;
      console.log(hasProperty);
      ```

**11. Problem: Check if a value is null or undefined.**
    - Solution:
      ```javascript
      const value = null;
      const isNullOrUndefined = value === null || value === undefined;
      console.log(isNullOrUndefined);
      ```

**12. Problem: Check if a value is truthy.**
    - Solution:
      ```javascript
      const value = 'Hello';
      const isTruthy = !!value; // Using double negation
      console.log(isTruthy);
      ```

**13. Problem: Check if a value is falsy.**
    - Solution:
      ```javascript
      const value = 0;
      const isFalsy = !value; // Using negation
      console.log(isFalsy);
      ```

**14. Problem: Check if a number is a multiple of another number.**
    - Solution:
      ```javascript
      const number = 12;
      const multipleOf = 3;
      const isMultiple = number % multipleOf === 0;
      console.log(isMultiple);
      ```

**15. Problem: Check if a string starts with a specific prefix.**
    - Solution:
      ```javascript
      const text = 'Hello, World!';
      const startsWithPrefix = text.startsWith('Hello');
      console.log(startsWithPrefix);
      ```

**16. Problem: Check if a string ends with a specific suffix.**
    - Solution:
      ```javascript
      const text = 'Hello, World!';
      const endsWithSuffix = text.endsWith('World!');
      console.log(endsWithSuffix);
      ```

**17. Problem: Check if an array contains a specific element.**
    - Solution:
      ```javascript
      const array = [1, 2, 3, 4, 5];
      const containsElement = array.includes(3);
      console.log(containsElement);
      ```

**18. Problem: Check if a date is in the future.**
    - Solution:
      ```javascript
      const futureDate = new Date('2024-12-31');
      const currentDate = new Date();
      const isInFuture = futureDate > currentDate;
      console.log(isInFuture);
      ```

**19. Problem: Check if a date is today.**
    - Solution:
      ```javascript
      const dateToCheck = new Date('2023-09-22');
      const today = new Date();
      const isToday = dateToCheck.toDateString() === today.toDateString();
      console.log(isToday);
      ```

**20. Problem: Check if a number is not equal to another number.**
    - Solution:
      ```javascript
      const num1 = 5;
      const num2 = 7;
      const notEqual = num1 !== num2;
      console.log(notEqual);
      ```

### JS sets and maps
---


**1. Problem: Remove duplicates from an array using a Set.**
   - Solution:
     ```javascript
     const array = [1, 2, 2, 3, 4, 4, 5];
     const uniqueArray = [...new Set(array)];
     console.log(uniqueArray);
     ```

**2. Problem: Check if an array contains duplicate elements using a Set.**
   - Solution:
     ```javascript
     function hasDuplicates(array) {
       return new Set(array).size !== array.length;
     }
     const array1 = [1, 2, 3, 4, 5];
     const array2 = [1, 2, 2, 3, 4];
     console.log(hasDuplicates(array1)); // false
     console.log(hasDuplicates(array2)); // true
     ```

**3. Problem: Count the frequency of elements in an array using a Map.**
   - Solution:
     ```javascript
     function countFrequency(array) {
       const frequencyMap = new Map();
       array.forEach((item) => {
         frequencyMap.set(item, (frequencyMap.get(item) || 0) + 1);
       });
       return frequencyMap;
     }
     const array = [1, 2, 2, 3, 4, 4, 5];
     console.log(countFrequency(array));
     ```

**4. Problem: Implement a simple cache using a Map with a maximum size.**
   - Solution:
     ```javascript
     class Cache {
       constructor(maxSize) {
         this.maxSize = maxSize;
         this.cache = new Map();
       }
     
       set(key, value) {
         if (this.cache.size >= this.maxSize) {
           const oldestKey = this.cache.keys().next().value;
           this.cache.delete(oldestKey);
         }
         this.cache.set(key, value);
       }
     
       get(key) {
         return this.cache.get(key);
       }
     }
     
     const cache = new Cache(3);
     cache.set('a', 1);
     cache.set('b', 2);
     cache.set('c', 3);
     cache.set('d', 4); // 'a' will be evicted
     console.log(cache.get('a')); // undefined
     ```

**5. Problem: Find the intersection of two arrays using Sets.**
   - Solution:
     ```javascript
     function findIntersection(arr1, arr2) {
       const set1 = new Set(arr1);
       const set2 = new Set(arr2);
       return [...set1].filter((item) => set2.has(item));
     }
     const array1 = [1, 2, 3, 4, 5];
     const array2 = [3, 4, 5, 6, 7];
     console.log(findIntersection(array1, array2));
     ```

**6. Problem: Group objects by a common property using a Map.**
   - Solution:
     ```javascript
     const people = [
       { id: 1, name: 'Alice' },
       { id: 2, name: 'Bob' },
       { id: 3, name: 'Alice' },
     ];
     
     function groupByName(people) {
       const groupMap = new Map();
       people.forEach((person) => {
         const name = person.name;
         if (!groupMap.has(name)) {
           groupMap.set(name, []);
         }
         groupMap.get(name).push(person);
       });
       return groupMap;
     }
     
     console.log(groupByName(people));
     ```

**7. Problem: Determine if two strings are anagrams using Sets.**
   - Solution:
     ```javascript
     function areAnagrams(str1, str2) {
       const set1 = new Set(str1);
       const set2 = new Set(str2);
       if (set1.size !== set2.size) {
         return false;
       }
       for (const char of set1) {
         if (str1.split(char).length !== str2.split(char).length) {
           return false;
         }
       }
       return true;
     }
     const string1 = 'listen';
     const string2 = 'silent';
     console.log(areAnagrams(string1, string2));
     ```

**8. Problem: Calculate the union of multiple sets.**
   - Solution:
     ```javascript
     function unionSets(...sets) {
       return new Set([...sets].flatMap((set) => [...set]));
     }
     const set1 = new Set([1, 2, 3]);
     const set2 = new Set([3, 4, 5]);
     const set3 = new Set([5, 6, 7]);
     console.log(unionSets(set1, set2, set3));
     ```

**9. Problem: Find the difference between two sets.**
   - Solution:
     ```javascript
     function differenceSets(set1, set2) {
       return new Set([...set1].filter((item) => !set2.has(item)));
     }
     const setA = new Set([1, 2, 3, 4]);
     const setB = new Set([3, 4, 5, 6]);
     console.log(differenceSets(setA, setB));
     ```

**10. Problem: Check if one set is a subset of another.**
    - Solution:
      ```javascript
      function isSubset(subset, superset) {
        for (const item of subset) {
          if (!superset.has(item)) {
            return false;
          }
        }
        return true;
      }
      const set1 = new Set([1, 2]);
      const set2 = new Set([1, 2, 3, 4]);
      console.log(isSubset(set1, set2));
      ```

### JS 'typeof' & type conversion & coercion 
---

```javascript
// Problem 1: Check the type of a variable.
const variable1 = 42;
console.log(typeof variable1);

// Problem 2: Type conversion from string to number.
const numString = '42';
const num = Number(numString);
console.log(num);

// Problem 3: Type conversion from number to string.
const number = 42;
const str = String(number);
console.log(str);

// Problem 4: Type conversion from boolean to number.
const bool = true;
const numFromBool = Number(bool);
console.log(numFromBool);

// Problem 5: Type conversion from number to boolean.
const num2 = 0;
const boolFromNum = Boolean(num2);
console.log(boolFromNum);

// Problem 6: Type coercion in a mathematical operation.
const strNum = '5';
const result1 = strNum * 2;
console.log(result1);

// Problem 7: Type coercion in string concatenation.
const str2 = 'Hello';
const num3 = 42;
const result2 = str2 + num3;
console.log(result2);

// Problem 8: Type coercion with loose equality.
const value1 = '5';
const value2 = 5;
console.log(value1 == value2);

// Problem 9: Type coercion with strict equality.
const value3 = '5';
const value4 = 5;
console.log(value3 === value4);

// Problem 10: Check if a variable is undefined.
const variable2 = undefined;
console.log(typeof variable2 === 'undefined');

// Problem 11: Check if a variable is null.
const variable3 = null;
console.log(variable3 === null);

// Problem 12: Type conversion from an array to a string.
const array = [1, 2, 3];
const arrayAsString = array.toString();
console.log(arrayAsString);

// Problem 13: Type conversion from a string to a boolean.
const str3 = 'true';
const boolFromString = Boolean(str3);
console.log(boolFromString);

// Problem 14: Type conversion from an object to a number.
const obj = { value: 42 };
const numFromObj = Number(obj);
console.log(numFromObj);

// Problem 15: Type conversion from a boolean to a string.
const bool2 = false;
const strFromBool = String(bool2);
console.log(strFromBool);

// Problem 16: Type coercion with addition.
const num4 = 5;
const str4 = '2';
const result3 = num4 + str4;
console.log(result3);

// Problem 17: Type coercion with subtraction.
const num5 = 10;
const str5 = '5';
const result4 = num5 - str5;
console.log(result4);

// Problem 18: Type coercion with equality and logical operators.
const num6 = 0;
const str6 = '0';
console.log(num6 == str6 && num6 === str6);

// Problem 19: Check if a variable is an array.
const variable4 = [1, 2, 3];
console.log(Array.isArray(variable4));

// Problem 20: Check if a variable is a function.
const variable5 = function () {};
console.log(typeof variable5 === 'function');
```

### JS bitwise, Regexp,  and Precedence
---



**1. Problem: Use bitwise AND to check if a number is even.**
   - Solution:
     ```javascript
     const number = 6;
     const isEven = (number & 1) === 0;
     console.log(isEven);
     ```

**2. Problem: Use bitwise OR to set specific bits in a number.**
   - Solution:
     ```javascript
     let number = 5; // Binary: 0101
     const mask = 2; // Binary: 0010
     number |= mask; // Set the second bit
     console.log(number); // Result: 7 (Binary: 0111)
     ```

**3. Problem: Use bitwise XOR to toggle specific bits in a number.**
   - Solution:
     ```javascript
     let number = 10; // Binary: 1010
     const toggleMask = 5; // Binary: 0101
     number ^= toggleMask; // Toggle the 2nd and 0th bits
     console.log(number); // Result: 15 (Binary: 1111)
     ```

**4. Problem: Use bitwise NOT to invert the bits of a number.**
   - Solution:
     ```javascript
     let number = 5; // Binary: 0101
     const inverted = ~number; // Invert the bits
     console.log(inverted); // Result: -6
     ```

**5. Problem: Use a regular expression to validate an email address.**
   - Solution:
     ```javascript
     const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
     const email = 'user@example.com';
     const isValid = emailRegex.test(email);
     console.log(isValid);
     ```

**6. Problem: Use regular expressions to extract phone numbers from a text.**
   - Solution:
     ```javascript
     const text = 'Call me at 123-456-7890 or 987-654-3210.';
     const phoneRegex = /\d{3}-\d{3}-\d{4}/g;
     const phoneNumbers = text.match(phoneRegex);
     console.log(phoneNumbers);
     ```

**7. Problem: Use regular expressions to replace words in a text.**
   - Solution:
     ```javascript
     const text = 'Replace all the apples with oranges.';
     const newText = text.replace(/apples/g, 'oranges');
     console.log(newText);
     ```

**8. Problem: Understand operator precedence with logical AND and OR.**
   - Solution:
     ```javascript
     const a = true, b = false, c = true;
     const result = a || b && c; // What is the result?
     console.log(result); // Result: true (AND has higher precedence)
     ```

**9. Problem: Use parentheses to control operator precedence.**
   - Solution:
     ```javascript
     const a = true, b = false, c = true;
     const result = (a || b) && c; // Use parentheses to clarify
     console.log(result); // Result: true (OR has lower precedence)
     ```

**10. Problem: Use bitwise shift to perform integer division and multiplication.**
    - Solution:
      ```javascript
      const number = 16;
      const dividedBy2 = number >> 1; // Integer division by 2
      const multipliedBy2 = number << 1; // Integer multiplication by 2
      console.log(dividedBy2, multipliedBy2);
      ```


### JS Boolean & comparison : Errors, Scope & Hoisting
---

**1. Problem: Identify the scope of a variable and handle reference errors.**
   - Solution:
     ```javascript
     function checkScope() {
       if (true) {
         let innerVar = 'Inside if';
       }
       console.log(innerVar); // ReferenceError: innerVar is not defined
     }
     checkScope();
     ```

**2. Problem: Explain variable hoisting and avoid unexpected behavior.**
   - Solution:
     ```javascript
     function hoistingExample() {
       console.log(myVar); // undefined
       var myVar = 'I am hoisted!';
     }
     hoistingExample();
     ```

**3. Problem: Identify and handle type errors when using incorrect data types.**
   - Solution:
     ```javascript
     function typeErrorExample() {
       let num = '42';
       let result = num + 5; // This will result in a string
       console.log(result);
     }
     typeErrorExample();
     ```

**4. Problem: Scope variables to avoid global scope pollution.**
   - Solution:
     ```javascript
     function avoidGlobalScope() {
       var globalVar = 'I am global';
       console.log(globalVar);
     }
     avoidGlobalScope();
     console.log(globalVar); // ReferenceError: globalVar is not defined
     ```

**5. Problem: Explain the difference between `var`, `let`, and `const` regarding scope and reassignment.**
   - Solution:
     ```javascript
     function scopeExample() {
       var x = 1;
       if (true) {
         let y = 2;
         const z = 3;
         x = 4; // This reassigns the outer variable
       }
       console.log(x); // 4
       console.log(y); // ReferenceError: y is not defined
       console.log(z); // ReferenceError: z is not defined
     }
     scopeExample();
     ```

**6. Problem: Understand the behavior of `this` in different contexts and avoid `this` errors.**
   - Solution:
     ```javascript
     const person = {
       name: 'Alice',
       greet: function () {
         console.log('Hello, ' + this.name);
       },
     };
     const greetFunc = person.greet;
     greetFunc(); // This will result in an error
     ```

**7. Problem: Explain the concept of closures and use them to encapsulate data.**
   - Solution:
     ```javascript
     function createCounter() {
       let count = 0;
       return function () {
         return ++count;
       };
     }
     const counter = createCounter();
     console.log(counter()); // 1
     console.log(counter()); // 2
     ```

**8. Problem: Handle try-catch blocks to gracefully handle errors.**
   - Solution:
     ```javascript
     try {
       // Code that might throw an error
       throw new Error('An error occurred.');
     } catch (error) {
       console.log('Error: ' + error.message);
     }
     ```

**9. Problem: Explain the concept of the "Temporal Dead Zone" and avoid issues with variable access.**
   - Solution:
     ```javascript
     function temporalDeadZoneExample() {
       console.log(x); // ReferenceError: Cannot access 'x' before initialization
       let x = 42;
     }
     temporalDeadZoneExample();
     ```

**10. Problem: Explain variable shadowing and its implications on scope.**
    - Solution:
      ```javascript
      const x = 'Global X';
      function shadowingExample() {
        const x = 'Local X';
        console.log(x); // Local X
      }
      shadowingExample();
      console.log(x); // Global X
      ```

### Strick mode, this keyword,  and arrow functions
---

**1. Problem: Explain what strict mode is and enable it in a function.**
   - Solution:
     ```javascript
     'use strict';
     function strictModeExample() {
       // Strict mode enabled here
       // ...
     }
     ```

**2. Problem: Describe the differences between strict mode and non-strict mode.**
   - Solution:
     Strict mode helps catch common coding mistakes and "unsafe" actions. For example, it disallows the use of undeclared variables and prohibits assignments to non-writable properties.

**3. Problem: Explain how the `this` keyword works in the context of an object method.**
   - Solution:
     ```javascript
     const person = {
       name: 'Alice',
       greet: function () {
         console.log('Hello, ' + this.name);
       },
     };
     person.greet(); // Outputs: Hello, Alice
     ```

**4. Problem: Demonstrate the behavior of `this` when used in a nested function.**
   - Solution:
     ```javascript
     const obj = {
       name: 'Alice',
       greet: function () {
         function innerFunction() {
           console.log('Hello, ' + this.name);
         }
         innerFunction(); // Outputs: Hello, undefined
       },
     };
     obj.greet();
     ```

**5. Problem: Use the `bind` method to set the value of `this` in a function.**
   - Solution:
     ```javascript
     const obj = {
       name: 'Alice',
       greet: function () {
         function innerFunction() {
           console.log('Hello, ' + this.name);
         }
         const boundFunction = innerFunction.bind(this);
         boundFunction(); // Outputs: Hello, Alice
       },
     };
     obj.greet();
     ```

**6. Problem: Explain the concept of lexical scoping in arrow functions.**
   - Solution:
     Arrow functions inherit the `this` value from their enclosing lexical context (i.e., the context in which they are defined).

**7. Problem: Compare the behavior of `this` in regular functions and arrow functions.**
   - Solution:
     ```javascript
     const obj = {
       name: 'Alice',
       greetRegular: function () {
         setTimeout(function () {
           console.log('Regular: Hello, ' + this.name); // Outputs: Regular: Hello, undefined
         }, 1000);
       },
       greetArrow: function () {
         setTimeout(() => {
           console.log('Arrow: Hello, ' + this.name); // Outputs: Arrow: Hello, Alice
         }, 1000);
       },
     };
     obj.greetRegular();
     obj.greetArrow();
     ```

**8. Problem: Describe the benefits of using arrow functions for concise syntax.**
   - Solution:
     Arrow functions are concise and maintain the lexical scope of `this`, making them suitable for shorter, clearer code.

**9. Problem: Explain when to use arrow functions and when not to use them.**
   - Solution:
     Arrow functions are great for non-method functions and situations where you want to maintain the enclosing context (`this`). However, avoid using them for methods within objects or constructors that need their own `this`.

**10. Problem: Demonstrate how to use arrow functions to refactor code.**
    - Solution:
      ```javascript
      // Before refactoring
      const numbers = [1, 2, 3];
      const doubledNumbers = numbers.map(function (num) {
        return num * 2;
      });

      // After refactoring with arrow function
      const doubledNumbers = numbers.map((num) => num * 2);
      ```

**11. Problem: Explain the purpose of arrow functions in callback functions.**
    - Solution:
      Arrow functions are commonly used in callback functions to maintain the outer context (`this`) and reduce code verbosity.

**12. Problem: Describe the behavior of arrow functions in terms of the `arguments` object.**
    - Solution:
      Arrow functions do not have their own `arguments` object. They inherit the `arguments` object from the containing function.

**13. Problem: Use arrow functions in array methods like `map`, `filter`, and `reduce`.**
    - Solution:
      ```javascript
      const numbers = [1, 2, 3, 4, 5];
      const squaredNumbers = numbers.map((num) => num * num);
      const evenNumbers = numbers.filter((num) => num % 2 === 0);
      const sum = numbers.reduce((acc, num) => acc + num, 0);
      ```

**14. Problem: Explain how to define default function parameters.**
    - Solution:
      ```javascript
      function greet(name = 'Guest') {
        console.log('Hello, ' + name);
      }
      greet(); // Outputs: Hello, Guest
      ```

**15. Problem: Describe the differences between arrow functions and function expressions.**
    - Solution:
      Arrow functions do not have their own `this`, `arguments`, or `super`. They cannot be used as constructors or with the `new` keyword.

**16. Problem: Explain how to use rest parameters in function definitions.**
    - Solution:
      ```javascript
      function sum(...numbers) {
        return numbers.reduce((acc, num) => acc + num, 0);
      }
      console.log(sum(1, 2, 3)); // Outputs: 6
      ```

**17. Problem: Demonstrate the use of the `call` and `apply` methods to set the value of `this` in a function.**
    - Solution:
      ```javascript
      function greet() {
        console.log('Hello, ' + this.name);
      }
      const person = { name: 'Alice' };
      greet.call(person); // Outputs: Hello, Alice
      greet.apply(person); // Outputs: Hello, Alice
      ```

**18. Problem: Describe the advantages of arrow functions in avoiding binding issues.**


    - Solution:
      Arrow functions automatically capture the `this` value from the surrounding lexical context, making them immune to binding issues.

**19. Problem: Explain how to use the `new.target` property in constructors.**
    - Solution:
      ```javascript
      function MyClass() {
        if (!new.target) {
          throw new Error('Class must be instantiated with new keyword.');
        }
        // Constructor logic here
      }
      const instance = new MyClass();
      ```

**20. Problem: Discuss common pitfalls when using arrow functions and best practices.**
    - Solution:
      Pitfalls include overusing arrow functions for methods and not considering their context. Best practices involve using them for short, concise functions and avoiding them for methods and constructors.


### JS Modules, style guide, Json,  and Debugging
---

#### problem 1: Import a Module

**Solution:**
```javascript
import { greet } from './greetings.js';

const message = greet('Alice');
console.log(message); // Outputs: Hello, Alice!
```

#### problem 2: Export a Function from a Module

**Solution:**
```javascript
// greetings.js
export function greet(name) {
  return `Hello, ${name}!`;
}
```

#### problem 3: Use Default Exports in Modules

**Solution:**
```javascript
// utils.js
export default function add(a, b) {
  return a + b;
}

// main.js
import add from './utils.js';

const sum = add(5, 3);
console.log(sum); // Outputs: 8
```

#### problem 4: Follow a JavaScript Style Guide

**Solution:**
Follow a widely accepted style guide like Airbnb's JavaScript Style Guide for consistent code formatting and best practices.

#### problem 5: Validate JSON Data

**Solution:**
```javascript
try {
  const jsonData = JSON.parse('{"name": "Alice", "age": 30}');
  console.log(jsonData.name); // Outputs: Alice
} catch (error) {
  console.error('Invalid JSON:', error.message);
}
```

#### problem 6: Serialize JavaScript Objects to JSON

**Solution:**
```javascript
const person = { name: 'Bob', age: 25 };
const jsonPerson = JSON.stringify(person);
console.log(jsonPerson); // Outputs: {"name":"Bob","age":25}
```

#### problem 7: Deserialize JSON to JavaScript Object

**Solution:**
```javascript
const jsonText = '{"name": "Charlie", "age": 35}';
const person = JSON.parse(jsonText);
console.log(person.name); // Outputs: Charlie
```

#### problem 8: Handle JSON Parsing Errors

**Solution:**
```javascript
try {
  const jsonData = JSON.parse('invalid JSON');
  console.log(jsonData);
} catch (error) {
  console.error('Error parsing JSON:', error.message);
}
```

#### problem 9: Use Debugger to Set Breakpoints

**Solution:**
```javascript
function calculateSum(a, b) {
  debugger; // Set a breakpoint here
  return a + b;
}

const result = calculateSum(5, 3);
console.log(result);
```

#### problem 10: Inspect Variables with Debugger

**Solution:**
```javascript
function calculateSum(a, b) {
  debugger;
  const sum = a + b;
  return sum;
}

const result = calculateSum(5, 3);
console.log(result); // Debugger will pause here to inspect variables
```

#### problem 11: Step Through Code with Debugger

**Solution:**
Use debugger commands (step over, step into, step out) to navigate through your code during debugging.

#### problem 12: Print Debugging Messages

**Solution:**
```javascript
function calculateSum(a, b) {
  console.log(`Calculating sum of ${a} and ${b}`);
  return a + b;
}

const result = calculateSum(5, 3);
console.log(result);
```

#### problem 13: Utilize Console Logging for Debugging

**Solution:**
Use `console.log()` statements to print variable values and debug information during development.

#### problem 14: Detect and Fix Syntax Errors

**Solution:**
```javascript
function calculateProduct(a, b) {
  return a * b; // Syntax error: missing semicolon
}

const result = calculateProduct(5, 3);
console.log(result);
```

#### problem 15: Detect and Fix Runtime Errors

**Solution:**
```javascript
function divide(a, b) {
  if (b === 0) {
    throw new Error('Division by zero');
  }
  return a / b;
}

try {
  const result = divide(5, 0);
  console.log(result);
} catch (error) {
  console.error('Error:', error.message);
}
```

#### problem 16: Use a Linter for Code Quality

**Solution:**
Integrate a linter like ESLint into your development environment to catch code quality issues and enforce coding standards.

#### problem 17: Configure ESLint with a Style Guide

**Solution:**
```javascript
// .eslintrc.js
module.exports = {
  extends: 'eslint-config-airbnb-base',
  rules: {
    // Customize rules here
  },
};
```

#### problem 18: Format Code with Prettier

**Solution:**
Integrate Prettier into your development workflow to automatically format code according to your style guide.

#### problem 19: Detect and Fix Logical Errors

**Solution:**
```javascript
function factorial(n) {
  if (n === 0) {
    return 1;
  }
  return n * factorial(n - 1);
}

const result = factorial(5); // Should be 120, not 125
console.log(result);
```

#### problem 20: Use a Comprehensive Development Environment

**Solution:**
Set up a development environment with tools like version control (e.g., Git), a code editor or IDE, and debugging tools to enhance your productivity and code quality.


## JS OBJECTS 
---


### definition, properties, methods, display, accessors, and constructors, prototype,iterables
---
JavaScript objects are a fundamental data type in the language that allow you to store and organize data as key-value pairs. Objects are used to represent complex data structures and can include properties and methods.

1. **Definition of Objects:**
   - JavaScript objects are data structures that store collections of key-value pairs, representing entities or concepts in code.

2. **Properties:**
   - Properties are variables contained within objects that store data.
   
   ```javascript
   var person = {
       firstName: "John",
       lastName: "Doe"
   };
   console.log(person.firstName); // Output: John
   ```

3. **Methods:**
   - Methods are functions contained within objects, allowing objects to perform actions.

   ```javascript
   var person = {
       firstName: "John",
       lastName: "Doe",
       fullName: function() {
           return this.firstName + " " + this.lastName;
       }
   };
   console.log(person.fullName()); // Output: John Doe
   ```

4. **Display:**
   - Displaying object properties and methods is typically done using dot notation or bracket notation.

5. **Accessors:**
   - Accessors are special methods used to access or modify object properties.

   ```javascript
   var person = {
       firstName: "John",
       lastName: "Doe",
       getFullName: function() {
           return this.firstName + " " + this.lastName;
       },
       setFirstName: function(newName) {
           this.firstName = newName;
       }
   };
   person.setFirstName("Alice");
   console.log(person.getFullName()); // Output: Alice Doe
   ```

6. **Constructors:**
   - Constructors are functions used to create and initialize objects of a specific type or class.

   ```javascript
   function Person(firstName, lastName) {
       this.firstName = firstName;
       this.lastName = lastName;
   }
   var person = new Person("John", "Doe");
   ```

7. **Prototype:**
   - Prototypes allow you to add properties or methods to all objects of a particular type.

   ```javascript
   Person.prototype.getFullName = function() {
       return this.firstName + " " + this.lastName;
   };
   var person = new Person("John", "Doe");
   console.log(person.getFullName()); // Output: John Doe
   ```

8. **Iterables:**
   - Iterables are objects that can be looped over using `for...of` loops or other iterable mechanisms.

   ```javascript
   var iterableArray = [1, 2, 3];
   for (var item of iterableArray) {
       console.log(item); // Output: 1, 2, 3
   }
   ```


#### problem 1: Create an Object Literal

**Solution:**
```javascript
const person = {
  name: 'Alice',
  age: 30,
};
```

#### problem 2: Access Object Properties

**Solution:**
```javascript
const person = {
  name: 'Bob',
  age: 25,
};

console.log(person.name); // Outputs: Bob
```

#### problem 3: Add New Properties to an Object

**Solution:**
```javascript
const person = {
  name: 'Charlie',
  age: 35,
};

person.country = 'USA';
console.log(person.country); // Outputs: USA
```

#### problem 4: Define Methods in an Object

**Solution:**
```javascript
const person = {
  name: 'David',
  greet: function () {
    console.log('Hello, ' + this.name);
  },
};

person.greet(); // Outputs: Hello, David
```

#### problem 5: Use Shorthand Method Notation

**Solution:**
```javascript
const person = {
  name: 'Eve',
  greet() {
    console.log('Hello, ' + this.name);
  },
};

person.greet(); // Outputs: Hello, Eve
```

#### problem 6: Display Object Properties with a Loop

**Solution:**
```javascript
const person = {
  name: 'Frank',
  age: 40,
};

for (const key in person) {
  console.log(`${key}: ${person[key]}`);
}
```

#### problem 7: Create an Object Constructor Function

**Solution:**
```javascript
function Person(name, age) {
  this.name = name;
  this.age = age;
}

const person = new Person('Grace', 45);
console.log(person.name); // Outputs: Grace
```

#### problem 8: Use Object Prototypes

**Solution:**
```javascript
function Person(name, age) {
  this.name = name;
  this.age = age;
}

Person.prototype.greet = function () {
  console.log('Hello, ' + this.name);
};

const person = new Person('Hannah', 50);
person.greet(); // Outputs: Hello, Hannah
```

#### problem 9: Access Object Prototype Properties

**Solution:**
```javascript
function Animal(type) {
  this.type = type;
}

Animal.prototype.sound = 'No sound';

const dog = new Animal('Dog');
console.log(dog.sound); // Outputs: No sound
```

#### problem 10: Create a Getter and Setter for an Object Property

**Solution:**
```javascript
const student = {
  _name: 'John',
  get name() {
    return this._name;
  },
  set name(newName) {
    this._name = newName;
  },
};

student.name = 'Alice';
console.log(student.name); // Outputs: Alice
```

#### problem 11: Use Object Destructuring

**Solution:**
```javascript
const car = {
  make: 'Toyota',
  model: 'Camry',
  year: 2022,
};

const { make, model, year } = car;
console.log(make, model, year); // Outputs: Toyota Camry 2022
```

#### problem 12: Create an Object Method That Returns an Iterator

**Solution:**
```javascript
const numbers = {
  *[Symbol.iterator]() {
    for (let i = 1; i <= 5; i++) {
      yield i;
    }
  },
};

for (const num of numbers) {
  console.log(num);
}
```

#### problem 13: Create an Object Method That Implements the Iterable Protocol

**Solution:**
```javascript
const person = {
  name: 'Linda',
  hobbies: ['Reading', 'Painting', 'Hiking'],
  [Symbol.iterator]() {
    let index = 0;
    const hobbies = this.hobbies;
    return {
      next() {
        if (index < hobbies.length) {
          return { value: hobbies[index++], done: false };
        } else {
          return { done: true };
        }
      },
    };
  },
};

for (const hobby of person) {
  console.log(hobby);
}
```

#### problem 14: Merge Two Objects

**Solution:**
```javascript
const obj1 = { a: 1, b: 2 };
const obj2 = { b: 3, c: 4 };

const merged = { ...obj1, ...obj2 };
console.log(merged); // Outputs: { a: 1, b: 3, c: 4 }
```

#### problem 15: Check If an Object Has a Property

**Solution:**
```javascript
const student = {
  name: 'Oliver',
  age: 20,
};

const hasAge = 'age' in student;
console.log(hasAge); // Outputs: true
```

#### problem 16: Remove a Property from an Object

**Solution:**
```javascript
const person = {
  name: 'Paul',
  age: 30,
};

delete person.age;
console.log(person.age); // Outputs: undefined
```

#### problem 17: Clone an Object

**Solution:**
```javascript
const original = { a: 1, b: 2 };
const clone = { ...original };
```

#### problem 18: Freeze an Object

**Solution:**
```javascript
const constant = Object.freeze({ x: 1, y: 2 });
// Attempts to modify constant will result in an error
```

#### problem 19: Check if an Object is Empty

**Solution:**
```javascript
function isEmpty(obj) {
  return Object.keys(obj).length === 0;
}

const emptyObj = {};
console.log(isEmpty(emptyObj)); // Outputs: true
```

#### problem 20: Iterate Over Object Entries

**Solution:**
```javascript
const person = {
  name: 'Sophia',
  age: 25,
};

for (const [key, value] of Object.entries(person)) {
  console.log(`${key}: ${value}`);
}
```

### JS OBJECTS : sets,maps, iterables & reference 
---

#### problem 1: Create and Use a Set

**Solution:**
```javascript
const mySet = new Set();

mySet.add(1);
mySet.add(2);
mySet.add(3);

console.log(mySet.has(2)); // Outputs: true
mySet.delete(3);
console.log([...mySet]); // Outputs: [1, 2]
```

#### problem 2: Iterate Over a Set

**Solution:**
```javascript
const mySet = new Set([1, 2, 3, 4, 5]);

for (const item of mySet) {
  console.log(item);
}
```

#### problem 3: Create and Use a Map

**Solution:**
```javascript
const myMap = new Map();

myMap.set('name', 'Alice');
myMap.set('age', 30);

console.log(myMap.get('name')); // Outputs: Alice
console.log(myMap.has('gender')); // Outputs: false
myMap.delete('age');
console.log([...myMap]); // Outputs: [['name', 'Alice']]
```

#### problem 4: Iterate Over a Map

**Solution:**
```javascript
const myMap = new Map([
  ['name', 'Bob'],
  ['age', 25],
]);

for (const [key, value] of myMap) {
  console.log(`${key}: ${value}`);
}
```

#### problem 5: Convert an Array to a Set

**Solution:**
```javascript
const myArray = [1, 2, 3, 3, 4, 5];
const mySet = new Set(myArray);

console.log([...mySet]); // Outputs: [1, 2, 3, 4, 5]
```

#### problem 6: Convert an Object to a Map

**Solution:**
```javascript
const myObject = { name: 'Charlie', age: 35 };
const myMap = new Map(Object.entries(myObject));

console.log([...myMap]); // Outputs: [['name', 'Charlie'], ['age', 35]]
```

#### problem 7: Understand Reference vs. Value

**Solution:**
```javascript
let a = 5;
let b = a;
b = 10;

console.log(a); // Outputs: 5 (unchanged)
console.log(b); // Outputs: 10
```

#### problem 8: Deep Clone an Object

**Solution:**
```javascript
function deepClone(obj) {
  return JSON.parse(JSON.stringify(obj));
}

const original = { a: 1, b: { c: 2 } };
const clone = deepClone(original);

console.log(clone.b.c); // Outputs: 2
```

#### problem 9: Use Sets for Unique Values

**Solution:**
```javascript
const numbers = [1, 2, 3, 3, 4, 5];
const uniqueNumbers = [...new Set(numbers)];

console.log(uniqueNumbers); // Outputs: [1, 2, 3, 4, 5]
```

#### problem 10: Use Maps to Store Key-Value Pairs

**Solution:**
```javascript
const studentGrades = new Map();

studentGrades.set('Alice', 95);
studentGrades.set('Bob', 88);
studentGrades.set('Charlie', 92);

console.log(studentGrades.get('Alice')); // Outputs: 95
console.log(studentGrades.size); // Outputs: 3
```

### JS functions : definition, all types of functions, invocation, parameters, call, bind, apply, callbacks & closures
---


### Problem 1: Create a Function

**Solution:**
```javascript
function sayHello() {
  console.log('Hello, World!');
}
sayHello();
```

### Problem 2: Define a Function Expression

**Solution:**
```javascript
const greet = function (name) {
  console.log(`Hello, ${name}!`);
};
greet('Alice');
```

### Problem 3: Use Arrow Functions

**Solution:**
```javascript
const add = (a, b) => a + b;
console.log(add(3, 5)); // Outputs: 8
```

### Problem 4: Create a Function with Default Parameters

**Solution:**
```javascript
function greet(name = 'Guest') {
  console.log(`Hello, ${name}!`);
}
greet(); // Outputs: Hello, Guest!
```

### Problem 5: Define a Function That Takes a Callback

**Solution:**
```javascript
function calculate(a, b, operation) {
  return operation(a, b);
}

const add = (a, b) => a + b;
console.log(calculate(3, 5, add)); // Outputs: 8
```

### Problem 6: Use Function Call Method

**Solution:**
```javascript
function greet() {
  console.log(`Hello, ${this.name}!`);
}

const person = { name: 'Alice' };
greet.call(person); // Outputs: Hello, Alice!
```

### Problem 7: Use Function Apply Method

**Solution:**
```javascript
function greet() {
  console.log(`Hello, ${this.name}!`);
}

const person = { name: 'Bob' };
greet.apply(person); // Outputs: Hello, Bob!
```

### Problem 8: Use the Bind Method

**Solution:**
```javascript
function greet() {
  console.log(`Hello, ${this.name}!`);
}

const person = { name: 'Charlie' };
const greetPerson = greet.bind(person);
greetPerson(); // Outputs: Hello, Charlie!
```

### Problem 9: Create a Closure

**Solution:**
```javascript
function outer() {
  const message = 'Hello, ';

  function inner(name) {
    console.log(message + name);
  }

  return inner;
}

const greet = outer();
greet('David'); // Outputs: Hello, David
```

### Problem 10: Define a Recursive Function

**Solution:**
```javascript
function factorial(n) {
  if (n <= 1) {
    return 1;
  }
  return n * factorial(n - 1);
}

console.log(factorial(5)); // Outputs: 120
```

### Problem 11: Create a Higher-Order Function

**Solution:**
```javascript
function multiplier(factor) {
  return function (number) {
    return number * factor;
  };
}

const double = multiplier(2);
console.log(double(5)); // Outputs: 10
```

### Problem 12: Use a Generator Function

**Solution:**
```javascript
function* countdown(n) {
  while (n > 0) {
    yield n;
    n--;
  }
}

const generator = countdown(5);
for (const number of generator) {
  console.log(number);
}
```

### Problem 13: Define a Function That Returns a Promise

**Solution:**
```javascript
function fetchData() {
  return new Promise((resolve, reject) => {
    // Asynchronous operation here
    setTimeout(() => {
      resolve('Data fetched successfully');
    }, 1000);
  });
}

fetchData()
  .then((data) => {
    console.log(data);
  })
  .catch((error) => {
    console.error(error);
  });
```

### Problem 14: Implement a Function That Uses async/await

**Solution:**
```javascript
async function fetchData() {
  return new Promise((resolve, reject) => {
    // Asynchronous operation here
    setTimeout(() => {
      resolve('Data fetched successfully');
    }, 1000);
  });
}

async function getData() {
  try {
    const data = await fetchData();
    console.log(data);
  } catch (error) {
    console.error(error);
  }
}

getData();
```

### Problem 15: Create a Function That Memoizes Results

**Solution:**
```javascript
function memoize(func) {
  const cache = new Map();
  return function (...args) {
    const key = JSON.stringify(args);
    if (cache.has(key)) {
      return cache.get(key);
    }
    const result = func(...args);
    cache.set(key, result);
    return result;
  };
}

const factorial = memoize((n) => {
  if (n <= 1) {
    return 1;
  }
  return n * factorial(n - 1);
});

console.log(factorial(5)); // Outputs: 120 (Memoized)
```

### Problem 16: Use the Rest Parameter

**Solution:**
```javascript
function sum(...numbers) {
  return numbers.reduce((total, num) => total + num, 0);
}

console.log(sum(1, 2, 3)); // Outputs: 6
```

### Problem 17: Create a Function That Curries Arguments

**Solution:**
```javascript
function curry(fn) {
  return function curried(...args) {
    if (args.length >= fn.length) {
      return fn(...args);
    } else {
      return function (...moreArgs) {
        return curried(...args, ...moreArgs);
      };
    }
  };
}

function add(a, b, c) {
  return a + b + c;
}

const curriedAdd = curry(add);
console.log(curriedAdd(1)(2)(3)); // Outputs: 6
```

### Problem 18: Use Function Prototypes

**Solution:**
```javascript
function Person(name, age) {
  this.name = name;
  this.age = age;
}

Person.prototype.greet = function () {
  console.log(`Hello, ${this.name}!`);
};

const person = new Person('Eve', 30);
person.greet(); // Outputs: Hello, Eve!
```

### Problem 19: Implement a Function That Applies Throttling

**Solution:**
```javascript
function throttle(func, delay) {
  let canCall = true;
  return function (...args) {
    if (canCall) {
      func(...args);
      canCall = false;
      setTimeout(() => {
        canCall = true;
      }, delay);
    }
  };
}

function logMessage(message) {
  console.log(message);
}

const throttledLog = throttle(logMessage, 1000);
throttledLog('Hello');
throttledLog('World'); // Only logs "Hello"
```

### Problem 20: Create a Function That Applies Debouncing

**Solution:**
```javascript
function debounce(func, delay) {
  let timeoutId;
  return function (...args) {
    clearTimeout(timeoutId);
    timeoutId

 = setTimeout(() => {
      func(...args);
    }, delay);
  };
}

function search(query) {
  console.log(`Searching for: ${query}`);
}

const debouncedSearch = debounce(search, 500);
debouncedSearch('JavaScript');
debouncedSearch('React'); // Only searches for "React"
```

### Problem 21: Define a Function That Checks for Palindromes

**Solution:**
```javascript
function isPalindrome(str) {
  const cleanStr = str.toLowerCase().replace(/[^a-z0-9]/g, '');
  const reversed = cleanStr.split('').reverse().join('');
  return cleanStr === reversed;
}

console.log(isPalindrome('racecar')); // Outputs: true
```

### Problem 22: Create a Function That Capitalizes Words

**Solution:**
```javascript
function capitalizeWords(sentence) {
  const words = sentence.split(' ');
  const capitalizedWords = words.map((word) => word.charAt(0).toUpperCase() + word.slice(1));
  return capitalizedWords.join(' ');
}

console.log(capitalizeWords('hello world')); // Outputs: Hello World
```

### Problem 23: Implement a Function That Sorts an Array

**Solution:**
```javascript
function sortArray(arr) {
  return arr.slice().sort((a, b) => a - b);
}

const numbers = [4, 2, 7, 1, 9];
const sortedNumbers = sortArray(numbers);
console.log(sortedNumbers); // Outputs: [1, 2, 4, 7, 9]
```

### Problem 24: Define a Function That Filters an Array

**Solution:**
```javascript
function filterEvenNumbers(arr) {
  return arr.filter((number) => number % 2 === 0);
}

const numbers = [1, 2, 3, 4, 5, 6];
const evenNumbers = filterEvenNumbers(numbers);
console.log(evenNumbers); // Outputs: [2, 4, 6]
```

### Problem 25: Create a Function That Maps an Array

**Solution:**
```javascript
function doubleNumbers(arr) {
  return arr.map((number) => number * 2);
}

const numbers = [1, 2, 3, 4, 5];
const doubledNumbers = doubleNumbers(numbers);
console.log(doubledNumbers); // Outputs: [2, 4, 6, 8, 10]
```

### Problem 26: Implement a Function That Reduces an Array

**Solution:**
```javascript
function sumArray(arr) {
  return arr.reduce((total, number) => total + number, 0);
}

const numbers = [1, 2, 3, 4, 5];
const total = sumArray(numbers);
console.log(total); // Outputs: 15
```

### Problem 27: Create a Function That Finds the Maximum Element in an Array

**Solution:**
```javascript
function findMax(arr) {
  return Math.max(...arr);
}

const numbers = [1, 7, 3, 9, 4];
const max = findMax(numbers);
console.log(max); // Outputs: 9
```

### Problem 28: Define a Function That Checks for Anagrams

**Solution:**
```javascript
function areAnagrams(str1, str2) {
  const cleanStr1 = str1.toLowerCase().replace(/[^a-z]/g, '');
  const cleanStr2 = str2.toLowerCase().replace(/[^a-z]/g, '');
  const sortedStr1 = cleanStr1.split('').sort().join('');
  const sortedStr2 = cleanStr2.split('').sort().join('');
  return sortedStr1 === sortedStr2;
}

console.log(areAnagrams('listen', 'silent')); // Outputs: true
```

### Problem 29: Create a Function That Checks for a Prime Number

**Solution:**
```javascript
function isPrime(number) {
  if (number <= 1) {
    return false;
  }
  for (let i = 2; i <= Math.sqrt(number); i++) {
    if (number % i === 0) {
      return false;
    }
  }
  return true;
}

console.log(isPrime(17)); // Outputs: true
```

### Problem 30: Implement a Function That Generates Fibonacci Numbers

**Solution:**
```javascript
function generateFibonacci(n) {
  const sequence = [0, 1];
  for (let i = 2; i < n; i++) {
    const next = sequence[i - 1] + sequence[i - 2];
    sequence.push(next);
  }
  return sequence;
}

const fibonacciSequence = generateFibonacci(10);
console.log(fibonacciSequence); // Outputs: [0, 1, 1, 2, 3, 5, 8, 13, 21, 34]
```

### JS Class:  inheritance, encapsulation, abstraction and polymorphism.and also static & final
---

### Problem 1: Define a Simple Class

**Solution:**
```javascript
class Person {
  constructor(name, age) {
    this.name = name;
    this.age = age;
  }

  introduce() {
    console.log(`Hi, I'm ${this.name} and I'm ${this.age} years old.`);
  }
}

const person = new Person('Alice', 25);
person.introduce();
```

**Explanation:** This problem defines a simple class `Person` with a constructor to initialize name and age properties and an `introduce` method to print an introduction.

### Problem 2: Create an Inherited Class

**Solution:**
```javascript
class Animal {
  constructor(name) {
    this.name = name;
  }

  speak() {
    console.log(`${this.name} makes a sound.`);
  }
}

class Dog extends Animal {
  speak() {
    console.log(`${this.name} barks.`);
  }
}

const dog = new Dog('Buddy');
dog.speak();
```

**Explanation:** This problem demonstrates class inheritance, where `Dog` is a subclass of `Animal`. The `speak` method in the `Dog` class overrides the one in the `Animal` class.

### Problem 3: Implement Encapsulation

**Solution:**
```javascript
class BankAccount {
  constructor(balance) {
    this._balance = balance; // Use underscore to indicate a private property
  }

  get balance() {
    return this._balance;
  }

  deposit(amount) {
    if (amount > 0) {
      this._balance += amount;
    }
  }

  withdraw(amount) {
    if (amount > 0 && amount <= this._balance) {
      this._balance -= amount;
    }
  }
}

const account = new BankAccount(1000);
account.deposit(500);
account.withdraw(200);
console.log(account.balance);
```

**Explanation:** Encapsulation is achieved by marking the `_balance` property as private, and using getters and setters to control access and modification.

### Problem 4: Implement Abstraction

**Solution:**
```javascript
class Shape {
  constructor() {
    if (new.target === Shape) {
      throw new Error('Shape class cannot be instantiated directly.');
    }
  }

  calculateArea() {
    throw new Error('Subclasses must implement calculateArea method.');
  }
}

class Circle extends Shape {
  constructor(radius) {
    super();
    this.radius = radius;
  }

  calculateArea() {
    return Math.PI * this.radius ** 2;
  }
}

const circle = new Circle(5);
console.log(circle.calculateArea());
```

**Explanation:** Abstraction is achieved by defining abstract methods (like `calculateArea` in the `Shape` class) that must be implemented by subclasses.

### Problem 5: Implement Polymorphism

**Solution:**
```javascript
class Animal {
  makeSound() {
    console.log('Animal makes a sound.');
  }
}

class Dog extends Animal {
  makeSound() {
    console.log('Dog barks.');
  }
}

class Cat extends Animal {
  makeSound() {
    console.log('Cat meows.');
  }
}

function animalSounds(animal) {
  animal.makeSound();
}

const dog = new Dog();
const cat = new Cat();

animalSounds(dog);
animalSounds(cat);
```

**Explanation:** Polymorphism is demonstrated by the `animalSounds` function, which can accept different types of animals and call their specific `makeSound` method.

### Problem 6: Define a Static Method

**Solution:**
```javascript
class MathUtils {
  static square(x) {
    return x * x;
  }
}

console.log(MathUtils.square(5));
```

**Explanation:** Static methods are called on the class itself rather than on instances of the class. In this example, `square` is a static method of `MathUtils`.

### Problem 7: Implement a Singleton Class

**Solution:**
```javascript
class Singleton {
  constructor() {
    if (Singleton.instance) {
      return Singleton.instance;
    }
    this.data = [];
    Singleton.instance = this;
  }
}

const instance1 = new Singleton();
const instance2 = new Singleton();

console.log(instance1 === instance2); // Outputs: true
```

**Explanation:** A singleton class ensures that only one instance of the class is ever created. In this example, both `instance1` and `instance2` refer to the same object.

### Problem 8: Use Class Inheritance with `super`

**Solution:**
```javascript
class Vehicle {
  constructor(make, model) {
    this.make = make;
    this.model = model;
  }

  start() {
    console.log(`${this.make} ${this.model} started.`);
  }
}

class Car extends Vehicle {
  constructor(make, model, year) {
    super(make, model);
    this.year = year;
  }

  start() {
    super.start();
    console.log(`It's a ${this.year} model.`);
  }
}

const myCar = new Car('Toyota', 'Camry', 2023);
myCar.start();
```

**Explanation:** The `super` keyword is used to call the parent class's constructor and methods. This example demonstrates class inheritance and method overriding.

### Problem 9: Create an Abstract Base Class

**Solution:**
```javascript
class Shape {
  constructor() {
    if (new.target === Shape) {
      throw new Error('Shape class cannot be instantiated directly.');
    }
  }

  draw() {
    throw new Error('Subclasses must implement draw method.');
  }
}

class Circle extends Shape {
  draw() {
    console.log('Drawing a circle.');
  }
}

const shape = new Shape(); // Error: Shape class cannot be instantiated directly.
const circle = new Circle();
circle.draw();
```

**Explanation:** An abstract base class `Shape` ensures that it cannot be instantiated directly and requires its subclasses to implement the `draw` method.

### Problem 10: Use Composition Over Inheritance

**Solution:**
```javascript
class Engine {
  start() {
    console.log('Engine started.');
  }
}

class Car {
  constructor() {
    this.engine = new Engine();
  }

  start() {
    this.engine.start();
    console.log('Car started.');
  }
}

const myCar = new Car();
myCar.start();
```

**Explanation:** Composition is a design principle where objects are composed of other objects. In this example, the `Car` class uses composition to include an `Engine` object.

### Problem 11: Create a Class Hierarchy

**Solution:**
```javascript
class Employee {
  constructor(name, salary) {
    this.name = name;
    this.salary = salary;
  }

  getDetails() {
    return `${this.name

} earns $${this.salary}.`;
  }
}

class Manager extends Employee {
  constructor(name, salary, teamSize) {
    super(name, salary);
    this.teamSize = teamSize;
  }

  getDetails() {
    return `${super.getDetails()} Manages a team of ${this.teamSize}.`;
  }
}

const employee = new Employee('Alice', 50000);
const manager = new Manager('Bob', 75000, 10);

console.log(employee.getDetails());
console.log(manager.getDetails());
```

**Explanation:** This example demonstrates a class hierarchy with `Employee` and `Manager` classes. The `Manager` class extends `Employee` and overrides the `getDetails` method.

### Problem 12: Implement Polymorphism with Interfaces

**Solution:**
```javascript
class Shape {
  area() {
    throw new Error('Subclasses must implement area method.');
  }
}

class Circle extends Shape {
  constructor(radius) {
    super();
    this.radius = radius;
  }

  area() {
    return Math.PI * this.radius ** 2;
  }
}

class Rectangle extends Shape {
  constructor(width, height) {
    super();
    this.width = width;
    this.height = height;
  }

  area() {
    return this.width * this.height;
  }
}

function calculateArea(shape) {
  if (shape instanceof Shape) {
    return shape.area();
  }
  throw new Error('Invalid shape.');
}

const circle = new Circle(5);
const rectangle = new Rectangle(4, 6);

console.log(calculateArea(circle)); // Outputs: 78.53981633974483
console.log(calculateArea(rectangle)); // Outputs: 24
```

**Explanation:** Polymorphism is implemented by defining a common method `area` in both `Circle` and `Rectangle` classes and calling it through the `calculateArea` function.

### Problem 13: Implement a Final Class (Note: JavaScript doesn't have a "final" keyword, so this is a conceptual example)

**Solution:**
```javascript
class FinalClass {
  constructor() {
    if (new.target !== FinalClass) {
      throw new Error('FinalClass cannot be subclassed.');
    }
  }
}

class SubClass extends FinalClass {}

const instance = new SubClass(); // Error: FinalClass cannot be subclassed.
```

**Explanation:** In some languages, a "final" class cannot be subclassed. This is a conceptual example in JavaScript.

### Problem 14: Use Mixins for Reusable Behavior

**Solution:**
```javascript
class CanSwim {
  swim() {
    console.log('Swimming...');
  }
}

class CanFly {
  fly() {
    console.log('Flying...');
  }
}

class Dolphin {}
class Bird {}

Object.assign(Dolphin.prototype, CanSwim);
Object.assign(Bird.prototype, CanFly);

const flipper = new Dolphin();
const eagle = new Bird();

flipper.swim();
eagle.fly();
```

**Explanation:** Mixins are used to add functionality to classes without inheritance. In this example, `CanSwim` and `CanFly` mixins are added to `Dolphin` and `Bird` classes.

### Problem 15: Use Composition for Configurable Behavior

**Solution:**
```javascript
class Logger {
  log(message) {
    console.log(`[Log]: ${message}`);
  }
}

class UserManager {
  constructor(logger) {
    this.logger = logger;
  }

  addUser(user) {
    // Perform user addition logic
    this.logger.log('User added.');
  }
}

const logger = new Logger();
const userManager = new UserManager(logger);

userManager.addUser({ name: 'Alice' });
```

**Explanation:** Composition is used to inject configurable behavior into the `UserManager` class through the `Logger` class.

### Problem 16: Implement Multiple Interfaces

**Solution:**
```javascript
class Drivable {
  drive() {
    console.log('Driving...');
  }
}

class Flyable {
  fly() {
    console.log('Flying...');
  }
}

class FlyingCar {}

Object.assign(FlyingCar.prototype, Drivable.prototype, Flyable.prototype);

const flyingCar = new FlyingCar();
flyingCar.drive();
flyingCar.fly();
```

**Explanation:** Multiple interfaces can be implemented by merging their methods into a single class prototype.

### Problem 17: Use Class Composition for Complex Objects

**Solution:**
```javascript
class Engine {
  start() {
    console.log('Engine started.');
  }
}

class Wheels {
  rotate() {
    console.log('Wheels rotating.');
  }
}

class Car {
  constructor() {
    this.engine = new Engine();
    this.wheels = new Wheels();
  }

  drive() {
    this.engine.start();
    this.wheels.rotate();
    console.log('Car is moving.');
  }
}

const myCar = new Car();
myCar.drive();
```

**Explanation:** Class composition is used to build complex objects by combining simpler classes.

### Problem 18: Implement Abstract Methods Using Composition

**Solution:**
```javascript
class Engine {
  start() {
    console.log('Engine started.');
  }
}

class AbstractCar {
  constructor(engine) {
    this.engine = engine;
  }

  drive() {
    throw new Error('Subclasses must implement drive method.');
  }
}

class Sedan extends AbstractCar {
  drive() {
    this.engine.start();
    console.log('Sedan is driving.');
  }
}

const engine = new Engine();
const sedan = new Sedan(engine);
sedan.drive();
```

**Explanation:** Abstract methods can be implemented using composition. In this example, `AbstractCar` is a class with an abstract method `drive`.

### Problem 19: Create an Interface for Common Behavior

**Solution:**
```javascript
class Animal {
  speak() {
    throw new Error('Subclasses must implement speak method.');
  }
}

class Dog extends Animal {
  speak() {
    console.log('Dog barks.');
  }
}

class Cat extends Animal {
  speak() {
    console.log('Cat meows.');
  }
}

function animalSounds(animal) {
  animal.speak();
}

const dog = new Dog();
const cat = new Cat();

animalSounds(dog);
animalSounds(cat);
```

**Explanation:** An interface-like behavior is achieved by defining an abstract class `Animal` with an abstract method `speak`.

### Problem 20: Implement Dependency Injection

**Solution:**
```javascript
class Logger {
  log(message) {
    console.log(`[Log]: ${message}`);
  }
}

class UserManager {
  constructor(logger) {
    this.logger = logger;
  }

  addUser(user) {
    // Perform user addition logic
    this.logger.log('User added.');
 

 }
}

const logger = new Logger();
const userManager = new UserManager(logger);

userManager.addUser({ name: 'Alice' });
```

**Explanation:** Dependency injection is demonstrated by injecting a `Logger` instance into the `UserManager` class.

### Problem 21: Implement a Factory Method

**Solution:**
```javascript
class Car {
  constructor(make, model) {
    this.make = make;
    this.model = model;
  }

  start() {
    console.log(`${this.make} ${this.model} started.`);
  }
}

class CarFactory {
  createCar(make, model) {
    return new Car(make, model);
  }
}

const factory = new CarFactory();
const myCar = factory.createCar('Toyota', 'Camry');
myCar.start();
```

**Explanation:** The factory method is used to create instances of a class with specific configurations.

### Problem 22: Implement a Builder Pattern

**Solution:**
```javascript
class Car {
  constructor() {
    this.make = null;
    this.model = null;
    this.color = null;
  }

  setMake(make) {
    this.make = make;
    return this;
  }

  setModel(model) {
    this.model = model;
    return this;
  }

  setColor(color) {
    this.color = color;
    return this;
  }

  build() {
    return this;
  }

  start() {
    console.log(`${this.color} ${this.make} ${this.model} started.`);
  }
}

const myCar = new Car()
  .setMake('Toyota')
  .setModel('Camry')
  .setColor('Blue')
  .build();

myCar.start();
```

**Explanation:** The builder pattern is used to construct objects step by step with a fluent interface.

### Problem 23: Implement an Observer Pattern

**Solution:**
```javascript
class Observer {
  constructor() {
    this.observers = [];
  }

  addObserver(callback) {
    this.observers.push(callback);
  }

  notify(data) {
    this.observers.forEach((observer) => observer(data));
  }
}

const observer = new Observer();

function logMessage(message) {
  console.log(`Received message: ${message}`);
}

observer.addObserver(logMessage);

observer.notify('Hello, World!');
```

**Explanation:** The observer pattern is implemented to allow objects (observers) to subscribe and receive notifications from a subject.

### Problem 24: Implement a Decorator Pattern

**Solution:**
```javascript
class Coffee {
  cost() {
    return 5;
  }
}

class MilkDecorator {
  constructor(coffee) {
    this.coffee = coffee;
  }

  cost() {
    return this.coffee.cost() + 2;
  }
}

class SugarDecorator {
  constructor(coffee) {
    this.coffee = coffee;
  }

  cost() {
    return this.coffee.cost() + 1;
  }
}

const plainCoffee = new Coffee();
const coffeeWithMilk = new MilkDecorator(plainCoffee);
const coffeeWithSugar = new SugarDecorator(plainCoffee);

console.log(plainCoffee.cost()); // Outputs: 5
console.log(coffeeWithMilk.cost()); // Outputs: 7
console.log(coffeeWithSugar.cost()); // Outputs: 6
```

**Explanation:** The decorator pattern is used to add behavior to objects dynamically.

### Problem 25: Implement a State Pattern

**Solution:**
```javascript
class VendingMachine {
  constructor() {
    this.state = 'idle';
  }

  insertCoin() {
    if (this.state === 'idle') {
      console.log('Coin inserted.');
      this.state = 'coinInserted';
    } else {
      console.log('Coin already inserted.');
    }
  }

  selectProduct() {
    if (this.state === 'coinInserted') {
      console.log('Product dispensed.');
      this.state = 'idle';
    } else {
      console.log('Please insert a coin first.');
    }
  }
}

const vendingMachine = new VendingMachine();

vendingMachine.insertCoin();
vendingMachine.selectProduct();
```

**Explanation:** The state pattern allows an object to alter its behavior when its internal state changes.

### Problem 26: Implement a Strategy Pattern

**Solution:**
```javascript
class PaymentStrategy {
  pay(amount) {
    throw new Error('Subclasses must implement pay method.');
  }
}

class CreditCardPayment extends PaymentStrategy {
  pay(amount) {
    console.log(`Paid $${amount} using a credit card.`);
  }
}

class PayPalPayment extends PaymentStrategy {
  pay(amount) {
    console.log(`Paid $${amount} using PayPal.`);
  }
}

class ShoppingCart {
  constructor(paymentStrategy) {
    this.paymentStrategy = paymentStrategy;
  }

  checkout(amount) {
    this.paymentStrategy.pay(amount);
  }
}

const creditCardPayment = new CreditCardPayment();
const payPalPayment = new PayPalPayment();

const cart1 = new ShoppingCart(creditCardPayment);
const cart2 = new ShoppingCart(payPalPayment);

cart1.checkout(100);
cart2.checkout(50);
```

**Explanation:** The strategy pattern is used to define a family of algorithms, encapsulate each one, and make them interchangeable.

### Problem 27: Implement a Command Pattern

**Solution:**
```javascript
class Light {
  turnOn() {
    console.log('Light is on.');
  }

  turnOff() {
    console.log('Light is off.');
  }
}

class LightOnCommand {
  constructor(light) {
    this.light = light;
  }

  execute() {
    this.light.turnOn();
  }
}

class LightOffCommand {
  constructor(light) {
    this.light = light;
  }

  execute() {
    this.light.turnOff();
  }
}

class RemoteControl {
  constructor() {
    this.commands = [];
  }

  addCommand(command) {
    this.commands.push(command);
  }

  executeCommands() {
    this.commands.forEach((command) => command.execute());
  }
}

const livingRoomLight = new Light();
const kitchenLight = new Light();

const livingRoomLightOn = new LightOnCommand(livingRoomLight);
const livingRoomLightOff = new LightOffCommand(livingRoomLight);
const kitchenLightOn = new LightOnCommand(kitchenLight);
const kitchenLightOff = new LightOffCommand(kitchenLight);

const remote = new RemoteControl();
remote.addCommand(livingRoomLightOn);
remote.addCommand(livingRoomLightOff);
remote.addCommand(kitchenLightOn);
remote.addCommand(kitchenLightOff);

remote.executeCommands();
```

**Explanation:** The command pattern is used to encapsulate a request as an object, thereby allowing for parameterization of clients with queues, requests, and operations.

### Problem 28: Implement an Iterator Pattern

**Solution:**
```javascript
class MyArray {
  constructor() {
    this.data = [];
  }

  add(item) {
    this.data.push(item);
  }

  [Symbol.iterator]() {
    let index = 0;
    const data = this.data;

    return {
      next() {
        if (index < data.length) {
          return { value: data[index++], done: false };
        } else {
          return { done: true };
        }
      },
    };
  }
}

const array = new MyArray();
array.add(1);
array.add(2);
array.add(3);

for (const item of array) {
  console.log

(item);
}
```

**Explanation:** The iterator pattern is used to provide a way to access elements of an object sequentially without exposing its underlying representation.

### Problem 29: Implement a Mediator Pattern

**Solution:**
```javascript
class User {
  constructor(name, mediator) {
    this.name = name;
    this.mediator = mediator;
  }

  send(message) {
    this.mediator.sendMessage(this, message);
  }

  receive(message) {
    console.log(`${this.name} received: ${message}`);
  }
}

class ChatMediator {
  constructor() {
    this.users = [];
  }

  addUser(user) {
    this.users.push(user);
  }

  sendMessage(sender, message) {
    for (const user of this.users) {
      if (user !== sender) {
        user.receive(message);
      }
    }
  }
}

const mediator = new ChatMediator();

const user1 = new User('Alice', mediator);
const user2 = new User('Bob', mediator);

mediator.addUser(user1);
mediator.addUser(user2);

user1.send('Hello, Bob!');
user2.send('Hi, Alice!');
```

**Explanation:** The mediator pattern is used to reduce the complexity of communication between multiple objects or classes.

### Problem 30: Implement a Template Method Pattern

**Solution:**
```javascript
class Game {
  start() {
    this.initialize();
    this.play();
    this.finish();
  }

  initialize() {
    console.log('Game initialized.');
  }

  play() {
    throw new Error('Subclasses must implement play method.');
  }

  finish() {
    console.log('Game finished.');
  }
}

class Chess extends Game {
  play() {
    console.log('Playing chess.');
  }
}

class TicTacToe extends Game {
  play() {
    console.log('Playing Tic-Tac-Toe.');
  }
}

const chess = new Chess();
const ticTacToe = new TicTacToe();

chess.start();
ticTacToe.start();
```

**Explanation:** The template method pattern defines the skeleton of an algorithm in the superclass but lets subclasses override specific steps of the algorithm without changing its structure.

## JS ASYNC
---
JavaScript (JS) asynchronous programming refers to the execution of code in a non-blocking manner, allowing tasks to be performed independently of the main program flow. In other words, asynchronous operations in JS allow you to execute tasks in the background without waiting for each one to finish before moving on to the next task. This is crucial for tasks that may take some time to complete, such as fetching data from a server, reading files, or handling user input.

Key characteristics of asynchronous programming in JavaScript include:

1. **Non-Blocking:** Asynchronous code does not block the execution of other code. It allows multiple tasks to run concurrently, improving overall program efficiency and responsiveness.

2. **Callbacks:** Asynchronous operations often involve the use of callback functions. Callbacks are functions passed as arguments to asynchronous functions and are executed once the task is complete. They allow you to specify what should happen after an asynchronous operation finishes.

3. **Promises:** Promises are a more structured way to handle asynchronous operations. They represent a future value or error and provide methods for chaining asynchronous operations together and handling success or failure elegantly.

4. **Async/Await:** Introduced in modern JavaScript, the `async/await` syntax provides a more readable and synchronous-like way to work with asynchronous code. It allows you to write asynchronous code that looks similar to synchronous code, making it easier to understand and maintain.

### JS Callbacks, JS Asynchronous, JS Promises, and Async/Await
---

#### Problem 1: Understanding Callbacks
**Problem:** Explain what a callback function is in JavaScript and provide an example of how it can be used.

**Solution:**
A callback function is a function that is passed as an argument to another function and is executed after the completion of that function. It is often used for asynchronous operations.

```javascript
// Example of using a callback function
function fetchData(callback) {
  setTimeout(function () {
    callback("Data fetched successfully!");
  }, 1000);
}

function displayData(data) {
  console.log(data);
}

fetchData(displayData);
```

#### Problem 2: Callback Hell (Callback Pyramid)
**Problem:** Explain the issue of callback hell in JavaScript and provide a solution using named functions.

**Solution:**
Callback hell occurs when nested callbacks make the code hard to read. Using named functions can help alleviate this problem.

```javascript
function fetchData(callback) {
  setTimeout(function () {
    callback("Data fetched successfully!");
  }, 1000);
}

function processData(data, callback) {
  setTimeout(function () {
    callback("Data processed: " + data);
  }, 1000);
}

function displayData(data) {
  console.log(data);
}

fetchData(function (data) {
  processData(data, function (processedData) {
    displayData(processedData);
  });
});
```

#### Problem 3: Promises Basics
**Problem:** Explain what a promise is and provide an example of creating and consuming a promise.

**Solution:**
A promise is an object that represents the eventual completion or failure of an asynchronous operation.

```javascript
// Creating a promise
const fetchData = new Promise((resolve, reject) => {
  setTimeout(() => {
    resolve("Data fetched successfully!");
  }, 1000);
});

// Consuming a promise
fetchData
  .then((data) => {
    console.log(data);
  })
  .catch((error) => {
    console.error(error);
  });
```

#### Problem 4: Chaining Promises
**Problem:** Explain how to chain promises in JavaScript to handle multiple asynchronous operations sequentially.

**Solution:**
Chaining promises allows you to execute asynchronous operations one after the other.

```javascript
function fetchData() {
  return new Promise((resolve, reject) => {
    setTimeout(() => {
      resolve("Data fetched successfully!");
    }, 1000);
  });
}

function processData(data) {
  return new Promise((resolve, reject) => {
    setTimeout(() => {
      resolve("Data processed: " + data);
    }, 1000);
  });
}

fetchData()
  .then(processData)
  .then((result) => {
    console.log(result);
  })
  .catch((error) => {
    console.error(error);
  });
```

#### Problem 5: Async/Await Basics
**Problem:** Explain the async/await syntax in JavaScript and provide an example of using it for asynchronous operations.

**Solution:**
Async/await provides a more readable way to work with promises.

```javascript
async function fetchData() {
  return new Promise((resolve) => {
    setTimeout(() => {
      resolve("Data fetched successfully!");
    }, 1000);
  });
}

async function processData(data) {
  return new Promise((resolve) => {
    setTimeout(() => {
      resolve("Data processed: " + data);
    }, 1000);
  });
}

async function fetchDataAndProcess() {
  try {
    const data = await fetchData();
    const result = await processData(data);
    console.log(result);
  } catch (error) {
    console.error(error);
  }
}

fetchDataAndProcess();
```

#### Problem 11: Handling Multiple Concurrent Requests
**Problem:** Explain how to make multiple asynchronous requests concurrently and handle their results using async/await.

**Solution:**
You can use `Promise.all` with async/await to handle multiple concurrent requests.

```javascript
async function fetchUserData(userId) {
  const userPromise = fetch(`https://api.example.com/users/${userId}`);
  const postsPromise = fetch(`https://api.example.com/posts?userId=${userId}`);

  const [userData, postsData] = await Promise.all([userPromise, postsPromise]);

  const user = await userData.json();
  const posts = await postsData.json();

  return { user, posts };
}

async function getUserData(userId) {
  try {
    const data = await fetchUserData(userId);
    console.log("User:", data.user);
    console.log("Posts:", data.posts);
  } catch (error) {
    console.error(error);
  }
}

getUserData(1);
```

#### Problem 12: Throttling and Debouncing
**Problem:** Explain the concepts of throttling and debouncing in JavaScript and provide examples of their usage.

**Solution:**
Throttling limits the rate of execution of a function, while debouncing delays execution until a pause in input.

```javascript
// Throttle function to limit calls to once every 500ms
function throttle(func, delay) {
  let lastCall = 0;
  return function (...args) {
    const now = new Date().getTime();
    if (now - lastCall >= delay) {
      func(...args);
      lastCall = now;
    }
  };
}

// Debounce function to wait for 500ms of inactivity before calling
function debounce(func, delay) {
  let timeoutId;
  return function (...args) {
    clearTimeout(timeoutId);
    timeoutId = setTimeout(() => {
      func(...args);
    }, delay);
  };
}
```

#### Problem 13: Fetching Data with Axios
**Problem:** Explain how to make HTTP requests using the Axios library in JavaScript and provide an example.

**Solution:**
Axios is a popular library for making HTTP requests.

```javascript
const axios = require("axios");

async function fetchData() {
  try {
    const response = await axios.get("https://api.example.com/data");
    console.log(response.data);
  } catch (error) {
    console.error(error);
  }
}

fetchData();
```

#### Problem 14: Handling Fetch Errors
**Problem:** Explain how to handle errors when using the Fetch API for HTTP requests and provide an example.

**Solution:**
You can check the response status and handle errors accordingly.

```javascript
async function fetchData() {
  try {
    const response = await fetch("https://api.example.com/data");
    if (!response.ok) {
      throw new Error("HTTP error! Status: " + response.status);
    }
    const data = await response.json();
    console.log(data);
  } catch (error) {
    console.error(error);
  }
}

fetchData();
```

#### Problem 15: Using Axios Interceptors
**Problem:** Explain how to use Axios interceptors to globally handle requests and responses.

**Solution:**
Axios interceptors allow you to add middleware for requests and responses.

```javascript
const axios = require("axios");

axios.interceptors.request.use(
  (config) => {
    // Add headers or modify request config
    return config;
  },
  (error) => {
    return Promise.reject(error);
  }
);

axios.interceptors.response.use(
  (response) => {
    // Process successful responses
    return response;
  },
  (error) => {
    // Handle response errors
    return Promise.reject(error);
  }
);
```

#### Problem 16: Using Local Storage with Promises
**Problem:** Explain how to use Promises with local storage in JavaScript and provide an example.

**Solution:**
You can wrap local storage operations in promises for better async handling.

```javascript
function getItemFromLocalStorage(key) {
  return new Promise((resolve, reject) => {
    try {
      const data = localStorage.getItem(key);
      if (data !== null) {
        resolve(data);
      } else {
        reject("Item not found in local storage.");
      }
    } catch (error) {
      reject(error);
    }
  });
}

function setItemInLocalStorage(key, value) {
  return new Promise((resolve, reject) => {
    try {
      localStorage.setItem(key, value);
      resolve("Item saved in local storage.");
    } catch (error) {
      reject(error);
    }
  });
}

// Example usage
setItemInLocalStorage("username", "John")
  .then((result) => {
    console.log(result);
    return getItemFromLocalStorage("username");
  })
  .then((data) => {
    console.log("Username:", data);
  })
  .catch((error) => {
    console.error(error);
  });
```

#### Problem 17: Handling Fetch with Async Generators
**Problem:** Explain how to use async generators to handle paginated data fetched from an API and provide an example.

**Solution:**
Async generators are useful for fetching and processing paginated data.

```javascript
async function* fetchPaginatedData(url) {
  let page = 1;
  while (true) {
    const response = await fetch(`${url}?page=${page}`);
    const data = await response.json();
    if (data.length === 0) {
      break;
    }
    yield data;
    page++;
  }
}

(async () => {
  for await (const pageData of fetchPaginatedData("https://api.example.com/data")) {
    console.log(pageData);
  }
})();
```

#### Problem 18: Using Axios with Cancel Tokens
**Problem:** Explain how to cancel Axios requests using cancel tokens and provide an example.

**Solution:**
Cancel tokens allow you to cancel Axios requests.

```javascript
const axios = require("axios");
const { CancelToken, isCancel } = axios;

const source = CancelToken.source();

axios
  .get("https://api.example.com/data", {
    cancelToken: source.token,
  })
  .then((response) => {
    console.log(response.data);
  })
  .catch((error) => {
    if (isCancel(error)) {
      console.log("Request canceled:", error.message);
    } else {
      console.error(error);
    }
  });

// Cancel the request
source.cancel("Request canceled by the user.");
```

#### Problem 19: Promise.finally
**Problem:** Explain how to use the `finally` method with promises and provide an example.

**Solution:**
The `finally` method allows you to execute code regardless of whether the promise is resolved or rejected.

```javascript
const fetchData = new Promise((resolve, reject) => {
  setTimeout(() => {
    resolve("Data fetched successfully!");
  }, 1000);
});

fetchData
  .then((data) => {
    console.log(data);
  })
  .catch((error) => {
    console.error(error);
  })
  .finally(() => {
    console.log("Request completed.");
  });
```

#### Problem 20: Parallel Execution with Promise.allSettled
**Problem:** Explain how to use `Promise.allSettled` to execute promises in parallel and handle their results.

**Solution:**
`Promise.allSettled` allows you to wait for all promises to settle (either resolve or reject) and get their results.

```javascript
const promise1 = fetchData();
const promise2 = processData();

Promise.allSettled([promise1, promise2]).then((results) => {
  results.forEach((result, index) => {
    if (result.status === "fulfilled") {
      console.log(`Promise ${index + 1}: ${result.value}`);
    } else {
      console.error(`Promise ${index + 1} failed: ${result.reason}`);
    }
  });
});
```

#### Problem 21: Caching API Responses
**Problem:** Explain how to implement caching for API responses to improve performance and provide an example.

**Solution:**
Caching API responses can reduce unnecessary network requests.

```javascript
const cache = new Map();

async function fetchDataWithCache(url) {
  if (cache.has(url)) {
    return cache.get(url);
  }

  const response = await fetch(url);
  const data = await response.json();

  cache.set(url, data);

  return data;
}

// Example usage
fetchDataWithCache("https://api.example.com/data")
  .then((data) => {
    console.log(data);
  })
  .catch((error) => {
    console.error(error);
  });
```

#### Problem 22: Handling Promise Timeout
**Problem:** Explain how to add a timeout to a promise to handle cases where it takes too long to resolve and provide an example.

**Solution:**
You can add a timeout to a promise using `Promise.race`.

```javascript
function timeout(ms) {
  return new Promise((_, reject) => {
    setTimeout(() => {
      reject("Promise timed out.");
    }, ms);
  });
}

const fetchData = new Promise((resolve) => {
  setTimeout(() => {
    resolve("Data fetched successfully!");
  }, 2000);
});

Promise.race([fetchData, timeout(1000)])
  .then((data) => {
    console.log(data);
  })
  .catch((error) => {
    console.error(error);
  });
```

#### Problem 23: Async Iteration with for-await-of
**Problem:** Explain how to use `for-await-of` to iterate over asynchronous data streams and provide an example.

**Solution:**
`for-await-of` simplifies asynchronous iteration.

```javascript
async function* generateAsyncData() {
  yield "First";
  await new Promise((resolve) => setTimeout(resolve, 1000)); // Simulate delay
  yield "Second";
  await new Promise((resolve) => setTimeout(resolve, 1000)); // Simulate delay
  yield "Third";
}

(async () => {
  for await (const data of generateAsyncData()) {
    console.log(data);
  }
})();
```

#### Problem 24: Converting Callbacks to Promises
**Problem:** Explain how to convert a callback-based function to return a promise and provide an example.

**Solution:**
You can promisify a callback function to use it with promises.

```javascript
const fs = require("fs");

function readFileAsync(path) {
  return new Promise((resolve, reject) => {
    fs.readFile(path, "utf8", (err, data) => {
      if (err) {
        reject(err);
      } else {
        resolve(data);
      }
    });
  });
}

// Example usage
readFileAsync("sample.txt")
  .then((data) => {
    console.log(data);
  })
  .catch((error) => {
    console.error(error);
  });
```

#### Problem 25: Parallel Fetch with Promise.all
**Problem:** Explain how to use `Promise.all` to fetch multiple resources in parallel and provide an example.

**Solution:**
`Promise.all` can be used to make multiple parallel requests.

```javascript
const urls = ["https://api.example.com/data1", "https://api.example.com/data2"];

const requests = urls.map((url) => fetch(url));

Promise.all(requests)
  .then((responses) => {
    return Promise.all(responses.map((response) => response.json()));
  })
  .then((data) => {
    console.log("Data 1:", data[0]);
    console.log("Data 2:", data[1]);
  })
  .catch((error) => {
    console.error(error);
  });
```
## JS HTML DOM
---
The HTML DOM (Document Object Model) in JavaScript is a programming interface that represents the structure and content of a web page as a tree-like structure of objects. It allows JavaScript to interact with and manipulate the elements and content of an HTML document dynamically. Here's a brief overview of key concepts related to the HTML DOM in JavaScript:

1. **Document Object Model (DOM):** The DOM is a hierarchical representation of an HTML document, where each HTML element is represented as an object. These objects can be manipulated using JavaScript to change the structure and content of the web page dynamically.

2. **DOM Elements:** HTML elements (e.g., `<div>`, `<p>`, `<a>`) are represented as DOM elements or nodes. Each element is an object with properties and methods that allow you to access and modify its attributes and content.

3. **Accessing Elements:** You can access DOM elements using various methods like `getElementById`, `getElementsByTagName`, `getElementsByClassName`, and more. Modern JavaScript often uses the `querySelector` and `querySelectorAll` methods to select elements using CSS-like selectors.

4. **Manipulating Content:** JavaScript can be used to change the text, attributes, and structure of DOM elements. For example, you can update text content, add or remove HTML elements, and modify attributes like `src` or `href`.

5. **Event Handling:** The DOM allows you to attach event listeners to elements, enabling you to respond to user interactions like clicks, input, and mouse movements. Event handlers are functions that execute in response to specific events.

6. **Traversal:** You can navigate the DOM tree by moving between parent, child, and sibling elements. This is useful for accessing related elements and performing complex operations.

7. **Creating Elements:** JavaScript can create new HTML elements dynamically and append them to the DOM. This is commonly used for adding content or components to a web page on-the-fly.

8. **Removing Elements:** Elements can be removed from the DOM using JavaScript, allowing you to clean up or modify the structure of a web page dynamically.

9. **Style and CSS:** You can access and modify the style properties of elements through the DOM, enabling dynamic styling changes. This is commonly used for animations and user interface effects.

10. **Document Lifecycle:** The DOM is affected by the document's lifecycle events, such as "DOMContentLoaded" and "load." These events allow you to run JavaScript code at specific times during the page's loading process.

### Document, Elements, HTML, Forms, CSS, Animations, Events, Event Listener, Navigation, Nodes, Collections, Node Lists
---

#### Problem 1: Accessing DOM Elements
**Problem:** Explain how to access HTML DOM elements in JavaScript and provide an example.

**Solution:**
You can access DOM elements using various methods like `getElementById` and `querySelector`.

```javascript
// Accessing an element by ID
const elementById = document.getElementById("myElementId");

// Accessing an element by class
const elementByClass = document.querySelector(".myElementClass");

// Accessing an element by tag name
const elementsByTag = document.getElementsByTagName("div");

// Accessing elements by CSS selector
const elementsBySelector = document.querySelectorAll(".mySelector");

// Accessing the document body
const bodyElement = document.body;
```

#### Problem 2: Modifying DOM Elements
**Problem:** Explain how to modify the content and attributes of DOM elements and provide an example.

**Solution:**
You can modify elements using properties like `textContent`, `innerHTML`, and `setAttribute`.

```javascript
// Modifying element content
const paragraph = document.getElementById("myParagraph");
paragraph.textContent = "New text content";

// Modifying inner HTML
const div = document.querySelector(".myDiv");
div.innerHTML = "<p>Updated HTML</p>";

// Modifying attributes
const image = document.getElementById("myImage");
image.setAttribute("src", "new_image.jpg");
```

#### Problem 3: Creating DOM Elements
**Problem:** Explain how to create new DOM elements and add them to the document and provide an example.

**Solution:**
You can create elements with `createElement` and append them using `appendChild`.

```javascript
// Create a new paragraph element
const newParagraph = document.createElement("p");
newParagraph.textContent = "New paragraph";

// Append it to an existing element
const container = document.getElementById("container");
container.appendChild(newParagraph);
```

#### Problem 4: Removing DOM Elements
**Problem:** Explain how to remove DOM elements from the document and provide an example.

**Solution:**
You can remove elements using the `remove` method.

```javascript
// Remove an element by reference
const elementToRemove = document.getElementById("elementToRemove");
elementToRemove.remove();

// Remove an element by parent and child relationship
const parent = document.getElementById("parentElement");
const child = document.getElementById("childElement");
parent.removeChild(child);
```

#### Problem 5: Handling DOM Events
**Problem:** Explain how to handle DOM events like clicks and keypresses and provide an example.

**Solution:**
You can add event listeners to elements to handle events.

```javascript
// Add a click event listener
const button = document.getElementById("myButton");
button.addEventListener("click", function () {
  alert("Button clicked!");
});

// Add a keypress event listener
document.addEventListener("keypress", function (event) {
  if (event.key === "Enter") {
    console.log("Enter key pressed");
  }
});
```

#### Problem 6: Dynamically Styling DOM Elements
**Problem:** Explain how to dynamically change the styles of DOM elements and provide an example.

**Solution:**
You can modify the `style` property of elements.

```javascript
// Change background color
const element = document.getElementById("myElement");
element.style.backgroundColor = "blue";

// Modify font size
const paragraph = document.querySelector(".myParagraph");
paragraph.style.fontSize = "16px";
```

#### Problem 7: Working with Forms and Input Elements
**Problem:** Explain how to work with HTML forms and input elements in JavaScript and provide an example.

**Solution:**
You can access form elements and their values.

```javascript
// Accessing form elements
const form = document.getElementById("myForm");
const inputField = form.querySelector("input[name='username']");

// Getting input value
const username = inputField.value;

// Submitting a form programmatically
form.submit();
```

#### Problem 8: Manipulating the Document Structure
**Problem:** Explain how to manipulate the structure of the HTML document, like creating and removing nodes, and provide an example.

**Solution:**
You can create, insert, and remove nodes in the document.

```javascript
// Create a new element
const newElement = document.createElement("div");
newElement.textContent = "New div";

// Insert it before another element
const referenceElement = document.getElementById("referenceElement");
referenceElement.parentNode.insertBefore(newElement, referenceElement);

// Remove an element
const elementToRemove = document.getElementById("elementToRemove");
elementToRemove.parentNode.removeChild(elementToRemove);
```

#### Problem 9: Using Node Lists and DOM Collections
**Problem:** Explain the concepts of Node Lists and DOM Collections and how to work with them in JavaScript and provide an example.

**Solution:**
Node Lists and DOM Collections are collections of DOM elements.

```javascript
// Using Node List (e.g., result of querySelectorAll)
const elements = document.querySelectorAll(".myElements");
elements.forEach((element) => {
  console.log(element.textContent);
});

// Using DOM Collection (e.g., result of getElementsByTagName)
const divs = document.getElementsByTagName("div");
for (let i = 0; i < divs.length; i++) {
  console.log(divs[i].textContent);
}
```

#### Problem 10: Animating DOM Elements
**Problem:** Explain how to animate DOM elements using JavaScript and provide an example.

**Solution:**
You can use JavaScript and CSS transitions or libraries like GreenSock (GSAP) for animations.

```javascript
// Using CSS transitions
const element = document.getElementById("animatedElement");
element.style.transition = "transform 2s";
element.style.transform = "translateX(100px)";

// Using GreenSock Animation Platform (GSAP)
gsap.to(".animateMe", { x: 200, duration: 2 });
```

#### Problem 11: Traversing the DOM
**Problem:** Explain how to traverse the DOM tree, moving between parent, child, and sibling elements, and provide an example.

**Solution:**
You can traverse the DOM tree using properties like `parentNode`, `children`, `nextSibling`, and `previousSibling`.

```javascript
const parentElement = document.getElementById("parent");
const firstChild = parentElement.firstChild;
const nextSibling = firstChild.nextSibling;
```

#### Problem 12: Adding and Removing Classes
**Problem:** Explain how to add and remove CSS classes from DOM elements and provide an example.

**Solution:**
You can use the `classList` property to manage classes.

```javascript
const element = document.getElementById("myElement");

// Adding a class
element.classList.add("active");

// Removing a class
element.classList.remove("inactive");

// Toggling a class
element.classList.toggle("highlight");
```

#### Problem 13: Handling Checkboxes and Radio Buttons
**Problem:** Explain how to work with checkboxes and radio buttons in forms using JavaScript and provide an example.

**Solution:**
You can access and manipulate the `checked` property of checkboxes and radio buttons.

```javascript
// Accessing a checkbox
const checkbox = document.getElementById("myCheckbox");

// Checking/unchecking a checkbox
checkbox.checked = true;

// Accessing a radio button
const radio = document.querySelector("input[name='gender']:checked");
```

#### Problem 14: Creating and Appending Table Rows
**Problem:** Explain how to create and append table rows dynamically in HTML tables and provide an example.

**Solution:**
You can create `tr` elements and append them to a `table`.

```javascript
// Create a new table row
const newRow = document.createElement("tr");

// Create and append table cells to the row
for (let i = 0; i < 3; i++) {
  const newCell = document.createElement("td");
  newCell.textContent = `Cell ${i + 1}`;
  newRow.appendChild(newCell);
}

// Append the row to the table
const table = document.getElementById("myTable");
table.appendChild(newRow);
```

#### Problem 15: Handling Mouse Events
**Problem:** Explain how to handle mouse events like mouseover, mouseout, and mouse click on DOM elements and provide an example.

**Solution:**
You can add event listeners for mouse events.

```javascript
// Mouseover event
const element = document.getElementById("myElement");
element.addEventListener("mouseover", function () {
  console.log("Mouse over element");
});

// Mouseout event
element.addEventListener("mouseout", function () {
  console.log("Mouse out of element");
});

// Click event
element.addEventListener("click", function () {
  console.log("Element clicked");
});
```

#### Problem 16: Validating Form Data
**Problem:** Explain how to validate form data using JavaScript and provide an example.

**Solution:**
You can use JavaScript to validate form input before submission.

```javascript
const form = document.getElementById("myForm");

form.addEventListener("submit", function (event) {
  const inputField = document.getElementById("username");
  const username = inputField.value;

  if (username.length < 5) {
    event.preventDefault(); // Prevent form submission
    alert("Username must be at least 5 characters long.");
  }
});
```

#### Problem 17: Creating Dropdown Menus
**Problem:** Explain how to create and manage dropdown menus in HTML and JavaScript and provide an example.

**Solution:**
You can create dropdown menus using HTML and toggle their visibility with JavaScript.

```javascript
const dropdownButton = document.getElementById("dropdownButton");
const dropdownMenu = document.getElementById("dropdownMenu");

dropdownButton.addEventListener("click", function () {
  dropdownMenu.classList.toggle("show");
});

// Close the dropdown when clicking outside
window.addEventListener("click", function (event) {
  if (!event.target.matches("#dropdownButton")) {
    dropdownMenu.classList.remove("show");
  }
});
```

#### Problem 18: Creating Sliders and Carousels
**Problem:** Explain how to create image sliders and carousels using HTML, CSS, and JavaScript and provide an example.

**Solution:**
You can create image sliders by changing the visibility of images using JavaScript.

```javascript
let currentIndex = 0;
const images = document.querySelectorAll(".slider-image");

function showImage(index) {
  images.forEach((image, i) => {
    if (i === index) {
      image.style.display = "block";
    } else {
      image.style.display = "none";
    }
  });
}

function nextSlide() {
  currentIndex++;
  if (currentIndex >= images.length) {
    currentIndex = 0;
  }
  showImage(currentIndex);
}

function prevSlide() {
  currentIndex--;
  if (currentIndex < 0) {
    currentIndex = images.length - 1;
  }
  showImage(currentIndex);
}

showImage(currentIndex);

// Example usage with buttons
document.getElementById("nextButton").addEventListener("click", nextSlide);
document.getElementById("prevButton").addEventListener("click", prevSlide);
```

### Problem 19: Dynamic Content Loading
**Problem:** Explain how to load content dynamically from a server and update the DOM using JavaScript and provide an example.

**Solution:**
You can use the `fetch` API to retrieve data from a server and update the DOM with the received data.

```javascript
const button = document.getElementById("loadDataButton");
const contentContainer = document.getElementById("contentContainer");

button.addEventListener("click", function () {
  fetch("https://api.example.com/data")
    .then((response) => response.json())
    .then((data) => {
      contentContainer.textContent = data.message;
    })
    .catch((error) => {
      console.error(error);
    });
});
```

### Problem 20: Implementing a Lightbox Gallery
**Problem:** Explain how to create a lightbox gallery for images using HTML, CSS, and JavaScript and provide an example.

**Solution:**
You can create a lightbox by displaying images in a modal dialog.

```javascript
const images = document.querySelectorAll(".lightbox-image");
const modal = document.getElementById("lightboxModal");
const modalImage = document.getElementById("modalImage");

images.forEach((image) => {
  image.addEventListener("click", function () {
    modal.style.display = "block";
    modalImage.src = this.src;
  });
});

modal.addEventListener("click", function () {
  modal.style.display = "none";
});
```


### Problem 21: Implementing a Tabbed Interface
**Problem:** Explain how to create a tabbed interface using HTML, CSS, and JavaScript and provide an example.

**Solution:**
You can create a tabbed interface by showing and hiding content based on user clicks.

```javascript
const tabButtons = document.querySelectorAll(".tab-button");
const tabContents = document.querySelectorAll(".tab-content");

tabButtons.forEach((button, index) => {
  button.addEventListener("click", function () {
    // Hide all tab contents
    tabContents.forEach((content) => {
      content.style.display = "none";
    });

    // Show the selected tab content
    tabContents[index].style.display = "block";
  });
});
```

### Problem 22: Drag and Drop Elements
**Problem:** Explain how to implement drag and drop functionality for DOM elements using JavaScript and provide an example.

**Solution:**
You can make elements draggable and handle the drag-and-drop events.

```javascript
const draggableElement = document.getElementById("draggableElement");

draggableElement.addEventListener("dragstart", function (event) {
  event.dataTransfer.setData("text/plain", "This is draggable!");
});

const dropZone = document.getElementById("dropZone");

dropZone.addEventListener("dragover", function (event) {
  event.preventDefault();
});

dropZone.addEventListener("drop", function (event) {
  event.preventDefault();
  const data = event.dataTransfer.getData("text/plain");
  dropZone.textContent = data;
});
```

### Problem 23: Implementing a Tooltip
**Problem:** Explain how to create tooltips for HTML elements using JavaScript and provide an example.

**Solution:**
You can show and hide tooltips on hover events.

```javascript
const tooltipTrigger = document.getElementById("tooltipTrigger");
const tooltip = document.getElementById("tooltip");

tooltipTrigger.addEventListener("mouseenter", function () {
  tooltip.style.visibility = "visible";
});

tooltipTrigger.addEventListener("mouseleave", function () {
  tooltip.style.visibility = "hidden";
});
```

### Problem 24: Implementing Infinite Scrolling
**Problem:** Explain how to implement infinite scrolling for long lists of data in a web page using JavaScript and provide an example.

**Solution:**
You can load more data as the user scrolls down the page.

```javascript
const container = document.getElementById("scrollContainer");

container.addEventListener("scroll", function () {
  if (container.scrollTop + container.clientHeight >= container.scrollHeight) {
    // Load more data
    fetchMoreData();
  }
});
```

### Problem 25: Creating a Modal Dialog
**Problem:** Explain how to create a modal dialog box for displaying additional content using HTML, CSS, and JavaScript and provide an example.

**Solution:**
You can create a modal by displaying a hidden div when triggered.

```javascript
const openModalButton = document.getElementById("openModalButton");
const modal = document.getElementById("modal");
const closeModalButton = document.getElementById("closeModalButton");

openModalButton.addEventListener("click", function () {
  modal.style.display = "block";
});

closeModalButton.addEventListener("click", function () {
  modal.style.display = "none";
});
```

### Problem 26: Manipulating the History API
**Problem:** Explain how to manipulate the browser's history using the History API in JavaScript and provide an example.

**Solution:**
You can use the `pushState` and `popstate` events to change and monitor the browser's history.

```javascript
const backButton = document.getElementById("backButton");

backButton.addEventListener("click", function () {
  history.pushState(null, null, "new-url.html");
});

window.addEventListener("popstate", function (event) {
  alert("Back button pressed!");
});
```

### Problem 27: Creating a Sticky Navigation Bar
**Problem:** Explain how to create a sticky navigation bar that stays fixed at the top of the page as the user scrolls and provide an example.

**Solution:**
You can use CSS and JavaScript to create a sticky navigation bar.

```javascript
const navbar = document.getElementById("navbar");
const sticky = navbar.offsetTop;

window.addEventListener("scroll", function () {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky");
  } else {
    navbar.classList.remove("sticky");
  }
});
```

### Problem 28: Filtering and Sorting Data
**Problem:** Explain how to filter and sort data in a web page using JavaScript and provide an example.

**Solution:**
You can filter and sort data based on user interactions.

```javascript
const data = [...]; // Your data array
const filterButton = document.getElementById("filterButton");
const sortButton = document.getElementById("sortButton");

filterButton.addEventListener("click", function () {
  const filteredData = data.filter((item) => /* Filter criteria */);
  // Display filtered data
});

sortButton.addEventListener("click", function () {
  const sortedData = data.sort((a, b) => /* Sort criteria */);
  // Display sorted data
});
```

### Problem 29: Implementing Lazy Loading for Images
**Problem:** Explain how to implement lazy loading for images on a web page to improve performance and provide an example.

**Solution:**
You can load images only when they come into the viewport.

```javascript
const lazyImages = document.querySelectorAll(".lazy-image");

lazyImages.forEach((image) => {
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        image.src = image.dataset.src;
        observer.unobserve(image);
      }
    });
  });

  observer.observe(image);
});
```

### Problem 30: Creating a Content Slider
**Problem:** Explain how to create a content slider (carousel) that displays multiple items at once using HTML, CSS, and JavaScript and provide an example.

**Solution:**
You can create a content slider by shifting the visible items.

```javascript
const sliderContainer = document.getElementById("sliderContainer");
const sliderItems = document.querySelectorAll(".slider-item");
const prevButton = document.getElementById("prevButton");
const nextButton = document.getElementById("nextButton");

let currentIndex = 0;

nextButton.addEventListener("click", function () {
  currentIndex++;
  if (currentIndex >= sliderItems.length) {
    currentIndex = 0;
  }
  updateSlider();
});

prevButton.addEventListener("click", function () {
  currentIndex--;
  if (currentIndex < 0) {
    currentIndex = sliderItems.length - 1;
  }
  updateSlider();
});

function updateSlider() {
  const itemWidth = sliderItems[0].offsetWidth;
  const translateX = -currentIndex * itemWidth;
  sliderContainer.style.transform = `translateX(${translateX}px)`;
}
```

### Problem 31: Implementing Client-Side Form Validation
**Problem:** Explain how to perform client-side form validation using JavaScript and provide an example.

**Solution:**
You can validate user input in forms before submission.

```javascript
const form = document.getElementById("myForm");

form.addEventListener("submit", function (event) {
  const inputField = document.getElementById("email");
  const email = inputField.value;

  if (!isValidEmail(email)) {
    event.preventDefault(); // Prevent form submission
    alert("Please enter a valid email address.");
  }
});

function isValidEmail(email) {
  // Implement email validation logic
  return /\S+@\S+\.\S+/.test(email);
}
```

### Problem 32: Creating a Dynamic Dropdown Menu
**Problem:** Explain how to create a dynamic dropdown menu that loads options from an API using JavaScript and provide an example.

**Solution:**
You can populate a dropdown dynamically with data fetched from an API.

```javascript
const dropdown = document.getElementById("myDropdown");

fetch("https://api.example.com/options")
  .then((response) => response.json())
  .then((data) => {
    data.forEach((option) => {
      const optionElement = document.createElement("option");
      optionElement.value = option.value;
      optionElement.textContent = option.label;
      dropdown.appendChild(optionElement);
    });
  })
  .catch((error) => {
    console.error(error);
  });
```

### Problem 33: Creating a Progress Bar
**Problem:** Explain how to create a progress bar that shows the progress of a task using HTML, CSS, and JavaScript and provide an example.

**Solution:**
You can update the progress bar as a task progresses.

```javascript
const progressBar = document.getElementById("progressBar");
const startButton = document.getElementById("startButton");

startButton.addEventListener("click", function () {
  let progress = 0;
  const interval = setInterval(function () {
    if (progress >= 100) {
      clearInterval(interval);
    } else {
      progress += 1;
      progressBar.style.width = `${progress}%`;
    }
  }, 100);
});
```

### Problem 34: Implementing a Context Menu
**Problem:** Explain how to create a context menu that appears when right-clicking on an element using JavaScript and provide an example.

**Solution:**
You can show a custom context menu when the user right-clicks on an element.

```javascript
const contextMenu = document.getElementById("contextMenu");
const targetElement = document.getElementById("targetElement");

targetElement.addEventListener("contextmenu", function (event) {
  event.preventDefault();
  const x = event.clientX;
  const y = event.clientY;
  contextMenu.style.left = `${x}px`;
  contextMenu.style.top = `${y}px`;
  contextMenu.style.display = "block";
});

window.addEventListener("click", function () {
  contextMenu.style.display = "none";
});
```

### Problem 35: Implementing a Dark Mode Toggle
**Problem:** Explain how to implement a dark mode toggle for a web page using HTML, CSS, and JavaScript and provide an example.

**Solution:**
You can toggle between light and dark themes.

```javascript
const toggleButton = document.getElementById("darkModeToggle");
const body = document.body;

toggleButton.addEventListener("click", function () {
  body.classList.toggle("dark-mode");
});
```

### Problem 36: Creating a Collapsible FAQ Section
**Problem:** Explain how to create a collapsible FAQ section that expands and collapses answers on user clicks using HTML, CSS, and JavaScript and provide an example.

**Solution:**
You can toggle the visibility of answer sections.

```javascript
const faqItems = document.querySelectorAll(".faq-item");

faqItems.forEach((item) => {
  const question = item.querySelector(".faq-question");
  const answer = item.querySelector(".faq-answer");

  question.addEventListener("click", function () {
    answer.classList.toggle("open");
  });
});
```

### Problem 37: Implementing a Scroll-to-Top Button
**Problem:** Explain how to create a "scroll to top" button that appears when the user scrolls down and provide an example.

**Solution:**
You can show a button and scroll to the top of the page when clicked.

```javascript
const scrollToTopButton = document.getElementById("scrollToTop");

window.addEventListener("scroll", function () {
  if (window.pageYOffset > 100) {
    scrollToTopButton.style.display = "block";
  } else {
    scrollToTopButton.style.display = "none";
  }
});

scrollToTopButton.addEventListener("click", function () {
  window.scrollTo({ top: 0, behavior: "smooth" });
});
```

### Problem 38: Creating a Countdown Timer
**Problem:** Explain how to create a countdown timer that displays the remaining time in hours, minutes, and seconds using HTML, CSS, and JavaScript and provide an example.

**Solution:**
You can update the timer display at regular intervals.

```javascript
const timerDisplay = document.getElementById("timer");
const targetDate = new Date("2023-12-31 23:59:59").getTime();

function updateTimer() {
  const currentDate = new Date().getTime();
  const timeRemaining = targetDate - currentDate;

  const hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  const minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
  const seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

  timerDisplay.textContent = `${hours}:${minutes}:${seconds}`;
}

setInterval(updateTimer, 1000);
```

### Problem 39: Implementing a Multi-Step Form
**Problem:** Explain how to create a multi-step form with progress indicators using HTML, CSS, and JavaScript and provide an example.

**Solution:**
You can show/hide sections of the form based on the user's progress.

```javascript
const nextButton = document.getElementById("nextButton");
const prevButton = document.getElementById("prevButton");
const formSections = document.querySelectorAll(".form-section");
let currentStep = 0;

nextButton.addEventListener("click", function () {
  if (currentStep < formSections.length - 1) {
    formSections[currentStep].classList.remove("active");
    currentStep++;
    formSections[currentStep].classList.add("active");
  }
});

prevButton.addEventListener("click", function () {
  if (currentStep > 0) {
    formSections[currentStep].classList.remove("active");
    currentStep--;
    formSections[currentStep].classList.add("active");
  }
});
```

#### Problem 40: Creating a Dynamic Filter
**Problem:** Explain how to create a dynamic filter for a list of items based on user input using JavaScript and provide an example.

**Solution:**
You can filter items based on user input and update the displayed list.

```javascript
const inputFilter = document.getElementById("filterInput");
const itemList = document.getElementById("itemList");

inputFilter.addEventListener("input", function () {
  const filter = inputFilter.value.toLowerCase();
  const items = itemList.querySelectorAll(".item");

  items.forEach((item) => {
    const itemName = item.textContent.toLowerCase();
    if (itemName.includes(filter

)) {
      item.style.display = "block";
    } else {
      item.style.display = "none";
    }
  });
});
```

## JS BROWSER DOM
---

1. **Window Object (`window`):**
   - Represents the browser window or frame.
   - Provides access to various browser-related features and properties.
   - Example: `window.location` to access the current URL.

2. **Screen Object (`screen`):**
   - Represents the user's screen or display.
   - Provides information about screen dimensions and capabilities.
   - Example: `screen.width` to get the screen width in pixels.

3. **Location Object (`location`):**
   - Represents the current URL of the browser.
   - Allows you to manipulate or navigate to different URLs.
   - Example: `location.href` to get or set the current URL.

4. **History Object (`history`):**
   - Represents the browser's navigation history.
   - Allows you to move forward or backward in the user's history.
   - Example: `history.back()` to go back one page.

5. **Navigator Object (`navigator`):**
   - Provides information about the user's browser and system.
   - Contains properties like the browser name and version.
   - Example: `navigator.userAgent` to get the user agent string.

6. **Popup Alert (`alert`):**
   - Displays a small dialog box with a message to the user.
   - Often used for displaying notifications or simple prompts.
   - Example: `alert("Hello, World!")` to show a popup message.

7. **Timing Functions:**
   - JavaScript provides various timing functions to control the execution of code.
   - `setTimeout`: Executes a function once after a specified delay.
   - `setInterval`: Repeatedly executes a function at a specified interval.
   - Example: `setTimeout(function() { alert("Delayed message"); }, 2000);`

### Window, Screen, Location, History, Navigator, Popup Alert, Timing
---

#### Problem 1: Accessing the Browser Window Object
**Problem:** Explain how to access and manipulate the properties of the browser window object in JavaScript.

**Solution:**
You can access the `window` object and its properties.

```javascript
// Accessing the window object
const windowObject = window;

// Opening a new browser window
const newWindow = window.open("https://example.com");

// Closing the current window
window.close();
```

#### Problem 2: Getting Screen Information
**Problem:** Explain how to retrieve information about the user's screen using JavaScript.

**Solution:**
You can access properties of the `screen` object.

```javascript
// Getting screen width and height
const screenWidth = screen.width;
const screenHeight = screen.height;
```

#### Problem 3: Manipulating Browser Location
**Problem:** Explain how to change the URL of the current browser location using JavaScript.

**Solution:**
You can use the `location` object to manipulate the browser's URL.

```javascript
// Changing the URL
location.href = "https://newurl.com";

// Redirecting to another page
location.replace("https://anotherurl.com");
```

#### Problem 4: Using Browser History
**Problem:** Explain how to manipulate the browser's history using JavaScript.

**Solution:**
You can use the `history` object to navigate through the user's history.

```javascript
// Moving back one page
history.back();

// Moving forward one page
history.forward();

// Moving back or forward multiple steps
history.go(-2);
```

#### Problem 5: Accessing Browser Information
**Problem:** Explain how to access information about the user's browser using JavaScript.

**Solution:**
You can use the `navigator` object to retrieve browser-related information.

```javascript
// Getting the browser name and version
const browserName = navigator.appName;
const browserVersion = navigator.appVersion;
```

#### Problem 6: Displaying Popup Alerts
**Problem:** Explain how to display popup alert dialogs to the user using JavaScript.

**Solution:**
You can use the `alert` method to show alerts.

```javascript
// Displaying an alert message
alert("This is an alert!");
```

### Problem 7: Using Timing Functions
**Problem:** Explain how to use JavaScript timing functions like `setTimeout` and `setInterval` to execute code after a delay or at regular intervals.

**Solution:**
You can use `setTimeout` and `setInterval` for timed operations.

```javascript
// Execute a function after a delay
setTimeout(function () {
  console.log("Delayed execution");
}, 2000);

// Execute a function at regular intervals
const intervalId = setInterval(function () {
  console.log("Repeated execution");
}, 1000);

// Stop the interval after some time
setTimeout(function () {
  clearInterval(intervalId);
}, 5000);
```

### Problem 8: Working with Cookies
**Problem:** Explain how to create, read, and delete cookies in JavaScript.

**Solution:**
You can use the `document.cookie` property to work with cookies.

```javascript
// Creating a cookie
document.cookie = "username=John Doe; expires=Wed, 31 Dec 2023 00:00:00 UTC; path=/";

// Reading a cookie
const username = document.cookie;

// Deleting a cookie
document.cookie = "username=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
```


### Problem 9: Opening Links in a New Tab
**Problem:** Explain how to open links in a new browser tab or window using JavaScript.

**Solution:**
You can use JavaScript to open links in a new tab or window.

```javascript
// Open a link in a new tab
window.open("https://example.com", "_blank");

// Open a link in a new window with specific dimensions
window.open("https://example.com", "_blank", "width=500,height=300");
```

### Problem 10: Detecting User's Geolocation
**Problem:** Explain how to determine the user's geolocation (latitude and longitude) using JavaScript.

**Solution:**
You can use the `navigator.geolocation` API to obtain the user's geolocation.

```javascript
if ("geolocation" in navigator) {
  navigator.geolocation.getCurrentPosition(function (position) {
    const latitude = position.coords.latitude;
    const longitude = position.coords.longitude;
    console.log(`Latitude: ${latitude}, Longitude: ${longitude}`);
  });
} else {
  console.log("Geolocation is not available in this browser.");
}
```

### Problem 11: Modifying Browser Document Title
**Problem:** Explain how to change the title of the browser document dynamically using JavaScript.

**Solution:**
You can set the `document.title` property to modify the document's title.

```javascript
// Change the document title
document.title = "New Page Title";
```

### Problem 12: Handling Browser Window Resize
**Problem:** Explain how to detect and respond to changes in the browser window's size using JavaScript.

**Solution:**
You can add an event listener to the `window` object to handle window resize events.

```javascript
window.addEventListener("resize", function () {
  // Handle window resize
  const windowWidth = window.innerWidth;
  const windowHeight = window.innerHeight;
  console.log(`Window Width: ${windowWidth}, Window Height: ${windowHeight}`);
});
```

### Problem 13: Displaying a Confirmation Dialog
**Problem:** Explain how to display a confirmation dialog to the user before proceeding with an action using JavaScript.

**Solution:**
You can use the `confirm` method to show a confirmation dialog.

```javascript
// Display a confirmation dialog
const userConfirmed = confirm("Are you sure you want to delete this item?");

if (userConfirmed) {
  // User confirmed, proceed with the action
} else {
  // User canceled, do nothing
}
```

### Problem 14: Using Local Storage
**Problem:** Explain how to store and retrieve data in the browser's local storage using JavaScript.

**Solution:**
You can use the `localStorage` API to store and retrieve data.

```javascript
// Storing data in local storage
localStorage.setItem("username", "John");

// Retrieving data from local storage
const username = localStorage.getItem("username");

// Removing data from local storage
localStorage.removeItem("username");
```

### Problem 15: Capturing Keyboard Events
**Problem:** Explain how to capture and respond to keyboard events (e.g., keypress, keydown, keyup) using JavaScript.

**Solution:**
You can add event listeners to the `document` or specific elements to capture keyboard events.

```javascript
// Capture a keypress event
document.addEventListener("keypress", function (event) {
  console.log(`Key pressed: ${event.key}`);
});

// Capture a keydown event
document.addEventListener("keydown", function (event) {
  console.log(`Key down: ${event.key}`);
});

// Capture a keyup event
document.addEventListener("keyup", function (event) {
  console.log(`Key up: ${event.key}`);
});
```

### Problem 16: Handling Browser Page Reload
**Problem:** Explain how to handle and confirm page reload requests made by the user.

**Solution:**
You can add a `beforeunload` event listener to confirm page reload.

```javascript
window.addEventListener("beforeunload", function (event) {
  event.preventDefault();
  event.returnValue = "You have unsaved changes. Are you sure you want to leave?";
});
```

### Problem 17: Using Session Storage
**Problem:** Explain how to store and retrieve session-specific data in the browser's session storage using JavaScript.

**Solution:**
You can use the `sessionStorage` API to store and retrieve session-specific data.

```javascript
// Storing data in session storage
sessionStorage.setItem("theme", "dark");

// Retrieving data from session storage
const theme = sessionStorage.getItem("theme");

// Removing data from session storage
sessionStorage.removeItem("theme");
```

### Problem 18: Customizing Browser Context Menus
**Problem:** Explain how to customize the browser's context menu (right-click menu) using JavaScript.

**Solution:**
You can disable or customize the context menu using event listeners.

```javascript
// Disable the context menu
document.addEventListener("contextmenu", function (event) {
  event.preventDefault();
});

// Customize the context menu
document.addEventListener("contextmenu", function (event) {
  const customMenu = document.getElementById("customContextMenu");
  customMenu.style.display = "block";
  customMenu.style.left = `${event.pageX}px`;
  customMenu.style.top = `${event.pageY}px`;
});
```


### Problem 19: Controlling Fullscreen Mode
**Problem:** Explain how to programmatically control fullscreen mode for a web page using JavaScript.

**Solution:**
You can use the `document.fullscreenEnabled`, `document.requestFullscreen()`, and `document.exitFullscreen()` methods to control fullscreen mode.

```javascript
// Check if fullscreen is supported
if (document.fullscreenEnabled) {
  // Request fullscreen mode
  document.documentElement.requestFullscreen().catch((error) => {
    console.error(`Fullscreen request failed: ${error}`);
  });

  // Exit fullscreen mode
  document.exitFullscreen();
}
```

### Problem 20: Handling Browser Back Button
**Problem:** Explain how to detect and respond to the browser's back button using JavaScript.

**Solution:**
You can add an event listener to the `popstate` event to handle back button clicks.

```javascript
window.addEventListener("popstate", function (event) {
  // Handle back button click
  console.log("Back button clicked");
});
```

### Problem 21: Managing Browser Storage Limits
**Problem:** Explain how to handle browser storage limits (localStorage and sessionStorage) and gracefully handle storage quota exceeded errors.

**Solution:**
You can check storage limits and handle quota exceeded errors.

```javascript
// Check available storage space
const availableSpace = navigator.storage.estimate().then((estimate) => {
  console.log(`Available space: ${estimate.quota}`);
});

// Handle storage quota exceeded error
try {
  localStorage.setItem("largeData", bigData);
} catch (error) {
  if (error.name === "QuotaExceededError") {
    console.error("Storage quota exceeded.");
    // Handle the error gracefully
  } else {
    throw error;
  }
}
```

### Problem 22: Detecting Online/Offline Status
**Problem:** Explain how to detect the online and offline status of the user's device using JavaScript.

**Solution:**
You can use the `navigator.onLine` property to check the online status.

```javascript
if (navigator.onLine) {
  console.log("Online");
} else {
  console.log("Offline");
}

// Listen for online/offline events
window.addEventListener("online", function () {
  console.log("Device is now online");
});

window.addEventListener("offline", function () {
  console.log("Device is now offline");
});
```

### Problem 23: Modifying Browser Scroll Behavior
**Problem:** Explain how to modify the scroll behavior of the browser using JavaScript.

**Solution:**
You can use the `window.scroll` and `Element.scroll` methods to control scrolling.

```javascript
// Scroll to a specific position
window.scroll({
  top: 100,
  behavior: "smooth", // smooth scrolling
});

// Scroll an element into view
const element = document.getElementById("myElement");
element.scrollIntoView({ behavior: "smooth" });
```

### Problem 24: Controlling Page Printing
**Problem:** Explain how to control page printing behavior using JavaScript.

**Solution:**
You can use the `window.print()` method to trigger the print dialog.

```javascript
// Open the print dialog
document.getElementById("printButton").addEventListener("click", function () {
  window.print();
});
```

### Problem 25: Listening for Page Visibility Changes
**Problem:** Explain how to listen for changes in the visibility of the current page/tab using JavaScript.

**Solution:**
You can use the Page Visibility API to detect when a page becomes visible or hidden.

```javascript
// Listen for visibility change events
document.addEventListener("visibilitychange", function () {
  if (document.hidden) {
    console.log("Page is hidden");
  } else {
    console.log("Page is visible");
  }
});
```

### Problem 26: Customizing Browser Error Messages
**Problem:** Explain how to customize the default error messages displayed by the browser for certain types of errors, such as 404 (Not Found).

**Solution:**
You can create custom error pages and set them as the response for specific error codes.

```javascript
// Create a custom 404 Not Found page
const custom404Page = `
  <!DOCTYPE html>
  <html>
  <head>
    <title>404 Not Found</title>
  </head>
  <body>
    <h1>404 Not Found</h1>
    <p>The requested page could not be found.</p>
  </body>
  </html>
`;

// Set the custom 404 page as the response for 404 errors
const express = require("express");
const app = express();

app.use((req, res, next) => {
  res.status(404).send(custom404Page);
});

app.listen(3000, () => {
  console.log("Server is running on port 3000");
});
```

### Problem 27: Managing Browser Notifications
**Problem:** Explain how to request and manage browser notifications using JavaScript.

**Solution:**
You can use the Notification API to request and display notifications.

```javascript
// Request permission for notifications
if (Notification.permission !== "granted") {
  Notification.requestPermission().then(function (permission) {
    if (permission === "granted") {
      // Display a notification
      const notification = new Notification("New Message", {
        body: "You have a new message.",
      });
    }
  });
}
```

### Problem 28: Handling Browser Document Print Events
**Problem:** Explain how to detect and respond to print events triggered by the user using JavaScript.

**Solution:**
You can use the `window.onbeforeprint` and `window.onafterprint` events to handle print events.

```javascript
window.onbeforeprint = function () {
  // Code to run before printing
};

window.onafterprint = function () {
  // Code to run after printing
};
```

### Problem 29: Using the Clipboard API
**Problem:** Explain how to interact with the user's clipboard (copying and pasting) using the Clipboard API in JavaScript.

**Solution:**
You can use the Clipboard API to manipulate clipboard data.

```javascript
// Copy text to clipboard
document.getElementById("copyButton").addEventListener("click", function () {
  const textToCopy = "This text will be copied to the clipboard.";
  navigator.clipboard.writeText(textToCopy);
});

// Paste text from clipboard
document.getElementById("pasteButton").addEventListener("click", async function () {
  const clipboardText = await navigator.clipboard.readText();
  console.log("Pasted text:", clipboardText);
});
```


## JS JSON
---

**JSON Characteristics:**

- JSON data is represented as key-value pairs.
- Data is enclosed in curly braces `{}`.
- Key-value pairs are separated by commas.
- Keys are strings enclosed in double quotes `""`.
- Values can be strings, numbers, objects, arrays, booleans, or `null`.
- JSON is language-independent, making it ideal for communication between different systems.

**Examples of JSON:**

Here are some examples of JSON data:

1. **Simple JSON Object:**

```json
{
  "name": "John",
  "age": 30,
  "city": "New York"
}
```

2. **JSON Array:**

```json
[
  "apple",
  "banana",
  "cherry"
]
```

3. **Nested JSON Object:**

```json
{
  "person": {
    "name": "Alice",
    "age": 25
  },
  "location": "London"
}
```

4. **JSON Array of Objects:**

```json
[
  {
    "name": "Tom",
    "age": 28
  },
  {
    "name": "Lisa",
    "age": 22
  }
]
```

**JavaScript Example - Parsing JSON:**

```javascript
// JSON string
var jsonString = '{"name": "John", "age": 30, "city": "New York"}';

// Parse JSON into JavaScript object
var person = JSON.parse(jsonString);

// Accessing values
console.log(person.name); // Output: John
console.log(person.age);  // Output: 30
console.log(person.city); // Output: New York
```

### Syntax, vs XML, Data Types, Parse, Stringify, Objects, Arrays, Server, PHP, HTML, JSONP
---

#### Problem 1: Introduction to JSON
**Problem:** Explain what JSON (JavaScript Object Notation) is and why it is important in web development.

**Solution:**
JSON is a lightweight data interchange format used to store and exchange data between a server and a web application. It is easy for humans to read and write and easy for machines to parse and generate. JSON is commonly used for data transfer in web APIs.

```javascript
// JSON example
{
  "name": "John Doe",
  "age": 30,
  "city": "New York"
}
```

#### Problem 2: JSON Syntax
**Problem:** Describe the syntax rules for writing valid JSON.

**Solution:**
JSON syntax consists of key-value pairs, where keys are strings enclosed in double quotes and values can be strings, numbers, objects, arrays, booleans, null, or nested JSON objects.

```javascript
{
  "name": "Alice",
  "age": 25,
  "isStudent": true,
  "scores": [95, 88, 92],
  "address": {
    "street": "123 Main St",
    "city": "Seattle"
  }
}
```

#### Problem 3: JSON vs XML
**Problem:** Compare and contrast JSON with XML as data interchange formats in web development.

**Solution:**
JSON is more compact and easier to read than XML. It is also easier to parse in JavaScript. XML is more suitable for complex data structures and has better support for metadata.

#### Problem 4: JSON Data Types
**Problem:** Explain the different data types that can be used in JSON.

**Solution:**
JSON supports the following data types: strings, numbers, objects, arrays, booleans, null.

```javascript
{
  "name": "Alice",        // String
  "age": 25,              // Number
  "isStudent": true,      // Boolean
  "scores": [95, 88, 92], // Array
  "address": null         // Null
}
```

#### Problem 5: Parsing JSON
**Problem:** Describe how to parse a JSON string into a JavaScript object.

**Solution:**
You can use the `JSON.parse()` method to parse a JSON string into a JavaScript object.

```javascript
const jsonString = '{"name": "Bob", "age": 28}';
const parsedData = JSON.parse(jsonString);
console.log(parsedData.name); // Output: Bob
```

#### Problem 6: Stringifying JSON
**Problem:** Explain how to convert a JavaScript object into a JSON string.

**Solution:**
You can use the `JSON.stringify()` method to convert a JavaScript object into a JSON string.

```javascript
const data = { name: "Charlie", age: 35 };
const jsonString = JSON.stringify(data);
console.log(jsonString); // Output: '{"name":"Charlie","age":35}'
```

#### Problem 7: Working with JSON Objects
**Problem:** Describe how to access and manipulate JSON objects in JavaScript.

**Solution:**
You can access JSON object properties using dot notation or bracket notation.

```javascript
const person = {
  "name": "Eve",
  "age": 22,
  "city": "San Francisco"
};

console.log(person.name); // Output: Eve
person.city = "Los Angeles"; // Modify a property
```

#### Problem 8: Working with JSON Arrays
**Problem:** Explain how to work with JSON arrays in JavaScript.

**Solution:**
JSON arrays are ordered lists of values, and you can access array elements using their index.

```javascript
const colors = ["red", "green", "blue"];
console.log(colors[0]); // Output: red
colors.push("yellow"); // Add an element to the array
```

#### Problem 9: Setting Up a JSON Server
**Problem:** Describe how to set up a simple JSON server to serve JSON data for a web application.

**Solution:**
You can use tools like JSON Server to create a fake REST API from a JSON file.

```javascript
// Install JSON Server globally
npm install -g json-server

// Create a JSON file (e.g., db.json)
// Start JSON Server with the JSON file
json-server --watch db.json
```

#### Problem 10: Making JSON Requests with PHP
**Problem:** Explain how to make JSON requests to a server using PHP and receive JSON responses.

**Solution:**
In PHP, you can use the `json_encode()` function to convert data into JSON format and `json_decode()` to parse JSON data.

```php
// PHP server-side code
$data = array("name" => "David", "age" => 28);
header("Content-Type: application/json");
echo json_encode($data);
```

#### Problem 11: Working with JSON in HTML
**Problem:** Explain how to work with JSON data in an HTML document using JavaScript.

**Solution:**
You can use JavaScript to fetch JSON data and display it in an HTML document.

```html
<!-- HTML -->
<div id="output"></div>

<script>
  // JavaScript
  fetch("data.json")
    .then((response) => response.json())
    .then((data) => {
      const outputDiv = document.getElementById("output");
      outputDiv.textContent = `Name: ${data.name}, Age: ${data.age}`;
    });
</script>
```

#### Problem 12: Implementing JSONP for Cross-Domain Requests
**Problem:** Describe how to implement JSONP (JSON with Padding) for making cross-domain requests in JavaScript.

**Solution:**
You can use JSONP to overcome cross-origin restrictions in web browsers.

```javascript
function handleResponse(data) {
  console.log(data);
}

const script = document.createElement("script");
script.src = "https://example.com/data?callback=handleResponse";
document.body.appendChild(script);
```

#### Problem 13: Handling Invalid JSON Data
**Problem:** Explain how to handle and gracefully recover from invalid JSON data in JavaScript.

**Solution:**
You can use a try-catch block to handle JSON parsing errors.

```javascript
try {
  const invalidJson = "This is not valid JSON";
  const parsedData = JSON.parse(invalidJson);
} catch (error) {
  console.error("JSON parsing error:", error.message);
}
```

#### Problem 14: Fetching JSON Data from an API
**Problem:** Describe how to fetch JSON data from a remote API using the Fetch API in JavaScript.

**Solution:**
You can use the Fetch API to make HTTP requests and retrieve JSON data from an API.

```javascript
fetch("https://api.example.com/data")
  .then((response) => response.json())
  .then((data) => {
    console.log(data);
  })
  .catch((error) => {
    console.error("Error fetching data:", error);
  });
```

#### Problem 15: Validating JSON Data
**Problem:** Explain how to validate JSON data to ensure it meets specific criteria in JavaScript.

**Solution:**
You can validate JSON data by checking its structure and values.

```javascript
const jsonData = {
  name: "Alice",
  age: 30,
};

if (typeof jsonData.name === "string" && jsonData.age >= 18) {
  console.log("Valid JSON data");
} else {
  console.error("Invalid JSON data");
}
```

#### Problem 16: Converting JSON to CSV
**Problem:** Describe how to convert JSON data into a CSV (Comma-Separated Values) format in JavaScript.

**Solution:**
You can write custom code to convert JSON to CSV or use libraries like `json2csv`.

```javascript
const json2csv = require("json2csv").Parser;

const jsonData = [
  { name: "Alice", age: 25 },
  { name: "Bob", age: 30 },
];

const jsonParser = new json2csv();
const csvData = jsonParser.parse(jsonData);

console.log(csvData);
```

#### Problem 17: Sorting JSON Data
**Problem:** Explain how to sort JSON data based on a specific property in JavaScript.

**Solution:**
You can use the `Array.sort()` method to sort JSON data.

```javascript
const jsonData = [
  { name: "Alice", age: 25 },
  { name: "Bob", age: 30 },
  { name: "Charlie", age: 22 },
];

jsonData.sort((a, b) => a.age - b.age);

console.log(jsonData);
```

#### Problem 18: Filtering JSON Data
**Problem:** Describe how to filter JSON data to retrieve specific elements based on certain criteria.

**Solution:**
You can use the `Array.filter()` method to filter JSON data.

```javascript
const jsonData = [
  { name: "Alice", age: 25 },
  { name: "Bob", age: 30 },
  { name: "Charlie", age: 22 },
];

const filteredData = jsonData.filter((item) => item.age >= 25);

console.log(filteredData);
```

#### Problem 19: Modifying JSON Data
**Problem:** Explain how to modify JSON data by adding, updating, or removing properties.

**Solution:**
You can directly manipulate JSON objects in JavaScript.

```javascript
const jsonData = { name: "Eve", age: 28 };

// Add a new property
jsonData.city = "San Francisco";

// Update an existing property
jsonData.age = 29;

// Remove a property
delete jsonData.age;

console.log(jsonData);
```

#### Problem 20: Combining JSON Objects
**Problem:** Describe how to combine multiple JSON objects into a single object in JavaScript.

**Solution:**
You can use the `Object.assign()` method to merge JSON objects.

```javascript
const object1 = { a: 1, b: 2 };
const object2 = { b: 3, c: 4 };
const combinedObject = Object.assign({}, object1, object2);

console.log(combinedObject);
```

#### Problem 21: Validating JSON Schema
**Problem:** Explain how to validate JSON data against a specific JSON schema in JavaScript.

**Solution:**
You can use libraries like `ajv` to validate JSON data against a JSON schema.

```javascript
const Ajv = require("ajv");
const ajv = new Ajv();

const schema = {
  type: "object",
  properties: {
    name: { type: "string" },
    age: { type: "number" },
  },
  required: ["name", "age"],
};

const jsonData = { name: "Alice", age: 30 };

const validate = ajv.compile(schema);
const isValid = validate(jsonData);

if (isValid) {
  console.log("JSON data is valid");
} else {
  console.error("JSON data is invalid:", validate.errors);
}
```

#### Problem 22: Pretty Printing JSON
**Problem:** Describe how to format JSON data for human readability in JavaScript.

**Solution:**
You can use the `JSON.stringify()` method with spacing to pretty-print JSON.

```javascript
const jsonData = { name: "Eve", age: 28 };

const prettyJson = JSON.stringify(jsonData, null, 2);

console.log(prettyJson);
```

#### Problem 23: Parsing Dates in JSON
**Problem:** Explain how to parse and serialize date values in JSON correctly.

**Solution:**
You can use custom functions or libraries like `date-fns` to handle date parsing and serialization.

```javascript
const date = new Date();
const jsonData = { date: date.toISOString() };

// Parse the date from JSON
const parsedDate = new Date(jsonData.date);

console.log(parsedDate);
```

#### Problem 24: Using JSON with Promises
**Problem:** Describe how to work with JSON data using Promises in JavaScript.

**Solution:**
You can use Promises to fetch and process JSON data asynchronously.

```javascript
function fetchData() {
  return fetch("https://api.example.com/data")
    .then((response) => response.json())
    .then((data) => {
      return data;
    })
    .catch((error) => {
      console.error("Error fetching data:", error);
    });
}

fetchData().then((jsonData) => {
  console.log(jsonData);
});
```

#### Problem 25: Handling Nested JSON
**Problem:** Explain how to work with nested JSON structures and access nested properties.

**Solution:**
You can access nested properties using dot notation or bracket notation.

```javascript
const jsonData = {
  user: {
    name: "Frank",
    age: 35,
  },
};

console.log(jsonData.user.name); // Output: Frank
```

#### Problem 26: Serializing Functions in JSON
**Problem:** Describe how to serialize and deserialize JavaScript functions in JSON.

**Solution:**
You can't directly serialize functions in JSON. Instead, pass function names or use custom serialization and deserialization.

```javascript
// Serialize a function name
const jsonData = { action: "myFunction" };

// Deserialize and execute the function
const actionFunction = window[jsonData.action];
if (typeof actionFunction === "function") {
  actionFunction();
}
```

#### Problem 27: Generating JSON Data Randomly
**Problem:** Explain how to generate random JSON data for testing and simulation purposes.

**Solution:**
You can use libraries like `faker.js` to generate random JSON data.

```javascript
const faker = require("faker");

const randomData = {
  name: faker.name.firstName(),
  email: faker.internet.email(),
  age: faker.datatype.number({ min: 18, max: 80 }),
};

console.log(randomData);
```

#### Problem 28: Parsing JSON from External Files
**Problem:** Describe how to parse JSON data stored in external files using JavaScript.

**Solution:**
You can use the `fetch` API or other methods to load JSON data from external files.

```javascript
// Using fetch to load JSON data from a file
fetch("data.json")
  .then((response) => response.json())
  .then((data) => {
    console.log(data);
  })
  .catch((error) => {
    console.error("Error loading JSON:", error);
  });
```

#### Problem 29: Creating JSON-based Configurations
**Problem:** Explain how to use JSON files for configuration settings in a JavaScript application.

**Solution:**
You can store configuration settings in a JSON file and read them into your application.

```json
// config.json
{
  "apiUrl": "https://api.example.com",
  "apiKey": "your-api-key"
}
```

```javascript
// Read configuration from JSON file
const config = require("./config.json");

console.log(config.apiUrl);
```

#### Problem 30: Handling Large JSON Data Efficiently
**Problem:** Describe strategies for handling large JSON data efficiently in JavaScript.

**Solution:**
You can use streaming or pagination techniques to handle large JSON data without loading it all at once.

```javascript
// Stream large JSON data
const fs = require("fs");
const readStream = fs.createReadStream("large-data.json");

readStream.on("data", (chunk) => {
  // Process each chunk of data
});
```

## JS jquery methods
---

1. **`$(document).ready()`**:
   - Ensures that code within it is executed when the document is fully loaded.
   - Example:
     ```javascript
     $(document).ready(function() {
       // Your code here
     });
     ```

2. **`$(selector).click()`**:
   - Attaches a click event handler to the selected element(s).
   - Example:
     ```javascript
     $("button").click(function() {
       alert("Button clicked!");
     });
     ```

3. **`$(selector).addClass()`**:
   - Adds one or more CSS classes to the selected element(s).
   - Example:
     ```javascript
     $("p").addClass("highlight");
     ```

4. **`$(selector).removeClass()`**:
   - Removes one or more CSS classes from the selected element(s).
   - Example:
     ```javascript
     $("p").removeClass("highlight");
     ```

5. **`$(selector).css()`**:
   - Sets or retrieves CSS properties of the selected element(s).
   - Example:
     ```javascript
     $("div").css("background-color", "yellow");
     ```

6. **`$(selector).fadeIn()`** and **`$(selector).fadeOut()`**:
   - Animates the opacity of the selected element(s) to make them appear or disappear gradually.
   - Example:
     ```javascript
     $("p").fadeIn();
     $("p").fadeOut();
     ```

7. **`$(selector).html()`**:
   - Sets or retrieves the HTML content of the selected element(s).
   - Example:
     ```javascript
     $("div").html("<p>New content</p>");
     ```

8. **`$(selector).text()`**:
   - Sets or retrieves the text content of the selected element(s).
   - Example:
     ```javascript
     $("p").text("New text");
     ```

9. **`$(selector).append()`** and **`$(selector).prepend()`**:
   - Adds content to the end or beginning of the selected element(s).
   - Example:
     ```javascript
     $("ul").append("<li>New item</li>");
     ```

10. **`$(selector).on()`**:
    - Attaches one or more event handlers to selected elements.
    - Example:
      ```javascript
      $("p").on("click", function() {
        alert("Paragraph clicked!");
      });
      ```

### serializeArray, serialize,FormData, JSON Data, Plain Text Data, XML Data, & Custom Data
---


#### Problem 1: Using `serializeArray` to Encode Form Data
**Problem:** Explain how to use the `serializeArray` method in jQuery to encode form data for an AJAX request.

**Solution:**
You can use `serializeArray` to serialize form data into an array of objects, which can then be used in an AJAX request.

```javascript
// HTML form
<form id="myForm">
  <input type="text" name="name" value="John">
  <input type="email" name="email" value="john@example.com">
</form>

// JavaScript
const formData = $("#myForm").serializeArray();
console.log(formData);
```

#### Problem 2: Serializing Form Data with `serialize`
**Problem:** Describe how to use the `serialize` method in jQuery to serialize form data as a URL-encoded string.

**Solution:**
You can use `serialize` to encode form data as a URL-encoded string for use in an AJAX request.

```javascript
// HTML form
<form id="myForm">
  <input type="text" name="name" value="Alice">
  <input type="email" name="email" value="alice@example.com">
</form>

// JavaScript
const formData = $("#myForm").serialize();
console.log(formData);
```

#### Problem 3: Sending Form Data with `FormData`
**Problem:** Explain how to use the `FormData` object to send form data in an AJAX request.

**Solution:**
You can use `FormData` to construct a set of key/value pairs representing form fields and their values.

```javascript
// HTML form
<form id="myForm">
  <input type="text" name="name" value="Bob">
  <input type="email" name="email" value="bob@example.com">
</form>

// JavaScript
const formData = new FormData(document.getElementById("myForm"));

$.ajax({
  url: "/submit",
  type: "POST",
  data: formData,
  processData: false, // Prevent jQuery from processing the data
  contentType: false, // Let the server handle the content type
  success: function (response) {
    console.log("Success:", response);
  },
  error: function (error) {
    console.error("Error:", error);
  },
});
```

#### Problem 4: Sending JSON Data in an AJAX Request
**Problem:** Describe how to send JSON data in the request body of an AJAX POST request.

**Solution:**
You can use the `JSON.stringify` method to convert a JavaScript object to a JSON string and send it in an AJAX request.

```javascript
const jsonData = { name: "Charlie", age: 30 };

$.ajax({
  url: "/submit",
  type: "POST",
  data: JSON.stringify(jsonData),
  contentType: "application/json", // Set the content type to JSON
  success: function (response) {
    console.log("Success:", response);
  },
  error: function (error) {
    console.error("Error:", error);
  },
});
```

#### Problem 5: Receiving Plain Text Data in an AJAX Response
**Problem:** Explain how to receive plain text data in the response of an AJAX request.

**Solution:**
You can specify the `dataType` option as "text" to receive plain text data.

```javascript
$.ajax({
  url: "/data",
  type: "GET",
  dataType: "text", // Receive plain text data
  success: function (response) {
    console.log("Text Data:", response);
  },
  error: function (error) {
    console.error("Error:", error);
  },
});
```

#### Problem 6: Receiving XML Data in an AJAX Response
**Problem:** Describe how to receive XML data in the response of an AJAX request.

**Solution:**
You can specify the `dataType` option as "xml" to receive XML data.

```javascript
$.ajax({
  url: "/data.xml",
  type: "GET",
  dataType: "xml", // Receive XML data
  success: function (response) {
    console.log("XML Data:", response);
  },
  error: function (error) {
    console.error("Error:", error);
  },
});
```

#### Problem 7: Custom Data Serialization in AJAX Requests
**Problem:** Explain how to customize data serialization in AJAX requests, e.g., sending data in a custom format.

**Solution:**
You can use the `dataFilter` option to specify a function that processes the data before it is passed to the success handler.

```javascript
$.ajax({
  url: "/data",
  type: "GET",
  data: { name: "David", age: 25 },
  dataFilter: function (data, dataType) {
    // Customize data serialization here
    return "Customized: " + data;
  },
  success: function (response) {
    console.log("Customized Data:",

 response);
  },
  error: function (error) {
    console.error("Error:", error);
  },
});
```

#### Problem 8: Sending and Receiving Binary Data
**Problem:** Describe how to send and receive binary data in an AJAX request.

**Solution:**
You can use the `dataType` option as "binary" to handle binary data.

```javascript
$.ajax({
  url: "/binary-data",
  type: "GET",
  dataType: "binary", // Receive binary data
  processData: false, // Prevent jQuery from processing the data
  success: function (response) {
    // Process binary data here
    console.log("Binary Data:", response);
  },
  error: function (error) {
    console.error("Error:", error);
  },
});
```

#### Problem 9: Handling AJAX Errors
**Problem:** Explain how to handle AJAX errors, such as network failures or server errors.

**Solution:**
You can use the `error` callback to handle AJAX errors.

```javascript
$.ajax({
  url: "/data",
  type: "GET",
  success: function (response) {
    console.log("Data:", response);
  },
  error: function (error) {
    console.error("Error:", error.statusText);
  },
});
```

#### Problem 10: Handling AJAX Timeouts
**Problem:** Describe how to handle AJAX timeouts when a request takes too long to complete.

**Solution:**
You can set the `timeout` option to specify the maximum time for a request to complete and handle timeouts in the `error` callback.

```javascript
$.ajax({
  url: "/slow-api",
  type: "GET",
  timeout: 5000, // Set a 5-second timeout
  success: function (response) {
    console.log("Data:", response);
  },
  error: function (error) {
    if (error.statusText === "timeout") {
      console.error("Request timed out");
    } else {
      console.error("Error:", error.statusText);
    }
  },
});
```

#### Problem 11: Sending Cookies in an AJAX Request
**Problem:** Explain how to send cookies in an AJAX request using jQuery.

**Solution:**
You can set the `xhrFields` option to include cookies in the request.

```javascript
$.ajax({
  url: "/data",
  type: "GET",
  xhrFields: {
    withCredentials: true, // Include cookies in the request
  },
  success: function (response) {
    console.log("Data:", response);
  },
  error: function (error) {
    console.error("Error:", error);
  },
});
```

#### Problem 12: Handling AJAX Success with Deferred Objects
**Problem:** Describe how to handle AJAX success using jQuery Deferred objects.

**Solution:**
You can use Deferred objects to handle the success and failure of asynchronous operations.

```javascript
const ajaxRequest = $.ajax({
  url: "/data",
  type: "GET",
});

ajaxRequest.done(function (response) {
  console.log("Success:", response);
});

ajaxRequest.fail(function (error) {
  console.error("Error:", error);
});
```

#### Problem 13: Uploading Files with AJAX Using `FormData`
**Problem:** Explain how to upload files with AJAX using the `FormData` object in jQuery.

**Solution:**
You can use `FormData` to upload files in an AJAX request.

```javascript
// HTML form with file input
<form id="fileForm">
  <input type="file" name="file" id="fileInput">
</form>

// JavaScript
const fileInput = document.getElementById("fileInput");
const file = fileInput.files[0];

const formData = new FormData();
formData.append("file", file);

$.ajax({
  url: "/upload",
  type: "POST",
  data: formData,
  contentType: false, // Let the server handle the content type
  processData: false, // Prevent jQuery from processing the data
  success: function (response) {
    console.log("File uploaded:", response);
  },
  error: function (error) {
    console.error("Error:", error);
  },
});
```

#### Problem 14: Handling Cross-Origin AJAX Requests
**Problem:** Explain how to handle cross-origin AJAX requests using jQuery.

**Solution:**
You can use the `crossDomain` option and set the server's CORS headers to allow cross-origin requests.

```javascript
$.ajax({
  url: "https://example.com/api/data",
  type: "GET",
  crossDomain: true, // Enable cross-origin requests
  success: function (response) {
    console.log("Data:", response);
  },
  error: function (error) {
    console.error("Error:", error);
  },
});
```

#### Problem 15: Sending Custom Headers in AJAX Requests
**Problem:** Describe how to send custom headers in AJAX requests using jQuery.

**Solution:**
You can use the `headers` option to send custom headers in the request.

```javascript
$.ajax({
  url: "/data",
  type: "GET",
  headers: {
    Authorization: "Bearer Token123", // Custom header
  },
  success: function (response) {
    console.log("Data:", response);
  },
  error: function (error) {
    console.error("Error:", error);
  },
});
```

#### Problem 16: Handling Redirects in AJAX Requests
**Problem:** Explain how to handle redirects in AJAX requests using jQuery.

**Solution:**
You can use the `xhr` object's `getResponseHeader` method to check the response headers and handle redirects.

```javascript
$.ajax({
  url: "/redirect",
  type: "GET",
  success: function (response, textStatus, xhr) {
    if (xhr.getResponseHeader("X-Redirected") === "true") {
      console.log("Request was redirected.");
    } else {
      console.log("Data:", response);
    }
  },
  error: function (error) {
    console.error("Error:", error);
  },
});
```

#### Problem 17: Using Promises with AJAX
**Problem:** Describe how to use Promises with jQuery AJAX requests.

**Solution:**
You can use the `$.ajax` function with `.then()` and `.catch()` to work with Promises.

```javascript
$.ajax({
  url: "/data",
  type: "GET",
})
  .then(function (response) {
    console.log("Data:", response);
  })
  .catch(function (error) {
    console.error("Error:", error);
  });
```

#### Problem 18: Handling AJAX Caching
**Problem:** Explain how to handle AJAX caching in jQuery to prevent duplicate requests.

**Solution:**
You can use the `cache` option to control whether the request is cached.

```javascript
$.ajax({
  url: "/data",
  type: "GET",
  cache: false, // Disable caching
  success: function (response) {
    console.log("Data:", response);
  },
  error: function (error) {
    console.error("Error:", error);
  },
});
```

#### Problem 19: Sending and Receiving Binary Data with `Blob`
**Problem:** Describe how to send and receive binary data using `Blob` in jQuery.

**Solution:**
You can use the `Blob` object to handle binary data in AJAX requests.

```javascript
$.ajax({
  url: "/binary-data",
  type: "GET",
  responseType: "blob", // Receive binary data as a Blob
  success: function (response) {
    // Process binary data here
    console.log("Binary Data:", response);
  },
  error: function (error) {
    console.error("Error:", error);
  },
});
```

#### Problem 20: Handling Concurrent AJAX Requests
**Problem:** Explain how to manage concurrent AJAX requests using jQuery, such as ensuring one request finishes before another starts.

**Solution:**
You can use `.then()` and `.catch()` to chain AJAX requests and control their execution order.

```javascript
$.ajax({
  url: "/first",
  type: "GET",
})
  .then(function (response1) {
    console.log("First Request:", response1);
    return $.ajax({
      url: "/second",
      type: "GET",
    });
  })
  .then(function (response2) {
    console.log("Second Request:", response2);
  })
  .catch(function (error) {
    console.error("Error:", error);
  });
```

### statements, syntax, variables, keywords, and operators
---

### statements, syntax, variables, keywords, and operators
---

### statements, syntax, variables, keywords, and operators
---













## Most Importants Problem Overall
---

### **JavaScript Basics**

1. **What is JavaScript?**
   - JavaScript is a versatile, high-level, interpreted scripting language used to make web pages interactive.

2. **What are the data types in JavaScript?**
   - JavaScript has several data types, including Number, String, Boolean, Object, Array, Function, and Null.

3. **What is the difference between `null` and `undefined`?**
   - `null` is an explicitly assigned value representing the absence of an object, while `undefined` means a variable has been declared but has not been assigned a value.

4. **How do you declare variables in JavaScript?**
   - Variables can be declared using `var`, `let`, or `const`.
   
   ```javascript
   var name = 'John'; // var (function-scoped)
   let age = 30;      // let (block-scoped)
   const pi = 3.14;   // const (block-scoped, immutable)
   ```

5. **What is hoisting in JavaScript?**
   - Hoisting is JavaScript's behavior of moving variable and function declarations to the top of their containing scope.

6. **Explain the difference between `==` and `===`.**
   - `==` checks for equality after type coercion, while `===` checks for strict equality without type coercion.

   ```javascript
   5 == "5";   // true
   5 === "5";  // false
   ```

### **Functions**

7. **What is a closure in JavaScript?**
   - A closure is a function that has access to its own scope, the outer function's scope, and the global scope.

8. **Explain the concept of callback functions.**
   - Callback functions are functions passed as arguments to other functions and are executed after the completion of the parent function.

   ```javascript
   function doSomething(callback) {
     // ...do something...
     callback();
   }
   ```

9. **What is the difference between `function declaration` and `function expression`?**
   - Function declarations are hoisted, while function expressions are not.

   ```javascript
   // Function Declaration
   function greet() { return "Hello!"; }

   // Function Expression
   const greet = function() { return "Hello!"; };
   ```

10. **What is the purpose of the `this` keyword in JavaScript?**
    - `this` refers to the current object in a method or context and can vary based on how a function is called.

### **Object-Oriented Programming (OOP)**

11. **Explain prototypal inheritance in JavaScript.**
    - JavaScript uses prototypal inheritance, where objects inherit properties and methods from other objects through their prototype chain.

12. **How can you create an object in JavaScript?**
    - Objects can be created using object literals, constructor functions, or ES6 classes.

   ```javascript
   // Object Literal
   const person = { name: "John", age: 30 };

   // Constructor Function
   function Person(name, age) {
     this.name = name;
     this.age = age;
   }

   // ES6 Class
   class Person {
     constructor(name, age) {
       this.name = name;
       this.age = age;
     }
   }
   ```

13. **What is the difference between `hasOwnProperty` and `in` operator?**
    - `hasOwnProperty` checks if an object has a property directly, while the `in` operator checks if a property exists in an object's prototype chain.

   ```javascript
   const obj = { a: 1 };
   obj.hasOwnProperty('a'); // true
   'a' in obj;              // true
   ```

### **Arrays**

14. **How do you add elements to an array in JavaScript?**
    - Elements can be added to an array using `push()`, `unshift()`, or direct assignment.

   ```javascript
   const fruits = ['apple', 'banana'];
   fruits.push('orange');   // ['apple', 'banana', 'orange']
   fruits.unshift('grape'); // ['grape', 'apple', 'banana', 'orange']
   fruits[3] = 'kiwi';      // ['grape', 'apple', 'banana', 'kiwi']
   ```

15. **Explain the difference between `map()` and `forEach()` methods.**
    - `map()` creates a new array by applying a function to each element, while `forEach()` iterates over elements and doesn't create a new array.

   ```javascript
   const numbers = [1, 2, 3];
   
   const doubled = numbers.map(num => num * 2); // [2, 4, 6]
   
   numbers.forEach(num => console.log(num));     // 1, 2, 3 (no new array)
   ```

16. **What is the `filter()` method, and how is it used?**
    - `filter()` creates a new array with all elements that pass a test specified by a provided function.

   ```javascript
   const numbers = [1, 2, 3, 4, 5];
   
   const evenNumbers = numbers.filter(num => num % 2 === 0); // [2, 4]
   ```

### **ES6 Features**

17. **What is destructuring in ES6?**
    - Destructuring allows you to extract values from objects or arrays and assign them to variables easily.

   ```javascript
   const person = { name: 'Alice', age: 25 };
   const { name, age } = person;
   ```

18. **Explain the `let` and `const` declarations in ES6.**
    - `let` allows you to declare variables with block scope, and `const` declares constants with block scope.

   ```javascript
   let x = 10;
   x = 20; // Valid
   const pi = 3.14;
   pi = 3; // Invalid
   ```

19. **What are arrow functions in ES6, and how do they differ from regular functions?**
    - Arrow functions provide a concise syntax and do not have their `this`. They inherit `this` from the containing function.

   ```javascript
   const add = (a, b) => a + b;
   ```

20. **What is the spread operator (`...`) in ES6, and how is it used?**
    - The spread operator is used to spread elements of an iterable (e.g., an array) into a new array, object, or function call.

   ```javascript
   const arr1 = [1, 2, 3];
   const arr2 = [...arr1, 4, 5]; // [1, 2, 3, 4

, 5]
   ```

### **Asynchronous Programming**

21. **What is asynchronous programming in JavaScript, and why is it important?**
    - Asynchronous programming allows non-blocking execution of code, which is crucial for tasks like fetching data from a server without freezing the UI.

22. **What is a Promise, and how does it work?**
    - A Promise represents a value that may not be available yet but will be resolved at some point, either successfully or with an error.

   ```javascript
   const fetchData = () => {
     return new Promise((resolve, reject) => {
       // ...asynchronous operation...
       if (success) {
         resolve(data);
       } else {
         reject(error);
       }
     });
   };
   ```

23. **What is async/await, and how does it simplify working with Promises?**
    - `async/await` is a syntactic sugar for working with Promises, making asynchronous code look more like synchronous code.

   ```javascript
   async function fetchData() {
     try {
       const response = await fetch(url);
       const data = await response.json();
       return data;
     } catch (error) {
       console.error(error);
     }
   }
   ```

### **DOM Manipulation**

24. **What is the Document Object Model (DOM)?**
    - The DOM is a programming interface for web documents that represents the page so that programs can change the document structure, style, and content.

25. **How do you select elements in the DOM using JavaScript?**
    - Elements can be selected using methods like `getElementById`, `querySelector`, `querySelectorAll`, and more.

   ```javascript
   const element = document.getElementById('myElement');
   const elements = document.querySelectorAll('.myClass');
   ```

26. **How do you modify the content of an HTML element using JavaScript?**
    - You can change the content of an element using properties like `innerHTML` or `textContent`.

   ```javascript
   const element = document.getElementById('myElement');
   element.innerHTML = 'New content';
   element.textContent = 'Text content';
   ```

27. **Explain event delegation in JavaScript.**
    - Event delegation involves attaching a single event listener to a parent element to handle events for its child elements. It's more efficient for dynamically created elements.

   ```javascript
   document.addEventListener('click', function(event) {
     if (event.target.classList.contains('button')) {
       // Handle button click
     }
   });
   ```

### **Error Handling**

28. **What is the purpose of try...catch blocks in JavaScript?**
    - `try...catch` blocks are used to handle exceptions (errors) that may occur during code execution.

   ```javascript
   try {
     // Code that may throw an error
   } catch (error) {
     // Handle the error
   }
   ```

29. **What is the difference between `throw` and `throw new Error()`?**
    - `throw` is used to throw any value, while `throw new Error()` is often used to create custom error objects.

   ```javascript
   throw 'An error occurred';
   throw new Error('Custom error message');
   ```

### **Promises and Asynchronous Programming**

30. **Explain the Event Loop in JavaScript.**
    - The Event Loop is a fundamental concept in JavaScript that manages the execution of asynchronous code, ensuring that the program remains responsive.

31. **What is a callback hell (pyramid of doom), and how can it be avoided?**
    - Callback hell occurs when multiple nested callbacks lead to unreadable and hard-to-maintain code. You can avoid it by using `async/await` or Promises.

   ```javascript
   async function loadData() {
     try {
       const data1 = await fetchData1();
       const data2 = await fetchData2();
       // ...
     } catch (error) {
       console.error(error);
     }
   }
   ```

32. **Explain what a closure is and give an example.**
    - A closure is a function that has access to its own scope and the outer function's scope, even after the outer function has finished executing.

   ```javascript
   function outer() {
     const message = 'Hello';
     return function inner() {
       console.log(message);
     };
   }
   const myFunction = outer();
   myFunction(); // Output: 'Hello'
   ```

### **ES6 and Advanced JavaScript Concepts**

33. **What is destructuring, and how is it used in JavaScript?**
    - Destructuring allows you to extract values from objects and arrays into separate variables.

   ```javascript
   const person = { name: 'John', age: 30 };
   const { name, age } = person;
   ```

34. **Explain the difference between `let`, `const`, and `var` in variable declaration.**
    - `let` and `const` have block scope and cannot be redeclared in the same scope, while `var` has function scope and can be redeclared.

35. **What is an IIFE (Immediately Invoked Function Expression), and why is it used?**
    - An IIFE is a function that is executed immediately after its creation, helping to avoid polluting the global scope.

   ```javascript
   (function() {
     // Code here
   })();
   ```

36. **What is a module in JavaScript, and how can you export/import modules using ES6 syntax?**
    - Modules help organize code by allowing you to split code into separate files. You can export and import functionality using `export` and `import` statements.

   ```javascript
   // Module A (a.js)
   export const myVar = 42;

   // Module B (b.js)
   import { myVar } from './a.js';
   ```

37. **What is the `this` keyword in JavaScript, and how does it behave in different contexts (e.g., regular function, arrow function, object method)?**
    - `this` refers to the current execution context. In a regular function, it depends on how the function is called, whereas in an arrow function, it retains the value of `this` from its surrounding code.

38. **What is a callback function in JavaScript, and how is it used?**
    - A callback function is a function that is passed as an argument to another function and is executed later, often after an asynchronous operation completes.

   ```javascript
   function fetchData(url, callback) {
     // ...fetch data...
     callback(data);
   }
   ```

### **APIs and AJAX**

39. **What is AJAX, and how is it used in JavaScript?**
    - AJAX (Asynchronous JavaScript and XML) is a technique used to send and retrieve data from a server without having to refresh the entire page.

40. **Explain the Fetch API in JavaScript.**
    - The Fetch API is a modern way to make network requests and handle responses using Promises.

   ```javascript
   fetch('https://api.example.com/data')
     .then(response => response.json())
     .then(data => console.log(data))
     .catch(error => console.error(error));
   ```

### **Object-Oriented Programming (OOP)**

41. **What is prototypal inheritance in JavaScript?**
    - Prototypal inheritance is a way

 objects inherit properties and methods from other objects through their prototype chain.

42. **How do you create and use classes in JavaScript (ES6)?**
    - Classes provide a blueprint for creating objects. You can define classes using the `class` keyword and create instances using the `new` keyword.

   ```javascript
   class Person {
     constructor(name, age) {
       this.name = name;
       this.age = age;
     }
     greet() {
       return `Hello, my name is ${this.name} and I'm ${this.age} years old.`;
     }
   }
   const john = new Person('John', 30);
   console.log(john.greet());
   ```

43. **What is the `super` keyword in JavaScript classes?**
    - The `super` keyword is used to call methods on the parent class in a derived class.

   ```javascript
   class Animal {
     constructor(name) {
       this.name = name;
     }
     speak() {
       console.log(`${this.name} makes a sound.`);
     }
   }
   class Dog extends Animal {
     speak() {
       super.speak();
       console.log(`${this.name} barks.`);
     }
   }
   const dog = new Dog('Buddy');
   dog.speak();
   ```

### **Promises and Asynchronous Programming**

44. **What is a Promise in JavaScript, and how does it work?**
    - A Promise represents a value that may not be available yet but will be resolved at some point, either successfully or with an error.

45. **What is the purpose of `async` and `await` in JavaScript, and how do they simplify asynchronous code?**
    - `async` and `await` are used to write asynchronous code in a more readable and synchronous-like way. `async` declares a function as asynchronous, and `await` pauses the function execution until the awaited Promise is resolved.

   ```javascript
   async function fetchData(url) {
     try {
       const response = await fetch(url);
       const data = await response.json();
       return data;
     } catch (error) {
       console.error(error);
     }
   }
   ```

46. **Explain the concept of Promises chaining.**
    - Promises can be chained together using `.then()` to execute asynchronous operations sequentially.

   ```javascript
   fetch('https://api.example.com/data')
     .then(response => response.json())
     .then(data => processData(data))
     .then(result => console.log(result))
     .catch(error => console.error(error));
   ```

### **DOM Manipulation**

47. **What is the DOM (Document Object Model) in JavaScript, and how is it used?**
    - The DOM is a programming interface that represents a web page, allowing you to manipulate its structure and content using JavaScript.

48. **How do you select and manipulate DOM elements using JavaScript?**
    - You can select elements using methods like `getElementById`, `querySelector`, and `querySelectorAll`, and manipulate them by changing properties like `innerHTML` and `textContent`.

   ```javascript
   const element = document.getElementById('myElement');
   element.innerHTML = 'New content';
   ```

49. **What is event delegation in JavaScript, and why is it useful?**
    - Event delegation involves attaching a single event listener to a parent element to handle events for its child elements. It's useful for efficiency and handling dynamically added elements.

   ```javascript
   document.addEventListener('click', function(event) {
     if (event.target.classList.contains('button')) {
       // Handle button click
     }
   });
   ```

### **Error Handling**

50. **What is error handling in JavaScript, and how do you use `try...catch` blocks to handle exceptions?**
    - Error handling is the process of gracefully handling unexpected issues in your code. `try...catch` blocks are used to catch and handle exceptions (errors) that may occur during execution.

   ```javascript
   try {
     // Code that may throw an error
   } catch (error) {
     // Handle the error
   }
   ```

51. **What is the purpose of the `throw` statement in JavaScript?**
    - The `throw` statement is used to throw custom error objects or values when an exceptional situation arises in your code.

   ```javascript
   throw new Error('Custom error message');
   ```

### **Testing and Debugging**

52. **Explain the purpose of unit testing in JavaScript, and how can it be implemented using frameworks like Jasmine or Jest?**
    - Unit testing is the practice of testing individual units (functions, methods) of code to ensure they work as expected. Frameworks like Jasmine and Jest provide tools for writing and running unit tests.

   ```javascript
   // Jasmine example
   describe('MyFunction', () => {
     it('should return true', () => {
       expect(myFunction()).toBe(true);
     });
   });
   ```

53. **What is debugging, and what tools are available for debugging JavaScript code?**
    - Debugging is the process of identifying and fixing errors in your code. Common debugging tools include browser dev tools, `console.log`, and breakpoints.

   ```javascript
   function myFunction() {
     debugger; // Set a breakpoint here
     // ...
   }
   ```

### **Performance Optimization**

54. **How can you optimize the performance of JavaScript code?**
    - Performance optimization techniques include minimizing HTTP requests, reducing render-blocking resources, optimizing JavaScript code, and using efficient algorithms.

55. **What is the Event Loop in JavaScript, and why is it important for performance?**
    - The Event Loop is a mechanism that ensures non-blocking execution of code, which is vital for responsiveness and performance in web applications.

56. **Explain the importance of lazy loading and code splitting in JavaScript for improving website performance.**
    - Lazy loading and code splitting involve loading resources (e.g., JavaScript files) only when they are needed, reducing initial page load times and improving performance.

### **Security**

57. **What is Cross-Site Scripting (XSS), and how can you prevent it in JavaScript applications?**
    - XSS is a security vulnerability where attackers inject malicious scripts into web pages. To prevent it, sanitize user input and use Content Security Policy (CSP) headers.

58. **What is Cross-Site Request Forgery (CSRF), and how can you prevent it in JavaScript applications?**
    - CSRF is an attack where a user is tricked into making an unwanted request to a different site. To prevent it, use anti-CSRF tokens and validate requests.

### **Advanced Concepts**

59. **What is the difference between call, apply, and bind in JavaScript, and how are they used to change the context of a function?**
    - `call`, `apply`, and `bind` are used to change the context (value of `this`) of a function. `call` and `apply` invoke the function immediately, while `bind` creates a new function with the context bound.

   ```javascript
   const obj = { value: 42 };

   function printValue() {
     console.log(this.value);
   }

   printValue.call(obj);    // 42
   printValue.apply(obj);   // 42
   const boundFn = printValue.bind(obj);
   boundFn();               // 42
   ```

60. **What is the event loop

 in JavaScript, and how does it work?**
    - The event loop is a core concept in JavaScript that handles asynchronous operations and ensures non-blocking code execution.

61. **Explain the concept of closures in JavaScript, and provide an example.**
    - Closures occur when a function "remembers" its lexical scope even when executed outside of that scope. They are often used to encapsulate state and create private variables.

   ```javascript
   function createCounter() {
     let count = 0;
     return function() {
       count++;
       console.log(count);
     };
   }
   const counter = createCounter();
   counter(); // 1
   counter(); // 2
   ```

62. **What is the purpose of the `debounce` and `throttle` functions in JavaScript, and how are they implemented?**
    - `debounce` and `throttle` are used to control the rate at which a function is executed, typically in response to user input or events. `debounce` delays execution, while `throttle` limits the frequency of execution.

63. **Explain the concept of memoization in JavaScript, and how is it used to optimize function performance?**
    - Memoization is a technique that caches the results of expensive function calls and returns the cached result when the same inputs occur again.

   ```javascript
   function memoize(fn) {
     const cache = {};
     return function(...args) {
       const key = JSON.stringify(args);
       if (!cache[key]) {
         cache[key] = fn(...args);
       }
       return cache[key];
     };
   }
   ```

64. **What is the purpose of the `reduce` method in JavaScript, and how is it used to process arrays?**
    - `reduce` is used to iterate over an array and accumulate a single result value by applying a provided function.

   ```javascript
   const numbers = [1, 2, 3, 4, 5];
   const sum = numbers.reduce((acc, curr) => acc + curr, 0);
   ```

65. **Explain how to handle and work with asynchronous code in JavaScript using callbacks, Promises, and async/await.**
    - Callbacks are used to handle asynchronous code by passing functions as arguments. Promises provide a more structured way to handle asynchronous operations. `async/await` is a more concise and readable way to work with Promises.

   ```javascript
   // Callbacks
   function fetchData(callback) {
     // ...fetch data...
     callback(data);
   }

   // Promises
   function fetchData() {
     return new Promise((resolve, reject) => {
       // ...fetch data...
       if (success) {
         resolve(data);
       } else {
         reject(error);
       }
     });
   }

   // async/await
   async function fetchData() {
     try {
       const response = await fetch(url);
       const data = await response.json();
       return data;
     } catch (error) {
       console.error(error);
     }
   }
   ```

66. **What is the purpose of the `localStorage` and `sessionStorage` objects in JavaScript, and how are they used for client-side storage?**
    - `localStorage` and `sessionStorage` are used to store key-value pairs in the browser. `localStorage` stores data persistently, while `sessionStorage` stores data for the duration of a page session.

67. **Explain the concept of the same-origin policy in web security, and how can it be bypassed using techniques like JSONP or CORS?**
    - The same-origin policy is a security measure that restricts web pages from making requests to domains other than their own. JSONP and CORS are techniques used to bypass these restrictions and enable cross-origin requests.

68. **What is the purpose of the `async` attribute in HTML script tags, and how does it affect the loading and execution of JavaScript code?**
    - The `async` attribute in HTML script tags indicates that the script should be executed asynchronously, allowing it to not block rendering of the page while it loads. However, the order of execution may not be guaranteed.

69. **Explain the difference between the `null` and `undefined` values in JavaScript.**
    - `null` represents the intentional absence of any object value, while `undefined` is a variable that has been declared but has not been assigned a value.

70. **What is the Event Loop in JavaScript, and how does it work?**
    - The Event Loop is a fundamental concept in JavaScript that manages the execution of asynchronous code, ensuring that the program remains responsive.

71. **What is the purpose of memoization in JavaScript, and how is it implemented to optimize function performance?**
    - Memoization is a technique that caches the results of expensive function calls and returns the cached result when the same inputs occur again.

72. **Explain the concept of currying in JavaScript, and how is it used?**
    - Currying is the technique of breaking down a function that takes multiple arguments into a series of functions that each take a single argument. This allows for partial function application and functional composition.

73. **What is a closure in JavaScript, and how is it used in practice?**
    - A closure is a function that retains access to its outer (enclosing) function's scope even after the outer function has finished executing. Closures are used for encapsulation, data hiding, and creating private variables.

74. **Explain the concept of "hoisting" in JavaScript and provide examples.**
    - Hoisting is a JavaScript behavior where variable and function declarations are moved to the top of their containing scope during compilation. However, only declarations are hoisted, not initializations.

   ```javascript
   console.log(x); // undefined
   var x = 10;

   // Hoisting of function declarations
   foo(); // "Hello, world!"
   function foo() {
     console.log("Hello, world!");
   }
   ```

75. **What is the purpose of the `event.preventDefault()` method in JavaScript, and how is it used to prevent default browser behavior?**
    - `event.preventDefault()` is used to prevent the default behavior of an event, such as preventing a form from submitting or preventing a link from navigating to a new page.

   ```javascript
   document.querySelector('a').addEventListener('click', function(event) {
     event.preventDefault();
   });
   ```

### **Testing and Debugging**

76. **What is the purpose of unit testing in JavaScript, and how can it be implemented using frameworks like Jasmine or Jest?**
    - Unit testing is the practice of testing individual units (functions, methods) of code to ensure they work as expected. Frameworks like Jasmine and Jest provide tools for writing and running unit tests.

77. **What is debugging, and what tools are available for debugging JavaScript code?**
    - Debugging is the process of identifying and fixing errors in your code. Common debugging tools include browser developer tools, `console.log`, breakpoints, and debugging statements.

78. **Explain the concept of "console.log()" debugging in JavaScript, and provide examples.**
    - `console.log()` is a debugging technique where you output information to the console to understand the flow and values in your code.

   ```javascript
   const x = 10;
   console.log("The value of x is:", x);

   function calculateSum(a

, b) {
     console.log("Calculating sum...");
     const result = a + b;
     console.log("Sum result:", result);
     return result;
   }
   ```

### **Performance Optimization**

79. **How can you optimize the performance of JavaScript code, especially for web applications?**
    - Performance optimization techniques include minimizing HTTP requests, reducing render-blocking resources, optimizing JavaScript code, lazy loading, and using efficient algorithms.

80. **What is the critical rendering path, and how can it be optimized for web page loading speed?**
    - The critical rendering path is the sequence of steps the browser takes to render a web page. Optimizations include minimizing render-blocking resources, optimizing images, and using efficient CSS and JavaScript.

81. **Explain the concepts of "minification" and "compression" in optimizing JavaScript for the web.**
    - Minification involves removing unnecessary characters and whitespace from JavaScript code to reduce file size. Compression, such as GZIP or Brotli, further reduces file size during transmission.

82. **What are Web Workers in JavaScript, and how can they improve web application performance?**
    - Web Workers are a mechanism for running JavaScript code in the background, separate from the main browser thread. They can improve performance by offloading CPU-intensive tasks, thus preventing the main thread from being blocked.

83. **Explain the concept of "lazy loading" in web development, and how can it be implemented for images and JavaScript resources?**
    - Lazy loading is a technique that defers the loading of non-essential resources until they are needed. It can be implemented for images using the `loading="lazy"` attribute and for JavaScript using dynamic import or Intersection Observer.

### **Security**

84. **What is Cross-Site Scripting (XSS), and how can it be prevented in JavaScript applications?**
    - XSS is a security vulnerability where attackers inject malicious scripts into web pages. Prevention methods include input validation, output encoding, and Content Security Policy (CSP).

85. **What is Cross-Site Request Forgery (CSRF), and how can it be prevented in JavaScript applications?**
    - CSRF is an attack where a user is tricked into making unwanted requests to a different site. Prevention methods include using anti-CSRF tokens and validating requests.

86. **Explain the concept of Content Security Policy (CSP) in web security, and how is it used to mitigate various security risks?**
    - CSP is a security feature that helps prevent XSS attacks by specifying which resources are allowed to be loaded and executed on a web page. It mitigates risks by restricting the sources of scripts, styles, and other resources.

87. **What is the Same-Origin Policy in web security, and how does it affect JavaScript applications?**
    - The Same-Origin Policy is a security measure that restricts web pages from making requests to domains other than their own. It affects JavaScript applications by preventing cross-origin requests unless explicitly allowed through techniques like JSONP or CORS.

### **Advanced Concepts**

88. **Explain the concept of "currying" in JavaScript, and provide an example of how it can be implemented.**
    - Currying is a technique where a function that takes multiple arguments is transformed into a series of functions, each taking one argument. This enables partial function application and functional composition.

   ```javascript
   function curry(fn) {
     return function curried(...args) {
       if (args.length >= fn.length) {
         return fn(...args);
       } else {
         return (...moreArgs) => curried(...args, ...moreArgs);
       }
     };
   }

   function add(a, b, c) {
     return a + b + c;
   }

   const curriedAdd = curry(add);
   console.log(curriedAdd(1)(2)(3)); // 6
   ```

89. **What is the concept of "function composition" in JavaScript, and how is it useful in functional programming?**
    - Function composition is the process of combining multiple functions to create a new function. It is useful in functional programming to build complex behaviors from smaller, reusable functions.

   ```javascript
   const compose = (f, g) => x => f(g(x));
   const add1 = x => x + 1;
   const multiply2 = x => x * 2;
   const add1ThenMultiply2 = compose(multiply2, add1);

   console.log(add1ThenMultiply2(3)); // 8
   ```

90. **What is the concept of "prototype inheritance" in JavaScript, and how does it work?**
    - Prototype inheritance is a mechanism where objects inherit properties and methods from other objects through their prototype chain. Each object has a reference to its prototype, and if a property or method is not found on the object itself, it is looked up in the prototype chain.

   ```javascript
   function Animal(name) {
     this.name = name;
   }

   Animal.prototype.sayHello = function() {
     console.log(`Hello, I'm ${this.name}`);
   };

   function Dog(name, breed) {
     Animal.call(this, name);
     this.breed = breed;
   }

   Dog.prototype = Object.create(Animal.prototype);
   Dog.prototype.constructor = Dog;

   const dog = new Dog('Buddy', 'Golden Retriever');
   dog.sayHello(); // "Hello, I'm Buddy"
   ```

91. **Explain the concepts of "call," "apply," and "bind" in JavaScript, and provide examples of how they can be used to change the context of a function.**
    - `call`, `apply`, and `bind` are methods used to change the context (the value of `this`) of a function. `call` and `apply` invoke the function immediately, while `bind` creates a new function with the context bound.

   ```javascript
   const person = { name: 'John' };

   function greet() {
     console.log(`Hello, my name is ${this.name}`);
   }

   greet.call(person); // "Hello, my name is John"
   greet.apply(person); // "Hello, my name is John"

   const boundGreet = greet.bind(person);
   boundGreet(); // "Hello, my name is John"
   ```

92. **What is the purpose of the `async` and `await` keywords in JavaScript, and how are they used to work with asynchronous code?**
    - `async` declares a function as asynchronous, allowing the use of `await` inside the function to pause execution until a Promise is resolved. This simplifies asynchronous code and makes it look more like synchronous code.

   ```javascript
   async function fetchData(url) {
     try {
       const response = await fetch(url);
       const data = await response.json();
       return data;
     } catch (error) {
       console.error(error);
     }
   }
   ```

93. **Explain the concept of a "promise" in JavaScript, and how does it work?**
    - A promise is an object that represents a value that may not be available yet but will be resolved at some point, either successfully or with an error. Promises provide a structured way to work with asynchronous code, allowing you to attach callbacks for success and error handling.

   ```javascript
   const fetchData = () => {
     return new Promise((resolve, reject) => {
       // ...asynchronous operation...
       if (

success) {
         resolve(data);
       } else {
         reject(error);
       }
     });
   };
   ```

94. **Explain the purpose of "event delegation" in JavaScript, and how is it implemented?**
    - Event delegation is a technique where a single event listener is attached to a parent element to handle events for its child elements. It is useful for improving performance, especially with dynamically generated elements.

   ```javascript
   document.addEventListener('click', function(event) {
     if (event.target.classList.contains('button')) {
       // Handle button click
     }
   });
   ```

95. **What is the purpose of the `localStorage` and `sessionStorage` objects in JavaScript, and how are they used for client-side storage?**
    - `localStorage` and `sessionStorage` are used to store key-value pairs in the browser. `localStorage` stores data persistently across sessions, while `sessionStorage` stores data only for the duration of a page session.

96. **Explain the difference between "localStorage" and "sessionStorage" in terms of data persistence and scope.**
    - `localStorage` stores data persistently across sessions and has a broader scope (available across tabs and windows of the same domain). `sessionStorage` stores data only for the duration of a page session and has a narrower scope (limited to a single tab or window).

97. **What is the purpose of the `async` attribute in HTML script tags, and how does it affect the loading and execution of JavaScript code?**
    - The `async` attribute in HTML script tags indicates that the script should be executed asynchronously, allowing it to not block rendering of the page while it loads. However, the order of execution may not be guaranteed.

98. **Explain the concept of "hoisting" in JavaScript, and provide examples.**
    - Hoisting is a JavaScript behavior where variable and function declarations are moved to the top of their containing scope during compilation. However, only declarations are hoisted, not initializations.

   ```javascript
   console.log(x); // undefined
   var x = 10;

   // Hoisting of function declarations
   foo(); // "Hello, world!"
   function foo() {
     console.log("Hello, world!");
   }
   ```

99. **What is the purpose of the `event.preventDefault()` method in JavaScript, and how is it used to prevent default browser behavior?**
    - `event.preventDefault()` is used to prevent the default behavior of an event, such as preventing a form from submitting or preventing a link from navigating to a new page.

   ```javascript
   document.querySelector('a').addEventListener('click', function(event) {
     event.preventDefault();
   });
   ```

100. **Explain the concept of "JSON Web Tokens (JWT)" and how they are used for authentication and authorization in web applications.**
    - JSON Web Tokens (JWT) are a compact, self-contained means of representing claims to be transferred between parties. They are often used for authentication and authorization by encoding user information and privileges into a token that can be sent between the client and server.

This list of 100 JavaScript interview questions and answers covers a wide range of topics and concepts, suitable for JavaScript developers at all levels. To prepare for interviews, practice implementing code examples and explaining these concepts thoroughly. Additionally, keep up to date with the latest JavaScript developments and best practices.


Certainly, here are more JavaScript interview questions and answers covering various topics:

### **Scope and Closure**

101. **What is a variable's scope in JavaScript, and how does it affect variable access?**
    - Variable scope determines where in the code a variable is accessible. Variables can have global scope (accessible anywhere) or local scope (limited to a specific block or function).

102. **Explain the difference between "var," "let," and "const" in terms of variable scope and reassignment.**
    - `var` has function scope and can be redeclared. `let` and `const` have block scope, and `let` allows reassignment, while `const` does not allow reassignment of its value.

103. **What is a closure in JavaScript, and why is it useful?**
    - A closure is a function that retains access to its outer (enclosing) function's scope even after the outer function has finished executing. Closures are useful for encapsulation, data hiding, and creating private variables.

104. **How can you create a closure in JavaScript, and provide an example?**
    - Closures are created when a function is defined inside another function and retains access to the outer function's scope.

   ```javascript
   function outer() {
     const message = 'Hello';
     return function inner() {
       console.log(message);
     };
   }
   const myFunction = outer();
   myFunction(); // Output: 'Hello'
   ```

### **ES6 and Functional Programming**

105. **What is destructuring in JavaScript, and how is it used for variable assignment?**
    - Destructuring allows you to extract values from objects and arrays into separate variables, making assignments more concise.

106. **Explain the spread/rest operator in JavaScript and provide examples.**
    - The spread operator (`...`) is used to expand an iterable (e.g., an array) into individual elements, while the rest operator is used to collect multiple arguments or elements into an array.

   ```javascript
   // Spread operator
   const numbers = [1, 2, 3];
   const newNumbers = [...numbers, 4, 5]; // [1, 2, 3, 4, 5]

   // Rest operator
   function sum(...args) {
     return args.reduce((total, num) => total + num, 0);
   }
   ```

107. **What are arrow functions in ES6, and how do they differ from regular functions?**
    - Arrow functions are a more concise way to define functions in ES6. They have a shorter syntax, automatically bind `this`, and do not have their own `this`, `arguments`, `super`, or `new.target`.

   ```javascript
   // Regular function
   function add(a, b) {
     return a + b;
   }

   // Arrow function
   const add = (a, b) => a + b;
   ```

108. **What is the purpose of template literals in JavaScript, and how are they used for string interpolation?**
    - Template literals allow you to embed expressions and variables within strings using backticks (` `).

   ```javascript
   const name = 'John';
   const greeting = `Hello, ${name}!`;
   ```

109. **What are "map," "filter," and "reduce" functions in JavaScript, and how are they used for manipulating arrays?**
    - `map` applies a function to each element of an array and returns a new array. `filter` creates a new array with elements that meet a specified condition. `reduce` reduces an array to a single value by applying a function to accumulate values.

   ```javascript
   const numbers = [1, 2, 3, 4, 5];

   const doubled = numbers.map(x => x * 2); // [2, 4, 6, 8, 10]
   const even = numbers.filter(x => x % 2 === 0); // [2, 4]
   const sum = numbers.reduce((acc, curr) => acc + curr, 0); // 15
   ```

### **Callbacks and Promises**

110. **What is a callback function in JavaScript, and why are they used?**
    - A callback function is a function that is passed as an argument to another function and is executed later, often after an asynchronous operation completes. They are used to manage asynchronous code.

111. **Explain the "callback hell" problem in JavaScript, and how can it be mitigated?**
    - Callback hell occurs when multiple nested callbacks lead to unreadable and hard-to-maintain code. It can be mitigated by using Promises, async/await, or named functions.

   ```javascript
   // Callback hell
   fetchData1(function(data1) {
     fetchData2(function(data2) {
       // ...
     });
   });

   // Mitigation with Promises
   fetchData1()
     .then(data1 => fetchData2(data1))
     .then(data2 => {
       // ...
     });
   ```

112. **What is a Promise in JavaScript, and how does it work?**
    - A Promise is an object that represents a value that may not be available yet but will be resolved at some point, either successfully or with an error.

113. **Explain the difference between "resolve" and "reject" in a Promise and provide an example.**
    - `resolve` is used to fulfill a Promise with a value, while `reject` is used to reject a Promise with an error.

   ```javascript
   const fetchData = () => {
     return new Promise((resolve, reject) => {
       // ...asynchronous operation...
       if (success) {
         resolve(data);
       } else {
         reject(error);
       }
     });
   };
   ```

114. **What is the `catch` method

 used for in a Promise, and how does it handle errors?**
    - The `catch` method is used to handle errors in a Promise chain. It allows you to specify what to do when a Promise is rejected.

   ```javascript
   fetchData()
     .then(data => {
       // ...
     })
     .catch(error => {
       console.error(error);
     });
   ```

### **DOM Manipulation**

115. **What is the DOM (Document Object Model) in JavaScript, and how is it used for web page manipulation?**
    - The DOM is a programming interface that represents a web page, allowing you to manipulate its structure and content using JavaScript.

116. **How can you create and append new HTML elements to the DOM using JavaScript?**
    - You can create new elements using `document.createElement`, set their properties and attributes, and append them to the DOM using methods like `appendChild` or `insertBefore`.

   ```javascript
   const newDiv = document.createElement('div');
   newDiv.textContent = 'New Element';
   document.body.appendChild(newDiv);
   ```

117. **What is event delegation in JavaScript, and why is it useful for managing events on dynamically generated elements?**
    - Event delegation involves attaching a single event listener to a parent element to handle events for its child elements. It's useful for efficiency and handling dynamically added elements.

   ```javascript
   document.addEventListener('click', function(event) {
     if (event.target.classList.contains('button')) {
       // Handle button click
     }
   });
   ```

### **Error Handling and Debugging**

118. **What is error handling in JavaScript, and how do you use `try...catch` blocks to handle exceptions?**
    - Error handling is the process of gracefully handling unexpected issues in your code. `try...catch` blocks are used to catch and handle exceptions (errors) that may occur during execution.

119. **What is the purpose of the `throw` statement in JavaScript, and how is it used to throw custom errors?**
    - The `throw` statement is used to throw custom error objects or values when an exceptional situation arises in your code.

   ```javascript
   throw new Error('Custom error message');
   ```

120. **Explain the purpose of unit testing in JavaScript, and how can it be implemented using frameworks like Jasmine or Jest?**
    - Unit testing is the practice of testing individual units (functions, methods) of code to ensure they work as expected. Frameworks like Jasmine and Jest provide tools for writing and running unit tests.

121. **What is debugging, and what tools are available for debugging JavaScript code?**
    - Debugging is the process of identifying and fixing errors in your code. Common debugging tools include browser developer tools, `console.log`, breakpoints, and debugging statements.

   ```javascript
   function myFunction() {
     debugger; // Set a breakpoint here
     // ...
   }
   ```

### **Performance Optimization**

122. **How can you optimize the performance of JavaScript code, especially for web applications?**
    - Performance optimization techniques include minimizing HTTP requests, reducing render-blocking resources, optimizing JavaScript code, lazy loading, and using efficient algorithms.

123. **What is the Event Loop in JavaScript, and how does it ensure non-blocking code execution?**
    - The Event Loop is a mechanism that ensures non-blocking execution of code, which is vital for responsiveness and performance in web applications.

124. **Explain the importance of lazy loading and code splitting in JavaScript for improving website performance.**
    - Lazy loading and code splitting involve loading resources (e.g., JavaScript files) only when they are needed, reducing initial page load times and improving performance.

125. **What is the Critical Rendering Path, and how can it be optimized for faster web page loading?**
    - The Critical Rendering Path is the sequence of steps the browser takes to render a web page. Optimization techniques include minimizing render-blocking resources, optimizing images, and using efficient CSS and JavaScript.

### **Security**

126. **What is Cross-Site Scripting (XSS), and how can it be prevented in JavaScript applications?**
    - XSS is a security vulnerability where attackers inject malicious scripts into web pages. Prevention methods include input validation, output encoding, and Content Security Policy (CSP).

127. **What is Cross-Site Request Forgery (CSRF), and how can it be prevented in JavaScript applications?**
    - CSRF is an attack where a user is tricked into making unwanted requests to a different site. Prevention methods include using anti-CSRF tokens and validating requests.

128. **Explain the concept of Content Security Policy (CSP) in web security, and how is it used to mitigate various security risks?**
    - CSP is a security feature that helps prevent XSS attacks by specifying which resources are allowed to be loaded and executed on a web page. It mitigates risks by restricting the sources of scripts, styles, and other resources.

129. **What is the Same-Origin Policy in web security, and how does it affect JavaScript applications?**
    - The Same-Origin Policy is a security measure that restricts web pages from making requests to domains other than their own. It affects JavaScript applications by preventing cross-origin requests unless explicitly allowed through techniques like JSONP or CORS.

### **Advanced Concepts**

130. **Explain the concept of "memoization" in JavaScript, and how is it used to optimize function performance?**
    - Memoization is a technique that caches the results of expensive function calls and returns the cached result when the same inputs occur again.

   ```javascript
   function memoize(fn) {
     const cache = {};
     return function(...args) {
       const key = JSON.stringify(args);
       if (!cache[key]) {
         cache[key] = fn(...args);
       }
       return cache[key];
     };
   }
   ```

131. **What is the purpose of the `async` and `await` keywords in JavaScript, and how are they used to work with asynchronous code?**
    - `async` declares a function as asynchronous, allowing the use of `await` inside the function to pause execution until a Promise is resolved. This simplifies asynchronous code and makes it look more like synchronous code.

132. **What are Web Workers in JavaScript, and how can they improve web application performance?**
    - Web Workers are a mechanism for running JavaScript code in the background, separate from the main browser thread. They can improve performance by offloading CPU-intensive tasks, thus preventing the main thread from being blocked.

133. **Explain the concept of "lazy loading" in web development, and how can it be implemented for images and JavaScript resources?**
    - Lazy loading is a technique that defers the loading of non-essential resources until they are needed. It can be implemented for images using the `loading="lazy"` attribute and for JavaScript using dynamic import or Intersection Observer.

134. **What is the purpose of the `localStorage` and `sessionStorage` objects in JavaScript, and how are they used for client-side storage?**
    - `localStorage` and `sessionStorage` are used to store key-value pairs in the browser. `localStorage` stores data persistently across sessions, while `sessionStorage` stores data only for the duration of a page session.

135. **Explain the difference between "localStorage" and "sessionStorage" in terms of data persistence and scope.**
    - `localStorage` stores data persistently across sessions and has a broader scope (available

 across tabs and windows of the same domain). `sessionStorage` stores data only for the duration of a page session and has a narrower scope (limited to a single tab or window).

136. **What is the purpose of the `async` attribute in HTML script tags, and how does it affect the loading and execution of JavaScript code?**
    - The `async` attribute in HTML script tags indicates that the script should be executed asynchronously, allowing it to not block rendering of the page while it loads. However, the order of execution may not be guaranteed.

137. **Explain the concept of "hoisting" in JavaScript, and provide examples.**
    - Hoisting is a JavaScript behavior where variable and function declarations are moved to the top of their containing scope during compilation. However, only declarations are hoisted, not initializations.

   ```javascript
   console.log(x); // undefined
   var x = 10;

   // Hoisting of function declarations
   foo(); // "Hello, world!"
   function foo() {
     console.log("Hello, world!");
   }
   ```

138. **What is the purpose of the `event.preventDefault()` method in JavaScript, and how is it used to prevent default browser behavior?**
    - `event.preventDefault()` is used to prevent the default behavior of an event, such as preventing a form from submitting or preventing a link from navigating to a new page.

   ```javascript
   document.querySelector('a').addEventListener('click', function(event) {
     event.preventDefault();
   });
   ```

139. **Explain the concept of "JSON Web Tokens (JWT)" and how they are used for authentication and authorization in web applications.**
    - JSON Web Tokens (JWT) are a compact, self-contained means of representing claims to be transferred between parties. They are often used for authentication and authorization by encoding user information and privileges into a token that can be sent between the client and server.

These additional JavaScript interview questions and answers cover a wide range of topics and concepts to help you prepare for interviews at all levels. Practice implementing code examples and explaining these concepts in detail to enhance your knowledge and interview performance.



Certainly, here are more JavaScript interview questions and answers:

### **Scope and Closures**

140. **What is variable hoisting in JavaScript, and how does it work?**
    - Variable hoisting is a JavaScript behavior where variable declarations are moved to the top of their containing scope during compilation, giving the impression that variables are "hoisted" to the top.

   ```javascript
   console.log(x); // undefined
   var x = 10;
   ```

141. **Explain the concept of "this" in JavaScript, and how does it differ in different contexts (e.g., global context, function context, and object context)?**
    - `this` refers to the current execution context and can behave differently depending on how it is used. In the global context, it refers to the global object (e.g., `window` in browsers). In a function, it depends on how the function is called. In an object method, it refers to the object itself.

   ```javascript
   console.log(this); // Global object (e.g., window in browsers)

   function foo() {
     console.log(this); // Depends on how foo is called
   }

   const obj = {
     bar() {
       console.log(this); // Refers to obj
     }
   };
   ```

142. **What is a "module" in JavaScript, and how can you create and import/export modules using ES6 syntax?**
    - A module is a reusable piece of JavaScript code that encapsulates functionality. In ES6, modules can be created using the `export` and `import` statements.

   ```javascript
   // Exporting
   export function add(a, b) {
     return a + b;
   }

   // Importing
   import { add } from './module';
   ```

143. **Explain the purpose of the "strict mode" in JavaScript and how it is enabled in code.**
    - Strict mode is a set of stricter runtime rules for JavaScript code that helps catch common coding mistakes and "unsafe" actions. It is enabled by adding `"use strict";` at the beginning of a script or function.

   ```javascript
   "use strict";
   ```

### **ES6 and Functional Programming**

144. **What is the purpose of the ES6 "class" syntax in JavaScript, and how does it differ from traditional constructor functions and prototypes?**
    - The ES6 class syntax provides a more concise way to define constructor functions and prototypes in JavaScript, making object-oriented programming patterns more familiar to developers coming from other languages.

   ```javascript
   // ES6 class
   class Person {
     constructor(name) {
       this.name = name;
     }
     sayHello() {
       console.log(`Hello, my name is ${this.name}`);
     }
   }

   // Traditional constructor function
   function Person(name) {
     this.name = name;
   }
   Person.prototype.sayHello = function() {
     console.log(`Hello, my name is ${this.name}`);
   };
   ```

145. **Explain the concept of "generator functions" in ES6, and how are they different from regular functions?**
    - Generator functions are a special type of function that can pause their execution and yield control back to the caller using the `yield` keyword. They allow for more flexible asynchronous programming.

   ```javascript
   function* generator() {
     yield 1;
     yield 2;
     yield 3;
   }

   const gen = generator();
   console.log(gen.next().value); // 1
   console.log(gen.next().value); // 2
   ```

146. **What are "default parameters" in ES6 function declarations, and how are they used?**
    - Default parameters allow you to specify default values for function parameters, which are used when the caller does not provide a value for that parameter.

   ```javascript
   function greet(name = 'Guest') {
     console.log(`Hello, ${name}!`);
   }

   greet(); // "Hello, Guest!"
   greet('Alice'); // "Hello, Alice!"
   ```

147. **Explain the purpose of the ES6 "spread" operator in JavaScript, and how is it used to merge or clone objects and arrays?**
    - The spread operator (`...`) is used to expand an iterable (e.g., an array or object) into individual elements, making it useful for merging or cloning arrays and objects.

   ```javascript
   // Merging arrays
   const arr1 = [1, 2, 3];
   const arr2 = [4, 5];
   const merged = [...arr1, ...arr2]; // [1, 2, 3, 4, 5]

   // Cloning objects
   const original = { x: 1, y: 2 };
   const clone = { ...original };
   ```

### **Callbacks and Promises**

148. **What is the purpose of the "async/await" syntax in JavaScript, and how does it simplify asynchronous code?**
    - The `async/await` syntax simplifies working with Promises by allowing asynchronous code to appear more like synchronous code. The `await` keyword pauses the execution of an asynchronous function

 until the awaited Promise resolves.

   ```javascript
   async function fetchData() {
     try {
       const response = await fetch(url);
       const data = await response.json();
       return data;
     } catch (error) {
       console.error(error);
     }
   }
   ```

149. **Explain the concept of a "callback" and provide an example of how callbacks are used in JavaScript.**
    - A callback is a function that is passed as an argument to another function and is executed later, often after an asynchronous operation completes.

   ```javascript
   function fetchData(url, callback) {
     fetch(url)
       .then(response => response.json())
       .then(data => callback(data))
       .catch(error => console.error(error));
   }

   fetchData('https://example.com/api/data', function(data) {
     console.log(data);
   });
   ```

150. **What is a Promise in JavaScript, and how does it work?**
    - A Promise is an object representing a value that may not be available yet but will be resolved at some point, either successfully or with an error.

   ```javascript
   const promise = new Promise((resolve, reject) => {
     // ...asynchronous operation...
     if (success) {
       resolve(data);
     } else {
       reject(error);
     }
   });
   ```

151. **What is the purpose of the "then" and "catch" methods on a Promise, and how are they used to handle successful and failed Promise resolutions?**
    - The `then` method is used to specify what should happen when a Promise is resolved successfully. The `catch` method is used to specify what should happen when a Promise is rejected with an error.

   ```javascript
   promise
     .then(data => {
       // Handle success
     })
     .catch(error => {
       // Handle error
     });
   ```

### **DOM Manipulation**

152. **What is the DOM (Document Object Model) in JavaScript, and how is it used to interact with web page elements?**
    - The DOM is a programming interface that represents a web page's structure and content as objects, allowing JavaScript to manipulate and interact with those elements.

153. **How can you add and remove classes from HTML elements using JavaScript?**
    - You can add a class to an element using the `classList.add()` method and remove it using `classList.remove()`.

   ```javascript
   const element = document.getElementById('myElement');
   element.classList.add('new-class');
   element.classList.remove('old-class');
   ```

154. **What is event delegation, and why is it useful in JavaScript when handling events on multiple elements?**
    - Event delegation is a technique where a single event listener is attached to a parent element to handle events for its child elements. It is useful for improving performance, especially with dynamically generated elements.

   ```javascript
   document.addEventListener('click', function(event) {
     if (event.target.classList.contains('button')) {
       // Handle button click
     }
   });
   ```

### **Error Handling and Debugging**

155. **What is error handling in JavaScript, and why is it important?**
    - Error handling is the process of gracefully handling unexpected issues (errors) in your code. It is essential for maintaining the stability and reliability of an application.

156. **How can you log messages to the console for debugging purposes in JavaScript?**
    - You can use the `console.log()` method to log messages to the console. Other methods like `console.error()`, `console.warn()`, and `console.info()` are also available for specific purposes.

   ```javascript
   console.log('This is a log message');
   console.error('This is an error message');
   ```

157. **What is a breakpoint in debugging, and how can you set breakpoints in JavaScript code?**
    - A breakpoint is a point in your code where execution is paused, allowing you to inspect variables and step through code. You can set breakpoints in most modern browsers' developer tools by clicking on the line number where you want to pause execution.

158. **Explain the purpose of unit testing in JavaScript, and how can it be implemented using testing frameworks like Jasmine or Jest?**
    - Unit testing is the practice of testing individual units (functions, methods) of code to ensure they work as expected. Testing frameworks like Jasmine and Jest provide tools for writing and running unit tests.

### **Performance Optimization**

159. **What is the Critical Rendering Path, and how can it be optimized for faster web page loading?**
    - The Critical Rendering Path is the sequence of steps the browser takes to render a web page. Optimization techniques include minimizing render-blocking resources, optimizing images, and using efficient CSS and JavaScript.

160. **Explain the importance of lazy loading and code splitting in JavaScript for improving website performance.**
    - Lazy loading and code splitting involve loading resources (e.g., JavaScript files) only when they are needed, reducing initial page load times and improving performance.

161. **What is the purpose of the "requestAnimationFrame" method in JavaScript, and how is it used for smooth animations?**
    - `requestAnimationFrame` is a method that schedules a callback to be executed before the next repaint of the browser, allowing for smooth and efficient animations.

   ```javascript
   function animate() {
     // Update animation state
     requestAnimationFrame(animate);
   }

   animate(); // Start animation loop
   ```

### **Security**

162. **What is Cross-Site Scripting (XSS), and how can it be prevented in JavaScript applications?**
    - XSS is a security vulnerability where attackers inject malicious scripts into web pages. Prevention methods include input validation, output encoding, and Content Security Policy (CSP).

163. **What is Cross-Site Request Forgery (CSRF), and how can it be prevented in JavaScript applications?**
    - CSRF is an attack where a user is tricked into making unwanted requests to a different site. Prevention methods include using anti-CSRF tokens and validating requests.

164. **Explain the concept of Content Security Policy (CSP) in web security, and how is it used to mitigate various security risks?**
    - CSP is a security feature that helps prevent XSS attacks by specifying which resources are allowed to be loaded and executed on a web page. It mitigates risks by restricting the sources of scripts, styles, and other resources.

165. **What is the Same-Origin Policy in web security, and how does it affect JavaScript applications?**
    - The Same-Origin Policy is a security measure that restricts web pages from making requests to domains other than their own. It affects JavaScript applications by preventing cross-origin requests unless explicitly allowed through techniques like JSONP or CORS.

### **Advanced Concepts**

166. **Explain the concept of "memoization" in JavaScript, and how is it used to optimize function performance?**
    - Memoization is a technique that caches the results of expensive function calls and returns the cached result when the same inputs occur again.

   ```javascript
   function memoize(fn) {
     const cache = {};
     return function(...args) {
       const key = JSON.stringify(args);
       if (!cache[key]) {
         cache[key] = fn(...args);
       }
       return cache[key];
     };
   }
   ```

167. **What is the purpose of the "async" and "await" keywords in JavaScript, and how are they used to work with asynchronous code?

**
    - `async` declares a function as asynchronous, allowing the use of `await` inside the function to pause execution until a Promise is resolved. This simplifies asynchronous code and makes it look more like synchronous code.

168. **What are Web Workers in JavaScript, and how can they improve web application performance?**
    - Web Workers are a mechanism for running JavaScript code in the background, separate from the main browser thread. They can improve performance by offloading CPU-intensive tasks, thus preventing the main thread from being blocked.

169. **Explain the concept of "lazy loading" in web development, and how can it be implemented for images and JavaScript resources?**
    - Lazy loading is a technique that defers the loading of non-essential resources until they are needed. It can be implemented for images using the `loading="lazy"` attribute and for JavaScript using dynamic import or Intersection Observer.

170. **What is the purpose of the "localStorage" and "sessionStorage" objects in JavaScript, and how are they used for client-side storage?**
    - `localStorage` and `sessionStorage` are used to store key-value pairs in the browser. `localStorage` stores data persistently across sessions, while `sessionStorage` stores data only for the duration of a page session.

171. **Explain the difference between "localStorage" and "sessionStorage" in terms of data persistence and scope.**
    - `localStorage` stores data persistently across sessions and has a broader scope (available across tabs and windows of the same domain). `sessionStorage` stores data only for the duration of a page session and has a narrower scope (limited to a single tab or window).

172. **What is the purpose of the "async" attribute in HTML script tags, and how does it affect the loading and execution of JavaScript code?**
    - The `async` attribute in HTML script tags indicates that the script should be executed asynchronously, allowing it to not block rendering of the page while it loads. However, the order of execution may not be guaranteed.

173. **Explain the concept of "hoisting" in JavaScript, and provide examples.**
    - Hoisting is a JavaScript behavior where variable and function declarations are moved to the top of their containing scope during compilation. However, only declarations are hoisted, not initializations.

   ```javascript
   console.log(x); // undefined
   var x = 10;

   // Hoisting of function declarations
   foo(); // "Hello, world!"
   function foo() {
     console.log("Hello, world!");
   }
   ```

174. **What is the purpose of the "event.preventDefault()" method in JavaScript, and how is it used to prevent default browser behavior?**
    - `event.preventDefault()` is used to prevent the default behavior of an event, such as preventing a form from submitting or preventing a link from navigating to a new page.

   ```javascript
   document.querySelector('a').addEventListener('click', function(event) {
     event.preventDefault();
   });
   ```

175. **Explain the concept of "JSON Web Tokens (JWT)" and how they are used for authentication and authorization in web applications.**
    - JSON Web Tokens (JWT) are a compact, self-contained means of representing claims to be transferred between parties. They are often used for authentication and authorization by encoding user information and privileges into a token that can be sent between the client and server.

These additional JavaScript interview questions and answers cover a wide range of topics and concepts to help you prepare for interviews at all levels. Practice implementing code examples and explaining these concepts in detail to enhance your knowledge and interview performance.







Understood! I'll provide more JavaScript interview questions and answers without repeating the ones mentioned above.

### **Scope and Closures**

176. **What is the "let" keyword in JavaScript, and how does it differ from "var" in terms of block scope?**
    - The "let" keyword is used to declare variables with block scope, meaning they are only accessible within the block they are defined in. "var" has function scope.

   ```javascript
   if (true) {
     let x = 10; // "x" is only accessible within this block
   }
   ```

177. **What is a "closure" in JavaScript, and can you provide an example of a practical use case for closures?**
    - A closure is a function that retains access to its outer (enclosing) function's scope even after the outer function has finished executing. A practical use case is maintaining private data in a module pattern.

   ```javascript
   function counter() {
     let count = 0;
     return function() {
       return ++count;
     };
   }
   const increment = counter();
   console.log(increment()); // 1
   console.log(increment()); // 2
   ```

178. **Explain the "Temporal Dead Zone" (TDZ) in JavaScript, and how does it affect the usage of "let" and "const" variables?**
    - The Temporal Dead Zone is the period between entering scope and the variable being declared. During this period, accessing the variable results in a ReferenceError. It affects "let" and "const" variables because they are not hoisted like "var" variables.

   ```javascript
   console.log(x); // ReferenceError: Cannot access 'x' before initialization
   let x = 10;
   ```

### **ES6 and Functional Programming**

179. **What are "destructuring assignments" in JavaScript, and how can they be used with arrays and objects?**
    - Destructuring assignments allow you to extract values from arrays and objects into separate variables using a concise syntax.

   ```javascript
   // Array destructuring
   const [a, b] = [1, 2];

   // Object destructuring
   const { name, age } = { name: 'John', age: 30 };
   ```

180. **Explain the concept of "currying" in functional programming, and provide an example of a curried function in JavaScript.**
    - Currying is a technique where a function that takes multiple arguments is transformed into a sequence of functions, each taking a single argument. It's often used for creating reusable functions.

   ```javascript
   function curry(fn) {
     return function curried(...args) {
       if (args.length >= fn.length) {
         return fn(...args);
       } else {
         return (...moreArgs) => curried(...args, ...moreArgs);
       }
     };
   }

   const add = curry((a, b, c) => a + b + c);
   const add5 = add(5);
   console.log(add5(3, 2)); // 10
   ```

### **Callbacks and Promises**

181. **What is a "callback hell" in JavaScript, and how can you mitigate it when working with asynchronous code?**
    - Callback hell, also known as the "pyramid of doom," occurs when multiple nested callbacks make code hard to read and maintain. You can mitigate it by using Promises, async/await, or named functions.

   ```javascript
   // Callback hell
   fetchData1(function(data1) {
     fetchData2(function(data2) {
       // ...
     });
   });

   // Mitigation with Promises
   fetchData1()
     .then(data1 => fetchData2(data1))
     .then(data2 => {
       // ...
     });
   ```

182. **Explain the purpose of the "Promise.all" method in JavaScript, and how is it used to handle multiple Promises concurrently?**
    - `Promise.all` is used to wait for all Promises in an iterable to resolve, and it returns a single Promise that resolves with an array of the resolved values.

   ```javascript
   const promises = [fetchData1(), fetchData2(), fetchData3()];
   Promise.all(promises)
     .then(dataArray => {
       // Handle the array of resolved data
     })
     .catch(error => {
       // Handle errors from any of the Promises
     });
   ```

### **DOM Manipulation**

183. **What is the purpose of the `document.querySelector()` method in JavaScript, and how is it used to select elements in the DOM?**
    - `document.querySelector()` is used to select the first element that matches a specified CSS selector within the document.

   ```javascript
   const element = document.querySelector('.my-class');
   ```

184. **Explain the difference between "textContent" and "innerHTML" when setting content for an HTML element using JavaScript.**
    - `textContent` sets the text content of an element, treating its value as plain text. `innerHTML` sets the content as HTML markup, allowing for the insertion of HTML elements.

   ```javascript
   const element = document.getElementById('my-element');
   element.textContent = 'This is plain text.';
   element.innerHTML = '<b>This is bold text.</b>';
   ```

### **Error Handling and Debugging**

185. **What is the purpose of the "try...catch" statement in JavaScript, and how is it used to handle exceptions (errors)?**
    - The `try...catch` statement is used to catch and handle exceptions (errors) in JavaScript code. It allows you to gracefully handle errors and prevent the script from crashing.

   ```javascript
   try {
     // Code that may throw an error
   } catch (error) {
     // Handle the error
   }
   ```

186. **Explain the concept of "unit testing" in JavaScript, and why is it important in software development?**
    - Unit testing involves testing individual units (functions, methods) of code to ensure they work as expected. It's important for early bug detection, code reliability, and maintaining code quality during development.

### **Performance Optimization**

187. **What is the purpose of "code splitting" in JavaScript applications, and how does it help optimize performance?**
    - Code splitting involves breaking a large JavaScript bundle into smaller chunks that are loaded on-demand. It helps optimize performance by reducing initial load times and only loading code when needed.

188. **Explain the concept of "requestAnimationFrame" in JavaScript animations, and how is it used to create smooth animations?**
    - `requestAnimationFrame` is a method that schedules a callback to be executed before the next repaint of the browser, ensuring smooth and efficient animations.

   ```javascript
   function animate() {
     // Update animation state
     requestAnimationFrame(animate);
   }

   animate(); // Start animation loop


   ```

### **Security**

189. **What is the purpose of the "Content Security Policy (CSP)" header in web security, and how is it implemented to enhance security in web applications?**
    - CSP is a security feature that helps prevent Cross-Site Scripting (XSS) attacks by specifying which resources are allowed to be loaded and executed on a web page. It's implemented by adding a CSP header to HTTP responses or using a `<meta>` tag.

   ```html
   <!-- Using a <meta> tag -->
   <meta http-equiv="Content-Security-Policy" content="default-src 'self';">
   ```

190. **Explain the concept of "Cross-Origin Resource Sharing (CORS)" in web security, and how is it configured to allow or restrict cross-origin requests in JavaScript applications?**
    - CORS is a security feature that controls whether a web page can make requests to a different domain. It's configured on the server-side by setting appropriate HTTP headers, such as "Access-Control-Allow-Origin."

   ```javascript
   // Server-side configuration example (Node.js)
   app.use((req, res, next) => {
     res.header('Access-Control-Allow-Origin', 'https://example.com');
     // Other headers and options...
     next();
   });
   ```

These additional JavaScript interview questions and answers cover a wide range of topics and concepts to help you prepare for interviews without repeating the previously mentioned questions.


