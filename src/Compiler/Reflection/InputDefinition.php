<?php
/**
 * This file is part of Railgun package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace Serafim\Railgun\Compiler\Reflection;
use Hoa\Compiler\Llk\TreeNode;
use Serafim\Railgun\Compiler\Autoloader;
use Serafim\Railgun\Compiler\Dictionary;

/**
 * Class InputDefinition
 * @package Serafim\Railgun\Compiler\Reflection
 */
class InputDefinition extends Definition
{
    /**
     * @return string
     */
    public static function getType(): string
    {
        return 'Input';
    }

    /**
     * @return string
     */
    public static function getAstId(): string
    {
        return '#InputDefinition';
    }

    /**
     * @internal
     * @param TreeNode $node
     * @param Dictionary $dictionary
     * @return void
     */
    public function compile(TreeNode $node, Dictionary $dictionary): void
    {
        // TODO: Implement compile() method.
    }
}