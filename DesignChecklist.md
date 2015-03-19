
```
public class ClassName {
    public int AttributeName;
    public int OperationName();
}

```

## Class ##

  1. Does the name `ClassName` clearly describe the class?
  1. Is `ClassName` a noun or a noun phrase?
  1. Could the name `ClassName` be misinterpreted to mean something else?
  1. Does `ClassName` be its own class or a simple attribute of another class?
  1. Does `ClassName` do exactly one thing and do it well?
  1. Could `ClassName` be broken down in two or more classes?
  1. Do all attributes of `ClassName` start with meaningful values?
  1. Could you write an invariant for this class?
  1. Do all constructors establish the class invariant?
  1. Do all operations maintain the class invariant?
  1. Could `ClassName` be defined in a different location in the class hierarchy?
  1. Have you planned to have subclasses of `ClassName`?
  1. Could `ClassName` be eliminated from the model?
  1. Is there another class in the model that should be revised or eliminated because it serves the same purpose as `ClassName`?
  1. For what reasons will an instance of `ClassName` be updated?
  1. Is there some other object that must be updated whenever `ClassName` is updated?

## Operation ##

  1. Does the name `OperationName` clearly describe the operation?
  1. Is `OperationName` a verb or verb phrase?
  1. Could the name `OperationName` be misinterpreted to mean something else?
  1. Does `OperationName` do one thing and do it well?
  1. Is the return type too restrictive to represent all possible values returned by `OperationName`?
  1. Does the return type allow return values that could never be correct?
  1. Could `OperationName` be combined with some other operation of `ClassName`?
  1. Could `OperationName` be broken down into two or more parts (preprocess, main processing, postprocessing, etc)?
  1. Could `OperationName` be replaced by a series of client calls to simpler operations?
  1. Could `OperationName` be combined with other operations to reduce the number of calls clients must make?
  1. Can `OperationName` handle all possible inputs?
  1. Are there special case inputs that must be handled separately?
  1. Could you write an expression to check if the arguments fo `OperationName` are correct? Plausible?
  1. Can you express the preconditions of `OperationName`?
  1. Can you express the postconditions of `OperationName`?
  1. How will `OperationName` behave if preconditions are violated?
  1. How will `OperationName` behave if postconditions cannot be achieved?
  1. Could `OperationName` be defined in a different class that is associated with `ClassName`?
  1. Could `OperationName` be moved up the inheritance hierarchy to apply to `ClassName` and to other classes?
  1. Does `OpeartionName` apply to all instances of class `ClassName` including instances of subclasses?
  1. Could `OperationName` be eliminated from the model?
  1. Is there another operation in the model that should be revised or eliminated beacause it serves the same purpose as `OperationName`?

## Attribute ##

  1. Does the name `AttributeName` clearly describe the attribute?
  1. Is `AttributeName` a noun or noun phrase?
  1. Could the name `AttributeName` be misinterpreted to mean something else?
  1. Is the type too restrictive to represent all possible values of `AttributeName`?
  1. Does the type allow values for `AttributeName` that could never be correct?
  1. Could `AttributeName` be combined with some other attribute of `ClassName` ?
  1. Could `AttributeName` be broken down into two more parts (a phone number can be broken down into area code, prefix, and number)?
  1. Could `AttributeName` be computed from other attributes instead of stored?
  1. Should `AttributeName` have an initial (or default) value?
  1. Is the initial value correct?
  1. Could you write an expression to check if `AttrbuteName` is correct? Plausible?
  1. Could `AttributeName` be defined in a different class that is associated with `ClassName`?
  1. Could `AtrributeName` be moved up the inheritance hierarchy to apply to `AttributeName` and to other classes?
  1. Does `AttributeName` apply to all instances of class `ClassName` including instances of subclasses?
  1. Could `AttrbiuteName` be eliminated from the model?
  1. Is there another attribute in the model that should be revised or eliminated because it serves the same purpose as `AttributeName`?
  1. For what reasons will `AttrbiuteName` be updated?
  1. Is there some other attribute that must be updated whenever `AttributeName` is updated?
  1. Is there a method that should be called when `AttributeName` is updated?
  1. Is there a method that should be called when `AttributeName` is given a certain kind of value?