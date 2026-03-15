<?php // lint >= 8.0

namespace NullsafeCoalesceOptionalProperty;

/** @phpstan-type Inner object{value?: string} */
final class NullsafePropertyChain
{

	/**
	 * @param object{inner?: Inner} $outer
	 */
	public function testOptionalPropertyWithNullsafe(mixed $outer): void
	{
		$outer->inner?->value ?? null;
	}

	/**
	 * @param ?object{inner: Inner} $outer
	 */
	public function testNullableVarNonOptionalProperty(mixed $outer): void
	{
		$outer?->inner->value ?? null;
	}

	/**
	 * @param object{inner?: Inner} $outer
	 */
	public function testChainedNullsafe(mixed $outer): void
	{
		$outer?->inner?->value ?? null;
	}

	/**
	 * @param object{inner?: Inner} $outer
	 */
	public function testIsset(mixed $outer): void
	{
		isset($outer->inner?->value);
	}

	/**
	 * @param object{inner?: Inner} $outer
	 */
	public function testEmpty(mixed $outer): void
	{
		empty($outer->inner?->value);
	}

	/**
	 * Recursion through ?-> : bar is non-nullable so issetCheck recurses
	 * upward past the NullsafePropertyFetch for foo.
	 *
	 * @param object{foo?: object{bar: object{baz?: string}}} $obj
	 */
	public function testRecursionThroughNullsafe(mixed $obj): void
	{
		$obj->foo?->bar->baz ?? null;
	}

	/**
	 * @param object{foo?: object{bar: object{baz?: string}}} $obj
	 */
	public function testRecursionThroughNullsafeIsset(mixed $obj): void
	{
		isset($obj->foo?->bar->baz);
	}

	/**
	 * @param object{foo?: object{bar: object{baz?: string}}} $obj
	 */
	public function testRecursionThroughNullsafeEmpty(mixed $obj): void
	{
		empty($obj->foo?->bar->baz);
	}

}
