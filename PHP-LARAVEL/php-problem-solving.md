## PHP PROBLEM SOLVING FOR BEGINNER LEVEL
---

Certainly! Here are 50 more PHP problems and their solutions suitable for fresher or beginner-level PHP developer interview tests:

**Problem 101:**
Write a PHP function to find the factorial of a non-negative integer.

**Solution 101:**
```php
function factorial($n) {
    if ($n === 0) {
        return 1;
    }
    return $n * factorial($n - 1);
}

echo factorial(5); // Output: 120 (5!)
```

**Problem 102:**
Write a PHP function to check if a number is prime.

**Solution 102:**
```php
function isPrime($n) {
    if ($n <= 1) {
        return false;
    }

    for ($i = 2; $i * $i <= $n; $i++) {
        if ($n % $i === 0) {
            return false;
        }
    }

    return true;
}

echo isPrime(7); // Output: true (7 is prime)
```

**Problem 103:**
Write a PHP function to find the sum of all even numbers from 1 to n.

**Solution 103:**
```php
function sumOfEvens($n) {
    $sum = 0;
    for ($i = 2; $i <= $n; $i += 2) {
        $sum += $i;
    }
    return $sum;
}

echo sumOfEvens(6); // Output: 12 (2 + 4 + 6)
```

**Problem 104:**
Write a PHP function to count the number of vowels in a string.

**Solution 104:**
```php
function countVowels($str) {
    $vowels = ['a', 'e', 'i', 'o', 'u'];
    $count = 0;
    
    $str = strtolower($str);
    
    for ($i = 0; $i < strlen($str); $i++) {
        if (in_array($str[$i], $vowels)) {
            $count++;
        }
    }
    
    return $count;
}

echo countVowels("Hello, World!"); // Output: 3 (e, o, o)
```

**Problem 105:**
Write a PHP function to reverse a string without using built-in functions.

**Solution 105:**
```php
function reverseString($str) {
    $reversed = '';
    
    for ($i = strlen($str) - 1; $i >= 0; $i--) {
        $reversed .= $str[$i];
    }
    
    return $reversed;
}

echo reverseString("Hello"); // Output: "olleH"
```

**Problem 106:**
Write a PHP function to check if a string is a palindrome (reads the same forwards and backwards).

**Solution 106:**
```php
function isPalindrome($str) {
    $str = strtolower(preg_replace('/[^a-zA-Z0-9]/', '', $str));
    return $str === strrev($str);
}

echo isPalindrome("A man, a plan, a canal: Panama"); // Output: true
```

**Problem 107:**
Write a PHP function to find the second largest number in an array of integers.

**Solution 107:**
```php
function secondLargest($nums) {
    $first = $second = PHP_INT_MIN;
    
    foreach ($nums as $num) {
        if ($num > $first) {
            $second = $first;
            $first = $num;
        } elseif ($num > $second && $num !== $first) {
            $second = $num;
        }
    }
    
    return ($second !== PHP_INT_MIN) ? $second : null;
}

$array = [3, 1, 5, 7, 4, 2];
echo secondLargest($array); // Output: 5
```

**Problem 108:**
Write a PHP function to find the GCD (Greatest Common Divisor) of two numbers.

**Solution 108:**
```php
function gcd($a, $b) {
    while ($b !== 0) {
        $temp = $b;
        $b = $a % $b;
        $a = $temp;
    }
    return $a;
}

echo gcd(24, 36); // Output: 12 (GCD of 24 and 36)
```

**Problem 109:**
Write a PHP function to check if a number is a palindrome (reads the same forwards and backwards) without converting it to a string.

**Solution 109:**
```php
function isPalindromeNumber($num) {
    if ($num < 0 || ($num % 10 === 0 && $num !== 0)) {
        return false;
    }

    $reversed = 0;

    while ($num > $reversed) {
        $reversed = $reversed * 10 + $num % 10;
        $num = (int)($num / 10);
    }

    return $num === $reversed || $num === (int)($reversed / 10);
}

echo isPalindromeNumber(121); // Output: true
```

**Problem 110:**
Write a PHP function to find the intersection of two arrays (elements present in both arrays).

**Solution 110:**
```php
function arrayIntersection($nums1, $nums2) {
    return array_values(array_intersect($nums1, $nums2));
}

$array1 = [1, 2, 2, 1];
$array2 = [2, 2];
print_r(arrayIntersection($array1, $array2)); // Output: [2, 2]
```

**Problem 111:

**
Write a PHP function to merge two sorted arrays into a new sorted array.

**Solution 111:**
```php
function mergeSortedArrays($nums1, $nums2) {
    $merged = [];
    $i = 0;
    $j = 0;
    
    while ($i < count($nums1) && $j < count($nums2)) {
        if ($nums1[$i] < $nums2[$j]) {
            $merged[] = $nums1[$i];
            $i++;
        } else {
            $merged[] = $nums2[$j];
            $j++;
        }
    }
    
    while ($i < count($nums1)) {
        $merged[] = $nums1[$i];
        $i++;
    }
    
    while ($j < count($nums2)) {
        $merged[] = $nums2[$j];
        $j++;
    }
    
    return $merged;
}

$array1 = [1, 3, 5];
$array2 = [2, 4, 6];
print_r(mergeSortedArrays($array1, $array2)); // Output: [1, 2, 3, 4, 5, 6]
```

**Problem 112:**
Write a PHP function to find the maximum subarray sum in an array (contiguous subarray).

**Solution 112:**
```php
function maxSubArray($nums) {
    $maxSum = $currentSum = $nums[0];

    for ($i = 1; $i < count($nums); $i++) {
        $currentSum = max($nums[$i], $currentSum + $nums[$i]);
        $maxSum = max($maxSum, $currentSum);
    }

    return $maxSum;
}

$array = [-2, 1, -3, 4, -1, 2, 1, -5, 4];
echo maxSubArray($array); // Output: 6 (subarray [4, -1, 2, 1])
```

**Problem 113:**
Write a PHP function to rotate an array to the right by k steps.

**Solution 113:**
```php
function rotateArray($nums, $k) {
    $k %= count($nums);
    $nums = array_merge(array_slice($nums, -$k), array_slice($nums, 0, count($nums) - $k));
    return $nums;
}

$array = [1, 2, 3, 4, 5, 6, 7];
$k = 3;
print_r(rotateArray($array, $k)); // Output: [5, 6, 7, 1, 2, 3, 4]
```

**Problem 114:**
Write a PHP function to implement a simple calculator that can perform addition, subtraction, multiplication, and division.

**Solution 114:**
```php
function calculate($s) {
    $stack = [];
    $num = 0;
    $sign = 1;
    $result = 0;

    for ($i = 0; $i < strlen($s); $i++) {
        $char = $s[$i];

        if (is_numeric($char)) {
            $num = $num * 10 + intval($char);
        } elseif ($char === '+') {
            $result += $sign * $num;
            $num = 0;
            $sign = 1;
        } elseif ($char === '-') {
            $result += $sign * $num;
            $num = 0;
            $sign = -1;
        } elseif ($char === '*') {
            $num = $num * intval($s[$i + 1]);
            $i++;
        } elseif ($char === '/') {
            $num = $num / intval($s[$i + 1]);
            $i++;
        }
    }

    $result += $sign * $num;

    return $result;
}

echo calculate("3+2*2"); // Output: 7
```

**Problem 115:**
Write a PHP function to find the majority element in an array (element that appears more than ⌊n/2⌋ times).

**Solution 115:**
```php
function majorityElement($nums) {
    $count = 0;
    $candidate = null;

    foreach ($nums as $num) {
        if ($count === 0) {
            $candidate = $num;
        }

        $count += ($num === $candidate) ? 1 : -1;
    }

    return $candidate;
}

$array = [3, 2, 3];
echo majorityElement($array); // Output: 3 (3 appears more than ⌊3/2⌋ times)
```

**Problem 116:**
Write a PHP function to find the peak element in an array (an element which is greater than or equal to its neighbors).

**Solution 116:**
```php
function findPeakElement($nums) {
    $left = 0;
    $right = count($nums) - 1;

    while ($left < $right) {
        $mid = $left + intval(($right - $left) / 2);

        if ($nums[$mid] < $nums[$mid + 1]) {
            $left = $mid + 1;
        } else {
            $right = $mid;
        }
    }

    return $left;
}

$array = [1, 2, 3, 1];
echo findPeakElement($array); // Output: 2 (peak element is 3)
```

**Problem 117:**
Write a PHP function to implement a basic calculator that can evaluate expressions containing "+", "-", "*", and "/" operators, as well as parentheses.

**Solution 117:**
```php
function evaluateExpression($s) {
    $stack = new SplStack();
    $currentNumber = 0;
    $currentOperator = '+';

    for ($i = 0; $i < strlen($s); $i++) {
        $char = $s[$i];

        if (is_numeric($char)) {
            $currentNumber = $currentNumber * 10 + intval($char);
        }

        if ((!is_numeric($char) && $char !== ' ') || $i === strlen($s) - 1) {
            if ($currentOperator === '+') {
                $stack->push($currentNumber);
            } elseif ($currentOperator === '-') {
                $stack->push(-$currentNumber);
            } elseif ($currentOperator === '*') {
                $stack->push($stack->pop() * $currentNumber);
            } elseif ($currentOperator === '/') {
                $stack->push(intval($stack->pop() / $currentNumber));
            }

            $currentOperator = $char;
            $currentNumber = 0;
        }
    }

    $result = 0;

    while (!$stack->isEmpty()) {
        $result += $stack->pop();
    }

    return $result;
}

echo evaluateExpression("3+2*2"); // Output: 7
```

**Problem 118:**
Write a PHP function to find the longest palindromic substring in a string.

**Solution 118

:**
```php
function longestPalindromicSubstring($s) {
    $start = $end = 0;

    for ($i = 0; $i < strlen($s); $i++) {
        $len1 = expandAroundCenter($s, $i, $i);
        $len2 = expandAroundCenter($s, $i, $i + 1);
        $len = max($len1, $len2);

        if ($len > $end - $start) {
            $start = $i - intval(($len - 1) / 2);
            $end = $i + intval($len / 2);
        }
    }

    return substr($s, $start, $end - $start + 1);
}

function expandAroundCenter($s, $left, $right) {
    while ($left >= 0 && $right < strlen($s) && $s[$left] === $s[$right]) {
        $left--;
        $right++;
    }

    return $right - $left - 1;
}

echo longestPalindromicSubstring("babad"); // Output: "bab" or "aba"
```

**Problem 119:**
Write a PHP function to reverse words in a string.

**Solution 119:**
```php
function reverseWords($s) {
    $words = explode(' ', $s);
    $reversed = [];
    
    foreach ($words as $word) {
        $reversed[] = strrev($word);
    }
    
    return implode(' ', $reversed);
}

echo reverseWords("Let's take LeetCode contest"); // Output: "s'teL ekat edoCteeL tsetnoc"
```

**Problem 120:**
Write a PHP function to find the longest common prefix among an array of strings.

**Solution 120:**
```php
function longestCommonPrefix($strs) {
    if (empty($strs)) {
        return "";
    }

    $prefix = $strs[0];

    for ($i = 1; $i < count($strs); $i++) {
        while (strpos($strs[$i], $prefix) !== 0) {
            $prefix = substr($prefix, 0, strlen($prefix) - 1);

            if (empty($prefix)) {
                return "";
            }
        }
    }

    return $prefix;
}

$array = ["flower", "flow", "flight"];
echo longestCommonPrefix($array); // Output: "fl"
```

**Problem 121:**
Write a PHP function to perform matrix multiplication between two matrices.

**Solution 121:**
```php
function matrixMultiplication($matrix1, $matrix2) {
    $m1Rows = count($matrix1);
    $m1Cols = count($matrix1[0]);
    $m2Cols = count($matrix2[0]);
    
    $result = array_fill(0, $m1Rows, array_fill(0, $m2Cols, 0));
    
    for ($i = 0; $i < $m1Rows; $i++) {
        for ($j = 0; $j < $m2Cols; $j++) {
            for ($k = 0; $k < $m1Cols; $k++) {
                $result[$i][$j] += $matrix1[$i][$k] * $matrix2[$k][$j];
            }
        }
    }
    
    return $result;
}

$matrix1 = [
    [1, 2],
    [3, 4]
];

$matrix2 = [
    [5, 6],
    [7, 8]
];

print_r(matrixMultiplication($matrix1, $matrix2)); // Output: [[19, 22], [43, 50]]
```

**Problem 122:**
Write a PHP function to generate all possible combinations of a set of distinct integers.

**Solution 122:**
```php
function combinations($nums) {
    $result = [[]];

    foreach ($nums as $num) {
        $newCombinations = [];

        foreach ($result as $combination) {
            for ($i = array_search($num, $nums) + 1; $i < count($nums); $i++) {
                $newCombination = $combination;
                $newCombination[] = $nums[$i];
                $newCombinations[] = $newCombination;
            }
        }

        $result = array_merge($result, $newCombinations);
    }

    return $result;
}

$array = [1, 2, 3];
print_r(combinations($array)); // Output: [[], [1], [2], [3], [1, 2], [1, 3], [2, 3], [1, 2, 3]]
```

**Problem 123:**
Write a PHP function to find the kth smallest element in a BST (Binary Search Tree).

**Solution 123:**
```php
class TreeNode {
    public $val;
    public $left;
    public $right;

    public function __construct($val = 0, $left = null, $right = null) {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}

function kthSmallest($root, $k) {
    $stack = new SplStack();

    while (true) {
        while ($root !== null) {
            $stack->push($root);
            $root = $root->left;
        }

        $root = $stack->pop();
        $k--;

        if ($k === 0) {
            return $root->val;
        }

        $root = $root->right;
    }
}

$root = new TreeNode(3);
$root->left = new TreeNode(1);
$root->left->right = new TreeNode(2);
$root->right = new TreeNode(4);
$k = 1;
echo kthSmallest($root, $k); // Output: 1
```

**Problem 124:**
Write a PHP function to find the sum of all left leaves in a binary tree.

**Solution 124:**
```php
class TreeNode {
    public $val;
    public $left;
    public $right;

    public function __construct($val = 0, $left = null, $right = null) {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}

function sumOfLeftLeaves($root) {
    if ($root === null) {
        return 0;
    }

    $sum = 0;

    if ($root->left !== null && $root->left->left === null && $root->left->right === null) {
        $sum += $root->left->val;
    }

    $sum += sumOfLeftLeaves($root->left);
    $sum += sumOfLeftLeaves($root->right);

    return $sum;
}

$root = new TreeNode(3);
$root->left = new TreeNode(9);
$root->right = new TreeNode(20);
$root->right->left = new TreeNode(

15);
$root->right->right = new TreeNode(7);
echo sumOfLeftLeaves($root); // Output: 24 (9 + 15)
```

**Problem 125:**
Write a PHP function to find the maximum depth of a binary tree (the maximum path from the root node to any leaf node).

**Solution 125:**
```php
class TreeNode {
    public $val;
    public $left;
    public $right;

    public function __construct($val = 0, $left = null, $right = null) {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}

function maxDepth($root) {
    if ($root === null) {
        return 0;
    }

    $leftDepth = maxDepth($root->left);
    $rightDepth = maxDepth($root->right);

    return max($leftDepth, $rightDepth) + 1;
}

$root = new TreeNode(3);
$root->left = new TreeNode(9);
$root->right = new TreeNode(20);
$root->right->left = new TreeNode(15);
$root->right->right = new TreeNode(7);
echo maxDepth($root); // Output: 3
```

**Problem 126:**
Write a PHP function to check if a binary tree is symmetric (mirror image of itself).

**Solution 126:**
```php
class TreeNode {
    public $val;
    public $left;
    public $right;

    public function __construct($val = 0, $left = null, $right = null) {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}

function isSymmetric($root) {
    return isMirror($root, $root);
}

function isMirror($left, $right) {
    if ($left === null && $right === null) {
        return true;
    }

    if ($left === null || $right === null) {
        return false;
    }

    return ($left->val === $right->val) &&
        isMirror($left->left, $right->right) &&
        isMirror($left->right, $right->left);
}

$root = new TreeNode(1);
$root->left = new TreeNode(2);
$root->left->left = new TreeNode(3);
$root->left->right = new TreeNode(4);
$root->right = new TreeNode(2);
$root->right->left = new TreeNode(4);
$root->right->right = new TreeNode(3);
echo isSymmetric($root); // Output: true
```

**Problem 127:**
Write a PHP function to find the longest consecutive sequence in an unsorted array of integers.

**Solution 127:**
```php
function longestConsecutive($nums) {
    if (empty($nums)) {
        return 0;
    }

    sort($nums);
    $maxStreak = $currentStreak = 1;

    for ($i = 1; $i < count($nums); $i++) {
        if ($nums[$i] !== $nums[$i - 1]) {
            if ($nums[$i] === $nums[$i - 1] + 1) {
                $currentStreak++;
            } else {
                $maxStreak = max($maxStreak, $currentStreak);
                $currentStreak = 1;
            }
        }
    }

    return max($maxStreak, $currentStreak);
}

$array = [100, 4, 200, 1, 3, 2];
echo longestConsecutive($array); // Output: 4 (longest consecutive sequence is [1, 2, 3, 4])
```

**Problem 128:**
Write a PHP function to remove duplicates from a sorted array in-place and return the new length of the array.

**Solution 128:**
```php
function removeDuplicates(&$nums) {
    $count = 0;
    
    for ($i = 0; $i < count($nums); $i++) {
        if ($i === 0 || $nums[$i] !== $nums[$i - 1]) {
            $nums[$count] = $nums[$i];
            $count++;
        }
    }
    
    return $count;
}

$array = [1, 1, 2, 2, 2, 3, 4, 4, 5];
echo removeDuplicates($array); // Output: 5 (modified array contains [1, 2, 3, 4, 5])
```

**Problem 129:**
Write a PHP function to implement a simple stack using arrays.

**Solution 129:**
```php
class SimpleStack {
    private $stack = [];

    public function push($val) {
        array_push($this->stack, $val);
    }

    public function pop() {
        if ($this->isEmpty()) {
            return null;
        }

        return array_pop($this->stack);
    }

    public function top() {
        if ($this->isEmpty()) {
            return null;
        }

        return end($this->stack);
    }

    public function isEmpty() {
        return empty($this->stack);
    }
}

$stack = new SimpleStack();
$stack->push(1);
$stack->push(2);
echo $stack->top(); // Output: 2
echo $stack->pop(); // Output: 2
echo $stack->isEmpty() ? "Empty" : "Not Empty"; // Output: Not Empty
```

**Problem 130:**
Write a PHP function to implement a simple queue using arrays.

**Solution 130:**
```php
class SimpleQueue {
    private $queue = [];

    public function enqueue($val) {
        array_push($this->queue, $val);
    }

    public function dequeue() {
        if ($this->isEmpty()) {
            return null;
        }

        return array_shift($this->queue);
    }

    public function front() {
        if ($this->isEmpty()) {
            return null;
        }

        return reset($this->queue);
    }

    public function isEmpty() {
        return empty($this->queue);
    }
}

$queue = new SimpleQueue();
$queue->enqueue(1);
$queue->enqueue(2);
echo $queue->front(); // Output: 1
echo $queue->dequeue(); // Output: 1
echo $queue->isEmpty() ? "Empty" : "Not Empty"; // Output: Not Empty
```

**Problem 131:**
Write a PHP function to reverse a linked list.

**Solution 131:**
```php
class ListNode {
    public $val;
    public $next;

    public function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}

function reverseLinkedList($head) {
    $prev = null;
    $current = $head;

    while ($current !== null) {
        $next = $current->next;
        $current->next = $prev;
        $prev = $current;


        $current = $next;
    }

    return $prev;
}

$list = new ListNode(1);
$list->next = new ListNode(2);
$list->next->next = new ListNode(3);
$list->next->next->next = new ListNode(4);
$list->next->next->next->next = new ListNode(5);

$reversed = reverseLinkedList($list);
while ($reversed !== null) {
    echo $reversed->val . " ";
    $reversed = $reversed->next;
}
// Output: "5 4 3 2 1"
```

**Problem 132:**
Write a PHP function to check if a linked list has a cycle.

**Solution 132:**
```php
class ListNode {
    public $val;
    public $next;

    public function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}

function hasCycle($head) {
    $slow = $head;
    $fast = $head;

    while ($fast !== null && $fast->next !== null) {
        $slow = $slow->next;
        $fast = $fast->next->next;

        if ($slow === $fast) {
            return true;
        }
    }

    return false;
}

$list = new ListNode(1);
$list->next = new ListNode(2);
$list->next->next = new ListNode(3);
$list->next->next->next = $list; // Create a cycle

echo hasCycle($list) ? "Cycle Found" : "No Cycle Found"; // Output: "Cycle Found"
```

**Problem 133:**
Write a PHP function to find the intersection point of two linked lists.

**Solution 133:**
```php
class ListNode {
    public $val;
    public $next;

    public function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}

function getIntersectionNode($headA, $headB) {
    $a = $headA;
    $b = $headB;

    while ($a !== $b) {
        $a = ($a === null) ? $headB : $a->next;
        $b = ($b === null) ? $headA : $b->next;
    }

    return $a;
}

// Create two intersecting linked lists
$listA = new ListNode(1);
$listA->next = new ListNode(2);
$listA->next->next = new ListNode(3);

$listB = new ListNode(4);
$listB->next = $listA->next->next;

$intersection = getIntersectionNode($listA, $listB);
echo $intersection->val; // Output: 3 (intersection point)
```

**Problem 134:**
Write a PHP function to implement a basic hash table (key-value store) with methods for inserting, retrieving, and deleting values.

**Solution 134:**
```php
class HashTable {
    private $table = [];

    public function put($key, $value) {
        $hash = $this->hash($key);
        $this->table[$hash] = $value;
    }

    public function get($key) {
        $hash = $this->hash($key);
        return isset($this->table[$hash]) ? $this->table[$hash] : null;
    }

    public function remove($key) {
        $hash = $this->hash($key);
        if (isset($this->table[$hash])) {
            unset($this->table[$hash]);
        }
    }

    private function hash($key) {
        return md5($key); // Simple hash function (not suitable for real-world use)
    }
}

$hashTable = new HashTable();
$hashTable->put("name", "John");
$hashTable->put("age", 30);
echo $hashTable->get("name"); // Output: "John"
$hashTable->remove("age");
echo $hashTable->get("age"); // Output: null
```

**Problem 135:**
Write a PHP function to implement a basic set data structure (a collection of unique elements) with methods for adding, removing, and checking the existence of elements.

**Solution 135:**
```php
class SimpleSet {
    private $set = [];

    public function add($val) {
        $this->set[$val] = true;
    }

    public function remove($val) {
        if ($this->contains($val)) {
            unset($this->set[$val]);
        }
    }

    public function contains($val) {
        return isset($this->set[$val]);
    }
}

$set = new SimpleSet();
$set->add(1);
$set->add(2);
echo $set->contains(1) ? "Contains 1" : "Does not contain 1"; // Output: "Contains 1"
$set->remove(2);
echo $set->contains(2) ? "Contains 2" : "Does not contain 2"; // Output: "Does not contain 2"
```

**Problem 136:**
Write a PHP function to implement a basic queue using two stacks.

**Solution 136:**
```php
class TwoStackQueue {
    private $stack1 = [];
    private $stack2 = [];

    public function enqueue($val) {
        array_push($this->stack1, $val);
    }

    public function dequeue() {
        if ($this->isEmpty()) {
            return null;
        }

        if (empty($this->stack2)) {
            while (!empty($this->stack1)) {
                array_push($this->stack2, array_pop($this->stack1));
            }
        }

        return array_pop($this->stack2);
    }

    public function isEmpty() {
        return empty($this->stack1) && empty($this->stack2);
    }
}

$queue = new TwoStackQueue();
$queue->enqueue(1);
$queue->enqueue(2);
echo $queue->dequeue(); // Output: 1
echo $queue->dequeue(); // Output: 2
```

**Problem 137:**
Write a PHP function to implement a basic stack using two queues.

**Solution 137:**
```php
class TwoQueueStack {
    private $queue1 = [];
    private $queue2 = [];

    public function push($val) {
        array_push($this->queue1, $val);
    }

    public function pop() {
        if ($this->isEmpty()) {
            return null;
        }

        while (count($this->queue1) > 1) {
            array_push($this->queue2, array_shift($this->queue1));
        }

        $element = array_shift($this->queue1);

        list($this->queue1, $this->queue2) = [$this->queue2, $this->queue1];

        return $element;
    }

    public function isEmpty() {
        return empty($this->queue1);
    }
}

$stack = new TwoQueueStack();
$stack->push(1);
$stack->push(2);
echo $stack->pop(); //

 Output: 2
echo $stack->pop(); // Output: 1
```

**Problem 138:**
Write a PHP function to find the minimum depth of a binary tree (the minimum path from the root node to any leaf node).

**Solution 138:**
```php
class TreeNode {
    public $val;
    public $left;
    public $right;

    public function __construct($val = 0, $left = null, $right = null) {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}

function minDepth($root) {
    if ($root === null) {
        return 0;
    }

    if ($root->left === null) {
        return minDepth($root->right) + 1;
    }

    if ($root->right === null) {
        return minDepth($root->left) + 1;
    }

    return min(minDepth($root->left), minDepth($root->right)) + 1;
}

$root = new TreeNode(3);
$root->left = new TreeNode(9);
$root->right = new TreeNode(20);
$root->right->left = new TreeNode(15);
$root->right->right = new TreeNode(7);
echo minDepth($root); // Output: 2
```

**Problem 139:**
Write a PHP function to check if a binary tree is balanced (the heights of the two subtrees of every node never differ by more than 1).

**Solution 139:**
```php
class TreeNode {
    public $val;
    public $left;
    public $right;

    public function __construct($val = 0, $left = null, $right = null) {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}

function isBalanced($root) {
    return maxDepth($root) !== -1;
}

function maxDepth($root) {
    if ($root === null) {
        return 0;
    }

    $leftDepth = maxDepth($root->left);
    if ($leftDepth === -1) {
        return -1;
    }

    $rightDepth = maxDepth($root->right);
    if ($rightDepth === -1) {
        return -1;
    }

    if (abs($leftDepth - $rightDepth) > 1) {
        return -1;
    }

    return max($leftDepth, $rightDepth) + 1;
}

$root = new TreeNode(3);
$root->left = new TreeNode(9);
$root->right = new TreeNode(20);
$root->right->left = new TreeNode(15);
$root->right->right = new TreeNode(7);
echo isBalanced($root) ? "Balanced" : "Not Balanced"; // Output: "true"
```

**Problem 140:**
Write a PHP function to implement a simple priority queue using an array.

**Solution 140:**
```php
class PriorityQueue {
    private $queue = [];

    public function push($val, $priority) {
        $this->queue[] = [$val, $priority];
        usort($this->queue, function ($a, $b) {
            return $a[1] - $b[1];
        });
    }

    public function pop() {
        if ($this->isEmpty()) {
            return null;
        }

        return array_shift($this->queue)[0];
    }

    public function isEmpty() {
        return empty($this->queue);
    }
}

$queue = new PriorityQueue();
$queue->push("A", 3);
$queue->push("B", 1);
$queue->push("C", 2);
echo $queue->pop(); // Output: "B"
echo $queue->pop(); // Output: "C"
```

**Problem 141:**
Write a PHP function to find the first non-repeating character in a string.

**Solution 141:**
```php
function firstUniqChar($s) {
    $charCount = [];

    for ($i = 0; $i < strlen($s); $i++) {
        $char = $s[$i];
        $charCount[$char]++;
    }

    for ($i = 0; $i < strlen($s); $i++) {
        $char = $s[$i];

        if ($charCount[$char] === 1) {
            return $char;
        }
    }

    return "";
}

$string = "leetcode";
echo firstUniqChar($string); // Output: "l"
```

**Problem 142:**
Write a PHP function to implement a basic trie (prefix tree) with methods for inserting, searching, and deleting words.

**Solution 142:**
```php
class TrieNode {
    public $children = [];
    public $isEndOfWord = false;
}

class Trie {
    private $root;

    public function __construct() {
        $this->root = new TrieNode();
    }

    public function insert($word) {
        $node = $this->root;

        for ($i = 0; $i < strlen($word); $i++) {
            $char = $word[$i];

            if (!isset($node->children[$char])) {
                $node->children[$char] = new TrieNode();
            }

            $node = $node->children[$char];
        }

        $node->isEndOfWord = true;
    }

    public function search($word) {
        $node = $this->root;

        for ($i = 0; $i < strlen($word); $i++) {
            $char = $word[$i];

            if (!isset($node->children[$char])) {
                return false;
            }

            $node = $node->children[$char];
        }

        return $node->isEndOfWord;
    }

    public function startsWith($prefix) {
        $node = $this->root;

        for ($i = 0; $i < strlen($prefix); $i++) {
            $char = $prefix[$i];

            if (!isset($node->children[$char])) {
                return false;
            }

            $node = $node->children[$char];
        }

        return true;
    }
}

$trie = new Trie();
$trie->insert("apple");
echo $trie->search("apple") ? "Found" : "Not Found"; // Output: "Found"
echo $trie->search("app") ? "Found" : "Not Found"; // Output: "Not Found"
echo $trie->startsWith("app") ? "Starts with" : "Does not start with"; // Output: "Starts with"
$trie->insert("app");
echo $trie->search("app") ? "Found" : "Not Found"; // Output: "Found"
```

**Problem 143:**
Write a PHP function to find the longest increasing subsequence in an array of integers.

**Solution 143:**
```php
function lengthOfLIS($nums) {
    $dp = array_fill(0, count($nums), 1);

    for ($i = 1; $i < count($

nums); $i++) {
        for ($j = 0; $j < $i; $j++) {
            if ($nums[$i] > $nums[$j]) {
                $dp[$i] = max($dp[$i], $dp[$j] + 1);
            }
        }
    }

    return max($dp);
}

$array = [10, 9, 2, 5, 3, 7, 101, 18];
echo lengthOfLIS($array); // Output: 4 (longest increasing subsequence is [2, 3, 7, 101])
```

**Problem 144:**
Write a PHP function to implement a basic circular queue using an array.

**Solution 144:**
```php
class CircularQueue {
    private $queue = [];
    private $size = 0;
    private $front = 0;
    private $rear = -1;

    public function __construct($size) {
        $this->size = $size;
    }

    public function enqueue($val) {
        if ($this->isFull()) {
            return false; // Queue is full
        }

        $this->rear = ($this->rear + 1) % $this->size;
        $this->queue[$this->rear] = $val;

        return true;
    }

    public function dequeue() {
        if ($this->isEmpty()) {
            return null; // Queue is empty
        }

        $val = $this->queue[$this->front];
        $this->front = ($this->front + 1) % $this->size;

        return $val;
    }

    public function isEmpty() {
        return $this->front === $this->rear + 1;
    }

    public function isFull() {
        return ($this->rear + 1) % $this->size === $this->front;
    }
}

$queue = new CircularQueue(3);
$queue->enqueue(1);
$queue->enqueue(2);
$queue->enqueue(3);
echo $queue->isFull() ? "Full" : "Not Full"; // Output: "Full"
echo $queue->dequeue(); // Output: 1
echo $queue->enqueue(4) ? "Enqueued" : "Not Enqueued"; // Output: "Not Enqueued" (queue is full)
```

**Problem 145:**
Write a PHP function to find the maximum subarray sum in an array of integers.

**Solution 145:**
```php
function maxSubArray($nums) {
    $maxSum = $currentSum = $nums[0];

    for ($i = 1; $i < count($nums); $i++) {
        $currentSum = max($nums[$i], $currentSum + $nums[$i]);
        $maxSum = max($maxSum, $currentSum);
    }

    return $maxSum;
}

$array = [-2, 1, -3, 4, -1, 2, 1, -5, 4];
echo maxSubArray($array); // Output: 6 (maximum subarray sum is [4, -1, 2, 1])
```

**Problem 146:**
Write a PHP function to find the minimum window in a string that contains all characters of another string.

**Solution 146:**
```php
function minWindow($s, $t) {
    $charCount = [];
    
    for ($i = 0; $i < strlen($t); $i++) {
        $char = $t[$i];
        $charCount[$char]++;
    }
    
    $left = $right = $count = 0;
    $minWindow = "";
    $minLength = PHP_INT_MAX;
    
    while ($right < strlen($s)) {
        $rightChar = $s[$right];
        
        if (isset($charCount[$rightChar])) {
            $charCount[$rightChar]--;
            
            if ($charCount[$rightChar] >= 0) {
                $count++;
            }
        }
        
        while ($count === strlen($t)) {
            if ($right - $left + 1 < $minLength) {
                $minLength = $right - $left + 1;
                $minWindow = substr($s, $left, $minLength);
            }
            
            $leftChar = $s[$left];
            
            if (isset($charCount[$leftChar])) {
                $charCount[$leftChar]++;
                
                if ($charCount[$leftChar] > 0) {
                    $count--;
                }
            }
            
            $left++;
        }
        
        $right++;
    }
    
    return $minWindow;
}

$source = "ADOBECODEBANC";
$target = "ABC";
echo minWindow($source, $target); // Output: "BANC"
```

**Problem 147:**
Write a PHP function to find all anagrams of a string within a list of strings.

**Solution 147:**
```php
function findAnagrams($s, $words) {
    $result = [];
    $charCount = count_chars($s, 1);

    foreach ($words as $word) {
        if (count_chars($word, 1) === $charCount) {
            $result[] = $word;
        }
    }

    return $result;
}

$source = "listen";
$wordList = ["enlist", "silent", "inlets", "hello"];
print_r(findAnagrams($source, $wordList)); // Output: ["enlist", "inlets"]
```

**Problem 148:**
Write a PHP function to check if a string is a valid palindrome, considering only alphanumeric characters and ignoring cases.

**Solution 148:**
```php
function isPalindrome($s) {
    $s = preg_replace("/[^a-zA-Z0-9]/", "", $s);
    $s = strtolower($s);

    return $s === strrev($s);
}

$string = "A man, a plan, a canal: Panama";
echo isPalindrome($string) ? "Palindrome" : "Not Palindrome"; // Output: "Palindrome"
```

**Problem 149:**
Write a PHP function to find the shortest word distance between two words in a list of words.

**Solution 149:**
```php
function shortestDistance($words, $word1, $word2) {
    $index1 = $index2 = -1;
    $minDistance = PHP_INT_MAX;

    for ($i = 0; $i < count($words); $i++) {
        if ($words[$i] === $word1) {
            $index1 = $i;
        } elseif ($words[$i] === $word2) {
            $index2 = $i;
        }

        if ($index1 !== -1 && $index2 !== -1) {
            $minDistance = min($minDistance, abs($index1 - $index2));
        }
    }

    return $minDistance;
}

$wordList = ["practice", "makes", "perfect", "coding", "makes"];
$word1 = "coding";
$word2 = "practice";
echo shortestDistance($wordList, $word1, $word

2); // Output: 3
```

**Problem 150:**
Write a PHP function to implement a basic stack using a linked list.

**Solution 150:**
```php
class ListNode {
    public $val;
    public $next;

    public function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}

class SimpleStack {
    private $head;

    public function push($val) {
        $newNode = new ListNode($val);
        $newNode->next = $this->head;
        $this->head = $newNode;
    }

    public function pop() {
        if ($this->isEmpty()) {
            return null;
        }

        $val = $this->head->val;
        $this->head = $this->head->next;

        return $val;
    }

    public function top() {
        return $this->isEmpty() ? null : $this->head->val;
    }

    public function isEmpty() {
        return $this->head === null;
    }
}

$stack = new SimpleStack();
$stack->push(1);
$stack->push(2);
echo $stack->top(); // Output: 2
echo $stack->pop(); // Output: 2
echo $stack->isEmpty() ? "Empty" : "Not Empty"; // Output: Not Empty
```

Certainly! Here are 50 more PHP problems and their solutions for fresher/beginner-level developer interview preparation:

**Problem 151:**
Write a PHP function to reverse a string.

**Solution 151:**
```php
function reverseString($s) {
    return strrev($s);
}

$string = "hello";
echo reverseString($string); // Output: "olleh"
```

**Problem 152:**
Write a PHP function to find the factorial of a non-negative integer.

**Solution 152:**
```php
function factorial($n) {
    if ($n <= 1) {
        return 1;
    }

    return $n * factorial($n - 1);
}

echo factorial(5); // Output: 120
```

**Problem 153:**
Write a PHP function to check if a number is prime.

**Solution 153:**
```php
function isPrime($n) {
    if ($n <= 1) {
        return false;
    }

    for ($i = 2; $i * $i <= $n; $i++) {
        if ($n % $i === 0) {
            return false;
        }
    }

    return true;
}

echo isPrime(7) ? "Prime" : "Not Prime"; // Output: "Prime"
```

**Problem 154:**
Write a PHP function to find the sum of all even numbers from 1 to a given positive integer.

**Solution 154:**
```php
function sumOfEvens($n) {
    $sum = 0;

    for ($i = 2; $i <= $n; $i += 2) {
        $sum += $i;
    }

    return $sum;
}

echo sumOfEvens(10); // Output: 30 (2 + 4 + 6 + 8 + 10)
```

**Problem 155:**
Write a PHP function to find the GCD (Greatest Common Divisor) of two positive integers.

**Solution 155:**
```php
function gcd($a, $b) {
    while ($b !== 0) {
        $temp = $b;
        $b = $a % $b;
        $a = $temp;
    }

    return $a;
}

echo gcd(12, 18); // Output: 6
```

**Problem 156:**
Write a PHP function to count the number of vowels in a string (case-insensitive).

**Solution 156:**
```php
function countVowels($s) {
    $s = strtolower($s);
    $vowels = ['a', 'e', 'i', 'o', 'u'];
    $count = 0;

    for ($i = 0; $i < strlen($s); $i++) {
        if (in_array($s[$i], $vowels)) {
            $count++;
        }
    }

    return $count;
}

$string = "Hello World";
echo countVowels($string); // Output: 3
```

**Problem 157:**
Write a PHP function to check if a string is a palindrome (ignoring spaces and case).

**Solution 157:**
```php
function isPalindromeIgnoringSpaceAndCase($s) {
    $s = strtolower(preg_replace('/[^A-Za-z0-9]/', '', $s));
    return $s === strrev($s);
}

$string = "A man, a plan, a canal: Panama";
echo isPalindromeIgnoringSpaceAndCase($string) ? "Palindrome" : "Not Palindrome"; // Output: "Palindrome"
```

**Problem 158:**
Write a PHP function to find the second largest number in an array of integers.

**Solution 158:**
```php
function secondLargest($nums) {
    $max1 = $max2 = PHP_INT_MIN;

    foreach ($nums as $num) {
        if ($num > $max1) {
            $max2 = $max1;
            $max1 = $num;
        } elseif ($num > $max2 && $num !== $max1) {
            $max2 = $num;
        }
    }

    return $max2 === PHP_INT_MIN ? null : $max2;
}

$array = [3, 1, 5, 7, 4];
echo secondLargest($array); // Output: 5
```

**Problem 159:**
Write a PHP function to find the missing number in an array of consecutive integers.

**Solution 159:**
```php
function findMissingNumber($nums) {
    $n = count($nums);
    $expectedSum = ($n * ($n + 1)) / 2;
    $actualSum = array_sum($nums);

    return $expectedSum - $actualSum;
}

$array = [3, 0, 1];
echo findMissingNumber($array); // Output: 2
```

**Problem 160:**
Write a PHP function to remove all duplicates from an array of integers.

**Solution 160:**
```php
function removeDuplicatesFromArray($nums) {
    return array_values(array_unique($nums));
}

$array = [1, 2, 2, 3, 4, 4, 5];
print_r(removeDuplicatesFromArray($array)); // Output: [1, 2, 3, 4, 5]
```

**Problem 161:**
Write a PHP function to find the intersection of two arrays.

**Solution 

161:**
```php
function arrayIntersection($nums1, $nums2) {
    return array_values(array_intersect($nums1, $nums2));
}

$array1 = [1, 2, 2, 1];
$array2 = [2, 2];
print_r(arrayIntersection($array1, $array2)); // Output: [2, 2]
```

**Problem 162:**
Write a PHP function to find the union of two arrays.

**Solution 162:**
```php
function arrayUnion($nums1, $nums2) {
    return array_values(array_unique(array_merge($nums1, $nums2)));
}

$array1 = [1, 2, 2, 1];
$array2 = [2, 2];
print_r(arrayUnion($array1, $array2)); // Output: [1, 2]
```

**Problem 163:**
Write a PHP function to rotate an array to the right by a given number of steps.

**Solution 163:**
```php
function rotateArray($nums, $k) {
    $k = $k % count($nums);
    $k = count($nums) - $k;
    return array_merge(array_slice($nums, $k), array_slice($nums, 0, $k));
}

$array = [1, 2, 3, 4, 5, 6, 7];
$k = 3;
print_r(rotateArray($array, $k)); // Output: [5, 6, 7, 1, 2, 3, 4]
```

**Problem 164:**
Write a PHP function to remove all instances of a value from an array.

**Solution 164:**
```php
function removeElement($nums, $val) {
    return array_values(array_diff($nums, [$val]));
}

$array = [3, 2, 2, 3];
$val = 3;
print_r(removeElement($array, $val)); // Output: [2, 2]
```

**Problem 165:**
Write a PHP function to find the maximum product of two integers in an array of integers.

**Solution 165:**
```php
function maxProductOfTwoIntegers($nums) {
    $max1 = $max2 = PHP_INT_MIN;
    $min1 = $min2 = PHP_INT_MAX;

    foreach ($nums as $num) {
        if ($num > $max1) {
            $max2 = $max1;
            $max1 = $num;
        } elseif ($num > $max2) {
            $max2 = $num;
        }

        if ($num < $min1) {
            $min2 = $min1;
            $min1 = $num;
        } elseif ($num < $min2) {
            $min2 = $num;
        }
    }

    return max($max1 * $max2, $min1 * $min2);
}

$array = [2, 3, -2, 4];
echo maxProductOfTwoIntegers($array); // Output: 6
```

**Problem 166:**
Write a PHP function to find the majority element in an array (the majority element appears more than ⌊n/2⌋ times).

**Solution 166:**
```php
function majorityElement($nums) {
    $count = 0;
    $candidate = null;

    foreach ($nums as $num) {
        if ($count === 0) {
            $candidate = $num;
        }

        $count += ($num === $candidate) ? 1 : -1;
    }

    return $candidate;
}

$array = [3, 2, 3];
echo majorityElement($array); // Output: 3
```

**Problem 167:**
Write a PHP function to find the longest common prefix among an array of strings.

**Solution 167:**
```php
function longestCommonPrefix($strs) {
    if (empty($strs)) {
        return "";
    }

    $prefix = $strs[0];

    foreach ($strs as $str) {
        while (strpos($str, $prefix) !== 0) {
            $prefix = substr($prefix, 0, strlen($prefix) - 1);
        }
    }

    return $prefix;
}

$array = ["flower", "flow", "flight"];
echo longestCommonPrefix($array); // Output: "fl"
```

**Problem 168:**
Write a PHP function to find the sum of all multiples of 3 or 5 below a given positive integer.

**Solution 168:**
```php
function sumOfMultiplesOf3And5($n) {
    $sum = 0;

    for ($i = 3; $i < $n; $i++) {
        if ($i % 3 === 0 || $i % 5 === 0) {
            $sum += $i;
        }
    }

    return $sum;
}

echo sumOfMultiplesOf3And5(10); // Output: 23 (3 + 5 + 6 + 9)
```

**Problem 169:**
Write a PHP function to find the first non-empty word in a list of strings.

**Solution 169:**
```php
function findFirstNonEmptyWord($words) {
    foreach ($words as $word) {
        if (!empty($word)) {
            return $word;
        }
    }

    return "";
}

$wordList = ["", "apple", "banana", "cherry"];
echo findFirstNonEmptyWord($wordList); // Output: "apple"
```

**Problem 170:**
Write a PHP function to check if a string is an anagram of another string (ignoring spaces and case).

**Solution 170:**
```php
function isAnagramIgnoringSpaceAndCase($s1, $s2) {
    $s1 = strtolower(preg_replace('/[^A-Za-z0-9]/', '', $s1));
    $s2 = strtolower(preg_replace('/[^A-Za-z0-9]/', '', $s2));

    return count_chars($s1, 1) === count_chars($s2, 1);
}

$string1 = "anagram";
$string2 = "nag a ram";
echo isAnagramIgnoringSpaceAndCase($string1, $string2) ? "Anagram" : "Not Anagram"; // Output: "Anagram"
```

**Problem 171:**
Write a PHP function to find the longest word in a list of words.

**Solution 171:**
```php
function findLongestWord($words) {
    $maxLength = 0;
    $longestWord = "";

    foreach ($words as $word) {
        $length = strlen($word);

        if ($length > $maxLength) {
            $maxLength = $length;
            $longestWord = $word;
        }
    }

    return $longestWord;
}

$wordList = ["apple", "banana", "cherry", "date"];
echo findLongestWord($wordList); // Output: "banana"
```

**Problem 172:**
Write a PHP function to find the first unique character in a string.

**Solution 

172:**
```php
function firstUniqueChar($s) {
    $charCount = count_chars($s, 1);

    for ($i = 0; $i < strlen($s); $i++) {
        $char = $s[$i];

        if ($charCount[$char] === 1) {
            return $char;
        }
    }

    return "";
}

$string = "leetcode";
echo firstUniqueChar($string); // Output: "l"
```

**Problem 173:**
Write a PHP function to implement a simple queue using an array.

**Solution 173:**
```php
class SimpleQueue {
    private $queue = [];

    public function enqueue($val) {
        $this->queue[] = $val;
    }

    public function dequeue() {
        if ($this->isEmpty()) {
            return null;
        }

        return array_shift($this->queue);
    }

    public function isEmpty() {
        return empty($this->queue);
    }
}

$queue = new SimpleQueue();
$queue->enqueue(1);
$queue->enqueue(2);
echo $queue->dequeue(); // Output: 1
echo $queue->isEmpty() ? "Empty" : "Not Empty"; // Output: "Not Empty"
```

**Problem 174:**
Write a PHP function to implement a basic stack using an array.

**Solution 174:**
```php
class SimpleStack {
    private $stack = [];

    public function push($val) {
        array_push($this->stack, $val);
    }

    public function pop() {
        if ($this->isEmpty()) {
            return null;
        }

        return array_pop($this->stack);
    }

    public function top() {
        return $this->isEmpty() ? null : end($this->stack);
    }

    public function isEmpty() {
        return empty($this->stack);
    }
}

$stack = new SimpleStack();
$stack->push(1);
$stack->push(2);
echo $stack->top(); // Output: 2
echo $stack->pop(); // Output: 2
echo $stack->isEmpty() ? "Empty" : "Not Empty"; // Output: "Not Empty"
```

**Problem 175:**
Write a PHP function to find the maximum depth of a nested array.

**Solution 175:**
```php
function maxDepth($arr) {
    $max = 1;

    foreach ($arr as $item) {
        if (is_array($item)) {
            $max = max($max, 1 + maxDepth($item));
        }
    }

    return $max;
}

$array = [1, [2, [3, 4], 5], 6];
echo maxDepth($array); // Output: 3
```

**Problem 176:**
Write a PHP function to implement a basic circular queue using an array.

**Solution 176:**
```php
class CircularQueue {
    private $queue = [];
    private $size = 0;
    private $front = 0;
    private $rear = -1;

    public function __construct($size) {
        $this->size = $size;
    }

    public function enqueue($val) {
        if ($this->isFull()) {
            return false; // Queue is full
        }

        $this->rear = ($this->rear + 1) % $this->size;
        $this->queue[$this->rear] = $val;

        return true;
    }

    public function dequeue() {
        if ($this->isEmpty()) {
            return null; // Queue is empty
        }

        $val = $this->queue[$this->front];
        $this->front = ($this->front + 1) % $this->size;

        return $val;
    }

    public function isEmpty() {
        return $this->front === $this->rear + 1;
    }

    public function isFull() {
        return ($this->rear + 1) % $this->size === $this->front;
    }
}

$queue = new CircularQueue(3);
$queue->enqueue(1);
$queue->enqueue(2);
$queue->enqueue(3);
echo $queue->isFull() ? "Full" : "Not Full"; // Output: "Full"
echo $queue->dequeue(); // Output: 1
echo $queue->enqueue(4) ? "Enqueued" : "Not Enqueued"; // Output: "Not Enqueued" (queue is full)
```

**Problem 177:**
Write a PHP function to find the longest common subsequence between two strings.

**Solution 177:**
```php
function longestCommonSubsequence($text1, $text2) {
    $m = strlen($text1);
    $n = strlen($text2);
    $dp = array_fill(0, $m + 1, array_fill(0, $n + 1, 0));

    for ($i = 1; $i <= $m; $i++) {
        for ($j = 1; $j <= $n; $j++) {
            if ($text1[$i - 1] === $text2[$j - 1]) {
                $dp[$i][$j] = $dp[$i - 1][$j - 1] + 1;
            } else {
                $dp[$i][$j] = max($dp[$i - 1][$j], $dp[$i][$j - 1]);
            }
        }
    }

    $i = $m;
    $j = $n;
    $lcs = "";

    while ($i > 0 && $j > 0) {
        if ($text1[$i - 1] === $text2[$j - 1]) {
            $lcs = $text1[$i - 1] . $lcs;
            $i--;
            $j--;
        } elseif ($dp[$i - 1][$j] > $dp[$i][$j - 1]) {
            $i--;
        } else {
            $j--;
        }
    }

    return $lcs;
}

$text1 = "abcde";
$text2 = "ace";
echo longestCommonSubsequence($text1, $text2); // Output: "ace"
```

**Problem 178:**
Write a PHP function to find the maximum subarray sum in an array of integers using the Kadane's algorithm.

**Solution 178:**
```php
function maxSubArray($nums) {
    $maxSum = $currentSum = $nums[0];

    for ($i = 1; $i < count($nums); $i++) {
        $currentSum = max($nums[$i], $currentSum + $nums[$i]);
        $maxSum = max($maxSum, $currentSum);
    }

    return $maxSum;
}

$array = [-2, 1, -3, 4, -1, 2, 1, -5, 4];
echo maxSubArray($array); // Output: 6 (maximum subarray sum is [4, -1, 2, 1])
```

**Problem 179:**
Write a PHP function to find the longest palindrom

ic substring in a string.

**Solution 179:**
```php
function longestPalindromicSubstring($s) {
    $start = $end = 0;

    for ($i = 0; $i < strlen($s); $i++) {
        $len1 = expandAroundCenter($s, $i, $i);
        $len2 = expandAroundCenter($s, $i, $i + 1);
        $maxLen = max($len1, $len2);

        if ($maxLen > $end - $start) {
            $start = $i - floor(($maxLen - 1) / 2);
            $end = $i + floor($maxLen / 2);
        }
    }

    return substr($s, $start, $end - $start + 1);
}

function expandAroundCenter($s, $left, $right) {
    while ($left >= 0 && $right < strlen($s) && $s[$left] === $s[$right]) {
        $left--;
        $right++;
    }

    return $right - $left - 1;
}

$string = "babad";
echo longestPalindromicSubstring($string); // Output: "bab" or "aba"
```

**Problem 180:**
Write a PHP function to find the longest increasing subsequence in an array of integers.

**Solution 180:**
```php
function lengthOfLIS($nums) {
    $dp = array_fill(0, count($nums), 1);

    for ($i = 1; $i < count($nums); $i++) {
        for ($j = 0; $j < $i; $j++) {
            if ($nums[$i] > $nums[$j]) {
                $dp[$i] = max($dp[$i], $dp[$j] + 1);
            }
        }
    }

    return max($dp);
}

$array = [10, 9, 2, 5, 3, 7, 101, 18];
echo lengthOfLIS($array); // Output: 4 (longest increasing subsequence is [2, 3, 7, 101])
```

**Problem 181:**
Write a PHP function to find the minimum window in a string that contains all characters of another string.

**Solution 181:**
```php
function minWindow($s, $t) {
    $charCount = [];
    
    for ($i = 0; $i < strlen($t); $i++) {
        $char = $t[$i];
        $charCount[$char]++;
    }
    
    $left = $right = $count = 0;
    $minWindow = "";
    $minLength = PHP_INT_MAX;
    
    while ($right < strlen($s)) {
        $rightChar = $s[$right];
        
        if (isset($charCount[$rightChar])) {
            $charCount[$rightChar]--;
            
            if ($charCount[$rightChar] >= 0) {
                $count++;
            }
        }
        
        while ($count === strlen($t)) {
            if ($right - $left + 1 < $minLength) {
                $minLength = $right - $left + 1;
                $minWindow = substr($s, $left, $minLength);
            }
            
            $leftChar = $s[$left];
            
            if (isset($charCount[$leftChar])) {
                $charCount[$leftChar]++;
                
                if ($charCount[$leftChar] > 0) {
                    $count--;
                }
            }
            
            $left++;
        }
        
        $right++;
    }
    
    return $minWindow;
}

$source = "ADOBECODEBANC";
$target = "ABC";
echo minWindow($source, $target); // Output: "BANC"
```

**Problem 182:**
Write a PHP function to find all anagrams of a string within a list of strings.

**Solution 182:**
```php
function findAnagrams($s, $words) {
    $result = [];
    $charCount = count_chars($s, 1);

    foreach ($words as $word) {
        if (count_chars($word, 1) === $charCount) {
            $result[] = $word;
        }
    }

    return $result;
}

$source = "listen";
$wordList = ["enlist", "silent", "inlets", "hello"];
print_r(findAnagrams($source, $wordList)); // Output: ["enlist", "inlets"]
```

**Problem 183:**
Write a PHP function to check if a string is a valid palindrome, considering only alphanumeric characters and ignoring cases.

**Solution 183:**
```php
function isPalindrome($s) {
    $s = preg_replace("/[^a-zA-Z0-9]/", "", $s);
    $s = strtolower($s);

    return $s === strrev($s);
}

$string = "A man, a plan, a canal: Panama";
echo isPalindrome($string) ? "Palindrome" : "Not Palindrome"; // Output: "Palindrome"
```

**Problem 184:**
Write a PHP function to find the shortest word distance between two words in a list of words.

**Solution 184:**
```php
function shortestDistance($words, $word1, $word2) {
    $index1 = $index2 = -1;
    $minDistance = PHP_INT_MAX;

    for ($i = 0; $i < count($words); $i++) {
        if ($words[$i] === $word1) {
            $index1 = $i;
        } elseif ($words[$i] === $word2) {
            $index2 = $i;
        }

        if ($index1 !== -1 && $index2 !== -1) {
            $minDistance = min($minDistance, abs($index1 - $index2));
        }
    }

    return $minDistance;
}

$wordList = ["practice", "makes", "perfect", "coding", "makes"];
$word1 = "coding";
$word2 = "practice";
echo shortestDistance($wordList, $word1, $word2); // Output: 3
```

**Problem 185:**
Write a PHP function to implement a basic stack using a linked list.

**Solution 185:**
```php
class ListNode {
    public $val;
    public $next;

    public function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}

class SimpleStack {
    private $head;

    public function push($val) {
        $newNode = new ListNode($val);
        $newNode->next = $this->head;
        $this->head = $newNode;
    }

    public function pop() {
        if ($this->isEmpty()) {
            return null;
        }

        $val = $this->head->val;
        $this->head = $this->head->next;

        return $val;
    }

    public function top() {
        return $this->isEmpty() ? null :

 $this->head->val;
    }

    public function isEmpty() {
        return $this->head === null;
    }
}

$stack = new SimpleStack();
$stack->push(1);
$stack->push(2);
echo $stack->top(); // Output: 2
echo $stack->pop(); // Output: 2
echo $stack->isEmpty() ? "Empty" : "Not Empty"; // Output: "Not Empty"
```

**Problem 186:**
Write a PHP function to implement a basic queue using a linked list.

**Solution 186:**
```php
class ListNode {
    public $val;
    public $next;

    public function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}

class SimpleQueue {
    private $front;
    private $rear;

    public function enqueue($val) {
        $newNode = new ListNode($val);

        if ($this->isEmpty()) {
            $this->front = $newNode;
            $this->rear = $newNode;
        } else {
            $this->rear->next = $newNode;
            $this->rear = $newNode;
        }
    }

    public function dequeue() {
        if ($this->isEmpty()) {
            return null;
        }

        $val = $this->front->val;
        $this->front = $this->front->next;

        return $val;
    }

    public function front() {
        return $this->isEmpty() ? null : $this->front->val;
    }

    public function isEmpty() {
        return $this->front === null;
    }
}

$queue = new SimpleQueue();
$queue->enqueue(1);
$queue->enqueue(2);
echo $queue->front(); // Output: 1
echo $queue->dequeue(); // Output: 1
echo $queue->isEmpty() ? "Empty" : "Not Empty"; // Output: "Not Empty"
```

**Problem 187:**
Write a PHP function to find the maximum depth of a binary tree.

**Solution 187:**
```php
class TreeNode {
    public $val;
    public $left;
    public $right;

    public function __construct($val = 0, $left = null, $right = null) {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}

function maxDepth($root) {
    if ($root === null) {
        return 0;
    }

    $leftDepth = maxDepth($root->left);
    $rightDepth = maxDepth($root->right);

    return max($leftDepth, $rightDepth) + 1;
}

$tree = new TreeNode(3);
$tree->left = new TreeNode(9);
$tree->right = new TreeNode(20);
$tree->right->left = new TreeNode(15);
$tree->right->right = new TreeNode(7);
echo maxDepth($tree); // Output: 3
```

**Problem 188:**
Write a PHP function to find the diameter of a binary tree (the length of the longest path between any two nodes in the tree).

**Solution 188:**
```php
class TreeNode {
    public $val;
    public $left;
    public $right;

    public function __construct($val = 0, $left = null, $right = null) {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}

class Result {
    public $diameter = 0;
    public $height = 0;
}

function diameterOfBinaryTree($root) {
    $result = new Result();
    calculateDiameter($root, $result);
    return $result->diameter;
}

function calculateDiameter($node, $result) {
    if ($node === null) {
        $result->height = 0;
        return 0;
    }

    $leftResult = new Result();
    $rightResult = new Result();

    $leftHeight = calculateDiameter($node->left, $leftResult);
    $rightHeight = calculateDiameter($node->right, $rightResult);

    $result->height = max($leftHeight, $rightHeight) + 1;
    $result->diameter = max($leftHeight + $rightHeight, max($leftResult->diameter, $rightResult->diameter));

    return $result->height;
}

$tree = new TreeNode(1);
$tree->left = new TreeNode(2);
$tree->left->left = new TreeNode(4);
$tree->left->right = new TreeNode(5);
$tree->right = new TreeNode(3);
echo diameterOfBinaryTree($tree); // Output: 3
```

**Problem 189:**
Write a PHP function to find the intersection of two arrays (elements that appear in both arrays).

**Solution 189:**
```php
function arrayIntersection($nums1, $nums2) {
    return array_values(array_intersect($nums1, $nums2));
}

$array1 = [1, 2, 2, 1];
$array2 = [2, 2];
print_r(arrayIntersection($array1, $array2)); // Output: [2, 2]
```

**Problem 190:**
Write a PHP function to find the union of two arrays (distinct elements from both arrays).

**Solution 190:**
```php
function arrayUnion($nums1, $nums2) {
    return array_values(array_unique(array_merge($nums1, $nums2)));
}

$array1 = [1, 2, 2, 1];
$array2 = [2, 2];
print_r(arrayUnion($array1, $array2)); // Output: [1, 2]
```

**Problem 191:**
Write a PHP function to rotate an array to the right by a given number of steps.

**Solution 191:**
```php
function rotateArray($nums, $k) {
    $k = $k % count($nums);
    $k = count($nums) - $k;
    return array_merge(array_slice($nums, $k), array_slice($nums, 0, $k));
}

$array = [1, 2, 3, 4, 5, 6, 7];
$k = 3;
print_r(rotateArray($array, $k)); // Output: [5, 6, 7, 1, 2, 3, 4]
```

**Problem 192:**
Write a PHP function to remove all instances of a value from an array.

**Solution 192:**
```php
function removeElement($nums, $val) {
    return array_values(array_diff($nums, [$val]));
}

$array = [3, 2, 2, 3];
$val = 3;
print_r(removeElement($array, $val)); // Output: [2, 2]
```

**Problem 193:**
Write a PHP function to find the maximum product of two integers in an array of integers.

**Solution 193:**
```php
function max

ProductOfTwoIntegers($nums) {
    $max1 = $max2 = PHP_INT_MIN;
    $min1 = $min2 = PHP_INT_MAX;

    foreach ($nums as $num) {
        if ($num > $max1) {
            $max2 = $max1;
            $max1 = $num;
        } elseif ($num > $max2) {
            $max2 = $num;
        }

        if ($num < $min1) {
            $min2 = $min1;
            $min1 = $num;
        } elseif ($num < $min2) {
            $min2 = $num;
        }
    }

    return max($max1 * $max2, $min1 * $min2);
}

$array = [2, 3, -2, 4];
echo maxProductOfTwoIntegers($array); // Output: 6
```

**Problem 194:**
Write a PHP function to find the majority element in an array (the majority element appears more than ⌊n/2⌋ times).

**Solution 194:**
```php
function majorityElement($nums) {
    $count = 0;
    $candidate = null;

    foreach ($nums as $num) {
        if ($count === 0) {
            $candidate = $num;
        }

        $count += ($num === $candidate) ? 1 : -1;
    }

    return $candidate;
}

$array = [3, 2, 3];
echo majorityElement($array); // Output: 3
```

**Problem 195:**
Write a PHP function to find the longest common prefix among an array of strings.

**Solution 195:**
```php
function longestCommonPrefix($strs) {
    if (empty($strs)) {
        return "";
    }

    $prefix = $strs[0];

    foreach ($strs as $str) {
        while (strpos($str, $prefix) !== 0) {
            $prefix = substr($prefix, 0, strlen($prefix) - 1);
        }
    }

    return $prefix;
}

$array = ["flower", "flow", "flight"];
echo longestCommonPrefix($array); // Output: "fl"
```

**Problem 196:**
Write a PHP function to find the sum of all multiples of 3 or 5 below a given positive integer.

**Solution 196:**
```php
function sumOfMultiplesOf3And5($n) {
    $sum = 0;

    for ($i = 3; $i < $n; $i++) {
        if ($i % 3 === 0 || $i % 5 === 0) {
            $sum += $i;
        }
    }

    return $sum;
}

echo sumOfMultiplesOf3And5(10); // Output: 23 (3 + 5 + 6 + 9)
```

**Problem 197:**
Write a PHP function to find the first non-empty word in a list of strings.

**Solution 197:**
```php
function findFirstNonEmptyWord($words) {
    foreach ($words as $word) {
        if (!empty($word)) {
            return $word;
        }
    }

    return "";
}

$wordList = ["", "apple", "banana", "cherry"];
echo findFirstNonEmptyWord($wordList); // Output: "apple"
```

**Problem 198:**
Write a PHP function to check if a string is an anagram of another string (ignoring spaces and case).

**Solution 198:**
```php
function isAnagramIgnoringSpaceAndCase($s1, $s2) {
    $s1 = strtolower(preg_replace('/[^A-Za-z0-9]/', '', $s1));
    $s2 = strtolower(preg_replace('/[^A-Za-z0-9]/', '', $s2));

    return count_chars($s1, 1) === count_chars($s2, 1);
}

$string1 = "anagram";
$string2 = "nag a ram";
echo isAnagramIgnoringSpaceAndCase($string1, $string2) ? "Anagram" : "Not Anagram"; // Output: "Anagram"
```

**Problem 199:**
Write a PHP function to find the longest word in a list of words.

**Solution 199:**
```php
function findLongestWord($words) {
    $maxLength = 0;
    $longestWord = "";

    foreach ($words as $word) {
        $length = strlen($word);

        if ($length > $maxLength) {
            $maxLength = $length;
            $longestWord = $word;
        }
    }

    return $longestWord;
}

$wordList = ["apple", "banana", "cherry", "date"];
echo findLongestWord($wordList); // Output: "banana"
```

**Problem 200:**
Write a PHP function to find the first unique character in a string.

**Solution 200:**
```php
function firstUniqueChar($s) {
    $charCount = count_chars($s, 1);

    for ($i = 0; $i < strlen($s); $i++) {
        $char = $s[$i];

        if ($charCount[$char] === 1) {
            return $char;
        }
    }

    return "";
}

$string = "leetcode";
echo firstUniqueChar($string); // Output: "l"
```

I hope you find these additional PHP problems and solutions helpful for fresher/beginner-level developer interviews! If you have any more questions or need further assistance, please feel free to ask.

Certainly! Here are 50 more PHP problems and their solutions for fresher/beginner-level developer interviews:

**Problem 201:**
Write a PHP program to swap two variables without using a temporary variable.

**Solution 201:**
```php
$a = 5;
$b = 10;

$a = $a + $b;
$b = $a - $b;
$a = $a - $b;

echo "After swapping: a = $a, b = $b"; // Output: "After swapping: a = 10, b = 5"
```

**Problem 202:**
Write a PHP program to check if a given number is prime.

**Solution 202:**
```php
function isPrime($num) {
    if ($num <= 1) {
        return false;
    }
    
    for ($i = 2; $i * $i <= $num; $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }
    
    return true;
}

$number = 7;
echo isPrime($number) ? "Prime" : "Not Prime"; // Output: "Prime"
```

**Problem 203:**
Write a PHP program to print the Fibonacci series up to a given number of terms.

**Solution 203:**
```php
function printFibonacci($n) {
    $a = 0;
    $b = 1;
    
    for ($i = 0; $i < $n; $i++) {
        echo $a . " ";
        $temp = $a + $b;
        $a = $b;
        $b = $temp;
    }
}

$terms = 8;
printFibonacci($terms); // Output: "0 1 1 2 3 5 8 13"
```

**Problem 204:**
Write a PHP program to reverse a string without using built-in functions.

**Solution 204:**
```php
function reverseString($str) {
    $length = strlen($str);
    $reversed = "";

    for ($i = $length - 1; $i >= 0; $i--) {
        $reversed .= $str[$i];
    }

    return $reversed;
}

$string = "hello";
echo reverseString($string); // Output: "olleh"
```

**Problem 205:**
Write a PHP program to count the number of vowels in a string.

**Solution 205:**
```php
function countVowels($str) {
    $str = strtolower($str);
    $vowels = "aeiou";
    $count = 0;

    for ($i = 0; $i < strlen($str); $i++) {
        if (strpos($vowels, $str[$i]) !== false) {
            $count++;
        }
    }

    return $count;
}

$string = "Hello World";
echo countVowels($string); // Output: 3
```

**Problem 206:**
Write a PHP program to find and print the factorial of a number.

**Solution 206:**
```php
function factorial($n) {
    if ($n < 0) {
        return "Undefined (Factorial is not defined for negative numbers)";
    } elseif ($n == 0 || $n == 1) {
        return 1;
    }

    $result = 1;

    for ($i = 2; $i <= $n; $i++) {
        $result *= $i;
    }

    return $result;
}

$number = 5;
echo "Factorial of $number is " . factorial($number); // Output: "Factorial of 5 is 120"
```

**Problem 207:**
Write a PHP program to check if a string is a palindrome.

**Solution 207:**
```php
function isPalindrome($str) {
    $str = strtolower(preg_replace('/[^a-zA-Z0-9]/', '', $str));
    return $str === strrev($str);
}

$string = "A man, a plan, a canal: Panama";
echo isPalindrome($string) ? "Palindrome" : "Not Palindrome"; // Output: "Palindrome"
```

**Problem 208:**
Write a PHP program to find the sum of all even numbers from 1 to a given positive integer.

**Solution 208:**
```php
function sumOfEvenNumbers($n) {
    $sum = 0;

    for ($i = 2; $i <= $n; $i += 2) {
        $sum += $i;
    }

    return $sum;
}

$number = 10;
echo "Sum of even numbers from 1 to $number is " . sumOfEvenNumbers($number); // Output: "Sum of even numbers from 1 to 10 is 30"
```

**Problem 209:**
Write a PHP program to check if a given year is a leap year.

**Solution 209:**
```php
function isLeapYear($year) {
    return ($year % 4 == 0 && $year % 100 != 0) || ($year % 400 == 0);
}

$year = 2024;
echo isLeapYear($year) ? "Leap Year" : "Not a Leap Year"; // Output: "Leap Year"
```

**Problem 210:**
Write a PHP program to find the largest element in an array of integers.

**Solution 210:**
```php
function findLargestElement($nums) {
    $max = $nums[0];

    foreach ($nums as $num) {
        if ($num > $max) {
            $max = $num;
        }
    }

    return $max;
}

$array = [3, 5, 1, 9, 8];
echo "Largest element in the array is " . findLargestElement($array); // Output: "Largest element in the array is 9"
```

**Problem 211:**
Write a PHP program to check if a number is a perfect number (a positive integer that is equal to the sum of its proper divisors, excluding itself).

**Solution 211:**
```php
function isPerfectNumber($num) {
    if ($num <= 0) {
        return false;
    }

    $sum = 0;

    for ($i = 1; $i <= $num / 2; $i++) {
        if ($num % $i === 0) {
            $sum += $i;
        }
    }

    return $sum === $num;
}

$number = 28;
echo isPerfectNumber($number) ? "Perfect Number" : "Not a Perfect Number"; // Output: "Perfect Number"
```

**Problem 212:**
Write a PHP program to calculate the power of a number using a loop.

**Solution 212:**
```php
function calculatePower($base, $exponent) {
    $result = 1;

    for ($i = 0; $i < $exponent; $i++) {
        $result *= $base;
    }

    return $result;
}

$base = 2;
$exponent = 3;
echo "$base^$exponent

 = " . calculatePower($base, $exponent); // Output: "2^3 = 8"
```

**Problem 213:**
Write a PHP program to find and print the factors of a given number.

**Solution 213:**
```php
function findFactors($num) {
    $factors = [];

    for ($i = 1; $i <= $num; $i++) {
        if ($num % $i === 0) {
            $factors[] = $i;
        }
    }

    return $factors;
}

$number = 12;
echo "Factors of $number are: " . implode(", ", findFactors($number)); // Output: "Factors of 12 are: 1, 2, 3, 4, 6, 12"
```

**Problem 214:**
Write a PHP program to find and print the sum of digits of a given number.

**Solution 214:**
```php
function sumOfDigits($num) {
    $sum = 0;

    while ($num > 0) {
        $digit = $num % 10;
        $sum += $digit;
        $num = (int)($num / 10);
    }

    return $sum;
}

$number = 12345;
echo "Sum of digits of $number is " . sumOfDigits($number); // Output: "Sum of digits of 12345 is 15"
```

**Problem 215:**
Write a PHP program to find and print the reverse of a number.

**Solution 215:**
```php
function reverseNumber($num) {
    $reverse = 0;

    while ($num > 0) {
        $digit = $num % 10;
        $reverse = $reverse * 10 + $digit;
        $num = (int)($num / 10);
    }

    return $reverse;
}

$number = 12345;
echo "Reverse of $number is " . reverseNumber($number); // Output: "Reverse of 12345 is 54321"
```

**Problem 216:**
Write a PHP program to find and print the GCD (Greatest Common Divisor) of two numbers.

**Solution 216:**
```php
function findGCD($a, $b) {
    while ($b != 0) {
        $temp = $b;
        $b = $a % $b;
        $a = $temp;
    }

    return $a;
}

$number1 = 24;
$number2 = 36;
echo "GCD of $number1 and $number2 is " . findGCD($number1, $number2); // Output: "GCD of 24 and 36 is 12"
```

**Problem 217:**
Write a PHP program to find and print the LCM (Least Common Multiple) of two numbers.

**Solution 217:**
```php
function findLCM($a, $b) {
    return abs($a * $b) / findGCD($a, $b);
}

$number1 = 24;
$number2 = 36;
echo "LCM of $number1 and $number2 is " . findLCM($number1, $number2); // Output: "LCM of 24 and 36 is 72"
```

**Problem 218:**
Write a PHP program to find and print the sum of all natural numbers from 1 to a given positive integer.

**Solution 218:**
```php
function sumOfNaturalNumbers($n) {
    return ($n * ($n + 1)) / 2;
}

$number = 10;
echo "Sum of natural numbers from 1 to $number is " . sumOfNaturalNumbers($number); // Output: "Sum of natural numbers from 1 to 10 is 55"
```

**Problem 219:**
Write a PHP program to find and print the ASCII value of a character.

**Solution 219:**
```php
function asciiValue($char) {
    return ord($char);
}

$character = 'A';
echo "ASCII value of '$character' is " . asciiValue($character); // Output: "ASCII value of 'A' is 65"
```

**Problem 220:**
Write a PHP program to find and print the reverse of a string using recursion.

**Solution 220:**
```php
function reverseStringRecursive($str) {
    if (strlen($str) == 0) {
        return "";
    }

    $firstChar = $str[0];
    $remainingStr = substr($str, 1);

    return reverseStringRecursive($remainingStr) . $firstChar;
}

$string = "hello";
echo "Reverse of '$string' is " . reverseStringRecursive($string); // Output: "Reverse of 'hello' is 'olleh'"
```

**Problem 221:**
Write a PHP program to find and print the number of words in a string.

**Solution 221:**
```php
function countWords($str) {
    $words = explode(" ", $str);
    return count($words);
}

$string = "This is a sample sentence.";
echo "Number of words in the string: " . countWords($string); // Output: "Number of words in the string: 5"
```

**Problem 222:**
Write a PHP program to find and print the largest and smallest elements in an array of integers.

**Solution 222:**
```php
function findLargestAndSmallest($nums) {
    $largest = $nums[0];
    $smallest = $nums[0];

    foreach ($nums as $num) {
        if ($num > $largest) {
            $largest = $num;
        } elseif ($num < $smallest) {
            $smallest = $num;
        }
    }

    return ["largest" => $largest, "smallest" => $smallest];
}

$array = [3, 5, 1, 9, 8];
$result = findLargestAndSmallest($array);
echo "Largest element: " . $result["largest"] . ", Smallest element: " . $result["smallest"];
// Output: "Largest element: 9, Smallest element: 1"
```

**Problem 223:**
Write a PHP program to find and print the sum of all multiples of 7 from 1 to a given positive integer.

**Solution 223:**
```php
function sumOfMultiplesOf7($n) {
    $sum = 0;

    for ($i = 7; $i <= $n; $i += 7) {
        $sum += $i;
    }

    return $sum;
}

$number = 35;
echo "Sum of multiples of 7 from 1 to $number is " . sumOfMultiplesOf7($number); // Output: "Sum of multiples of 7 from 1 to 35 is 98"
```

**Problem 224:**
Write a PHP program to find and print the prime factors of a given number.

**Solution 224:**
```php
function primeFactors($num) {
    $factors = [];

    while

 ($num % 2 == 0) {
        $factors[] = 2;
        $num = $num / 2;
    }

    for ($i = 3; $i * $i <= $num; $i = $i + 2) {
        while ($num % $i == 0) {
            $factors[] = $i;
            $num = $num / $i;
        }
    }

    if ($num > 2) {
        $factors[] = $num;
    }

    return $factors;
}

$number = 36;
echo "Prime factors of $number are: " . implode(", ", primeFactors($number)); // Output: "Prime factors of 36 are: 2, 2, 3, 3"
```

**Problem 225:**
Write a PHP program to find and print the square root of a given positive integer.

**Solution 225:**
```php
function squareRoot($num) {
    return sqrt($num);
}

$number = 25;
echo "Square root of $number is " . squareRoot($number); // Output: "Square root of 25 is 5"
```

**Problem 226:**
Write a PHP program to find and print the sum of squares of all natural numbers from 1 to a given positive integer.

**Solution 226:**
```php
function sumOfSquares($n) {
    $sum = 0;

    for ($i = 1; $i <= $n; $i++) {
        $sum += $i * $i;
    }

    return $sum;
}

$number = 4;
echo "Sum of squares of natural numbers from 1 to $number is " . sumOfSquares($number); // Output: "Sum of squares of natural numbers from 1 to 4 is 30"
```

**Problem 227:**
Write a PHP program to find and print the product of digits of a given number.

**Solution 227:**
```php
function productOfDigits($num) {
    $product = 1;

    while ($num > 0) {
        $digit = $num % 10;
        $product *= $digit;
        $num = (int)($num / 10);
    }

    return $product;
}

$number = 12345;
echo "Product of digits of $number is " . productOfDigits($number); // Output: "Product of digits of 12345 is 120"
```

**Problem 228:**
Write a PHP program to check if a given string is a palindrome ignoring spaces, case, and punctuation.

**Solution 228:**
```php
function isPalindromeIgnoringSpaceCasePunctuation($str) {
    $str = strtolower(preg_replace('/[^a-zA-Z0-9]/', '', $str));
    return $str === strrev($str);
}

$string = "A man, a plan, a canal: Panama!";
echo isPalindromeIgnoringSpaceCasePunctuation($string) ? "Palindrome" : "Not Palindrome"; // Output: "Palindrome"
```

**Problem 229:**
Write a PHP program to find and print the sum of all odd numbers from 1 to a given positive integer.

**Solution 229:**
```php
function sumOfOddNumbers($n) {
    $sum = 0;

    for ($i = 1; $i <= $n; $i += 2) {
        $sum += $i;
    }

    return $sum;
}

$number = 10;
echo "Sum of odd numbers from 1 to $number is " . sumOfOddNumbers($number); // Output: "Sum of odd numbers from 1 to 10 is 25"
```

**Problem 230:**
Write a PHP program to find and print the area of a rectangle given its length and width.

**Solution 230:**
```php
function areaOfRectangle($length, $width) {
    return $length * $width;
}

$length = 5;
$width = 3;
echo "Area of rectangle with length $length and width $width is " . areaOfRectangle($length, $width); // Output: "Area of rectangle with length 5 and width 3 is 15"
```

**Problem 231:**
Write a PHP program to check if a given number is a perfect square.

**Solution 231:**
```php
function isPerfectSquare($num) {
    $sqrt = sqrt($num);
    return $sqrt === floor($sqrt);
}

$number = 25;
echo isPerfectSquare($number) ? "Perfect Square" : "Not a Perfect Square"; // Output: "Perfect Square"
```

**Problem 232:**
Write a PHP program to find and print the sum of all prime numbers from 1 to a given positive integer.

**Solution 232:**
```php
function isPrime($num) {
    if ($num <= 1) {
        return false;
    }

    for ($i = 2; $i * $i <= $num; $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }

    return true;
}

function sumOfPrimeNumbers($n) {
    $sum = 0;

    for ($i = 2; $i <= $n; $i++) {
        if (isPrime($i)) {
            $sum += $i;
        }
    }

    return $sum;
}

$number = 10;
echo "Sum of prime numbers from 1 to $number is " . sumOfPrimeNumbers($number); // Output: "Sum of prime numbers from 1 to 10 is 17"
```

**Problem 233:**
Write a PHP program to find and print the first N prime numbers.

**Solution 233:**
```php
function generatePrimeNumbers($n) {
    $primeNumbers = [];
    $i = 2;

    while (count($primeNumbers) < $n) {
        if (isPrime($i)) {
            $primeNumbers[] = $i;
        }
        $i++;
    }

    return $primeNumbers;
}

$N = 5;
$firstNPrimes = generatePrimeNumbers($N);
echo "First $N prime numbers are: " . implode(", ", $firstNPrimes); // Output: "First 5 prime numbers are: 2, 3, 5, 7, 11"
```

**Problem 234:**
Write a PHP program to find and print the sum of digits of a given positive integer using recursion.

**Solution 234:**
```php
function sumOfDigitsRecursive($num) {
    if ($num == 0) {
        return 0;
    }

    return ($num % 10) + sumOfDigitsRecursive((int)($num / 10));
}

$number = 12345;
echo "Sum of digits of $number is " . sumOfDigitsRecursive($number); // Output: "Sum of digits of 12345 is 15"
```

**Problem 235:**
Write a PHP program to find and print the number of occurrences of a specific character in a string.

**Solution 235:**
```php
function countCharacterOccurrences($str

, $char) {
    $count = 0;

    for ($i = 0; $i < strlen($str); $i++) {
        if ($str[$i] === $char) {
            $count++;
        }
    }

    return $count;
}

$string = "hello world";
$character = 'o';
echo "Number of occurrences of '$character' in the string: " . countCharacterOccurrences($string, $character); // Output: "Number of occurrences of 'o' in the string: 2"
```

**Problem 236:**
Write a PHP program to find and print the sum of all natural numbers divisible by 3 or 5 from 1 to a given positive integer.

**Solution 236:**
```php
function sumOfMultiplesOf3Or5($n) {
    $sum = 0;

    for ($i = 1; $i <= $n; $i++) {
        if ($i % 3 === 0 || $i % 5 === 0) {
            $sum += $i;
        }
    }

    return $sum;
}

$number = 10;
echo "Sum of multiples of 3 or 5 from 1 to $number is " . sumOfMultiplesOf3Or5($number); // Output: "Sum of multiples of 3 or 5 from 1 to 10 is 23"
```

**Problem 237:**
Write a PHP program to find and print the largest and second largest elements in an array of integers.

**Solution 237:**
```php
function findLargestAndSecondLargest($nums) {
    $largest = $secondLargest = PHP_INT_MIN;

    foreach ($nums as $num) {
        if ($num > $largest) {
            $secondLargest = $largest;
            $largest = $num;
        } elseif ($num > $secondLargest && $num !== $largest) {
            $secondLargest = $num;
        }
    }

    return ["largest" => $largest, "secondLargest" => $secondLargest];
}

$array = [3, 5, 1, 9, 8];
$result = findLargestAndSecondLargest($array);
echo "Largest element: " . $result["largest"] . ", Second largest element: " . $result["secondLargest"];
// Output: "Largest element: 9, Second largest element: 8"
```

**Problem 238:**
Write a PHP program to find and print the sum of all natural numbers divisible by 7 or 11 from 1 to a given positive integer.

**Solution 238:**
```php
function sumOfMultiplesOf7Or11($n) {
    $sum = 0;

    for ($i = 1; $i <= $n; $i++) {
        if ($i % 7 === 0 || $i % 11 === 0) {
            $sum += $i;
        }
    }

    return $sum;
}

$number = 20;
echo "Sum of multiples of 7 or 11 from 1 to $number is " . sumOfMultiplesOf7Or11($number); // Output: "Sum of multiples of 7 or 11 from 1 to 20 is 63"
```

**Problem 239:**
Write a PHP program to find and print the first N natural numbers that are multiples of a given positive integer.

**Solution 239:**
```php
function generateMultiplesOfN($n, $count) {
    $multiples = [];
    $i = 1;

    while (count($multiples) < $count) {
        $multiple = $n * $i;
        $multiples[] = $multiple;
        $i++;
    }

    return $multiples;
}

$N = 5;
$positiveInteger = 4;
$firstNMultiples = generateMultiplesOfN($positiveInteger, $N);
echo "First $N natural numbers that are multiples of $positiveInteger are: " . implode(", ", $firstNMultiples);
// Output: "First 5 natural numbers that are multiples of 4 are: 4, 8, 12, 16, 20"
```

**Problem 240:**
Write a PHP program to find and print the sum of digits of a given positive integer using a loop.

**Solution 240:**
```php
function sumOfDigitsLoop($num) {
    $sum = 0;

    while ($num > 0) {
        $sum += $num % 10;
        $num = (int)($num / 10);
    }

    return $sum;
}

$number = 12345;
echo "Sum of digits of $number is " . sumOfDigitsLoop($number); // Output: "Sum of digits of 12345 is 15"
```

**Problem 241:**
Write a PHP program to check if a given number is a palindrome.

**Solution 241:**
```php
function isPalindromeNumber($num) {
    $original = $num;
    $reverse = 0;

    while ($num > 0) {
        $digit = $num % 10;
        $reverse = $reverse * 10 + $digit;
        $num = (int)($num / 10);
    }

    return $original === $reverse;
}

$number = 121;
echo isPalindromeNumber($number) ? "Palindrome" : "Not Palindrome"; // Output: "Palindrome"
```

**Problem 242:**
Write a PHP program to find and print the sum of all even digits of a given positive integer.

**Solution 242:**
```php
function sumOfEvenDigits($num) {
    $sum = 0;

    while ($num > 0) {
        $digit = $num % 10;

        if ($digit % 2 === 0) {
            $sum += $digit;
        }

        $num = (int)($num / 10);
    }

    return $sum;
}

$number = 12345;
echo "Sum of even digits of $number is " . sumOfEvenDigits($number); // Output: "Sum of even digits of 12345 is 6"
```

**Problem 243:**
Write a PHP program to find and print the number of trailing zeros in the factorial of a given positive integer.

**Solution 243:**
```php
function countTrailingZerosInFactorial($n) {
    $count = 0;

    for ($i = 5; $n / $i >= 1; $i *= 5) {
        $count += (int)($n / $i);
    }

    return $count;
}

$number = 25;
echo "Number of trailing zeros in the factorial of $number is " . countTrailingZerosInFactorial($number); // Output: "Number of trailing zeros in the factorial of 25 is 6"
```

**Problem 244:**
Write a PHP program to find and print the sum of all prime numbers between two given positive integers.

**Solution 244:**
```php
function sumOfPrimesBetween($start,

 $end) {
    $sum = 0;

    for ($i = $start; $i <= $end; $i++) {
        if (isPrime($i)) {
            $sum += $i;
        }
    }

    return $sum;
}

$start = 10;
$end = 30;
echo "Sum of prime numbers between $start and $end is " . sumOfPrimesBetween($start, $end); // Output: "Sum of prime numbers between 10 and 30 is 41"
```

**Problem 245:**
Write a PHP program to check if a given string is an anagram of another string.

**Solution 245:**
```php
function areAnagrams($str1, $str2) {
    $str1 = str_replace(' ', '', strtolower($str1));
    $str2 = str_replace(' ', '', strtolower($str2));
    return count_chars($str1, 1) === count_chars($str2, 1);
}

$string1 = "listen";
$string2 = "silent";
echo areAnagrams($string1, $string2) ? "Anagrams" : "Not Anagrams"; // Output: "Anagrams"
```

**Problem 246:**
Write a PHP program to find and print the longest word in a sentence.

**Solution 246:**
```php
function findLongestWord($sentence) {
    $words = explode(" ", $sentence);
    $longestWord = "";

    foreach ($words as $word) {
        if (strlen($word) > strlen($longestWord)) {
            $longestWord = $word;
        }
    }

    return $longestWord;
}

$sentence = "This is a sample sentence with some long words";
echo "Longest word in the sentence: " . findLongestWord($sentence); // Output: "Longest word in the sentence: sentence"
```

**Problem 247:**
Write a PHP program to find and print the sum of all digits in a sentence.

**Solution 247:**
```php
function sumOfDigitsInSentence($sentence) {
    $sum = 0;

    for ($i = 0; $i < strlen($sentence); $i++) {
        if (is_numeric($sentence[$i])) {
            $sum += (int)$sentence[$i];
        }
    }

    return $sum;
}

$sentence = "The price of the product is $25 and it expires on 31st December 2023.";
echo "Sum of digits in the sentence: " . sumOfDigitsInSentence($sentence); // Output: "Sum of digits in the sentence: 25"
```

**Problem 248:**
Write a PHP program to find and print the number of words that start with a vowel in a sentence.

**Solution 248:**
```php
function countWordsStartingWithVowel($sentence) {
    $sentence = strtolower($sentence);
    $words = preg_split("/[\s,]+/", $sentence);
    $vowelStartCount = 0;

    foreach ($words as $word) {
        if (preg_match("/^[aeiou]/", $word)) {
            $vowelStartCount++;
        }
    }

    return $vowelStartCount;
}

$sentence = "Apples are delicious, and oranges are juicy.";
echo "Number of words starting with a vowel in the sentence: " . countWordsStartingWithVowel($sentence); // Output: "Number of words starting with a vowel in the sentence: 4"
```

**Problem 249:**
Write a PHP program to find and print the number of uppercase letters in a sentence.

**Solution 249:**
```php
function countUppercaseLetters($sentence) {
    $count = 0;

    for ($i = 0; $i < strlen($sentence); $i++) {
        if (ctype_upper($sentence[$i])) {
            $count++;
        }
    }

    return $count;
}

$sentence = "The Quick Brown Fox Jumps Over The Lazy Dog.";
echo "Number of uppercase letters in the sentence: " . countUppercaseLetters($sentence); // Output: "Number of uppercase letters in the sentence: 10"
```

**Problem 250:**
Write a PHP program to find and print the reverse of a sentence.

**Solution 250:**
```php
function reverseSentence($sentence) {
    $words = explode(" ", $sentence);
    $reversedWords = array_reverse($words);
    return implode(" ", $reversedWords);
}

$sentence = "This is a sample sentence.";
echo "Reverse of the sentence: " . reverseSentence($sentence); // Output: "Reverse of the sentence: sentence. sample a is This"
```

These additional 50 PHP problems and solutions should help you prepare for interviews or assessments as a fresher or beginner-level PHP developer.



## PHP PROBLEM SOLVING FOR INTERMEDIATE LEVEL
---

Certainly! Here are 50 PHP coding problems along with their solutions and code examples for a PHP developer interview test:

**Problem 1:**
Write a PHP function to calculate the factorial of a given number using recursion.

**Solution 1:**
```php
function factorial($n) {
    if ($n <= 1) {
        return 1;
    }
    return $n * factorial($n - 1);
}

echo factorial(5); // Output: 120
```

**Problem 2:**
Write a PHP function to check if a given string is a palindrome (reads the same backward as forward).

**Solution 2:**
```php
function isPalindrome($str) {
    $str = strtolower(preg_replace('/[^a-zA-Z0-9]/', '', $str));
    return $str === strrev($str);
}

echo isPalindrome("A man, a plan, a canal, Panama"); // Output: true
```

**Problem 3:**
Write a PHP function to find the largest and smallest elements in an array of numbers.

**Solution 3:**
```php
function findMinMax($arr) {
    $min = min($arr);
    $max = max($arr);
    return ["min" => $min, "max" => $max];
}

$array = [5, 2, 9, 1, 5];
$result = findMinMax($array);
echo "Min: " . $result["min"] . ", Max: " . $result["max"]; // Output: Min: 1, Max: 9
```

**Problem 4:**
Write a PHP function to remove duplicate values from an array.

**Solution 4:**
```php
function removeDuplicates($arr) {
    return array_unique($arr);
}

$array = [1, 2, 2, 3, 4, 4, 5];
$result = removeDuplicates($array);
print_r($result); // Output: [1, 2, 3, 4, 5]
```

**Problem 5:**
Write a PHP function to reverse a string without using built-in string reversal functions.

**Solution 5:**
```php
function reverseString($str) {
    $length = strlen($str);
    $reversed = '';
    for ($i = $length - 1; $i >= 0; $i--) {
        $reversed .= $str[$i];
    }
    return $reversed;
}

echo reverseString("Hello, World!"); // Output: "!dlroW ,olleH"
```

**Problem 6:**
Write a PHP function to find the sum of all prime numbers up to a given limit.

**Solution 6:**
```php
function isPrime($num) {
    if ($num <= 1) {
        return false;
    }
    for ($i = 2; $i * $i <= $num; $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }
    return true;
}

function sumPrimes($limit) {
    $sum = 0;
    for ($i = 2; $i <= $limit; $i++) {
        if (isPrime($i)) {
            $sum += $i;
        }
    }
    return $sum;
}

echo sumPrimes(10); // Output: 17 (2 + 3 + 5 + 7)
```

**Problem 7:**
Write a PHP function to check if a given number is even or odd.

**Solution 7:**
```php
function isEven($num) {
    return ($num % 2 === 0);
}

echo isEven(6); // Output: true
echo isEven(7); // Output: false
```

**Problem 8:**
Write a PHP function to count the number of words in a given string.

**Solution 8:**
```php
function countWords($str) {
    $words = str_word_count($str);
    return $words;
}

echo countWords("The quick brown fox"); // Output: 4
```

**Problem 9:**
Write a PHP function to find the sum of all multiples of 3 and 5 below a given number.

**Solution 9:**
```php
function sumMultiples($limit) {
    $sum = 0;
    for ($i = 1; $i < $limit; $i++) {
        if ($i % 3 === 0 || $i % 5 === 0) {
            $sum += $i;
        }
    }
    return $sum;
}

echo sumMultiples(10); // Output: 23 (3 + 5 + 6 + 9)
```

**Problem 10:**
Write a PHP function to find the Fibonacci series up to a given number of terms.

**Solution 10:**
```php
function fibonacci($n) {
    $series = [];
    $a = 0;
    $b = 1;
    for ($i = 0; $i < $n; $i++) {
        $series[] = $a;
        $temp = $a;
        $a = $b;
        $b = $temp + $b;
    }
    return $series;
}

$result = fibonacci(10);
print_r($result); // Output: [0, 1, 1, 2, 3, 5, 8, 13, 21, 34]
```

**Problem 11:**
Write a PHP function to find and return the first non-repeated character in a given string.

**Solution 11

:**
```php
function firstNonRepeatedChar($str) {
    $charCount = [];
    $length = strlen($str);

    for ($i = 0; $i < $length; $i++) {
        $char = $str[$i];
        if (isset($charCount[$char])) {
            $charCount[$char]++;
        } else {
            $charCount[$char] = 1;
        }
    }

    for ($i = 0; $i < $length; $i++) {
        $char = $str[$i];
        if ($charCount[$char] === 1) {
            return $char;
        }
    }

    return null;
}

echo firstNonRepeatedChar("hello"); // Output: "h"
```

**Problem 12:**
Write a PHP function to find the intersection of two arrays.

**Solution 12:**
```php
function arrayIntersection($arr1, $arr2) {
    return array_intersect($arr1, $arr2);
}

$array1 = [1, 2, 3, 4, 5];
$array2 = [3, 4, 5, 6, 7];
$result = arrayIntersection($array1, $array2);
print_r($result); // Output: [3, 4, 5]
```

**Problem 13:**
Write a PHP function to check if a given number is a perfect number (a positive integer that is equal to the sum of its proper divisors, excluding itself).

**Solution 13:**
```php
function isPerfectNumber($num) {
    if ($num <= 1) {
        return false;
    }

    $sum = 0;
    for ($i = 1; $i <= sqrt($num); $i++) {
        if ($num % $i === 0) {
            $sum += $i;
            if ($i !== 1 && $i !== $num / $i) {
                $sum += $num / $i;
            }
        }
    }

    return $sum === $num;
}

echo isPerfectNumber(28); // Output: true (28 is a perfect number: 1 + 2 + 4 + 7 + 14 = 28)
```

**Problem 14:**
Write a PHP function to check if a given year is a leap year.

**Solution 14:**
```php
function isLeapYear($year) {
    return ($year % 4 === 0 && ($year % 100 !== 0 || $year % 400 === 0));
}

echo isLeapYear(2020); // Output: true
echo isLeapYear(2022); // Output: false
```

**Problem 15:**
Write a PHP function to find and return the longest word in a given sentence.

**Solution 15:**
```php
function longestWord($sentence) {
    $words = str_word_count($sentence, 1);
    $maxLength = 0;
    $longestWord = '';

    foreach ($words as $word) {
        if (strlen($word) > $maxLength) {
            $maxLength = strlen($word);
            $longestWord = $word;
        }
    }

    return $longestWord;
}

echo longestWord("The quick brown fox jumps over the lazy dog"); // Output: "jumps"
```

**Problem 16:**
Write a PHP function to generate a random password of a given length.

**Solution 16:**
```php
function generateRandomPassword($length) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $password = '';
    $charCount = strlen($characters);

    for ($i = 0; $i < $length; $i++) {
        $randomIndex = rand(0, $charCount - 1);
        $password .= $characters[$randomIndex];
    }

    return $password;
}

echo generateRandomPassword(8); // Output: Random 8-character password
```

**Problem 17:**
Write a PHP function to find the GCD (Greatest Common Divisor) of two numbers.

**Solution 17:**
```php
function gcd($a, $b) {
    while ($b !== 0) {
        $temp = $b;
        $b = $a % $b;
        $a = $temp;
    }
    return $a;
}

echo gcd(24, 36); // Output: 12 (GCD of 24 and 36)
```

**Problem 18:**
Write a PHP function to count the number of vowels and consonants in a given string.

**Solution 18:**
```php
function countVowelsConsonants($str) {
    $str = strtolower($str);
    $vowels = 0;
    $consonants = 0;
    $length = strlen($str);

    for ($i = 0; $i < $length; $i++) {
        $char = $str[$i];
        if (preg_match('/[aeiou]/', $char)) {
            $vowels++;
        } elseif (preg_match('/[a-z]/', $char)) {
            $consonants++;
        }
    }

    return ["vowels" => $vowels, "consonants" => $consonants];
}

$result = countVowelsConsonants("Hello, World!");
print_r($result); // Output: ["vowels" => 3, "consonants" => 7]
```

**Problem 19:**
Write a PHP function to check if a string contains only alphabetic characters.

**Solution 19:**
```php
function containsOnlyAlphabets($str) {
    return ctype_alpha($str);
}

echo containsOnlyAlphabets("HelloWorld"); // Output: true
echo containsOnlyAlphabets("Hello123");   // Output: false
```

**Problem 20:**
Write a PHP function to find the median of a given array of numbers.

**Solution 20:**
```php
function findMedian($arr) {
    sort($arr);
    $count = count($arr);

    if ($count % 2 === 0) {
        $middle1 = $arr[($count / 2) - 1];
        $middle2 = $arr[$count / 2];
        return ($middle1 + $middle2) / 2;
    } else {
        return $arr[($count - 1) / 2];
    }
}

$array = [5, 2, 9, 1, 5];
echo findMedian($array); // Output: 5 (Middle element)
```

**Problem 21:**
Write a PHP function to count the number of occurrences of each character in a string and return the result as an associative array.

**Solution 21:**
```php
function countCharacterOccurrences($str) {
    $charCount = [];

    for ($i = 0; $i < strlen($str); $i++) {
        $char = $str[$i];
        if (isset($charCount[$char])) {
            $charCount[$char]++;
        } else {
            $charCount[$char]

 = 1;
        }
    }

    return $charCount;
}

$result = countCharacterOccurrences("programming");
print_r($result); // Output: ["p" => 1, "r" => 2, "o" => 1, "g" => 2, "a" => 1, "m" => 2, "i" => 1, "n" => 1]
```

**Problem 22:**
Write a PHP function to find the LCM (Least Common Multiple) of two numbers.

**Solution 22:**
```php
function lcm($a, $b) {
    return ($a * $b) / gcd($a, $b);
}

echo lcm(24, 36); // Output: 72 (LCM of 24 and 36)
```

**Problem 23:**
Write a PHP function to check if a given number is a palindrome.

**Solution 23:**
```php
function isPalindrome($num) {
    return $num == strrev($num);
}

echo isPalindrome(121); // Output: true
echo isPalindrome(123); // Output: false
```

**Problem 24:**
Write a PHP function to reverse the order of words in a given sentence.

**Solution 24:**
```php
function reverseWords($sentence) {
    $words = explode(" ", $sentence);
    $reversed = implode(" ", array_reverse($words));
    return $reversed;
}

echo reverseWords("Hello World"); // Output: "World Hello"
```

**Problem 25:**
Write a PHP function to find the number of occurrences of a specific word in a sentence.

**Solution 25:**
```php
function countWordOccurrences($sentence, $word) {
    $words = explode(" ", $sentence);
    $count = 0;
    foreach ($words as $w) {
        if (strcasecmp($w, $word) === 0) {
            $count++;
        }
    }
    return $count;
}

$sentence = "This is a test. This is only a test.";
$word = "test";
echo countWordOccurrences($sentence, $word); // Output: 2
```

**Problem 26:**
Write a PHP function to check if a string is an anagram of another string (contains the same characters in a different order).

**Solution 26:**
```php
function areAnagrams($str1, $str2) {
    $str1 = strtolower(preg_replace('/[^a-zA-Z0-9]/', '', $str1));
    $str2 = strtolower(preg_replace('/[^a-zA-Z0-9]/', '', $str2));
    return count_chars($str1, 1) == count_chars($str2, 1);
}

echo areAnagrams("listen", "silent"); // Output: true
echo areAnagrams("hello", "world");   // Output: false
```

**Problem 27:**
Write a PHP function to find the longest common prefix of an array of strings.

**Solution 27:**
```php
function longestCommonPrefix($strs) {
    if (empty($strs)) {
        return "";
    }

    $prefix = $strs[0];
    $count = count($strs);

    for ($i = 1; $i < $count; $i++) {
        while (strpos($strs[$i], $prefix) !== 0) {
            $prefix = substr($prefix, 0, strlen($prefix) - 1);
            if (empty($prefix)) {
                return "";
            }
        }
    }

    return $prefix;
}

$array = ["flower", "flour", "flow"];
echo longestCommonPrefix($array); // Output: "flo"
```

**Problem 28:**
Write a PHP function to find and return the second largest element in an array of numbers.

**Solution 28:**
```php
function secondLargest($arr) {
    if (count($arr) < 2) {
        return null;
    }

    $largest = $secondLargest = PHP_INT_MIN;

    foreach ($arr as $num) {
        if ($num > $largest) {
            $secondLargest = $largest;
            $largest = $num;
        } elseif ($num > $secondLargest && $num != $largest) {
            $secondLargest = $num;
        }
    }

    return ($secondLargest != PHP_INT_MIN) ? $secondLargest : null;
}

$array = [5, 2, 9, 1, 5];
echo secondLargest($array); // Output: 5 (Second largest element)
```

**Problem 29:**
Write a PHP function to find and return the first missing positive integer from an unsorted array.

**Solution 29:**
```php
function firstMissingPositive($nums) {
    $n = count($nums);

    for ($i = 0; $i < $n; $i++) {
        while ($nums[$i] > 0 && $nums[$i] <= $n && $nums[$nums[$i] - 1] != $nums[$i]) {
            list($nums[$i], $nums[$nums[$i] - 1]) = [$nums[$nums[$i] - 1], $nums[$i]];
        }
    }

    for ($i = 0; $i < $n; $i++) {
        if ($nums[$i] != $i + 1) {
            return $i + 1;
        }
    }

    return $n + 1;
}

$array = [3, 4, -1, 1];
echo firstMissingPositive($array); // Output: 2
```

**Problem 30:**
Write a PHP function to find the shortest substring containing all characters of a given set.

**Solution 30:**
```php
function shortestSubstring($str, $set) {
    $setCount = count_chars($set, 1);
    $strCount = [];
    $start = 0;
    $minLength = PHP_INT_MAX;
    $minSubstring = "";

    for ($end = 0; $end < strlen($str); $end++) {
        $char = $str[$end];
        if (isset($setCount[ord($char)])) {
            if (!isset($strCount[ord($char)])) {
                $strCount[ord($char)] = 1;
            } else {
                $strCount[ord($char)]++;
            }
        }

        while (count($strCount) == count($setCount)) {
            if ($end - $start + 1 < $

minLength) {
                $minLength = $end - $start + 1;
                $minSubstring = substr($str, $start, $minLength);
            }

            $leftChar = $str[$start];
            if (isset($setCount[ord($leftChar)])) {
                $strCount[ord($leftChar)]--;
                if ($strCount[ord($leftChar)] == 0) {
                    unset($strCount[ord($leftChar)]);
                }
            }

            $start++;
        }
    }

    return $minSubstring;
}

$string = "ADOBECODEBANC";
$characterSet = "ABC";
echo shortestSubstring($string, $characterSet); // Output: "BANC"
```

**Problem 31:**
Write a PHP function to rotate a given matrix (2D array) 90 degrees clockwise.

**Solution 31:**
```php
function rotateMatrix($matrix) {
    $rows = count($matrix);
    $cols = count($matrix[0]);
    $result = [];

    for ($i = 0; $i < $cols; $i++) {
        $result[$i] = [];
        for ($j = $rows - 1; $j >= 0; $j--) {
            $result[$i][] = $matrix[$j][$i];
        }
    }

    return $result;
}

$matrix = [
    [1, 2, 3],
    [4, 5, 6],
    [7, 8, 9]
];

$result = rotateMatrix($matrix);
print_r($result);
/* Output:
Array
(
    [0] => Array
        (
            [0] => 7
            [1] => 4
            [2] => 1
        )

    [1] => Array
        (
            [0] => 8
            [1] => 5
            [2] => 2
        )

    [2] => Array
        (
            [0] => 9
            [1] => 6
            [2] => 3
        )
)
*/
```

**Problem 32:**
Write a PHP function to check if two strings are anagrams of each other, ignoring whitespace and capitalization.

**Solution 32:**
```php
function areAnagrams($str1, $str2) {
    $str1 = strtolower(preg_replace('/[^a-zA-Z0-9]/', '', $str1));
    $str2 = strtolower(preg_replace('/[^a-zA-Z0-9]/', '', $str2));
    return count_chars($str1, 1) == count_chars($str2, 1);
}

echo areAnagrams("listen", "silent");       // Output: true
echo areAnagrams("Hello World", "World Hello"); // Output: true
echo areAnagrams("hello", "world");           // Output: false
```

**Problem 33:**
Write a PHP function to find the longest substring without repeating characters in a given string.

**Solution 33:**
```php
function longestSubstring($str) {
    $maxLen = 0;
    $start = 0;
    $charIndex = [];
    $result = "";

    for ($end = 0; $end < strlen($str); $end++) {
        $char = $str[$end];
        if (isset($charIndex[$char]) && $charIndex[$char] >= $start) {
            $start = $charIndex[$char] + 1;
        }

        $charIndex[$char] = $end;

        if ($end - $start + 1 > $maxLen) {
            $maxLen = $end - $start + 1;
            $result = substr($str, $start, $maxLen);
        }
    }

    return $result;
}

echo longestSubstring("abcabcbb"); // Output: "abc"
echo longestSubstring("bbbbb");   // Output: "b"
```

**Problem 34:**
Write a PHP function to implement a basic calculator that can perform addition, subtraction, multiplication, and division.

**Solution 34:**
```php
function basicCalculator($expression) {
    $stack = [];
    $operand = 0;
    $result = 0;
    $sign = 1;

    for ($i = 0; $i < strlen($expression); $i++) {
        $char = $expression[$i];

        if (is_numeric($char)) {
            $operand = $operand * 10 + intval($char);
        } elseif ($char == '+') {
            $result += $sign * $operand;
            $operand = 0;
            $sign = 1;
        } elseif ($char == '-') {
            $result += $sign * $operand;
            $operand = 0;
            $sign = -1;
        } elseif ($char == '(') {
            array_push($stack, $result);
            array_push($stack, $sign);
            $result = 0;
            $sign = 1;
        } elseif ($char == ')') {
            $result += $sign * $operand;
            $operand = 0;
            $result *= array_pop($stack);
            $result += array_pop($stack);
        }
    }

    $result += $sign * $operand;
    return $result;
}

echo basicCalculator("1 + 2");         // Output: 3
echo basicCalculator("2 - 1 + 3");     // Output: 4
echo basicCalculator("(1+(4+5+2)-3)+(6+8)"); // Output: 23
```

**Problem 35:**
Write a PHP function to generate all possible subsets of a given array.

**Solution 35:**
```php
function generateSubsets($nums) {
    $subsets = [[]];

    foreach ($nums as $num) {
        $count = count($subsets);
        for ($i = 0; $i < $count; $i++) {
            $subset = $subsets[$i];
            $subset[] = $num;
            $subsets[] = $subset;
        }
    }

    return $subsets;
}

$array = [1, 2, 3];
$result = generateSubsets($array);
print_r($result);
/* Output:
Array
(
    [0] => Array
        (
        )

    [1] => Array
        (
            [0] => 1
        )

    [2] => Array
        (
            [0] => 2
        )

    [3] => Array
        (
            [0] => 1
            [1] => 2
        )

    [4] => Array
        (
            [0] => 3
        )

    [5] => Array
        (
            [0] => 1
            [1] => 3
        )

    [6] => Array
        (
            [0] => 2
            [1] => 3
        )

    [7] => Array
        (
            [0] => 1
            [1] => 2
            [2] => 3
        )
)
*/
```

**

Problem 36:**
Write a PHP function to implement a stack using an array and support push, pop, top, and empty operations.

**Solution 36:**
```php
class MyStack {
    private $stack;

    function __construct() {
        $this->stack = [];
    }

    function push($x) {
        array_push($this->stack, $x);
    }

    function pop() {
        if ($this->empty()) {
            return null;
        }
        return array_pop($this->stack);
    }

    function top() {
        if ($this->empty()) {
            return null;
        }
        return end($this->stack);
    }

    function empty() {
        return empty($this->stack);
    }
}

$stack = new MyStack();
$stack->push(1);
$stack->push(2);
echo $stack->top();   // Output: 2
echo $stack->pop();   // Output: 2
echo $stack->empty(); // Output: false
```

**Problem 37:**
Write a PHP function to implement a queue using an array and support push, pop, peek, and empty operations.

**Solution 37:**
```php
class MyQueue {
    private $queue;

    function __construct() {
        $this->queue = [];
    }

    function push($x) {
        array_push($this->queue, $x);
    }

    function pop() {
        if ($this->empty()) {
            return null;
        }
        return array_shift($this->queue);
    }

    function peek() {
        if ($this->empty()) {
            return null;
        }
        return reset($this->queue);
    }

    function empty() {
        return empty($this->queue);
    }
}

$queue = new MyQueue();
$queue->push(1);
$queue->push(2);
echo $queue->peek();  // Output: 1
echo $queue->pop();   // Output: 1
echo $queue->empty(); // Output: false
```

**Problem 38:**
Write a PHP function to implement a basic calculator that can perform addition, subtraction, multiplication, and division, with support for parentheses.

**Solution 38:**
```php
function basicCalculator($expression) {
    $stack = new SplStack();
    $operand = 0;
    $result = 0;
    $sign = 1;

    for ($i = 0; $i < strlen($expression); $i++) {
        $char = $expression[$i];

        if (is_numeric($char)) {
            $operand = $operand * 10 + intval($char);
        } elseif ($char == '+') {
            $result += $sign * $operand;
            $operand = 0;
            $sign = 1;
        } elseif ($char == '-') {
            $result += $sign * $operand;
            $operand = 0;
            $sign = -1;
        } elseif ($char == '(') {
            $stack->push($result);
            $stack->push($sign);
            $result = 0;
            $sign = 1;
        } elseif ($char == ')') {
            $result += $sign * $operand;
            $operand = 0;
            $result *= $stack->pop(); // Pop sign
            $result += $stack->pop(); // Pop previous result
        }
    }

    $result += $sign * $operand;
    return $result;
}

echo basicCalculator("1 + 2");         // Output: 3
echo basicCalculator("2 - 1 + 3");     // Output: 4
echo basicCalculator("(1+(4+5+2)-3)+(6+8)"); // Output: 23
```

**Problem 39:**
Write a PHP function to implement a basic calculator that can perform addition, subtraction, multiplication, and division, with support for parentheses and spaces.

**Solution 39:**
```php
function basicCalculator($expression) {
    $expression = preg_replace('/\s+/', '', $expression); // Remove spaces
    $stack = new SplStack();
    $operand = 0;
    $result = 0;
    $sign = 1;

    for ($i = 0; $i < strlen($expression); $i++) {
        $char = $expression[$i];

        if (is_numeric($char)) {
            $operand = $operand * 10 + intval($char);
        } elseif ($char == '+') {
            $result += $sign * $operand;
            $operand = 0;
            $sign = 1;
        } elseif ($char == '-') {
            $result += $sign * $operand;
            $operand = 0;
            $sign = -1;
        } elseif ($char == '(') {
            $stack->push($result);
            $stack->push($sign);
            $result = 0;
            $sign = 1;
        } elseif ($char == ')') {
            $result += $sign * $operand;
            $operand = 0;
            $result *= $stack->pop(); // Pop sign
            $result += $stack->pop(); // Pop previous result
        }
    }

    $result += $sign * $operand;
    return $result;
}

echo basicCalculator("1 + 2");         // Output: 3
echo basicCalculator("2 - 1 + 3");     // Output: 4
echo basicCalculator("(1+(4+5+2)-3)+(6+8)"); // Output: 23
```

**Problem 40:**
Write a PHP function to reverse a linked list.

**Solution 40:**
```php
class ListNode {
    public $val;
    public $next;
    
    function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}

function reverseLinkedList($head) {
    $prev = null;
    while ($head !== null) {
        $next = $head->next;
        $head->next = $prev;
        $prev = $head;
        $head = $next;
    }
    return $prev;
}

// Helper function to create a linked list from an array
function createLinkedList($arr) {
    $dummy = new ListNode(0);
    $current = $dummy;
    foreach ($arr as $val) {
        $current->next = new ListNode($val);
        $current = $current->next;
    }
    return $dummy->next;
}

// Helper function to convert a linked list to an array
function linkedListToArray($head) {
    $result = [];
    while ($head !== null) {
        $result[] = $head->val;
        $head = $head->next;
    }
    return $result;
}

$linked_list = createLinkedList([1, 2, 3, 4, 5]);
$reversed = reverseLinkedList($linked_list);
print_r(linkedListToArray($reversed)); // Output: [5, 4, 3, 2, 1]
```

**Problem 41:**
Write a PHP function to find the intersection point of two

 linked lists.

**Solution 41:**
```php
class ListNode {
    public $val;
    public $next;
    
    function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}

function getIntersectionNode($headA, $headB) {
    $ptrA = $headA;
    $ptrB = $headB;

    while ($ptrA !== $ptrB) {
        $ptrA = ($ptrA === null) ? $headB : $ptrA->next;
        $ptrB = ($ptrB === null) ? $headA : $ptrB->next;
    }

    return $ptrA;
}

// Helper function to create linked lists with intersection point
function createIntersectingLinkedLists($listA, $listB, $intersectionIndex) {
    $currentA = $listA;
    $currentB = $listB;
    $intersectionNode = null;

    for ($i = 0; $i < $intersectionIndex; $i++) {
        $currentA = $currentA->next;
    }

    while ($currentB->next !== null) {
        $currentB = $currentB->next;
    }

    $currentB->next = $currentA;
    $intersectionNode = $currentA;

    return [$listA, $listB, $intersectionNode];
}

// Helper function to create linked lists from arrays
function createLinkedListFromArray($arr) {
    $dummy = new ListNode(0);
    $current = $dummy;
    foreach ($arr as $val) {
        $current->next = new ListNode($val);
        $current = $current->next;
    }
    return $dummy->next;
}

$linked_list1 = createLinkedListFromArray([1, 2, 3, 4]);
$linked_list2 = createLinkedListFromArray([5, 6]);
[$linked_list1, $linked_list2, $intersection] = createIntersectingLinkedLists($linked_list1, $linked_list2, 2);

$intersectionNode = getIntersectionNode($linked_list1, $linked_list2);
echo $intersectionNode->val; // Output: 3 (Intersection point)
```

**Problem 42:**
Write a PHP function to detect a cycle in a linked list and return the node where the cycle begins.

**Solution 42:**
```php
class ListNode {
    public $val;
    public $next;
    
    function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}

function detectCycle($head) {
    $slow = $head;
    $fast = $head;

    while ($fast !== null && $fast->next !== null) {
        $slow = $slow->next;
        $fast = $fast->next->next;

        if ($slow === $fast) {
            $slow2 = $head;
            while ($slow2 !== $slow) {
                $slow2 = $slow2->next;
                $slow = $slow->next;
            }
            return $slow2;
        }
    }

    return null;
}

// Helper function to create a linked list with a cycle
function createCycleLinkedList($arr, $cycleIndex) {
    $dummy = new ListNode(0);
    $current = $dummy;
    $cycleNode = null;

    for ($i = 0; $i < count($arr); $i++) {
        $current->next = new ListNode($arr[$i]);
        $current = $current->next;
        if ($i === $cycleIndex) {
            $cycleNode = $current;
        }
    }

    $current->next = $cycleNode; // Create the cycle
    return $dummy->next;
}

// Helper function to create a linked list from an array
function createLinkedList($arr) {
    $dummy = new ListNode(0);
    $current = $dummy;
    foreach ($arr as $val) {
        $current->next = new ListNode($val);
        $current = $current->next;
    }
    return $dummy->next;
}

$linked_list = createCycleLinkedList([1, 2, 3, 4, 5], 1);
$cycleNode = detectCycle($linked_list);
echo $cycleNode->val; // Output: 2 (Node where the cycle begins)
```

**Problem 43:**
Write a PHP function to find the middle of a linked list.

**Solution 43:**
```php
class ListNode {
    public $val;
    public $next;
    
    function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}

function findMiddle($head) {
    $slow = $head;
    $fast = $head;

    while ($fast !== null && $fast->next !== null) {
        $slow = $slow->next;
        $fast = $fast->next->next;
    }

    return $slow;
}

// Helper function to create a linked list from an array
function createLinkedList($arr) {
    $dummy = new ListNode(0);
    $current = $dummy;
    foreach ($arr as $val) {
        $current->next = new ListNode($val);
        $current = $current->next;
    }
    return $dummy->next;
}

$linked_list = createLinkedList([1, 2, 3, 4, 5]);
$middleNode = findMiddle($linked_list);
echo $middleNode->val; // Output: 3 (Middle of the linked list)
```

**Problem 44:**
Write a PHP function to merge two sorted linked lists into a single sorted linked list.

**Solution 44:**
```php
class ListNode {
    public $val;
    public $next;
    
    function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}

function mergeSortedLists($l1, $l2) {
    $dummy = new ListNode(0);
    $current = $dummy;

    while ($l1 !== null && $l2 !== null) {
        if ($l1->val < $l2->val) {
            $current->next = $l1;
            $l1 = $l1->next;
        } else {
            $current->next = $l2;
            $l2 = $l2->next;
        }
        $current = $current->next;
    }

    if ($l1 !== null) {
        $current->next = $l1;
    } elseif ($l2 !== null) {
        $current->next = $l2;
    }

    return $dummy->next;
}

// Helper function to create a linked list from an array
function createLinkedList($arr) {
    $dummy = new ListNode(0);
    $current = $dummy;
    foreach ($arr as $val) {
        $current->next = new ListNode($val);
        $current = $current->next;
    }
   

 return $dummy->next;
}

$linked_list1 = createLinkedList([1, 3, 5]);
$linked_list2 = createLinkedList([2, 4, 6]);
$merged = mergeSortedLists($linked_list1, $linked_list2);
print_r($merged);
/* Output:
ListNode Object
(
    [val] => 1
    [next] => ListNode Object
        (
            [val] => 2
            [next] => ListNode Object
                (
                    [val] => 3
                    [next] => ListNode Object
                        (
                            [val] => 4
                            [next] => ListNode Object
                                (
                                    [val] => 5
                                    [next] => ListNode Object
                                        (
                                            [val] => 6
                                            [next] => 
                                        )
                                )
                        )
                )
        )
)
*/
```

**Problem 45:**
Write a PHP function to delete a node in a singly linked list, given only access to that node.

**Solution 45:**
```php
class ListNode {
    public $val;
    public $next;
    
    function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}

function deleteNode($nodeToDelete) {
    if ($nodeToDelete === null || $nodeToDelete->next === null) {
        return false;
    }

    $nextNode = $nodeToDelete->next;
    $nodeToDelete->val = $nextNode->val;
    $nodeToDelete->next = $nextNode->next;
    return true;
}

// Helper function to create a linked list from an array
function createLinkedList($arr) {
    $dummy = new ListNode(0);
    $current = $dummy;
    foreach ($arr as $val) {
        $current->next = new ListNode($val);
        $current = $current->next;
    }
    return $dummy->next;
}

$linked_list = createLinkedList([1, 2, 3, 4, 5]);
$nodeToDelete = $linked_list->next->next; // Node with value 3
deleteNode($nodeToDelete);
print_r($linked_list);
/* Output:
ListNode Object
(
    [val] => 1
    [next] => ListNode Object
        (
            [val] => 2
            [next] => ListNode Object
                (
                    [val] => 4
                    [next] => ListNode Object
                        (
                            [val] => 5
                            [next] => 
                        )
                )
        )
)
*/
```

**Problem 46:**
Write a PHP function to add two numbers represented by linked lists, where each node contains a single digit, and the digits are stored in reverse order (i.e., 2 -> 4 -> 3 represents 342).

**Solution 46:**
```php
class ListNode {
    public $val;
    public $next;
    
    function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}

function addTwoNumbers($l1, $l2) {
    $dummy = new ListNode(0);
    $current = $dummy;
    $carry = 0;

    while ($l1 !== null || $l2 !== null) {
        $x = ($l1 !== null) ? $l1->val : 0;
        $y = ($l2 !== null) ? $l2->val : 0;
        $sum = $x + $y + $carry;
        $carry = intdiv($sum, 10);
        $current->next = new ListNode($sum % 10);
        $current = $current->next;

        if ($l1 !== null) {
            $l1 = $l1->next;
        }
        if ($l2 !== null) {
            $l2 = $l2->next;
        }
    }

    if ($carry > 0) {
        $current->next = new ListNode($carry);
    }

    return $dummy->next;
}

// Helper function to create a linked list from an array in reverse order
function createLinkedList($arr) {
    $dummy = new ListNode(0);
    $current = $dummy;
    foreach (array_reverse($arr) as $val) {
        $current->next = new ListNode($val);
        $current = $current->next;
    }
    return $dummy->next;
}

$linked_list1 = createLinkedList([2, 4, 3]); // Represents 342
$linked_list2 = createLinkedList([5, 6, 4]); // Represents 465
$sum = addTwoNumbers($linked_list1, $linked_list2);
print_r($sum);
/* Output:
ListNode Object
(
    [val] => 7
    [next] => ListNode Object
        (
            [val] => 0
            [next] => ListNode Object
                (
                    [val] => 8
                    [next] => 
                )
        )
)
*/
```

**Problem 47:**
Write a PHP function to remove all elements from a linked list of integers that have a specific value.

**Solution 47:**
```php
class ListNode {
    public $val;
    public $next;
    
    function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}

function removeElements($head, $val) {
    $dummy = new ListNode(0);
    $dummy->next = $head;
    $current = $dummy;

    while ($current->next !== null) {
        if ($current->next->val === $val) {
            $current->next = $current->next->next;
        } else {
            $current = $current->next;
        }
    }

    return $dummy->next;
}

// Helper function to create a linked list from an array
function createLinkedList($arr) {
    $dummy = new ListNode(0);
    $current = $dummy;
    foreach ($arr as $val) {
        $current->next = new ListNode($val);
        $current = $current->next;
    }
    return $dummy->next;
}

$linked_list = createLinkedList([1, 2, 6, 3, 4, 5, 6]);
$modified_list = removeElements($linked_list, 6);
print_r($modified_list);
/* Output:
ListNode Object
(
    [val] => 1
    [next] => ListNode Object
        (
            [val] => 2
            [next] => ListNode Object
                (
                    [val] => 3
                    [next] => ListNode Object
                        (
                            [val] => 4
                            [next] => ListNode Object
                                (
                                    [val] => 5
                                    [next] => 
                                )
                        )
                )
        )
)
*/
```

**Problem 48:**
Write a PHP function to reverse a string in-place. You cannot use any extra space.

**Solution 48:**
```php
function reverseString(&$s

) {
    $left = 0;
    $right = strlen($s) - 1;

    while ($left < $right) {
        $temp = $s[$left];
        $s[$left] = $s[$right];
        $s[$right] = $temp;
        $left++;
        $right--;
    }
}

$string = "hello";
$s = str_split($string);
reverseString($s);
echo implode("", $s); // Output: "olleh"
```

**Problem 49:**
Write a PHP function to find the longest common prefix string amongst an array of strings.

**Solution 49:**
```php
function longestCommonPrefix($strs) {
    if (empty($strs)) {
        return "";
    }

    $prefix = $strs[0];

    foreach ($strs as $str) {
        while (strpos($str, $prefix) !== 0) {
            $prefix = substr($prefix, 0, strlen($prefix) - 1);
            if (empty($prefix)) {
                return "";
            }
        }
    }

    return $prefix;
}

$array = ["flower", "flow", "flight"];
echo longestCommonPrefix($array); // Output: "fl"
```

**Problem 50:**
Write a PHP function to count and say the nth term of the "count and say" sequence.

**Solution 50:**
```php
function countAndSay($n) {
    if ($n === 1) {
        return "1";
    }

    $prevTerm = countAndSay($n - 1);
    $result = "";
    $count = 1;

    for ($i = 0; $i < strlen($prevTerm); $i++) {
        if ($i + 1 < strlen($prevTerm) && $prevTerm[$i] === $prevTerm[$i + 1]) {
            $count++;
        } else {
            $result .= $count . $prevTerm[$i];
            $count = 1;
        }
    }

    return $result;
}

echo countAndSay(4); // Output: "1211"
```

These are 50 PHP problems with their solutions and code examples. They cover a range of topics and should be helpful for PHP developer interview tests.

Certainly! Here are 50 more PHP problems with their solutions and code examples for a PHP developer interview test:

**Problem 51:**
Write a PHP function to find the first non-repeating character in a string.

**Solution 51:**
```php
function firstNonRepeatingChar($s) {
    $charCount = [];

    for ($i = 0; $i < strlen($s); $i++) {
        $char = $s[$i];
        if (isset($charCount[$char])) {
            $charCount[$char]++;
        } else {
            $charCount[$char] = 1;
        }
    }

    for ($i = 0; $i < strlen($s); $i++) {
        if ($charCount[$s[$i]] === 1) {
            return $s[$i];
        }
    }

    return false; // If no non-repeating character is found
}

echo firstNonRepeatingChar("leetcode"); // Output: "l"
```

**Problem 52:**
Write a PHP function to find the missing number in an array containing numbers from 0 to n, where one number is missing.

**Solution 52:**
```php
function findMissingNumber($nums) {
    $n = count($nums);
    $expectedSum = ($n * ($n + 1)) / 2;
    $actualSum = array_sum($nums);
    return $expectedSum - $actualSum;
}

$array = [3, 0, 1];
echo findMissingNumber($array); // Output: 2
```

**Problem 53:**
Write a PHP function to reverse words in a string.

**Solution 53:**
```php
function reverseWords($s) {
    $words = explode(" ", $s);
    $reversedWords = array_map('strrev', $words);
    return implode(" ", $reversedWords);
}

echo reverseWords("Hello World"); // Output: "olleH dlroW"
```

**Problem 54:**
Write a PHP function to find the longest word in a sentence.

**Solution 54:**
```php
function longestWord($sentence) {
    $words = preg_split('/\s+/', $sentence);
    $longest = "";

    foreach ($words as $word) {
        if (strlen($word) > strlen($longest)) {
            $longest = $word;
        }
    }

    return $longest;
}

echo longestWord("This is a sample sentence with words of different lengths."); // Output: "different"
```

**Problem 55:**
Write a PHP function to check if a string is a palindrome (reads the same backward as forward).

**Solution 55:**
```php
function isPalindrome($s) {
    $s = preg_replace('/[^a-zA-Z0-9]/', '', strtolower($s));
    return $s === strrev($s);
}

echo isPalindrome("A man, a plan, a canal: Panama"); // Output: true
```

**Problem 56:**
Write a PHP function to find the longest increasing subarray in an array of integers.

**Solution 56:**
```php
function longestIncreasingSubarray($nums) {
    $maxLen = 0;
    $currentLen = 1;

    for ($i = 1; $i < count($nums); $i++) {
        if ($nums[$i] > $nums[$i - 1]) {
            $currentLen++;
        } else {
            $maxLen = max($maxLen, $currentLen);
            $currentLen = 1;
        }
    }

    return max($maxLen, $currentLen);
}

$array = [1, 3, 5, 4, 7];
echo longestIncreasingSubarray($array); // Output: 3
```

**Problem 57:**
Write a PHP function to find the intersection of two arrays.

**Solution 57:**
```php
function intersection($nums1, $nums2) {
    return array_values(array_intersect($nums1, $nums2));
}

$array1 = [1, 2, 2, 1];
$array2 = [2, 2];
print_r(intersection($array1, $array2)); // Output: [2]
```

**Problem 58:**
Write a PHP function to find the union of two arrays.

**Solution 58:**
```php
function union($nums1, $nums2) {
    return array_values(array_unique(array_merge($nums1, $nums2)));
}

$array1 = [1, 2, 2, 1];
$array2 = [2, 2, 3];
print_r(union($array1, $array2)); // Output: [1, 2, 3]
```

**Problem 59:**
Write a PHP function to find the second smallest element in an array of integers.

**Solution 59:**
```php
function secondSmallest($nums) {
    if (count($nums) < 2) {
        return null;
    }

    $firstSmallest = PHP_INT_MAX;
    $secondSmallest = PHP_INT_MAX;

    foreach ($nums as $num) {
        if ($num < $firstSmallest) {
            $secondSmallest

 = $firstSmallest;
            $firstSmallest = $num;
        } elseif ($num < $secondSmallest && $num !== $firstSmallest) {
            $secondSmallest = $num;
        }
    }

    return ($secondSmallest === PHP_INT_MAX) ? null : $secondSmallest;
}

$array = [4, 2, 5, 1, 3];
echo secondSmallest($array); // Output: 2
```

**Problem 60:**
Write a PHP function to remove duplicates from a sorted array in-place and return the new length.

**Solution 60:**
```php
function removeDuplicates(&$nums) {
    $n = count($nums);
    if ($n < 2) {
        return $n;
    }

    $index = 0;

    for ($i = 1; $i < $n; $i++) {
        if ($nums[$i] !== $nums[$index]) {
            $index++;
            $nums[$index] = $nums[$i];
        }
    }

    return $index + 1;
}

$array = [1, 1, 2, 2, 2, 3, 4, 4, 5];
$length = removeDuplicates($array);
echo $length; // Output: 5
print_r(array_slice($array, 0, $length)); // Output: [1, 2, 3, 4, 5]
```

**Problem 61:**
Write a PHP function to find the maximum product of two integers in an array.

**Solution 61:**
```php
function maxProduct($nums) {
    if (count($nums) < 2) {
        return 0;
    }

    sort($nums);
    $n = count($nums);

    return max($nums[0] * $nums[1], $nums[$n - 1] * $nums[$n - 2]);
}

$array = [3, 4, 5, 2];
echo maxProduct($array); // Output: 20
```

**Problem 62:**
Write a PHP function to find the majority element in an array (element that appears more than ⌊n/2⌋ times).

**Solution 62:**
```php
function majorityElement($nums) {
    $count = 0;
    $candidate = null;

    foreach ($nums as $num) {
        if ($count === 0) {
            $candidate = $num;
        }

        $count += ($num === $candidate) ? 1 : -1;
    }

    return $candidate;
}

$array = [3, 2, 3];
echo majorityElement($array); // Output: 3
```

**Problem 63:**
Write a PHP function to rotate an array to the right by k steps.

**Solution 63:**
```php
function rotateArray(&$nums, $k) {
    $n = count($nums);
    $k %= $n; // Handle cases where k is greater than n

    // Reverse the entire array
    reverseArray($nums, 0, $n - 1);

    // Reverse the first k elements
    reverseArray($nums, 0, $k - 1);

    // Reverse the remaining elements
    reverseArray($nums, $k, $n - 1);
}

function reverseArray(&$nums, $start, $end) {
    while ($start < $end) {
        $temp = $nums[$start];
        $nums[$start] = $nums[$end];
        $nums[$end] = $temp;
        $start++;
        $end--;
    }
}

$array = [1, 2, 3, 4, 5, 6, 7];
$k = 3;
rotateArray($array, $k);
print_r($array); // Output: [5, 6, 7, 1, 2, 3, 4]
```

**Problem 64:**
Write a PHP function to find the maximum subarray sum (contiguous elements) in an array.

**Solution 64:**
```php
function maxSubarraySum($nums) {
    $maxSum = $nums[0];
    $currentSum = $nums[0];

    for ($i = 1; $i < count($nums); $i++) {
        $currentSum = max($nums[$i], $currentSum + $nums[$i]);
        $maxSum = max($maxSum, $currentSum);
    }

    return $maxSum;
}

$array = [-2, 1, -3, 4, -1, 2, 1, -5, 4];
echo maxSubarraySum($array); // Output: 6
```

**Problem 65:**
Write a PHP function to find the minimum subarray length whose sum is greater than or equal to a given target.

**Solution 65:**
```php
function minSubarrayLength($target, $nums) {
    $minLength = PHP_INT_MAX;
    $left = 0;
    $currentSum = 0;

    for ($right = 0; $right < count($nums); $right++) {
        $currentSum += $nums[$right];

        while ($currentSum >= $target) {
            $minLength = min($minLength, $right - $left + 1);
            $currentSum -= $nums[$left];
            $left++;
        }
    }

    return ($minLength === PHP_INT_MAX) ? 0 : $minLength;
}

$array = [2, 3, 1, 2, 4, 3];
$target = 7;
echo minSubarrayLength($target, $array); // Output: 2
```

**Problem 66:**
Write a PHP function to find the longest substring without repeating characters.

**Solution 66:**
```php
function longestSubstring($s) {
    $maxLength = 0;
    $start = 0;
    $charIndex = [];

    for ($end = 0; $end < strlen($s); $end++) {
        if (isset($charIndex[$s[$end]]) && $charIndex[$s[$end]] >= $start) {
            $start = $charIndex[$s[$end]] + 1;
        }

        $charIndex[$s[$end]] = $end;
        $maxLength = max($maxLength, $end - $start + 1);
    }

    return $maxLength;
}

echo longestSubstring("abcabcbb"); // Output: 3
```

**Problem 67:**
Write a PHP function to implement a basic calculator that can perform addition and subtraction (no parentheses or complex expressions).

**Solution 67:**
```php
function basicCalculator($s) {
    $stack = new SplStack();
    $result = 0;
    $sign = 1;

    for ($i = 0; $i < strlen($s); $i++) {
        $char = $s[$i];

        if (is_numeric($char)) {
            $num = intval($char);
            while ($i + 1 < strlen($s) && is_numeric($s[$i +

 1])) {
                $num = $num * 10 + intval($s[$i + 1]);
                $i++;
            }
            $result += $sign * $num;
        } elseif ($char === '+') {
            $sign = 1;
        } elseif ($char === '-') {
            $sign = -1;
        } elseif ($char === '(') {
            $stack->push($result);
            $stack->push($sign);
            $result = 0;
            $sign = 1;
        } elseif ($char === ')') {
            $result *= $stack->pop(); // Pop the sign
            $result += $stack->pop(); // Pop the previous result
        }
    }

    return $result;
}

echo basicCalculator("1 + (2 - 3)"); // Output: 0
```

**Problem 68:**
Write a PHP function to find the longest consecutive sequence of elements in an unsorted array.

**Solution 68:**
```php
function longestConsecutive($nums) {
    if (empty($nums)) {
        return 0;
    }

    $numSet = array_flip($nums);
    $maxLength = 0;

    foreach ($nums as $num) {
        if (!isset($numSet[$num - 1])) {
            $currentNum = $num;
            $currentLength = 1;

            while (isset($numSet[$currentNum + 1])) {
                $currentNum++;
                $currentLength++;
            }

            $maxLength = max($maxLength, $currentLength);
        }
    }

    return $maxLength;
}

$array = [100, 4, 200, 1, 3, 2];
echo longestConsecutive($array); // Output: 4 (longest consecutive sequence: 1, 2, 3, 4)
```

**Problem 69:**
Write a PHP function to find the intersection of two arrays without duplicate elements in the result.

**Solution 69:**
```php
function intersectionWithoutDuplicates($nums1, $nums2) {
    $set1 = array_flip($nums1);
    $set2 = array_flip($nums2);
    $intersection = [];

    foreach ($set1 as $num => $_) {
        if (isset($set2[$num])) {
            $intersection[] = $num;
        }
    }

    return $intersection;
}

$array1 = [1, 2, 2, 1];
$array2 = [2, 2];
print_r(intersectionWithoutDuplicates($array1, $array2)); // Output: [2]
```

**Problem 70:**
Write a PHP function to find the kth largest element in an unsorted array.

**Solution 70:**
```php
function kthLargestElement($nums, $k) {
    sort($nums, SORT_DESC);
    return $nums[$k - 1];
}

$array = [3, 2, 1, 5, 6, 4];
$k = 2;
echo kthLargestElement($array, $k); // Output: 5
```

**Problem 71:**
Write a PHP function to find the kth smallest element in a sorted matrix.

**Solution 71:**
```php
function kthSmallestInMatrix($matrix, $k) {
    $n = count($matrix);
    $left = $matrix[0][0];
    $right = $matrix[$n - 1][$n - 1];

    while ($left < $right) {
        $mid = $left + (int)(($right - $left) / 2);
        $count = countLessThanOrEqual($matrix, $mid, $n);

        if ($count < $k) {
            $left = $mid + 1;
        } else {
            $right = $mid;
        }
    }

    return $left;
}

function countLessThanOrEqual($matrix, $target, $n) {
    $count = 0;
    $row = $n - 1;
    $col = 0;

    while ($row >= 0 && $col < $n) {
        if ($matrix[$row][$col] <= $target) {
            $count += $row + 1;
            $col++;
        } else {
            $row--;
        }
    }

    return $count;
}

$matrix = [
    [1, 5, 9],
    [10, 11, 13],
    [12, 13, 15]
];
$k = 8;
echo kthSmallestInMatrix($matrix, $k); // Output: 13
```

**Problem 72:**
Write a PHP function to implement a Trie (prefix tree) and perform insert, search, and startsWith operations.

**Solution 72:**
```php
class TrieNode {
    public $children = [];
    public $isEndOfWord = false;
}

class Trie {
    private $root;

    public function __construct() {
        $this->root = new TrieNode();
    }

    public function insert($word) {
        $node = $this->root;
        for ($i = 0; $i < strlen($word); $i++) {
            $char = $word[$i];
            if (!isset($node->children[$char])) {
                $node->children[$char] = new TrieNode();
            }
            $node = $node->children[$char];
        }
        $node->isEndOfWord = true;
    }

    public function search($word) {
        $node = $this->root;
        for ($i = 0; $i < strlen($word); $i++) {
            $char = $word[$i];
            if (!isset($node->children[$char])) {
                return false;
            }
            $node = $node->children[$char];
        }
        return $node->isEndOfWord;
    }

    public function startsWith($prefix) {
        $node = $this->root;
        for ($i = 0; $i < strlen($prefix); $i++) {
            $char = $prefix[$i];
            if (!isset($node->children[$char])) {
                return false;
            }
            $node = $node->children[$char];
        }
        return true;
    }
}

$trie = new Trie();
$trie->insert("apple");
echo $trie->search("apple"); // Output: true
echo $trie->search("app"); // Output: false
echo $trie->startsWith("app"); // Output: true
$trie->insert("app");
echo $trie->search("app"); // Output: true
```

**Problem 73:**
Write a PHP function to find the longest word in a dictionary that can be formed by deleting some characters of a given string.

**Solution 73:**
```php
function findLongestWord($s, $dictionary) {
    $maxLength = 0;
    $result = "";

    foreach ($dictionary as $word) {
        $i = 0;
        $j = 0;

        while ($i < strlen($s) && $j < strlen($word)) {
            if ($s[$i] === $word[$j])

 {
                $j++;
            }
            $i++;
        }

        if ($j === strlen($word) && strlen($word) >= $maxLength) {
            if (strlen($word) > $maxLength || strcmp($word, $result) < 0) {
                $maxLength = strlen($word);
                $result = $word;
            }
        }
    }

    return $result;
}

$dictionary = ["w","wo","wor","worl","world"];
$s = "world";
echo findLongestWord($s, $dictionary); // Output: "world"
```

**Problem 74:**
Write a PHP function to find the longest word in a dictionary that can be formed by characters of a given string in any order.

**Solution 74:**
```php
function findLongestWordInAnyOrder($s, $dictionary) {
    $charCount = countChars($s);
    $maxLength = 0;
    $result = "";

    foreach ($dictionary as $word) {
        $wordCount = countChars($word);
        $isSubset = true;

        foreach ($wordCount as $char => $count) {
            if (!isset($charCount[$char]) || $count > $charCount[$char]) {
                $isSubset = false;
                break;
            }
        }

        if ($isSubset && strlen($word) >= $maxLength) {
            if (strlen($word) > $maxLength || strcmp($word, $result) < 0) {
                $maxLength = strlen($word);
                $result = $word;
            }
        }
    }

    return $result;
}

function countChars($s) {
    $charCount = [];

    for ($i = 0; $i < strlen($s); $i++) {
        $char = $s[$i];
        if (isset($charCount[$char])) {
            $charCount[$char]++;
        } else {
            $charCount[$char] = 1;
        }
    }

    return $charCount;
}

$dictionary = ["w","wo","wor","worl","world"];
$s = "world";
echo findLongestWordInAnyOrder($s, $dictionary); // Output: "world"
```

**Problem 75:**
Write a PHP function to find the longest word composed of other words in a given list of words.

**Solution 75:**
```php
function longestCompoundWord($words) {
    $wordSet = array_flip($words);
    usort($words, function ($a, $b) {
        return strlen($b) - strlen($a);
    });

    foreach ($words as $word) {
        $wordSet[$word] = false;
        if (canFormWord($word, $wordSet)) {
            return $word;
        }
        $wordSet[$word] = true;
    }

    return "";
}

function canFormWord($word, $wordSet) {
    $n = strlen($word);

    if ($n === 0) {
        return false;
    }

    $dp = array_fill(0, $n + 1, false);
    $dp[0] = true;

    for ($i = 1; $i <= $n; $i++) {
        for ($j = 0; $j < $i; $j++) {
            if ($dp[$j] && isset($wordSet[substr($word, $j, $i - $j)])) {
                $dp[$i] = true;
                break;
            }
        }
    }

    return $dp[$n];
}

$words = ["cat", "cats", "catsdogcats", "dog", "dogcatsdog", "hippopotamuses", "rat", "ratcatdogcat"];
echo longestCompoundWord($words); // Output: "catsdogcats"
```

**Problem 76:**
Write a PHP function to count the number of prime numbers less than a given non-negative integer n.

**Solution 76:**
```php
function countPrimes($n) {
    if ($n <= 2) {
        return 0;
    }

    $isPrime = array_fill(2, $n - 2, true);

    for ($i = 2; $i * $i < $n; $i++) {
        if ($isPrime[$i]) {
            for ($j = $i * $i; $j < $n; $j += $i) {
                $isPrime[$j] = false;
            }
        }
    }

    return count(array_filter($isPrime));
}

echo countPrimes(10); // Output: 4 (Primes less than 10: 2, 3, 5, 7)
```

**Problem 77:**
Write a PHP function to find the intersection of two arrays (unique elements) in O(n) time complexity.

**Solution 77:**
```php
function intersection($nums1, $nums2) {
    $result = [];
    $count1 = count($nums1);
    $count2 = count($nums2);
    $map1 = [];

    if ($count1 < $count2) {
        list($count1, $count2) = [$count2, $count1];
        list($nums1, $nums2) = [$nums2, $nums1];
    }

    for ($i = 0; $i < $count1; $i++) {
        $map1[$nums1[$i]] = true;
    }

    $k = 0;

    for ($i = 0; $i < $count2; $i++) {
        if (isset($map1[$nums2[$i]])) {
            $result[$k++] = $nums2[$i];
            unset($map1[$nums2[$i]]);
        }
    }

    return $result;
}

$array1 = [1, 2, 2, 1];
$array2 = [2, 2, 3];
print_r(intersection($array1, $array2)); // Output: [2]
```

**Problem 78:**
Write a PHP function to calculate the square root of a non-negative integer without using the built-in sqrt function.

**Solution 78:**
```php
function mySqrt($x) {
    if ($x === 0) {
        return 0;
    }

    $left = 1;
    $right = $x;

    while ($left <= $right) {
        $mid = $left + (int)(($right - $left) / 2);
        $square = $mid * $mid;

        if ($square === $x) {
            return $mid;
        } elseif ($square < $x) {
            $left = $mid + 1;
        } else {
            $right = $mid - 1;
        }
    }

    return $right;
}

echo mySqrt(8); // Output: 2 (square root of 8 is approximately 2.82843)
```

**Problem 79:**
Write a PHP function to calculate the power of a number, x^y.

**Solution 79:**
```php
function power($x, $y) {
    if ($y === 0) {
        return 

1;
    } elseif ($y < 0) {
        $x = 1 / $x;
        $y = -$y;
    }

    $result = 1;

    while ($y > 0) {
        if ($y % 2 === 1) {
            $result *= $x;
        }

        $x *= $x;
        $y = (int)($y / 2);
    }

    return $result;
}

echo power(2, 3); // Output: 8 (2^3)
```

**Problem 80:**
Write a PHP function to convert a Roman numeral to an integer.

**Solution 80:**
```php
function romanToInt($s) {
    $romanValues = [
        'I' => 1,
        'V' => 5,
        'X' => 10,
        'L' => 50,
        'C' => 100,
        'D' => 500,
        'M' => 1000
    ];

    $integer = 0;
    $prevValue = 0;

    for ($i = strlen($s) - 1; $i >= 0; $i--) {
        $currentValue = $romanValues[$s[$i]];

        if ($currentValue < $prevValue) {
            $integer -= $currentValue;
        } else {
            $integer += $currentValue;
        }

        $prevValue = $currentValue;
    }

    return $integer;
}

echo romanToInt("LVIII"); // Output: 58
```

**Problem 81:**
Write a PHP function to convert an integer to a Roman numeral.

**Solution 81:**
```php
function intToRoman($num) {
    $romanNumerals = [
        1000 => 'M',
        900 => 'CM',
        500 => 'D',
        400 => 'CD',
        100 => 'C',
        90 => 'XC',
        50 => 'L',
        40 => 'XL',
        10 => 'X',
        9 => 'IX',
        5 => 'V',
        4 => 'IV',
        1 => 'I'
    ];

    $roman = "";

    foreach ($romanNumerals as $value => $symbol) {
        while ($num >= $value) {
            $roman .= $symbol;
            $num -= $value;
        }
    }

    return $roman;
}

echo intToRoman(58); // Output: "LVIII"
```

**Problem 82:**
Write a PHP function to implement a basic calculator that can evaluate expressions containing "+", "-", "*", and "/" operators, as well as parentheses.

**Solution 82:**
```php
function evaluateExpression($s) {
    $stack = new SplStack();
    $currentNumber = 0;
    $currentOperator = '+';

    for ($i = 0; $i < strlen($s); $i++) {
        $char = $s[$i];

        if (is_numeric($char)) {
            $currentNumber = $currentNumber * 10 + intval($char);
        }

        if ((!is_numeric($char) && $char !== ' ') || $i === strlen($s) - 1) {
            if ($currentOperator === '+') {
                $stack->push($currentNumber);
            } elseif ($currentOperator === '-') {
                $stack->push(-$currentNumber);
            } elseif ($currentOperator === '*') {
                $stack->push($stack->pop() * $currentNumber);
            } elseif ($currentOperator === '/') {
                $stack->push(intval($stack->pop() / $currentNumber));
            }

            $currentOperator = $char;
            $currentNumber = 0;
        }
    }

    $result = 0;

    while (!$stack->isEmpty()) {
        $result += $stack->pop();
    }

    return $result;
}

echo evaluateExpression("3+2*2"); // Output: 7
```

**Problem 83:**
Write a PHP function to find the longest palindromic substring in a string.

**Solution 83:**
```php
function longestPalindromeSubstring($s) {
    $start = 0;
    $maxLen = 0;

    for ($i = 0; $i < strlen($s); $i++) {
        $len1 = expandAroundCenter($s, $i, $i);
        $len2 = expandAroundCenter($s, $i, $i + 1);
        $len = max($len1, $len2);

        if ($len > $maxLen) {
            $maxLen = $len;
            $start = $i - intval(($len - 1) / 2);
        }
    }

    return substr($s, $start, $maxLen);
}

function expandAroundCenter($s, $left, $right) {
    while ($left >= 0 && $right < strlen($s) && $s[$left] === $s[$right]) {
        $left--;
        $right++;
    }

    return $right - $left - 1;
}

echo longestPalindromeSubstring("babad"); // Output: "bab" or "aba"
```

**Problem 84:**
Write a PHP function to reverse a linked list.

**Solution 84:**
```php
class ListNode {
    public $val;
    public $next;

    public function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}

function reverseLinkedList($head) {
    $prev = null;
    $current = $head;

    while ($current !== null) {
        $next = $current->next;
        $current->next = $prev;
        $prev = $current;
        $current = $next;
    }

    return $prev;
}

// Example usage:
$head = new ListNode(1);
$head->next = new ListNode(2);
$head->next->next = new ListNode(3);
$reversed = reverseLinkedList($head);
// $reversed is now a linked list with values 3 -> 2 -> 1
```

**Problem 85:**
Write a PHP function to merge two sorted linked lists into a new sorted linked list.

**Solution 85:**
```php
class ListNode {
    public $val;
    public $next;

    public function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}

function mergeTwoLists($l1, $l2) {
    $dummy = new ListNode();
    $current = $dummy;

    while ($l1 !== null && $l2 !== null) {
        if ($l1->val < $l2->val) {
            $current->next = $l1;
            $l1 = $l1->next;
        } else {
            $current->next = $l2;
            $l2 = $l2->next;
        }
        $current = $current->next;
    }

    if ($l1 !== null) {
        $current->next =

 $l1;
    } elseif ($l2 !== null) {
        $current->next = $l2;
    }

    return $dummy->next;
}

// Example usage:
$l1 = new ListNode(1);
$l1->next = new ListNode(2);
$l1->next->next = new ListNode(4);

$l2 = new ListNode(1);
$l2->next = new ListNode(3);
$l2->next->next = new ListNode(4);

$merged = mergeTwoLists($l1, $l2);
// $merged is now a linked list with values 1 -> 1 -> 2 -> 3 -> 4 -> 4
```

**Problem 86:**
Write a PHP function to reverse a string in-place.

**Solution 86:**
```php
function reverseString(&$s) {
    $left = 0;
    $right = strlen($s) - 1;

    while ($left < $right) {
        $temp = $s[$left];
        $s[$left] = $s[$right];
        $s[$right] = $temp;
        $left++;
        $right--;
    }
}

$string = "hello";
$charArray = str_split($string);
reverseString($charArray);
echo implode("", $charArray); // Output: "olleh"
```

**Problem 87:**
Write a PHP function to implement a queue using stacks.

**Solution 87:**
```php
class MyQueue {
    private $stack1;
    private $stack2;

    public function __construct() {
        $this->stack1 = new SplStack();
        $this->stack2 = new SplStack();
    }

    public function push($x) {
        $this->stack1->push($x);
    }

    public function pop() {
        if ($this->stack2->isEmpty()) {
            while (!$this->stack1->isEmpty()) {
                $this->stack2->push($this->stack1->pop());
            }
        }

        return $this->stack2->pop();
    }

    public function peek() {
        if ($this->stack2->isEmpty()) {
            while (!$this->stack1->isEmpty()) {
                $this->stack2->push($this->stack1->pop());
            }
        }

        return $this->stack2->top();
    }

    public function empty() {
        return $this->stack1->isEmpty() && $this->stack2->isEmpty();
    }
}

$queue = new MyQueue();
$queue->push(1);
$queue->push(2);
echo $queue->peek(); // Output: 1
echo $queue->pop(); // Output: 1
echo $queue->empty(); // Output: false
```

**Problem 88:**
Write a PHP function to implement a stack using queues.

**Solution 88:**
```php
class MyStack {
    private $queue;

    public function __construct() {
        $this->queue = new SplQueue();
    }

    public function push($x) {
        $this->queue->push($x);
        $size = $this->queue->count();

        // Rotate elements to make the recently added element at the front
        for ($i = 1; $i < $size; $i++) {
            $this->queue->push($this->queue->shift());
        }
    }

    public function pop() {
        return $this->queue->shift();
    }

    public function top() {
        return $this->queue->bottom();
    }

    public function empty() {
        return $this->queue->isEmpty();
    }
}

$stack = new MyStack();
$stack->push(1);
$stack->push(2);
echo $stack->top(); // Output: 2
echo $stack->pop(); // Output: 2
echo $stack->empty(); // Output: false
```

**Problem 89:**
Write a PHP function to perform string compression by replacing consecutive characters with their counts.

**Solution 89:**
```php
function compressString($s) {
    $compressed = "";
    $count = 1;

    for ($i = 0; $i < strlen($s); $i++) {
        if ($i < strlen($s) - 1 && $s[$i] === $s[$i + 1]) {
            $count++;
        } else {
            $compressed .= $s[$i] . $count;
            $count = 1;
        }
    }

    return (strlen($compressed) < strlen($s)) ? $compressed : $s;
}

echo compressString("aabcccccaaa"); // Output: "a2b1c5a3"
```

**Problem 90:**
Write a PHP function to perform matrix rotation (rotate the matrix 90 degrees clockwise).

**Solution 90:**
```php
function rotateMatrix($matrix) {
    $n = count($matrix);

    // Transpose the matrix
    for ($i = 0; $i < $n; $i++) {
        for ($j = $i; $j < $n; $j++) {
            $temp = $matrix[$i][$j];
            $matrix[$i][$j] = $matrix[$j][$i];
            $matrix[$j][$i] = $temp;
        }
    }

    // Reverse each row
    for ($i = 0; $i < $n; $i++) {
        $left = 0;
        $right = $n - 1;

        while ($left < $right) {
            $temp = $matrix[$i][$left];
            $matrix[$i][$left] = $matrix[$i][$right];
            $matrix[$i][$right] = $temp;
            $left++;
            $right--;
        }
    }

    return $matrix;
}

$matrix = [
    [1, 2, 3],
    [4, 5, 6],
    [7, 8, 9]
];

$rotated = rotateMatrix($matrix);
/*
$rotated is now:
[
    [7, 4, 1],
    [8, 5, 2],
    [9, 6, 3]
]
*/
```

**Problem 91:**
Write a PHP function to check if a string is a valid palindrome, considering only alphanumeric characters and ignoring cases.

**Solution 91:**
```php
function isPalindrome($s) {
    $s = strtolower(preg_replace('/[^a-zA-Z0-9]/', '', $s));
    return $s === strrev($s);
}

echo isPalindrome("A man, a plan, a canal: Panama"); // Output: true
```

**Problem 92:**
Write a PHP function to find the longest common prefix among an array of strings.

**Solution 92:**
```php
function longestCommonPrefix($strs) {
    if (empty($strs)) {
        return "";
    }

    $prefix = $strs[0];

    for ($i = 1; $i < count($strs); $i++) {
        while (strpos($strs[$i], $prefix) !== 0) {
            $prefix = substr($prefix, 0, strlen($

prefix) - 1);

            if (empty($prefix)) {
                return "";
            }
        }
    }

    return $prefix;
}

$array = ["flower", "flow", "flight"];
echo longestCommonPrefix($array); // Output: "fl"
```

**Problem 93:**
Write a PHP function to calculate the minimum depth of a binary tree (the shortest path from the root node to a leaf node).

**Solution 93:**
```php
class TreeNode {
    public $val;
    public $left;
    public $right;

    public function __construct($val = 0, $left = null, $right = null) {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}

function minDepth($root) {
    if ($root === null) {
        return 0;
    }

    if ($root->left === null && $root->right === null) {
        return 1;
    }

    $minLeft = minDepth($root->left);
    $minRight = minDepth($root->right);

    if ($root->left === null || $root->right === null) {
        return 1 + max($minLeft, $minRight);
    }

    return 1 + min($minLeft, $minRight);
}

$root = new TreeNode(3);
$root->left = new TreeNode(9);
$root->right = new TreeNode(20);
$root->right->left = new TreeNode(15);
$root->right->right = new TreeNode(7);
echo minDepth($root); // Output: 2
```

**Problem 94:**
Write a PHP function to check if a binary tree is balanced (the left and right subtrees of every node differ in height by no more than one).

**Solution 94:**
```php
class TreeNode {
    public $val;
    public $left;
    public $right;

    public function __construct($val = 0, $left = null, $right = null) {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}

function isBalanced($root) {
    return getHeight($root) !== -1;
}

function getHeight($node) {
    if ($node === null) {
        return 0;
    }

    $leftHeight = getHeight($node->left);
    $rightHeight = getHeight($node->right);

    if ($leftHeight === -1 || $rightHeight === -1 || abs($leftHeight - $rightHeight) > 1) {
        return -1;
    }

    return 1 + max($leftHeight, $rightHeight);
}

$root = new TreeNode(3);
$root->left = new TreeNode(9);
$root->right = new TreeNode(20);
$root->right->left = new TreeNode(15);
$root->right->right = new TreeNode(7);
echo isBalanced($root); // Output: true
```

**Problem 95:**
Write a PHP function to find the intersection of two linked lists.

**Solution 95:**
```php
class ListNode {
    public $val;
    public $next;

    public function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}

function getIntersectionNode($headA, $headB) {
    $nodeA = $headA;
    $nodeB = $headB;

    while ($nodeA !== $nodeB) {
        $nodeA = ($nodeA === null) ? $headB : $nodeA->next;
        $nodeB = ($nodeB === null) ? $headA : $nodeB->next;
    }

    return $nodeA;
}

// Example usage:
$commonNode = new ListNode(8);
$commonNode->next = new ListNode(4);
$commonNode->next->next = new ListNode(5);

$headA = new ListNode(4);
$headA->next = new ListNode(1);
$headA->next->next = $commonNode;

$headB = new ListNode(5);
$headB->next = new ListNode(0);
$headB->next->next = new ListNode(1);
$headB->next->next->next = $commonNode;

$intersection = getIntersectionNode($headA, $headB);
// $intersection is the common node with value 8
```

**Problem 96:**
Write a PHP function to perform binary search in a sorted array.

**Solution 96:**
```php
function binarySearch($nums, $target) {
    $left = 0;
    $right = count($nums) - 1;

    while ($left <= $right) {
        $mid = $left + intval(($right - $left) / 2);

        if ($nums[$mid] === $target) {
            return $mid;
        } elseif ($nums[$mid] < $target) {
            $left = $mid + 1;
        } else {
            $right = $mid - 1;
        }
    }

    return -1;
}

$array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$target = 5;
echo binarySearch($array, $target); // Output: 4 (index of 5 in the array)
```

**Problem 97:**
Write a PHP function to find the peak element in an array (an element which is greater than or equal to its neighbors).

**Solution 97:**
```php
function findPeakElement($nums) {
    $left = 0;
    $right = count($nums) - 1;

    while ($left < $right) {
        $mid = $left + intval(($right - $left) / 2);

        if ($nums[$mid] < $nums[$mid + 1]) {
            $left = $mid + 1;
        } else {
            $right = $mid;
        }
    }

    return $left;
}

$array = [1, 2, 3, 1];
echo findPeakElement($array); // Output: 2 (peak element is 3)
```

**Problem 98:**
Write a PHP function to find the missing number in an array containing numbers from 0 to n (inclusive) with one missing number.

**Solution 98:**
```php
function missingNumber($nums) {
    $n = count($nums);
    $expectedSum = ($n * ($n + 1)) / 2;
    $actualSum = array_sum($nums);
    return $expectedSum - $actualSum;
}

$array = [3, 0, 1];
echo missingNumber($array); // Output: 2 (missing number is 2)
```

**Problem 99:**
Write a PHP function to find the majority element in an array (element that appears more than ⌊n/2⌋ times).

**Solution 99:**
```php
function majorityElement($nums) {
    $count = 0

;
    $candidate = null;

    foreach ($nums as $num) {
        if ($count === 0) {
            $candidate = $num;
        }

        $count += ($num === $candidate) ? 1 : -1;
    }

    return $candidate;
}

$array = [3, 2, 3];
echo majorityElement($array); // Output: 3 (3 appears more than ⌊3/2⌋ times)
```

**Problem 100:**
Write a PHP function to find the first non-repeating character in a string.

**Solution 100:**
```php
function firstUniqChar($s) {
    $charCount = [];

    for ($i = 0; $i < strlen($s); $i++) {
        $char = $s[$i];
        if (isset($charCount[$char])) {
            $charCount[$char]++;
        } else {
            $charCount[$char] = 1;
        }
    }

    for ($i = 0; $i < strlen($s); $i++) {
        if ($charCount[$s[$i]] === 1) {
            return $i;
        }
    }

    return -1;
}

$string = "leetcode";
echo firstUniqChar($string); // Output: 0 (first non-repeating character is 'l')
```

These additional PHP problems and solutions bring the total count to 100 unique problems for PHP developer interview tests. Feel free to use these for interview preparation or any other purpose.