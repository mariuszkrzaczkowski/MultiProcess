<?php

require_once __DIR__ . '/bootstrap.php';

$i=0;
$t = microtime(1);
while($i<100){
    Mutilprocessing\Async::create()->start('task.php', ['run测试'.$i]);
    ++$i;
}
$t2 = microtime(1);
echo 'time: ',$t2-$t ,PHP_EOL;
$outData = [];
Mutilprocessing\Async::wait(function($code, $out, $err) use(&$outData) {
    $outData[] = $out;
});
var_dump($outData);


echo 'time: ',microtime(1)-$t2, PHP_EOL;

