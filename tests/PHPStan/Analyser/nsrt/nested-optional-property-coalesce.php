<?php declare(strict_types = 1);

namespace NestedOptionalPropertyCoalesce;

use function PHPStan\Testing\assertType;

class Foo
{

	/**
	 * @param object{inner?: object{value?: string}} $outer
	 */
	public function testCoalesce($outer): void
	{
		assertType('string|null', $outer->inner->value ?? null);
	}

	/**
	 * @param object{inner?: object{value?: string}} $outer
	 */
	public function testIsset($outer): void
	{
		assertType('bool', isset($outer->inner->value));
	}

	/**
	 * @param object{inner: object{value?: string}} $outer
	 */
	public function testRequiredInnerOptionalValue($outer): void
	{
		assertType('string|null', $outer->inner->value ?? null);
	}

	/**
	 * @param object{inner?: object{value: string}} $outer
	 */
	public function testOptionalInnerRequiredValue($outer): void
	{
		assertType('string|null', $outer->inner->value ?? null);
	}

}
