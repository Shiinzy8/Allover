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

	public function levelOrder($root){
      $level = 0;
      $arr[$level] = [$root];
      $nextLevel = false;
      do {
        $nextLevel = false;
        $arr[$level + 1] = [];
        foreach ($arr[$level] as $element) {
            if ($element->left != null) {
                $nextLevel = !$nextLevel ? true : $nextLevel;
                array_push($arr[$level + 1], $element->left);
            }
            if ($element->right != null) {
                $nextLevel = !$nextLevel ? true : $nextLevel;
                array_push($arr[$level + 1], $element->right); 
            }
            echo $element->data . " ";
        }
        $level = empty($arr[$level + 1]) ? $level : $level + 1;
      } while($nextLevel);
      
      return $level;
    }

}//End of Solution
$myTree=new Solution();
$root=null;
$header = fopen("BSTLevelOrderTraversal.txt", "r");
$T=intval(fgets($header));
while($T-->0){
    $data=intval(fgets($header));
    $root=$myTree->insert($root,$data);
}
$myTree->levelOrder($root);