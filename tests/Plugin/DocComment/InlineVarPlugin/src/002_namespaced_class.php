<?php

namespace MyOtherNS;

// Note: The inline var comments are parsed by this plugin. But they don't get compared against the real variables anywhere.
class SomeClass {
    public function myFunc() {
        /** @var ?MyClass $x */
        $x = null;

        /** @var ?\MyClass $y */
        $y = null;

        /** @var ?SomeClass $z */
        $z = null;

        /** @var ?\SomeClass $w */
        $w = null;

        /** @var ?\ast\Node $a */
        $a = new \ast\Node();

        /** @var ast\Node|ast\Node\Decl $b */
        $b = new \ast\Node();
    }
}
