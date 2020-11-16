<?php

require_once('assertComponent.php');
require_once('directoryReaderComponent.php');


// tests

// non-existing path
$expRes = null;
assertComponent($expRes,getDirectoryStatus('nonExistingDir'),'Non-existing path in arg. returns null '); // TEST 1

// clear dir /testingDir/dirTwo
$expRes =
    ['dirs' => [],
     'files' => []
    ];

assertComponent($expRes,getDirectoryStatus('.\\testingDir\\dirTwo'),'clear directory '); // TEST 2

// simple dir /testingDir/dirOne
$expRes =
    ['dirs' => [
        'folder1' => [
            'isReadable' => true,
            'isWritable' => true,
        ],
        'folder2' => [
            'isReadable' => true,
            'isWritable' => true,
        ],
    ],

     'files' => [
         'half-life3.exe' => [
             'isReadable' => true,
             'isWritable' => true,
             'size' => 20,
         ],

         'someSecret.txt' => [
             'isReadable' => true,
             'isWritable' => true,
             'size' => 25,
         ],
     ],

    ];

assertComponent($expRes,getDirectoryStatus('.\\testingDir\\dirOne'),'simple directory '); // TEST 3

/*
 * Создадим новый файл в пустой директории testingDir/dirTwo, запишем в него информацию и заберем все права
 * проверим функцию is_writable для этого файла
 */

$testFilePath = ".\\testingDir\\dirTwo\\testFile.txt"; // путь до эксперементального файла
$file = fopen($testFilePath,'w') or die("Can't open new file for writing"); // открыли поток на запись
fwrite($file,'TestLine');
fclose($file); // записали тестовые данные и закрыли

chmod($testFilePath,0000); // забрали все права у всех пользователей

echo is_writable($testFilePath);

$expRes =
    ['dirs' => [],
     'files' => [
         'testFile.txt' => [
             'isReadable' => true,
             'isWritable' => false,
             'size' => filesize($testFilePath),
         ]
     ]
    ];

assertComponent($expRes,getDirectoryStatus('.\\testingDir\\dirTwo'),'unavailable file '); // TEST 4

chmod($testFilePath, 0777);
unlink($testFilePath); // вернули права и удалили тестовый файл







