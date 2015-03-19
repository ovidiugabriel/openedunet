There are several forms of pattern matching:
  * matching objects of the same type;

```
trait PatternMatching {
    public nulltype match(list entries);
}
```

```
interface IDefault {
    public boolean is_default();
}
```

### Example 1 ###

Matching objects of the same type

```
$alice   = new Person("Alice", 25);
$bob     = new Person("Bob", 32);
$charlie = new Person("Charlie", 32);

foreach ([$alice, $bob, $charlie] as $person) {
    $person->match([
            [new Person("Alice", 25), function() { println("Hi Alice!"); }],
            [new Person("Bob", 32),   function() { println('Hi Bob!'); }],
            [new Person(),            function($object) {
                println("Age: $object->age year, name: $object->name");  }]
        ]);
}

```

```
class Person implements IDefault {
    use PatternMatching;

    public function __construct($name = null, $age = null)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function is_default() {
        return (null === $this->name) && (null === $this->age);
    }
}
```