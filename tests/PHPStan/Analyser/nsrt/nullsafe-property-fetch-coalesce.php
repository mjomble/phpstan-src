<?php declare(strict_types = 1);

namespace NullsafePropertyFetchCoalesce;

use function PHPStan\Testing\assertType;

/**
 * @param object{inner?: object{value?: string}} $outer
 */
function testCoalesce($outer): void {
	assertType('string|null', $outer->inner?->value ?? null);
}

/**
 * @param object{name?: string}|null $obj
 */
function testNullsafeCoalesce($obj): void {
	assertType('string', $obj?->name ?? 'default');
}
