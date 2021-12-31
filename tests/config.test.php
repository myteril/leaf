<?php

test('centralized config before init', function () {
	$testMode = 'down';

	\Leaf\Config::set('mode', $testMode);

	$appMode = app()->config('mode');

	expect($appMode)->toBe($testMode);
});

test('centralized config after init', function () {
	$testMode = 'down';

	app()->config('mode', $testMode);

	$appMode = \Leaf\Config::get('mode');

	expect($appMode)->toBe($testMode);
});

test('nested config', function () {
	app()->config('app.key', '2');

	$appConfig = app()->config('app');

	expect(isset($appConfig['key']))->toBeTrue();
	expect($appConfig['key'])->toBe('2');
	expect(app()->config('app.key'))->toBe('2');
});
