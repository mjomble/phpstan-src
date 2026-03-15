<?php // lint >= 8.0

namespace NullsafeCoalesceOptionalProperty;

use function PHPStan\Testing\assertType;

/** @phpstan-type Inner object{value?: string} */
final class NullsafePropertyChain
{

	/**
	 * @param ?object{inner?: Inner} $outer
	 */
	public function testOptionalPropertyWithNullsafe(mixed $outer): void
	{
		if ($outer !== null) {
			assertType('string|null', $outer->inner?->value ?? null);
		}
	}

	/**
	 * @param ?object{inner: Inner} $outer
	 */
	public function testNullableVarNonOptionalProperty(mixed $outer): void
	{
		assertType('string|null', $outer?->inner->value ?? null);
	}

	/**
	 * @param ?object{inner?: Inner} $outer
	 */
	public function testChainedNullsafe(mixed $outer): void
	{
		assertType('string|null', $outer?->inner?->value ?? null);
	}

}
