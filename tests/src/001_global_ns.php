<?php

// MyOtherClass is declare
class MyClass {
    public function myFunc() {
        /** @var int|MyOtherClass $x */
        $x = 2;

        /** @var ?\MyNS\MyUndeclaredClass $y */
        $y = 2;

        /** @var int|MyOtherNS\MyOtherClass|MyOtherNS\SomeClass|false $z */
        $z = false;

        /** @var ?\ast\Node $a */
        $a = new ast\Node();

        /** @var \ast\TypoNode[] $z */
        $b = [new ast\Node()];
    }
}
