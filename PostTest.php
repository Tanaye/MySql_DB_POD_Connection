<?php
require_once("Post.php");

$p = new Post();

//Select.................>>
var_dump($p->getPosts());
/*
echo "-----------------".$p->gettotalPosts().PHP_EOL;

foreach($p->getPosts() as $key => $value)
{
	echo "ID: ".$value->id.".".PHP_EOL;
	echo "Title: ".$value->title.".".PHP_EOL;
	echo "Content: ".$value->content.".".PHP_EOL;
	echo "------------------------------".PHP_EOL;
// }
*/
//var_dump($p->getPostById(2));
/*
echo "ID: ".$p->getPostById(2)->id.".".PHP_EOL;
echo "Title: ".$p->getPostById(2)->title.".".PHP_EOL;
echo "Content: ".$p->getPostById(2)->content.".".PHP_EOL;
*/


//Insert .......................>>
/*
$data = [
			'title' => 'This is the Fourth post',
			'content' => 'The power of OOP'
		];
echo $p->addPost($data)? "Insert Success!!" : "Insertion is failed";
var_dump($p->getPosts());

*/

//Update..........................>>
/*
$data = [

			'title' => '[Updated] This is the Fourth post',
			'content' => 'The power of OOP'
		];
echo $p->updatePost(2, $data)? "Update Success!!" : "Update is failed";
var_dump($p->getPosts());
*/

//Delete.........................>>
/*
echo $p->deletePost(4)? "Delete Success!!" : "Delete is failed";
var_dump($p->getPosts());
*/