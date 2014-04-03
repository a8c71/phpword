<?php
/**
 * PHPWord
 *
 * @link        https://github.com/PHPOffice/PHPWord
 * @copyright   2014 PHPWord
 * @license     http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt LGPL
 */

namespace PhpOffice\PhpWord\Element;

use PhpOffice\PhpWord\Element\Row;
use PhpOffice\PhpWord\Style\Table as TableStyle;
/**
 * Table element
 */
class Table extends Element
{
    /**
     * Table style
     *
     * @var TableStyle
     */
    private $style;

    /**
     * Table rows
     *
     * @var array
     */
    private $rows = array();

    /**
     * Table holder
     *
     * @var string
     */
    private $docPart = null;

    /**
     * Table holder count
     *
     * @var array
     */
    private $docPartId;

    /**
     * Table width
     *
     * @var int
     */
    private $width = null;


    /**
     * Create a new table
     *
     * @param string $docPart
     * @param int $docPartId
     * @param mixed $style
     */
    public function __construct($docPart, $docPartId, $style = null)
    {
        $this->docPart = $docPart;
        $this->docPartId = $docPartId;
        $this->style = $this->setStyle(new TableStyle(), $style);
    }

    /**
     * Add a row
     *
     * @param int $height
     * @param mixed $style
     */
    public function addRow($height = null, $style = null)
    {
        $row = new Row($this->docPart, $this->docPartId, $height, $style);
        $this->rows[] = $row;
        return $row;
    }

    /**
     * Add a cell
     *
     * @param int $width
     * @param mixed $style
     * @return \PhpOffice\PhpWord\Element\Cell
     */
    public function addCell($width = null, $style = null)
    {
        $i = count($this->rows) - 1;
        $cell = $this->rows[$i]->addCell($width, $style);
        return $cell;
    }

    /**
     * Get all rows
     *
     * @return array
     */
    public function getRows()
    {
        return $this->rows;
    }

    /**
     * Get table style
     *
     * @return TableStyle
     */
    public function getStyle()
    {
        return $this->style;
    }

    /**
     * Set table width
     *
     * @param int $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * Get table width
     *
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }
}