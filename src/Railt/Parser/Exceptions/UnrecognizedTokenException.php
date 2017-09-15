<?php
/**
 * This file is part of Railt package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace Railt\Parser\Exceptions;

use Hoa\Compiler\Exception\UnrecognizedToken;
use Railt\Support\Filesystem\ReadableInterface;

/**
 * Class UnrecognizedTokenException
 * @package Railt\Parser\Exceptions
 */
class UnrecognizedTokenException extends \ParseError implements
    GraphQLSchemaException
{
    /**
     * @var int
     */
    protected $codeLine = 0;

    /**
     * @var int
     */
    protected $codeColumn = 0;

    /**
     * @param UnrecognizedToken|\Exception $parent
     * @param ReadableInterface $file
     * @return UnrecognizedTokenException
     */
    public static function fromHoaException(UnrecognizedToken $parent, ReadableInterface $file): UnrecognizedTokenException
    {
        $self = (new static($parent->getMessage()))
            ->in($file->getPathname(), $parent->getLine())
            ->from($parent);

        $self->codeLine = $parent->getLine();
        $self->codeColumn = $parent->getColumn();

        return $self;
    }

    /**
     * @param \Throwable $previous
     * @return UnrecognizedTokenException|$this
     */
    public function from(\Throwable $previous): UnrecognizedTokenException
    {
        $this->previous = $previous;

        return $this;
    }

    /**
     * @param string $file
     * @param int $line
     * @return UnrecognizedTokenException|$this
     */
    public function in(string $file, int $line = null): UnrecognizedTokenException
    {
        $this->file = $file;

        if ($line !== null) {
            $this->line = 0;
        }

        return $this;
    }

    /**
     * @return int
     */
    public function getCodeColumn(): int
    {
        return $this->codeColumn;
    }

    /**
     * @return int
     */
    public function getCodeLine(): int
    {
        return $this->codeLine;
    }
}
