<?php

namespace spec\Phunkie\Cats;

use PhpSpec\ObjectBehavior;

use Phunkie\Cats\Free;
use Phunkie\Cats\Free\Pure;
use Phunkie\Cats\Free\Suspend;
use Phunkie\Cats\Free\Bind;

class FreeSpec extends ObjectBehavior
{
    function it_implements_pure()
    {
        $this->beAnInstanceOf(Pure::class);
        $this->beConstructedWith(42);
        $this->shouldBeLike(Free::pure(42));
    }

    function it_implements_liftM()
    {
        $this->beAnInstanceOf(Suspend::class);
        $this->beConstructedWith(Some(42));
        $this->shouldBeLike(Free::liftM(Some(42)));
    }

    function it_implements_flatMap()
    {
        $this->beAnInstanceOf(Suspend::class);
        $this->beConstructedWith(Some(42));
        $this->flatMap(function($x) {
            return Free::liftM(Some($x + 1));
        })->shouldHaveType(Bind::class);
    }
}
