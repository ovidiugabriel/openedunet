<?php

declare_namespace('sql');

/** Abstract interface for accessing data from specific SQL databases */
abstract class sql_Result {
}

class sql_Result_BindingSyntax {
    const NamedBinding      = 0;
    const PositionalBinding = 1;
}

class sql_Result_VirtualHookOperation {
    const BatchOperation        = 0;
    const DetachFromResultSet   = 1;
    const NextResult            = 2;
    const SetNumericalPrecision = 3;
}
