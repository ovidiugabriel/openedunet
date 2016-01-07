

/* ************************************************************************* */
/*                                                                           */
/*  Title:       webapp_chf.php                                              */
/*                                                                           */
/*  Created on:  07.01.2016 at 11:53:40                                      */
/*  Email:       ovidiugabriel@gmail.com                                     */
/*  Copyright:   (C) 2016 ICE Control srl. All Rights Reserved.              */
/*                                                                           */
/*  $Id$                                                                     */
/*                                                                           */
/* ************************************************************************* */

/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
/* History (Start).                                                          */
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
/*                                                                           */
/* Date         Name    Reason                                               */
/* ------------------------------------------------------------------------- */
/*                                                                           */
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
/* History (END).                                                            */
/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

/*                                                                           */
/* INCLUDE FILES (DEPENDENCIES)                                              */
/*                                                                           */

/*                                                                           */
/* USER DEFINED INCLUDES                                                     */
/*                                                                           */

#if !defined(_SCH_)
    #include <stdio.h>
    #include <stdlib.h>
    #include <string.h>
    #include <math.h>
#endif

/*                                                                           */
/* USER DEFINED CONSTANTS                                                    */
/*                                                                           */

#if !defined(_SCH_)
    #define NaN  FP_NAN
#endif

//
// MACROS
//

#define FP_CALLBACK(p)  ((FP) (p))

#define COUNT(x)        ((ssize_t)(sizeof(x)/sizeof((x)[0])))
#define UCOUNT(x)       (sizeof(x)/sizeof((x)[0]))

/**
 * A deferred-shape array is an array pointer or an allocatable array. 
 */
#if defined(_CH_)
    /* Deferred-shape array is created with the syntax of the language */
    #define CREATE_DEFERRED_SHAPE_ARRAY(type, name, num)    type name[0:(num)-1]
    #define strtok_foreach(token, str, _a, delim)           foreach (token; str; _a; delim)  
#else
   /* 
     * Deferred-shape array is created with dynamic allocation of the operating system.
     * When using this, always use RAII pattern. (http://en.wikipedia.org/wiki/Resource_Acquisition_Is_Initialization)
     */
    #define CREATE_DEFERRED_SHAPE_ARRAY(type, name, num)    type* name = (type*) malloc((num) * sizeof(type))
    #define strtok_foreach(token, str, _a, delim)
#endif

/*                                                                           */
/* TYPES                                                                     */
/*                                                                           */

typedef void* (*FP) (...);
typedef void (*ArrayMapCallback)(double* result, string_t* values, int index);

/*                                                                           */
/* --- PUBLIC OPERATIONS (GLOBAL FUNCTIONS PROTOTYPES) ---                   */
/*                                                                           */

bool request_scalar(string_t& result, string_t name);
void parse_str(string_t str, string_t names[], string_t values[]);
int parse_string_count(string_t str);
int str_array_search(string_t needle, string_t haystack[], int num);
int request_array(string_t key, string_t*& vals);
double doubleval(string_t str);
void get_double_values(double* result, string_t* values, int num);
void array_map(void* result, FP callback, void* values, int count);
void double_value_array(double* result, string_t* values, int index);

/*                                                                           */
/* --- GLOBAL VARIABLES ---                                                  */
/*                                                                           */

CServer     Server;
CResponse   Response;
CRequest    Request;
CCookie     Cookie;

/*                                                                           */
/* --- PUBLIC OPERATIONS (GLOBAL FUNCTIONS IMPLEMENTATION) ---               */
/*                                                                           */

bool request_scalar(string_t& result, string_t name)
{
    string_t query_string = Request.getServerVariable("QUERY_STRING");
    int num = parse_string_count(query_string);
    if (num > 0) {
        CREATE_DEFERRED_SHAPE_ARRAY( string_t, names, num );
        CREATE_DEFERRED_SHAPE_ARRAY( string_t, values, num );

        parse_str(query_string, names, values);

        int pos = str_array_search(name, names, num);
        result = values[pos];
        return true;
    }
    return false;
}

void parse_str(string_t str, string_t names[], string_t values[])
{
    int pos = 0;
    string_t token;
    string_t n;
    int i = 0;

    strtok_foreach (token, str, NULL, "&") {
        strtok_foreach (n, token, NULL, "=") {
            if (!i) {
                strcpy(names[pos], n);
            } else {
                strcpy(values[pos], n);
            }
            i = !i;
        }
        pos++;
    }
}

int parse_string_count(string_t str)
{
    int pos = 0;
    string_t token;
    strtok_foreach (token, str, NULL, "&") {    
        pos++;
    }
    return pos;
}

int str_array_search(string_t needle, string_t haystack[], int num)
{
    int pos;
    for (pos = 0; pos < num; pos++)
    {
        if (0 == strcmp(needle, haystack[pos]))
        {
            return pos;            
        }
    }
    return -1;
}

int request_array(string_t key, string_t*& vals)
{
    strcat(key, "[]");
    return Request.getForms(key, vals);
}

double doubleval(string_t str)
{
    double v = NaN;
    sscanf(str, "%lf", &v);
    return v;
}

void get_double_values(double* result, string_t* values, int num)
{ 
    int i;
    for (i = 0; i < num; ++i)
    {
        result[i] = doubleval(values[i]);
    }
}

void array_map(void* result, FP callback, void* values, int count)
{
    int i;
    for (i = 0; i < count; ++i)
    {
        callback(result, values, i);
    }
}

void double_value_array(double* result, string_t* values, int index)
{
    result[index] = doubleval(values[index]);
}

void var_dump_double(double* var, int num)
{
    int i;
    printf("[");
    for(i = 0; i < num; i++)
    {        
        printf("%g", var[i]);
        if (i < num-1) {
            printf(", ");
        }
    }
    printf("]\n");
}

void println(string_t text) 
{
    printf("%s\n", text);
}
