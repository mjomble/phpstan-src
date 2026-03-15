<?php // lint >= 8.0

namespace NullsafeCoalesceOptionalProperty;

/** @phpstan-type Inner object{value?: string} */
final class NullsafePropertyChain
{

	/**
	 * @param ?object{inner?: Inner} $outer
	 */
	public function testOptionalPropertyWithNullsafe(mixed $outer): void
	{
		if ($outer !== null) {
			$outer->inner?->value ?? null;
		}
	}

	/**
	 * @param ?object{inner: Inner} $outer
	 */
	public function testNullableVarNonOptionalProperty(mixed $outer): void
	{
		$outer?->inner->value ?? null;
	}

	/**
	 * @param ?object{inner?: Inner} $outer
	 */
	public function testChainedNullsafe(mixed $outer): void
	{
		$outer?->inner?->value ?? null;
	}

	/**
	 * @param ?object{inner?: Inner} $outer
	 */
	public function testIsset(mixed $outer): void
	{
		if ($outer !== null) {
			isset($outer->inner?->value);
		}
	}

	/**
	 * @param ?object{inner?: Inner} $outer
	 */
	public function testEmpty(mixed $outer): void
	{
		if ($outer !== null) {
			empty($outer->inner?->value);
		}
	}

}
