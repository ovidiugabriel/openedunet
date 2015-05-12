<?php 

class CssBoxModel implements IBoxModelAccess {
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

    public function getWidth()
    {
        return (float) $this->width;
    }
    
    public function setWidth($width) 
    {
        $this->width = (float) $width;
    }

    public function getHeight()
    {
        return (float) $this->height;
    }
    
    public function setHeight($height)
    {
        $this->height = (float) $height;
    }

    public function getLeft()
    {
        return (float) $this->left;
    }

    public function getTop()
    {
        return (float) $this->top;
    }

    public function getPaddingBottom()
    {
        return (float) $this->paddingBottom;
    }

    public function getPaddingLeft()
    {
        return (float) $this->paddingBottom;
    }

    public function getPaddingRight()
    {
        return (float) $this->paddingRight;
    }

    public function getPaddingTop()
    {
        return (float) $this->paddingTop;
    }

    public function getBorderBottomWidth()
    {
        return (float) $this->borderBottomWidth;
    }

    public function getBorderLeftWidth()
    {
        return (float) $this->borderLeftWidth;
    }

    public function getBorderRightWidth()
    {
        return (float) $this->borderRightWidth;
    }

    public function getBorderTopWidth()
    {
        return (float) $this->borderTopWidth;
    }

    public function getBorderTopLeftRadius()
    {
        return (float) $this->borderTopLeftRadius;
    }


    public function getBorderTopRightRadius()
    {
        return (float) $this->borderTopRightRadius;
    }

    public function getBorderBottomLeftRadius()
    {
        return (float) $this->borderBottomLeftRadius;
    }

    public function getBorderBottomRightRadius()
    {
        return (float) $this->borderBottomRightRadius;
    }

    public function getMarginBottom()
    {
        return (float) $this->marginBottom;
    }

    public function getMarginLeft()
    {
        return (float) $this->marginLeft;
    }

    public function getMarginRight()
    {
        return (float) $this->marginRight;
    }

    public function getMarginTop()
    {
        return (float) $this->marginTop;
    }
}
