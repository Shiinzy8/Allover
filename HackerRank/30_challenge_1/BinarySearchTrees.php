<?php
class Node{
    public $left,$right;
    public $data;
    function __construct($data)
    {
        $this->left=$this->right=null;
        $this->data = $data;
    }
}
class Solution{
    public function insert($root,$data){
        if($root==null){
            return new Node($data);
        }
        else{
            if($data<=$root->data){
                $cur=$this->insert($root->left,$data);
                $root->left=$cur;
            }
            else{
                $cur=$this->insert($root->right,$data);
                $root->right=$cur;
            }
            return $root;
        }
    }

	public function getHeight($root){
      //Write your code here
    //   print_r($root);
      // array of elements on this level
      $level = 0;
      $arr[$level] = [$root];
      $nextLevel = false;
      // проходим по всем элементам этого уровня проверям есть ли уних наследники 
      // и записываем их в массив нового уровня
      do {
        $nextLevel = false;
        $arr[$level + 1] = [];
        foreach ($arr[$level] as $element) {
            // echo "level {$level}" . PHP_EOL;
            // print_r($arr[$level+1]);
            // print_r($element);
            // echo PHP_EOL;
            if ($element->left != null) {
                // echo "left {$element->left->data}" . PHP_EOL;
                $nextLevel = !$nextLevel ? true : $nextLevel;
                array_push($arr[$level + 1], $element->left);
            }
            if ($element->right != null) {
                // echo "right {$element->right->data}" . PHP_EOL;
                $nextLevel = !$nextLevel ? true : $nextLevel;
                array_push($arr[$level + 1], $element->right); 
            }
            
            // echo PHP_EOL;
            // die;
        }
        // echo "level {$level}" . PHP_EOL;
        // print_r($arr[$level + 1]);
        $level = empty($arr[$level + 1]) ? $level : $level + 1;
        // echo "level {$level}" . PHP_EOL;
      } while($nextLevel);
      
      return $level;
    }

}//End of Solution
$myTree=new Solution();
$root=null;
$header = fopen("BinarySearchTrees.txt", "r");
$T=intval(fgets($header));
while($T-->0){
    $data=intval(fgets($header));
    $root=$myTree->insert($root,$data);
}
$height=$myTree->getHeight($root);
echo $height;
