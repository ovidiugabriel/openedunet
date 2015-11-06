<?php 

class CssBoxModel /*implements IBoxModelAccess*/ 
{
    protected $width;
    protected $height;
    protected $left;
    protected $top;

    // Padding
    protected $paddingBottom;
    protected $paddingLeft;
    protected $paddingRight;
    protected $paddingTop;

    // Border
    protected $borderBottomWidth;
    protected $borderLeftWidth;
    protected $borderRightWidth;
    protected $borderTopWidth;

    // BorderRadius
    protected $borderTopLeftRadius;
    protected $borderTopRightRadius;
    protected $borderBottomLeftRadius;
    protected $borderBottomRightRadius;

    // Margin
    protected $marginBottom;
    protected $marginLeft;
    protected $marginRight;
    protected $marginTop;

    public function width()
    {
        return (float) $this->width;
    }
    
    public function setWidth($width) 
    {
        $this->width = (float) $width;
    }

    public function height()
    {
        return (float) $this->height;
    }
    
    public function setHeight($height)
    {
        $this->height = (float) $height;
    }

    public function left()
    {
        return (float) $this->left;
    }

    public function top()
    {
        return (float) $this->top;
    }

    public function paddingBottom()
    {
        return (float) $this->paddingBottom;
    }

    public function paddingLeft()
    {
        return (float) $this->paddingLeft;
    }

    public function paddingRight()
    {
        return (float) $this->paddingRight;
    }

    public function paddingTop()
    {
        return (float) $this->paddingTop;
    }

    public function borderBottomWidth()
    {
        return (float) $this->borderBottomWidth;
    }

    public function borderLeftWidth()
    {
        return (float) $this->borderLeftWidth;
    }

    public function borderRightWidth()
    {
        return (float) $this->borderRightWidth;
    }

    public function borderTopWidth()
    {
        return (float) $this->borderTopWidth;
    }

    public function borderTopLeftRadius()
    {
        return (float) $this->borderTopLeftRadius;
    }


    public function borderTopRightRadius()
    {
        return (float) $this->borderTopRightRadius;
    }

    public function borderBottomLeftRadius()
    {
        return (float) $this->borderBottomLeftRadius;
    }

    public function borderBottomRightRadius()
    {
        return (float) $this->borderBottomRightRadius;
    }

    public function marginBottom()
    {
        return (float) $this->marginBottom;
    }

    public function marginLeft()
    {
        return (float) $this->marginLeft;
    }

    public function marginRight()
    {
        return (float) $this->marginRight;
    }

    public function marginTop()
    {
        return (float) $this->marginTop;
    }
}
