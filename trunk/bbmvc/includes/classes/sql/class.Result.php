<?php

namespace sql;

/** Abstract interface for accessing data from specific SQL databases */
abstract class Result {
}

class Result_BindingSyntax {
  const NamedBinding      = 0;
  const PositionalBinding = 1;
}

class Result_VirtualHookOperation {
}
