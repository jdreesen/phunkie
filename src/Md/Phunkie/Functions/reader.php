<?php

namespace {
    use Md\Phunkie\Cats\Reader;

    function Reader(callable $run)
    {
        return new Reader($run);
    }
}

namespace Md\Phunkie\Functions\reader {

    use const Md\Phunkie\Functions\function1\identity;

    const ask = "Md\\Phunkie\\Functions\\reader\\ask";
    function ask()
    {
        return Reader(identity);
    }
}