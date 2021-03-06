<?php
declare(strict_types=1);

namespace ajf\ElePHPants_Love_Coffee;

// JS int max is 32-bit, that's what bitwise operators convert to
const JS_INT_MAX = 0x7FFFFFFF;
const JS_INT_MIN = -0x80000000;

// from: Zend/zend_vm_opcodes.c:24
// as of 2016-05-07, PHP-7.0, https://github.com/php/php-src/blob/29079f263e38ebf76e2ddbd308e001639eb9e3bf/Zend/zend_vm_opcodes.c#L24
const OPCODE_NAMES = [
    "ZEND_NOP",
    "ZEND_ADD",
    "ZEND_SUB",
    "ZEND_MUL",
    "ZEND_DIV",
    "ZEND_MOD",
    "ZEND_SL",
    "ZEND_SR",
    "ZEND_CONCAT",
    "ZEND_BW_OR",
    "ZEND_BW_AND",
    "ZEND_BW_XOR",
    "ZEND_BW_NOT",
    "ZEND_BOOL_NOT",
    "ZEND_BOOL_XOR",
    "ZEND_IS_IDENTICAL",
    "ZEND_IS_NOT_IDENTICAL",
    "ZEND_IS_EQUAL",
    "ZEND_IS_NOT_EQUAL",
    "ZEND_IS_SMALLER",
    "ZEND_IS_SMALLER_OR_EQUAL",
    "ZEND_CAST",
    "ZEND_QM_ASSIGN",
    "ZEND_ASSIGN_ADD",
    "ZEND_ASSIGN_SUB",
    "ZEND_ASSIGN_MUL",
    "ZEND_ASSIGN_DIV",
    "ZEND_ASSIGN_MOD",
    "ZEND_ASSIGN_SL",
    "ZEND_ASSIGN_SR",
    "ZEND_ASSIGN_CONCAT",
    "ZEND_ASSIGN_BW_OR",
    "ZEND_ASSIGN_BW_AND",
    "ZEND_ASSIGN_BW_XOR",
    "ZEND_PRE_INC",
    "ZEND_PRE_DEC",
    "ZEND_POST_INC",
    "ZEND_POST_DEC",
    "ZEND_ASSIGN",
    "ZEND_ASSIGN_REF",
    "ZEND_ECHO",
    NULL,
    "ZEND_JMP",
    "ZEND_JMPZ",
    "ZEND_JMPNZ",
    "ZEND_JMPZNZ",
    "ZEND_JMPZ_EX",
    "ZEND_JMPNZ_EX",
    "ZEND_CASE",
    NULL,
    NULL,
    NULL,
    "ZEND_BOOL",
    "ZEND_FAST_CONCAT",
    "ZEND_ROPE_INIT",
    "ZEND_ROPE_ADD",
    "ZEND_ROPE_END",
    "ZEND_BEGIN_SILENCE",
    "ZEND_END_SILENCE",
    "ZEND_INIT_FCALL_BY_NAME",
    "ZEND_DO_FCALL",
    "ZEND_INIT_FCALL",
    "ZEND_RETURN",
    "ZEND_RECV",
    "ZEND_RECV_INIT",
    "ZEND_SEND_VAL",
    "ZEND_SEND_VAR_EX",
    "ZEND_SEND_REF",
    "ZEND_NEW",
    "ZEND_INIT_NS_FCALL_BY_NAME",
    "ZEND_FREE",
    "ZEND_INIT_ARRAY",
    "ZEND_ADD_ARRAY_ELEMENT",
    "ZEND_INCLUDE_OR_EVAL",
    "ZEND_UNSET_VAR",
    "ZEND_UNSET_DIM",
    "ZEND_UNSET_OBJ",
    "ZEND_FE_RESET_R",
    "ZEND_FE_FETCH_R",
    "ZEND_EXIT",
    "ZEND_FETCH_R",
    "ZEND_FETCH_DIM_R",
    "ZEND_FETCH_OBJ_R",
    "ZEND_FETCH_W",
    "ZEND_FETCH_DIM_W",
    "ZEND_FETCH_OBJ_W",
    "ZEND_FETCH_RW",
    "ZEND_FETCH_DIM_RW",
    "ZEND_FETCH_OBJ_RW",
    "ZEND_FETCH_IS",
    "ZEND_FETCH_DIM_IS",
    "ZEND_FETCH_OBJ_IS",
    "ZEND_FETCH_FUNC_ARG",
    "ZEND_FETCH_DIM_FUNC_ARG",
    "ZEND_FETCH_OBJ_FUNC_ARG",
    "ZEND_FETCH_UNSET",
    "ZEND_FETCH_DIM_UNSET",
    "ZEND_FETCH_OBJ_UNSET",
    "ZEND_FETCH_LIST",
    "ZEND_FETCH_CONSTANT",
    NULL,
    "ZEND_EXT_STMT",
    "ZEND_EXT_FCALL_BEGIN",
    "ZEND_EXT_FCALL_END",
    "ZEND_EXT_NOP",
    "ZEND_TICKS",
    "ZEND_SEND_VAR_NO_REF",
    "ZEND_CATCH",
    "ZEND_THROW",
    "ZEND_FETCH_CLASS",
    "ZEND_CLONE",
    "ZEND_RETURN_BY_REF",
    "ZEND_INIT_METHOD_CALL",
    "ZEND_INIT_STATIC_METHOD_CALL",
    "ZEND_ISSET_ISEMPTY_VAR",
    "ZEND_ISSET_ISEMPTY_DIM_OBJ",
    "ZEND_SEND_VAL_EX",
    "ZEND_SEND_VAR",
    "ZEND_INIT_USER_CALL",
    "ZEND_SEND_ARRAY",
    "ZEND_SEND_USER",
    "ZEND_STRLEN",
    "ZEND_DEFINED",
    "ZEND_TYPE_CHECK",
    "ZEND_VERIFY_RETURN_TYPE",
    "ZEND_FE_RESET_RW",
    "ZEND_FE_FETCH_RW",
    "ZEND_FE_FREE",
    "ZEND_INIT_DYNAMIC_CALL",
    "ZEND_DO_ICALL",
    "ZEND_DO_UCALL",
    "ZEND_DO_FCALL_BY_NAME",
    "ZEND_PRE_INC_OBJ",
    "ZEND_PRE_DEC_OBJ",
    "ZEND_POST_INC_OBJ",
    "ZEND_POST_DEC_OBJ",
    "ZEND_ASSIGN_OBJ",
    "ZEND_OP_DATA",
    "ZEND_INSTANCEOF",
    "ZEND_DECLARE_CLASS",
    "ZEND_DECLARE_INHERITED_CLASS",
    "ZEND_DECLARE_FUNCTION",
    "ZEND_YIELD_FROM",
    "ZEND_DECLARE_CONST",
    "ZEND_ADD_INTERFACE",
    "ZEND_DECLARE_INHERITED_CLASS_DELAYED",
    "ZEND_VERIFY_ABSTRACT_CLASS",
    "ZEND_ASSIGN_DIM",
    "ZEND_ISSET_ISEMPTY_PROP_OBJ",
    "ZEND_HANDLE_EXCEPTION",
    "ZEND_USER_OPCODE",
    "ZEND_ASSERT_CHECK",
    "ZEND_JMP_SET",
    "ZEND_DECLARE_LAMBDA_FUNCTION",
    "ZEND_ADD_TRAIT",
    "ZEND_BIND_TRAITS",
    "ZEND_SEPARATE",
    "ZEND_FETCH_CLASS_NAME",
    "ZEND_CALL_TRAMPOLINE",
    "ZEND_DISCARD_EXCEPTION",
    "ZEND_YIELD",
    "ZEND_GENERATOR_RETURN",
    "ZEND_FAST_CALL",
    "ZEND_FAST_RET",
    "ZEND_RECV_VARIADIC",
    "ZEND_SEND_UNPACK",
    "ZEND_POW",
    "ZEND_ASSIGN_POW",
    "ZEND_BIND_GLOBAL",
    "ZEND_COALESCE",
    "ZEND_SPACESHIP",
    "ZEND_DECLARE_ANON_CLASS",
    "ZEND_DECLARE_ANON_INHERITED_CLASS",
];

foreach (OPCODE_NAMES as $number => $name) {
    if ($name !== NULL) {
        define('ajf\ElePHPants_Love_Coffee\\' . $name, $number);
    }
}
unset($number, $name);

// from: Zend/zend_types.h:287
const IS_UNDEF      = 0;
const IS_NULL       = 1;
const IS_FALSE      = 2;
const IS_TRUE       = 3;
const IS_LONG       = 4;
const IS_DOUBLE     = 5;
const IS_STRING     = 6;
const IS_ARRAY      = 7;
const IS_OBJECT     = 8;
const IS_RESOURCE   = 9;
const IS_REFERENCE  = 10;
