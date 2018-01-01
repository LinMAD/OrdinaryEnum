# OrdinaryEnum
    'Ordinary' enum it's another implementation for PHP, but with one difference - simple as it's possible.

#### Where to and why to use
I recommend to use when need to construct some think in strict way, so for that comes Enum type.
You define in some class in constructor or method a Enum class with will wait a const value form child of enum class.
In that case you will control code and reduce dummy switch\if's in your code to validate states or string values etc.

### How it works and how to use
Easy as possible, you crates some class and extends for Orinary's Enum class, then defines needed const values.
Like that:

```php
class StoreEnum extends Enum
{
  public const __default = self::GROCERY;
  public const GROCERY   = Grocery::class;
  public const COSMETIC  = Cosmetic::class;
}
```

So as you see it's easy to create list of controlled values, so it will help ya to keep cleaner your code with dependencies.

Example:
```php
...
// Let's imagine you have fabric with stores
$fruitStore = $this->storeFabric()->create(StoreEnum::GROCERY);
...
// Now let's see how can be used Enum in create method
...
public function create(Enum $storeType): StoreInterface
{
  try {
    $storeType = new StoreEnum($type);
  } catch(InvalidEnumTypeException $e) {
    throw new \RuntimeException('Unable to create store from factory');
  }

   return new $storeType->getValue();
}
...
```

That's it, you define objects and provide them or handling errors, light and simple.

P.s. From me, that implementation I'm using in different web services and client library's to keep more controllable code and reduce errors with ungiven values as expected.
