--TEST--
Test V8::executeString() : Script validator test
--SKIPIF--
<?php require_once(dirname(__FILE__) . '/skipif.inc'); ?>
--FILE--
<?php

$v8 = new V8Js();
var_dump($v8->checkString('print("Hello World!");'));

try {
	var_dump($v8->checkString('print("Hello World!);'));
} catch (V8JsScriptException $e) {
	var_dump($e->getMessage());
}
?>
===EOF===
--EXPECT--
bool(true)
string(60) "V8Js::checkString():1: SyntaxError: Unexpected token ILLEGAL"
===EOF===
