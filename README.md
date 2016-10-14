1. Copy the following files and folder to project root
- tests\
- composer.json
- composer.lock
- phpunit.php
- phpunit.xml
2. Open command line, cd into project root directory, run:
~~~
composer install
~~~
3. Modify the following files
- application/hooks/pre_controller.php
~~~
public function do_authenticate() {
    
    // Add this at the beginning of function do_authenticate()
    if (is_cli()) {
        return;
    }
~~~

- system/core/CodeIgniter.php
~~~
// Replace the lines start with '-' by the lines start with '+'

-   $BM =& load_class('Benchmark', 'core');
+   $GLOBALS['BM'] = $BM =& load_class('Benchmark', 'core');

-   $CFG =& load_class('Config', 'core');
+   $GLOBALS['CFG'] = $CFG =& load_class('Config', 'core');

-    $UNI =& load_class('Utf8', 'core');
+    $GLOBALS['UNI'] = $UNI =& load_class('Utf8', 'core');

-    $RTR =& load_class('Router', 'core', isset($routing) ? $routing : NULL);
+    $GLOBALS['RTR'] = $RTR =& load_class('Router', 'core');

-    $SEC =& load_class('Security', 'core');
+    $GLOBALS['SEC'] = $SEC =& load_class('Security', 'core');

-    $LANG =& load_class('Lang', 'core');
+    $GLOBALS['LANG'] = $LANG =& load_class('Lang', 'core');

-    $CI = new $class();
+    $GLOBALS['CI'] = $CI = new $class();
~~~

4. Run tests by command:
~~~
phpunit tests/application/models/Sales_slip_model_Test.php
~~~