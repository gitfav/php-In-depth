<?php

$commits = 'A,B,B,A,C,C,D,A,B,C,D,C,C,C,D,A,B,C,D,A';

$answers = 'A,A,B,A,D,C,D,A,A,C,C,D,C,D,A,B,C,D,C,D';

$commits_arr = explode(',', $commits);
$answers_arr = explode(',', $answers);

$sorce = 0;
foreach ($commits_arr as $k => $v) {
    if ($v == $answers_arr[$k]) {
        $sorce += 5;
    }
}

var_dump($sorce);