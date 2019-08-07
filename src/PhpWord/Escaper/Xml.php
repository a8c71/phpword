<?php
/**
 * This file is part of PHPWord - A pure PHP library for reading and writing
 * word processing documents.
 *
 * PHPWord is free software distributed under the terms of the GNU Lesser
 * General Public License version 3 as published by the Free Software Foundation.
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code. For the full list of
 * contributors, visit https://github.com/PHPOffice/PHPWord/contributors.
 *
 * @see         https://github.com/PHPOffice/PHPWord
 * @copyright   2010-2017 PHPWord contributors
 * @license     http://www.gnu.org/licenses/lgpl.txt LGPL version 3
 */

namespace PhpOffice\PhpWord\Escaper;

/**
 * @since 0.13.0
 *
 * @codeCoverageIgnore
 */
class Xml extends AbstractEscaper
{
    protected function escapeSingleValue($input)
    {
        $escaped = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');

                // we don't want to escape the newline code, so we replace it with html tag again
        $escaped_but_newlines_allowed = str_replace('&lt;/w:t&gt;&lt;w:br/&gt;&lt;w:t&gt;', '</w:t><w:br/><w:t>', $escaped);
        return $escaped_but_newlines_allowed;
    }
}
