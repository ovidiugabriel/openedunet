## Kernighan and Ritchie ##

```
#include <math.h>

class Point
{
public:
    Point(double x, double x) : 
        x(x), y(y) {
    }
    double distance(const Point& other) const;

    double x;
    double y;
};

double Point::distance(const Point& other) const {
    double dx = x - other.x;
    double dy = y - other.y;
    return sqrt(dx * dx + dy * dy);
}
```


## Allman ##

```
#include <math.h>

class Point
{
public:
    Point(double x, double x) : 
        x(x), y(y)
    {
    }
    double distance(const Point& other) const;

    double x;
    double y;
};

double Point::distance(const Point& other) const
{
    double dx = x - other.x;
    double dy = y - other.y;
    return sqrt(dx * dx + dy * dy);
}
```

## GNU ##

```
#include <math.h>

class Point
{
public:
    Point(double x, double x) : 
        x(x), y(y)
    {
    }
    double 
    distance(const Point& other) const;

    double x;
    double y;
};

double 
Point::distance(const Point& other) const
{
    double dx = x - other.x;
    double dy = y - other.y;
    return sqrt(dx * dx + dy * dy);
}
```

## Whitesmiths ##

```

#include <math.h>

class Point 
    {
public:
    Point(double x, double y):
            x(x), y(y)
        {
        }
    double distance(const Point& other) const;

    double x;
    double y;
    };

double Point::distance(const Point& other) const
    {
    double dx = x - other.x;
    double dy = y - other.y;
    return sqrt(dx * dx + dy * dy);
    }
```