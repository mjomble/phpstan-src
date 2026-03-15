<?php declare(strict_types = 1);

namespace NullsafePropertyFetchIssetCoalesce;

class Foo
{
	/**
	 * @param object{inner?: object{value?: string}} $outer
	 */
	public function testCoalesce($outer): void
	{
		$outer->inner?->value ?? null;
	}

	/**
	 * @param object{inner?: object{value?: string}} $outer
	 */
	public function testIsset($outer): void
	{
		isset($outer->inner?->value);
	}

	/**
	 * @param object{inner?: object{value?: string}} $outer
	 */
	public function testEmpty($outer): void
	{
		empty($outer->inner?->value);
	}
}
