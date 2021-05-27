<?php

$users[0] = array(
    'id' => 1,
    'name' => 'Sami',
    'email' => 'Sami.trabelsi@medtech.tn',
    'password' => '123321',
    'president_of' => 'nothing',
    'cohort' => 'freshman'


);

$users[1] = array(
    'id' => 2,
    'name' => 'Donia',
    'email' => 'Donia.Mahdia@msb.tn',
    'password' => 'passphrase',
    'president_of' => 'IEEE',
    'cohort' => 'freshman'
);

$users[2] = array(
    'id' => 3,
    'name' => 'Salma bhiri',
    'email' => 'Salma.Bhiri@smu.tn',
    'password' => 'degla123',
    'president_of' => 'dance club',
    'cohort' => 'sophomore'
);

$users[3] = array(
    'id' => 4,
    'name' => 'Mohamed Trigui',
    'email' => '',
    'password' => 'AZERTY123',
    'president_of' => 'nothing',
    'cohort' => 'sophomore'
);
//Get the index of a user with a given ID
$id_to_look_for = 2;
/*echo*/ array_search( $id_to_look_for ,  array_column($users, 'id')  );

//Add one user:
array_push($users, array(
    'id' => 4, 'name' => 'Mohamed elloumi', 'email' => 'big.boss@lci.tn', 'password' => 'AZERTY123',
    'president_of' => 'nothing',
    'cohort' => 'junior'
));

//Remove one element from the array.
array_splice($users, 3, 1); //3: The index of the user to remove; 1: Means we will only remove one user.

