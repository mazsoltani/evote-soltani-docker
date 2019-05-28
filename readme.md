<h2> پروژه درس رایانش ابری</h2>
<h3>محمد امین زارع سلطانی</h3>
<h3>سینا صمدزاد</h3>


The program contains 8 functions that can be accessed via Restful API.
The MySQL database has been used. Table Script is:

<pre>
<code>
DROP TABLE IF EXISTS `elections`; 
CREATE TABLE IF NOT EXISTS `elections` ( 
  `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `Title` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
    `StartTime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `EndTime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `listOfChoices` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `NumberOfVotes` int(11) NOT NULL,
    PRIMARY KEY (`ID`)
  ) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `elections` (`ID`, `Title`, `StartTime`, `EndTime`, `listOfChoices`, `NumberOfVotes`) VALUES
(1, 'Presidential Election', '2018/02/14', '2018/02/16', '1- Mr Ahmadi\r\n2- Mr karimi\r\n3- Mr Amini\r\n4- Mr Soltani', 120),
(2, 'Parliament election', '2019/12/20', '2019/12/21', '1- Mr Abasi\r\n2- Mr Bahmani\r\n3- Mr Farahani\r\n4- Mr Jabari\r\n5- Mr chegini\r\n6- Mr Mohammadi', 185);
COMMIT;
</code>
    </pre>
    
<h4>This project has been coded by PHP language with Laravel 5.7 </h4>  

## Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

</br>
<h2> Request AND Response in POSTMAN:</h2>

<h3><font color="red"> void CreateElection(Election election)</font></h3>
<img src="http://hamiproje.com/wp-content/uploads/2019/04/CreateElection1.png">

<h3><font color="red"> void EditElection(Election election)</font></h3>
<img src="http://hamiproje.com/wp-content/uploads/2019/04/EditElection1.png">

<h3><font color="red"> void RemoveElection(int electionId)</font></h3>
<img src="http://hamiproje.com/wp-content/uploads/2019/04/RemoveElection1.png">

<h3><font color="red"> void IncremenetNumberOfVotes(int electionId)</font></h3>
<img src="http://hamiproje.com/wp-content/uploads/2019/04/IncremenetNumberOfVotes1.png">

<h3><font color="red"> List getListOfChoices(int electionId)</font></h3>
<img src="http://hamiproje.com/wp-content/uploads/2019/04/getListOfChoices1.png">

<h3><font color="red"> List getAllElections()</font></h3>
<img src="http://hamiproje.com/wp-content/uploads/2019/04/getAllElections1.png">

<h3><font color="red"> void electionExists(int electionId)</font></h3>
<img src="http://hamiproje.com/wp-content/uploads/2019/04/electionExists1.png">

<h3><font color="red"> String getElectionDetails(int electionId)</font></h3>
<img src="http://hamiproje.com/wp-content/uploads/2019/04/getElectionDetails1.png">


All the above functions are tested with Postman.


