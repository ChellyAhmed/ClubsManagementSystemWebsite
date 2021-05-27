<?php

$clubs[0] = array(
    'name' => 'IEEE',
    'field' => 'Tech',
    'Description' => 'We do hackathons',
    'president_id' => 3, //Contains the ID of the president.
    'members' => array( //Array that contains the ID of each member of the club, including the president.
        3, 1, 2
    ),
    'activities' => array(
        array(
            'name' => 'iCurious',
            'description' => 'first Activity  '
        ),
        array(
            'name' => 'Hager',
            'description' => 'Second activity'
        )
    )
);
$club_to_show ; //Variable that will contain the club we will use.
$club_to_show = 0;

//Get the index of a club with a given name
$name_to_look_for = 2;
/*echo*/ array_search( $name_to_look_for ,  array_column($clubs, 'name')  );

//Add one club:
array_push($clubs, array(
    'name' => 'Dance club',
    'field' => 'entertainment',
    'Description' => 'We like African and flamingo dance. We also sing and jump and all',
    'president_id' => 1, //Contains the ID of the president.
    'members' => array( //Array that contains the ID of each member of the club, including the president.
        3, 1, 2
    ),
    'activities' => array(
        array(
            'name' => 'Africa',
            'description' => 'first Activity  '
        ),
        array(
            'name' => 'Asia',
            'description' => 'Second activity'
        )
    )
));

//Remove one element from the array.
array_splice($clubs, 1, 1); //1: The index of the user to remove; 1: Means we will only remove one user.

//Add an activity:
array_push($clubs[0]['activities'], array('name' => 'INSAT' , 'description' => 'Third activity') );

?>